<?php
namespace app\utils;

use app\Models\Categorie;
use app\Models\Role;
use app\Models\User;
use app\Models\Cours;

class Test
{

    public function __construct() {}

    public function test()
    {
        echo "role test : <br/> ";

        // // $role= Role::instanceWithRolename("admine");
        $role=new Role();
        // $roleC=new Role();
        $role = $role->findByName('admin');
        // var_dump($roleC->findByName('admin'));


        //  $role->create();


        echo "user test : <br/> ";

    //     $user= new User();
    //     $user->construct("salmags", "zaz@gmail.com","slfghjtyui", "123456salma", $role);
    //     $user->setRole($role);
    //     var_dump($user);
        
    //    $user->create();

        // $this->display($user);
        
       

        // $role = new Role();
        // $role->setId(9); 

        $user = new User();
         $user->setRole($role); 


         $user->construct("salma", "zisdfghj@gmail.com","slawi", "123456salma", $role);

        //  $user->create();
        
        $cour = new Cours;
        $cour->construct("ana",[],"sadsada");
        $cour->setPhoto("");
        $cour->setContenue("");
        $ensei = new User();
        $categorie  = new Categorie ;
        $user->setId(7);
        var_dump($user->getId());
        $categorie->setName("fertz");
        $cour->setCategorie($categorie);
        $cour->setEnseignant($user);
        var_dump(  $categorie->searchByName($categorie->getName()));
        $cour->create();
        // var_dump( $cour);
        die();
    
       



        // var_dump($cate);
        // echo  $cate->getId();
        

    

        




           



    }



    // public function display($obj) {
    //     echo $obj;
    //     echo "<br />";
    //     echo "===================================================================================";
    //     echo "<br />";
    // }


}
