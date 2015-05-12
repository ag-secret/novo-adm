<?php
namespace MyAdm\Model\Table;

use MyAdm\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Auth\DefaultPasswordHasher;

use WideImage\WideImage;

use Cake\Filesystem\File;
use Cake\Filesystem\Folder;

use Cake\Utility\Security;

use Cake\I18n\Time;

/**
 * Users Model
 */
class UsersTable extends Table
{

    protected $imagemPerfilExtAllowed = ['image/jpeg', 'image/png'];
    protected $imagemPerfilMaxSize = 2000; // In kb

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('Permissions', [
            'foreignKey' => 'user_id'
        ]);
    }

    public function beforeSave($event, $entity)
    {
        $defaultExtension = 'jpg';

        if ($entity->imagem_perfil_file['error'] === 0) {
            $entity->imagem_perfil = Security::hash($entity->imagem_perfil_file['name']) . '.' . $defaultExtension;
        }

        if ($entity->permissions) {
            $this->Permissions->deleteAll(['user_id' => $entity->id]);
        }
    }

    public function afterSave($event, $entity)
    {
        switch ($entity->imagem_perfil_file['error']) {
            case UPLOAD_ERR_OK:
                $this->_uploadImage($entity);
                break;
            // Se não possuir arquivo tudo bem, nao tratar como erro
            case UPLOAD_ERR_NO_FILE:
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }
    }

    protected function _uploadImage($entity)
    {
        $defaultExtension = 'jpg';
        $destFolderPath = Folder::addPathElement(
            WWW_ROOT,
            [
                'img',
                'users',
                $entity->id
            ]
        );

        $destFolder = new Folder();

        if ($destFolder->create($destFolderPath, true, 0755)) {

            $file = new File($entity->imagem_perfil_file['tmp_name']);

            WideImage::load($file->path)
                ->resize(140, 140, 'outside')
                ->crop('top', 'center', 140, 140)
                ->saveToFile(Folder::addPathElement($destFolderPath, $entity->imagem_perfil));
        };
    }


    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            // Aceita vazio na hora de editar mas não para criar
            ->requirePresence('password', 'create')
            ->notEmpty('password')
            ->add('password', 'length', [
                'rule' => ['minlength', 4]
            ])
            ->add('password', 'custom', [
                'rule' => function($value, $context){
                    if ($context['data']['password'] != $context['data']['confirm_password']) {
                        return false;
                    }
                    return true;
                },
                'message' => 'Você não confirmou a sua nova senha corretamente.'
            ])

            ->add('current_password', 'custom', [
                'rule' => function($value, $context){
                    $user = $this->get($context['data']['id']);
                    if ($user) {
                        return (new DefaultPasswordHasher)->check($value, $user->password);
                    }
                    return false;
                },
                'message' => 'Você não confirmou a sua senha atual corretamente'
            ])
            ->notEmpty('new_password')
            ->add('new_password', 'length', [
                'rule' => ['minlength', 4]
            ])
            ->add('new_password', 'custom', [
                'rule' => function($value, $context){
                    if ($context['data']['new_password'] != $context['data']['confirm_password']) {
                        return false;
                    }
                    return true;
                },
                'message' => 'Você não confirmou a sua nova senha corretamente.'
            ])

            ->add('is_active', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('is_active')

            ->add('imagem_perfil_file', 'file', [
                'rule' => ['mimeType', $this->imagemPerfilExtAllowed],
                // 'on' => function ($context) {
                //     return !empty($context['data']['show_profile_picture']);
                // }
            ])
            ->add('imagem_perfil_file', 'fileSize', [
                'rule' => function($value, $context){
                    if ($context['data']['imagem_perfil_file']['error'] === 0) {
                        $size = $context['data']['imagem_perfil_file']['size'] / 1024; // Transformando em KB
                        if ($size > $this->imagemPerfilMaxSize) {
                            return false;
                        }

                        return true;
                    }
                },
                'message' => 'A imagem deve conter no máximo ' . $this->imagemPerfilMaxSize . ' KB.'
            ]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
