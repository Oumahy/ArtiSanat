 <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <?php
            $aid=$_SESSION['odmsaid'];
            $sql="SELECT * from  tbladmin where ID=:aid";
            $query = $dbh -> prepare($sql);
            $query->bindParam(':aid',$aid,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            { 
                foreach($results as $row)
                {
                    ?>
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <?php 
                            if($row->Photo=="avatar15.jpg")
                            { 
                                ?>
                                <img class="img-avatar" src="assets/img/avatars/avatar15.jpg" alt="">
                                <?php 
                            } else { 
                                ?>
                                <img class="img-avatar" src="profileimages/<?php  echo $row->Photo;?>" alt=""> 
                                <?php 
                            } ?>
                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                            <span class="font-weight-bold mb-2"><?php  echo $row->FirstName;?> <?php  echo $row->LastName;?></span>
                        </div>
                    </a>
                    <?php 
                }
            } ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Tableau de bord</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#brand" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Gestion de la marque</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-archive menu-icon"></i>
            </a>
            <div class="collapse" id="brand">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="brand.php">Gérer la marque</a></li>
                </ul>
            </div>
        </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#driver" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Gestion des chauffeurs</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-archive menu-icon"></i>
            </a>
            <div class="collapse" id="driver">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="driver.php">Gérer les Chauffeurs</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Gestion des voitures</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-car menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="register_car.php">Enregistrer une voiture</a></li>
                    <li class="nav-item"> <a class="nav-link" href="manage_car.php">Gérer les voitures</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Gestion des Motos</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-car menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="register_bike.php">Enregistrer un Moto</a></li>
                    <li class="nav-item"> <a class="nav-link" href="manage_bike.php">Gérer les motos</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bookings" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Réservations de voitures</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-briefcase-check menu-icon"></i>
            </a>
            <div class="collapse" id="bookings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="new_bookings.php">Nouveau</a></li>
                    <li class="nav-item"> <a class="nav-link" href="confirmed_bookings.php">Confirmé</a></li>
                    <li class="nav-item"> <a class="nav-link" href="cancelled_bookings.php">Annulé</a></li>
                </ul>
            </div>
        </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bikebookings" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Réservations de moto</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-briefcase-check menu-icon"></i>
            </a>
            <div class="collapse" id="bikebookings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="new_bike_booking.php">Nouveau</a></li>
                    <li class="nav-item"> <a class="nav-link" href="bike_confirmed_booking.php">Confirmé</a></li>
                    <li class="nav-item"> <a class="nav-link" href="bike_cancelled_booking.php">Annulé</a></li>
                </ul>
            </div>
        </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#driverbookings" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Réservations de chauffeur</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-briefcase-check menu-icon"></i>
            </a>
            <div class="collapse" id="driverbookings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="driver_new_bookings.php">Nouveau</a></li>
                    <li class="nav-item"> <a class="nav-link" href="driver_confirmed_bookings.php">Confirmé</a></li>
                    <li class="nav-item"> <a class="nav-link" href="driver_cancelled_bookings.php">Annulé</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#companymanagement" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Gestion d'entreprise</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-bank menu-icon"></i>
            </a>
            <div class="collapse" id="companymanagement">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="companyprofile.php">Profil de la société</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="manage_subscribers.php">
                <span class="menu-title">Gérer les abonnés</span>
                <i class="mdi mdi-account-check menu-icon"></i>
            </a>
        </li>
        <?php
        $aid=$_SESSION['odmsaid'];
        $sql="SELECT * from  tbladmin where ID=:aid";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':aid',$aid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {  
            foreach($results as $row)
            { 
                if($row->AdminName=="Admin"  )
                { 
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                            <span class="menu-title">Gestion des utilisateurs</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-account-multiple menu-icon"></i>
                        </a>
                        <div class="collapse" id="general-pages">

                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="userregister.php">Enregistrer l'utilisateur</a></li> 
                                 <li class="nav-item"> <a class="nav-link" href="customers.php">Clients enregistrés </a></li> 
                                <?php
                                $aid=$_SESSION['odmsaid'];
                                $sql="SELECT * from  tbladmin where ID=:aid";
                                $query = $dbh -> prepare($sql);
                                $query->bindParam(':aid',$aid,PDO::PARAM_STR);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {  
                                    foreach($results as $row)
                                    { 
                                        if($row->AdminName=="Admin"  )
                                        { 
                                            ?>
                                            <li class="nav-item"> <a class="nav-link" href="user_permission.php"> Autorisations utilisateur</a></li>


                                            <?php 
                                        } 
                                    }
                                } ?> 
                            </ul>

                        </div>
                    </li>
                    <?php 
                } 
            }
        } ?> 
    </ul>
</nav>