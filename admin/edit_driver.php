<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['insert']))
{
    $eib= $_SESSION['editbid'];
    $drivername=$_POST['drivername'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $price=$_POST['price'];
    $experience=$_POST['experience'];
    $update=date('Y/m/d');
    $sql4="update tbldrivers set DriverName=:drivername,Email=:email,PricePerDay=:price,Phone=:phone,Experience=:experience,UpdationDate=:update where Id=:eib";
    $query=$dbh->prepare($sql4);
    $query->bindParam(':drivername',$drivername,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':phone',$phone,PDO::PARAM_STR);
    $query->bindParam(':price',$price,PDO::PARAM_STR);
    $query->bindParam(':experience',$experience,PDO::PARAM_STR);
    $query->bindParam(':update',$update,PDO::PARAM_STR);
    $query->bindParam(':eib',$eib,PDO::PARAM_STR);
    $query->execute();
    if ($query->execute())
    {
        echo '<script>alert("updated successfuly")</script>';
    }else{
        echo '<script>alert("update failed! try again later")</script>';
    }
}
?>
<div class="card-body">
    <?php
    $eid=$_POST['edit_id4'];
    $sql2="SELECT * from tbldrivers  where tbldrivers.Id=:eid";
    $query2 = $dbh -> prepare($sql2);
    $query2-> bindParam(':eid', $eid, PDO::PARAM_STR);
    $query2->execute();
    $results=$query2->fetchAll(PDO::FETCH_OBJ);
    if($query2->rowCount() > 0)
    {
        foreach($results as $row)
        {
            $_SESSION['editbid']=$row->Id;
            ?>
            <form class="form-sample"  method="post" enctype="multipart/form-data">
                <div class="row ">
                    <div class="form-group col-md-6">
                        <label class="col-sm-12 pl-0 pr-0">Artisans Name</label>
                        <div class="col-sm-12 pl-0 pr-0">
                            <input type="text" name="drivername" id="drivername" class="form-control" value="<?php  echo $row->DriverName;?>" required />
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-sm-12 pl-0 pr-0">Artisans Email</label>
                        <div class="col-sm-12 pl-0 pr-0">
                            <input type="text" name="email" id="email" class="form-control" value="<?php  echo $row->Email;?>" required />
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="form-group col-md-6">
                        <label class="col-sm-12 pl-0 pr-0">Phone</label>
                        <div class="col-sm-12 pl-0 pr-0">
                            <input type="text" name="phone" id="phone" class="form-control" value="<?php  echo $row->Phone;?>" required />
                        </div>
                    </div>
                    <div class="form-group col-md-6 ">
                      <label for="exampleInputPassword1">Select Experience<span style="color:red">*</span></label>
                      <select  name="experience"  class="form-control" required>
                        <option value="<?php  echo $row->Experience;?>"><?php  echo $row->Experience;?> </option>
                        <option value="One year">One year</option>
                        <option value="Two years">Two years</option>
                        <option value="Three years">Three years</option>
                        <option value="Four years">Four years</option>
                        <option value="Five years">Five years</option>
                      </select>
                    </div>
                </div>
                 <div class="row ">
                    <div class="form-group col-md-6">
                        <label class="col-sm-12 pl-0 pr-0">Price</label>
                        <div class="col-sm-12 pl-0 pr-0">
                            <input type="text" name="price" id="price" class="form-control" value="<?php  echo $row->PricePerDay;?>" required />
                        </div>
                    </div>
                </div>
                <button type="submit" name="insert" class="btn btn-primary btn-sm " style="float: left;">Update</button>
            </form>
            <?php 
        }
    } ?>
</div>