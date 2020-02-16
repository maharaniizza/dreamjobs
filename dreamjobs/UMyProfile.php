<?php
session_start();
include_once "config/DB.php";
$page = "MyProfile";
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
            <h1 class="h3 mb-2 text-gray-800">My Profile</h1>
            <p class="mb-4">Fill All Data Below to Apply for Job</p>
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Personal Identity</a>
                        </li>
                    </ul>
                </div>
                <!-- Tab links -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="ibox-content">
                                    <form method="get" class="form-horizontal col-12">
                                        
                                        <a href="UMyProfileEdit.php" class="btn btn-success ">
                                            <i class="fa fa-pen"></i> Edit Profile
                                        </a>
                                        <br />
                                        <br/>
                                        <?php
                                          include "config/DB.php";
                                          $query = "SELECT SalaryRangeID,FirstName, LastName , ApplicantDOB,ApplicantGender,ApplicantAddress,ApplicantIdentityNo,ApplicantPhone,UserEmail,LastEducationMajor,LastEducationName 
                                          FROM trapplicantform JOIN msuser on trapplicantform.UserID = msuser.UserID WHERE trapplicantform.UserID = '".$_SESSION['userid']."'" ;
                                          $res = $conn->query($query);
                                          $res1 = $res->fetch_assoc();
                                          ?>
                                          <div class="card-body">
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Full Name</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?php echo $res1['FirstName'] . ' ' . $res1['LastName']  ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Date of Birth</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?= $res1['ApplicantDOB'] ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Gender</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?= $res1['ApplicantGender'] ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Address</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?= $res1['ApplicantAddress'] ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Phone Number</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?= $res1['ApplicantPhone'] ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Email</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?= $res1['UserEmail'] ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Identity No (KTP)</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?= $res1['ApplicantIdentityNo'] ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Salary Expectation</label>
                                                <div class="col-8">
                                                <?php 
                                                    if($res1['SalaryRangeID'] == "1"){
                                                    $hasil = "less than 500.000";
                                                    }
                                                    else if($res1['SalaryRangeID'] == "2"){
                                                    $hasil = "500.000-1000.000";
                                                    }
                                                    else if($res1['SalaryRangeID'] == "3"){
                                                    $hasil = "1000.000-5000.000";
                                                    }
                                                    if($res1['SalaryRangeID'] == "4"){
                                                    $hasil = "5000.000-10.000.000";
                                                    }
                                                    else if($res1['SalaryRangeID'] == "5"){
                                                    $hasil = "10.000.000-15.000.000";
                                                    }
                                                ?>
                                                <label class="control-label"><?php echo $hasil ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Last Education Major</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?= $res1['LastEducationMajor'] ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-sm-3 row">
                                                <label class="col-4 control-label">Last Education Name</label>
                                                <div class="col-8">
                                                    <label class="control-label"><?= $res1['LastEducationName'] ?></label>
                                                </div>
                                            </div>

                                          </div>

                                        <div class="hr-line-dashed"></div>
                                            <div class="card-header">
                                                <center>
                                                    <h4 class="mb-0 text-black"><b>Work Experience</b></h4>
                                                </center>
                                            </div>
                                            <br />
              
                                            <div class="table-responsive">
                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#AddExperience">
                                                    <i class="fa fa-plus-circle"></i>
                                                        Add Experience
                                                    </a>
                                                </a>
                                                <br />
                                                <br />
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Company Name</th>
                                                            <th>Periode</th>
                                                            <th>Last Position</th>
                                                            <th>Last Salary</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                      <?php
                                                          $query = "SELECT CompanyName,WorkPeriod,LastPosition,LastSalary,RecID FROM trworkexperience A
                                                          JOIN trapplicantform B ON A.ApplicantFormID = B.ApplicantFormId  
                                                          WHERE B.userid = '".$_SESSION['userid']."'";
                                                          $res = $conn->query($query);
                                                      ?> 
                                                    <tbody>
                                                      <?php while($row = $res->fetch_assoc()){ ?>
                                                        <tr>
                                                            <td><?= $row['CompanyName'] ?></td>
                                                            <td><?= $row['WorkPeriod'] ?></td>
                                                            <td><?= $row['LastPosition'] ?></td>
                                                            <td><?= $row['LastSalary'] ?></td>
                                                            <td>
                                                                <a href="controller/UDeleteExperience.php?RecID=<?=$row['RecID']?>" class="btn btn-danger btn-user">
                                                                    Delete
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <br />

                                        <div class="card-header">
                                            <center>
                                                <h4 class="mb-0 text-black"><b>Skills</b></h4>

                                            </center>
                                        </div>
                                        <br />
                                        <div class="table-responsive">

                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#AddSkill">
                                                <i class="fa fa-plus-circle"></i>
                                                Add Skill
                                            </a>

                                            <br />
                                            <br />
                                            <table class="table table-bordered" id="myTable2" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Skill</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                  $query = "SELECT SkillName,A.SkillID FROM trapplicantskilldetail A
                                                  JOIN msskill B ON A.SkillID = B.SkillID
                                                  JOIN trapplicantform C ON A.ApplicantFormID = C.ApplicantFormId
                                                  WHERE C.userid = '".$_SESSION['userid']."'";
                                                  $res = $conn->query($query);
                                                ?> 
                                                <tbody>
                                                <?php while($row = $res->fetch_assoc()){ ?>
                                                        <tr>
                                                            <td><?= $row['SkillName'] ?></td>
                                                            <td>
                                                                <a href="controller/UDeleteSkill.php?SkillID=<?=$row['SkillID']?>" class="btn btn-danger btn-user">
                                                                    Delete
                                                                </a>
                                                            </td>
                                                        </tr>
                                                  <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>                                     

                                    </form>
                                
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

  <div class="modal fade" id="AddExperience" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add Work Experience</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
        </div>
        <?php
            include_once "config/DB.php";
            $query="SELECT * FROM trapplicantform WHERE UserID = '".$_SESSION['userid']."' ";
            $result=$conn->query($query);
            while($data=$result->fetch_assoc()){
        ?>
        <div class="modal-body">
            <form method="POST" action="controller/UAddExperience.php?ApplicantFormId=<?=$data['ApplicantFormId']?>" class="form-horizontal col-12" >
                <div class="form-group mb-sm-3 row">
                    <label class="col-4 control-label">Company Name</label>
                    <div class="col-8">
                        <input type="text" name="CompanyName" class="form-control form-control-user">
                    </div>
                </div>
                <div class="form-group mb-sm-3 row">
                    <label class="col-4 control-label">Last Position</label>
                    <div class="col-8">
                        <input type="text" name="LastPosition" class="form-control form-control-user">
                    </div>
                </div>

                <div class="form-group mb-sm-3 row">
                    <label class="col-4 control-label">Last Salary</label>
                    <div class="col-8">
                        <select name="LastSalary" class="form-control form-control-user">
                            <option value="less than 500.000">less than 500.000</option>
                            <option value="500.000-1000.000">500.000-1000.000</option>
                            <option value="1000.000-5000.000">1000.000-5000.000</option>
                            <option value="5000.000-10.000.000">5000.000-10.000.000</option>
                            <option value="10.000.000-15.000.000">10.000.000-15.000.000</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-12">
                    <div class="row">
                        <div class="col-4">
                            <label class="control-label">Start Date</label>
                        </div>
                        <div class="col-4">
                            <select name="StartMonthDate" class="form-control form-control-user">
                                <option value="Jan">Jan</option>
                                <option value="Feb">Feb</option>
                                <option value="March">March</option>
                                <option value="Apr">Apr</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="StartYearDate" class="form-control form-control-user">
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group col-12">
                    <div class="row">
                        <div class="col-4">
                            <label class="control-label">End Date</label>
                        </div>
                        <div class="col-4">
                            <select name="EndMonthDate" class="form-control form-control-user">
                                <option value="Jan">Jan</option>
                                <option value="Feb">Feb</option>
                                <option value="March">March</option>
                                <option value="Apr">Apr</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="EndYearDate" class="form-control form-control-user">
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
            <div class="form-horizontal">
            </div>
            <?php }?>
        </div>
             
      </div>
    </div>
  </div>

  <div class="modal fade" id="AddSkill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content"> 
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Skill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <?php
            include_once "config/DB.php";
            $query="SELECT ApplicantFormId FROM trapplicantform WHERE UserID = '".$_SESSION['userid']."' ";
            $result=$conn->query($query);
            $data=$result->fetch_assoc();
            ?>
            <div class="modal-body">
                <form method="POST" class="form-horizontal col-12" action="controller/UAddSkill.php?ApplicantFormId=<?=$data['ApplicantFormId']?>">
                    <div class="form-group mb-sm-3 row">
                        <label class="col-4 control-label">Skill Name</label>
                        <div class="col-8">
                            <select name="skillname" class="form-control form-control-user">
                              <?php
                                  $query2="SELECT *FROM msskill";
                                  $result2=$conn->query($query2);
                                  while($data2=$result2->fetch_assoc()){
                                  ?>
                                    <option value="<?= $data2['SkillID']?>"><?= $data2['SkillName']?></option>
                                  <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
                <div class="form-horizontal">
                    
                </div>
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
