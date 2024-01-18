<?php
include('includes/checklogin.php');
check_login();
if(isset($_POST['save']))
{
  $drivername=$_POST['drivername'];
  $driveremail=$_POST['driveremail'];
  $phone=$_POST['phone'];
  $priceperday=$_POST['price'];
  $experience=$_POST['experience'];
  $dimage1=$_FILES["img1"]["name"];
  move_uploaded_file($_FILES["img1"]["tmp_name"],"img/driverimages/".$_FILES["img1"]["name"]);
  $sql="insert into tbldrivers(DriverName,Email,Phone,Experience,PricePerDay,Dimage)values(:drivername,:driveremail,:phone,:experience,:priceperday,:dimage1)";
  $query=$dbh->prepare($sql);
  $query->bindParam(':drivername',$drivername,PDO::PARAM_STR);
  $query->bindParam(':driveremail',$driveremail,PDO::PARAM_STR);
  $query->bindParam(':phone',$phone,PDO::PARAM_STR);
  $query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
  $query->bindParam(':experience',$experience,PDO::PARAM_STR);
  $query->bindParam(':dimage1',$dimage1,PDO::PARAM_STR);
  $query->execute();
  $LastInsertId=$dbh->lastInsertId();
  if ($LastInsertId>0) 
  {
    echo '<script>alert("Registered successfully")</script>';
    echo "<script>window.location.href ='driver.php'</script>";
  }
  else
  {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }
}
if(isset($_GET['del']))
{
  $id=$_GET['del'];
  $sql = "delete from tbldrivers  WHERE Id=:id";
  $query = $dbh->prepare($sql);
  $query -> bindParam(':id',$id, PDO::PARAM_STR);
  $query -> execute();
  echo "<script>alert('artisans deleted succeffully.');</script>"; 

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
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
               <div class="modal-header">
                <h5 class="modal-title" style="float: left;">Artisans register</h5>
              </div>
              <div class="col-md-12 mt-4">
                <form class="forms-sample" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="row ">
                    <div class="form-group col-md-4">
                      <label for="exampleInputName1">Artisans Names</label>
                      <input type="text" name="drivername" class="form-control" value="" id="drivername" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputName1">Email</label>
                      <input type="text" name="driveremail" class="form-control" value="" id="driveremail" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputName1">Price</label>
                      <input type="text" name="price" class="form-control" value="" id="price" placeholder="Price" required>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">Phone</label>
                      <input type="text" name="phone" class="form-control" value="" id="phone" placeholder="Enter Phone" required>
                    </div>
                    <div class="form-group col-md-6 ">
                      <label for="exampleInputPassword1">Select Experience<span style="color:red">*</span></label>
                      <select  name="experience"  class="form-control" required>
                        <option value="">Select </option>
                        <option value="One year">1 ans</option>
                        <option value="Two years">2 ans</option>
                        <option value="Three years">3 ans</option>
                        <option value="Four years">4 ans</option>
                        <option value="Five years">plus que 5ans</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 ">
                      <label class="col-sm-12 pl-0 pr-0 ">Bike image <span style="color:red">*</label>
                        <div class="col-sm-12 pl-0 pr-0">
                          <input type="file" name="img1" class="file-upload-default">
                          <div class="input-group ">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-gradient-primary" style="" type="button">Upload</button>
                            </span>
                          </div>
                        </div>
                      </div> 

                    </div>
                    <button type="submit" style="float: left;" name="save" class="btn btn-primary btn-sm mr-2 mb-4">Save</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <!--  start  modal -->
                <div id="editData4" class="modal fade">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Artisans details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="info_update4">
                        <?php @include("edit_artisans.php");?>
                      </div>
                      <div class="modal-footer ">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>
                <!--   end modal -->

                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Artisans Names</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Price</th>
                        <th>Experience</th>
                        <th>Last Updation Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * from  tbldrivers ";
                      $query = $dbh -> prepare($sql);
                      $query->execute();
                      $results=$query->fetchAll(PDO::FETCH_OBJ);
                      $cnt=1;
                      if($query->rowCount() > 0)
                      {
                        foreach($results as $result)
                        {     
                          ?>
                          <tr>
                            <td><?php echo htmlentities($cnt);?></td>
                            <td>
                              <img src="img/driverimages/<?php  echo $result->Dimage;?>" class="mr-2" alt="image">
                            </td>
                            <td><?php echo htmlentities($result->DriverName);?></td>
                            <td><?php echo htmlentities($result->Email);?></td>
                            <td><?php echo htmlentities($result->Phone);?></td>
                             <td><?php echo htmlentities($result->PricePerDay);?></td>
                            <td><?php echo htmlentities($result->Experience);?></td>
                            <td><?php  echo htmlentities(date("d-m-Y", strtotime($result->UpdationDate)));?></td>
                            <td class=" text-center"><a href="#"  class=" edit_data4" id="<?php echo  ($result->Id); ?>" title="click to edit"><i class="mdi mdi-pencil-box-outline" aria-hidden="true"></i></a>&nbsp;&nbsp;
                              <a href="DRIVER.php?del=<?php echo $result->Id;?>" onclick="return confirm('Do you want to delete');"><i class="mdi mdi-delete"></i></i></a></td>

                            </tr>
                            <?php 
                            $cnt=$cnt+1;
                          }
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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
    <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click','.edit_data4',function(){
          var edit_id4=$(this).attr('id');
          $.ajax({
            url:"edit_driver.php",
            type:"post",
            data:{edit_id4:edit_id4},
            success:function(data){
              $("#info_update4").html(data);
              $("#editData4").modal('show');
            }
          });
        });
      });
    </script>
  </body>
  </html>