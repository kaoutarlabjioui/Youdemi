<?php

namespace app\Controllers;

use app\Models\Cours;

class CoursController{

    private Cours $coursModel;

    
    public function __construct(){
        $this->coursModel = new Cours ();
    }


    public function index(){
       $cours= $this->coursModel->getAll();
          $role=$_SESSION["role"];
         include '../app/Views/AdmineDashboard.php';
         include '../app/Views/layout/Cours/CoursTable.php';
    }
}