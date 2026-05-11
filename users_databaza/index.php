<?php 
include "Database.php";
include "get_all.php";
include "Users.php";
$db = new Database();
$spojenie = $db->nadviaz_spojenie();
$users = [];
$users__get_all = get_all($db,$spojenie);
foreach($users__get_all as $row)
    {
        $user = new Users($row["id"], $row["meno"], $row["priezvisko"], $row["email"]);
        $users[] = $user; 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users</title>
    
</head>
<body>
    <table border="1">
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user->get_Id();?></td>
                <td><?= $user->get_Meno();?></td>
                <td><?= $user->get_Priezvisko();?></td>
                <td><?= $user->get_Email();?></td>
            </tr>
        <?php endforeach;?>
    </table>
    
</body>
</html>