<?php
$create_date = new DateTime("now", new DateTimeZone("Asia/Taipei"));
$date = $create_date->format("m-d-Y");
$query = "select count(*) as total from employee_attendance where timestamps='$date'";
$stmt = $conn->prepare($query);
$stmt->execute();
$onDuty = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "select count(*) as total from field_location";
$stmt = $conn->prepare($query);
$stmt->execute();
$locations = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "select count(*) as total from employees";
$stmt = $conn->prepare($query);
$stmt->execute();
$employees = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!-- &&& DASHBOARD &&& -->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
  </div>

  <div class="row mb-3"> <!-- main row -->
    <div class="col-md-6">
      <!-- Date and Time -->
      <div class="col-xl-12 col-md-12 mb-4">
        <div class="card h-100 card-bg">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="h3 mb-0 font-weight-bold text-white" id="currentDate"></div>
                <div class="h3 mb-0 font-weight-bold text-white" id="currentTime"></div>
                <div class="h3 mb-0 font-weight-bold text-white" id="currentDay"></div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- #END# Date and Time -->
    </div>
    <div class="col-md-6">
      <div class="row"> <!-- row 1 -->
        <!-- On Duty -->
        <div class="col-xl-6 col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">On Duty</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $onDuty['total'] ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-user-clock fa-2x text-success"></i>
                </div>
              </div>
            </div>
          </div>
        </div><!-- #END# On Duty -->
        <!-- All Employees -->
        <div class="col-xl-6 col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Total Employees</div>
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $employees['total'] ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-info"></i>
                </div>
              </div>
            </div>
          </div>
        </div><!-- #END# All Employees -->
      </div>
      <div class="row"> <!-- row 2 -->
        <!-- Location -->
        <div class="col-xl-6 col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Satellite Locations</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $locations['total'] ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-map-marked-alt fa-2x text-warning"></i>
                </div>
              </div>
            </div>
          </div>
        </div><!-- #END# Location -->
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-md-6">
      <!-- On Duty Today CHART -->
    </div>
  </div>
  <!-- ### END DASHBOARD ### -->