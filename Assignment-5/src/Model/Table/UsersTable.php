<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\ProductCommentsTable&\Cake\ORM\Association\HasMany $ProductComments
 * @property \App\Model\Table\UserProfileTable&\Cake\ORM\Association\HasMany $UserProfile
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('ProductComments', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('ProductCategory', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('AddCart', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserProfile', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Reaction', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasOne('UserProfile',['dependent'=>true]);
  
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
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

        // $validator
        //     ->scalar('user_type')
        //     ->notEmptyString('user_type');

        // $validator
        //     ->scalar('status')
        //     ->allowEmptyString('status');

        // $validator
        //     ->dateTime('created_date')
        //     ->notEmptyDateTime('created_date');

        // $validator
        //     ->dateTime('modified_date')
        //     ->allowEmptyDateTime('modified_date');

        // $validator
        //     ->allowEmptyFile('user_profile.images')
        //     ->requirePresence('user_profile.images', 'create')
        //     ->notEmptyString('user_profile.images', 'Please Enter the image input')
        // ->add('user_profile.images',[
        //     'mimeType'=>[
        //         'rule'=>['mimeType',['profile_image/jpg','profile_image/png','profile_image/jpeg']],
        //         'message'=>'Please upload only jpg and png.',
        //     ],
        //     'fileSize'=>[
        //         'rule'=>['fileSize','<=','1MB'],
        //         'message'=>'Image file size must be less than 1 MB.',
        //     ],
        // ]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}
