
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
                          <option>LBRDC Head Office</option>
                      </select>
                    </div>
                    <div class="form-row mb-2">
                      <label for="view_Latitude">Latitude</label>
                      <input type="text" class="form-control" id="view_Longitude" value="123.456" readonly>
                    </div>
                    <div class="form-row mb-2">
                      <label for="view_Longitude">Longitude</label>
                      <input type="text" class="form-control" id="view_Longitude" value="123.456" readonly>
                    </div>
                    <div class="form-row mb-2">
                      <label for="view_Latitude">Radius</label>
                      <input type="text" class="form-control" id="view_Longitude" value="123.456" readonly>
                    </div>
                    <div class="form-row mb-4">
                      <label for="view_Status">Status</label>
                      <input type="text" class="form-control" id="view_Status" value="Active" readonly>
                    </div>
                    <div class="form-row mb-4">
                      <div class="col-auto">
                          <a href="javascript:void(0);" class="btn btn-warning" data-toggle="modal" data-target="#mdlEditDepartment" data-toggle="tooltip" data-placement="bottom" title="Edit">
                              <i class="fas fa-edit"></i>
                          </a>
                      </div>
                      <div class="col-auto">
                          <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Disable">
                              <!--<i class="fas fa-trash"></i>-->
                              <i class="fas fa-times-circle"></i>
                          </a>
                      </div>
                      <div class="col-auto">
                          <a href="#" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Enable">
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
        