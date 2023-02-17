<?php

namespace App\Controller;

use App\Controller\AppController;

class DashboardController extends AppController
{   
    public function beforeFilter($event)
    {
        parent::beforeFilter($event);
        // $this->loadComponent('Authentication.Authentication');

        //  $this->Authentication->addUnauthenticatedActions(['index']);

        // $this->viewBuilder()->setLayout("index");

        // $this->Authentication->addUnauthenticatedActions(['login']);
        // $this->loadModel("Users");

    }
    public function index(){
        // $this->autoRender=false;
        // echo "hii";

    }
    
   
}