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


function booking_selection($pdo)
{
$sql = "SELECT * FROM bookings where state ='new';";
$st=$pdo->prepare($sql);
$st->execute();
return $st;
}



function booking_selection_confirmed($pdo)
{
$sql = "SELECT * FROM bookings where state = 'Confirmed' ;";
$st=$pdo->prepare($sql);
$st->execute();
return $st;
}


function Numb_bookings($pdo){
    $sqlcount = "SELECT COUNT(id_booking) as bookingNums from bookings;";
    $ste=$pdo->prepare($sqlcount);
    $ste->execute();
    return $ste;
}


function booking_change_sate($pdo)
{
    $sql = "UPDATE bookings SET state = 'confirmed' WHERE bookings.id_booking = ?";
}


function delete_booking($pdo, $id_booking) {
    try {
      $stmt = $pdo->prepare("DELETE FROM bookings WHERE id_booking = ?");
      $stmt->execute([$id_booking]);
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }


  function confirm_booking($pdo, $id_booking) {
    try {
      $stmt = $pdo->prepare("UPDATE bookings SET state = 'confirmed' WHERE bookings.id_booking = ?");
      $stmt->execute([$id_booking]);
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }


