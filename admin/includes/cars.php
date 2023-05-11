<?php
require '../../website/database.php';

$sql = "INSERT INTO cars (id_car, price, car_name, description, car_pictures, available_dates, Brand, Fuel_Type, ACCESSORIES, Model_year, Capacity) VALUES (NULL, :price, :name, :description, :pictures, :dates, :brand, :Fuel, :access, :model_year, :capacity)";
$stmt = $pdo->prepare($sql);

$car_name = $_POST['vehicletitle'];
$description = $_POST['vehicalorcview'];
$car_pictures = $_FILES['img1']['name'];
move_uploaded_file($_FILES['img1']['tmp_name'], "../img/vehicleimages/".$car_pictures);
$available_dates = $_POST['date'];
$price = $_POST['priceperday'];
$Brand = $_POST['brandname'];
$Fuel_Type = $_POST['fueltype'];
$ACCESSORIES = implode(',',$_POST['Accessories']);
$Model_year = $_POST['modelyear'];
$Capacity = $_POST['seatingcapacity'];

$stmt->bindParam(':name', $car_name);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':pictures', $car_pictures);
$stmt->bindParam(':dates', $available_dates);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':brand', $Brand);
$stmt->bindParam(':Fuel', $Fuel_Type);
$stmt->bindParam(':access', $ACCESSORIES);
$stmt->bindParam(':model_year', $Model_year);
$stmt->bindParam(':capacity', $Capacity);

$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "Data inserted successfully.";
    header("Location: ../post-avehical.php");
} else {
    echo "Error inserting data.";
}
?>
