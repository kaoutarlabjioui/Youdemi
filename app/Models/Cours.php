<?php
namespace app\Models;

use Categorie;

class Cours{

private int $id;
private string $titre;
private string $photo;
private string $description;
private string $contenu;
private Categorie $categorie;
private array $tags=[];
private array $etudiants=[];
private User $enseignant;


    public function __construct(){}

    
    public function __call($name, $arguments)
    {   if($name == "construct"){
            if(count($arguments)== 1)
            {
                $this->titre=$arguments[0];
                
            }

            if(count($arguments)==2)
            {
                $this->titre=$arguments[0];
                $this->description=$arguments[1];
            }

            if(count($arguments)==3)
            {
                $this->titre=$arguments[0];
                $this->tags=$arguments[1];
                $this->categorie=$arguments[2];
            }

            if(count($arguments)==4)
            {
                $this->titre=$arguments[0];
                $this->tags=$arguments[1];
                $this->categorie=$arguments[2];
                $this->enseignant=$arguments[3];
            }

        }
    }



    public function setId(int $id):void
    {
        $this->id=$id;
    }

    public function setTitre(string $titre):void
    {
        $this->titre=$titre;
    }

    public function setDescription(string $description):void
    {
        $this->description=$description;
    }

    public function setContenue(string $contenu):void
    {
        $this->contenu=$contenu;
    }

    public function setCategorie(Categorie $categorie):void
    {
        $this->categorie=$categorie;
    }

    public function setTags(array $tags):void
    {
        $this->tags=$tags;
    }

    public function setEtudiants(array $etudiants):void
    {
        $this->etudiants=$etudiants;
    }

    public function setEnseignant(User $enseignant):void
    {
        $this->enseignant=$enseignant;
    }


    public function getId():int
    {
        return $this->id;
    }


    public function getTitre():string
    {
        return $this->titre;
    }

    public function getDescription():string
    {
       return $this->description;
    }

    public function getContenue():string
    {
        return $this->contenu;
    }

    public function getCategorie():Categorie
    {
        return $this->categorie;
    }

    public function getTags():array
    {
        return $this->tags;
    }

    public function getEtudiants():array
    {
        return $this->etudiants;
    }

    public function getEnseignant():User
    {
       return $this->enseignant;
    }


    public function __toString()
    {
        return "(cours) => id :  " .$this->id . " , titre : ".$this->titre . 
                " , photo : " .$this->photo . " , description : ".$this->description . 
                " , contenu : " . $this->contenu . " ,categorie : " .$this->categorie . 
                " , tags : " .$this->tags . " , etudiants : ".$this->etudiants . " , enseignant : ".$this->enseignant. "." ;
    }



}


















?>