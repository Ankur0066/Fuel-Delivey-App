<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hlmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>

<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Fuel Delivery Management System||View Between Dates Orders</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
 
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
 <?php include_once('includes/header.php');?>
    <div class="container-fluid page-body-wrapper">
      
      <?php include_once('includes/sidebar.php');?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                
                 <br>
               
                  <div class="table-responsive pt-3">
                      <?php
 $fdate=$_POST['fromdate'];
 $tdate=$_POST['todate'];
 $fuelstations=$_POST['fuelsta'];
 $fdata=explode("$",  $fuelstations);
 $fuelsta=$fdata['0'];
  ?>
  <h5 align="center" style="color:blue">Report of <?php echo $fdata['1'];?> from <?php echo $fdate?> to <?php echo $tdate?></h5>
                    <table class="table table-bordered">
                      <thead>
                       <tr>
                                               <th>S.No</th>
                                        <th>Order Number</th>
                                        <th>Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                        <th>Action</th>
                                            </tr>
                      </thead>
                      <tbody>

                                              
                        <tr class="table-info">
                           <?php
                           
$sql="SELECT tblfuelstation.ID as fsid, tbluser.FullName,tbluser.MobileNumber,tbluser.Email, tblorderfuel.ordernum,tblorderfuel.OrderDate,tblorderfuel.ID as orderid, tblorderfuel.UserID,tblorderfuel.Status from  tblorderfuel join tbluser on tbluser.ID= tblorderfuel.UserID
join tblfuelstation on tblfuelstation.ID=tblorderfuel.fuelStationid 
where tblfuelstation.ID=:fuelsta && date(tblorderfuel.OrderDate) between '$fdate' and '$tdate'";
$query = $dbh -> prepare($sql);
$query->bindParam(':fuelsta',$fuelsta,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                         <td><?php echo htmlentities($cnt);?></td>
                                        <td><?php  echo htmlentities($row->ordernum);?></td>
                                        <td><?php  echo htmlentities($row->FullName);?></td>
                                        <td><?php  echo htmlentities($row->MobileNumber);?></td>
                                        <td><?php  echo htmlentities($row->Email);?></td>
                                             <?php if($row->Status==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row->Status);?>
                  </td>
                  <?php } ?>         
                  <td><?php  echo htmlentities($row->OrderDate);?></td>
                 
                                        <td><a href="view-order-detail.php?editid=<?php echo htmlentities ($row->orderid);?>&&oid=<?php echo htmlentities ($row->ordernum);?>"><button class="btn btn-primary">View</button></a></td>
                        </tr>
                       <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against between this date</td>

  </tr>
  <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      <?php include_once('includes/footer.php');?>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
<?php } ?>