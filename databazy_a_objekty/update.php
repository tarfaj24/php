<?php 
include "Kniha.php";
include "Database.php";


print_r($_POST);

$spojenie = new Database();
$db = $spojenie->nadviazSpojenie();

if (!$db){
    die("Databaza nie je pripojena");
}


$sql = "SELECT * FROM knihy WHERE id =:id ";
$stmt = $db->prepare($sql);
$stmt->execute([
    ":id"=> $_POST["kniha_id"]
]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tabulka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        td{
            padding:20px;
        }
        th{
            padding:20px;
        }
    </style>
</head>

    <body>
        <form action="index.php" method="POST">
        <label for="nazov" >Nazov</label>
        <input type="text" name="nazov" value=<?=$row["nazov"] ?>> 
        <label for="autor">Autor</label>
        <input type="text" name="autor" value=<?=$row["autor"] ?>> 
        <label for="rok_vydania">Rok_vydania</label>
        <input type="number" name=rok_vydania value=<?=$row["rok_vydania"] ?>> 
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="kniha_id" value="<?=$_POST["kniha_id"]?>">
        <button type="submit" name="updated" class = "btn btn-primary">UPDATE</button>
     
        </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>

</body>
</html>