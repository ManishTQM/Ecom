<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class UsersTable extends Table
{
   
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
       
        $this->hasMany('UserProfile', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasOne('UserProfile',['dependent'=>true]);
  
    }

   
    public function validationDefault(Validator $validator): Validator
    {
        $validator
        ->email('email')
        ->requirePresence('email', 'create')
        ->notEmptyString('email','Please Enter the email input');

        $validator
        ->scalar('password')
        ->requirePresence('password', 'create')
        ->notEmptyString('password')
        ->add('password', [
            'notBlank' => [
                'rule' => ['notBlank'],
                'message' => '**Please enter Password**'
            ],
            
            'characters' => [
                'rule' => ['custom', '/[A-Z]/'],
                'message' => 'Password must have at least one UperCase character.'
            ],
            'lowecase' => [
                'rule' => ['custom', '/[a-z]/'],
                'message' => 'Password must have at least one LowerCase character.'
            ],
            'specialChar' => [
                'rule' => ['custom', '/[!@#$%^&*]/'],
                'message' => 'Password must have at least one Special-Case character.'
            ],
            'Numberic' => [
                'rule' => ['custom', '/[0-9]/'],
                'message' => 'Password must have at least one Number.'
            ],
        ]);

     
        return $validator;
    }

  
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}
