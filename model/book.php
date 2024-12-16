<?php 
class Book{
    public $id;
    public $name;
    public $price;
    public $description;
    protected $idAuthor;
    protected $idCategory;
    
    public function __construct($id, $name, $price, $description, $idAuthor, $idCategory){
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->idAuthor = $idAuthor;
        $this->idCategory = $idCategory;
    }

    public function get($p){
        return $this->$p;
    }

    public function set($p, $v){
        $this->$p = $v;
    }

    public function dislay(){
        echo "ID: ".$this->id."<br>";
        echo "Name: ".$this->name."<br>";
        echo "Price: ".$this->price."<br>";
        echo "Description: ".$this->description."<br>";
        echo "ID Author: ".$this->idAuthor."<br>";
        echo "ID Category: ".$this->idCategory."<br>";
    }


    public static function getAll(){
        require_once(__DIR__."/../config/connection.php");
        
        Connexion::connect();
        $requete="SELECT * FROM book;";
       
        $result=Connection::pdo()->query($requete);
        $result->setFetchmode(PDO::FETCH_CLASS,"Book");
        $results=$result->fetchAll();
        return $results;
    }

    public static function getBookById($id){

        $requesteWithTags="SELECT * FROM book WHERE idBook=:id;";
        $preparedRequest=connexion::pdo()->prepare($requesteWithTags);


        $values=array();
        if(strlen($id>0)){
            $valeurs["id"]=$id²;
        }else{
            $valeurs["id"]=NULL;
        }

        try{
            $preparedRequest->execute($values);
            $preparedRequest->setFetchmode(PDO::FETCH_CLASS,"Book");
            return $preparedRequest->fetch();
            
        }catch(PDOException $e){s
            echo $e->getMessage();
        }
    }




}