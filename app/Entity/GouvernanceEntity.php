<?php
namespace App\Entity;

use Core\Entity\Entity;

class GouvernanceEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=gouvernances.country&id=' . $this->id;
    }

}