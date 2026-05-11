<?php 

class Database{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "users";
    public $conn;
    public function nadviaz_spojenie(){
        try{
            $this->conn = new PDO("mysql:host=localhost;dbname=users;",$this->username,$this->password);
            echo "SPOJENIE S DATABAZOU JE USPESNE";
        }
        catch(PDOException $e){
            echo "Nastala chyba. ERROR".$e->getMessage();
            $this->conn = null;
            
        }
        return $this->conn;
    }


    

}

?>