<?php 

include "Kniha.php";
include "Database.php";

$spojenie = new Database();
$db = $spojenie->nadviazSpojenie();

if (!$db){
    die("Databaza nie je pripojena");
}

$sql = "SELECT * FROM knihy";

$stmt = $db->query($sql);


if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $POST["action"] === "delete"){
    $sql = "DELETE FROM knihy WHERE id = :id"; #:id je fiktivne id neexistuje v skutocnosti

    $stmt = $db->prepare($sql);

    return $stmt->execute([
        ":id" => $_POST["kniha_id"]
    ]);
    header("Location:index.php");
    exit();


}

$pole = [];
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $kniha = null;
    $kniha = new Kniha($row["nazov"],$row["autor"],(int)$row["rok_vydania"],(int)$row["stav"]);
    if ($kniha){
        $kniha->setId($row["id"]);
        $kniznica[] = $kniha;
    }
}

var_dump($kniznica);


echo "<br>";


var_dump($db);


$kniznica = [];

$svet = new Kniha("Svet","Janko Hruška",1897,1);
$kniznica[] = $svet;

$auto = new Kniha("Auto","Stano Mak",2000,1);
$kniznica[] = $auto;



// echo $svet->getNazov()."<br>";
// echo $svet->get_Autor()."<br>";
// echo $svet->get_Rok_vydania()."<br>";
// echo $svet->get_Stav()."<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabulka</title>
</head>
<body>
    <h1>Kniznica</h1>
    <br>
    <table border="1">
        <tr>
            <th>Nazov</th>
            <th>Autor</th>
            <th>Rok vydania</th>
            <th>Stav</th>
            <th>Action</th>
        </tr>

        
        
            <?php foreach($kniznica as $kniha):?> 
                <tr>
                    <td>
                        <?= $kniha->getNazov() ?>
                    </td>
                    <td>
                        <?= $kniha->get_Autor() ?>
                    </td>
                    <td>
                        <?= $kniha->get_Rok_vydania() ?>
                    </td>
                    <td>
                        <?= $kniha->get_Stav() ?>
                    </td>
                </tr>
                 
            <?php endforeach;?>

        
        
    </table>
    
</body>
</html>