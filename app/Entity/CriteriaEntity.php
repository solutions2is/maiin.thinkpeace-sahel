<?php
namespace App\Entity;

use Core\Entity\Entity;

class CriteriaEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=posts.category&id=' . $this->id;
    }

}