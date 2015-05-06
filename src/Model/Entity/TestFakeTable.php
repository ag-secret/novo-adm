<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TestFakeTable Entity.
 */
class TestFakeTable extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'idade' => true,
        'birthdate' => true,
        'password' => true,
        'sex' => true,
    ];
}
