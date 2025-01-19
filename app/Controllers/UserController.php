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
            // include '../app/Views/AdmineDashboard.php';
            // include '../app/Views/layout/Admin/UsersTable.php';
            $users=$this->userModel->display();
            include '../app/Views/AdmineDashboard.php';
            include '../app/Views/layout/Admin/UsersTable.php';
        }

    }

    public function update(){
        if ($_SERVER["REQUEST_METHOD"]) {
            $this->userModel->setStatus($_POST['status']);
            $this->userModel->setId($_POST['id']);
            $this->userModel->updateStatus();
            header('location:../');

        }
    }


    // public function display(){

    //     $role=$_SESSION['role'];
    //     $users=  $this->userModel->display();


    // if( $users){
    //     header('Location:../../');
         
    //    }

    // }

    public function  delete($id){
      $result=  $this->userModel->delete($id);

       if($result){
        header('Location:../../');
            exit();
       }



    }





}























?>