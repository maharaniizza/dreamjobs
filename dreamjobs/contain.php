<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <?php
        include_once "config/DB.php";
        // echo $_GET['id'];
        $query="SELECT SalaryRangeID,ApplicantDOB, ApplicantGender, ApplicantAddress, ApplicantPhone, ApplicantIdentityNo,EducationTypeID,LastEducationName,
        LastEducationMajor from trapplicantform a join msuser b on a.userid=b.userid where a.userid='".$_SESSION['userid']."'";
        $result=$conn->query($query);
        while($temp=$result->fetch_assoc()){
          if($temp['ApplicantDOB']==null||$temp['ApplicantGender']==null||$temp['ApplicantAddress']==null||
                           $temp['ApplicantPhone']==null||$temp['ApplicantIdentityNo']==null||$temp['EducationTypeID'] ==null
                           ||  $temp['LastEducationName']==null||$temp['LastEducationMajor']==null||$temp['SalaryRangeID']==null)
                        {
                           { ?>  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="UDashboardNew.php">
                                  <img src="logo.png" alt="gambar" style="width: 40px">
                                  <div class="sidebar-brand-text mx-3">DREAMJOBS</div>
                                </a>
                                  <?php }
                        } else{
                             { ?> <a class="sidebar-brand d-flex align-items-center justify-content-center" href="UDashboardExists.php">
                                    <img src="logo.png" alt="gambar" style="width: 40px">
                                    <div class="sidebar-brand-text mx-3">DREAMJOBS</div>
                                  </a>
                                  <?php }
                        }      
        ?>     
      <?php }?>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?php if($page == "Dashboard") echo "active";?>">
  <?php
        include_once "config/DB.php";
        // echo $_GET['id'];
        $query="SELECT SalaryRangeID,ApplicantDOB, ApplicantGender, ApplicantAddress, ApplicantPhone, ApplicantIdentityNo,EducationTypeID,LastEducationName,LastEducationMajor from trapplicantform a join msuser b on a.userid=b.userid where a.userid='".$_SESSION['userid']."'";

        $result=$conn->query($query);
        while($temp=$result->fetch_assoc()){
          if($temp['ApplicantDOB']==null||$temp['ApplicantGender']==null||$temp['ApplicantAddress']==null||
                           $temp['ApplicantPhone']==null||$temp['ApplicantIdentityNo']==null||$temp['EducationTypeID'] ==null
                           ||  $temp['LastEducationName']==null||$temp['LastEducationMajor']==null||$temp['SalaryRangeID']==null)
                        {
                           { ?>   <a class="nav-link" href="UDashboardNew.php">
                                  <i class="fas fa-fw fa-tachometer-alt"></i>
                                  <span>Dashboard</span></a>
                                  <?php }
                        } else{
                             { ?> <a class="nav-link" href="UDashboardExists.php">
                                  <i class="fas fa-fw fa-tachometer-alt"></i>
                                  <span>Dashboard</span></a>
                                  <?php }
                        }      
        ?>     
      <?php }?>
  </li>
  <!-- Divider -->



  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    KARIR
  </div>

  <li class="nav-item <?php if($page == "MyProfile") echo "active";?>">
      <?php
        include_once "config/DB.php";
        // echo $_GET['id'];
        $query="SELECT SalaryRangeID,ApplicantDOB, ApplicantGender, ApplicantAddress, ApplicantPhone, ApplicantIdentityNo,EducationTypeID,LastEducationName,LastEducationMajor from trapplicantform a join msuser b on a.userid=b.userid where a.userid='".$_SESSION['userid']."'";

        $result=$conn->query($query);
        while($temp=$result->fetch_assoc()){
          if($temp['ApplicantDOB']==null||$temp['ApplicantGender']==null||$temp['ApplicantAddress']==null||
                           $temp['ApplicantPhone']==null||$temp['ApplicantIdentityNo']==null||$temp['EducationTypeID'] ==null
                           ||  $temp['LastEducationName']==null||$temp['LastEducationMajor']==null||$temp['SalaryRangeID']==null)
                        {
                           { ?> <a class="nav-link collapsed" href="UMyProfileCreate.php">  
                            <i class="fas fa-fw fa-cog"></i>
                            <span>My Profile</span></a><?php }
                           // header("location:../UDashboardNew.php");
                        } else{
                             { ?> <a class="nav-link collapsed" href="UMyProfile.php">
                                 <i class="fas fa-fw fa-cog"></i>
                                  <span>My Profile</span>
                             </a><?php }
                        }      
        ?>

      
      <?php }?>
  </li>

  <li class="nav-item <?php if($page == "USearchJob") echo "active";?>">
    <a class="nav-link collapsed" href="USearchJob.php">
      <i class="fa fa-search"></i>
      <span>Search Job</span>
    </a>
  </li>

  <li class="nav-item <?php if($page == "UAppliedJob") echo "active";?>">
    <a class="nav-link collapsed" href="UAppliedJob.php">
      <i class="fa fa-file"></i>
      <span>Applied Job</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['user'] ?></span>
            <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <?php
          include_once "config/DB.php";
          // echo $_GET['id'];
          $query="SELECT SalaryRangeID,ApplicantDOB, ApplicantGender, ApplicantAddress, ApplicantPhone, ApplicantIdentityNo,EducationTypeID,LastEducationName,LastEducationMajor from trapplicantform a join msuser b on a.userid=b.userid where a.userid='".$_SESSION['userid']."'";

              $result=$conn->query($query);
              while($temp=$result->fetch_assoc()){
                if($temp['ApplicantDOB']==null||$temp['ApplicantGender']==null||$temp['ApplicantAddress']==null||
                                 $temp['ApplicantPhone']==null||$temp['ApplicantIdentityNo']==null||$temp['EducationTypeID'] ==null
                                 ||  $temp['LastEducationName']==null||$temp['LastEducationMajor']==null||$temp['SalaryRangeID']==null)
                              {
                                 { ?>  <a class="dropdown-item" href="UMyProfileCreate.php"><?php }
                              } else{
                                   { ?>  <a class="dropdown-item" href="UMyProfile.php"><?php }
                              }      
              ?>

            
            <?php }?>
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profile
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>