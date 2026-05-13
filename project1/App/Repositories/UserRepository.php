<?php

namespace App\repositories;

use PDO;
use PDOException;
use App\Models\User;

class UserRepository
{
    private PDO $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    // vyhladaj usera podla usernamu ak ho najde vytvori jeho objekt
    // setne jeho id a aj created at
    // vrati bud jeho objekt alebo null
    public function findByUsername(string $username):?User
    {
        try 
        {
            $user = null;
            $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([":username" => $username]); // => priradi kluc k hodnote
            if($row = $stmt->fetch())
            {
                $user = new User($row["username"], $row["PASSWORD"], $row["role"], true);
            
                $user->setId((int)$row["id"]); // (int) pred $row["id"] sluzi na pretypovanie stringu na typ int
                $user->setCreatedAt($row["created_at"]);
                return $user;
            }
            return null;
        }
        catch(PDOException $e)
        {
            return null;
        }

    }

    // sluzi na ulozenie usera do databazy 
    // ps neviem preco tam neuklada aj created at
    public function save(User $user):bool
    {
        try
        {
            $sql = "INSERT INTO users(username,password,role)
            VALUES (:username,:password,:role)";
            $stmt = $this->db->prepare($sql);

            $result = $stmt->execute([
                ":username" => $user->getUsername(),
                ":password" => $user->getPassword(),
                ":role" => $user->getRole()]);

            if ($result)
            {
                // setne mu id pomocou funkcie lastInsertedId
                $user->setId((int)$this->db->lastInsertId());
            }
            return $result;
        }
        catch (PDOException $e)
        {
            return false;
        }

    }

    // updatne sql DB tym ze do nej vlozi vsetky udaje z $user objektu
    public function update(User $user):bool
    {
        try
        {
            $sql = "UPDATE users SET username=:username, password=:password,
            role=:role, created_at=:created_at WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([
                ":id" => $user->getId(),
                ":username" => $user->getUsername(),
                ":password" => $user->getPassword(),
                ":role" => $user->getRole(),
                ":created_at" => $user->getCreatedAt()
            ]);
            return $result;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete(User $user):bool
    {
        try
        {
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([":id" => $user->getId()]);
            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
        

        

    }

}
?>