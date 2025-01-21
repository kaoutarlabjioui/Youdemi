<?php
namespace app\Controllers;
use app\Models\User;

use app\Models\Cours;
use app\Models\Categorie;
use app\Models\Tag;

class UserController{

    private $userModel;
    private Cours $coursModel;
    private Categorie $categories;
    private Tag $tags;

    public function __construct(){
        $this->userModel = new User ();
        $this->coursModel = new Cours();
        $this->categories = new Categorie();
        $this->tags = new Tag();
    }



    public function index(){
        if (!isset($_SESSION['user'])) {
            $cours = $this->coursModel->getAll();
            include '../app/Views/Home.php';
        }else{
            $role=$_SESSION['role'];
            // var_dump($role);
            // die;
            $totalCours=$this->coursModel->getCoursCount();
            $totalUsers=$this->userModel->getUserCount();
            $totalEnseignant=$this->userModel->getEnseignantCount();
            include '../app/Views/AdmineDashboard.php';
            switch ($role->getId()) {
                case 1:
                    $users=$this->userModel->display();
                   include '../app/Views/layout/Admin/UsersTable.php';
                    break;
                case 2:
                    $users=$this->userModel->getMyStudent($_SESSION['user_id']);
                    include '../app/Views/layout/Enseignant/UsersTable.php';
                break;
               case 3;
                $cours = $this->coursModel->getAll();
                $categories = $this->categories->display();
                $tags = $this->tags->display();
                include '../app/Views/layout/Cours/CoursTable.php';
                    break;
            }
        }

    }

    public function update(){
        if ($_SERVER["REQUEST_METHOD"]) {
            $this->userModel->setStatus($_POST['status']);
            $this->userModel->updateStatus($_POST['id']);
            header('location:../');

        }
    }


    public function  delete($id){
      $result=  $this->userModel->delete($id);

       if($result){
        header('Location:../../');
            exit();
       }



    }

    public function activateEnseignant(){
        if($_SESSION['role']->getId() == 1){
            $totalCours=$this->coursModel->getCoursCount();
            $totalUsers=$this->userModel->getUserCount();
            $totalEnseignant=$this->userModel->getEnseignantCount();
            include '../app/Views/AdmineDashboard.php';
            $users=$this->userModel->getEnseignantinactive();
            include '../app/Views/layout/Enseignant/EnseignantTable.php';
        }
    }

    public function activate($id){
        $test=$this->userModel->updateStatus($id);
        if($test){
            header('location:/user/activateEnseignant');
        }else{
            var_dump($test);
            die;
        }
    }




}























?>