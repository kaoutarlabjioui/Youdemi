<?php
namespace app\Controllers;
use app\Models\User;


class UserController{

    private $userModel;

    public function __construct(){
        $this->userModel = new User ();
    }



    public function index(){
        if (!isset($_SESSION['user'])) {
            include '../app/Views/Home.php';
        }else{
            $role=$_SESSION['role'];
            $users=$this->userModel->display();
            $user=$this->userModel->delete($this->userModel->getId());
            include '../app/Views/AdmineDashboard.php';
            include '../app/Views/layout/Admin/UsersTable.php';
        }

    }



    public function display(){


      $this->userModel->display();

    }

    public function  delete(){
        $this->userModel->delete($this->userModel->getId());
    }





}























?>