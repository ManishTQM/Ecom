<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserProfile Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UserProfile newEmptyEntity()
 * @method \App\Model\Entity\UserProfile newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UserProfile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserProfile get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserProfile findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UserProfile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserProfile[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserProfile|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserProfile saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserProfile[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserProfile[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserProfile[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserProfile[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UserProfileTable extends Table
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

        $this->setTable('user_profile');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        // $this->hasMany('Products', [
        //     'foreignKey' => 'user_id',
        // ]);
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
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 50)
            ->minLength('first_name', 2)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name','Please Enter the first_name input');

       

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50)
            ->minLength('last_name', 2)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name','Please Enter the last_name input');

       

        $validator
            ->scalar('contact')
            ->maxLength('contact', 12)
            ->minLength('contact', 10)
            ->requirePresence('contact', 'create')
            ->notEmptyString('contact','Please Enter the  Contact number');

        $validator
            ->scalar('address')
            ->maxLength('address', 200)
            ->minLength('address', 5)
            ->requirePresence('address', 'create')
            ->notEmptyString('address','Please Enter the  Address Input');


    //    $validator
    //         ->allowEmptyFile('user_profile.images')
    //         ->requirePresence('user_profile.images', 'create')
    //         ->notEmptyString('user_profile.images', 'Please Enter the image input')
    //     ->add('user_profile.images',[
    //         'mimeType'=>[
    //             'rule'=>['mimeType',['image/jpg','image/png','image/jpeg']],
    //             'message'=>'Please upload only jpg and png.',
    //         ],
    //         'fileSize'=>[
    //             'rule'=>['fileSize','<=','1MB'],
    //             'message'=>'Image file size must be less than 1 MB.',
    //         ],
    //     ]);

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
