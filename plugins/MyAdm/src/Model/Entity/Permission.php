<?php
namespace MyAdm\Model\Entity;

use Cake\ORM\Entity;

/**
 * Permission Entity.
 */
class Permission extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'controller' => true,
        'user' => true,
    ];
}
