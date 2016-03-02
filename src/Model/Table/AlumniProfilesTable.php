<?php
// src/Model/Table/AlumniProfilesTable.php

namespace App\Model\Table;

use Search\Manager;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;



class AlumniProfilesTable extends Table
{



    public function initialize(array $config)
    {
        //parent::initialize();
        // Add the behaviour to your table

        
        $this->hasOne('EducationalBackgrounds');
        $this->addBehavior('Search.Search');

        
            $this->searchManager()
                ->add('all', 'Search.Like', [
                    'before' => true,
                    'after' => true,
                    'field' => [$this->aliasField('fname'), $this->aliasField('mname'), $this->aliasField('lname'), $this->aliasField('email'), $this->aliasField('street_address'), $this->aliasField('city')]
                ])

                ->add('foo', 'Search.Callback', [
                    'callback' => function ($query, $args, $manager) {
                        // Modify $query as required
                    }
            ]);
        



    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('fname')
            ->requirePresence('fname')
            ->notEmpty('lname')
            ->requirePresence('lname');

        return $validator;
    }

  
    public function loadCSV($filename){
            $this->begin();
            try{
                $this->deleteAll('1=1',false);
                $csvData = file($filename,FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
                foreach($csvData as $line){
                    $record = split(',',$line);
                    $data = array(
                        'title' => $record[0],
                        'body' => $record[1],
                    );
                    $this->create($data);
                    $this->save();
                }
                $this->commit();
            }catch(Exception $e){
                $this->rollback();
            }
        }
}
