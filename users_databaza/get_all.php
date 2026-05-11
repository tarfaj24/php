<?php 

function get_all($db, $spojenie)
{
    
    $users_arr = [];
    $sql = "SELECT * FROM users_table";
    $stmt = $spojenie->query($sql);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $users_arr[] = $row;
    }
    return $users_arr;
}

?>