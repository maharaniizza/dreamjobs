<?php


session_start();
  

include_once "config/DB.php";


if($_SESSION['RoleID']==2||$_SESSION['RoleID']==3){
?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DreamJobs - Applicant Detail</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 <link rel="icon" type="image/png" sizes="16x16" href="logo.png">
  <!-- Custom styles for this template-->
    <link rel="icon" type="image/png" sizes="16x16" href="logo.png">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->

    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
<?php 
 include_once("Cexcontain.php");
 ?>

        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Job Listings</h1>
            <br />
            <div class="row page-titles">
                <div class="col-md-12 align-self-center">
                    <ol class="breadcrumb">
                       <?php
                        include_once "config/DB.php";
                        // echo $_GET['id'];
                        $query="SELECT firstname,lastname from msuser where userid in( Select
                        userid from trapplicantform where applicantformid ='".$_GET['id']."')";
                       
                        $query2="SELECT vacancytitle from trvacancy where vacancyid='".$_GET['vacancy']."'";


                        $result=$conn->query($query);
                        $result2=$conn->query($query2);
                       $data2=$result2->fetch_assoc();
                       
                        while($data=$result->fetch_assoc())
                        { ?>
                        <li class="breadcrumb-item"><a href="Cmyjoblist.php">Job Listings</a></li>

                         <li class="breadcrumb-item">
                          <a href="Cdetailjob.php?id=<?php echo $_GET['vacancy'] ?>"> 
                            <?php echo $data2['vacancytitle']?></a></li>
                        <li class="breadcrumb-item active"><?php echo $data['firstname']." ".$data['lastname']?></li>
                      <?php }

                      ?>
                       
                    </ol>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Job Card</a>
                        </li>
                    </ul>
                </div>
                <!-- Tab links -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="card-body">

                            <div class="ibox-content">

                                <form method="get" class="form-horizontal col-12">
                                    <?php
                                            include "config/DB.php";
                                          $query = "SELECT FirstName, LastName , ApplicantDOB,ApplicantGender,ApplicantAddress,ApplicantPhone,UserEmail,LastEducationMajor,LastEducationName 
                                          FROM trapplicantform JOIN msuser on trapplicantform.UserID = msuser.UserID  WHERE ApplicantFormID = '".$_GET['id']."'";
                                          $res = $conn->query($query);
                                          $res1 = $res->fetch_assoc();
                                          ?>
                                          <div class="card-body">
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Full Name</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?php echo $res1['FirstName'] . ' ' . $res1['LastName']  ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Place/Date of Birth</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?= $res1['ApplicantDOB'] ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Gender</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?= $res1['ApplicantGender'] ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Address</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?= $res1['ApplicantAddress'] ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Phone Number</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?= $res1['ApplicantPhone'] ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Email</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?= $res1['UserEmail'] ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Last Education Type</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?= $res1['LastEducationMajor'] ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Last Education Name</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?= $res1['LastEducationName'] ?></label>
                                                </div>
                                            </div>

                                          </div>
                                </form>

                            </div>


                        </div>

                        <div class="card-header">
                            <center>
                                <h4 class="mb-0 text-black"><b>Work Experience</b></h4>
                            </center>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Periode</th>
                                            <th>Last Position</th>
                                            <th>Last Salary</th>
                                        </tr>
                                    </thead>
                                      <?php
                                          $query = "SELECT CompanyName,WorkPeriod,LastPosition,LastSalary FROM trworkexperience A
                                          JOIN trapplicantform B ON A.ApplicantFormID = B.ApplicantFormId  
                                          WHERE A.ApplicantFormID = '".$_GET['id']."'";
                                          $res = $conn->query($query);
                                      ?> 
                                    <tbody>
                                      <?php while($row = $res->fetch_assoc()){ ?>
                                        <tr>
                                            <td><?= $row['CompanyName'] ?></td>
                                            <td><?= $row['WorkPeriod'] ?></td>
                                            <td><?= $row['LastPosition'] ?></td>
                                            <td><?= $row['LastSalary'] ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="card-header">
                            <center>
                                <h4 class="mb-0 text-black"><b>Skills</b></h4>

                            </center>
                        </div>
                        <br />
                         <div class="card-body">
                           <div class="table-responsive">

                            <table class="table table-bordered" id="myTable2" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Skill</th>
                                    </tr>
                                </thead>
                                <?php
                                  $query = "SELECT SkillName FROM trapplicantskilldetail A
                                  JOIN msskill B ON A.SkillID = B.SkillID
                                  JOIN trapplicantform C ON A.ApplicantFormID = C.ApplicantFormId
                                  WHERE A.ApplicantFormID = '".$_GET['id']."'";
                                  $res = $conn->query($query);
                                ?> 
                                <tbody>
                                <?php while($row = $res->fetch_assoc()){ ?>
                                        <tr>
                                            <td><?= $row['SkillName'] ?></td>
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
        <!-- /.container-fluid -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Dreamjobs 2019</span>
          </div>
        </div>
      </footer>


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
          <a class="btn btn-primary" href="index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="ConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure want to confirm this offer ? </div>
        <div class="modal-footer">
          <button class="btn btn-secondary"type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#NotifModal">Yes</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="NotifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Congratulation!</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">You have been accepted as junior programmer in Bina Nusantara</div>
        <div class="modal-footer">
          <a class="btn btn-primary" href="AppliedJob.php">Ok</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="DeclinedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure want to decline this offer ? </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="AppliedJob.php">Delete</a>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script type="text/javascript">
    $(function () {
        $('#myTable2').DataTable();
    });

</script>

</body>

</html>


<?php }?>

