<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class CirclesController extends AppController{
    
    protected  $template = 'admin';

    public function __construct(){
        parent::__construct();
        $this->loadModel('Circle');
    }

    public function index(){
        //$country_id = $_GET['id'];
        $region_id = $_GET['region_id'];
        $circles = $this->Circle->AllCircleByRegionId($region_id);

        if (!empty($_POST) && !empty($_POST['circle_name'])) {
            $result = $this->Circle->create([
                'circle_name' => $_POST['circle_name'],
                'region_id'  => $region_id  
            ]);
            if($result){
                header("Refresh:0");
            }
        }

        $this->loadModel('Region');
        $region = $this->Region->find($region_id);

        $form = new BootstrapForm($_POST);
        $this->render('admin.circles.index', compact('circles', 'region', 'form'));
    }

    public function edit(){
        $circle_id = $_GET['circle_id'];
        $region_id = $_GET['region_id'];
        if (!empty($_POST) && isset($circle_id)) {
            $result = $this->Circle->update($circle_id, [
                'circle_name' => $_POST['circle_name'],
            ]);
            if($result){
                //header("Refresh:0");
                //return $this->index();
            }
        }

        $this->loadModel('Region');
        $region = $this->Region->find($region_id);

        $circle = $this->Circle->find($_GET['circle_id']);
        $form = new BootstrapForm($circle);
        $this->render('admin.circles.edit', compact('form', 'region', 'circle'));
    }

    public function delete(){
        if (!empty($_GET)) {
            $result = $this->Circle->delete($_GET['circle_id']);
            return $this->index();
        }
    }
}