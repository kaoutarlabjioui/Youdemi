<?php

namespace app\Controllers;
use app\Models\User;

class AuthController{
    private $userModel ;

    public function __construct(){
        $this->userModel = new User ();
    }


    public function signup(){

        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'signup'){

            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $errors=[];

          if(empty($nom) || empty($prenom) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($password)){

            $errors['general']= "Veuillez remplir tous les champs correctement.";
          }
                if(empty($errors)){

                    $this->userModel->setnom($nom);
                    $this->userModel->setPrenom($prenom);
                    $this->userModel->setnom($nom);
                    $this->userModel->setEmail($email);
                    $this->userModel->setPassword($password);

                    if($this->userModel){
                        
                    }

                }

        }
        else{
            include_once('../app/Views/Signup.php');
        }
                


    }













    public function login(){

        if( $_SERVER['REQUEST_METHOD']=='POST'  &&  $_POST['submit'] =='login') {
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


            }
        }


        }else {
            
            include_once('../app/Views/Login.php');
        }
    }

    // public function logout(){


    // }

}

?>