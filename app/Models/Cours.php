<?php

namespace app\Models;

use app\Config\Database;
use app\Models\Tag;
use PDO;

class Cours
{

    private int $id;
    private string $titre;
    private string $photo;
    private string $description;
    private string $contenu;
    private ?Categorie $categorie;
    private array $tags = [];
    private array $etudiants = [];
    private User $enseignant;


    public function __construct() {}

    public function __call($name, $arguments)
    {
        if ($name == "construct") {
            if (count($arguments) == 1) {
                $this->titre = $arguments[0];
            }

            if (count($arguments) == 2) {
                $this->titre = $arguments[0];
                $this->description = $arguments[1];
            }

            if (count($arguments) == 3) {
                $this->titre = $arguments[0];
                $this->tags = $arguments[1];
                $this->description = $arguments[2];
            }

            if (count($arguments) == 4) {
                $this->titre = $arguments[0];
                $this->tags = $arguments[1];
                $this->categorie = $arguments[2];
                $this->enseignant = $arguments[3];
            }
        }
    }



    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }

    public function setCategorie(Categorie $categorie): void
    {
        $this->categorie = $categorie;
    }

    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

    public function setEtudiants(array $etudiants): void
    {
        $this->etudiants = $etudiants;
    }

    public function setEnseignant(User $enseignant): void
    {
        $this->enseignant = $enseignant;
    }
    public function setPhoto(string $photo)
    {
        $this->photo = $photo;
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getContenue(): string
    {
        return $this->contenu;
    }

    public function getCategorie(): Categorie
    {
        return $this->categorie;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function getEtudiants(): array
    {
        return $this->etudiants;
    }

    public function getEnseignant(): User
    {
        return $this->enseignant;
    }


    // public function __toString()
    // {
    //     return "(cours) => id :  " .$this->id . " , titre : ".$this->titre . 
    //            " , photo : " .$this->photo . " , description : ".$this->description . 
    //            " , contenu : " . $this->contenu . " ,categorie : " .$this->categorie . 
    //            " , tags : " .$this->tags . " , etudiants : ".$this->etudiants . " , enseignant : ".$this->enseignant. "." ;
    // }



    public function create()
    {
        $enseignant = $this->getEnseignant()->getId();

        $query = "insert into courses (titre , photo , description,  contenu , categorie_id , enseignant_id ) values (?,?,?,?,?,?)";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        // $ens=$this->enseignant->getId();
        $cate = $this->categorie->searchByName($this->categorie->getname());
       return  $stmt->execute([$this->titre, $this->photo, $this->description, $this->contenu, $cate->getId(), $enseignant]);
    }

    public function getAll()
    {

        $query = 'select c.*, u.nom, cat.name as catName FROM courses c join users u on c.enseignant_id=u.id join categories cat on c.categorie_id=cat.id';
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        $cours = $stmt->fetchAll(PDO::FETCH_CLASS, Cours::class);
       

        foreach ($cours as $cour):
            $sql = "select t.* from tags t join course_tags c on t.id=c.tag_id where c.cours_id=:id";
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->bindParam(':id', $cour->id);
            $stmt->execute();
            $cour->tags = $stmt->fetchAll(PDO::FETCH_CLASS, Tag::class);
        endforeach;

        // var_dump($cours);
        // die();
        return $cours;
    }


    public function getMyCours($id)
    {

        $query = 'select courses.*,categories.name from courses join categories on categories.id = courses.categories_id where courses.enseignant_id=:id';
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function delete($id)
    {

        $query = "delete from courses where id =:id";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }




    public function getCoursCount(){
        $query ="select count(*) as coursCount from courses";
        $stmt=Database::getInstance()->getConnection()->prepare($query);
        $stmt ->execute();

        $result= $stmt->fetch(PDO::FETCH_OBJ, User::class );

        return $result;

    }
}
