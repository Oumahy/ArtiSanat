<?php
include('includes/checklogin.php');
check_login();
if(isset($_POST['save']))
{
  $vehicletitle=$_POST['cartitle'];
  $vehicleoverview=$_POST['description'];
  $priceperday=$_POST['priceperday'];
  $fueltype=$_POST['fueltype'];
  $modelyear=$_POST['modelyear'];
  $id=intval($_GET['id']);
  $sql="update tblbike set BikeTitle=:vehicletitle,BikeOverview=:vehicleoverview,PricePerDay=:priceperday,FuelType=:fueltype,ModelYear=:modelyear where id=:id";
  $query = $dbh->prepare($sql);
  $query->bindParam(':vehicletitle',$vehicletitle,PDO::PARAM_STR);
  $query->bindParam(':vehicleoverview',$vehicleoverview,PDO::PARAM_STR);
  $query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
  $query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
  $query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
  $query->bindParam(':id',$id,PDO::PARAM_STR);
  $query->execute();
  if($query)
  {
     $msg="Data updated successfully";
  }
  else 
  {
    echo '<script>alert("Update failed! try again later")</script>'; 
  }
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
                <h5 class="modal-title" style="float: left;">Edit T&P</h5>
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
              $sql ="SELECT * from tblbike where tblbike.id=:id";
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
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">T&P Name<span style="color:red">*</span></label>
                        <input type="text" name="cartitle" class="form-control" value="<?php echo htmlentities($result->BikeTitle)?>" id="product" placeholder="Enter Bike Name" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">T&P Description<span style="color:red">*</label>
                         <textarea class="form-control" style=" font-family: fontawesome;
                         font-size: 17px; line-height: 25px;" name="description" rows="3" required><?php echo htmlentities($result->BikeOverview);?></textarea>
                       </div>
                     </div>
                     <div class="row">
                       <div class="form-group col-md-4">
                        <label for="exampleInputName1">Price<span style="color:red">*</label>
                          <input type="text" name="priceperday" value="<?php echo htmlentities($result->PricePerDay);?>" placeholder="Enter Price" class="form-control" id="price"required>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="exampleInputName1">Fabrication Year<span style="color:red">*</label>
                            <input type="text" name="modelyear" value="<?php echo htmlentities($result->ModelYear);?>"  class="form-control" id="price"required>
                          </div>
                          </div>
                          <div class="row ">
                           <div class="form-group col-md-4 pl-md-0">
                              <label class="col-sm-12 pl-0 pr-0 ">T&P Image </label>
                              <div class="col-sm-12 pl-0 pr-0">
                               <img src="img/bikeimages/<?php echo htmlentities($result->Vimage1);?>" width="300" height="200" style="border:solid 1px #000">
                               <a href="changebikeimage.php?imgid=<?php echo htmlentities($result->id)?>">Change Image</a>
                             </div>
                           </div> 
                          </div>
                        </div>
                        <div class="">&nbsp;</div>

                      </div>
                      <button type="submit" style="float: right;" name="save" class="btn btn-primary  mr-2 mb-4">Save</button>
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