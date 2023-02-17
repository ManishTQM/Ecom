<?php

namespace App\Controller;

use App\Controller\AppController;

class TablesController extends AppController
{
    public function beforeFilter($event)
    {
        parent::beforeFilter($event);
        // $this->viewBuilder()->setLayout("index");

        // $this->Authentication->addUnauthenticatedActions(['login']);
        // $this->loadModel("Users");

    }
    public function index(){
        // $this->autoRender=false;
        // echo "hii";

    }
   
}
