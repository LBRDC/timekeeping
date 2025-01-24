<?php
$status1 = "1";
$status2 = "0";

// Prepare and execute the statement for active locations
$stmt1 = $conn->prepare("SELECT * FROM field_location WHERE status = :loc_status");
$stmt1->bindParam(':loc_status', $status1);
$stmt1->execute();
$selActive_location = $stmt1->fetchAll(PDO::FETCH_ASSOC);

// Prepare and execute the statement for inactive locations
$stmt2 = $conn->prepare("SELECT * FROM field_location WHERE status = :loc_status");
$stmt2->bindParam(':loc_status', $status2);
$stmt2->execute();
$selInactive_location = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- &&& FIELDS LOCATION &&& -->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Fields Management</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item">Management</li>
      <li class="breadcrumb-item">Fields</li>
      <li class="breadcrumb-item active" aria-current="page">Satellite Locations</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Add Location -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <a class="btn" href="?page=fields-location-add">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="h5 mb-0 font-weight-bold text-gray-800">Add Location</div>
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

  <div class="row">
    <!-- MAPS HERE -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Satellite Location</h6>
        </div>

        <!-- Maps -->
        <div class="row m-4">
          <div class="col-md-6">
            <div class="form-row mb-2">
              <label for="view_location">Location</label>
              <select class="form-control selectpicker" id="view_location" data-live-search="true" data-style="btn-outline-light">
                <option value="">Select...</option>
                <optgroup label="Active">
                  <?php foreach ($selActive_location as $location): ?>
                    <option value="<?= $location['fld_location_id'] ?>" data-id="<?= $location['fld_location_id'] ?>" data-latitude="<?= $location['latitude'] ?>" data-longitude="<?= $location['longitude'] ?>" data-radius="<?= $location['radius'] ?>" data-status="<?= $location['status'] ?>"><?= $location['name_location'] ?></option>
                  <?php endforeach; ?>
                  <?php if (empty($selActive_location)): ?>
                    <option disabled>None</option>
                  <?php endif; ?>
                </optgroup>
                <optgroup label="Inactive">
                  <?php foreach ($selInactive_location as $location): ?>
                    <option value="<?= $location['fld_location_id'] ?>" data-id="<?= $location['fld_location_id'] ?>" data-latitude="<?= $location['latitude'] ?>" data-longitude="<?= $location['longitude'] ?>" data-radius="<?= $location['radius'] ?>" data-status="<?= $location['status'] ?>"><?= $location['name_location'] ?></option>
                  <?php endforeach; ?>
                  <?php if (empty($selInactive_location)): ?>
                    <option disabled>None</option>
                  <?php endif; ?>
                </optgroup>
              </select>
            </div>
            <input type="hidden" id="view_id" value="" readonly>
            <div class="form-row mb-2">
              <label for="view_Latitude">Latitude</label>
              <input type="number" class="form-control" id="view_Latitude" value="" readonly>
            </div>
            <div class="form-row mb-2">
              <label for="view_Longitude">Longitude</label>
              <input type="number" class="form-control" id="view_Longitude" value="" readonly>
            </div>
            <div class="form-row mb-2">
              <label for="view_Radius">Radius</label>
              <input type="number" class="form-control" id="view_Radius" value="" readonly>
            </div>
            <div class="form-row mb-4">
              <label for="view_Status">Status</label>
              <input type="text" class="form-control" id="view_Status" value="" readonly>
            </div>
            <div class="form-row mb-4">
              <div class="col-auto" id="divEdit" style="display: none;">
                <a href="javascript:void(0);" id="btnEdit" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="bottom" title="Edit">
                  <i class="fas fa-edit"></i>
                </a>
              </div>
              <div class="col-auto" id="divDisable" style="display: none;">
                <a href="javascript:void(0);" id="btnDisableLocation" class="btn btn-outline-danger" data-toggle="modal" data-target="#mdlWarnDisable" data-toggle="tooltip" data-placement="bottom" title="Disable">
                  <i class="fas fa-times-circle"></i>
                </a>
              </div>
              <div class="col-auto" id="divEnable" style="display: none;">
                <a href="javascript:void(0);" id="btnEnablelocation" class="btn btn-success" data-toggle="modal" data-target="#mdlWarnEnable" data-toggle="tooltip" data-placement="bottom" title="Enable">
                  <i class="fas fa-check-circle"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div id="mapview" style="min-height: 500px;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ### END FIELDS LOCATION ### -->