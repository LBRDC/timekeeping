<?php

$fieldLocation = $conn->prepare("SELECT * FROM field_location");
$fieldLocation->execute();
$location = $fieldLocation->fetchAll(PDO::FETCH_ASSOC);


// $employeesQuery = $conn->prepare("SELECT * FROM employee_tbl WHERE emp_status = '1'");
// $employeesQuery->execute();
// $employees = $employeesQuery->fetchAll(PDO::FETCH_ASSOC);

$emptbl_query = "select e.idnumber, concat(e.lastname, ', ', e.firstname) as name, l.name_location, m.accountID, m.Email, m.Password, m.Status from mobile_account as m INNER JOIN employees as e on e.IdNumber = m.Employee INNER JOIN field_location as l on l.fld_location_id = e.location";
$emp_tbl = $conn->prepare($emptbl_query);
$emp_tbl->execute();
$employees_tbl = $emp_tbl->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- &&& EMPLOYEE MANAGE &&& -->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Mobile User Configuration</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item">Administrator</li>
      <li class="breadcrumb-item">Management</li>
      <li class="breadcrumb-item active" aria-current="page">Mobile Users Account</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Add Employee -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <a class="btn" href="javascript:void(0);" data-toggle="modal" data-target="#mobile_addEmployee">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="h5 mb-0 font-weight-bold text-gray-800">Add Employee</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-plus-circle fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>

    <!-- Import Employee -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <a class="btn" href="javascript:void(0);" data-toggle="modal" data-target="#mdlImport">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Import Excel</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-plus-circle fa-2x text-success"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div> -->
  </div>


  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Employee Records</h6>
          <!-- <div class="">
                     <button class="btn btn-primary" data-toggle="modal" data-target="#filterTableData">Filter Data</button>
                      <button class="btn btn-primary" data-toggle="modal" data-target="#filterTableColumn">Filter Column</button>
                 </div> -->
        </div>

        <!-- TABLE -->
        <div class="table-responsive p-3">
          <style>
            th {
              white-space: nowrap;
            }

            /* @media print {
      table {
        page-break-inside: auto;
      }
      tr {
        page-break-inside: avoid;
        page-break-after: auto;
      }
      th, td {
        white-space: nowrap;
      }
    } */
          </style>
          <table class="table align-items-center table-flush table-hover" id="mobileUserTable">
            <thead class="thead-light">
              <tr>
                <th>ID NUMBER</th>
                <th>EMPLOYEE NAME</th>
                <th>LOCATION</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
                <th>STATUS</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($employees_tbl as $emp) {
                $pw = $emp['Password'] == 'cea0cc97fbc0829268790a1773ee637416b3611f2e1c2c4825a186486fa1c4c9' ? '<span class="badge badge-secondary p-2">DEFAULT</span>' : '<span class="badge badge-success p-2">UPDATED</span>';
                $status = $emp['Status'] == 1 ? '<span class="badge badge-success p-2">ACTIVE</span>' : '<span class="badge badge-danger p-2">INACTIVE</span>';
                $email = $emp['Email'] == '' ? '<span class="badge badge-secondary p-2">NO EMAIL</span>' : $emp['Email'];
                echo '<tr>';
                echo '<td>' . $emp['idnumber'] . '</td>';
                echo '<td>' . $emp['name'] . '</td>';
                echo '<td>' . $emp['name_location'] . '</td>';
                echo '<td>' . $email . '</td>';
                echo '<td>' . $pw . '</td>';
                echo '<td>' . $status . '</td>';
                echo '<td><div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group btn-group-sm" role="group" aria-label="First group">
    <button type="button" class="btn btn btn-info acc_reset" title="Reset Password"  data-toggle="modal" data-target="#mdl_reset_mobile_user" data-id="' . $emp['accountID'] . '" data-name="' . $emp['name'] . '"> <i class="fas fa-lock-open"></i></button>';

                if ($emp['Status'] == 1) {
                  echo '<button type="button" class="btn btn btn-danger acc_disable" title="Inactive"  data-toggle="modal" data-target="#mdl_disable_mobile_user" data-id="' . $emp['accountID'] . '" data-name="' . $emp['name'] . '"> <i class="fas fa-times-circle"></i></button>';
                } else {
                  echo ' <button type="button" class="btn btn btn-success acc_enable" title="Active"  data-toggle="modal" data-target="#mdl_enabled_mobile_user" data-id="' . $emp['accountID'] . '" data-name="' . $emp['name'] . '"> <i class="fas fa-check-circle"></i></button>';
                }
                echo '</div> </div></td>';
                echo '</tr>';
              }
              ?>
            </tbody>
          </table>
        </div> <!-- #END# TABLE -->
      </div>
    </div>
  </div> <!-- END Row -->
  <!-- ### END EMPLOYEE MANAGE ### -->