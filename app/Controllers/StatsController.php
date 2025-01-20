<?php

namespace app\Controllers;

use app\Models\Cours;


class StatsController{

 private Cours $coursModel;

public function __construct(){
     
    $this->coursModel =  new Cours ();
}


// public function totalCours(){

// $stCours = $this->coursModel->getCoursCount();

// include './../app/Views/layout/stats.php';

// }

    
}







?>