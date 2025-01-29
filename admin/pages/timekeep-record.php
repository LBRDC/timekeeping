<?php
$query = 'SELECT att.check_in, att.check_out, att.break_in, att.break_out, att.ot_in, att.ot_out, att.timestamps, ma.Employee, concat(emp.firstname, " ",emp.lastname) as name  FROM `employee_attendance` as att inner join mobile_account as ma on ma.accountID = att.accountID inner join employees as emp on emp.idnumber = ma.Employee order by att.timestamps desc';
$stmt = $conn->prepare($query);
$stmt->execute();
$attendance = $stmt->fetchAll(PDO::FETCH_ASSOC);


$query = "SELECT * FROM `field_location` where status != 0";
$stmt = $conn->prepare($query);
$stmt->execute();
$location = $stmt->fetchAll(PDO::FETCH_ASSOC);


$query = "SELECT * FROM `field_department` where status !=0";
$stmt = $conn->prepare($query);
$stmt->execute();
$department = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM `field_payrollgroup` where status != 0";
$stmt = $conn->prepare($query);
$stmt->execute();
$payroll = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($payroll);
// exit();
function validate($data)
{
  return $data == null ? 'N/A' : date('H:i', $data);
}
?>
<!-- &&& TIMEKEEP RECORD &&& -->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daily Time Records</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item">Management</li>
      <li class="breadcrumb-item">Timekeeping</li>
      <li class="breadcrumb-item active" aria-current="page">Daily Time Records</li>
    </ol>
  </div>

  <div class="row">
    <!-- CONTENT HERE -->
    <div class="card w-100 p-4 d-flex align-items-center justify-content-between flex-row">
      <div class="col-md-2 ">
        <select class="form-control custom-select-location" name="dtr_location" id="dtr_location">
          <option value="" selected disabled>Select Location...</option>
          <?php foreach ($location as $loc): ?>
            <option value="<?= $loc['fld_location_id'] ?>"><?= $loc['name_location'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-2 ">
        <select class="form-control custom-select-location" name="payroll_group" id="payroll_group">
          <option value="" selected disabled>Select Payroll...</option>
          <?php foreach ($payroll as $list): ?>
            <!-- <option value="<?= $list['fld_payroll_id'] ?>"><?= $list['code'] . " : " . $list['name'] ?></option> -->
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-2 ">
        <select class="form-control custom-select-department" name="dtr_department" id="dtr_department">
          <option value="" selected disabled>Select Department...</option>
          <?php foreach ($department as $dept): ?>
            <!-- <option value="<?= $dept['fld_dept_id'] ?>"><?= $dept['code'] . " : " . $dept['name'] ?></option> -->
          <?php endforeach; ?>
        </select>
      </div>



      <div class="col-md-2">
        <input type="date" class="form-control" id="dtr_startdate" placeholder="Select Date">
      </div>
      <div class="col-md-2">
        <input type="date" class="form-control" id="dtr_endDate" placeholder="Select Date">
      </div>
      <div class="col-md-2">
        <button class="btn btn-primary w-100" id="load_dtremployee_btn" data-toggle="modal">Load Employee</button>
      </div>
    </div>
  </div>


  <div class="row mt-4">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Attendance Logs</h6>
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
          </style>
          <table class="table align-items-center table-flush table-hover" id="dtr_table">
            <thead class="thead-light">
              <tr>
                <th>ID NUMBER</th>
                <th>NAME</th>
                <th>DATE</th>
                <th>DAY</th>
                <th>CHECK IN</th>
                <th>BREAK OUT</th>
                <th>BREAK IN</th>
                <th>CHECK OUT</th>
                <th>OT IN</th>
                <th>OT OUT</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($attendance as $list) {
                echo '<tr>';
                echo '<td>' . $list['Employee'] . '</td>';
                echo '<td>' . $list['name'] . '</td>';
                echo '<td>' . $list['timestamps'] . '</td>';
                echo '<td>' . date('l', strtotime($list['timestamps'])) . '</td>';
                echo '<td>' . validate($list['check_in']) . '</td>';
                echo '<td>' . validate($list['break_out']) . '</td>';
                echo '<td>' . validate($list['break_in']) . '</td>';
                echo '<td>' . validate($list['check_out']) . '</td>';
                echo '<td>' . validate($list['ot_in']) . '</td>';
                echo '<td>' . validate($list['ot_out']) . '</td>';
                echo '</tr>';
              }
              ?>
            </tbody>
          </table>
        </div> <!-- #END# TABLE -->
      </div>
    </div>
  </div> <!-- END Row -->
  <!-- ### END EMPLOYEE MANAGE ### -->