<?php

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

class UsersController extends AppController
{
    public function beforeFilter($event)
    {
        $this->loadModel('Users');
        $this->loadModel('UserProfile');
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout("index");

    }

    //-----------------------------------------index----------------------------------------------//

        public function index($id=null)
        {  
            $this->viewBuilder()->setLayout(null);
                $result = $this->Authentication->getIdentity();
                if ($result->user_type == '1') {
            $users = $this->paginate($this->Users, [
                'contain' => ['UserProfile']
            ]);
           // dd($users);
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
    //-----------------------------------------Userstatus----------------------------------------------//

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

    //-----------------------------------------DeleteStatus--------------------------------------//

    public function deletestatus($id=null,$delete_status=null){
      if ($this->request->is('ajax')) {
        $user =$this->Users->get($id);
        if ($delete_status==1) 
            $user->delete_status =0;
        else
            $user->delete_status=1;
        
        if ($this->Users->save($user)) {
            echo json_encode(array(
                "status" => 1,
                "message" => "The Users has been deleted."
            )); 
            exit;
        }

    else{
        echo json_encode(array(
            "status" => 0,
            "message" => "The User could not be deleted. Please, try again."
        )); 
        exit;
        }
        
      }  
        
    }

    //----------------------------------------------Login--------------------------------------------//
    public function login(){
        $this->viewBuilder()->setLayout(null);
        
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result && $result->isValid()) {
            $email = $this->request->getData('email');
            $users = TableRegistry::get("Users");
            $data = $users->find('all')->contain('UserProfile')->where(['email' => $email])->first();

            $session = $this->getRequest()->getSession();
            $session->write('users_details', $data);
            $result = $this->Authentication->getIdentity();
            if ($result['status']=='2') {
                $this->Flash->error(__('Your Account Deactivate Please Contact Us Customer Care'));
                $redirect = $this->request->getQuery('redirect',['controller' => 'users','action' => 'logout',]);


            }else{
                if ($result->user_type == '1') {
                $redirect = $this->request->getQuery('redirect', ['controller' => 'dashboard','action' => 'index',]);
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

    //----------------------------------------------Add--------------------------------------------//

    public function add()
    {
        $this->viewBuilder()->setLayout(null);


            $user = $this->Users->newEmptyEntity();
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));
                   return $this->redirect(['action' => 'login']);
                }else{
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

            $this->set(compact('user'));
        

    }
        //----------------------------------------------View--------------------------------------------//


    public function view($id = null)
    {
        $this->viewBuilder()->setLayout(null);

        $user = $this->Users->get($id, [
            'contain' => ['UserProfile'],
        ]);
        // pr($user);
        // die;

        $this->set(compact('user'));
    }

        //----------------------------------------------AdminView--------------------------------------------//

    public function adminview($id=null)
    {
        $this->viewBuilder()->setLayout(null);

        $user = $this->Authentication->getResult();
       
        if ($user && $user->isValid()) {
            
            $user = $this->Authentication->getIdentity();
            $id =$user->id;
            $user = $this->Users->get($id, [
                'contain' => ['UserProfile'],
            ]);
            $users = $this->request->getData();
            
            $users['id']=$id;
            // pr($id);
            // die;
            

        $this->set(compact('user'));
    }else{
        echo "fdgdf";
    }}
 


//     public function view($id=null)

//     {
//         $this->viewBuilder()->setLayout(null);

//         // $user =$this->Auth->identify();
//         // pr($user);
//         // die;
        
//         if ($user && $user->isValid()) {
//             $user = $this->Auth->getIdentity();
            
//             $id =$user->id;
//             $user = $this->Users->get($id, [
//                 'contain' => ['UserProfile'],
//             ]);
//             $users = $this->request->getData();
            
//             $users['id']=$id;
//             pr($users);
//             die;
            

//         $this->set(compact('user'));
//     }else{
//         echo "dsfdgfdg";
//     }
// } 
    // public function view($id = null)
    // {
    //     $user = $this->Users->get($id, [
    //         'contain' => ['UserProfile'],
    //     ]);

    //     $this->set(compact('user'));
    // }
       //-----------------------------Admin All Users Profile Edit-----------------------------//

       public function edit($id = null)
       {
        $this->viewBuilder()->setLayout(null);

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

                       //-----------------------------Modal Fetch User Detail During Edit-----------------------------//

public function updateProfile($id = null)
{
    // $this->Model = $this->loadModel('UserProfile');
    $id = $_GET['id'];
    $user = $this->Users->get($id, [
        'contain' => ['UserProfile']
    ]);
    echo json_encode($user);
    exit;
}


                       //-----------------------------Modal Edit Details-----------------------------//
    
    public function editProfile($id = null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $fileName2 = $this->request->getData("imagedd");
            $id = $this->request->getData("iddd");
            $user = $this->Users->get($id, [
                'contain' => ['UserProfile'],
            ]);
            $productImage = $this->request->getData('user_profile.profile_image');
            $fileName = $productImage->getClientFilename();
            if ($fileName == '') {
                $fileName = $fileName2;
            }
            $fileSize = $productImage->getSize();
            $data['user_profile']["profile_image"] = $fileName;
            $user = $this->Users->patchEntity($user, $data);
            // print_r($user);
            // die;
            // pr($user);
            // die;
            if ($this->Users->save($user)) {
                $hasFileError = $productImage->getError();

                if ($hasFileError > 0) {
                    $data['user_profile']["profile_image"] = "";
                } else {
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "upload/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data['user_profile']["profile_image"] = $fileName;
                    }
                }
                echo json_encode(array(
                    "status" => 1,
                    "message" => "The User has been saved.",
                ));
                exit;
            }
            echo json_encode(array(
                "status" => 0,
                "message" => "The User  could not be saved. Please, try again.",
            ));
            exit;
        }
        $users = $this->Users->UserProfile->find('list', ['limit' => 200])->all()->toArray();
        $this->set(compact('user', 'users'));
    }




//     public function editProfile($id = null)
//     {
//     //  $this->viewBuilder()->setLayout(null);

//         $result = $this->Authentication->getResult();
//         // pr

//         if ($result && $result->isValid()) {
//         $result = $this->Authentication->getIdentity();
//             if ($result->user_type == 1) {
         
//          $name = $this->request->getData("imagedd");
//          $id = $this->request->getData("iddd");
//         $user = $this->Users->get($id, ['contain' => ['UserProfile'],]);

//         if ($this->request->is(['patch', 'post', 'put'])) {
//             if (!$user->getErrors) {
//                 $image = $this->request->getData('user_profile.images');
//                 $name = $image->getClientFilename();
//                 $targetPath = WWW_ROOT . 'upload' . DS . $name;
//                 if ($name)
//                 $image->moveTo($targetPath);
//                 $user->user_profile->profile_image = $name;
//                 $user = $this->Users->patchEntity($user, $this->request->getData());
//             }
//                 if ($this->Users->save($user)) {
//                  echo json_encode(array(
//                      "status" => 1,
//                      "message" => "The User has been saved.",
//                  ));
//                  exit;
//             }
//             echo json_encode(array(
//              "status" => 0,
//              "message" => "The User  could not be saved. Please, try again.",
//          ));
//          exit;
//         }
//         $this->set(compact('user'));
//     }else{
//         return $this->redirect(['controller'=>'Products','action'=>'list']);
//     }
// }}
//     public function editProfile($id = null)
//     {
//     //  $this->viewBuilder()->setLayout(null);

        
//         // pr

        
//         if ($this->request->is(['patch', 'post', 'put'])) {
//          $name = $this->request->getData("imagedd");
//          $id = $this->request->getData("iddd");
//         $user = $this->Users->get($id,
//          ['contain' => ['UserProfile'],
//          ]);

//             if (!$user->getErrors) {
//                 $image = $this->request->getData('user_profile.images');
//                 $name = $image->getClientFilename();
//                 $targetPath = WWW_ROOT . 'upload' . DS . $name;
//                 if ($name)
//                 $image->moveTo($targetPath);
//                 $user->user_profile->profile_image = $name;
//                 $user = $this->Users->patchEntity($user, $this->request->getData());
//             }
//                 if ($this->Users->save($user)) {
//                  echo json_encode(array(
//                      "status" => 1,
//                      "message" => "The User has been saved.",
//                  ));
//                  exit;
//             }
//             echo json_encode(array(
//              "status" => 0,
//              "message" => "The User  could not be saved. Please, try again.",
//          ));
//          exit;
        
//         $this->set(compact('user'));
    
// }
// }

}
