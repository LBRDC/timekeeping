<?php
$query = "SELECT * FROM field_schedule";
$stmt = $conn->prepare($query);
$stmt->execute();
$schedule = $stmt->fetchAll(PDO::FETCH_ASSOC);


function formatTime($time24hr)
{
  $time12hr = date("g:i A", strtotime($time24hr));
  return $time12hr;
}
?>


<!-- &&& FIELDS POSITION &&& -->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Fields Management</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item">Management</li>
      <li class="breadcrumb-item">Fields</li>
      <li class="breadcrumb-item active" aria-current="page">Schedule</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Add Position -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <a class="btn" href="javascript:void(0);" data-toggle="modal" data-target="#mdlAddSchedule">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="h5 mb-0 font-weight-bold text-gray-800">Add Schedule</div>
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
          <h6 class="m-0 font-weight-bold text-primary">Schedule List</h6>
        </div>

        <!-- TABLE -->
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>CODE</th>
                <th>CHECK IN</th>
                <th>CHECK OUT</th>
                <th>STATUS</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($schedule as $list): ?>
                <tr>
                  <td><?= $list['code'] ?></td>
                  <td><?= formatTime($list['check_in']) ?></td>
                  <td><?= formatTime($list['check_out']) ?></td>
                  <td><?= $list['status'] == 1 ? "Active" : "Inactive" ?></td>
                  <td>
                    <a href="javascript:void(0);" class="btn btn-warning update_schedule_btn" data-toggle="modal" data-target="#mdlEditSchedule" data-toggle="tooltip" data-placement="bottom" title="Edit" data-id="<?= $list['fld_schedule_id'] ?>" data-code="<?= $list['code'] ?>" data-checkin="<?= $list['check_in'] ?>" data-checkout="<?= $list['check_out'] ?>">
                      <i class="fas fa-edit"></i>
                    </a>
                    <?php if ($list['status'] == 1): ?>
                      <a href="#" class="btn btn-danger disable_sched" data-toggle="modal" data-id="<?= $list['fld_schedule_id'] ?>" data-code="<?= $list['code'] ?>" data-target="#modal_DisableSched" data-placement="bottom" title="Disable">
                        <i class="fas fa-times-circle"></i>
                      </a>
                    <?php else: ?>
                      <a href="#" class="btn btn-success enable_sched" data-toggle="modal" data-toggle="modal" data-id="<?= $list['fld_schedule_id'] ?>" data-code="<?= $list['code'] ?>" data-placement="bottom" title="Enable"
                        data-target="#modal_EnableSched">
                        <i class=" fas fa-check-circle"></i>
                      </a>
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
  <!-- ### END FIELDS POSITION ### -->