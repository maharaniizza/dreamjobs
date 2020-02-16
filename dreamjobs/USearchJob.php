<?php
session_start();
include "config/DB.php";
$page = "USearchJob";
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

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <?php include "contain.php"?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">Job Available</h1>
            <p class="mb-4">Here some job available that you can apply!</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Job Available</h6>
                </div>
                <div class="card-body">
                      <!-- Sidebar - Brand -->
                  <?php
                        include_once "config/DB.php";
                        // echo $_GET['id'];
                        $query="SELECT SalaryRangeID,ApplicantDOB, ApplicantGender, ApplicantAddress, ApplicantPhone, ApplicantIdentityNo,EducationTypeID,LastEducationName,
                        LastEducationMajor from trapplicantform a join msuser b on a.userid=b.userid where a.userid='".$_SESSION['userid']."'";
                        $result=$conn->query($query);
                        while($temp=$result->fetch_assoc()){
                          if($temp['ApplicantDOB']==null||$temp['ApplicantGender']==null||$temp['ApplicantAddress']==null||
                                           $temp['ApplicantPhone']==null||$temp['ApplicantIdentityNo']==null||$temp['EducationTypeID'] ==null
                                           ||  $temp['LastEducationName']==null||$temp['LastEducationMajor']==null||$temp['SalaryRangeID']==null)
                                        {
                                           { ?>  
                                                    <h6>Please create profile first.</h6>
                                                      <a href="UMyProfileCreate.php" class="btn btn-primary btn-user">Create Profile</a>
                                                    
                                                  <?php }
                                        } else{
                                             { ?> 
                                              <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                               <th>Vacancy Title</th>
                                                                <th>Available Vacancy</th>
                                                                <th>Test Duration</th>
                                                                <th>Job Location</th>
                                                                <th>Apply</th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                            $query = "SELECT VacancyTitle, VacancyID as vacid, a.CompanyID as compid, companyname, a.PositionID as posid,PositionName, a.VacancyStatusId as vacstatusid, a.SalaryRangeID as SalaryRangeID, a.EducationTypeID as eduid, VacancyLocation,a.CreatedDate as CreatedDate, a.UpdatedDate as UpdatedDate,a.CreatedBy as CreatedBy,a.UpdatedBy as UpdatedBy,
                                                              vacancystatusname,educationtypename FROM trvacancy a JOIN mscompany b on a.CompanyID=b.CompanyID join msposition c on a.PositionID=c.PositionID 
                                                              join msvacancystatus m on a.VacancyStatusId=m.VacancyStatusID join mseducationtype d on a.EducationTypeID=d.EducationTypeID join mssalaryrange e on 
                                                              a.SalaryRangeID=e.SalaryRangeId where VacancyID not in(select VacancyID from trvacancydetail where applicantformid in(select ApplicantFormID from trapplicantform  
                                                              where userid='".$_SESSION['userid']."')) and VacancyId in(select VacancyID from trvacancysteptime where StepID=1 and time>=curdate() and StepStatus !='Confirmed')
                                                             ";
                                                            $res = $conn->query($query);
                            
                                                        ?> 
                            
                                                        <tbody>
                                                          <?php while($row = $res->fetch_assoc()){ ?>
                                                            <tr>
                                                                <td><?= $row['VacancyTitle'] ?></td>
                                                                <td><?= $row['PositionName'] ?></td>
                                                                
                                                                <?php
                                           
                                                                   $querystart="SELECT DATE_FORMAT(time,'%d %b %Y') as starttest from trvacancysteptime where vacancyid='".$row['vacid']."' and stepid=1";
                                                                   $rescek = $conn->query($querystart);
                                                                  $rows = $rescek->fetch_assoc();
                                                                  
                                                                  $queryend="SELECT DATE_FORMAT(time,'%d %b %Y') as endtest from trvacancysteptime where vacancyid='".$row['vacid']."' and stepid=4";
                                                                   $rescekend = $conn->query($queryend);
                                                                  $rowsend = $rescekend->fetch_assoc();
                                                                 ?> 
                            
                                               
                                                                    
                                                                <td><?= $rows['starttest']." - ".$rowsend['endtest'] ?></td>
                                                                  
                                                           
                                                                <td><?= $row['VacancyLocation'] ?></td>
                                                                <td>
                                                                  <a href="UViewDetailJob.php?id=<?php echo $row['vacid'] ?>"  style="text-decoration: none;">
                                                                      <button  id="status" class="btn btn-success"> View Details </button>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                          <?php } ?>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                  <?php }
                                        }      
                        ?>     
                      <?php }?>
                 
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
          <a class="btn btn-primary" href="index.php">Logout</a>
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

</body>

</html>
