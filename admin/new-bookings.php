

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Car Rental Portal | New Bookings   </title>

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

	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">New Bookings</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Bookings Info</div>
							<div class="panel-body">

								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
										<th>Vehicle ID</th>
											<th> Client Name </th>
											<th> Client Phone number </th>
											<th> Client email</th>
											<th>From Date</th>
											<th>To Date</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
											<th>Vehicle ID</th>
											<th> Client Name </th>
											<th> Client Phone number </th>
											<th> Client email</th>
											<th>From Date</th>
											<th>To Date</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
									<?php
										require './includes/booking.php' ;
										$st = booking_selection($pdo);
										while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
											$id=$row['id_booking']
									?>
										<tr>
											<td><?php echo $id ?></td>
											<td><?php echo $row['id_car'] ?></td>
											<td><?php echo $row['username'] ?></td>
											<td><?php echo $row['phone'] ?> </td>
											<td><?php echo $row['user_email'] ?> </td>
											<td><?php echo $row['booking_date'] ?> </td>
											<td><?php echo $row['return_date'] ?></td>
											<td><?php echo $row['state'] ?></td>
											<td><a href="./includes/confirmBooking.php?id=<?php echo $id ?>"><i class="fa fa-check"></i></a>&nbsp;&nbsp;
											<a href="./includes/deleteBooking.php?id=<?php echo $id ?>" onclick="return confirm('Do you want to cancel the booking ?');"><i class="fa fa-close"></i></a></td>
											</tr>
										<?php } ?>	
										
									</tbody>
								</table>

						

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

