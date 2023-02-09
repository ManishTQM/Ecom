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
class AdminController extends AppController
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
        $this->Authentication->addUnauthenticatedActions(['adminlogin']);
    }

    public $paginate = ['limit'=>8];
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

     public function index()
     {
 
     } 

    public function adminlogin()
    {

        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result && $result->isValid()) {
            // $email = $this->request->getData('email');
            // $users = TableRegistry::get("Users");
            // $data = $users->find('all')->where(['email' => $email])->first();

            // $session = $this->getRequest()->getSession();
            // $session->write('email', $data->email);
            $result = $this->Authentication->getIdentity();
            if ($result['status']=='2') {
                $this->Flash->error(__('Your Account Deactivate Please Contact Us Customer Care'));
                $redirect = $this->request->getQuery('redirect',['controller' => 'users','action' => 'logout',]);


            }else{
                if ($result->user_type == '1') {
                $redirect = $this->request->getQuery('redirect', ['controller' => 'users','action' => 'index',]);
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
