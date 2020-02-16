<?php
session_start();
include "config/DB.php";
$page = "UAppliedJob";
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

<?php 
 include_once("contain.php");
 ?>



        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Applied Job</h1>
            <p class="mb-4">Here some job that you have successfuly applied.</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Applied Job</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Vacancy Title</th>
                                    <th>Applied Vacancy</th>
                                    <th>Test Duration</th>
                                    <th>Job Location</th>
                                    <th>Status</th>
                                    <th>Next Step</th>
                                    <th>View</th>
                                </tr>
                            </thead>

                            <?php
                                $query = "SELECT VacancyTitle, VacancyID as vacid,PositionName, VacancyLocation,(select DATE_FORMAT(time,'%d %b %Y') 
                                from trvacancysteptime WHERE VacancyID=vacid ORDER by stepid asc limit 1 ) as starttest, (select DATE_FORMAT(time,'%d %b %Y') 
                                from trvacancysteptime WHERE VacancyID=vacid ORDER by stepid DESC limit 1 ) as endtest,vacancystatusname,educationtypename, 
                                (select stepname from trvacancysteptime a join msstep b on a.StepID=b.stepid where VacancyID=vacid and time>curdate() limit 1) as 
                                nextstep FROM trvacancy a JOIN mscompany b on a.CompanyID=b.CompanyID join msposition c on a.PositionID=c.PositionID join 
                                msvacancystatus m on a.VacancyStatusId=m.VacancyStatusID join mseducationtype d on a.EducationTypeID=d.EducationTypeID join 
                                mssalaryrange e on a.SalaryRangeID=e.SalaryRangeId where VacancyID in(select VacancyID from trvacancydetail where 
                                applicantformid in(select ApplicantFormID from trapplicantform  where userid='".$_SESSION['userid']."'))";
      
                                $res = $conn->query($query);
                            ?> 
                             <tbody>
                              <?php while($row = $res->fetch_assoc()){ ?>
                                <tr>
                                    <td><?= $row['VacancyTitle'] ?></td>
                                    <td><?= $row['PositionName'] ?></td>
                                    <td><?= $row['starttest']." - ".$row['endtest'] ?></td>
                                    <td><?= $row['VacancyLocation'] ?></td>
                                      <?php
               
                                    $querycek="SELECT a.StepID, StepName, ApplicantStatusName,a.ApplicantStatusID as id FROM trvacancydetail a join msapplicantstatus b on a.ApplicantStatusID=b.ApplicantStatusID join msstep c on a.StepID=c.StepID where ApplicantFormID in(select ApplicantFormID from trapplicantform where userid='".$_SESSION['userid']."') and VacancyID='".$row['vacid']."' order by a.StepID desc limit 1";
                                       $rescek = $conn->query($querycek);
                                         //2
                                  $time="SELECT DATE_FORMAT(time,'%d %b %Y') as timenextstep,stepname from trvacancydetail a join trvacancysteptime b on a.vacancyid=b.vacancyid join msstep c on a.stepid=c.stepid
                                        where a.VacancyID='".$row['vacid']."'  and  applicantformid in (select applicantformid from trapplicantform where userid='".$_SESSION['userid']."') 
                                            and applicantstatusid=4";
                                              //2
                                          $timeget = $conn->query($time);
                                          $gettime = $timeget->fetch_assoc();

                                     ?> 

                                    <?php while($rows = $rescek->fetch_assoc()){
                                        if($rows['id']==3)
                                          {
                                             { ?>   
                                                      <td><?= $rows['ApplicantStatusName'] ?></td> 
                                                      <td>-</td> 
                                             <?php }
                                          } else{
                                              { ?>  
                                                 <td><?= $rows['ApplicantStatusName'] ?></td> 
                                                  <td><?= $gettime['stepname'] ?></td> 
                                                <?php }
                                          }     
                                         ?>

                                        <?php } ?>
                                      
                                    <td>
                                         <a href="UJobCard.php?id=<?php echo $row['vacid'] ?>"  style="text-decoration: none;">
                                          <button  id="status" class="btn btn-success"> View Details </button>
                                        </a>
                                       
                                    </td>
                                </tr>
                              <?php } ?>
                              
                            </tbody> 
                        </table>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
