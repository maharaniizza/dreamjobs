
 
 
 <!-- Page Wrapper -->
 <div id="wrapper">

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="compdashboard.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin </div>
  </a>

  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="Ccompdashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>     
  </li>
  <hr class="sidebar-divider">
  <li class="nav-item active">
    <a class="nav-link" href="Ccreatejob.php">
      <i class="fa fa-plus-circle"></i>
      <span>Create Job Listing</span></a>
  </li>
  <li class="nav-item active">
    <a class="nav-link" href="Cmyjoblist.php">
      <i class="fa fa-list-alt"></i>
      <span>My Job Listing</span></a>    
  </li>
  <li class="nav-item active">
    <a class="nav-link" href="Cpositions.php">
      <i class="fa fa-address-card"></i>
      <span>Manage Positions</span></a>     
  </li>
  <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link" href="Ccomprofile.php">
      <i class="fa fa-user"></i>
      <span>My profile</span></a>
  </li>

<?php
if($_SESSION['RoleID']==3){
?>
  <li class="nav-item">
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

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['user'] ?></span>
            <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profile
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
              Settings
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
              Activity Log
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