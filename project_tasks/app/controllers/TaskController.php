<?php

namespace app\controllers;
use app\repositories\TaskRepository;
use app\models\Task;

class TaskController
{
    private TaskRepository $task_repo;

    public function __construct($task_repository)
    {
        $this->task_repo = $task_repository;
    }
    public function home()
    {
        $to_do = [];
        $in_progress = [];
        $done = [];

        $importance_colors = ["low"=>"success", "medium"=>"warning","high"=>"danger"];
        foreach($this->task_repo->getAllTasks() as $task)
        {    
            switch($task->getTaskStatus())
            {
                case "to_do":
                    $to_do[] = $task;
                    break;
                case "in_progress":
                    $in_progress[] = $task;
                    break;
                case "done":
                    $done[] = $task;
                    break;
                default:
                    throw new \Exception("ERROR INVALID TASK");
                    break;
            }
        }
        unset($task);
        include __DIR__."/../../view/Home.php";
    }
    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST")
        {
            if (isset($_POST["delete_id"]))
            {
                $this->task_repo->deleteTask($this->task_repo->findById($_POST["delete_id"])); 
            }
        }
        header("Location:/project_tasks/public/home");
        exit();
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST")
        {
            if (isset($_POST["update_id"]) && isset($_POST["update_status"]))
            {
                switch($_POST["update_status"])
                {
                    case "to_do":
                        $status = "in_progress";
                        break;
                    case "in_progress":
                        $status = "done";
                        break;
                    case "done":
                        $status = "to_do";
                        break;
                    default:
                        echo $_POST["update_status"];
                        throw new \Exception("ERROR INVALID STATUS");
                        break;
                }
                $this->task_repo->updateStatus($_POST["update_id"], $status); 
            }
        }
        header("Location:/project_tasks/public/home");
        exit();
    }
    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["importance"]))
        {
            $task = new Task($_POST["name"], $_POST["importance"], $_POST["description"]);
            $this->task_repo->createTask($task);
        }
        header("Location:/project_tasks/public/home");
        exit();
    }
}
?>