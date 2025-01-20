<?php

namespace app\Controllers;

use app\Models\Tag;

class TagsController
{
    private Tag $tagModel;


    public function __construct()
    {
        $this->tagModel = new Tag();
    }









    public function display()
    {
        $tags = $this->tagModel->display();
        $role = $_SESSION["role"];
        include '../app/Views/AdmineDashboard.php';
        include '../app/Views/layout/Tag/TagTable.php';
    }


    public function add()
    {
        if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['description'])) {

            $this->tagModel->setName($_POST['name']);
            $this->tagModel->setDescription($_POST['description']);
            $result = $this->tagModel->create();


            if ($result) {

                header('Location: ../Tags/display');
                exit();
            } else {

                echo "Erreur lors de l'ajout du tag.";
            }
        }
    }



    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"]) {

            $this->tagModel->setName($_POST['name']);

            $this->tagModel->setDescription($_POST['description']);
            $this->tagModel->setId($_POST['id']);
            $this->tagModel->update();
            header('location: /Tags/display');
        }
    }







    public function delete($id)
    {
        $delete = $this->tagModel->delete($id);

        if ($delete) {

            header('Location:../../');
            exit();
        }
    }
}
