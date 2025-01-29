<?php
$query = "SELECT emp.idnumber, concat(emp.lastname, ' ', emp.firstname) as name, emp.position as positionid, fp.name as position   FROM `employees` as emp inner join field_position as fp on fp.fld_position_id = emp.position";
$stmt = $conn->prepare($query);
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT emp.idnumber, concat(emp.firstname,' ',emp.lastname) as name, au.admin_username as username, fp.name as position  FROM `employees` as emp inner join admin_users as au on au.employee = emp.idnumber inner join field_position as fp on fp.fld_position_id = emp.position";
$stmt = $conn->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- &&& EMPLOYEE MANAGE &&& -->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User Account</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item">Administrator</li>
      <li class="breadcrumb-item">Management</li>
      <li class="breadcrumb-item active" aria-current="page">Users Account</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Add Employee -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <a class="btn" href="javascript:void(0);" data-toggle="modal" data-target="#addEmployee_user">
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
  </div>


  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">User List</h6>
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
                <th>POSITION</th>
                <th>USERNAME</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user): ?>
                <tr>
                  <td><?= $user['idnumber'] ?></td>
                  <td><?= $user['name'] ?></td>
                  <td><?= $user['position'] ?></td>
                  <td><?= $user['username'] ?></td>
                  <td>
                    <a href="javascript:void(0);" class="btn btn-danger btn-circle btn-sm deleteUser" data-toggle="modal" data-id="<?= $user['idnumber'] ?>">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div> <!-- #END# TABLE -->
      </div>
    </div>
  </div> <!-- END Row -->
  <!-- ### END EMPLOYEE MANAGE ### -->