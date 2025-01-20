<?php

namespace app\Controllers;

use app\Models\User;
use app\Models\Role;

class AuthController
{
    private $userModel;
    private $roleModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->roleModel = new Role();
    }


    public function signup()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && $_POST['submit'] == 'signup') {

            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $roleName = htmlspecialchars($_POST['role']);
            $password = htmlspecialchars($_POST['password']);

            $errors = [];

            if (empty($nom) || empty($prenom) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $errors['general'] = "Veuillez remplir tous les champs correctement.";
            }


            if (empty($password) || !preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
                echo  $errors['password'] = "Le mot de passe doit contenir au moins 8 caractères, une lettre et un chiffre.";
            }



            if (empty($errors)) {

                $this->userModel->setnom($nom);
                $this->userModel->setPrenom($prenom);
                $this->userModel->setnom($nom);
               $email= $this->userModel->setEmail($email);
                // $this->userModel->setRoleName($role),
              $password=  $this->userModel->setPassword($password);
                $this->userModel->setRole($this->roleModel->findByName($roleName));


                if ($this->userModel->create()) {
        

                  include './../app/Views/Login.php';
                }
            } else {
                echo $errors['general'];
            }
        } else {
            include_once('../app/Views/Signup.php');
        }
    }

    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] == strtolower('POST')  &&  $_POST['submit'] == 'login') {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $errors = [];

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo   $errors['email'] = "L'email n'est pas valide.";
            }

            if (empty($password) || !preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
                echo  $errors['password'] = "Le mot de passe doit contenir au moins 8 caractères, une lettre et un chiffre.";
            }


            if (empty($errors)) {


                $user = $this->userModel->login($email, $password);

                if ($user) {
                    $_SESSION['nom'] = $user->getNom();
                    $_SESSION['prenom'] = $user->getPrenom();
                    $_SESSION['email'] = $user->getEmail();
                    $_SESSION['role'] = $user->getRole();
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['user'] = $user;
                    
                    include './../app/Views/AdmineDashboard.php';
                }
            }
        } else {

            include_once('../app/Views/Login.php');
        }
    }

    public function logout()
    {

        session_unset();
        session_destroy();

        header('location: /cours/getAll');

        exit();
    }
}
