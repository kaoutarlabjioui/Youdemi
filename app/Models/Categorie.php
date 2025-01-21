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

    public function __toString(): string
    {
        return parent::__toString();
    }


    public function display(){
        $query = "select id , name , description FROM categories ";
        $stmt =  Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS , Categorie::class);
        if($result){
            return $result;
        }

       }


  public function create(){

        $query = "insert into categories (name , description) VALUES ( ?,?)";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $result= $stmt->execute( [$this->name, $this->description]);
        return $result;

   }

   public function update(){

        $id=$this->getId();
        $upname = $this->getNAme();
        $updescription = $this->getDescription();
        $query = "update categories set name = :name , description = :description where id= :id";
        $stmt =  Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':name',$upname);
        $stmt->bindParam(':description',$updescription);
        $result=  $stmt->execute();

        if($result){
            return true;
        }


    }


   public function delete($deleteid) {
    $query = "delete from categories where id= :id";
    $stmt =  Database::getInstance()->getConnection()->prepare($query);
    $stmt->bindParam(':id',$deleteid);
    $result = $stmt->execute();
    return $result;
 }

 public function searchByName($searchTerm) {
    $query = "select id, name , description FROM  categories where name like ? ";
    $stmt =  Database::getInstance()->getConnection()->prepare($query);
    $stmt->execute(["%$searchTerm%"]);
    $result = $stmt->fetchObject(Categorie::class);
    if ($result) {
        return $result;
    }
 }

 public function getById($id){
    $query = "select id, name , description FROM  categories where id= ? ";
    $stmt =  Database::getInstance()->getConnection()->prepare($query);
    $stmt->execute([$id]);
    $result = $stmt->fetchObject(Categorie::class);
    if ($result) {
        return $result;
    }
 }


 public function getCategorieCount(){
    $query ="select count(*) as categorieCount from categories";
    $stmt=Database::getInstance()->getConnection()->prepare($query);
    $stmt ->execute();

    $result= $stmt->fetch(PDO::FETCH_OBJ, User::class );

    return $result;

}


}
?>