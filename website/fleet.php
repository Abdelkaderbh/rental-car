<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Car Rental Website</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>
    <!-- Header -->
   <?php include "header.php"; ?>
    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>find your car today</h4>
              <h2>Fleet</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
   

    <div class="products">
      <div class="container">
        <div class="row">
        <?php
            require '../admin/includes/getCars.php' ;
            $st = selection($pdo);
            while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
        ?>
          <div class="col-md-4">
            <div class="product-item">
              <img src="../admin/img/vehicleimages/<?php echo $row['car_pictures'] ?>"  width='250' height='200'>

              <div class="down-content">
                <h4><?php echo $row['car_name'] ?></h4>

                <h6><small>from</small> $<?php echo $row['price']?> <small>per day</small></h6>

                <p><?php echo $row['description'] ?></p>

                <small>
                    <strong title="passegengers"><i class="fa fa-user"></i> <?php echo $row['Capacity']?> </strong> &nbsp;&nbsp;&nbsp;&nbsp;
                    <strong title="transmission"><i class="fa fa-cog"></i> <?php echo $row['Fuel_Type']?> </strong>
                </small>

                <span>
                  <a href="#" data-toggle="modal" data-target="#exampleModal"  onclick="document.getElementById('car_id').value = '<?php echo $row['id_car'];?>'">Book Now</a>
                </span>
              </div>
            </div>
          </div>
          <?php } ?>

        </div>
      </div>
    </div>

   <?php include "footer.php"; ?>
   
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
       
            <div class="contact-form">
              <form action="../admin/includes/bookCar.php" id="contact">
                  <div class="row">
                  <input type="hidden" name="car_id" id="car_id" value="">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="date" class="form-control" placeholder="Pick-up date/time" name='pickupData' required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="date" class="form-control" placeholder="Return date/time" name ='returnDate' required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" name='usrname' required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="email" class="form-control" placeholder="Enter email address" name='email' required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="number" class="form-control" placeholder="Enter phone" name='phone' required="">
                          </fieldset>
                       </div>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <input type="submit" class="btn btn-primary" value='Book Now'>
                </div>
              </form>
           </div>
          </div>
      
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>
