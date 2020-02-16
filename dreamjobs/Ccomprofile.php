<?php
session_start();
$page="comprofile";  

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

  <title>DreamJobs - My Profile</title>

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
              <h3 class="m-0 font-weight-bold text-primary">Company Profile</h3>
            </div>
         
            <div class="card-body">
            <?php
                          $query="SELECT *FROM mscompany";
                          $result=$conn->query($query);
                          $data=$result->fetch_assoc();
                          ?>

      <div class="tab-content">
       
          <div class="tab-pane active" id="home" role="tabpanel">
            <form method="POST" action="controller/updateCompanyProfile.php" class="form-horizontal col-12" enctype="multipart/form-data">
              <div class="card-body">
                <div style="height: 10em;
                  display: flex;
                  align-items: center;
                  justify-content: center;">
                  <img style="height: auto;
                  width: auto;
                  max-width: 200px;
                  max-height: 200px;
                  border-radius: 60px;
                  " src="img/asset<?= $data['CompanyImage']?>" alt="">

                  <input name="image" type="file">
                </div>
                  <div class="table-responsive">
                      <div class="ibox-content">
                          <h1><?= $data['CompanyName']?></h1>                        
                      
                          <form method="POST" action="controller/updateCompanyProfile.php" class="form-horizontal col-12">

                            <input type="hidden" name="status" value="Open">
                            
                            <br>
                            <br>
                            <div class="form-group mb-sm-3 row">
                              <label class="col-4 control-label">Company Email</label>
                              <div class="col-8">
                                <input type="text" name="email" class="form-control form-control-user" value="<?= $data['CompanyEmail']?>">
                              </div>
                            </div>

                            <div class="form-group mb-sm-3 row">
                              <label class="col-4 control-label">Company Phone</label>
                              <div class="col-8">
                                <input type="number" name="phone" class="form-control form-control-user "value="<?= $data['CompanyPhone']?>">
                              </div>
                            </div>

                            <div class="form-group mb-sm-3 row">
                                <label class="col-4 control-label">Company Size</label>
                                <div class="col-8">
                                    <select name="size" class="form-control form-control-user" >
                                        <option value="<?= $data['CompanySize']?>" selected hidden><?= $data['CompanySize']?></option>
                                        <option value="<50 Employee"> less than 50 employee</option>
                                        <option value="50-250 Employee"> 50-250 employee</option>
                                        <option value="250> Employee"> more than 250 employee</option>
                               
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-sm-3 row">
                              <label class="col-4 control-label">Website</label>
                              <div class="col-8">
                                <input type="website" name="website" class="form-control form-control-user" value="<?= $data['CompanyWebsite']?>">
                              </div>
                            </div>

                            <div class="form-group mb-sm-3 row">
                              <label class="col-4 control-label">Company Name</label>
                              <div class="col-8">
                                <input type="website" name="name" class="form-control form-control-user" value="<?= $data['CompanyName']?>">
                              </div>
                            </div>

                            
                            
                            <div class="form-group mb-sm-3 row">
                                <label class="col-4 control-label">Company Description</label>
                                <div class="col-8">
                                    <textarea name="desc" class="col-sm-12 form-control form-control-user"  placeholder="Enter text here..."><?= $data['CompanyDesc']?></textarea>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success" value="SAVE">                  
                          </form>
                      </div>
                  </div>
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

<input type="hidden" name="status" value="Open">
<input type="hidden" name="action" value="register">
<input type="hidden" name="roleid" value="2">

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
