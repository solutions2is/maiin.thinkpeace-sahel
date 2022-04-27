<?php
namespace App\Entity;

use Core\Entity\Entity;

class IncidentEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=incidents.country&id=' . $this->id;
    }

}