<?php
namespace app\Controllers;


class ErrorController{



    public function index()
    {
        $this->error();
    }

    public function error()
    {
        include_once '../app/Views/404.php';

    }











}








?>