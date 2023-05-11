
<?php
    require '../../website/database.php';

    $sql="INSERT INTO bookings (id_booking,id_car,username,phone,booking_date,return_date,user_email,state) VALUES (NULL,:id ,:name,:phone,:pick_date,:returndate,:email,'New');";
    $bookstmt = $pdo->prepare($sql);

    $id_car=$_GET['car_id'];
    $pick_date=$_GET['pickupData'];
    $return_date=$_GET['returnDate'];
    $name=$_GET['usrname'];
    $email=$_GET['email'];
    $phone=$_GET['phone'];

    $bookstmt->bindParam(':id', $id_car);
    $bookstmt->bindParam(':pick_date', $pick_date);
    $bookstmt->bindParam(':returndate', $return_date);
    $bookstmt->bindParam(':name', $name);
    $bookstmt->bindParam(':email', $email);
    $bookstmt->bindParam(':phone', $phone);

    $bookstmt->execute();

    if ($bookstmt->rowCount() > 0) {
        echo "Data inserted successfully.";
        header("Location:../../website/fleet.php");
    } else {
        echo "Error inserting data.";
    }

?>