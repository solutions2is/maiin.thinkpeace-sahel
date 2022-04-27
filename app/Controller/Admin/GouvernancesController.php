<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class GouvernancesController extends AppController{
    
    protected  $template = 'admin';

    public function __construct(){
        parent::__construct();
        $this->loadModel('Gouvernance');
    }

    public function add(){
        $errors = false;
        if (!empty($_POST)) {

            $result = $this->Gouvernance->create([
                'criteria_id' => $_POST['criteria_id'],
                'criteria_value'    => $_POST['criteria_value'],
                'country_id' => $_POST['country_id'],
                'region_id' => $_POST['region_id'],
                'circle_id' => $_POST['circle_id'],
                'town_id' => $_POST['town_id']
            ]);
            if($result){
                return $this->index();
            }    
        }        
        $this->loadModel('Country');
        $countries = $this->Country->extract('id', 'country_name');
        
        $this->loadModel('Region');
        $regions = $this->Region->extract('id', 'region_name');

        $this->loadModel('Circle');
        $circles = $this->Circle->extract('id', 'circle_name');

        $this->loadModel('Town');
        $towns = $this->Town->extract('id', 'town_name');
        
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'category_name');

        $this->loadModel('Criteria');
        $criterias = $this->Criteria->extract('id', 'criteria_name');
        
        $form = new BootstrapForm($_POST);
        $this->render('admin.gouvernances.edit', compact('form', 'categories', 'countries', 'regions', 'circles', 'towns', 'errors', 'criterias'));
    }

    public function edit(){
        $errors = false;
        if (!empty($_POST)) {      

            $result = $this->Gouvernance->update($_GET['id'], [
                'criteria_id' => $_POST['criteria_id'],
                'criteria_value'    => $_POST['criteria_value'],
                'country_id' => $_POST['country_id'],
                'region_id' => $_POST['region_id'],
                'circle_id' => $_POST['circle_id'],
                'town_id' => $_POST['town_id']
            ]);
            if($result){
                return $this->index();
            }    
        }
        $gouvernance = $this->Gouvernance->find($_GET['id']);

        $this->loadModel('Country');
        $countries = $this->Country->extract('id', 'country_name');
        
        $this->loadModel('Region');
        $regions = $this->Region->extract('id', 'region_name');
        
        $this->loadModel('Circle');
        $circles = $this->Circle->extract('id', 'circle_name');

        $this->loadModel('Town');
        $towns = $this->Town->extract('id', 'town_name');
        
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'category_name');

        $this->loadModel('Criteria');
        $criterias = $this->Criteria->extract('id', 'criteria_name');
        
        $form = new BootstrapForm($gouvernance);
        
        $this->render('admin.gouvernances.edit', compact('form', 'categories', 'countries', 'regions', 'circles', 'towns', 'errors', 'criterias'));
    }

    public function show(){
        $message = [];
        if (!empty($_POST)) {      

            $result = $this->Incident->update($_GET['id'], [
                'title' => $_POST['title'],
                'incident_cat_id' => $_POST['incident_cat_id'],
                'damage' => $_POST['damage'],
                'country_id' => $_POST['country_id'],
                'region_id' => $_POST['region_id'],
                'circle_id' => $_POST['circle_id'],
                'town_id' => $_POST['town_id'],
                'content' => $_POST['content']
            ]);
            if($result){
                return $this->index();
            }    
        }
        $incident = $this->Incident->find($_GET['id']);

        $this->loadModel('Country');
        $countries = $this->Country->extract('id', 'country_name');
        
        $this->loadModel('Region');
        $regions = $this->Region->extract('id', 'region_name');
        
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'category_name');

        $this->loadModel('Criteria');
        $criterias = $this->Criteria->extract('id', 'criteria_name');
        
        $form = new BootstrapForm($incident);
        $this->render('admin.gouvernances.show', compact('form', 'categories', 'countries', 'regions', 'message', 'incident', 'criterias'));
    }

    public function index(){
        $gouvernances = $this->Gouvernance->AllWithLocality();
        $form = new BootstrapForm($_POST);
        $this->render('admin.gouvernances.index', compact('form', 'gouvernances'));
    }

    public function delete(){
        if (!empty($_GET)) {
            $result = $this->Gouvernance->delete($_GET['id']);
            return $this->index();
        }
    }

}