<?php
session_start();

// require_once sluzi na nacitanie suboru ak neexistuje zastav programu
// ak uz bol nacitany viac ho nenacitavaj
// __DIR__ je magicka konstanta ktora v sebe drzi absolutnu cestu ku
// priecinku v ktorom sa nachadza aktualny subor
// vendor je priecinok kde composer stahuje vsetky kniznice
// spusti subor autoload
// autoload nam pomaha ked chceme vyuzit nejaku triedu
// automaticky najde k nej najde a nacita cestu
require_once __DIR__ .'/../vendor/autoload.php';

// v tomto pripade sluzi use na vytvorenie skratiek k triedam
// s use staci ked pouzijeme new Database a nie new app/core/database
use App\Core\Database;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Controllers\UserController;
use App\Core\Router;


$db = new Database;
$pdo = $db->spojenie();
$userRepo = new UserRepository($pdo);

$userController = new UserController($userRepo);

$router = new Router;
$router->add("/", $userController, "index");
$router->add("/login", $userController, "login");
$router->add("/register", $userController, "register");
$router->add("/dashboard", $userController, "dashboard");
$router->add("/logout", $userController, "logout");

$router->resolve();

?>
