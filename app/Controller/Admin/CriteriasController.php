<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class CriteriasController extends AppController{
    
    protected  $template = 'admin';

    public function __construct(){
        parent::__construct();
        $this->loadModel('Criteria');
    }

    public function index(){
        $criterias = $this->Criteria->all();
        $this->render('admin.criterias.index', compact('criterias'));
    }

    public function add(){
        if (!empty($_POST)) {
            $result = $this->Criteria->create([
                'criteria_name' => $_POST['criteria_name']
            ]);
            if($result){
                return $this->index();
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.criterias.edit', compact('form'));
    }


    public function edit(){
        $id = $_GET['id'];
        $circle_id = $_GET['circle_id'];
        if (!empty($_POST) && isset($id)) {
            $result = $this->Criteria->update($id, [
                'criteria_name' => $_POST['criteria_name'],
            ]);
            if($result){
                return $this->index();
            }
        }

        $criteria = $this->Criteria->find($id);
        $form = new BootstrapForm($criteria);
        $this->render('admin.criterias.edit', compact('form', 'criteria'));
    }

    public function delete(){
        if (!empty($_GET)) {
            $result = $this->Town->delete($_GET['town_id']);
            return $this->index();
        }
    }
}