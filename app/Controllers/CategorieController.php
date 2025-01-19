<?php 
namespace app\Controllers;
use app\Models\Categorie;
class CategorieController{
 private Categorie $categorieModel;


public function __construct(){
        $this->categorieModel = new Categorie ();
    }

public function index(){
    // $categories=$this->categorieModel->display();
    $role=$_SESSION["role"];
    include '../app/Views/AdmineDashboard.php';   
}

public function display(){
    $categories=$this->categorieModel->display();
    if($categories){
        include '../app/Views/AdmineDashboard.php';
        include '../app/Views/layout/Categorie/CategorieTable.php';
    }

}


public function add(){
if(isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['description'])){
  
     $this->categorieModel->setName($_POST['name']);
     $this->categorieModel->setDescription($_POST['description']);
    $result= $this->categorieModel->create();


     if ($result) {
        header('Location: ../Categorie/display');
        exit();
    } else {
       
        echo "Erreur lors de l'ajout de la catégorie.";
    }


}


}




public function update()
{
    if ($_SERVER["REQUEST_METHOD"]) {

        $this->categorieModel->setName($_POST['name']);
        $this->categorieModel->setDescription($_POST['description']);
        $this->categorieModel->setId($_POST['id']);
        $this->categorieModel->update();
       

        header('location:../../');
      exit();
    }
}






public function delete($id){

    $delete=$this->categorieModel->delete($id);
        
    if ($delete)
     {
        
         header('Location:../../');
         exit();
     }
}



}





?>