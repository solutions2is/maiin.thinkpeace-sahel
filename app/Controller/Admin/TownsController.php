<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class TownsController extends AppController{
    
    protected  $template = 'admin';

    public function __construct(){
        parent::__construct();
        $this->loadModel('Town');
    }

    public function index(){
        $circle_id = $_GET['circle_id'];
        $towns = $this->Town->AllTownsByCircle($circle_id);

        if (!empty($_POST) && !empty($_POST['town_name'])) {
            $result = $this->Town->create([
                'town_name' => $_POST['town_name'],
                'circle_id'  => $circle_id  
            ]);
            if($result){
                header("Refresh:0");
            }
        }

        $this->loadModel('Circle');
        $circle = $this->Circle->find($circle_id);

        $form = new BootstrapForm($_POST);
        $this->render('admin.towns.index', compact('towns', 'circle', 'region', 'form'));
    }

    public function edit(){
        $town_id = $_GET['town_id'];
        $circle_id = $_GET['circle_id'];
        if (!empty($_POST) && isset($town_id)) {
            $result = $this->Town->update($town_id, [
                'town_name' => $_POST['town_name'],
            ]);
        }

        $this->loadModel('Circle');
        $circle = $this->Circle->find($_GET['circle_id']);
        $town = $this->Town->find($_GET['town_id']);
        $form = new BootstrapForm($town);
        $this->render('admin.towns.edit', compact('form', 'circle', 'town'));
    }

    public function delete(){
        if (!empty($_GET)) {
            $result = $this->Town->delete($_GET['town_id']);
            return $this->index();
        }
    }
}