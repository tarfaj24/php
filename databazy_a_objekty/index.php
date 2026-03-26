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

$kniznica = [];

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"])){
    if ($_POST["action"] === "delete"){
    $sql = "DELETE FROM knihy WHERE id = :id"; #:id je fiktivne id neexistuje v skutocnosti

    $stmt = $db->prepare($sql);

    $stmt->execute([
        ":id" => $_POST["kniha_id"]
    ]);
    header("Location:index.php");
    exit();
    }

    elseif ($_POST["action"] === "create"){
        echo"adsadasdndsandns";
        // $kniha = new Kniha($_POST["nazov"],$_POST["autor"],(int)$_POST["rok_vydania"],(int)$_POST["stav"]);
        $sql = "INSERT INTO knihy(nazov,autor,rok_vydania,stav) VALUES(:nazov,:autor,:rok_vydania,:stav)";
        $stmt = $db->prepare($sql);

        $stmt->execute([
            ":nazov" => $_POST["nazov"],
            ":autor" => $_POST["autor"],
            ":rok_vydania" => (int)$_POST["rok_vydania"],
            ":stav" => (int)$_POST["stav"]

            ]);

        header("Location:index.php");
        exit();

    elseif($_POST["action"] === "update"){
        $sql = "UPDATE knihy SET nazov=:nazov,autor=:autor,rok_vydania=:rok_vydania,stav=:stav WHERE id=:id"; #:id je fiktivne id neexistuje v skutocnosti
        $stmt = $db->prepare($sql);
    
        $stmt->execute([
            ":id"=> $kniha_id,
            ":nazov" => $_POST["nazov"],
            ":autor" => $_POST["autor"],
            ":rok_vydania" => $_POST["rok_vydania"],
            ":stav" => $_POST["stav"]
        ])
    }
        
    }
    // elseif ($_POST["action"] === "update"){
        

    
        
    // }



}



while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $kniha = null;
    $kniha = new Kniha($row["nazov"],$row["autor"],(int)$row["rok_vydania"],(int)$row["stav"]);
    if ($kniha){
        $kniha->setId($row["id"]);
        $kniznica[] = $kniha;
    }
}


echo "<br>";









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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        form{
            padding:30px;
        }
        th{
            padding:20px;
        }
        td{
          
            padding:20px;
        }
    </style>
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
        <form action="index.php" method = "POST">
       
        
        <label for="nazov">Nazov</label>
        <input type="text" name="nazov" id="nazov_id">
        <label for="autor">Autor</label>
        <input type="text" name="autor" id="autor_id">
        <label for="rok_vydania">Rok vydania</label>
        <input type="number" name="rok_vydania" id="rokvydania_id">
        <label for="stav">Stav</label>
        1
        <input type="radio" name="stav" value="1">
        0
        <input type="radio" name="stav" value="0">


        <input type="hidden" name ="action" value="create">
        <input type="hidden" name="kniha_id" value="<?=$kniha->getId();?>">
        <button type="submit" class = "btn btn-primary">ADD</button>
        </form>

        
        
            <?php foreach($kniznica as $kniha):?> 
                <tr>
                    <td>
                        <?= $kniha->getNazov(); ?>
                    </td>
                    <td>
                        <?= $kniha->get_Autor(); ?>
                    </td>
                    <td>
                        <?= $kniha->getRok_vydania(); ?>
                    </td>
                    <td>
                        <?= $kniha->getStav(); ?>
                    </td>
                    <td>
                        <form action="index.php" method = "POST">
                            <input type="hidden" name ="action" value="delete">
                            <input type="hidden" name="kniha_id" value="<?=$kniha->getId();?>">
                            <button type="submit" class = "btn btn-danger">delete</button>             
                        </form>
                    </td>
                    <td>
                        <form action="update.php" method = "POST">
                            <input type="hidden" name ="action" value="update">
                            <input type="hidden" name="kniha_id" value="<?=$kniha->getId();?>">
                            <button type="submit" class = "btn btn-danger">update</button>    
                        </form>
                    </td>
                </tr>

                 
            <?php endforeach;?>

        
        
    </table>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>