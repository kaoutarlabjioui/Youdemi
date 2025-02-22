<?php
namespace app\Models;
use Exception;
use PDO;
use app\Config\Database;
use app\Models\Role;


class User {

private int $id ;
private string $nom;
private string $prenom;
private string $email;
private string $password;
private string  $status;
private Role $role;
private array $cours=[];


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

            if(count($arguments)==5)
            {
                $this->nom=$arguments[0];
                $this->prenom=$arguments[1];
                $this->email=$arguments[2];
                $this->password=$arguments[3];
                $this->role=$arguments[4];
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


    public function setStatus(string $status):void
    {
       $this->status = $status;
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



    public function getStatus(): string {
        return $this->status;
    }



    public function __toString()
   {
        return "(Utilisateur) => id : " . $this->id . " , nom : " . $this->nom . 
                " , prenom : " . $this->prenom ." , email : " . $this->email  . 
                " , password : " . $this->password .  " , role : " .$this->role . "." ;
    }

    public function display(){

    $query="select users.id, nom , prenom, email, password, status , role_name, role_description from users join roles on users.role_id = roles.id";
    $stmt=Database::getInstance()->getConnection()->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS , User::class);

    }


    public function getMyStudent($id){

      $query = "select u.* ,c.titre from users u join inscriptions ins on ins.etudiant_id = u.id join courses c on c.id = ins.cours_id where c.enseignant_id = :id order by c.titre ";
      $stmt = $stmt=Database::getInstance()->getConnection()->prepare($query);  
      $stmt->bindParam(':id',$id );
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS , User::class);

    }


    public function findById()
    {
        $fid=$this->getId();
        $query="select nom , prenom, email, password  from users where id=:id";
        $stmt=Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':id',$fid );
        $stmt->execute();
      return $stmt->fetchObject(__CLASS__);
      
    }


    public function findByEmail($email)
    {
       
        $query="select id ,nom , prenom, email, password, role_id  from users where email=:email";
        $stmt=Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':email',$email );
          $stmt->execute();
          return $stmt->fetchObject(__CLASS__);
    
      
    }

    
    public function findByName()
    {
        $fid=$this->getName();
        $query="select id, nom , prenom, email, password  from users where id=:id";
        $stmt=Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':id',$fid );
        return  $stmt->execute();

    }


    public function create()
    {

        $id=$this->role->getId() ;
        $query="insert into users (nom,prenom,email,password,role_id) values (:nom,:prenom,:email,:password,:role_id)";
        $stmt= Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':nom',$this->nom);
        $stmt->bindParam(':prenom',$this->prenom);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':password',$this->password);
        $stmt->bindParam(':role_id', $id);
       return $stmt->execute();
    }




    public function update(){
    if($this->findById()){

    $query="update users set nom= '".$this->nom. "' , prenom ='".$this->prenom ."' ,email = '" .$this->email. "' ,password = '" .$this->password."' ,role_id = '".$this->role->getRoleNAme();
     $stmt = Database::getInstance()->getConnection()->prepare($query);
     return $stmt->execute();

    }

    }



    
    public function updateStatus($ids){
        $query="update users set status='active' where id=?";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
         return $stmt->execute([$ids]);
    
        
    
        }


    public function delete($id)
    {
        $query="delete from users where id= :id";
        $stmt=Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':id' ,  $id);
         return $stmt->execute();

    }

    public function login($email , $password){
       $result=$this->findByEmail($email);
       $role=new Role;
       $role=$role->findById($result->role_id);
       $result->setRole($role);

        if ($result && $password== $result->password) {
            return $result;
        } else {
            return false;
        }
    }
     



    public function inscrireAuCours($id,$idC) {
        if ($_SESSION['role']->getId() !== 3) {
            throw new Exception("Seuls les étudiants peuvent s'inscrire aux cours");
        }

        $query=" INSERT INTO inscriptions (etudiant_id, cours_id) VALUES (?, ?)";

        $stmt = Database::getInstance()->getConnection()->prepare($query);
       
        return $stmt->execute([$id, $idC]);

    }


    public function getUserCount(){
        $query ="select count(*) as userCount from users";
        $stmt=Database::getInstance()->getConnection()->prepare($query);
        $stmt ->execute();

        $result= $stmt->fetch(PDO::FETCH_OBJ);

        return $result;

    }




    public function getEnseignantCount(){

        $query = "select count(*) as enseignantCount from users where role_id = 2";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt ->execute();
        $result= $stmt->fetch(PDO::FETCH_OBJ);

        return $result;


    }


   public function getEnseignantinactive(){
    $query='select * from users where role_id = 2 And status="inactive"';
    $stmt = Database::getInstance()->getConnection()->prepare($query);
    $stmt ->execute();
    $result= $stmt->fetchAll(PDO::FETCH_CLASS , User::class);

    return $result;


   }





}















?>