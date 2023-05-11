<?php
$host='localhost';
$db='location_voiture';
$login='root';
$mdp='';
try {    
$pdo=new PDO("mysql:host=$host;dbname=$db",$login,$mdp);
echo '<script> alert("connexion reussie"); </script>';
} catch (PDOException $e) {
    echo "erreur".$e->getMessage(); 
}
?>