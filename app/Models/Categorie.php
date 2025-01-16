<?php
namespace app\Models;

use app\Config\Database;
use PDO;

class Categorie extends Label
{
    public function __constuct()
    {
        parent::__construct();
    }


    public function __call($name, $arguments)
    {
        parent::__call($name, $arguments);
    }

    // public function __toString(): string
    // {
    //     return parent::__toString();
    // }


    public function display(){
        $query = "select name , description FROM categories ";
        $stmt =  Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if($result){
            return $result;
        }
    
       }


  public function create(){
        $tagnom = $this->getName();
        $query = 'insert into categories (name) VALUES (name = :name)';
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':name',$tagnom);
        $stmt->execute();
        if($stmt){
            return true;
        }
   }

   public function update(){

        $upid=$this->getId();
        $upname = $this->getNAme();
        $updescription = $this->getDescription();
        $query = "update categories set name = :name , description = :description where id= :id";
        $stmt =  Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':id',$upid);
        $stmt->bindParam(':id',$upname);
        $stmt->bindParam(':id',$updescription);
        $result=  $stmt->execute();

        if($result){
            return true;
        }


    }


   public function delete() {
    $deleteid=$this->getId();
    $query = "delete from categories where id= :id";
    $stmt =  Database::getInstance()->getConnection()->prepare($query);
    $stmt->bindParam(':id',$deleteid);
    $result = $stmt->execute();
    return $result;
 }

 public function searchByName($searchTerm) {
    $query = "select id, name , description FROM  categories where name like ? ";
    $stmt =  Database::getInstance()->getConnection()->prepare($query);
    // $stmt->bindParam(':name',"%$searchTerm%");
    $stmt->execute(["%$searchTerm%"]);
    $result = $stmt->fetchObject(Categorie::class);
    if ($result) {
        return $result;
    }
 }


}
?>