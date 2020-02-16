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

    <?php include "contain.php"?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">Job Available</h1>
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
                        <li class="breadcrumb-item"><a href="USearchJob.php">Job Available</a></li>
                        <li class="breadcrumb-item active"><?php echo $data['PositionName']?></li>
                      <?php }

                      ?>
                      
                       
                    </ol>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->

                <?php
                  $id = $_GET['id'];
                
                    $query = "SELECT VacancyTitle, VacancyID, a.CompanyID as compid, companyname, a.PositionID as posid,PositionName, a.VacancyStatusId as vacstatusid, SalaryRange, a.EducationTypeID as eduid, VacancyLocation,a.CreatedDate as CreatedDate, a.UpdatedDate as UpdatedDate,a.CreatedBy as CreatedBy,a.UpdatedBy as UpdatedBy,
                       vacancystatusname,educationtypename FROM trvacancy a JOIN mscompany b on a.CompanyID=b.CompanyID join msposition c on a.PositionID=c.PositionID join msvacancystatus m on a.VacancyStatusId=m.VacancyStatusID join mseducationtype d on a.EducationTypeID=d.EducationTypeID join mssalaryrange e on a.SalaryRangeID=e.SalaryRangeId where VacancyID='".$id."'";
                                 // /   echo "string";
                    $res = $conn->query($query);
                    $res = $res->fetch_assoc();
                 ?>
                <!-- Tab links -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="card-body">

                            <div class="ibox-content">

                                <form class="user" method="POST" action="controller/UApplyJob.php?id=<?=$res['VacancyID']?>">

                                <input type="hidden" name="action" value="newapply">
                                <div class="col-md-offset-3 col-md-0">
                                  <button type ="submit" class="btn btn-primary">
                                     <i class="fa fa-check"></i> 
                                     Apply
                                    </button> 
                                </div>
                                    <br />
                                    <div class="form-group mb-sm-3 row">
                                        <label class="col-4 control-label">Vacancy Title</label>
                                        <div class="col-8">
                                            <label class="control-label"><?php echo $res['VacancyTitle'] ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-sm-3 row">
                                        <label class="col-4 control-label">Position</label>
                                        <div class="col-8">
                                            <label class="control-label"><?php echo $res['PositionName'] ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-sm-3 row">
                                        <label class="col-4 control-label">Job Location</label>
                                        <div class="col-8">
                                            <label class="control-label"><?php echo $res['VacancyLocation'] ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-sm-3 row">
                                        <label class="col-4 control-label">Test Duration</label>
                                        <div class="col-8">
                                                       
                                            <?php
                       
                                               $querystart="SELECT DATE_FORMAT(time,'%d %b %Y') as starttest from trvacancysteptime 
                                               where vacancyid='".$res['VacancyID']."' and stepid=1";
                                               $rescek = $conn->query($querystart);
                                              $rows = $rescek->fetch_assoc();
                                              
                                              $queryend="SELECT DATE_FORMAT(time,'%d %b %Y') as endtest from trvacancysteptime where vacancyid='".$res['VacancyID']."' and stepid=4";
                                               $rescekend = $conn->query($queryend);
                                              $rowsend = $rescekend->fetch_assoc();

                                             ?> 
                                            <label class="control-label"><?php echo $rows['starttest']." - ".$rowsend['endtest'] ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-sm-3 row">
                                        <label class="col-4 control-label">Salary Range</label>
                                        <div class="col-8">
                                            <label class="control-label"><?php echo $res['SalaryRange'] ?></label>
                                        </div>
                                    </div>

                                </form>

                            </div>

                        <div class="card-header">
                            <center>
                                <h4 class="mb-0 text-black"><b>Skill Needed</b></h4>

                            </center>
                        </div>
                        <br />
                        <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Skill Name</th>
                                    <th>Skill Desc</th>
                                </tr>
                            </thead>
                            <?php
                            $id = $_GET['id'];
                                $query = "SELECT skillname,skilldesc FROM trpositionskilldetail a join msskill b on a.SkillID=b.SkillID where PositionID in(select PositionID from trvacancy where vacancyid='".$id."')";
                                $res = $conn->query($query);

                            ?> 

                             <tbody>
                              <?php while($row = $res->fetch_assoc()){ ?>
                                <tr>
                                    <td><?= $row['skillname'] ?></td>
                                    <td><?= $row['skilldesc'] ?></td>
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
