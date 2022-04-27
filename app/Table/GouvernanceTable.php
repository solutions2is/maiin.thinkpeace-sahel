<?php
namespace App\Table;

use Core\Table\Table;

class GouvernanceTable extends Table{

    protected $table = "gouvernance_indices";

    public function AllWithLocality(){
        return $this->query("
        SELECT 
            gouvernance_indices.id, 
            countries.country_name, 
            regions.region_name, 
            circles.circle_name, 
            towns.town_name,
            criterias.criteria_name,
            criteria_value
        FROM gouvernance_indices
        LEFT JOIN countries ON countries.id = gouvernance_indices.country_id
        LEFT JOIN regions ON regions.id = gouvernance_indices.region_id
        LEFT JOIN circles ON circles.id = gouvernance_indices.circle_id
        LEFT JOIN towns ON towns.id = gouvernance_indices.town_id
        LEFT JOIN criterias ON criterias.id = gouvernance_indices.criteria_id");
    }

    public function AllIndiceByRegionAndCountry($country, $region){
        return $this->query("
        SELECT 
            gouvernance_indices.criteria_id, 
            criterias.criteria_name, 
            gouvernance_indices.criteria_value 
        FROM gouvernance_indices
        LEFT JOIN countries ON countries.id = gouvernance_indices.country_id
        LEFT JOIN regions ON regions.id = gouvernance_indices.region_id
        LEFT JOIN criterias ON criterias.id = gouvernance_indices.criteria_id
        WHERE gouvernance_indices.country_id = ? AND gouvernance_indices.region_id = ?", [$country, $region]);
    }


}