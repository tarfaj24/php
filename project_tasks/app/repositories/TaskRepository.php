<?php 

namespace app\repositories;

use PDO;
use PDOException;
use app\models\Task;

class TaskRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function createTask(Task $task):bool
    {
        try
        {
            $sql = "INSERT INTO tasks(name, description, task_status, importance)
            VALUES(:name, :description, :task_status, :importance)";

            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([
                ":name"=> $task->getName(),
                ":description" => $task->getDescription(),
                ":task_status" => $task->getTaskstatus(),
                ":importance" => $task->getImportance()
            ]);

            if ($result)
                $task->setId((int)$this->db->lastInsertId());
                
            return $result;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }    
    }
    public function deleteTask(Task $task):bool
    {
        try
        {
            $sql = "DELETE FROM tasks WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([":id" => $task->getId()]);
            if ($result)
            {
                return true;
            }
            return false;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
       

    }

    public function findById(int $id):?Task
    {
        try
        {
            $sql = "SELECT * FROM tasks WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([
                ":id" => $id
            ]);
            if ($result)
            {
                $tasks = $stmt->fetch(PDO::FETCH_ASSOC);
                $task = new TASK($tasks["name"], $tasks["importance"], $tasks["description"], $tasks["task_status"], $tasks["id"]);
                return $task;
            }
            return NULL;
           
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return NULL;
        }
        
    }
    public function getAllTasks():?array
    {
        try
        {
            $sql = "SELECT * FROM tasks";
            $stmt = $this->db->query($sql);
            $all_tasks = [];
            foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $task)
            {
                $task = new TASK($task["name"], $task["importance"], $task["description"],$task["task_status"], $task["id"]);
                $all_tasks[$task->getId()] = $task;
            }
            return $all_tasks;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return NULL;
        }
    }

    public function updateStatus($id, $status):bool
    {
        try
        {
            $sql = "UPDATE tasks SET task_status = :status WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ":id" => $id,
                ":status" => $status
            ]);
            if ($stmt)
            {
                return true;
            }
            return false; 
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }
}

?>