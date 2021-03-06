<?php
session_start();
include "config/DB.php";
$page = "Dashboard";
?>

<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DreamJobs - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
    <link rel="icon" type="image/png" sizes="16x16" href="logo.png">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php 
 include_once("contain.php");
 ?>

      <!-- Main Content -->
      <div id="content">



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">

                                <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">Apply New Job</div>
                                <a href="USearchJob.php" class="btn btn-primary btn-user btn-block ">

                                    Go
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            
          <!-- Content Row -->
          <div class="row">
            <!--My  Job -->
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <!--My Job -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
                    </div>
                    <!-- Card Body -->
                    <?php
                    $query = "SELECT ApplicantIdentityNo,SalaryRangeID,FirstName, LastName,ApplicantDOB,ApplicantGender,ApplicantAddress,ApplicantPhone,UserEmail,LastEducationMajor,LastEducationName 
                    FROM trapplicantform JOIN msuser on trapplicantform.UserID = msuser.UserID WHERE trapplicantform.UserID = '".$_SESSION['userid']."'";
                    $res = $conn->query($query);
                    $res = $res->fetch_assoc();
                    ?>
                    <div class="card-body">
                      <div class="form-group mb-sm-3 row">
                          <label class="col-4 control-label">Full Name</label>
                          <div class="col-8">
                              <label class="control-label"><?php echo $res['FirstName'].' '.$res['LastName'] ?></label>
                          </div>
                      </div>
                      <div class="form-group mb-sm-3 row">
                          <label class="col-4 control-label">Date of Birth</label>
                          <div class="col-8">
                              <label class="control-label"><?= $res['ApplicantDOB'] ?></label>
                          </div>
                      </div>
                      <div class="form-group mb-sm-3 row">
                          <label class="col-4 control-label">Gender</label>
                          <div class="col-8">
                              <label class="control-label"><?= $res['ApplicantGender'] ?></label>
                          </div>
                      </div>
                      <div class="form-group mb-sm-3 row">
                          <label class="col-4 control-label">Address</label>
                          <div class="col-8">
                              <label class="control-label"><?= $res['ApplicantAddress'] ?></label>
                          </div>
                      </div>
                      <div class="form-group mb-sm-3 row">
                          <label class="col-4 control-label">Phone Number</label>
                          <div class="col-8">
                              <label class="control-label"><?= $res['ApplicantPhone'] ?></label>
                          </div>
                      </div>
                      <div class="form-group mb-sm-3 row">
                          <label class="col-4 control-label">Email</label>
                          <div class="col-8">
                              <label class="control-label"><?= $res['UserEmail'] ?></label>
                          </div>
                      </div>
                      <div class="form-group mb-sm-3 row">
                          <label class="col-4 control-label">Identity No (KTP)</label>
                          <div class="col-8">
                              <label class="control-label"><?= $res['ApplicantIdentityNo'] ?></label>
                          </div>
                      </div>
                      <div class="form-group mb-sm-3 row">
                          <label class="col-4 control-label">Salary Expectation</label>
                          <div class="col-8">
                              <?php
                                if($res['SalaryRangeID'] == "1"){
                                  $hasil = "less than 500.000";
                                }
                                else if($res['SalaryRangeID'] == "2"){
                                  $hasil = "500.000-1000.000";
                                }
                                else if($res['SalaryRangeID'] == "3"){
                                  $hasil = "1000.000-5000.000";
                                }
                                if($res['SalaryRangeID'] == "4"){
                                  $hasil = "5000.000-10.000.000";
                                }
                                else if($res['SalaryRangeID'] == "5"){
                                  $hasil = "10.000.000-15.000.000";
                                }
                              ?>
                              <label class="control-label"><?php echo $hasil ?></label>
                          </div>
                      </div>
                      <div class="form-group mb-sm-3 row">
                          <label class="col-4 control-label">Last Education Major</label>
                          <div class="col-8">
                              <label class="control-label"><?= $res['LastEducationMajor'] ?></label>
                          </div>
                      </div>
                      <div class="form-group mb-sm-3 row">
                          <label class="col-4 control-label">Last Education Name</label>
                          <div class="col-8">
                              <label class="control-label"><?= $res['LastEducationName'] ?></label>
                          </div>
                      </div>

                    </div>
                </div>
            </div>

            <!-- Profile Company -->
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Profile Company</h6>

                    </div>
                    <?php
                          $query="SELECT CompanyImage FROM mscompany";
                          $result=$conn->query($query);
                          $data=$result->fetch_assoc();
                      ?>
                    <!-- Card Body -->
                    <div class="card-body">
                      <center><img src="img/asset<?=$data['CompanyImage']?>" align="middle" alt="Test Gambar"></center>
                      <p align="center" >
                          <?php
                            $query = "SELECT CompanyDesc FROM mscompany";
                            $res = $conn->query($query);

                            $res = $res->fetch_assoc();
                            echo $res['CompanyDesc'];
                          ?>
                      </p>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Dreamjobs</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->


  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form class="user" method="POST" action="controller/auth.php">
                                <input type="hidden" name="action" value="logout">
                                <div class="col-md-offset-3 col-md-3">
                                    <input type ="submit" class="btn btn-primary" value="Logout">  
                                </div>
                              </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
