<?php 
include "Kniha.php";
include "Database.php";
$spojenie = new Database();
$db = $spojenie->nadviazSpojenie();

if (!$db){
    die("Databaza nie je pripojena");
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
<form action="update.php" method = "POST">
        
       <label for="nazov">Nazov</label>
       <input type="text" name="nazov" id="nazov_id" value>
       <label for="autor">Autor</label>
       <input type="text" name="autor" id="autor_id">
       <label for="rok_vydania">Rok vydania</label>
       <input type="number" name="rok_vydania" id="rokvydania_id">
       <label for="stav">Stav</label>
        1
       <input type="radio" name="stav" value="1">
       0
       <input type="radio" name="stav" value="0">
      
       <input type="hidden" name ="create" value="create">
       <input type="hidden" name ="kniha_id" value="<?=$_POST["kniha_id"]?>">
       
        <button type="submit" class = "btn btn-primary">ADD</button>
        
       
       </form>

       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>