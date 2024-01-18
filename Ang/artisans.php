<?php 
session_start();
include('includes/config.php');
error_reporting(0);


if(isset($_POST['submit']))
{
  $fromdate=$_POST['fromdate'];
  $todate=$_POST['todate']; 
  $first=$_POST['first'];
  $last=$_POST['last'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $useremail=$_SESSION['login'];
  $status=0;
  $vhid=$_SESSION['did'];
  $bookingno=mt_rand(100000000, 999999999);

  $sql="INSERT INTO  tbldriverbooking(userEmail,VehicleId,FromDate,ToDate,Firstname,Lastname,Phone,Email,Address,Status,BookingNumber) VALUES(:useremail,:vhid,:fromdate,:todate,:first,:last,:phone,:email,:address,:status,:bookingno)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
  $query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
  $query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
  $query->bindParam(':todate',$todate,PDO::PARAM_STR);
  $query->bindParam(':first',$first,PDO::PARAM_STR);
  $query->bindParam(':last',$last,PDO::PARAM_STR);
  $query->bindParam(':phone',$phone,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':address',$address,PDO::PARAM_STR);
  $query->bindParam(':status',$status,PDO::PARAM_STR);
  $query->bindParam(':bookingno',$bookingno,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if($lastInsertId)
  {
    echo "<script>alert('Booked successfuly.');</script>";
    echo "<script type='text/javascript'> document.location = 'my_booking.php'; </script>";
  }
  else 
  {
    echo "<script>alert('Something went wrong. Please try again');</script>";
    echo "<script type='text/javascript'> document.location = 'artisans.php'; </script>";
  } 
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ArtiSanat| Artisans</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta content="Author" name="WebThemez">
  <!-- Favicons -->
  <link href="img/favicon-32x32.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../css/style1.css" rel="stylesheet">
  <link id="ekka-css" rel="stylesheet" href="css/style2.css"> 

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="assets2/plugins/simplebar/simplebar.css" rel="stylesheet">
</head>

<body id="body"> 
 <?php include('includes/header.php');?>
 <section id="innerBanner"> 
  <div class="inner-content">
  <h2><span>Artisans</span><br>Get in touch with an elite group of craftsmen.</h2>
    <div> 
    </div>
  </div> 
</section><!-- #Page Banner -->
<main id="main">
  <section id="about" class="wow fadeInUp">
    <div class="container"> 
      <div class="ec-content-wrapper ec-ec-content-wrapper mb-m-24px">
        <div class="content">
          <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
              <h1>Artisans</h1>
              <p class="breadcrumbs"><span>
                <a href="index.html">Home</a>
              </span> <span>
                <i class="mdi mdi-chevron-right"></i>
              </span>Artisans
            </p>
          </div>
        </div>
        <div class="row">
          <?php
          $sql = "SELECT * from  tbldrivers ";
          $query = $dbh -> prepare($sql);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          if($query->rowCount() > 0)
          {
            foreach($results as $result)
            {   
              $_SESSION['did']=$result->Id;  
              ?>
              <div class="col-lg-6 col-xl-4 mb-24px">
                <div class="ec-user-card card card-default p-4">
                  <a href="#" data-bs-toggle="modal" id="<?php echo  ($result->Id); ?>" title="click to edit" data-bs-target="#modalContact" class="view-detail">
                    <i class="mdi mdi-eye-plus-outline"></i>
                  </a>
                  <a href="javascript:0" class="media text-secondary">
                    <img src="../admin/img/driverimages/<?php  echo $result->Dimage;?>" class="mr-3 img-fluid" alt="Avatar Image">
                    <div class="media-body">
                      <h5 class="mt-0 mb-2 text-dark"><?php echo htmlentities($result->DriverName);?></h5>
                      <ul class="list-unstyled">
                        <li class="d-flex mb-1">
                          <i class="mdi mdi-email mr-1"></i> <span>
                            <span class="__cf_email__" data-cfemail="cbaeb3a6aabba7ae8baea6aaa2a7e5a8a4a6">[&#160;<?php echo htmlentities($result->Email);?>]
                            </span>
                          </span>
                        </li>
                        <li class="d-flex mb-1">
                          <i class="mdi mdi-phone mr-1"></i>
                          <span>(+212) <?php echo htmlentities($result->Phone);?></span>
                        </li>
                        <li class="d-flex mb-1"><?php echo htmlentities($result->PricePerDay);?> &nbsp;MAD</li>
                        <li class="d-flex mb-1"><?php echo htmlentities($result->Experience);?> Experience</li>
                        <li>
                         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-contact">Contact</button>
                       </li>
                     </ul>
                   </div>
                 </a>
               </div>
             </div>
             <?php 
           }
         } ?>
       </div>
       <div class="modal fade modal-contact-detail" id="modalContact" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header justify-content-end border-bottom-0">
              <div class="dropdown">
                <button class="btn-dots-icon" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
              </div>
              <button type="button" class="btn-close-icon" data-bs-dismiss="modal" aria-label="Close">
                <i class="mdi mdi-close"></i>
              </button>
            </div>
            <div class="modal-body pt-0">

              <div class="row no-gutters">
                <?php
                $did=$_SESSION['did'];
                $sql2 = "SELECT * from  tbldrivers where Id='$did' ";
                $query2 = $dbh -> prepare($sql2);
                $query2->execute();
                $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                if($query2->rowCount() > 0)
                {
                  foreach($results2 as $result2)
                  {     
                    ?>
                    <div class="col-md-6">
                      <div class="profile-content-left px-4">
                        <div class="text-center widget-profile px-0 border-0">
                          <div class="card-img mx-auto rounded-circle">
                            <img src="../admin/img/driverimages/<?php  echo $result2->Dimage;?>" alt="user image">
                          </div>
                          <div class="card-body">
                            <h4 class="py-2 text-dark"><?php echo htmlentities($result->DriverName);?></h4>
                            <p>
                              <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="600a0f080e0518010d100c0520070d01090c4e030f0d">[&#160;<?php echo htmlentities($result2->Email);?>]</a>
                            </p>
                            <a class="btn btn-primary btn-pill my-4" href="#">Follow</a>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between">
                          <div class="text-center pb-4">
                            <h6 class="text-dark pb-2">354</h6>
                            <p>Bought</p>
                          </div>
                          <div class="text-center pb-4">
                            <h6 class="text-dark pb-2">30</h6>
                            <p>Wish List</p>
                          </div>
                          <div class="text-center pb-4">
                            <h6 class="text-dark pb-2">1200</h6>
                            <p>Following</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="contact-info px-4">
                        <h4 class="text-dark mb-1">Artisan Details</h4>
                        <p class="text-dark font-weight-medium pt-4 mb-2">E-mail </p>
                        <p>
                          <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="cea4a1a6a0abb6afa3bea2ab8ea9a3afa7a2e0ada1a3">[&#160;<?php echo htmlentities($result2->Email);?>]</a>
                        </p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Phone Number</p>
                        <p>+212 <?php echo htmlentities($result2->Phone);?></p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Experience</p>
                        <p><?php echo htmlentities($result2->Experience);?></p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Address</p>
                        <p>Fes, Morocco.</p></div>
                      </div>
                    </div>

                    <?php
                  }
                }?>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade modal-add-contact" id="modal-add-contact" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <form method="post">
                <div class="modal-header px-4">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Contact Artisan</h5>
                </div>
                <div class="modal-body px-4">

                  <div class="row mb-2">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="firstName">First name:</label>
                        <input class="form-control" name="first" id="firstName" value="" required>
                      </div>
                    </div>
                    <div class="col-lg-6"><div class="form-group"><label for="lastName">Last name:</label>
                      <input class="form-control" name="last" id="lastName" value="" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group mb-4">
                      <label for="userName">Phone N°:</label>
                      <input class="form-control" name="phone" id="userName" value="" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group mb-4">
                      <label for="email">E-mail:</label>
                      <input type="email" class="form-control" name="email" id="email" value=""required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group mb-4">
                      <label>From Date:</label>
                      <input type="date" class="form-control" name="fromdate" placeholder="From Date" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group mb-4">
                      <label>To Date:</label>
                      <input type="date" class="form-control" name="todate" placeholder="From Date" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group mb-4">
                      <label for="event">Address:</label>
                      <input class="form-control" id="event" name="address" value="" placeholder="Address Here" required>

                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer px-4">
                <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button> 
                <?php if($_SESSION['login'])
                {?>
                  <button type="submit" name="submit" class="btn btn-primary btn-pill">Contact</button>
                  <?php 
                } else { ?>
                  <a href="index.php" ><button type="button" class="btn btn-primary btn-pill"> Login</button></a>

                  <?php 
                } ?>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section><!-- #about -->
</main>
<?php include('includes/footer.php');?>

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

<!-- JavaScript  -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/superfish/hoverIntent.js"></script>
<script src="lib/superfish/superfish.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/magnific-popup/magnific-popup.min.js"></script>
<script src="lib/sticky/sticky.js"></script> 
<script src="contact/jqBootstrapValidation.js"></script>
<script src="contact/contact_me.js"></script>
<script src="js/main.js"></script>
<script src="assets2/plugins/jquery/jquery-3.5.1.min.js"></script>
</script>
<script src="assets2/js/bootstrap.bundle.min.js"></script>

</body>
</html>
