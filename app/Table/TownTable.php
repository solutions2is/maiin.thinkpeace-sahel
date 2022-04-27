<?php
namespace App\Table;

use Core\Table\Table;

class TownTable extends Table{

    protected $table = "towns";

    public function AllTownsByCircle($circleId){
        return $this->query("
        SELECT towns.id, town_name FROM towns
        LEFT JOIN circles ON towns.circle_id = circles.id
        WHERE circle_id = ?", [$circleId]);
    }

}