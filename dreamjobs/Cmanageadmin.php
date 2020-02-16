<?php

  
$page="manageadmin";
include_once "config/DB.php";
include_once "session.php";

if($_SESSION['RoleID']==2||$_SESSION['RoleID']==3){
?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DreamJobs - Manage Admin</title>

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
              <h3 class="m-0 font-weight-bold text-primary">Account Admin</h3>
            </div>
            <a  style="text-decoration: none; margin:50px;" data-toggle="modal"data-target="#addadmin">
                          <button  id="status" class="btn btn-success"> Add Admin </button>
                        </a>
            <div class="card-body">
                
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Admin Name</th>
                      <th>Email</th>
                      <th>Last Login</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                
                  <tbody>

                  <?php
                  include_once "config/DB.php";
                  $query="SELECT *FROM msuser where RoleID=2";
                  $result=$conn->query($query);
                  
                  while($data=$result->fetch_assoc()){
                  

                  ?>


                    <tr>
                      <td><?php echo $data['FirstName']?></td>
                      <td><?php echo $data['UserEmail']?></td>
                      <td><?php echo $data['LastLogin']?></td>
                    
                      
                      <td>
                        <a href="Ceditadmin.php?UserID=<?= $data['UserID']?>" style="text-decoration: none;">
                          <button  id="<?= $data['UserID']?>" name="edit" class="btn btn-info btn-xs edit_data"> Edit </button>
                        </a>

                        <a href="controller/CdeleteAdmin.php?UserID=<?= $data['UserID']?>" style="text-decoration: none;">
                          <button  id="status" class="btn btn-danger"> Delete </button>
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

<!-- form modal-->
<div class="modal fade" id="editadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

        
        <form method="POST" action="controller/auth.php" class="form-horizontal col-12">
<br>
<br>
<input type="hidden" name="UserID" id="UserID" value="<?= $data['UserID']?>">
<div class="form-group mb-sm-3 row">
  <label class="col-4 control-label">First Name</label>
  <div class="col-8">
    <input type="text" name="firstname" id="firstname" class="form-control form-control-user">
  </div>
</div>
<div class="form-group mb-sm-3 row">
<label class="col-4 control-label">Last Name</label>
  <div class="col-8">
    <input type="text" name="lastname" id="lastname" class="form-control form-control-user">
  </div>
</div>

<div class="form-group mb-sm-3 row">
  <label class="col-4 control-label">Email</label>
  <div class="col-8">
    <input type="email" name="email" id="email" class="form-control form-control-user">
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

</div>
<div class="modal-footer">
    
    <input type="submit" class="btn btn-success"  id="save" name="save" value="SAVE">
    </form>
    
        </div>
      </div>
    </div>
  </div>


 


  <div class="modal fade" id="addadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

        <form method="POST" action="controller/auth.php" class="form-horizontal col-12">
<input type="hidden" name="token" value="<?=$_SESSION['user_token'];?>">
<input type="hidden" name="status" value="Open">
<input type="hidden" name="action" value="register">
<input type="hidden" name="roleid" value="2">
<input type="hidden" name="ComID" value="COM001">

<br>
<br>
<div class="form-group mb-sm-3 row">
  <label class="col-4 control-label">First Name</label>
  <div class="col-8">
    <input type="text" name="firstname" class="form-control form-control-user">
  </div>
</div>
<div class="form-group mb-sm-3 row">
<label class="col-4 control-label">Last Name</label>
  <div class="col-8">
    <input type="text" name="lastname" class="form-control form-control-user">
  </div>
</div>

<div class="form-group mb-sm-3 row">
  <label class="col-4 control-label">Email</label>
  <div class="col-8">
    <input type="email" name="email" class="form-control form-control-user">
  </div>
</div>



<div class="form-group mb-sm-3 row">
  <label class="col-4 control-label">Password</label>
  <div class="col-8">
    <input type="password" name="password" class="form-control form-control-user">
  </div>
</div>

<div class="form-group mb-sm-3 row">
  <label class="col-4 control-label">Confirm Password</label>
  <div class="col-8">
    <input type="password" name="confpass" class="form-control form-control-user">
  </div>
</div>







</div>
<div class="modal-footer">
    
    <input type="submit" class="btn btn-success" value="SAVE">
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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  




</body>

</html>
<?php }else{
                      header("location:404.html");
                    }?>
