<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class UsersController extends AppController{

    protected  $template = 'admin';

    public function __construct(){
        parent::__construct();
        $this->loadModel('User');
    }

    public function dashboard(){

        $this->render('admin.users.dashboard');
    }

    public function index(){
        $users = $this->User->all();
        $this->render('admin.users.index', compact('users'));
    }

    public function add(){
        $errors = false;
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

        $this->loadModel('Usertype');
        $usertypes = $this->Usertype->extract('id', 'type_name');

        $form = new BootstrapForm($_POST);
        $this->render('admin.users.edit', compact('form', 'usertypes'));
    }

    public function edit(){
        if (!empty($_POST)) {
            $user_id = $_GET['id'];
            
            $user_data = $this->Userdata->find_data($user_id);
            $user_data_id = $user_data->id;

            $result = $this->User->Update($_GET['id'], [
                'username' => $_POST['username']
            ]);

        }
        if(!empty($_POST['password']) && ($_POST['password'] === $_POST['password_conf'])){
            $password = sha1($_POST['password']);
            $result = $this->User->Update($_GET['id'], [
                'password' => $password
            ]);
        }else{
            $message = ['type' => 'danger', 'label' => '<strong>Attention !</strong> Les mots de passes ne correspondent pas.'];
        }
        $user = $this->User->find_user($_GET['id']);
        
        $this->loadModel('Group');
        $groups = $this->Group->extract('id', 'name');
        
        $this->loadModel('Assurance');
        $assurances = $this->Assurance->extract('id', 'name');
        
        $form = new BootstrapForm($user);
        $this->render('admin.users.edit', compact('form', 'user', 'groups', 'assurances'));
    }

    public function delete(){
        if (!empty($_GET)) {
            $result = $this->User->delete($_GET['id']);
            if ($result) {
                $user_data = $this->Userdata->find_data($_GET['id']);
                $user_data_id = $user_data->id;
                $result_data = $this->Userdata->delete($user_data_id);
                if ($result_data) {
                    header('Location: index.php?p=admin.users.index');
                }
            }
        }
    }
}