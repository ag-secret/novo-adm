<?php
namespace App\Model\Table;

use App\Model\Entity\TestFakeTable;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TestFakeTable Model
 */
class TestFakeTableTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('test_fake_table');
        $this->displayField('name');
        $this->primaryKey('id');
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
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');
            
        $validator
            ->add('idade', 'valid', ['rule' => 'numeric'])
            ->requirePresence('idade', 'create')
            ->notEmpty('idade');
            
        $validator
            ->add('birthdate', 'valid', ['rule' => 'date'])
            ->requirePresence('birthdate', 'create')
            ->notEmpty('birthdate');
            
        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');
            
        $validator
            ->requirePresence('sex', 'create')
            ->notEmpty('sex');

        return $validator;
    }
}
