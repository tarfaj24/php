<?php

namespace App\Core;   // prevencia konfliktov pri pomenovaniach medzi classami funkciami atd... 
// mozme mat viac Database suborov ale tento ma specialne App\Core

// use mozeme pouzit ked sme v namespace, na to aby sme vysvetlili programu nech nehlada
// triedu  vo vnutri App\Core ale v globalnom priestore
use PDO;
use PDOException;

class Database
{
    private string $host = "localhost";
    private string $db_name = "db_users";
    private string $username = "root"; // root predvoleny ucet spravcu v xampp
    private string $password = "";
    private string $charset = "utf8";

    public $conn;

    public function spojenie()
    {       
        $this->conn = null;
        // argumenty: string v ktorom je host, nazov db a charset & username & password
        try 
        {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}; charset={$this->charset}", $this->username, $this->password);
    
        }
        // lomitko (asi) netreba pokial pouzivame use
        catch(PDOException $e)
        {
            // vypis chybu
            echo $e->getMessage();
        }
        return $this->conn;
    }    
}
?>