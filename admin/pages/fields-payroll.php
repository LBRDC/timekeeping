<?php
$query = "SELECT fd.code, fd.name, fd.status, fd.location_id, field_location.name_location, fd.fld_payroll_id FROM `field_payrollgroup` as fd inner join field_location on field_location.fld_location_id = fd.location_id order by fld_payroll_id desc ";
$stmt = $conn->prepare($query);
$stmt->execute();
$payrollgroup = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "select * from field_location where status != 0";
$stmt = $conn->prepare($query);
$stmt->execute();
$location = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- &&& FIELDS DEPARTMENT &&& -->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Fields Management</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item">Management</li>
      <li class="breadcrumb-item">Fields</li>
      <li class="breadcrumb-item active" aria-current="page">Payroll Group</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Add Department -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <a class="btn" href="javascript:void(0);" data-toggle="modal" data-target="#mdlAddPayroll">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="h5 mb-0 font-weight-bold text-gray-800">Add Payroll</div>
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
          <h6 class="m-0 font-weight-bold text-primary">Payroll Group List</h6>
        </div>

        <!-- TABLE -->
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Location</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <!--<tfoot>
                      <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Payroll Grouping</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>-->
            <tbody>
              <?php foreach ($payrollgroup as $payroll): ?>
                <tr>
                  <td><?= $payroll['code'] ?></td>
                  <td><?= $payroll['name'] ?></td>
                  <td><?= $payroll['name_location'] ?></td>
                  <td> <?= $payroll['status'] == 1 ? "Active" : "Inactive" ?></td>
                  <td>
                    <a href="javascript:void(0);" class="btn btn-warning update_payroll_btn" data-toggle="modal" data-target="#mdlEditPayroll" data-code="<?= $payroll['code'] ?>" data-location="<?= $payroll['location_id'] ?>" data-name="<?= $payroll['name'] ?>" data-id="<?= $payroll['fld_payroll_id'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    <?php if ($payroll['status'] == 1): ?>
                      <a href="#" class="btn btn-danger disable_payroll" data-toggle="modal" data-target="#modal_DisablePayroll" data-placement="bottom" title="Disable" data-id="<?= $payroll['fld_payroll_id'] ?>" data-code="<?= $payroll['code'] ?>" data-name="<?= $payroll['name'] ?>">
                        <i class="fas fa-times-circle"></i>
                      </a>
                    <?php else: ?>
                      <a href="#" class="btn btn-success enable_payroll" data-toggle="modal" data-placement="bottom" title="Enable"
                        data-target="#modal_EnablePayroll" data-id="<?= $payroll['fld_payroll_id'] ?>" data-code="<?= $payroll['code'] ?>" data-name="<?= $payroll['name'] ?>">
                        <i class="fas fa-check-circle"></i>
                      </a>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
              <!-- <tr>
                <td>AGSD</td>
                <td>Administrative and General Services Department</td>
                <td>Active</td>
                <td>
                  <a href="javascript:void(0);" class="btn btn-info" data-toggle="modal" data-target="#mdlViewDepartment" data-toggle="tooltip" data-placement="bottom" title="View">
                    <i class="fas fa-info-circle"></i>
                  </a>
                  <a href="javascript:void(0);" class="btn btn-warning" data-toggle="modal" data-target="#mdlEditDepartment" data-toggle="tooltip" data-placement="bottom" title="Edit">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Disable">
                    <i class="fas fa-times-circle"></i>
                  </a>
                  <a href="#" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Enable">
                    <i class="fas fa-check-circle"></i>
                  </a>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div> <!-- #END# TABLE -->
      </div>
    </div>
  </div> <!-- END Row -->
  <!-- ### END FIELDS DEPARTMENT ### -->