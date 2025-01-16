<?php

namespace app\Controllers;
use app\Models\User;

class AuthController{
    private $userModel ;

    public function __construct(){
        $this->userModel = new User ();
    }

    public function login(){

        if( $_SERVER['REQUEST_METHOD']=='POST'  &&  $_POST['submit']=='login') {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $errors=[];

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($password)) {
                $errors['general'] = "Veuillez remplir tous les champs correctement.";
            }
            
            if(empty($errors)){
                
                $user=$this->userModel->login($email,$password);
              
                if($user){
                $_SESSION['nom']= $user->getNom();
                $_SESSION['prenom']= $user->getPrenom();
                $_SESSION['email']=$user->getEmail();
                $_SESSION['role']=$user->getRole();
                $_SESSION['user_id']=$user->getId();
                $_SESSION['user']=$user;

                header("location: ../../app/Views/.php");




            }
        }


        }else {
            
            include_once('../app/Views/Login.php');
        }
    }



}

?>