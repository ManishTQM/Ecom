<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\ProductCommentsTable&\Cake\ORM\Association\HasMany $ProductComments
 *
 * @method \App\Model\Entity\Product newEmptyEntity()
 * @method \App\Model\Entity\Product newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProductsTable extends Table
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

        $this->setTable('products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('ProductComments', [
            'foreignKey' => 'product_id',
        ]);
        $this->belongsTo('ProductCategories', [
            // 'bindingKey'=>'id',
            'foreignKey' => 'category_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        // $validator
        //     ->scalar('product_title')
        //     ->maxLength('product_title', 200)
        //     ->allowEmptyString('product_title');
        $validator
            ->scalar('product_title')
            ->requirePresence('product_title', 'create')
            ->notEmptyString('product_title','Please Enter the Product input');

        $validator
            ->scalar('product_description')
            ->notEmptyString('product_description')
            ->notEmptyString('product_description','Please Enter the Product input');
        
        //     $validator
        //     ->scalar('product_description')
        //     // ->maxLength('product_description', 250)
        //     ->notEmptyString('product_description');
        //     ->notEmptyString('product_description','Please Enter the Product input');

        
        

        //     $validator
        //     ->allowEmptyFile('images')
        //     ->requirePresence('images', 'create')
        //     ->notEmptyString('images', 'Please Enter the image input')
        // ->add('images',[
        //     'mimeType'=>[
        //         'rule'=>['mimeType',['image/jpg','image/png','image/jpeg']],
        //         'message'=>'Please upload only jpg and png.',
        //     ],
        //     'fileSize'=>[
        //         'rule'=>['fileSize','<=','1MB'],
        //         'message'=>'Image file size must be less than 1 MB.',
        //     ],
        // ]);

        // $validator
        //     ->integer('product_category')
        //     ->allowEmptyString('product_category');

        // $validator
        //     ->scalar('product_image')
        //     ->maxLength('product_image', 200)
        //     ->notEmptyFile('product_image');

        $validator
            ->scalar('product_tags')
            ->maxLength('product_tags', 250)
            ->notEmptyString('product_tags');

        // $validator
        //     ->scalar('status')
        //     ->allowEmptyString('status');

        // $validator
        //     ->dateTime('created_date')
        //     ->notEmptyDateTime('created_date');

        // $validator
        //     ->dateTime('modified_date')
        //     ->allowEmptyDateTime('modified_date');

        return $validator;
    }
}
