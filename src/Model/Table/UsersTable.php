<?php
namespace App\Model\Table;

use Search\Manager;
use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('AlumniProfiles', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('CompanyDetails', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('EducationalBackgrounds', [
            'foreignKey' => 'user_id' 
        ]);

        $this->addBehavior('Search.Search');
        $this->searchManager()
            ->add('all', 'Search.Like', [
                'before' => true,
                'after' => true,
                'field' => 'username'
            ])
            ->add('foo', 'Search.Callback', [
                'callback' => function ($query, $args, $manager) {
                }
        ]);
    }


    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('username');

        $validator
            ->allowEmpty('password');

        $validator
            ->allowEmpty('role');

        $validator
            ->integer('active_status')
            ->allowEmpty('active_status');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        return $rules;
    }
}
