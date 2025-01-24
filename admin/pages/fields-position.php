<?php
$query = "SELECT * FROM `field_position`";
$stmt = $conn->prepare($query);
$stmt->execute();
$position = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!-- &&& FIELDS POSITION &&& -->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Fields Management</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item">Management</li>
      <li class="breadcrumb-item">Fields</li>
      <li class="breadcrumb-item active" aria-current="page">Position</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Add Position -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <a class="btn" href="javascript:void(0);" data-toggle="modal" data-target="#mdlAddPosition">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="h5 mb-0 font-weight-bold text-gray-800">Add Position</div>
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
          <h6 class="m-0 font-weight-bold text-primary">Position List</h6>
        </div>

        <!-- TABLE -->
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Daily Rate</th>
                <th>Monthly Rate</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($position as $list): ?>
                <tr>
                  <td><?= $list['code'] ?></td>
                  <td><?= $list['name'] ?></td>
                  <td><?= $list['description'] ?></td>
                  <td><?= $list['dailyRate'] ?></td>
                  <td><?= $list['monthlyRate'] ?></td>
                  <td><?= $list['status'] == 1 ? "Active" : "Inactive" ?></td>
                  <td>
                    <a href="javascript:void(0);" class="btn btn-warning update_position" data-toggle="modal" data-target="#mdlEditPosition" data-toggle="tooltip" data-placement="bottom" title="Edit" data-id="<?= $list['fld_position_id'] ?>" data-code="<?= $list['code'] ?>" data-name="<?= $list['name'] ?>" data-daily="<?= $list['dailyRate'] ?>" data-monthly="<?= $list['monthlyRate'] ?>" data-description="<?= $list['description'] ?>">
                      <i class="fas fa-edit"></i>
                    </a>
                    <?php if ($list['status'] == 1): ?>
                      <a href="javascript:void(0);" class="btn btn-danger disable_position" data-name=<?= $list['name'] ?> data-id="<?= $list['fld_position_id'] ?>" data-toggle="modal" data-target="#modal_DisablePos" data-placement="bottom" title="Disable">
                        <i class="fas fa-times-circle"></i>
                      </a>
                    <?php else: ?>
                      <a href="javascript:void(0);" class="btn btn-success enable_position" data-name=<?= $list['name'] ?> data-id="<?= $list['fld_position_id'] ?>" data-toggle="modal" data-target="#modal_EnablePos" data-placement="bottom" title="Enable">
                        <i class="fas fa-check-circle"></i>
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