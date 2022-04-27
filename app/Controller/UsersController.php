<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;
use \App;

class UsersController extends AppController {
    protected  $template = 'login';

    public function __construct(){
        parent::__construct();
        $this->loadModel('User');
    }

    public function login(){
        $errors = false;
        if(!empty($_POST)){
            $auth = new DBAuth(App::getInstance()->getDb());
            if($auth->login($_POST['username'], $_POST['password'])){
                //$this->debug_var($auth->login($_POST['username'], $_POST['password']));
                //die();
                header('Location: index.php?p=admin.incidents.dashboard');
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }


    public function signup(){
        $errors = false;
        //$time = date("Y-m-d H:i:s", 580867200);
        //$this->debug_var($time);
        //die();
        if (!empty($_POST)) {            
            if($_POST['password'] === $_POST['password_conf']){
                $password = sha1($_POST['password']);
                $result = $this->User->create([
                    'username' => $_POST['username'],
                    'password' => $password
                ]);
            }else{
                $errors = true;
            }
            
        }
        $this->loadModel('Group');
        $groups = $this->Group->extract('id', 'name');
        $form = new BootstrapForm($_POST);
        $this->render('users.signup', compact('form', 'errors', 'groups'));
    }

    public function logout(){
        //session_destroy();
        unset($_SESSION['auth']);
        if (empty($_SESSION['auth'])) {
            header('Location: index.php?p=users.login');
        }
    }

}