<?php
namespace MyAdm\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'password' => true,
        'current_password' => true,
        'new_password' => true,
        'permissions' => true,
        'is_active' => true,
        'imagem_perfil' => true,
        'imagem_perfil_fullpath' => true,
        'imagem_perfil_trabalhada' => true,
        'imagem_perfil_file' => true
    ];

    protected function _getImagemPerfilFullpath()
    {
        $out = null;
        if ($this->_properties['imagem_perfil']) {
           $out = 'users/' . $this->_properties['id'] . '/' . $this->_properties['imagem_perfil'];
        }
        return $out;
    }
    protected function _getImagemPerfilTrabalhada()
    {
        if ($this->_getImagemPerfilFullpath()) {
            return $this->_getImagemPerfilFullpath();
        }

        return 'MyAdm.no-avatar.png';
    }

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
