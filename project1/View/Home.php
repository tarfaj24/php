<?php 
    use App\Models\User;

    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        
    

        if (isset($_POST["action"]))
        {

            if ($_POST["action"] == "save")
            {
            $user_obj = new User($_POST["username"], $_POST["password"], "admin", false);
            $userRepo->save($user_obj);
            header("Location:index.php");
         
            }

            else if($_POST["action"] == "delete")
            {
                $user_obj = $users_arr[$_POST["username_info"]];
                $userRepo->delete($user_obj);
                header("Location:index.php");
            }

            else if($_POST["action"] == "update")
            {
                $user_obj = $users_arr[$_POST["username_info"]];
                $userRepo->update($user_obj);
                header("Location:Update.php");
            }

            else if($_POST["action"] == "info")
            {
                $user_obj = $users_arr[$_POST["username_info"]];
                echo $user_obj->getId()."<br>";
                echo $user_obj->getUsername()."<br>";
                echo $user_obj->getRole()."<br>";
                echo $user_obj->getCreatedAt()."<br>";
    
              
               
                // public function getUsername():string
                // {
                //     return $this->username;
                // }
            
                // public function getPassword():string
                // {
                //     return $this->password;
                // }
            
                // public function getRole():string
                // {
                //     return $this->role;
                // }
            
                // public function getCreatedAt():string
                // {
                //     return $this->created_at;
                // }
            
                
            }
        }
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class = "container">
        <div class="wrapper py-3">
            <form action = "#" method = "POST">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="username" name = "username" placeholder="Username" required>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="password" name = "password" placeholder="password" required>
                    </div>
                </div>
                <div class = "col">  <button type="submit" class="btn btn-primary" name = "action" value = "save">Save</button> </div>
            </div>
        </form>
        </div>
    
        <h1>Users list</h1>
        <table class="table table-striped">
            <thead>
                </tr>
                <th scope = "col">Id</th>
                <th scope = "col">Username</th>
                <th scope = "col">Role</th>
                <th scope = "col">Created_at</th>
                <th scope = "col">Action</th>
                <tr>
            </thead>
            <tbody>
                <?php foreach($users_arr as $user):?>
                    <tr>
                        <td><?= $user->getId(); ?></td>
                        <td><?= $user->getUsername(); ?></td>
                        <td><?= $user->getRole(); ?></td>
                        <td><?= $user->getCreatedAt(); ?></td>
                        <td>
                            <form action="#" method = "POST">
                                <input type="hidden" name = "username_info" value = <?=$user->getUsername()?>>
                                <button  type="submit" class="btn btn-primary" name = "action" value = "info">Info</button>
                                <button type="submit" class="btn btn-danger" name = "action" value = "delete">Delete</button>
                                <button type="submit" class="btn btn-warning" name = "action" value = "update">Update</button> 
                            </form>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>       
        </table>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>