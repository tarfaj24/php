<?php 
include "../Users.php";
include "../Database.php";

$db = new Database();
// $users = new Users(1,"jakub","velky","jakubvelky@gmail.com");

$spojenie = $db->nadviaz_spojenie();
public function get_all(){
    $sql = "SELECT * FROM users";
    $stmt = $spojenie->query($sql);
    $sth->fetch(PDO::FETCH_ASSOC);

   
}



$i = 0;

while($i < $pocet_riadkov){
    $users_arr[] = $riadok;
    $i+=1;
}

?>