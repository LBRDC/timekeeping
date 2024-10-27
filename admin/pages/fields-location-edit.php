
<?php
$id = $_GET['id'];
// Prepare and execute the statement for active locations
$stmt1 = $conn->prepare("SELECT * FROM field_location WHERE fld_location_id = :id");
$stmt1->bindParam(':id', $id);
$stmt1->execute();
$edit_location = $stmt1->fetch(PDO::FETCH_ASSOC);
?>

<!-- &&& FIELDS LOCATION EDIT &&& -->  
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Fields Management</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item">Management</li>
              <li class="breadcrumb-item">Fields</li>
              <li class="breadcrumb-item"><a href="home.php?page=fields-location">Satellite Location</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Location</li>
            </ol>
          </div>

          <div class="row mb-3">
            <div class="col-xl-3 col-md-6">
                <a href="?page=fields-location" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Back</span>
                  </a>
            </div>
          </div>
          
          <div class="row">
            <!-- MAPS HERE -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Location</h6>
                </div>

                <!-- Maps -->
                <div class="row m-4">
                  <div class="col-xl-6 col-md-6 col-12">
                    <form id="editLocationFrm" method="post">
                      <input type="hidden" id="edit_id" value="<?php echo $edit_location['fld_location_id']; ?>">
                      <div class="form-row mb-4">
                          <label for="edit_LocName">Name<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="edit_LocName" value="<?php echo $edit_location['name_location']; ?>" required>
                      </div>

                      <div class="form-row">
                          <label>Instructions: Interact with the map to edit the information below.</label>
                      </div>
                      <div class="form-row mb-2">
                          <label for="edit_Latitude">Latitude<span class="text-danger">*</span></label>
                          <input type="number" step="any" class="form-control" id="edit_Latitude" value="<?php echo $edit_location['latitude']; ?>" required readonly>
                      </div>
                      <div class="form-row mb-2">
                          <label for="edit_Longitude">Longitude<span class="text-danger">*</span></label>
                          <input type="number" step="any" class="form-control" id="edit_Longitude" value="<?php echo $edit_location['longitude']; ?>" required readonly>
                      </div>
                      <div class="form-row mb-2">
                          <label for="edit_Radius">Radius<span class="text-danger">*</span></label>
                          <input type="number" step="any" class="form-control" id="edit_Radius" value="<?php echo $edit_location['radius']; ?>" required readonly>
                      </div>
                      <div class="form-row mb-4">
                        <label for="edit_Status">Status<span class="text-danger">*</span></label>
                          <select class="form-control selectpicker" id="edit_Status" data-style="btn-outline-light">
                              <option value="" disabled>Select</option>
                              <option value="active" <?php if ($edit_location['status'] == 'active') {
                                echo 'selected';
                              } ?>>Active</option>
                              <option value="inactive" <?php if ($edit_location['status'] == 'inactive') {
                                echo 'selected';
                              } ?>>Inactive</option>
                          </select>
                      </div>
                      <div class="col-auto">
                          <div class="form-group" align="right">
                              <button type="submit" class="btn btn-warning">Update</button>
                          </div> 
                      </div>
                    </form>
                  </div>
                  <div class="col-xl-6 col-md-6 col-12">
                    <div class="form-row mb-4">
                        <label for="search_Location">Search</label>
                        <input type="text" class="form-control" id="search_Location">
                    </div>
                    <div id="map" style="min-height: 500px;"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<!-- ### END FIELDS LOCATION EDIT ### -->
