<?php
namespace App\Entity;

use Core\Entity\Entity;

class UsertypeEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=posts.category&id=' . $this->id;
    }

}