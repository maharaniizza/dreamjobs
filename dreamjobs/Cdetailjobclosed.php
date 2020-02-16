<?php
session_start();
  
$page="myjoblist";
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

  <title>DreamJobs - Detail Job</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
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
          <!-- Page Heading -->         
           <div class="card-header py-3">
              <h1 class="h3 mb-2 text-gray-800">Job Listings</h1>
            </div>

            <div class="row page-titles">
                <div class="col-md-12 align-self-center">
                    <ol class="breadcrumb">
                        <?php
                        include_once "config/DB.php";
                        // echo $_GET['id'];
                        $query="SELECT vacancytitle FROM trvacancy a join msposition b on a.PositionID=b.PositionID join mssalaryrange c on a.SalaryRangeID=c.SalaryRangeId WHERE vacancyid='".$_GET['id']."'";
                        $result=$conn->query($query);
                        while($data=$result->fetch_assoc())
                        { ?>
                        <li class="breadcrumb-item"><a href="Cmyjoblist.php">Job Listing</a></li>
                        <li class="breadcrumb-item active"><?php echo $data['vacancytitle']?></li>
                      <?php }

                      ?>
                      
                       
                    </ol>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                           
                  </div>
                  <div class="card-body">     
                                                      
                     <?php
                        include_once "config/DB.php";
                        // echo $_GET['id'];
                        $query="SELECT vacancyid as vacid, vacancytitle,positionname,VacancyLocation,salaryrange,(SELECT a.StepID as id FROM trvacancysteptime a join msstep b on a.stepid=b.stepid  where vacancyid=vacid and StepStatus='On Review' order by a.stepid desc ) as stepid FROM trvacancy a join msposition b on a.PositionID=b.PositionID join  mssalaryrange c on a.SalaryRangeID=c.SalaryRangeId 
                           WHERE vacancyid='".$_GET['id']."'";
                        $result=$conn->query($query);
                        while($data=$result->fetch_assoc()){
                        ?>
                        <div class="form-group mb-sm-3 row">
                         <label class="col-4 control-label">  <h5><b><?php echo $data['vacancytitle']?></b></h5>   </label>
                         
                        </div>
                        <div class="form-group mb-sm-3 row">
                            <label class="col-4 control-label">Position</label>
                            <div class="col-8">
                                <label class="control-label"><?php echo $data['positionname']?></label>
                            </div>
                        </div>
                        <div class="form-group mb-sm-3 row">
                            <label class="col-4 control-label">Location</label>
                            <div class="col-8">
                                <label class="control-label"><?php echo $data['VacancyLocation']?></label>
                            </div>
                        </div>
                        <div class="form-group mb-sm-3 row">
                            <label class="col-4 control-label">Salary</label>
                            <div class="col-8">
                                <label class="control-label"><?php echo $data['salaryrange']?></label>
                            </div>
                        </div>
                      <?php }?>

                  </div>
              </div>

            <div class="card shadow mb-4">
              <div class="card-body">
              <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">

                   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-accept" role="tab" aria-controls="nav-contact" aria-selected="false">Accepted Applicants</a>
                    </div>

              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-accept" role="tabpanel" aria-labelledby="nav-home-tab">
                  <!-- 1 -->
                  <br>
                  <br>
                  <div class="table-responsive">
                  <table class="table table-bordered" id="myTable2" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Applicant Name</th>
                        <th>Email</th>
                        <th>Last Education</th>
                        <th>Location</th>
                        
                        <th>Action</th>

                      </tr>
                    </thead>                
                    <tbody>
                    <?php
                    include_once "config/DB.php";
                    // echo $_GET['id'];
                    $query="SELECT stepid,firstname ,lastname,useremail, applicantaddress,a.ApplicantFormID as applicantformid,lasteducationname,stepid FROM trvacancydetail a join trapplicantform  b on a.applicantformid=b.ApplicantFormId join msuser s on b.UserID=s.UserID  WHERE 
                    vacancyid='".$_GET['id']."' and stepid=4 and applicantstatusid=2 GROUP by ApplicantFormID";
                    $result=$conn->query($query);
                    while($data=$result->fetch_assoc()){
                    ?>
                      <tr>
                        <td><?php echo $data['firstname']?></td>
                        <td><?php echo $data['useremail']?></td>
                        <td><?php echo $data['lasteducationname']?></td>
                        <td><?php echo $data['applicantaddress']?></td>
                        <td>
                          <a 
                          href="Capplicantdetail.php?id=<?php echo $data['applicantformid']?>&&vacancy=<?php echo $_GET['id']?>"  
                          style="text-decoration: none;" target="_Blank">
                          <button  id="status" class="btn btn-success"> View Details </button>
                           </a>


                        </td>
                      
                      </tr>
                    <?php }?>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
               </div>
           

             </div>
        <!-- /.container-fluid -->

             </div>
         </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; DreamJobs 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
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
          <a class="btn btn-primary" href="controller/logout.php">Logout</a>
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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
 <script type="text/javascript">

    $(function () {
        $('#myTable1').DataTable();
         $('#myTable2').DataTable();
          $('#myTable3').DataTable();
    });
</script>

</body>

</html>
<?php }?>