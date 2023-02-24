<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AddCart Controller
 *
 * @property \App\Model\Table\AddCartTable $AddCart
 * @method \App\Model\Entity\AddCart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AddCartController extends AppController
{
    public function beforeFilter($event)
    {
        parent::beforeFilter($event);

              
        $this->loadModel('Users');
        $this->loadModel('UserProfile');
        $this->loadModel('ProductCategories');
        $this->loadModel('Products');
        $this->loadModel('ProductComments');
        $this->viewBuilder()->setLayout("formlayout");
        $this->Authentication->addUnauthenticatedActions(['login','add']);
    }

    public $paginate = ['limit'=>8];
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $result = $this->Authentication->getIdentity();
        // $this->paginate = [
        //     'contain' => ['Users', 'Products'],
        // ];
        // $addCart = $this->paginate($this->AddCart);

        $addCart = $this->AddCart->find('all')->contain(['Users','Products'])->where(['user_id' => $result->id ])->all();

        $this->set(compact('addCart'));
    }

    /**
     * View method
     *
     * @param string|null $id Add Cart id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $addCart = $this->AddCart->get($id, [
            'contain' => ['Users', 'Products'],
        ]);

        $this->set(compact('addCart'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {
        $result = $this->Authentication->getIdentity();
        $cart = $this->AddCart->find('all')->where(['user_id' => $result->id , 'product_id'=>$id])->all();
        // dd($cart);
        $cartarray = array();
        foreach($cart as $cart){
            $cartarray[] =+ $cart->items;
        }

        if(!empty($cartarray)){
            $this->Flash->error(__('The Product already Exist in your Cart'));
            return $this->redirect(['controller'=>'products','action' => 'producthome']);
        }
        $addCart = $this->AddCart->newEmptyEntity();
        
            $addCart = $this->AddCart->patchEntity($addCart, $this->request->getData());
            $addCart->user_id = $result->id;
            $addCart->product_id = $id;
            if ($this->AddCart->save($addCart)) {
                $this->Flash->success(__('The add cart has been saved.'));

                return $this->redirect(['controller'=>'products','action' => 'producthome']);
            }
            $this->Flash->error(__('The add cart could not be saved. Please, try again.'));
            return $this->redirect(['controller'=>'products','action' => 'producthome']);
        }
      

    /**
     * Edit method
     *
     * @param string|null $id Add Cart id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function edit($id = null)
    {
        $addCart = $this->AddCart->get($id, [
            'contain' => [],
        ]);

            $addCart->quantity = $addCart->quantity + 1;
            
            if ($this->AddCart->save($addCart)) {
                $this->Flash->success(__('The add cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The add cart could not be saved. Please, try again.'));
        
        
    }
    public function decrease($id = null)
    {
        $addCart = $this->AddCart->get($id, [
            'contain' => [],
        ]);

            if($addCart->quantity == 1){
                $this->Flash->error(__('quantity cant be less then 1 for product in cart'));

                return $this->redirect(['action' => 'index']);
            }
        
            $addCart->quantity = $addCart->quantity - 1;
            
            if ($this->AddCart->save($addCart)) {
                $this->Flash->success(__('The add cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The add cart could not be saved. Please, try again.'));
        
        
    }

    /**
     * Delete method
     *
     * @param string|null $id Add Cart id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $addCart = $this->AddCart->get($id);
        if ($this->AddCart->delete($addCart)) {
            $this->Flash->success(__('The add cart has been deleted.'));
        } else {
            $this->Flash->error(__('The add cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
