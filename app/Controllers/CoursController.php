<?php

namespace app\Controllers;

use app\Models\Cours;
use app\Models\Categorie;

class CoursController
{

    private Cours $coursModel;
    private Categorie $categories;


    public function __construct()
    {
        $this->coursModel = new Cours();
        $this->categories = new Categorie();
    }


    public function index()
    {

        $cours = $this->coursModel->getAll();
        $categories = $this->categories->display();
        // $role=$_SESSION["role"];
        include '../app/Views/AdmineDashboard.php';
        include '../app/Views/layout/Cours/CoursTable.php';
        //   
    }


    public function getAll()
    {

        $cours = $this->coursModel->getAll();

        include './../app/Views/Home.php';
    }



    public function add()
    {
        if (isset($_POST['submit']) && !empty($_POST['titre']) && !empty($_POST['photo']) && !empty($_POST['contenu']) && !empty($_POST['description'])  && !empty($_POST['categorie'])) {
            $this->coursModel->setTitre($_POST['titre']);
            $this->coursModel->setPhoto($_POST['photo']);
            $this->coursModel->setDescription($_POST['description']);
            $this->coursModel->setContenu($_POST['contenu']);
            $this->coursModel->setEnseignant($_SESSION['user']);
            $this->coursModel->setCategorie($this->categories->getById($_POST['categorie']));
            $result = $this->coursModel->create();

            if ($result) {
                header('Location: ../Cours');
                exit();
            } else {
                echo "Erreur lors de l'ajout de la catégorie.";
            }
        }
    }


    public function delete($id)
    {
        $delete =  $this->coursModel->delete($id);

        if ($delete) {

            header('Location:../../');
            exit();
        }
    }
}
