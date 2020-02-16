<?php
session_start();
  
$page="position";
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
            <label class="control-label"><h3 class="">Manage Positions</h3></label>
             <a style="text-decoration: none; margin:50px;" data-toggle="modal"data-target="#addposition">
              <button  id="status" class="btn btn-success"> Add Positions </button>
              </a>
              <br>
              <br>
              <br>
            <?php
            include_once "config/DB.php";
            $query="SELECT *FROM msposition order by createddate desc";
            $result=$conn->query($query);
            while($data=$result->fetch_assoc()){
            ?>

          <div class="card shadow mb-4">         
             <div class="card-header py-3">
              <h5 class="h5 mb-2 text-gray-800"><?=$data['PositionName']?></h5>
            </div>
            <div class="card-body">               
              <br>
              <div class="table">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Skill Name</th>
                      <th>Action</th>                                  
                    </tr>
                  </thead>               
                  <tbody>
                  <?php
                    $position=$data['PositionID'];
                    $skill="SELECT a.SkillID,PositionID, SkillName FROM trpositionskilldetail a join msskill m on a.SkillID=m.SkillID where PositionID='$position'";
                    $result1=$conn->query($skill);
                    while($data1=$result1->fetch_assoc()){
                  ?>
                    <tr> 
                      <td><?= $data1['SkillName']?></td>
                      <td>
                      <form method="POST" action="controller/deleteSkillPosition.php?PositionID=<?=$data['PositionID']?>" class="form-horizontal col-12">                   
                          <input type="hidden" name="SkillID" value="<?=$data1['SkillID']?>">
                          <button  id="status" class="btn btn-danger"> Delete Skill </button>
                      </form>
                        
                      </td>
                    </tr>
                    <?php }?>
                 
                  </tbody>
                </table>
              </div>
            </div>
            <form method="POST" action="controller/managePosition.php?PositionID=<?=$data['PositionID']?>" class="form-horizontal col-12">

                            <input type="hidden" name="action" value="addSkill">
                            
                            <br>
                            <br>
                            <div class="form-group mb-3 row">
                             
                                  <div class="col-8">
                                     <label class="col-6 control-label"><h5>Add SKill</h5></label>   
                                      <select name="skill" class="form-control form-control-user">
                                        <?php
                                        $query2="SELECT *FROM msskill";
                                        $result2=$conn->query($query2);
                                        while($data2=$result2->fetch_assoc()){
                                        ?>
                                          <option value="<?= $data2['SkillID']?>"><?= $data2['SkillName']?></option>
                                        <?php }?>
                                      </select>
                                      <br>
                                        <button  id="status" class="btn btn-success col-2"> Add</button>
                                  </div>
                                
                            
                            </div>
                           

          </form>
          </div>
          <?php }?>


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

  <!-- addposition Modal-->
  <div class="modal fade" id="addposition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h1>Add Position</h1>
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="controller/managePosition.php?userid=<?=$_SESSION['userid']?>" method="POST">
              <input type="hidden" name="action" value="addPosition">
              <div class="form-group mb-sm-3 row">
              <label class="col-4 control-label">Add Position</label>
              <div class="col-8">
              <input type="text" name="position" class="form-control form-control-user">
              </div>
              </div>
              
                   
              <input type="submit" class="btn btn-success" type="button" value="Add">
        </div>
        <div class="modal-footer">
        </div>
      </form>

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

