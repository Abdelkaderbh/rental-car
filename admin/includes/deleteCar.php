<?php
require_once('getCars.php');
$id = $_GET['id'];
delete($pdo, $id);
header("Location: ../manage-vehicles.php");
?>
