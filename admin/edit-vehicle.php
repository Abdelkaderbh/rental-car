
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Car Rental Portal | Admin Edit Vehicle Info</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>

<body>

<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		$user = $_SESSION['username'];
		header("Location:index.php");
	}
	if(isset($_GET['deconnexion']))
	{ 
	if($_GET['deconnexion']==true)
	{ 
	session_unset();
	header("location:index.php");
	}
	}
?>


<!-- Get Car by it's id -->
<?php
	require './includes/getCars.php' ;
	$idc=$_GET['id'];
	$statement = get_car_by_id($pdo,$idc);
	while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
?>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Edit Vehicle</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">


<form method="post" class="form-horizontal" enctype="multipart/form-data" action="">
<div class="form-group">
<label class="col-sm-2 control-label">Vehicle Title<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="vehicletitle" class="form-control" value="<?php echo $row['car_name']?>" >
</div>
<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="brandname" class="form-control" value="<?php echo $row['Brand']?>">
<option value=""></option>


</select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Vehical Overview<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="vehicalorcview" rows="3" > <?php echo $row['description']?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Day(in USD)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="number" name="priceperday" class="form-control" value="<?php echo $row['price']?>">
</div>
<label class="col-sm-2 control-label">Select Fuel Type<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="fueltype" >
<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
<option value="CNG">CNG</option>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Model Year<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="modelyear" class="form-control" value="<?php echo $row['Model_year']?>" >
</div>
<label class="col-sm-2 control-label">Seating Capacity<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="number" name="seatingcapacity" class="form-control" value="<?php echo $row['Capacity']?>" min="1" max ="8" >
</div>
</div>
<div class="hr-dashed"></div>								
<div class="form-group">
<div class="col-sm-12">
<h4><b>Vehicle Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
<img src="./img/vehicleimages/<?php echo $row['car_pictures']?>" width="300" height="200" style="border:solid 1px #000;">

<input type="file" class="form-control" style="margin-top:15px;" name='img1'> 
</div>

</div>

</div>
<div class="hr-dashed">
<div class="col-sm-8 col-sm-offset-2" >
				<button class="btn btn-primary" name="update" type="submit" style="margin-top:4%">Save changes</button>
</div>
</div>									
</div>
</div>
</div>
</div>						
<?php }?>
</form>

										
<?php
if (isset($_POST["update"])) {
			$Req='UPDATE cars SET car_name =:name ,price = :price , description = :description ,car_pictures=:pictures, Brand = :brand, Fuel_Type = :Fuel,  Model_year = :model_year , Capacity = :capacity where id_car=:id';
			$stmnt=$pdo->prepare($Req);
			$car_id = $_GET['id'];
			$car_name = $_POST['vehicletitle'];
			$description = $_POST['vehicalorcview'];
			$car_pictures = $_FILES['img1']['name'];
			move_uploaded_file($_FILES['img1']['tmp_name'], "./img/vehicleimages/".$car_pictures);
			// #$available_dates = $_POST['date'];
			$price = $_POST['priceperday'];
			$Brand = $_POST['brandname'];
			$Fuel_Type = $_POST['fueltype'];
			#$ACCESSORIES = implode(',',$_POST['Accessories']);
			$Model_year = $_POST['modelyear'];
			$Capacity = $_POST['seatingcapacity'];
			
			$stmnt->bindParam(':id', $car_id);
			$stmnt->bindParam(':name', $car_name);
			$stmnt->bindParam(':description', $description);
			$stmnt->bindParam(':pictures', $car_pictures);
			// #$stmt->bindParam(':dates', $available_dates);
			$stmnt->bindParam(':price', $price);
			$stmnt->bindParam(':brand', $Brand);
			$stmnt->bindParam(':Fuel', $Fuel_Type);
			#$stmt->bindParam(':access', $ACCESSORIES);
			$stmnt->bindParam(':model_year', $Model_year);
			$stmnt->bindParam(':capacity', $Capacity);
			$stmnt->execute();
			
			} ?>
</div>
</div>
</div>
</div>

</div>
</div>

</div>
</div>
</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>