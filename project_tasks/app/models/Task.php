<?php 

namespace app\models;

class Task
{
    private ?int $id;
    private string $name;
    private string $task_status;
    private string $importance;
    private string $description;

    public function __construct(string $name, string $importance, string $description = "", string $task_status = "to_do", $id = NULL)
    {
        $this->id = $id;
        $this->name = $name;
        $this->task_status = $task_status;
        $this->importance = $importance;
        $this->description = $description;
    }
    //setters
    public function setId(int $id):void
    {
        $this->id = $id;
    }

    public function setName(string $name):void
    {
        $this->name = $name;
    }

    public function setDescription(string $description):void
    {
        $this->description = $description;
    }

    public function setTaskStatus(string $task_status):void
    {
        $this->task_status = $task_status;
    }

    public function setImportance(string $importance):void
    {
        $this->importance = $importance;
    }

    //getters
    public function getId():int
    {
        return $this->id;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getDescription():string
    {
        return $this->description;
    }

    public function getTaskStatus():string
    {
        return $this->task_status;
    }

    public function getImportance():string
    {
        return $this->importance;
    }
}

?>