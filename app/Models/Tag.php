<?php
namespace app\Models;

use app\Models\Label;
use app\Config\Database;
use PDO;
class Tag extends Label
{
    public function __construct()
    {
        parent::__construct();
    }


    public function __toString(): string
    {
        return parent::__toString();
    }

    
    public function display(){
        $query = "select id, name , description FROM tags ";
        $stmt =  Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS , Tag::class);
       return $result;
    
       }


  public function create(){
        $query = 'insert into tags (name , description) VALUES (? ,  ?)';
        $stmt = Database::getInstance()->getConnection()->prepare($query);
     
        $stmt->execute([$this->name, $this->description]);
        if($stmt){
            return true;
        }
   }

   public function update(){

        $upid=$this->id;
        $upname = $this->name;
        $updescription = $this->description;
        $query = "update tags set name = ? , description = ? where id= ?";
        $stmt =  Database::getInstance()->getConnection()->prepare($query);
        $result=  $stmt->execute([$upname ,$updescription,$upid ]);
        if($result){
            return true;
        }


    }


   public function delete($deleteid) {
    $query = "delete from tags where id= :id";
    $stmt =  Database::getInstance()->getConnection()->prepare($query);
    $stmt->bindParam(':id',$deleteid);
    $result = $stmt->execute();
    return $result;
}

public function searchByName($searchTerm) {
    $query = "select name , description FROM tags where name like :name ";
    $stmt =  Database::getInstance()->getConnection()->prepare($query);
    $stmt->bindParam(':name',"%$searchTerm%");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    if ($result) {
        return $result;
    }
}



public function getTagCount(){
    $query ="select count(*) as tagCount from tags";
    $stmt=Database::getInstance()->getConnection()->prepare($query);
    $stmt ->execute();

    $result= $stmt->fetch(PDO::FETCH_OBJ, User::class );

    return $result;

}



}

?>