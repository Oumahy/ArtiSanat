<?php
include('includes/checklogin.php');
check_login();

if(isset($_POST['save']))
{
  $vehicletitle=$_POST['car'];
  $brand=$_POST['brand'];
  $vehicleoverview=$_POST['description'];
  $priceperday=$_POST['priceperday'];
  $fueltype=$_POST['fueltype'];
  $modelyear=$_POST['modelyear'];
  $seatingcapacity=$_POST['seatingcapacity'];
  $airconditioner=$_POST['airconditioner'];
  $powerdoorlocks=$_POST['powerdoorlocks'];
  $antilockbrakingsys=$_POST['antilockbrakingsys'];
  $brakeassist=$_POST['brakeassist'];
  $powersteering=$_POST['powersteering'];
  $driverairbag=$_POST['driverairbag'];
  $passengerairbag=$_POST['passengerairbag'];
  $powerwindow=$_POST['powerwindow'];
  $cdplayer=$_POST['cdplayer'];
  $centrallocking=$_POST['centrallocking'];
  $crashcensor=$_POST['crashcensor'];
  $leatherseats=$_POST['leatherseats'];
  $id=intval($_GET['id']);

  $sql="update tblvehicles set VehiclesTitle=:vehicletitle,VehiclesBrand=:brand,VehiclesOverview=:vehicleoverview,PricePerDay=:priceperday,FuelType=:fueltype,ModelYear=:modelyear,SeatingCapacity=:seatingcapacity,AirConditioner=:airconditioner,PowerDoorLocks=:powerdoorlocks,AntiLockBrakingSystem=:antilockbrakingsys,BrakeAssist=:brakeassist,PowerSteering=:powersteering,DriverAirbag=:driverairbag,PassengerAirbag=:passengerairbag,PowerWindows=:powerwindow,CDPlayer=:cdplayer,CentralLocking=:centrallocking,CrashSensor=:crashcensor,LeatherSeats=:leatherseats where id=:id ";
  $query = $dbh->prepare($sql);
  $query->bindParam(':vehicletitle',$vehicletitle,PDO::PARAM_STR);
  $query->bindParam(':brand',$brand,PDO::PARAM_STR);
  $query->bindParam(':vehicleoverview',$vehicleoverview,PDO::PARAM_STR);
  $query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
  $query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
  $query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
  $query->bindParam(':seatingcapacity',$seatingcapacity,PDO::PARAM_STR);
  $query->bindParam(':airconditioner',$airconditioner,PDO::PARAM_STR);
  $query->bindParam(':powerdoorlocks',$powerdoorlocks,PDO::PARAM_STR);
  $query->bindParam(':antilockbrakingsys',$antilockbrakingsys,PDO::PARAM_STR);
  $query->bindParam(':brakeassist',$brakeassist,PDO::PARAM_STR);
  $query->bindParam(':powersteering',$powersteering,PDO::PARAM_STR);
  $query->bindParam(':driverairbag',$driverairbag,PDO::PARAM_STR);
  $query->bindParam(':passengerairbag',$passengerairbag,PDO::PARAM_STR);
  $query->bindParam(':powerwindow',$powerwindow,PDO::PARAM_STR);
  $query->bindParam(':cdplayer',$cdplayer,PDO::PARAM_STR);
  $query->bindParam(':centrallocking',$centrallocking,PDO::PARAM_STR);
  $query->bindParam(':crashcensor',$crashcensor,PDO::PARAM_STR);
  $query->bindParam(':leatherseats',$leatherseats,PDO::PARAM_STR);
  $query->bindParam(':id',$id,PDO::PARAM_STR);
  $query->execute();

  $msg="Data updated successfully";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php @include("includes/header.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php @include("includes/sidebar.php");?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <form class="forms-sample" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class=" col -md-12 card">
              <div class="modal-header">
                <h5 class="modal-title" style="float: left;">Edit Cuir</h5>
              </div>
              <?php 
              if($msg){
                ?>
                <div class="succWrap">
                  <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> 
                </div>
                <?php 
              } ?>
              <?php 
              $id=intval($_GET['id']);
              $sql ="SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:id";
              $query = $dbh -> prepare($sql);
              $query-> bindParam(':id', $id, PDO::PARAM_STR);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              $cnt=1;
              if($query->rowCount() > 0)
              {
                foreach($results as $result)
                { 
                  ?>
                  <div class="col-md-12 mt-4">
                    <div class="row ">
                      <div class="form-group col-md-6 ">
                        <label for="exampleInputPassword1">Select Brand<span style="color:red">*</span></label>
                        <select  name="brand"  class="form-control" required>
                          <option value="<?php echo htmlentities($result->bid);?>"><?php echo htmlentities($bdname=$result->BrandName); ?> </option>
                          <?php
                          $sql="SELECT * from  tblbrands";
                          $query = $dbh -> prepare($sql);
                          $query->execute();
                          $results=$query->fetchAll(PDO::FETCH_OBJ);
                          if($query->rowCount() > 0)
                          {
                            foreach($results as $row)
                            {
                              ?> 
                              <option value="<?php  echo $row->id;?>"><?php  echo $row->BrandName;?></option>
                              <?php 
                            }
                          } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">Cuir Name<span style="color:red">*</span></label>
                        <input type="text" name="car" class="form-control"  value="<?php echo htmlentities($result->VehiclesTitle)?>"  id="product" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label for="exampleInputName1">Cuir Description<span style="color:red">*</label>
                         <textarea class="form-control" style=" font-family: fontawesome;
                         font-size: 17px; line-height: 25px;" name="description" rows="6" required><?php echo htmlentities($result->VehiclesOverview);?></textarea>
                       </div>
                     </div>
                     <div class="row">
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Price<span style="color:red">*</label>
                          <input type="text" name="priceperday" value="<?php echo htmlentities($result->PricePerDay);?>" class="form-control" id="price"required>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="exampleInputName1">Fabrication Year<span style="color:red">*</label>
                            <input type="text" name="modelyear" value="<?php echo htmlentities($result->ModelYear);?>"   class="form-control" id="price"required>
                        </div>
                          <div class="row ">
                            <div class="form-group col-md-4 pl-md-0">
                              <label class="col-sm-12 pl-0 pr-0 ">Car image1 </label>
                              <div class="col-sm-12 pl-0 pr-0">
                               <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" width="300" height="200" style="border:solid 1px #000">
                               <a href="changeimage1.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 1</a>
                             </div>
                           </div> 
                           <div class="form-group col-md-4 pl-md-0">
                            <label class="col-sm-12 pl-0 pr-0 ">Car image2 </label>
                            <div class="col-sm-12 pl-0 pr-0">
                              <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" width="300" height="200" style="border:solid 1px #000">
                              <a href="changeimage2.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 2</a>
                            </div>
                          </div> 
                          <div class="form-group col-md-4 pl-md-0">
                            <label class="col-sm-12 pl-0 pr-0 ">Car image3 </label>
                            <div class="col-sm-12 pl-0 pr-0">
                             <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" width="300" height="200" style="border:solid 1px #000">
                             <a href="changeimage3.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 3</a>
                           </div>
                         </div> 
                       </div>
                       <div class="row ">
                         <div class="form-group col-md-4 pl-md-0">
                          <label class="col-sm-12 pl-0 pr-0 ">Car image4 </label>
                          <div class="col-sm-12 pl-0 pr-0">
                            <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" width="300" height="200" style="border:solid 1px #000">
                            <a href="changeimage4.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 4</a>
                          </div>
                        </div> 
                        <div class="form-group col-md-4 pl-md-0">
                          <label class="col-sm-12 pl-0 pr-0 ">Car image5</label>
                          <div class="col-sm-12 pl-0 pr-0">
                            <?php if($result->Vimage5=="")
                            {
                              echo htmlentities("File not available");
                            } else {?>
                              <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage5);?>" width="300" height="200" style="border:solid 1px #000">
                              <a href="changeimage5.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 5</a>
                              <?php 
                            } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="">&nbsp;</div>
                  <div class=" col -md-12 card">
                  </div>
                  </div>
                    <button type="submit" style="float: right;" name="save" class="btn btn-primary btn-sm  mr-2 mb-4">Save</button>
                </div>
              </div>
              </div>
              
            </div>
          </div>
          <?php 
        }
      }?>
    </form>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html -->
  <?php @include("includes/footer.php");?>
  <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<?php @include("includes/foot.php");?>
<!-- End custom js for this page -->
</body>
</html>