<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ArtiSanat | Leather </title>
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
</head>

<body id="body"> 
 <?php include('includes/header.php');?>
 <section id="innerBanner"> 
  <div class="inner-content">
    <h2><span>Leather</span><br>Enjoy our high quality leather products!</h2>
    <div> 
    </div>
  </div> 
</section><!-- #Page Banner -->

<main id="main">

    <!--==========================
      About Section
      ============================-->
      <section id="about" class="wow fadeInUp">
        <div class="container"> 
          <div class="row">
            <div class="row">
              <div class="col-md-9 col-md-push-3">
                <div class="result-sorting-wrapper">
                  <div class="sorting-count">
                    <?php 
                    //Query for Listing count
                    $sql = "SELECT id from tblvehicles";
                    $query = $dbh -> prepare($sql);
                    $query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=$query->rowCount();
                    ?>
                    <p><span><?php echo htmlentities($cnt);?> Listings</span></p>
                  </div>
                </div>

                <?php $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand order by rand() ";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0)
                {
                  foreach($results as $result)
                  {  
                    ?>
                    <div class="product-listing-m gray-bg">
                      <div class="product-listing-img"><img src="../admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="Image" style="height: 280px; width:280px;" /> </a> 
                      </div>
                      <div class="product-listing-content">
                        <h5><a href="cuir_details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h5>
                        <p class="list-price"><?php echo htmlentities($result->PricePerDay);?> &nbsp; MAD</p>
                        <ul>
                          <li><i class="fa fa-calendar" aria-hidden="true"></i>Produce in &nbsp; <?php echo htmlentities($result->ModelYear);?> </li>
                          </ul>
                        <a href="cuir_details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn" style="background-color: #49a3ff;" >View Details <span class="angle_arrow"><i class="fa fa-angle-right" style="color: #49a3ff; " aria-hidden="true"></i></span></a>
                      </div>
                    </div>
                    <?php
                  }
                } ?>
              </div>

              <!--Side-Bar-->
              <aside class="col-md-3 col-md-pull-9">
                <div class="sidebar_widget">
                  <div class="widget_heading">
                    <h5></i> Recently Listed Products</h5>
                  </div>
                  <div class="recent_addedcars">
                    <ul>
                      <?php $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand order by id desc limit 4";
                      $query = $dbh -> prepare($sql);
                      $query->execute();
                      $results=$query->fetchAll(PDO::FETCH_OBJ);
                      $cnt=1;
                      if($query->rowCount() > 0)
                      {
                        foreach($results as $result)
                        {  
                          ?>

                          <li class="gray-bg">
                            <div class="recent_post_img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="../admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a> </div>
                            <div class="recent_post_title"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a>
                              <p class="widget_price"><?php echo htmlentities($result->PricePerDay);?> MAD</p>
                            </div>
                          </li>
                          <?php 
                        }
                      } ?>

                    </ul>
                  </div>
                </div>
              </aside>
              <!--/Side-Bar--> 
            </div>
            
          </div>

        </div>
      </section><!-- #about -->
      

    <!--==========================
      Call To Action Section
      ============================-->
      
    </main>

  <!--==========================
    Footer
    ============================-->
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

  </body>
  </html>
