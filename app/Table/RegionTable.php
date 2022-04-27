<?php
namespace App\Table;

use Core\Table\Table;

class RegionTable extends Table{

    protected $table = "regions";

    public function AllIncidentsByRegion($country){
        return $this->query("
        SELECT region_name, region_id, country_name, incidents.id FROM incidents
        LEFT JOIN countries ON countries.id = incidents.country_id
        LEFT JOIN regions ON regions.id = incidents.region_id
        WHERE country_name = ?", [$country]);
    }

    public function AllRegionByCountry($country){
        return $this->query("
        SELECT regions.id, region_name FROM regions
        LEFT JOIN countries ON regions.country_id = countries.id
        WHERE country_name = ?", [$country]);
    }

    public function AllRegionByCountryId($countryId){
        return $this->query("
        SELECT regions.id, region_name FROM regions
        LEFT JOIN countries ON regions.country_id = countries.id
        WHERE country_id = ?", [$countryId]);
    }

    public function FindByName($region_name){
        return $this->query("
        SELECT regions.id, region_name FROM regions
        WHERE region_name = ?", [$region_name], true);
    }

}