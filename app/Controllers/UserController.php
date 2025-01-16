<?php
namespace app\Controllers;


class UserController{

    public function index(){
        if (!isset($_SESSION['user'])) {
            include '../app/Views/Home.php';
        }else{
            include '../app/Views/404.php';
        }
        
    }







}























?>