<header id="header">
  <div class="container">

    <div id="logo" class="pull-left">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/logoeasy.png">
   <h1><a href="index.php"><span style="color:aquamarine"><b>Arti</b></span>Sanat</a></h1>
   </div>
   <div class="pull-left ml-4">
    <!-- SEARCH FORM -->
    <form class="form-inline "  action="search.php" method="post">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="text"  name="searchdata" placeholder="Search Produit" aria-label="Search" required="true" style="height: 30px;">
        <div class="input-group-append">
          <button class="btn btn-navbar" style="background-color: aquamarine;" type="submit">
           <span style="color: #FFFFFF;"> <i class="fa fa-search"></i></span>
         </button>
       </div>
     </div>
   </form>
 </div>


 <nav id="nav-menu-container">
  <ul class="nav-menu">
    <li class="menu-active"><a href="index.php">Accueil</a></li>
    <?php   if(strlen($_SESSION['login'])!=0)
    { 
      ?>
      <?php 
      $email=$_SESSION['login'];
      $sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
      $query= $dbh -> prepare($sql);
      $query-> bindParam(':email', $email, PDO::PARAM_STR);
      $query-> execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);
      if($query->rowCount() > 0)
      {
        foreach($results as $result)
        {
          ?>
    <li><a href="cuir_list.php">Cuir</a></li>
    <li><a href="T&P.php">T&P</a></li>
    <li><a href="artisans.php">Artisans</a></li>
    <?php 
        }
      }
    }else{

    } ?>
    <li><a href="portfolio.php">Nos Services</a></li>
    <li class="menu-has-children"><a href="">Pages</a>
      <ul>
        <li><a href="about.php">À propos de nous</a></li>
        <li><a href="contact.php">Contactez-nous </a></li>
      </ul>
    </li>
    <li class="menu-has-children"><a href="">Fr</a>
    <ul>
        <li><a href="Ang">En</a></li>
        
      </ul>
    </li>
    <?php   if(strlen($_SESSION['login'])!=0)
    { 
      ?>
      <?php 
      $email=$_SESSION['login'];
      $sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
      $query= $dbh -> prepare($sql);
      $query-> bindParam(':email', $email, PDO::PARAM_STR);
      $query-> execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);
      if($query->rowCount() > 0)
      {
        foreach($results as $result)
        {
          ?>
          <li class="menu-has-children"><a href=""><?php echo htmlentities($result->FullName);?></a>
            <ul>
              <li><a href="profile.php">Paramètres</a></li>
              <li><a href="update_password.php">Mot de passe</a></li>
              <li><a href="my_booking.php">Ma réservation</a></li>
              <li><a href="logout.php"> Se déconnecter</a></li>
            </ul>
          </li>
          <?php 
        }
      }
    }else{

    } ?>
  </ul>
</nav><!-- #nav-menu-container -->
</div>
  </header><!-- #header -->