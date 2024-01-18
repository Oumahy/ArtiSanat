<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ArtiSanat |T&P</title>
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
  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/font/font-awesome.css" rel="stylesheet" /> 
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
    <h2><span>C&P</span><br>Find the best Pottery and Carpet for you</h2>
    <div> 
    </div>
  </div> 
</section><!-- #Page Banner -->


<main id="main">

  <section id="services">
    <div class="container">
      <div class="row">
        <?php $sql = "SELECT tblbike.BikeTitle,tblbike.PricePerDay,tblbike.ModelYear,tblbike.id,tblbike.BikeOverview,tblbike.Vimage1 from tblbike  order by rand() ";
       $query = $dbh -> prepare($sql);
       $query->execute();
       $results=$query->fetchAll(PDO::FETCH_OBJ);
       $cnt=1;
       if($query->rowCount() > 0)
       {
        foreach($results as $result)
        {  
          ?> 
          <div class="col-lg-4">
            <div class="box wow  fadeInLeft">
              <div class="car-info-box">
                <a href="T&P_details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="../admin/img/T&p/<?php echo htmlentities($result->Vimage1);?>" style="height: 300px; width: 280px;" class="img-responsive"  alt="image" >
                </a>
                <ul style=" width: 280px;">
                 
                  <li><i class="fa fa-calendar" aria-hidden="true"></i>Produced in &nbsp;<?php echo htmlentities($result->ModelYear);?> </li>
                </ul>
                <div class="car-title-m">
                  <h6><a href="T&P_details.php?vhid=<?php echo htmlentities($result->id);?>"> <?php echo substr($result->BikeTitle,0,21);?></a></h6>
                  <span class="price"><?php echo htmlentities($result->PricePerDay);?>MAD</span> 
                </div>
                <div class="inventory_info_m ">
                  <p><?php echo substr($result->BikeOverview,0,70);?></p>
                </div>
              </div>
            </div>
          </div>
          <?php 
        }
      }?>
    </div>
  </div>
</section><!-- #services -->



</section><!-- #call-to-action -->
</section><!-- #clients --> 
   
   <section id="call-to-action" class="wow fadeInUp">
     <div class="container">
       <div class="row">
         <div class="col-lg-9 text-center text-lg-left">
           <h3 class="cta-title">You want to contact our team? You are welcome!</h3>
           <p class="cta-text">We are ready to get your questions and offer you better solutions.</p>
         </div>
         <div class="col-lg-3 cta-btn-container text-center">
           <a class="cta-btn align-middle" href="contact.php">CONTACT US</a>
         </div>
       </div>

     </div>


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
