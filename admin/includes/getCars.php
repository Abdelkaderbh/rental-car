<?php
$host='localhost';
$db='location_voiture';
$login='root';
$mdp='';
try {    
$pdo=new PDO("mysql:host=$host;dbname=$db",$login,$mdp);
} catch (PDOException $e) {
    echo "erreur".$e->getMessage(); 
}


function selection($pdo)
{
$sql = "SELECT * FROM cars;";
$st=$pdo->prepare($sql);
$st->execute();
return $st;
}

function Numb_Cars($pdo){
    $sqlcount = "SELECT COUNT(id_car) as nums,COUNT(distinct Brand) as BrandNums FROM cars;";
    $ste=$pdo->prepare($sqlcount);
    $ste->execute();
    return $ste;
}


function delete(PDO $pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM cars WHERE id_car = ?");
    $stmt->execute([$id]);
}

function get_car_by_id(PDO $pdo, $idc){
    $statement= $pdo->prepare("SELECT * from cars where id_car =?");
    $statement->execute([$idc]);
    return $statement;
}
  


?>


