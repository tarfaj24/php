<?php
namespace App\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;

class UserController
{
    private UserRepository $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        include __DIR__."/../../View/home.php";
    }

    public function dashboard()
    {
        include __DIR__."/../../View/dashboard.php";
    }
    
    public function login()
    {
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            //?? skontroli ci prva podmienka existuje, ak nie pridaj tam ""
            $username = trim($_POST["username"] ?? "");
            $username = trim($_POST["password"] ?? "");

            $user = $this->userRepo->findByUsername($username);
            if (!$user || !$user->passwordVerify($password))
            {
                
                $_SESSION["flash_error"] = "Nespravne meno, alebo heslo";
                header("Location:/project1/public/login");
                exit();
            }

            $_SESSION["user_id"] = $user->getId();
            $_SESSION["useername"] = $user->getUsername();
            $_SESSION["role"] = $user->getRole();

            if ($user->getRole() === "admin")
            {
                header("Location:/project1/public/admin");
            }
            else
            {
                header("Location:/project1/public/dashboard");
            }
            exit();
        }
        include __DIR__."/../../View/login.php";
    }
    public function register()
    {

        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $username = trim($_POST["username"] ?? "");
            $password = trim($_POST["password"] ?? "");
            echo  $username;
         
            if($this->userRepo->findByUsername($username))
            {
                $_SESSION["flash_error"] = "Uzivatelske meno uz existuje";
                header("Location:/project1/public/register");
                exit();
            }

            if (mb_strlen($username) < 3 || mb_strlen($password) < 6)
            {
                $_SESSION["flash_error"] = "Uzivatelske meno musi mat aspon 3 znaky a heslo 6 znakov.";
                header("Location:/project1/public/register");
                exit();
            }

            $newUser = new User($username,  $password);
            if ($this->userRepo->save($newUser))
            {
                $_SESSION["flash_sucess"] = "Registracia prebehla uspesne";
                header("Location:/project1/public/login");
                exit();
            }



        }
        include __DIR__."/../../View/register.php";

    }
    public function logout() :void
    {
        session_destroy();
        header("Location: project1/public");
        exit();
    }
}
?>