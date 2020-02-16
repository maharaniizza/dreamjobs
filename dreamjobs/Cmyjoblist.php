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

  <title>DreamJobs - Positions</title>

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
          <div class="card shadow mb-4">
            <div class="card-body">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All Listings</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Open Listings</a>
                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Closed Listings</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <!-- 1 -->
                <br>
                <br>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Status</th>
                      <th>Job Title</th>
                      <th>Position</th>
                      <th>Applicants</th>
                      <th>Current Step</th>
                      <th>Current Step Status</th>
                       <th>Next Step</th>
                      
                      <th>Action</th>
                    </tr>
                  </thead>                
                  <tbody>
             <!--  all -->
                  <?php
                  include_once "config/DB.php";
                  $query="SELECT vacancyid as vacid, a.VacancyStatusID as vacstatus,VacancyStatusName,VacancyTitle,a.PositionID, PositionName , (select stepname from trvacancysteptime a join msstep s on a.StepID=s.StepID where VacancyID=vacid and stepstatus='On Review') as currentstep,(select stepstatus from trvacancysteptime a join msstep s on a.StepID=s.StepID where VacancyID=vacid and stepstatus='On Review') as statusstep,(select  DATE_FORMAT(time,'%d %b %Y') from trvacancysteptime where VacancyID=vacid and stepID=(select a.stepid+1 from trvacancysteptime a join msstep s on a.StepID=s.StepID where VacancyID=vacid and stepstatus='On Review')) as nextsteptime
                    FROM trvacancy a join msvacancystatus m on a.VacancyStatusId=m.VacancyStatusID join msposition c on a.PositionID=c.PositionID";
                  $result=$conn->query($query);
                  while($data=$result->fetch_assoc()){
                  ?>
                    <tr>
                      <td><?php echo $data['VacancyStatusName']?></td>
                      <td><?php echo $data['VacancyTitle']?></td>
                      <td><?php echo $data['PositionName']?></td>
                      <?php
                       $query2="SELECT count(*) AS count from (SELECT applicantformid,vacancyid FROM `trvacancydetail` group by ApplicantFormID ,vacancyid HAVING VacancyID='".$data['vacid']."') b";
                      $result2=$conn->query($query2);
                      if($result2->num_rows<1){
                          { ?>  <td>0</td>  <?php }
                              
                      }
                      else{

                        while($data2=$result2->fetch_assoc()){
                          
                            { ?>  <td><?= $data2['count'] ?></td>  <?php }
                              
                          
                        }
                      }
                      ?>
                      <?php
                      if($data['vacstatus']==2){
                          { ?>       <td><?php echo $data['VacancyStatusName']?></td> <?php }
                           { ?>        <td><?php echo $data['VacancyStatusName']?></td> <?php }
                            { ?>        <td><?php echo $data['VacancyStatusName']?></td> <?php }
                            { ?>   <td>
                                           <a href="Cdetailjobclosed.php?id=<?php echo $data['vacid'] ?>"  style="text-decoration: none;">
                                          <button  id="status" class="btn btn-success"> View Details </button>
                                          </a>
                                       </td><?php }
                              
                      }
                      else{
                               { ?>   <td><?php echo $data['currentstep']?></td> <?php }
                               { ?>  <td><?php echo $data['statusstep']?></td> <?php }
                               { ?>  <td><?php echo $data['nextsteptime']?></td><?php }
                                  { ?>   <td>
                                           <a href="Cdetailjob.php?id=<?php echo $data['vacid'] ?>"  style="text-decoration: none;">
                                          <button  id="status" class="btn btn-success"> View Details </button>
                                          </a>
                                       </td><?php }


                      }
                      ?>
                     
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                 <!-- 2 OPEN ONLY-->
                                 <br>
                <br>
                <div class="table-responsive">
                <table class="table table-bordered" id="myTable1" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <th>Status</th>
                      <th>Job Title</th>
                      <th>Position</th>
                      <th>Applicants</th>
                      <th>Current Step</th>
                      <th>Current Step Status</th>
                       <th>Next Step</th>
                      
                      <th>Action</th>
                    </tr>
                  </thead>                
                  <tbody>
             <!--  open -->
                  <?php
                  include_once "config/DB.php";
                  $query="SELECT vacancyid as vacid, a.VacancyStatusID as vacstatus,VacancyStatusName,VacancyTitle,a.PositionID, PositionName , (select stepname from trvacancysteptime a join msstep s on a.StepID=s.StepID where VacancyID=vacid and stepstatus='On Review') as currentstep,(select stepstatus from trvacancysteptime a join msstep s on a.StepID=s.StepID where VacancyID=vacid and stepstatus='On Review') as statusstep,(select  DATE_FORMAT(time,'%d %b %Y') from trvacancysteptime where VacancyID=vacid and stepID=(select a.stepid+1 from trvacancysteptime a join msstep s on a.StepID=s.StepID where VacancyID=vacid and stepstatus='On Review')) as nextsteptime
                    FROM trvacancy a join msvacancystatus m on a.VacancyStatusId=m.VacancyStatusID join msposition c on a.PositionID=c.PositionID where a.VacancyStatusID=1";
                  $result=$conn->query($query);
                  while($data=$result->fetch_assoc()){
                  ?>
                    <tr>
                      <td><?php echo $data['VacancyStatusName']?></td>
                      <td><?php echo $data['VacancyTitle']?></td>
                      <td><?php echo $data['PositionName']?></td>
                      <?php
                       $query2="SELECT count(*) AS count from (SELECT applicantformid,vacancyid FROM `trvacancydetail` group by ApplicantFormID ,vacancyid HAVING VacancyID='".$data['vacid']."') b";
                      $result2=$conn->query($query2);
                      if($result2->num_rows<1){
                          { ?>  <td>0</td>  <?php }
                              
                      }
                      else{

                        while($data2=$result2->fetch_assoc()){
                          
                            { ?>  <td><?= $data2['count'] ?></td>  <?php }
                              
                          
                        }
                      }
                      ?>
                      <?php
                      if($data['vacstatus']==2){
                          { ?>       <td><?php echo $data['VacancyStatusName']?></td> <?php }
                           { ?>        <td><?php echo $data['VacancyStatusName']?></td> <?php }
                            { ?>        <td><?php echo $data['VacancyStatusName']?></td> <?php }
                            { ?>   <td>
                                           <a href="Cdetailjobclosed.php?id=<?php echo $data['vacid'] ?>"  style="text-decoration: none;">
                                          <button  id="status" class="btn btn-success"> View Details </button>
                                          </a>
                                       </td><?php }
                              
                      }
                      else{
                               { ?>   <td><?php echo $data['currentstep']?></td> <?php }
                               { ?>  <td><?php echo $data['statusstep']?></td> <?php }
                               { ?>  <td><?php echo $data['nextsteptime']?></td><?php }
                                  { ?>   <td>
                                           <a href="Cdetailjob.php?id=<?php echo $data['vacid'] ?>"  style="text-decoration: none;">
                                          <button  id="status" class="btn btn-success"> View Details </button>
                                          </a>
                                       </td><?php }


                      }
                      ?>
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <!-- 3 Close Only -->
                <br>
                <br>
                <div class="table-responsive">
                <table class="table table-bordered" id="myTable2" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th>Status</th>
                      <th>Job Title</th>
                      <th>Position</th>
                      <th>Applicants</th>
                      <th>Current Step</th>
                      <th>Current Step Status</th>
                       <th>Next Step</th>
                      
                      <th>Action</th>
                    </tr>
                  </thead>                
                  <tbody>
             <!--  open -->
                  <?php
                  include_once "config/DB.php";
                  $query="SELECT vacancyid as vacid, a.VacancyStatusID,VacancyStatusName,VacancyTitle,a.PositionID, PositionName , (select stepname from trvacancysteptime a join msstep s on a.StepID=s.StepID where VacancyID=vacid and stepstatus='On Review') as currentstep,(select stepstatus from trvacancysteptime a join msstep s on a.StepID=s.StepID where VacancyID=vacid and stepstatus='On Review') as statusstep,(select  DATE_FORMAT(time,'%d %b %Y') from trvacancysteptime where VacancyID=vacid and stepID=(select a.stepid+1 from trvacancysteptime a join msstep s on a.StepID=s.StepID where VacancyID=vacid and stepstatus='On Review')) as nextsteptime
                    FROM trvacancy a join msvacancystatus m on a.VacancyStatusId=m.VacancyStatusID join msposition c on a.PositionID=c.PositionID where a.VacancyStatusID=2";
                  $result=$conn->query($query);
                  while($data=$result->fetch_assoc()){
                  ?>
                    <tr>
                      <td><?php echo $data['VacancyStatusName']?></td>
                      <td><?php echo $data['VacancyTitle']?></td>
                      <td><?php echo $data['vacid']?></td>
                      <?php
                      $query2="SELECT count(*) AS count from (SELECT applicantformid,vacancyid FROM `trvacancydetail` group by ApplicantFormID ,vacancyid HAVING VacancyID='".$data['vacid']."') b";
                      $result2=$conn->query($query2);
                      if($result2->num_rows<1){
                          { ?>  <td>0</td>  <?php }
                              
                      }
                      else{

                        while($data2=$result2->fetch_assoc()){
                          
                            { ?>  <td><?= $data2['count'] ?></td>  <?php }
                              
                          
                        }
                      }
                      ?>

                         <td><?php echo $data['VacancyStatusName']?></td>
                           <td><?php echo $data['VacancyStatusName']?></td>
                            <td><?php echo $data['VacancyStatusName']?></td> 
                               <td>
                                           <a href="Cdetailjobclosed.php?id=<?php echo $data['vacid'] ?>"  style="text-decoration: none;">
                                          <button  id="status" class="btn btn-success"> View Details </button>
                                          </a>
                                       </td>
                      </td>
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
                </div>
              </div>
            </div>
             </div>
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
    });
</script>
  



  




</body>

</html>
<?php }?>

