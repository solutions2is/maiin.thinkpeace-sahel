<?php
namespace App\Table;

use Core\Table\Table;

class IncidentTable extends Table{

    protected $table = 'incidents';

    public function AllWithCategory(){
        return $this->query("
            SELECT incidents.id, incidents.title, incidents.content, incidents.incident_cat_id, incidents.state, incidents.damage, incident_categories.category_name as categorie
            FROM incidents
            LEFT JOIN incident_categories ON incident_cat_id = incident_categories.id");
    }

    public function AllWithCategoryWaiting(){
        return $this->query("
            SELECT incidents.id, incidents.title, incidents.content, incidents.incident_cat_id, incidents.state, incidents.damage, incident_categories.category_name as categorie
            FROM incidents
            LEFT JOIN incident_categories ON incident_cat_id = incident_categories.id
            WHERE incidents.state = 0");
    }

    public function AllWithCategoryVerified(){
        return $this->query("
            SELECT incidents.id, incidents.title, incidents.content, incidents.incident_cat_id, incidents.state, incidents.damage, incident_categories.category_name as categorie
            FROM incidents
            LEFT JOIN incident_categories ON incident_cat_id = incident_categories.id
            WHERE incidents.state = 1");
    }

    public function AllRegionByCountry($country){
        return $this->query("
        SELECT regions.id, region_name FROM regions
        LEFT JOIN countries ON regions.country_id = countries.id
        WHERE country_name = ?", [$country]);
    }

    public function AllIncidentsByRegion($country){
        return $this->query("
        SELECT region_name, region_id, country_name, incidents.id FROM incidents
        LEFT JOIN countries ON countries.id = incidents.country_id
        LEFT JOIN regions ON regions.id = incidents.region_id
        WHERE country_name = ?", [$country]);
    }

    public function FindIncidentsByRegion($country, $region){
        return $this->query("
        SELECT incidents.id, incidents.title, incidents.content, incidents.incident_cat_id, incidents.state, incidents.damage, incident_categories.category_name as categorie, region_name, region_id, country_name 
        FROM incidents
        LEFT JOIN countries ON countries.id = incidents.country_id
        LEFT JOIN regions ON regions.id = incidents.region_id
        LEFT JOIN incident_categories ON incidents.incident_cat_id = incident_categories.id
        WHERE country_name = ? AND region_name = ? ", [$country, $region]);
    }

    /*public function FindIncidentsByRegion($country, $region){
        return $this->query("
        SELECT region_name, region_id, country_name, incidents.id FROM incidents
        LEFT JOIN countries ON countries.id = incidents.country_id
        LEFT JOIN regions ON regions.id = incidents.region_id
        WHERE country_name = ? AND region_name = ? ", [$country, $region]);
    }*/

}