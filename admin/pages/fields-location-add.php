
<!-- &&& FIELDS LOCATION ADD &&& -->  
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Fields Management</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item">Management</li>
              <li class="breadcrumb-item">Fields</li>
              <li class="breadcrumb-item"><a href="home.php?page=fields-location">Satellite Location</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Location</li>
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
                  <h6 class="m-0 font-weight-bold text-primary">Add Location</h6>
                </div>

                <!-- Maps -->
                <div class="row m-4">
                  <div class="col-xl-6 col-md-6 col-12">
                    <form id="addLocationFrm" method="post">
                      <div class="form-row mb-4">
                          <label for="add_LocName">Name<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="add_LocName" required>
                      </div>

                      <div class="form-row">
                          <label>Instructions: Interact with the map to fill the information below.</label>
                      </div>
                      <div class="form-row mb-2">
                          <label for="add_Latitude">Latitude<span class="text-danger">*</span></label>
                          <input type="number" step="any" class="form-control" id="add_Latitude" required readonly>
                      </div>
                      <div class="form-row mb-2">
                          <label for="add_Longitude">Longitude<span class="text-danger">*</span></label>
                          <input type="number" step="any" class="form-control" id="add_Longitude" required readonly>
                      </div>
                      <div class="form-row mb-4">
                          <label for="add_Radius">Radius<span class="text-danger">*</span></label>
                          <input type="number" step="any" class="form-control" id="add_Radius" required readonly>
                      </div>
                      <div class="col-auto">
                          <div class="form-group" align="right">
                              <button type="submit" class="btn btn-primary">Add</button>
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
<!-- ### END FIELDS LOCATION ADD ### -->
