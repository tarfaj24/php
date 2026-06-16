<?php 

require_once __DIR__.'/../vendor/autoload.php';


use app\core\Database;
use app\core\Router;
use app\models\Task;
use app\repositories\TaskRepository;
use app\controllers\TaskController;

$db = new Database;
$pdo = $db->spojenie();

$task_repo = new TaskRepository($pdo);
$controller = new TaskController($task_repo);
$router = new Router;
$router->add("/home", $controller, "home");
$router->add("/delete", $controller, "delete");
$router->add("/update", $controller, "update");
$router->add("/create", $controller, "create");

$router->resolve();

?>