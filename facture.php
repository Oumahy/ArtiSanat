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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtiSanat | Facture</title>
    <link href="img/logosite.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
  
</head>
<body>
      <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">FACTURE</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">Merci Pour Votre Confiance A Notre Produits</p>
                        <p class="text-white">ArtiSanat</p>
                        <p class="text-white">+2120654878564</p>
                    </div>
                </div>
             </div>
        </div> 
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
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                <h5>Name :<?php echo htmlentities($result->FullName);?></h5>
                <p>Address:  <?php echo htmlentities($result->Address);?><br>
                City :    <?php echo htmlentities($result->City);?>&nbsp;<?php echo htmlentities($result->Country);
                }
              }?></p>
                </div>
            </div>
        </div>
        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Pricetotal</th>
                    </tr>
                </thead>
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
                <tbody>
                <?php if($result->Status==1)
                          { ?>
                    <tr>
                        <td><?php echo htmlentities($result->VehiclesTitle);?>, <?php echo htmlentities($result->BrandName);?></td>
                        <td><?php echo htmlentities($ppd=$result->PricePerDay);?></td>
                        <td><?php echo htmlentities($tds=$result->Quantity);?></td>
                        <td><?php echo htmlentities($tds*$ppd);?></td>
                    </tr>   
                    <?php 
                      } ?>
                    <?php 
                      } ?>
                    <tr>
                   
                        <td colspan="3" class="text-right"><?php echo htmlentities($GTotal);?>Grand Total</td>
                        <td><?php echo htmlentities($tds*$ppd);?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Mode:Espece</h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2023 - Oamyma HAY | Leila MAAMOUCH. 
                <a href="https://www.ArtiSanat.com/" class="float-right">www.ArtiSanat.com</a>
            </p>
        </div>      
    </div>      

</body>
</html>
<?php 
}} ?>