<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{ 
  header('location:index.php');
}
else{
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ArtiSanat | My Booking</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta content="Author" name="WebThemez">
    <!-- Favicons -->
    <link href="img/logosite.png" rel="icon">
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
    <link href="css/style1.css" rel="stylesheet"> 
    <style>
    #myImage {
        display: block;
        margin-left: auto;
        margin-right: auto }
</style>




  </head>

  <body id="body">
   <?php include('includes/header.php');?>
   <section id="innerBanner"> 
    <div class="inner-content">
      <h2><span>My Bookings</span><br>We create the opportunities!</h2>
      <div> 
      </div>
    </div> 
  </section><!-- #Page Banner -->

  <main id="main">
   <?php 
   $useremail=$_SESSION['login'];
   $sql = "SELECT * from tblusers where EmailId=:useremail";
   $query = $dbh -> prepare($sql);
   $query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
   $query->execute();
   $results=$query->fetchAll(PDO::FETCH_OBJ);
   $cnt=1;
   if($query->rowCount() > 0)
   {
    foreach($results as $result)
      { ?>
        <section class="user_profile inner_pages">
          <div class="container">
            <div class="user_profile_info gray-bg padding_4x4_40">
              <div class="upload_user_logo"> <img src="admin/img/logosite.png" alt="image">
              </div>

              <div class="dealer_info">
                <h5><?php echo htmlentities($result->FullName);?></h5>
                <p><?php echo htmlentities($result->Address);?><br>
                  <?php echo htmlentities($result->City);?>&nbsp;<?php echo htmlentities($result->Country);
                }
              }?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-sm-3">
             <?php include('includes/sidebar.php');?>

             <div class="col-md-8 col-sm-8">
              <div class="profile_wrap">
                <h5 class="uppercase underline">My Cuir Bookings </h5>
                <div class="my_vehicles_list">
                  <ul class="vehicle_listing">
                    <?php 
                    $useremail=$_SESSION['login'];
                    $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.Quantity,tblbooking.message,tblbooking.Status,tblvehicles.PricePerDay,DATEDIFF(tblbooking.FromDate,tblbooking.ToDate) as totaldays,tblbooking.BookingNumber  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.userEmail=:useremail && tblbooking.VehicleType!='Bike'";
                    $query = $dbh -> prepare($sql);
                    $query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $result)
                      {  
                        ?>

                        <li>
                          <h4 style="color:red">You're Booking. &nbsp;</h4>
                          <div class="vehicle_img"> <a href="cuir_details.php?vhid=<?php echo htmlentities($result->vid);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a> </div>
                          <div class="vehicle_title">

                            <h6><a href="cuir_details.php?vhid=<?php echo htmlentities($result->vid);?>"> <?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
                            <p><b>From </b> <?php echo htmlentities($result->FromDate);?> <b>To </b> <?php echo htmlentities($result->ToDate);?></p>
                            <p><b>Quantity :</b> <?php echo htmlentities($result->Quantity);?></p>
                            <div style="float: left"><p><b>Message:</b> <?php echo htmlentities($result->message);?> </p></div>
                          </div>
                          <?php if($result->Status==1)
                          { ?>
                            <div class="vehicle_status">
                           <!-- Button trigger modal -->
                                  <button type="button"  class="btn outline btn-xs active-btn" data-toggle="modal" data-target="#exampleModalCenter">
                                    Confirmed
                                  </button>

                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Mode de Paiment</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div><br>
                                        <a href="facture.php" class="btn outline btn-xs active-btn">Espéces</a><br>
                                        <a href="user-card.php" class="btn outline btn-xs active-btn">Carte Bancaire</a><br>
                                      </div><br>
                                    </div>
                                  </div>
                            <div class="clearfix"></div>
                           </div>

                           <?php 
                         } else if($result->Status==2) { ?>
                           <div class="vehicle_status"><button type="button" class="btn outline btn-xs" data-toggle="modal" data-target="#exampleModal">
                           Cancelled
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Oooops !</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p style="text-align: center">Votre requete n'a pas été traité.Ou vous n'avez pas saisi vos informations correctement .Ou le produit est en rupture de stock.<br>
                                    pour plus d'information<a href="contact.php" class="tooltip-test" title="Tooltip">&nbsp;&nbsp;Contactez-nous</a></p></style>
                                  </div>
                                </div>
                              </div>
                            </div> 
                           <div class="clearfix"></div>
                          </div>
                          <?php 
                        } else { ?>
                         <div class="vehicle_status"> <button type="button" class="btn outline btn-xs" data-toggle="modal" data-target="#exampleModalLong">
                         Not confirm yet
                          </button>
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">En cours de traitement</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <img id="myImage" src="img/OIP.jpg"><br>
                                <p>Votre requéte est en cours de traitement,veuillez patienter !</p>
                                </div>
                              </div>
                            </div>
                          </div> 
                         <div class="clearfix"></div>
                        </div>
                        <?php 
                      } ?>

                    </li>

                    <h5 style="color:blue">Invoice</h5>
                    <table>
                      <tr>
                        <th>Product Name</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Quantity</th>
                        <th>Prix</th>
                      </tr>
                      <tr>
                        <td><?php echo htmlentities($result->VehiclesTitle);?>, <?php echo htmlentities($result->BrandName);?></td>
                        <td><?php echo htmlentities($result->FromDate);?></td>
                        <td> <?php echo htmlentities($result->ToDate);?></td>
                        <td><?php echo htmlentities($tds=$result->Quantity);?></td>
                        <td><?php echo htmlentities($ppd=$result->PricePerDay);?></td>
                      </tr>
                      <tr>
                        <th colspan="4" style="text-align:center;"> Grand Total</th>
                        <th><?php echo htmlentities($tds*$ppd);?></th>
                      </tr>
                    </table>
                    <hr />
                    <?php 
                  }
                }  else { ?>
                  <h5 align="center" style="color:red">No booking yet</h5>
                  <?php 
                } ?>
              </ul>
            </div>
          </div>


          <div class="profile_wrap">
                <h5 class="uppercase underline">My T&P Bookings </h5>
                <div class="my_vehicles_list">
                  <ul class="vehicle_listing">
                    <?php 
                    $useremail=$_SESSION['login'];
                    $sql = "SELECT tblbike.Vimage1 as Vimage1,tblbike.BikeTitle,tblbike.id as vid,tblbooking.FromDate,tblbooking.ToDate,tblbooking.Quantity,tblbooking.message,tblbooking.Status,tblbike.PricePerDay,DATEDIFF(tblbooking.FromDate,tblbooking.ToDate) as totaldays,tblbooking.BookingNumber  from tblbooking join tblbike on tblbooking.VehicleId=tblbike.id where tblbooking.userEmail=:useremail && tblbooking.VehicleType='Bike'";
                    $query = $dbh -> prepare($sql);
                    $query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $result)
                      {  
                        ?>

                        <li>
                          <h4 style="color:red">You're Booking. &nbsp;</h4>
                          <div class="vehicle_img"> <a href="T&P_details.php?vhid=<?php echo htmlentities($result->vid);?>"><img src="admin/img/bikeimages/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a> </div>
                          <div class="vehicle_title">

                            <h6><a href="T&P_details.php?vhid=<?php echo htmlentities($result->vid);?>"> <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
                            <p><b>From </b> <?php echo htmlentities($result->FromDate);?> <b>To </b> <?php echo htmlentities($result->ToDate);?></p>
                            <p><b>Quantity :</b> <?php echo htmlentities($result->Quantity);?></p>
                            <div style="float: left"><p><b>Message:</b> <?php echo htmlentities($result->message);?> </p></div>
                          </div>
                          <?php if($result->Status==1)
                          { ?>
                            <button type="button"  class="btn outline btn-xs active-btn" data-toggle="modal" data-target="#exampleModalCenter">
                                    Confirmed
                                  </button>

                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Mode de Paiment</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div><br>
                                        <a href="facture.php" class="btn outline btn-xs active-btn">Espéces</a><br>
                                        <a href="user-card.php" class="btn outline btn-xs active-btn">Carte Bancaire</a><br>
                                      </div><br>
                                    </div>
                                  </div>
                             <div class="clearfix"></div>
                           </div>

                           <?php 
                         } else if($result->Status==2) { ?>
                           <div class="vehicle_status"><button type="button" class="btn outline btn-xs" data-toggle="modal" data-target="#exampleModal">
                           Cancelled
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Oooops !</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p style="text-align: center">Votre requete n'a pas été traité.Ou vous n'avez pas saisi vos informations correctement .Ou le produit est en rupture de stock.<br>
                                    pour plus d'information<a href="contact.php" class="tooltip-test" title="Tooltip">&nbsp;&nbsp;Contactez-nous</a></p></style>
                                  </div>
                                </div>
                              </div>
                            </div> 
                            <div class="clearfix"></div>
                          </div>
                          <?php 
                        } else { ?>
                        <div class="vehicle_status"> <button type="button" class="btn outline btn-xs" data-toggle="modal" data-target="#exampleModalLong">
                         Not confirm yet
                          </button>
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">En cours de traitement</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <img id="myImage" src="img/OIP.jpg"><br>
                                <p>Votre requéte est en cours de traitement,veuillez patienter !</p>
                                </div>
                              </div>
                            </div>
                          </div> 
                          <div class="clearfix"></div>
                        </div>
                        <?php 
                      } ?>

                    </li>

                    <h5 style="color:blue">Invoice</h5>
                    <table>
                      <tr>
                        <th>Product Name</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Quantity</th>
                        <th>Prix</th>
                      </tr>
                      <tr>
                        <td><?php echo htmlentities($result->BikeTitle);?>, <?php echo htmlentities($result->BrandName);?></td>
                        <td><?php echo htmlentities($result->FromDate);?></td>
                        <td> <?php echo htmlentities($result->ToDate);?></td>
                        <td><?php echo htmlentities($tds=$result->Quantity);?></td>
                        <td> <?php echo htmlentities($ppd=$result->PricePerDay);?></td>
                      </tr>
                      <tr>
                        <th colspan="4" style="text-align:center;"> Grand Total</th>
                        <th><?php echo htmlentities($tds*$ppd);?></th>
                      </tr>
                    </table>
                    <hr />
                    <?php 
                  }
                }  else { ?>
                  <h5 align="center" style="color:red">No booking yet</h5>
                  <?php 
                } ?>
              </ul>
            </div>
          </div>




        </div>
      </div>
    </div>
  </section>

  <section id="call-to-action" class="wow fadeInUp">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 text-center text-lg-left">
          <h3 class="cta-title">Get Our Service</h3>
          <p class="cta-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt fugiat culpa esse aute nulla cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-lg-3 cta-btn-container text-center">
          <a class="cta-btn align-middle" href="#contact">Contact Us</a>
        </div>
      </div>

    </div>
  </section><!-- #call-to-action -->
</main>
<?php include('includes/footer.php');?><!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

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
<script>$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})</script>
</body>
</html>
<?php 
} ?>
