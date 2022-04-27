<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class CountriesController extends AppController{

    protected  $template = 'admin';

    public function __construct(){
        parent::__construct();
        $this->loadModel('Country');
    }

    public function index(){
        $countries = $this->Country->all();
        $this->render('admin.countries.index', compact('countries'));
    }

    public function add(){
        if (!empty($_POST)) {
            $result = $this->Country->create([
                'country_name' => $_POST['country_name']
            ]);
            if($result){
                return $this->index();
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.countries.edit', compact('categories', 'form'));
    }

    public function edit(){
        if (!empty($_POST)) {
            $result = $this->Country->update($_GET['id'], [
                'country_name' => $_POST['country_name']
            ]);
            if($result){
                return $this->index();
            }
        }
        $country = $this->Country->find($_GET['id']);
        $form = new BootstrapForm($country);
        $this->render('admin.countries.edit', compact('categories', 'form'));
    }

    public function region_edit(){
        $region_id = $_GET['region_id'];
        $this->loadModel('Region');
        if (!empty($_POST)) {
            
            $result = $this->Region->update($region_id, [
                'region_name' => $_POST['region_name']
            ]);
        
            if($result){
                return $this->show();
            }
        }
        $country = $this->Country->find($_GET['id']);
        $region = $this->Region->find($region_id);
        $form = new BootstrapForm($region);
        $this->render('admin.countries.region_edit', compact('categories', 'form', 'country'));
    }


    public function show(){
        if (!empty($_GET)) {
            $CountryId = $_GET['id'];
        }else{
            $CountryId = 0;
        }
        if (!empty($_POST)) {
            $this->loadModel('Region');
            $result = $this->Region->create([
                'region_name' => $_POST['region_name'],
                'country_id'  => $CountryId  
            ]);
        }
        $this->loadModel('Region');
        $CountryRegions = $this->Region->AllRegionByCountryId($CountryId);
        $country = $this->Country->find($_GET['id']);
        $form = new BootstrapForm($_POST);
        $this->render('admin.countries.show', compact('CountryRegions', 'form', 'country'));
        
    }

    public function region_delete(){
        if (!empty($_GET)) {
            var_dump($_GET);
            $region_id = $_GET['region_id'];
            $country_id = $_GET['country_id'];
            $this->loadModel('Region');
            $result = $this->Region->delete($region_id);
            return $this->show();
        }
    }

    public function delete(){
        if (!empty($_GET)) {
            $result = $this->Country->delete($_GET['id']);
            return $this->index();
        }
    }

}