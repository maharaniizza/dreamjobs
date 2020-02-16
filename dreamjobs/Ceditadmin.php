<?php
session_start();
  
$page="manageadmin";
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

  <title>DreamJobs - Edit Admin</title>

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
              <h3 class="m-0 font-weight-bold text-primary">Edit Admin</h3>
            </div>
            <form method="POST" action="controller/doEditAdmin.php" class="form-horizontal col-12">
        <br>
        <br>
        <?php
        include_once("config/DB.php");
        $id=$_GET['UserID'];
        $query="SELECT *FROM msuser where UserID='$id'";
        $result=$conn->query($query);
        $data=$result->fetch_assoc();
        ?>
        <input type="hidden" name="UserID" id="UserID" value="<?= $data['UserID']?>">
        <div class="form-group mb-sm-3 row">
          <label class="col-4 control-label">First Name</label>
          <div class="col-8">
            <input type="text" name="firstname" id="firstname" class="form-control form-control-user" value="<?= $data['FirstName']?>">
          </div>
        </div>
        <div class="form-group mb-sm-3 row">
        <label class="col-4 control-label">Last Name</label>
          <div class="col-8">
            <input type="text" name="lastname" id="lastname" class="form-control form-control-user"value="<?= $data['LastName']?>">
          </div>
        </div>

        <div class="form-group mb-sm-3 row">
          <label class="col-4 control-label">Email</label>
          <div class="col-8">
            <input type="email" name="email" id="email" class="form-control form-control-user"value="<?= $data['UserEmail']?>">
          </div>
        </div>

        <div class="form-group mb-sm-3 row">
          <label class="col-4 control-label">Password</label>
          <div class="col-8">
            <input type="password" name="password" id="password" class="form-control form-control-user">
          </div>
        </div>

        <div class="form-group mb-sm-3 row">
          <label class="col-4 control-label">Confirm Password</label>
          <div class="col-8">
            <input type="password" name="confpass" id="confpass" class="form-control form-control-user">
          </div>
        </div>
        <input type="submit" class="btn btn-success"  id="save" name="save" value="EDIT">
        </div>

    
    
    </form>
              
       

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

