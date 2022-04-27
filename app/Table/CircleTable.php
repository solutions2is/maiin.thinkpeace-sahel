<?php
namespace App\Table;

use Core\Table\Table;

class CircleTable extends Table{

    protected $table = "circles";

    public function AllCircleByRegionId($regionId){
        return $this->query("
        SELECT circles.id, circle_name FROM circles
        LEFT JOIN regions ON circles.region_id = regions.id
        WHERE region_id = ?", [$regionId]);
    }

}