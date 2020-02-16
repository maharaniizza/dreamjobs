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

  <title>DreamJobs - Job Card</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
     <link rel="icon" type="image/png" sizes="16x16" href="logo.png">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
      <?php include "contain.php"?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Applied Job</h1>
            <br />

           <div class="row page-titles">
                <div class="col-md-12 align-self-center">
                    <ol class="breadcrumb">
                        <?php
                        include_once "config/DB.php";
                        // echo $_GET['id'];
                        $query="SELECT PositionName FROM trvacancy a join msposition b on a.PositionID=b.PositionID join mssalaryrange c on a.SalaryRangeID=c.SalaryRangeId WHERE vacancyid='".$_GET['id']."'";
                        $result=$conn->query($query);
                        while($data=$result->fetch_assoc())
                        { ?>
                        <li class="breadcrumb-item"><a href="UAppliedJob.php">Applied Job</a></li>
                        <li class="breadcrumb-item active"><?php echo $data['PositionName']?></li>
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

                <?php
                   $id = $_GET['id'];
                    //1
                    $query = "SELECT vacancytitle, VacancyID as vacid, positionname,salaryrange,vacancylocation,(select DATE_FORMAT(time,'%d %b %Y')  from trvacancysteptime WHERE VacancyID=vacid ORDER by stepid asc limit 1 ) as starttest, (select DATE_FORMAT(time,'%d %b %Y') from trvacancysteptime WHERE VacancyID=vacid ORDER by stepid DESC limit 1 ) as endtest, 
                    (select stepname from trvacancysteptime a join msstep b on a.StepID=b.StepID where VacancyID=vacid and time>=curdate() limit 1 ) as nextstep ,
                      (select DATE_FORMAT(time,'%d %b %Y') from trvacancysteptime a join msstep b on a.StepID=b.StepID where VacancyID=vacid and time>=curdate() limit 1 ) as timenextstep 
                      from trvacancy a join msposition b on a.PositionID=b.PositionID join mssalaryrange c on a.SalaryRangeID=c.SalaryRangeId WHERE vacancyid='".$_GET['id']."'";
                      //2
                      $time="SELECT DATE_FORMAT(time,'%d %b %Y') as timenextstep,stepname from trvacancydetail a join trvacancysteptime b on a.vacancyid=b.vacancyid join msstep c on a.stepid=c.stepid
                            where a.VacancyID='".$_GET['id']."' and  applicantformid in (select applicantformid from trapplicantform where userid='".$_SESSION['userid']."') 
                                and applicantstatusid=4";
                       //3
                      $querystep="SELECT StepName, ApplicantStatusName,a.ApplicantStatusID as id FROM trvacancydetail a join msapplicantstatus b on a.ApplicantStatusID=b.ApplicantStatusID join msstep c on a.StepID=c.StepID where ApplicantFormID in(select ApplicantFormID from trapplicantform 
                      where userid='".$_SESSION['userid']."') and VacancyID='".$_GET['id']."' order by a.stepid asc";
                      //4
                      $querycek="SELECT a.StepID, StepName, ApplicantStatusName,a.ApplicantStatusID as id FROM trvacancydetail a join msapplicantstatus b on a.ApplicantStatusID=b.ApplicantStatusID join msstep c on a.StepID=c.StepID where ApplicantFormID in(select ApplicantFormID from trapplicantform where userid='".$_SESSION['userid']."') and VacancyID='".$_GET['id']."' order by a.StepID desc limit 1";
                        //5
                      $queryaccept="SELECT ApplicantStatusName,a.applicantstatusid as id from trvacancydetail a join msapplicantstatus b on a.applicantstatusid=b.applicantstatusid 
                      where stepid=4 and a.applicantstatusid=2 and applicantformid in (select applicantformid from trapplicantform where userid='".$_SESSION['userid']."') 
                      and VacancyID='".$_GET['id']."'";
                      
                      //1
                      $res = $conn->query($query);
                      $res = $res->fetch_assoc();
                      //2
                      $timeget = $conn->query($time);
                      $gettime = $timeget->fetch_assoc();
                      
                      
                    //4
                      $rescek = $conn->query($querycek);
                        //3
                      $resstep = $conn->query($querystep);
                      //5
                       $resaccept = $conn->query($queryaccept);
                       
                       $resacc = $resaccept->fetch_assoc();
         
                     
                    
                 ?>

                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="card-body">
                       <div class="card-body">
                            <div style="display:inline-block;width:100%;overflow-y:auto;">
                                <ul class="timeline" id="timeline">
                                    <?php while($row = $resstep->fetch_assoc()){
                                        if($row['id']==1)
                                          {
                                             { ?>  
                                               <li class="li">
                                                <div class="timestamp">
                                                    <span><?= $row['StepName'] ?></span>
                                                </div>
                                                <div class="status"></div>
                                                <div class="timestamps" >
                                                    <span>Coming</span>
                                                </div>
                                                </li>
                                             <?php }
                                          } else if($row['id']==2){
                                               { ?>  
                                                <li class="li complete">
                                                <div class="timestamp">
                                                    <span><?= $row['StepName'] ?></span>
                                                </div>
                                                <div class="status"></div>
                                                <div class="timestamps" >
                                                    <span><?= $row['ApplicantStatusName'] ?></span>
                                                </div>
                                                </li>
                                                <?php }
                                          } else if($row['id']==4){
                                               { ?>  
                                                <li class="li review">
                                                <div class="timestamp">
                                                    <span><?= $row['StepName'] ?></span>
                                                </div>
                                                <div class="status"></div>
                                                <div class="timestamps" >
                                                    <span><?= $row['ApplicantStatusName'] ?></span>
                                                </div>
                                                </li>
                                                <?php }
                                          } else{
                                              { ?>  
                                                <li class="li failed">
                                                <div class="timestamp">
                                                    <span><?= $row['StepName'] ?></span>
                                                </div>
                                                <div class="status"></div>
                                                <div class="timestamps" >
                                                    <span><?= $row['ApplicantStatusName'] ?></span>
                                                </div>
                                                </li>
                                                <?php }
                                          }     
                                     ?>

                                    <?php } ?>
                                   
                                </ul>
                            </div>
                        </div>
                            <div class="ibox-content">
                                <form method="get" class="form-horizontal col-12">
                                  <br>
                                        <div class="form-group mb-sm-3 row">
                                        <label class="col-4 control-label">Vacancy Title</label>
                                        <div class="col-8">
                                            <label class="control-label"><?php echo $res['vacancytitle'] ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-sm-3 row">
                                        <label class="col-4 control-label">Coming Step</label>
                                        <div class="col-8">
                                        <?php while($row = $rescek->fetch_assoc()){
                                        if($row['id']==3)
                                          {
                                             { ?>  
                                                  <label class="control-label"><b>Sorry You Couldn't Continue The Test.</b></label>
                                         </div>
                                       </div>
                                             <?php }
                                          } else{
                                              
                                                    if($resaccept->num_rows<1){
                                                        { ?>  
                                                          <label class="control-label"><?php echo $gettime['stepname'] ?></label>
                                                          </div>
                                                        </div>
                                                           <div class="form-group mb-sm-3 row">
                                                              <label class="col-4 control-label">Test Date /Step Time</label>
                                                              <div class="col-8">
                                                                  <label class="control-label"><?php echo $gettime['timenextstep'] ?></label>
                                                              </div>
                                                          </div>             

                                                        <?php }
                                                    }
                                                    else {
                                                        
                                                            { ?>   <label class="control-label"><b>Congratulation you're accepted!</b></label>
                                                             </div>
                                                        </div>
                                                         
                                                              
                                                            
                                                            <?php }
                                                    }
                  
                                             
                                             
                                          }     
                                         ?>

                                        <?php } ?>

                                                              
                                      
                                   
                                    <div class="form-group mb-sm-3 row">
                                        <label class="col-4 control-label">Position</label>
                                        <div class="col-8">
                                            <label class="control-label"><?php echo $res['positionname'] ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-sm-3 row">
                                        <label class="col-4 control-label">Job Location</label>
                                        <div class="col-8">
                                            <label class="control-label"><?php echo $res['vacancylocation'] ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-sm-3 row">
                                        <label class="col-4 control-label">Test Duration</label>
                                        <div class="col-8">
                                            <label class="control-label"><?php echo $res['starttest']." - ".$res['endtest'] ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-sm-3 row">
                                        <label class="col-4 control-label">Salary Range</label>
                                        <div class="col-8">
                                            <label class="control-label"><?php echo $res['salaryrange'] ?></label>
                                        </div>
                                    </div>

                                </form>

                            </div>


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
