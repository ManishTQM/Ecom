<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;


/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
             //-----------------------------Before Filter--------------------------------------//

    public function beforeFilter($event)
    {
        parent::beforeFilter($event);

              
        $this->loadModel('Users');
        $this->loadModel('AddCart');
        $this->loadModel('Reaction');
        $this->loadModel('UserProfile');
        $this->loadModel('ProductCategories');
        $this->loadModel('Products');
        $this->loadModel('ProductComments');
        $this->viewBuilder()->setLayout("formlayout");
        // $this->Authentication->addUnauthenticatedActions(['login','add','ajaxadd']);

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

         //---------------------------------------- Product Index---------------------------------------//

    public function index()
    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $result = $this->Authentication->getIdentity();
            if ($result->user_type == 1) {
        $products = $this->paginate($this->Products);
        $this->set(compact('products'));
    }
    else{
        
        return $this->redirect(['controller'=>'Products','action'=>'list']);
    }
}}

         //----------------------------------------Product List---------------------------------------//

    public function list(){
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            $result = $this->Authentication->getIdentity();
            if ($result->user_type == 0) {
                    // $post = $this->ProductCategories;
                    // $this->set(compact('post'));
                // pr($post);
                // die;
        // $product=$this->paginate($this->Products->find('all')->where(['status'=>1]));
        $product = $this->paginate('Products',
        [
            'contain'=>['ProductCategories']
            // 'where'=>['status'=>'1']
        ]);
        $this->set(compact('product'));
        // dd($product);
        // die;

    }
  }
    else{
        
        return $this->redirect(['controller'=>'Users','action'=>'logout']);
    }
}

//----------------------------------------Product List---------------------------------------//

public function producthome(){
    $result = $this->Authentication->getResult();

    if ($result->isValid()) {
        $result = $this->Authentication->getIdentity();
        if ($result->user_type == 0) {
                // $post = $this->ProductCategories;
                // $this->set(compact('post'));
            // pr($post);
            // die;
    // $product=$this->paginate($this->Products->find('all')->where(['status'=>1]));
    $product = $this->paginate('Products',
    [
        'contain'=>['ProductCategories','Reaction','AddCart']
        // 'where'=>['status'=>'1']
    ]);

    $cart = $this->AddCart->find('all')->where(['user_id' => $result->id ])->all();
    
  //  dd($cart);
    // pr($product.Reaction);
    // die;
    $this->set(compact('product','result','cart'));


    // $this->paginate = [
    //     'contain' => ['Users', 'Products'],
    // ];
    // $reaction = $this->paginate($this->Reaction);

   // $reactionarray = array();
// foreach($product as $product){
//     $reactionarray = array();
//     foreach($product->reaction as $reaction ){
        
//         $reactionarray[] =+ $reaction->user_id;
        
//     }
//     if (in_array(8, $reactionarray)){
//     pr($reactionarray);}
// }
// die;
    // dd($reactionarray);
    
    //-----------------------------------------------------Rule Checker-----------------------------------------------//

    // foreach ($product as $product): 
        
        // if(empty($product->reaction)){
        //     echo "00</br>";
        //     break;
        // }else{
    //         $reactionarray = array();
    //         foreach($product->reaction as $reactions ){
                
    //             $reactionarray[] =+ $reactions->user_id;  
    //         }
    //         if (in_array($result->id, $reactionarray)){
    //             foreach($product->reaction as $reaction ){
    //                 if($reaction->user_id == $result->id && $reaction->product_id == $product->id){

    //             if($reaction->upvote == 1){
    //                     echo "10</br>";
    //                 }
    //             else{ 
    //                 if($reaction->downvote == 1){
    //                     echo "01</br>";
    //                 }else{
    //                     echo "data not found";
    //                 }
    //             }
                
    //         }
    //     }
    // }
    //     // }
    //     break;
    // endforeach; 
    // die;
}
else{
    
    return $this->redirect(['controller'=>'Users','action'=>'logout']);
}
}}

         //----------------------------------------Product Status---------------------------------------//

    public function productstatus($id=null,$status=null){
        $this->request->allowMethod(['post']);
        $user =$this->Products->get($id);
        if ($status==1) 
            $user->status =2;
        else
            $user->status=1;
        
        if ($this->Products->save($user)) {
            $this->Flash->success(_('Saved'));
        }else{
            $this->Flash->error(__('Invalid username or password'));
        }
        return $this->redirect(['action'=>'index']);

    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   

           //----------------------------------------Product View---------------------------------------//

    public function productview($id=null){
        
            $result = $this->Authentication->getIdentity();
            if ($result->user_type == 1) {

        $user = $this->Authentication->getIdentity();
        $user_id = $user->id;
        $post = $this->Products->get($id, [
            'contain' => ['ProductComments'],
        ]);
        $this->set(compact('post'));}
        else{
            return $this->redirect(['action' => 'index']);

        }
    }
       

             //----------------------------------------One Product View & User Comment---------------------------------------//

    public function view($id=null,$user_id=null){

        $user = $this->Authentication->getIdentity();
        $user_id = $user->id;
        $post = $this->Products->get($id, [
            'contain' => ['ProductComments'],
        ]);
        $username = $this->Users->get($user_id, [
            'contain' => ['UserProfile'],
        ]);
        $comment = $this->ProductComments->newEmptyEntity();
        if ($this->request->is(['post'])) {
            $user_id =$user->id;
            $data=$this->request->getData();
            $comment['user_id']=$user_id;
            $comment['name'] = $username->user_profile->first_name;
            $comment['product_id']= $id;
            $comment = $this->ProductComments->patchEntity($comment,$data,);
            if ($this->ProductComments->save($comment)) {
                $this->Flash->success(__('The Comment has been saved.'));
    
                return $this->redirect(['action' => 'view',$id]);
            }
            else{
    
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    
        $this->set(compact('post','comment','user'));  
    
       }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

                  //----------------------------------------Add Product---------------------------------------//

    public function add($category_id=null)
    {  
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $result = $this->Authentication->getIdentity();
            if ($result->user_type == 1) {

        // $productcategories = $this->paginate($this->ProductCategories)->where(['status'=>2]);
        $productcategories=$this->paginate($this->ProductCategories->find('all')->where(['status'=>1]));


        $product = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product,$this->request->getData());
            // pr($product);
            // die;
            if (!$product->getErrors) {
                $image = $this->request->getData('images');
                $name = $image->getClientFilename();
                $targetPath = WWW_ROOT . 'upload' . DS . $name;
                if ($name)
                $image->moveTo($targetPath);
                $product->product_image = $name;
            //     pr($product);
            //    die;
            }
        
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product','productcategories'));
    }else{
        return $this->redirect(['controller'=>'Products','action'=>'list']);

    }
}
}

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

                       //----------------------------------------Edit Product---------------------------------------//

    public function edit($id = null)
    {   
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $result = $this->Authentication->getIdentity();
            if ($result->user_type == 1) {
        $productcategories = $this->paginate($this->ProductCategories);
        // $product = $this->Products->newEmptyEntity();
        $product = $this->Products->get($id, [
            'contain' => ['ProductCategories'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (!$product->getErrors) {
                $image = $this->request->getData('images');
                $name = $image->getClientFilename();
                $targetPath = WWW_ROOT . 'upload' . DS . $name;
                if ($name)
                $image->moveTo($targetPath);
                $product->product_image = $name;
                $user = $this->Users->patchEntity($product, $this->request->getData());
                // pr( $user);
                // die;
            }
                if ($this->Products->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
        
            // if ($this->Products->save($product)) {
            //     $this->Flash->success(__('The product has been saved.'));

            //     return $this->redirect(['action' => 'index']);
            // }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product','productcategories'));
        // $this->set(compact('product','productcategories'));
    }else{
        return $this->redirect(['controller'=>'Products','action'=>'list']);


    }
}}

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

             //----------------------------------------Delete Product---------------------------------------//

    public function delete($id = null)
    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $result = $this->Authentication->getIdentity();
            if ($result->user_type == 1) {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }else{
        return $this->redirect(['controller'=>'Products','action'=>'list']);
    }
}}


             //----------------------------------------Comment Delete---------------------------------------//

public function commentdelete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);
    $comment = $this->ProductComments->get($id);
        if ($this->ProductComments->delete($comment)) {
            $this->Flash->success(__('The comment has been deleted.'));
            return $this->redirect(['action' => 'index']);
         }
     else {
        $this->Flash->error(__('The comment could not be deleted. Please, try again.'));
    }
    return $this->redirect(['action' => 'postview']);
}


             //----------------------------------------Like---------------------------------------//


public function like($id=null)
{

    $result = $this->Authentication->getIdentity();

    $this->paginate = [
        'contain' => ['Users', 'Products'],
    ];
    $reactions = $this->paginate($this->Reaction);
        foreach($reactions as $reactions){
            if($reactions->user_id == $result->id && $reactions->product_id == $id)
            {
                if($reactions->upvote == 1){
                    $reactionadd = $this->Reaction->get($reactions->id, [
                        'contain' => [],
                    ]);
                    
                    $reactionadd = $this->Reaction->patchEntity($reactionadd, $this->request->getData());
                    $reactionadd->upvote = 0;
                    $reactionadd->downvote = 0;
                    if ($this->Reaction->save($reactionadd)) {
                        $this->Flash->success(__('The reaction has been saved.'));
                        
                        return $this->redirect(['action' => 'producthome']);
                    }
                    $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
                    
                    break;

                }
                else{

                    $reactionadd = $this->Reaction->get($reactions->id, [
                        'contain' => [],
                    ]);
                    
                    $reactionadd = $this->Reaction->patchEntity($reactionadd, $this->request->getData());
                    $reactionadd->upvote = 1;
                    $reactionadd->downvote = 0;
                    if ($this->Reaction->save($reactionadd)) {
                        $this->Flash->success(__('The reaction has been saved.'));
                        
                        return $this->redirect(['action' => 'producthome']);
                    }
                    $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
                    
                    break;
                }
            }
            
        }


    $reaction = $this->Reaction->newEmptyEntity();

    
    $reaction = $this->Reaction->patchEntity($reaction, $this->request->getData());
   // dd($result->id);
    $reaction->user_id = $result->id;
        $reaction->product_id = $id;
        $reaction->upvote = 1;
        if ($this->Reaction->save($reaction)) {
            $this->Flash->success(__('The reaction has been saved.'));

            return $this->redirect(['action' => 'producthome']);
        }
        $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
    }


        //----------------------------------------DisLike---------------------------------------//

    public function dislike($id=null)
{

    $result = $this->Authentication->getIdentity();

    $this->paginate = [
        'contain' => ['Users', 'Products'],
    ];
    $reactions = $this->paginate($this->Reaction);
   // dd($reactions);
        foreach($reactions as $reactions){
            if($reactions->user_id == $result->id && $reactions->product_id == $id)
            {

                if($reactions->downvote == 1){
                    $reactionadd = $this->Reaction->get($reactions->id, [
                        'contain' => [],
                    ]);
                    
                    $reactionadd = $this->Reaction->patchEntity($reactionadd, $this->request->getData());
                    $reactionadd->upvote = 0;
                    $reactionadd->downvote = 0;
                    if ($this->Reaction->save($reactionadd)) {
                        $this->Flash->success(__('The reaction has been saved.'));
                        
                        return $this->redirect(['action' => 'producthome']);
                    }
                    $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
                    
                    break;

                }else{

                    $reactionadd = $this->Reaction->get($reactions->id, [
                        'contain' => [],
                    ]);
                    
                    $reactionadd = $this->Reaction->patchEntity($reactionadd, $this->request->getData());
                    $reactionadd->upvote = 0;
                    $reactionadd->downvote = 1;
                    if ($this->Reaction->save($reactionadd)) {
                        $this->Flash->success(__('The reaction has been saved.'));
                        
                        return $this->redirect(['action' => 'producthome']);
                    }
                    $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
                    
                    break;
                }
            }
            
        }


    $reaction = $this->Reaction->newEmptyEntity();

    
    $reaction = $this->Reaction->patchEntity($reaction, $this->request->getData());
   // dd($result->id);
    $reaction->user_id = $result->id;
        $reaction->product_id = $id;
        $reaction->downvote = 1;
        if ($this->Reaction->save($reaction)) {
            $this->Flash->success(__('The reaction has been saved.'));

            return $this->redirect(['action' => 'producthome']);
        }
        $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
    }



}
