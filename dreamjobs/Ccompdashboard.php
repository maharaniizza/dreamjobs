<?php

session_start();
$page="Dashboard";

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
 include_once("Cexcontain.php");
 ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>
          <!-- Content Row -->
          <div class="row">
            <?php
            
                  $query="SELECT a.VacancyStatusID,VacancyStatusName,VacancyID,VacancyTitle,a.PositionID, PositionName 
                  FROM trvacancy a join msvacancystatus m on a.VacancyStatusId=m.VacancyStatusID join msposition c on a.PositionID=c.PositionID 
                  where a.VacancyStatusID=1";
                  $result=$conn->query($query);
                  $count=0;
                  
                  if($result->num_rows<1){
                    $count=0;
                  }
                  
                  else{

                    while($data=$result->fetch_assoc()){
                      $count++;
                    }
                  }


                  ?>
            
            <div  class="col-xl-4 col-lg-5">
                <div  class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6  class="m-0 font-weight-bold text-primary">Open Listing</h6>
                    <div class="dropdown no-arrow">
                      
                    </div>
                  </div>
                  <!-- Card Body -->
                  <div style="background-color: #1cc88a"class="card-body">
                      <div style="background-color: #1cc88a;padding: 100px;">
                          <h1   style="margin: -40px; text-align: center;font-size: 500%;"><?= $count;?></h1>
                        </div>
                        
                      </div>
                    </div>
                  </div>

                  <?php

                   $query2="SELECT count(*) as count from (SELECT applicantformid,vacancyid FROM `trvacancydetail` group by ApplicantFormID ,vacancyid) b";


                      $result2=$conn->query($query2);
 
                        $count=0;
                        while($data2=$result2->fetch_assoc()){
                          
                          $count=$data2['count'];
                          
                        }
                      
                      ?>
            
            
                    <div  class="col-xl-4 col-lg-5">
                      <div  class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6  class="m-0 font-weight-bold text-primary">Total Applicant</h6>
                          <div class="dropdown no-arrow">
                          <?php
                              $count
                              ?>
                          </div>
                        </div>
                <!-- Card Body -->
                <div style="background-color:#36b9cc;"class="card-body">
                    <div style="background-color: #36b9cc;padding: 100px;">
                        <h1   style="margin: -40px; text-align: center;font-size: 500%;"><?= $count?></h1>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <?php
                  
                  $query="SELECT a.VacancyStatusID,VacancyStatusName,VacancyID,VacancyTitle,a.PositionID, PositionName 
                  FROM trvacancy a join msvacancystatus m on a.VacancyStatusId=m.VacancyStatusID join msposition c on a.PositionID=c.PositionID 
                  where a.VacancyStatusID=2";
                  $result=$conn->query($query);
                  $count=0;
                  
                  if($result->num_rows<1){
                    $count=0;
                  }
                  
                  else{

                    while($data=$result->fetch_assoc()){
                      $count++;
                    }
                  }


                  ?>

                <div  class="col-xl-4 col-lg-5">
                    <div  class="card shadow mb-4">
                      <!-- Card Header - Dropdown -->
                      <div  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6  class="m-0 font-weight-bold text-primary">Closed Listings</h6>
                        <div class="dropdown no-arrow">
                          
                        </div>
                      </div>
                      <!-- Card Body -->
                      <div style="background-color: #e74a3b"class="card-body">
                          <div style="background-color: #e74a3b;padding: 100px;">
                              <h1   style="margin: -40px; text-align: center;font-size: 500%;"><?= $count?></h1>
                            </div>
                            
                          </div>
                        </div>
                      </div>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Active Listings</h1>
              
            </div>
            <div class="container-fluid">

          <!-- Page Heading -->
                <div class="card shadow">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Status</th>
                      <th>Job Title</th>
                      <th>Position</th>
                      <th>Applicants</th>
                      
                      <th>Action</th>
                    </tr>
                  </thead>
                
                  <tbody>
                   <?php
                  
                  $query="SELECT a.VacancyStatusID,VacancyStatusName,VacancyID,VacancyTitle,a.PositionID, PositionName 
                  FROM trvacancy a join msvacancystatus m on a.VacancyStatusId=m.VacancyStatusID join msposition c on a.PositionID=c.PositionID 
                  where a.VacancyStatusID=1";
                  $result=$conn->query($query);
                  while($data=$result->fetch_assoc()){

                    


                  ?>
                    <tr>
                      <?php if($data['VacancyStatusID']==1){?>
                      <td style="color:blue;"><?php echo $data['VacancyStatusName']?></td>
                  <?PHP }else{?>
                    <td style="color:red;"><?php echo $data['VacancyStatusName']?></td>
                  <?php }?>
                      <td><?php echo $data['VacancyTitle']?></td>
                      <td><?php echo $data['PositionName']?></td>
                       <?php

                    $query2="select count(*) as count from (SELECT applicantformid,vacancyid FROM `trvacancydetail` where VacancyID='".$data['VacancyID']."' 
                    GROUP BY ApplicantFormID) a";

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

                      <td>
                        <a href="Cdetailjob.php?id=<?php echo $data['VacancyID'] ?>" style="text-decoration: none;">
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
            
        </div>
        <!-- /.container-fluid -->

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

</body>

</html>


                    <?php }?>
