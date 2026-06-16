<?php 

namespace app\core;

use PDO;
use PDOException;

class Database
{
    private string $db_name = "db_tasks";
    private string $host = "localhost";
    private string $username = "root";
    private string $password = "";
    private string $charset = "utf8mb4";
    public $conn;
    private string $dsn;

    public function spojenie()
    {
        try
        {
            $this->dsn = "mysql:host={$this->host};dbname={$this->db_name}; charset={$this->charset}";
            $this->conn = new PDO($this->dsn, $this->username, $this->password);
            
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        return $this->conn;
    }
    
} 
?>