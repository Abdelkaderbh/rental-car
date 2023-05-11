<?php
require '../../website/database.php';
$sql="INSERT INTO contact_us (Id,sender_name,sender_email,sender_subject,sender_message) VALUES (NULL,:name,:email,:subject,:message);";
$sendstmt = $pdo->prepare($sql);


$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];

$sendstmt->bindParam(':name', $name);
$sendstmt->bindParam(':email', $email);
$sendstmt->bindParam(':subject', $subject);
$sendstmt->bindParam(':message', $message);


$sendstmt->execute();

if ($sendstmt->rowCount() > 0) {
    echo "Data inserted successfully.";
    header("Location:../../website/contact.php");
} else {
    echo "Error inserting data.";
}
?>
