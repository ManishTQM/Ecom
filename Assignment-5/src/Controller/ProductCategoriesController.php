<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProductCategories Controller
 *
 * @property \App\Model\Table\ProductCategoriesTable $ProductCategories
 * @method \App\Model\Entity\ProductCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductCategoriesController extends AppController
{

                     //---------------------------------beforFilter---------------------------------//


    public function beforeFilter($event)
    {
        parent::beforeFilter($event);
        $this->loadModel('Users');
        $this->loadModel('UserProfile');
        $this->loadModel('ProductCategories');
        $this->loadModel('Products');
        $this->loadModel('ProductComments');
        $this->viewBuilder()->setLayout("formlayout");
        $this->loadComponent('Authentication.Authentication');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
                 //----------------------------------Product Index-------------------------------------//

    public function index(){
        $result = $this->Authentication->getResult();

        if ($result && $result->isValid()) {
        $result = $this->Authentication->getIdentity();
            if ($result->user_type == '1') {
        $productCategories = $this->paginate($this->ProductCategories);

        $this->set(compact('productCategories'));
    }
    else{
        return $this->redirect(['controller'=>'Products','action'=>'list']);
    }
    }}

        //---------------------------------userStatus---------------------------------//


    public function userstatus($id=null,$status=null){
        $this->request->allowMethod(['post']);
        $user =$this->ProductCategories->get($id);
        if ($status==1) 
            $user->status =2;
        else
            $user->status=1;
        
        if ($this->ProductCategories->save($user)) {
            $this->Flash->success(_('Saved'));
        }else{
            $this->Flash->error(__('Invalid username or password'));
        }
        return $this->redirect(['action'=>'index']);

    }

    /**
     * View method
     *
     * @param string|null $id Product Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

            //---------------------------------View Product---------------------------------//

    public function view($id = null)
    {
        $productCategory = $this->ProductCategories->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('productCategory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

                //---------------------------------Add Product---------------------------------//


    public function add($users_id=null)
    
     {        
        $result = $this->Authentication->getResult();
        // pr

        if ($result && $result->isValid()) {
        $result = $this->Authentication->getIdentity();
        if ($result->user_type == 1) {
            $user = $this->Authentication->getIdentity();
            $users_id =$user->id;
            $productCategory = $this->ProductCategories->newEmptyEntity();
        if ($this->request->is(['patch','put','post'])) {
            $users =$user->id;
            $users = $this->request->getData();
            $users['users_id'] = $users_id;
            $productCategory = $this->ProductCategories->patchEntity($productCategory,$users);
            if ($this->ProductCategories->save($productCategory)) {
                $this->Flash->success(__('The product category has been saved.'));

                return $this->redirect(['action' => 'index',$users_id]);
            }
            $this->Flash->error(__('The product category could not be saved. Please, try again.'));
        }
        $this->set(compact('productCategory'));
    }else{
        return $this->redirect(['controller'=>'Products','action'=>'list']);

    }
    // return $this->redirect(['action' => 'index',$users_id]);

    }
     }   

    /**
     * Edit method
     *
     * @param string|null $id Product Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
                    //---------------------------------Edit Product---------------------------------//

    public function edit($id = null)
    {
        $result = $this->Authentication->getResult();
        // pr

        if ($result && $result->isValid()) {
        $result = $this->Authentication->getIdentity();
            if ($result->user_type == 1) {
        $productCategory = $this->ProductCategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productCategory = $this->ProductCategories->patchEntity($productCategory, $this->request->getData());
            if ($this->ProductCategories->save($productCategory)) {
                $this->Flash->success(__('The product category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product category could not be saved. Please, try again.'));
        }
        $this->set(compact('productCategory'));
    }else{
        return $this->redirect(['controller'=>'Products','action'=>'list']);

    }
    }
}

    /**
     * Delete method
     *
     * @param string|null $id Product Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

                         //---------------------------------Delete Product---------------------------------//

    public function delete($id = null)
    {
        $result = $this->Authentication->getResult();
        // pr

        if ($result && $result->isValid()) {
        $result = $this->Authentication->getIdentity();
            if ($result->user_type == 1) {
        $this->request->allowMethod(['post', 'delete']);
        $productCategory = $this->ProductCategories->get($id);
        if ($this->ProductCategories->delete($productCategory)) {
            $this->Flash->success(__('The product category has been deleted.'));
        } else {
            $this->Flash->error(__('The product category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }else{
        return $this->redirect(['controller'=>'Products','action'=>'list']);

    }
}
    }}