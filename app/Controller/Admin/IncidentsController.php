<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class IncidentsController extends AppController{
    
    protected  $template = 'admin';

    public function __construct(){
        parent::__construct();
        $this->loadModel('Incident');
    }

    public function dashboard(){    

        if(isset($_POST['country_name_change'])){
            $_SESSION['country'] = $_POST['country_name_change'];
        }
        
        $country = $_SESSION['country'];
        var_dump($country);

        $CountryRegions = $this->Incident->AllRegionByCountry($country);
        $RegionIncidents = $this->Incident->AllIncidentsByRegion($country);
        
  
        $incidents = $this->Incident->AllWithCategory();

        $waiting_incidents = $this->Incident->AllWithCategoryWaiting();
        $verified_incidents = $this->Incident->AllWithCategoryVerified();

        $nbr_incidents = count($incidents);
        $nbr_waiting = count($waiting_incidents);
        $nbr_verified = count($verified_incidents);
        
        $this->loadModel('Country');
        $countries = $this->Country->extract('id', 'country_name');
        
        $this->loadModel('Region');
        $regions = $this->Region->extract('id', 'region_name');
        
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'category_name');

        $form = new BootstrapForm($_POST);
        
        $this->render('admin.incidents.dashboard', compact('form', 'categories', 'countries', 'regions', 'errors', 'incidents', 'nbr_incidents', 'nbr_verified', 'CountryRegions', 'RegionIncidents', 'country'));
    }

    public function add(){
        $errors = false;
        if (!empty($_POST)) {      

            $result = $this->Incident->create([
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
        
        
        $form = new BootstrapForm($_POST);
        $this->render('admin.incidents.edit', compact('form', 'categories', 'countries', 'regions', 'circles', 'towns', 'errors'));
    }

    public function edit(){
        $errors = false;
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
                return $this->show();
            }    
        }
        $incident = $this->Incident->find($_GET['id']);

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
        
        $form = new BootstrapForm($incident);
        $this->render('admin.incidents.edit', compact('form', 'categories', 'countries', 'regions', 'cirlces', 'towns', 'errors'));
    }

    public function validate(){
        $message = [];
        if (!empty($_GET)) {      
            $result = $this->Incident->update($_GET['id'], [
                'state' => 1
            ]);
            if($result){
                //return $this->index();
                $message = ['type' => 'success', 'label' => '<strong>Parfait !</strong> L\'incident a été marqué comme vérifié.'];
            }    
        }
        $incident = $this->Incident->find($_GET['id']);

        $this->loadModel('Country');
        $countries = $this->Country->extract('id', 'country_name');
        
        $this->loadModel('Region');
        $regions = $this->Region->extract('id', 'region_name');
        
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'category_name');


        $form = new BootstrapForm($incident);
        $this->render('admin.incidents.show', compact('form', 'categories', 'countries', 'regions', 'message', 'incident'));
    }

    public function unvalidate(){
        $message = [];
        if (!empty($_GET)) {      
            $result = $this->Incident->update($_GET['id'], [
                'state' => 0
            ]);
            if($result){
                //return $this->index();
                $message = ['type' => 'danger', 'label' => '<strong>Note !</strong> L\'incident a été marqué comme non vérifié.'];
            }    
        }
        $incident = $this->Incident->find($_GET['id']);

        $this->loadModel('Country');
        $countries = $this->Country->extract('id', 'country_name');
        
        $this->loadModel('Region');
        $regions = $this->Region->extract('id', 'region_name');
        
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'category_name');

        $form = new BootstrapForm($incident);
        $this->render('admin.incidents.show', compact('form', 'categories', 'countries', 'regions', 'message', 'incident'));
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
        
        $form = new BootstrapForm($incident);
        $this->render('admin.incidents.show', compact('form', 'categories', 'countries', 'regions', 'message', 'incident'));
    }

    public function index(){
        $incidents = $this->Incident->AllWithCategory();
        $form = new BootstrapForm($_POST);
        $this->render('admin.incidents.index', compact('form', 'incidents'));
    }

    public function region(){

        $country = 'Mali';
        $region = $_GET['region_name'];

        $CountryRegions = $this->Incident->AllRegionByCountry($country);
        $RegionIncidents = $this->Incident->FindIncidentsByRegion($country, $region);
  
        $incidents = $this->Incident->AllWithCategory();

        $waiting_incidents = $this->Incident->AllWithCategoryWaiting();
        $verified_incidents = $this->Incident->AllWithCategoryVerified();

        $nbr_incidents = count($incidents);
        $nbr_waiting = count($waiting_incidents);
        $nbr_verified = count($verified_incidents);
        
        $this->loadModel('Country');
        $countries = $this->Country->extract('id', 'country_name');
        
        $this->loadModel('Region');
        $regions = $this->Region->extract('id', 'region_name');
        
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'category_name');

        $this->loadModel('Country');
        $country = $this->Country->findByName($country);

        $this->loadModel('Region');
        $region = $this->Region->findByName($region);
        
        
        $this->loadModel('Gouvernance');
        $indices = $this->Gouvernance->AllIndiceByRegionAndCountry($country->id, $region->id);
        

        $this->render('admin.incidents.region', compact('form', 'incidents', 'RegionIncidents', 'CountryRegions', 'indices'));
    }

    public function waiting(){
        $incidents = $this->Incident->AllWithCategoryWaiting();
        $form = new BootstrapForm($_POST);
        $this->render('admin.incidents.waiting', compact('form', 'incidents'));
    }

    public function verified(){
        $incidents = $this->Incident->AllWithCategoryVerified();
        $form = new BootstrapForm($_POST);
        $this->render('admin.incidents.waiting', compact('form', 'incidents'));
    }

    public function delete(){
        if (!empty($_GET)) {
            $result = $this->Incident->delete($_GET['id']);
            return $this->index();
        }
    }

}