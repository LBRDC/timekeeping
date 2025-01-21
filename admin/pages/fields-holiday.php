<?php
$query = "SELECT * FROM `field_holiday` order by id desc";
$stmt = $conn->prepare($query);
$stmt->execute();
$holidays = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- &&& FIELDS DEPARTMENT &&& -->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Fields Management</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item">Management</li>
      <li class="breadcrumb-item">Fields</li>
      <li class="breadcrumb-item active" aria-current="page">Holiday</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Add Department -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <a class="btn" href="javascript:void(0);" data-toggle="modal" data-target="#mdlAddHoliday">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="h5 mb-0 font-weight-bold text-gray-800">Add Holiday</div>
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
          <h6 class="m-0 font-weight-bold text-primary">Holiday List</h6>
        </div>

        <!-- TABLE -->
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>Date</th>
                <th>Name</th>
                <!--<th>Payroll Grouping</th>-->
                <th>Type</th>
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
              <?php foreach ($holidays as $holiday): ?>
                <tr>
                  <td><?= $holiday['date'] ?></td>
                  <td><?= $holiday['name'] ?></td>
                  <td> <?= $holiday['type'] ?></td>
                  <td>
                    <!-- <a href="javascript:void(0);" class="btn btn-warning update_holiday_btn" data-toggle="modal" data-target="#mdlEditDepartment" data-code="<?= $holiday['code'] ?>" data-name="<?= $holiday['name'] ?>" data-id="<?= $holiday['fld_dept_id'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a> -->
                    <a href="#" class="btn btn-danger delete_holiday_btn" data-toggle="modal" data-target="#mdldeletHoliday" data-placement="bottom" title="Disable" data-id="<?= $holiday['id'] ?>" data-name="<?= $holiday['name'] ?>">
                      <i class="fas fa-times-circle"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
              <!-- <tr>
                <td>01/01/2025</td>
                <td>New Year</td>
                <td>Legal</td>
                <td>
                  <a href="javascript:void(0);" class="btn btn-warning" data-toggle="modal" data-target="#mdlEditDepartment" data-toggle="tooltip" data-placement="bottom" title="Edit">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Disable">
                    <i class="fas fa-times-circle"></i>
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