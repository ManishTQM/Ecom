<?php
declare(strict_types=1);

namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use\Cake\Routing\Router;
use Cake\Datasource\ConnectionManager; //Database Connection 
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Utility\Security;
use App\Controller\View;

/**
 * Users Controller
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
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

        //-----------------------------Admin----Index--------------------------//

    public function index($id=null)
    {  

            $result = $this->Authentication->getIdentity();
            if ($result->user_type == '1') {
        $users = $this->paginate($this->Users, [
            'contain' => ['UserProfile']
        ]);
        $status=$this->request->getQuery('status');
        if($status == null){
          
             $users=$this->Users->find('all')->contain(['UserProfile']);
        }else{
            $users=$this->Users->find('all')->contain(['UserProfile'])->where(['status'=>$status]);
        }
        // $this->autoRender=false;
        // $this->layout=false;
        $this->set(compact('users'));
        if($this->request->is('ajax')){
            $this->viewBuilder()->setLayout(null);
            echo $this->render('/element/user_index');
            exit;
        }
      
        $this->set(compact('users'));
}
else{  
    return $this->redirect(['controller'=>'Products','action'=>'list']);
   
       
    
}
}

        //-----------------------------Userstatus--------------------------//

    public function userstatus($id=null,$status=null){
        $this->request->allowMethod(['post']);
        $user =$this->Users->get($id);
        if ($status==1) 
            $user->status =2;
        else
            $user->status=1;
        
        if ($this->Users->save($user)) {
            $this->Flash->success(_('Saved'));
        }else{
            $this->Flash->error(__('Invalid username or password'));
        }
        return $this->redirect(['action'=>'index']);

    }


        //-----------------------------UserType--------------------------//

        // public function usertype($id=null,$user_type=null){
        //     $this->request->allowMethod(['post']);
        //     $user =$this->Users->get($id);
        //     if ($user_type==1) 
        //         $user->user_type =2;
        //     else
        //         $user->user_type=1;
            
        //     if ($this->Users->save($user)) {
        //         $this->Flash->success(_('Saved'));
        //     }else{
        //         $this->Flash->error(__('Invalid username or password'));
        //     }
        //     return $this->redirect(['action'=>'index']);
    
        // }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
            //-----------------------------View--------------------------//

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['UserProfile','ProductComments'],
        ]);
        // pr($user);
        // die;

        $this->set(compact('user'));
    }

    //-----------------------------login----Admin----User-------------------------//

    public function login()
    {

        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result && $result->isValid()) {
            $email = $this->request->getData('email');
            $users = TableRegistry::get("Users");
            $data = $users->find('all')->where(['email' => $email])->first();

            $session = $this->getRequest()->getSession();
            $session->write('email', $data->email);
            $result = $this->Authentication->getIdentity();
            if ($result['status']=='2') {
                $this->Flash->error(__('Your Account Deactivate Please Contact Us Customer Care'));
                $redirect = $this->request->getQuery('redirect',['controller' => 'users','action' => 'logout',]);


            }else{
                if ($result->user_type == '1') {
                $redirect = $this->request->getQuery('redirect', ['controller' => 'users','action' => 'index',]);
                }else{
                 $redirect = $this->request->getQuery('redirect', ['controller' => 'products','action' => 'producthome',]);

                }
            }

            return $this->redirect($redirect);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

         //-----------------------------All Type User Registration-------------------------//


    public function add()
    {        
        $result = $this->Authentication->getResult();

        if (!$result->isValid()) {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if (!$user->getErrors) {
                $image = $this->request->getData('user_profile.images');
                $name = $image->getClientFilename();
                $targetPath = WWW_ROOT . 'upload' . DS . $name;
                if ($name)
                    $image->moveTo($targetPath);
                 $user->user_profile->profile_image = $name;
            }
            if ($this->Users->save($user)) {
                
                // debug($user);
                // exit;
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'logout']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }else{
        return $this->redirect(['action' => 'index']);

    }}
             //-----------------------------User---Profile-----------------------------//


    public function userdata($id=null)
    {
        $user = $this->Authentication->getResult();
        
        if ($user && $user->isValid()) {
            $user = $this->Authentication->getIdentity();
            
            $id =$user->id;
            $user = $this->Users->get($id, [
                'contain' => ['UserProfile'],
            ]);
            $users = $this->request->getData();
            
            $users['id']=$id;
            // pr($users);
            // die;
            

        $this->set(compact('user'));
    }}  

    
    //-----------------------------Edit User-----------------------------//


    public function edituser($id = null)
    {
        $result = $this->Authentication->getResult();

        if ($result && $result->isValid()) {
        $result = $this->Authentication->getIdentity();
            if ($result->user_type == 0) {
                $user = $this->Authentication->getIdentity();
             $id =$user->id;
             $users = $this->request->getData();

        $user = $this->Users->get($id, ['contain' => ['UserProfile'],]);
        $users['id']=$id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (!$user->getErrors) {
                $image = $this->request->getData('user_profile.images');
                $name = $image->getClientFilename();
                $targetPath = WWW_ROOT . 'upload' . DS . $name;
                if ($name)
                $image->moveTo($targetPath);
                $user->user_profile->profile_image = $name;
                $user = $this->Users->patchEntity($user, $this->request->getData());
            }
                if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'userdata']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }else{
        return $this->redirect(['controller'=>'Products','action'=>'list']);
    }
}}
    //-----------------------------Admin View-----------------------------//

  public function adminview($id=null)
    {
        $user = $this->Authentication->getResult();
        
        if ($user && $user->isValid()) {
            $user = $this->Authentication->getIdentity();
            
            $id =$user->id;
            $user = $this->Users->get($id, [
                'contain' => ['UserProfile'],
            ]);
            $users = $this->request->getData();
            
            $users['id']=$id;
            // pr($users);
            // die;
            

        $this->set(compact('user'));
    }}  

    

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // editadmin

        //-----------------------------Admin All Users Profile Edit-----------------------------//

    public function edit($id = null)
    {
        $result = $this->Authentication->getResult();
        // pr

        if ($result && $result->isValid()) {
        $result = $this->Authentication->getIdentity();
            if ($result->user_type == 1) {
        $user = $this->Users->get($id, ['contain' => ['UserProfile'],]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            if (!$user->getErrors) {
                $image = $this->request->getData('user_profile.images');
                $name = $image->getClientFilename();
                $targetPath = WWW_ROOT . 'upload' . DS . $name;
                if ($name)
                $image->moveTo($targetPath);
                $user->user_profile->profile_image = $name;
                $user = $this->Users->patchEntity($user, $this->request->getData());
            }
                if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }else{
        return $this->redirect(['controller'=>'Products','action'=>'list']);
    }
}}

     //-----------------------------Admin Self Profile Edit-----------------------------//

     public function editadmin($id = null)
     {
         $result = $this->Authentication->getResult();
 
         if ($result && $result->isValid()) {
         $result = $this->Authentication->getIdentity();
             if ($result->user_type == 1) {
                 $user = $this->Authentication->getIdentity();
              $id =$user->id;
              $users = $this->request->getData();
 
         $user = $this->Users->get($id, ['contain' => ['UserProfile'],]);
         $users['id']=$id;
         if ($this->request->is(['patch', 'post', 'put'])) {
             if (!$user->getErrors) {
                 $image = $this->request->getData('user_profile.images');
                 $name = $image->getClientFilename();
                 $targetPath = WWW_ROOT . 'upload' . DS . $name;
                 if ($name)
                 $image->moveTo($targetPath);
                 $user->user_profile->profile_image = $name;
                 $user = $this->Users->patchEntity($user, $this->request->getData());
             }
                 if ($this->Users->save($user)) {
                 $this->Flash->success(__('The user has been saved.'));
 
                 return $this->redirect(['action' => 'adminview']);
             }
             $this->Flash->error(__('The user could not be saved. Please, try again.'));
         }
         $this->set(compact('user'));
     }else{
         return $this->redirect(['controller'=>'Products','action'=>'list']);
     }
 }}

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

             //-----------------------------Admin----Delete-----------------------------//

    public function delete($id = null)
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
        $result = $this->Authentication->getIdentity();
            if ($result->user_type == 1) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }else{
        return $this->redirect(['controller'=>'Products','action'=>'list']);
    }
}
}
             //-----------------------------Logout-----------------------------//

    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
                $this->Authentication->logout();
                $session = $this->request->getSession();
                $session->destroy();
                return $this->redirect(['action' => 'login']);
            }
            }

        
 
}
