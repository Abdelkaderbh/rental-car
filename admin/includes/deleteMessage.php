<?php
require_once('messages.php');
$id = $_GET['id'];
delete_message($pdo, $id);
header("Location: ../messages.php");
?>