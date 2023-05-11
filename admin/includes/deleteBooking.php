<?php
require_once('booking.php');
$id = $_GET['id'];
delete_booking($pdo, $id);
header("Location: ../new-bookings.php");
?>
