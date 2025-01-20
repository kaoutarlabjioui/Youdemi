<!-- <?php

// namespace app\Controllers;

use app\Models\Cours;


// class StatsController{

//  private Cours $coursModel;
//  private Tags  $tagsModel;
//  private Categorie $categorieModel;

// public function __construct(){
     
//     $this->coursModel =  new Cours ();
// }




// public function index()
// {
//     if (!isset($_SESSION['user'])) {
//         include '../app/Views/Home.php';
//     }else{
//         $role=$_SESSION['role'];
//         include '../app/Views/stats.php';
//         switch ($role->getId()) {
//             case 1:
                
//                 include '../app/Views/layout/Cours/CoursTable.php';
//                 break;

//             case 2:
//                 $cours = $this->coursModel->getMyCours($_SESSION['user_id']);
//                 include '../app/Views/layout/Cours/CoursTable.php';

//                 break;
//             case 3:
//                 $cours = $this->coursModel->getInscritCours($_SESSION['user_id']);
//                 include '../app/Views/layout/Cours/CoursTable.php';
//                 break;
//         }





//     }
// }








// public function totalCours(){

// $stCours = $this->coursModel->getCoursCount();

// include './../app/Views/layout/stats.php';

// }

    








?>