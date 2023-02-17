<?php

namespace App\Controller;

use App\Controller\AppController;

class UserController extends AppController
{
    public function beforeFilter($event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout("index");

        // $this->Authentication->addUnauthenticatedActions(['login']);
        // $this->loadModel("Users");

    }
    public function billing(){
        // $this->autoRender=false;
        // echo "hii";

    }
    public function dashboard(){
        // $this->viewBuilder()->setLayout(null);

        // $this->autoRender=false;
        // echo "hii";

    }
    public function icons(){
        // $this->autoRender=false;
        // echo "hii";

    }
    public function map(){
        // $this->autoRender=false;
        // echo "hii";

    }
    public function notifications(){
        // $this->autoRender=false;
        // echo "hii";

    }
    public function profile(){
        // $this->autoRender=false;
        // echo "hii";

    }
    public function rtl(){
        // $this->autoRender=false;
        // echo "hii";

    }
    public function signIn(){
        // $this->autoRender=false;
        // echo "hii";

    }
    public function signUp(){
        // $this->autoRender=false;
        // echo "hii";

    }
    public function tables(){
        // $this->autoRender=false;
        // echo "hii";

    }
    // public function template(){
    //     // $this->autoRender=false;
    //     // echo "hii";

    // }
    public function typography(){
        // $this->autoRender=false;
        // echo "hii";

    }
    public function virtualReality(){
        // $this->autoRender=false;
        // echo "hii";

    }
   
}