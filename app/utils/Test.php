<?php
namespace app\utils;
use app\Models\Role;
use app\Models\User;



class Test
{

    public function __construct() {}

    public function test()
    {
        echo "role test : <br/> ";

        // $role= Role::instanceWithRolename("admine");
        $role=new Role();
        $role->construct("superadm");
        $this->display($role);


        echo "user test : <br/> ";

        $user= new User();
       
        $user->construct("imane","zaheri");
        $user->setRole($role);
        $this->display($user);

    }



    public function display($obj) {
        echo $obj;
        echo "<br />";
        echo "===================================================================================";
        echo "<br />";
    }


}
