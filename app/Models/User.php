<?php
namespace app\Models;

use app\Config\Database\Database;
use app\Models\Role;

class User {

private int $id=0;
private string $nom;
private string $prenom="";
private string $email="";
private string $password="";
private string $isatctive;
private Role $role;


    public function __construct(){}


    public function __call($name, $arguments)
    {   if($name == "construct"){
            if(count($arguments)== 2)
            {
                $this->nom=$arguments[0];
                $this->prenom=$arguments[1];
            }

            if(count($arguments)==3)
            {
                $this->nom=$arguments[0];
                $this->prenom=$arguments[1];
                $this->role=$arguments[2];
            }

            if(count($arguments)==4)
            {
                $this->nom=$arguments[0];
                $this->prenom=$arguments[1];
                $this->email=$arguments[2];
                $this->password=$arguments[3];
            }

        }

        if($name == "instanceWithEmailEtPassword")
        {
            if(count($arguments)==2)
            {
                $this->email=$arguments[0];
                $this->password=$arguments[1];
            }
        }
        
    }


    public function setId(int $id):void
     {
        $this->id = $id;
    }

    public function setNom(string $nom):void
     {
        $this->nom = $nom;
    }

    public function setPrenom(string $prenom):void
    {
        $this->prenom = $prenom;
    }

    public function setEmail(string $email) :void
    {
        $this->email = $email;
    }

    public function setPassword(string $password):void
    {
        $this->password = $password;
    }

    public function setRole(Role $role):void
     {
        $this->role = $role;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getRole(): Role {
        return $this->role;
    }


    public function __toString()
   {
        return "(Utilisateur) => id : " . $this->id . " , nom : " . $this->nom . 
                " , prenom : " . $this->prenom ." , email : " . $this->email  . 
                " , password : " . $this->password .  " , role : " .$this->role . "." ;
    }



    public function create()
    {
        $query="insert into Users (nom,prenom,email,password,role_id) values (:nom,:prenom,:password,:role_id) ";
        $stmt= Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':nom',$this->nom);
        $stmt->bindParam(':prenom',$this->prenom);
        $stmt->bindParam(':password',$this->password);
        $stmt->bindParam(':nom',$this->getRole()->getId());
        $stmt->execute();
    }

}















?>