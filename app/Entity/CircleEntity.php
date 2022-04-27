<?php
namespace App\Entity;

use Core\Entity\Entity;

class CircleEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=incidents.country&id=' . $this->id;
    }

}