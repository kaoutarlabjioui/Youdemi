<?php

namespace app\Controllers;

use app\Models\Cours;
use app\Models\Categorie;
use app\Models\Tag;
use app\Models\User;

class CoursController
{

    private Cours $coursModel;
    private Categorie $categories;
    private Tag $tags;
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User ();
        $this->coursModel = new Cours();
        $this->categories = new Categorie();
        $this->tags = new Tag();
    }


    public function index()
    {
        if (!isset($_SESSION['user'])) {
            include '../app/Views/Home.php';
        }else{
            $role=$_SESSION['role'];
            $categories = $this->categories->display();
            $tags = $this->tags->display();
            $test=explode('/',$_SERVER['PHP_SELF']);
            include '../app/Views/AdmineDashboard.php';
            switch ($role->getId()) {
                case 1:
                    $cours = $this->coursModel->getAll();

                    include '../app/Views/layout/Cours/CoursTable.php';
                    break;

                case 2:
                    $cours = $this->coursModel->getMyCours($_SESSION['user_id']);
                    include '../app/Views/layout/Cours/CoursTable.php';

                    break;
                case 3:
                    $cours = $this->coursModel->getInscritCours($_SESSION['user_id']);
                    include '../app/Views/layout/Cours/CoursTable.php';
                    break;
            }





        // $cours = $this->coursModel->getAll();
        // $categories = $this->categories->display();
        // $tags = $this->tags->display();
        // var_dump($tags[0]->getId());
        // die();
        // $role=$_SESSION["role"];
        // include '../app/Views/AdmineDashboard.php';
        // include '../app/Views/layout/Cours/CoursTable.php';
        //   
        }
    }


    public function getAll()
    {

        $cours = $this->coursModel->getAll();

        include './../app/Views/Home.php';
    }



    public function add()
    {
        if (isset($_POST['submit']) && !empty($_POST['titre']) && !empty($_POST['photo']) && !empty($_POST['contenu']) && !empty($_POST['description'])  && !empty($_POST['categorie'])) {
            // var_dump($_POST["tags"]);
            // die;
            $tags = array();
            foreach ($_POST["tags"] as $tagId) {
                $tag = new tag ();
                $tag->setId($tagId);
                // $this->tags->setId($tagId);
                array_push($tags, $tag);
                // var_dump($tags);
            }
            // var_dump($tags);

            // die();

            // var_dump($tags);
            // die;

            $this->coursModel->setTitre($_POST['titre']);
            $this->coursModel->setPhoto($_POST['photo']);
            $this->coursModel->setDescription($_POST['description']);
            $this->coursModel->setContenu($_POST['contenu']);
            $this->coursModel->setEnseignant($_SESSION['user']);
            $this->coursModel->setCategorie($this->categories->getById($_POST['categorie']));
            $this->coursModel->setTags($tags);



            $result = $this->coursModel->create();
            // var_dump($result);
            // die;

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

            header('Location:../');
            exit();
        }
    }

    public function apply($id){
        $test=$this->userModel->inscrireAuCours($_SESSION['user_id'],$id);
        if ($test) {
            header('location: /');
        }else{
            var_dump($test);
        }
    }
}
