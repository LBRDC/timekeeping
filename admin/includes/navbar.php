<?php
// Active Page
if (!isset($_GET['page'])) {
  $activePage = 'home';
  $page = 'null';
} else {
  $activePage = $_GET['page'];
  switch ($activePage) {
    case 'employee-manage':
      $page = 'employee';
      break;
    case 'timekeep-record':
      $page = 'timekeep';
      break;
    case 'timekeep-report':
      $page = 'timekeep';
      break;
    case 'fields-department':
      $page = 'fields';
      break;
    case 'fields-position':
      $page = 'fields';
      break;
    case 'fields-payroll':
      $page = 'fields';
      break;
    case 'fields-location':
      $page = 'fields';
      break;
    case 'fields-location-add':
      $page = 'fields';
      break;
    case 'fields-schedule':
      $page = 'fields';
      break;
    case 'fields-holiday':
      $page = 'fields';
      break;
    case 'adminMng-user':
      $page = 'adminMng';
      break;
    case 'manning-list':
      $page = 'manninglist';
      break;
    default:
      // None
      break;
  }
}
// for nav-item/collapse-item assign to class: active
// for collapse assign to class: show
?>

<!-- &&& NAVBAR &&& -->
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <!-- Sidebar Logo -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
        <div class="sidebar-brand-icon">
          <img src="img/logo/lbrdc-logo-rnd.webp">
        </div>
        <div class="sidebar-brand-text mx-3">Timekeeping</div>
      </a>
      <hr class="sidebar-divider my-0">
      <!-- NAV: Dashboard -->
      <li class="nav-item <?php if ($activePage == 'home') {
        echo 'active';
      } ?>">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Management
      </div>
      <!-- NAV: Employee Management -->
      <li class="nav-item <?php if ($page == 'employee') {
        echo 'active';
      } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-user-tie"></i>
          <span>Employees</span>
        </a>
        <div id="collapseBootstrap" class="collapse <?php if ($page == 'employee') {
          echo 'show';
        } ?>" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Employees</h6>
            <a class="collapse-item <?php if ($activePage == 'employee-manage') {
              echo 'active';
            } ?>" href="?page=employee-manage">Employee Records</a>
          </div>
        </div>
      </li>
      <!-- NAV: Timekeeping Management -->
      <li class="nav-item <?php if ($page == 'timekeep') {
        echo 'active';
      } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="far fa-calendar-alt"></i>
          <span>Timekeeping</span>
        </a>
        <div id="collapseForm" class="collapse <?php if ($page == 'timekeep') {
          echo 'show';
        } ?>" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Timekeeping</h6>
            <a class="collapse-item <?php if ($activePage == 'timekeep-record') {
              echo 'active';
            } ?>" href="?page=timekeep-record">Daily Time Records</a>
            <a class="collapse-item <?php if ($activePage == 'timekeep-report') {
              echo 'active';
            } ?>" href="?page=timekeep-report">Timekeeping Reports</a>
          </div>
        </div>
      </li>
      <!-- NAV: Fields Management -->
      <li class="nav-item <?php if ($page == 'fields') {
        echo 'active';
      } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-list-ul"></i>
          <span>Fields</span>
        </a>
        <div id="collapseTable" class="collapse <?php if ($page == 'fields') {
          echo 'show';
        } ?>" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Fields</h6>
            <a class="collapse-item <?php if ($activePage == 'fields-department') {
              echo 'active';
            } ?>" href="?page=fields-department">Department</a>
            <a class="collapse-item <?php if ($activePage == 'fields-position') {
              echo 'active';
            } ?>" href="?page=fields-position">Position</a>
            <a class="collapse-item <?php if ($activePage == 'fields-payroll') {
              echo 'active';
            } ?>" href="?page=fields-payroll">Payroll Grouping</a>
            <a class="collapse-item <?php if ($activePage == 'fields-location' || $activePage == 'fields-location-add') {
              echo 'active';
            } ?>" href="?page=fields-location">Satellite Locations</a>
            <a class="collapse-item <?php if ($activePage == 'fields-schedule') {
              echo 'active';
            } ?>" href="?page=fields-schedule">Schedules</a>
            <a class="collapse-item <?php if ($activePage == 'fields-holiday') {
              echo 'active';
            } ?>" href="?page=fields-holiday">Holidays</a>
          </div>
        </div>
      </li>
        <!-- NAV: Manninglist Management -->
      <li class="nav-item <?php if ($page == 'manning-list') {
        echo 'active';
      } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseManninglist"
          aria-expanded="true" aria-controls="collapseManninglist">
          <i class="fas fa-user-tie"></i>
          <span>Manninglist</span>
        </a>
        <div id="collapseManninglist" class="collapse <?php if ($page == 'employee') {
          echo 'show';
        } ?>" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Employees</h6>
            <a class="collapse-item <?php if ($activePage == 'manning-list') {
              echo 'active';
            } ?>" href="?page=manning-list">Employee List</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Administrator
      </div>
      <!-- NAV: User Management -->
      <li class="nav-item <?php if ($page == 'adminMng') {
        echo 'active';
      } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-user-shield"></i>
          <span>Management</span>
        </a>
        <div id="collapsePage" class="collapse <?php if ($page == 'adminMng') {
          echo 'show';
        } ?>" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Management</h6>
            <a class="collapse-item <?php if ($activePage == 'adminMng-user') {
              echo 'active';
            } ?>" href="?page=adminMng-user">Users</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="version">v0.0.1-alpha</div>
    </ul> <!-- #END# Sidebar -->

    
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3 text-light ">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- USER: User -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/<?php if (isset($_SESSION['user']['admin_img']) && !empty($_SESSION['user']['admin_img'])) {
                  echo $_SESSION['user']['admin_img'];
                } else {
                  echo 'admin_user.webp';
                } ?>" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?php if (isset($_SESSION['user']['admin_name'])) {
                  echo $_SESSION['user']['admin_name'];
                } else {
                  echo 'User';
                } ?></span>
              </a>
              <!-- USER: Dropdown -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <!-- Logout -->
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav> <!-- #END# Topbar -->
<!-- ### END NAVBAR ### -->