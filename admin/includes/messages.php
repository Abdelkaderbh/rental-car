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


    function get_messages($pdo){
        $sql = "select * from contact_us";
        $stmgs = $pdo->prepare($sql);
        $stmgs->execute();
        return $stmgs;
    }

    function numb_messages($pdo) {
        $sqlcount = "SELECT count(id) as number_messages from contact_us;";
        $ste=$pdo->prepare($sqlcount);
        $ste->execute();
        return $ste;
    }




?>