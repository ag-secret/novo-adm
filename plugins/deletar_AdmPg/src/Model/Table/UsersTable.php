<?php
namespace Adm\Model\Table;

use Adm\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 */
class UsersTable extends Table
{

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
        if ($entity->permissions) {
            $this->Permissions->deleteAll(['user_id' => $entity->id]);
        }
        
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
            ->allowEmpty('is_active');

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
