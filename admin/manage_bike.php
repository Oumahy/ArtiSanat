<?php
include('includes/checklogin.php');
check_login();
if(isset($_REQUEST['del']))
  {
$delid=intval($_GET['del']);
$sql = "delete from tblbike  WHERE  id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
 echo "<script>alert('car record deleted.');</script>";
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
                  <h5 class="modal-title" style="float: left;">Manage T&P</h5>
                </div>
                
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>T&P Image</th>
                        <th>T&P Name</th>
                        <th>Price</th>
                        
                        <th>Fabrication Year</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * from tblbike ";
                      $query = $dbh -> prepare($sql);
                      $query->execute();
                      $results=$query->fetchAll(PDO::FETCH_OBJ);
                      $cnt=1;
                      if($query->rowCount() > 0)
                      {
                        foreach($results as $row)
                        { 
                          ?>
                          <tr>
                            <td class="text-center"><?php echo htmlentities($cnt);?></td>
                            <td><img src="img/bikeimages/<?php  echo $row->Vimage1;?>" class="mr-2" alt="image"></td>
                            <td><?php echo htmlentities($row->BikeTitle);?>
                            </td>
                            <td class="text-center"><?php echo htmlentities($row->PricePerDay);?></td>
                            
                            <td><?php echo htmlentities($row->ModelYear);?></td>
                            <td>
                              <a href="edit_bike.php?id=<?php echo $row->id;?>" title="click to edit"><i class="mdi mdi-pencil-box-outline" aria-hidden="true"></i></a>
                              <a href="manage_bike.php?del=<?php echo $row->id;?>" onclick="return confirm('Do you want to delete');"><i class="mdi mdi-delete"></i></i></a>
                            </td>
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
 
</body>
</html>