<?php
session_start();
$page="createjob";

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

  <title>DreamJobs - Create Job</title>

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
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-primary">Create Job</h3>
            </div>
            
            <div class="card-body">
                
              <div class="table-responsive">
              <form method="POST" action="controller/addJob.php" class="form-horizontal col-12">

<input type="hidden" name="status" value="1">
<input type="hidden" name="CompanyID" value="COM001">
<br>
<br>
<div class="form-group mb-sm-3 row">
  <label class="col-4 control-label">Job Title</label>
  <div class="col-8">
    <input type="text" name="jobtitle" class="form-control form-control-user">
  </div>
</div>

<div class="form-group mb-sm-3 row">
    <label class="col-4 control-label">Job Position</label>
    <div class="col-8">
        <select name="position" class="form-control form-control-user">
          <?php
          $query="SELECT *FROM msposition";
          $result=$conn->query($query);
          while($data=$result->fetch_assoc()){
          ?>
            <option value="<?= $data['PositionID']?>"><?= $data['PositionName']?></option>
          <?php }?>
        </select>
    </div>
</div>

<div class="form-group mb-sm-3 row">
  <label class="col-4 control-label">Job location</label>
  <div class="col-8">
    <input type="text" name="location" class="form-control form-control-user">
  </div>
</div>

<div class="form-group mb-sm-3 row">
    <label class="col-4 control-label">Salary range</label>
    <div class="col-8">
        <select name="salary" class="form-control form-control-user">
          <?php
          $query="SELECT *FROM mssalaryrange";
          $result=$conn->query($query);
          while($data=$result->fetch_assoc()){
          ?>
            <option value="<?= $data['SalaryRangeId']?>"><?= $data['SalaryRange']?></option>
          <?php }?>
        </select>
    </div>
</div>


<div class="form-group mb-sm-3 row">
    <label class="col-4 control-label">Last education require</label>
    <div class="col-8">
      
        <select name="edureq" class="form-control form-control-user">
        <?php
          $query="SELECT *FROM mseducationtype";
          $result=$conn->query($query);
          while($data=$result->fetch_assoc()){
          ?>
            <option value="<?= $data['EducationTypeID']?>"><?= $data['EducationTypeName']?></option>
          <?php }?>
        </select>
    </div>
</div>

<!--  <div class="form-group mb-sm-3 row">
    <label class="col-4 control-label">Job description</label>
    <div class="col-8">
        <textarea name="jobdesc" class="col-sm-12 form-control form-control-user" placeholder="Enter text here..."></textarea>
    </div>
</div> -->

<div class="form-group mb-sm-3 row">
  <label class="col-4 control-label">Step 1</label>
  <div class="col-8">
    <input type="date" name="step1" class="form-control form-control-user">
  </div>
</div>

<div class="form-group mb-sm-3 row">
  <label class="col-4 control-label">Step 2</label>
  <div class="col-8">
    <input type="date" name="step2" class="form-control form-control-user">
  </div>
</div>

<div class="form-group mb-sm-3 row">
  <label class="col-4 control-label">Step 3</label>
  <div class="col-8">
    <input type="date" name="step3" class="form-control form-control-user">
  </div>
</div>

<div class="form-group mb-sm-3 row">
  <label class="col-4 control-label">Step 4</label>
  <div class="col-8">
    <input type="date" name="step4" class="form-control form-control-user">
  </div>
</div>




<input type="submit" class="btn btn-success" value="SUBMIT">




</form>

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
            <span>Copyright &copy; Your Website 2019</span>
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
        <div class="modal-body">Select "Logout" below if you are ready to end your current session. lore</div>
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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  




</body>

</html>
<?php }else{
                      header("location:404.html");
                    }?>
