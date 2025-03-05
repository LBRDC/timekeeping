<?php

$query = "SELECT * FROM field_department";
$stmt = $conn->prepare($query);
$stmt->execute();
$departments = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM field_position";
$stmt = $conn->prepare($query);
$stmt->execute();
$position = $stmt->fetchAll(PDO::FETCH_ASSOC);


$query = "SELECT * FROM field_location";
$stmt = $conn->prepare($query);
$stmt->execute();
$location = $stmt->fetchAll(PDO::FETCH_ASSOC);


$query = "SELECT * FROM field_payrollgroup";
$stmt = $conn->prepare($query);
$stmt->execute();
$payrollgroup = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM field_schedule";
$stmt = $conn->prepare($query);
$stmt->execute();
$schedules = $stmt->fetchAll(PDO::FETCH_ASSOC);


$query = "select emp.id, emp.idnumber, emp.firstname, emp.lastname, fd.name as department, fl.name_location as location from employees as emp inner join field_department as fd on fd.fld_dept_id = emp.department inner join field_location as fl on fl.fld_location_id = emp.location";
$stmt = $conn->prepare($query);
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

function formatTime($time24hr)
{
  $time12hr = date("g:i A", strtotime($time24hr));
  return $time12hr;
}
$user = $_SESSION['user'];
$E_ADD = $user['employee_add'];
$E_EDIT = $user['employee_edit'];
$E_DELETE = $user['employee_delete'];

?>

<!-- &&& EMPLOYEE MANAGE &&& -->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Employee Management</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item">Management</li>
      <li class="breadcrumb-item">Employees</li>
      <li class="breadcrumb-item active" aria-current="page">Employee Records</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Add Employee -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <?php if ($E_ADD == 1) : ?>
          <a class="btn " href="javascript:void(0);" data-toggle="modal" data-target="#mdlAddEmployee">
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
        <?php else : ?>
          <a class="btn disabled" href="javascript:void(0);">
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
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Employee Records</h6>
        </div>

        <!-- TABLE -->
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>Employee No.</th>
                <th>Name</th>
                <th>Department</th>
                <th>Location</th>
                <th>Action</th>
              </tr>
            </thead>
            <!--<tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                      </tr>
                    </tfoot>-->
            <tbody>
              <?php foreach ($employees as $employee) : ?>
                <tr>
                  <td><?= $employee['idnumber'] ?></td>
                  <td><?= $employee['firstname'] . ' ' . $employee['lastname'] ?></td>
                  <td><?= $employee['department'] ?></td>
                  <td><?= $employee['location'] ?></td>
                  <td>
                    <?php if ($E_EDIT == "1") : ?>
                      <a href="javascript:void(0);" data-toggle="modal" data-target="#mdlEditEmployee" data-id="<?= $employee['id'] ?>" class="btn btn-md btn-warning emps_edit"> <i class="fas fa-edit"></i></a>
                    <?php endif; ?>
                    <?php if ($E_DELETE == "1") : ?>
                      <a href="javascript:void(0);" data-toggle="modal" data-target="#mdlDeleteEmployee" data-id="<?= $employee['id'] ?>" class="btn btn-md btn-danger emps_delete"><i class="fas fa-trash"></i></a>
                    <?php endif; ?>

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