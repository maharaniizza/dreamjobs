
 
 
 <!-- Page Wrapper -->
 <div id="wrapper">

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Ccompdashboard.php">
<img src="logo.png" alt="gambar" style="width: 40px">
    <div class="sidebar-brand-text mx-3">Admin </div>
  </a>

  <hr class="sidebar-divider my-0">
  <li class="nav-item <?php if($page=="Dashboard") echo "active";?>">
    <a class="nav-link" href="Ccompdashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>     
  </li>
  <hr class="sidebar-divider">
  <li class="nav-item <?php if($page=="createjob") echo "active";?>">
    <a class="nav-link" href="Ccreatejob.php">
      <i class="fa fa-plus-circle"></i>
      <span>Create Job Listing</span></a>
  </li>
  <li class="nav-item <?php if($page=="myjoblist") echo "active";?>">
    <a class="nav-link" href="Cmyjoblist.php">
      <i class="fa fa-list-alt"></i>
      <span>My Job Listing</span></a>    
  </li>
  <li class="nav-item <?php if($page=="position") echo "active";?>">
    <a class="nav-link" href="Cpositions.php">
      <i class="fa fa-address-card"></i>
      <span>Manage Positions</span></a>     
  </li>
  <hr class="sidebar-divider">
  <li class="nav-item <?php if($page=="comprofile") echo "active";?>">
    <a class="nav-link" href="Ccomprofile.php">
      <i class="fa fa-user"></i>
      <span>My profile</span></a>
  </li>

<?php
if($_SESSION['RoleID']==3){
?>
  <li class="nav-item <?php if($page=="manageadmin") echo "active";?>">
    <a class="nav-link" href="Cmanageadmin.php">
      <i class="fa fa-cogs"></i>
      <span>Manage Admin</span></a>
  </li>
<?php }?>


  <hr class="sidebar-divider d-none d-md-block">

  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>

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

        <!-- Nav Item - Alerts -->
      
        

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['user'] ?></span>
            <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="Ccomprofile.php">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profile
            </a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="controller/logout.php" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>
    
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