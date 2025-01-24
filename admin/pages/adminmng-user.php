<?php

?>
<!-- &&& EMPLOYEE MANAGE &&& -->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User Account</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item">Administrator</li>
      <li class="breadcrumb-item">Management</li>
      <li class="breadcrumb-item active" aria-current="page">Mobile Users Account</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Add Employee -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <a class="btn" href="javascript:void(0);" data-toggle="modal" data-target="#mobile_addEmployee">
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

    <!-- Import Employee -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <a class="btn" href="javascript:void(0);" data-toggle="modal" data-target="#mdlImport">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Import Excel</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-plus-circle fa-2x text-success"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div> -->
  </div>


  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Employee Records</h6>
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
                <th>ACCOUNT LEVEL</th>
                <th>PASSWORD</th>
                <th>STATUS</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div> <!-- #END# TABLE -->
      </div>
    </div>
  </div> <!-- END Row -->
  <!-- ### END EMPLOYEE MANAGE ### -->