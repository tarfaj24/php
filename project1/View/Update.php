<?php 
 
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {

    }
    print_r($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
    <body>
            <div class="wrapper py-3">
                <form action = "Home.php" method = "POST">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="username" name = "username" placeholder="Username" required>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="password" name = "password" placeholder="Password" required>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="role" name = "role" placeholder="Role" required>
                            </div>
                    </div>
                </div>

                <div class = "col">  <button type="submit" class="btn btn-primary" name = "action" value = "save">Save</button> </div>
            </form>
            </div>
        

        
    </body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>