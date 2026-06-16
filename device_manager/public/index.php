<?php 
require_once __DIR__.'/../vendor/autoload.php';

use app\core\Database;
use app\core\Router;
use app\models\Device;
use app\repositories\DeviceManager;
use app\controllers\DeviceController;

$db = new Database;
$pdo = $db->spojenie();
$device_manager = new DeviceManager($pdo);
$controller = new DeviceController($device_manager);
$router = new Router;
$router->add("/home", $controller, "home");

$router->resolve();

?>