<?php
namespace App\Table;

use Core\Table\Table;

class CountryTable extends Table{

    protected $table = "countries";

    public function delete_region ($region_id, $thiscountry_id){
        return $this->query("
        DELETE FROM regions 
        WHERE id = ? 
        AND country_id = ?", [$region_id, $thiscountry_id], true);
    }

    public function FindByName($country_name){
        return $this->query("
        SELECT countries.id, country_name FROM countries
        WHERE country_name = ?", [$country_name], true);
    }

}