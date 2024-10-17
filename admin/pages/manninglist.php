<?php

//DB COLUMN
$dbquery = "SHOW COLUMNS FROM lbrdc_tk.employee_tbl";
$dbstmt = $conn->prepare($dbquery);
$dbstmt->execute();
$dbresult = $dbstmt->fetchAll(PDO::FETCH_ASSOC);
$defaultDbCol = ["IdNumber", "FirstName", "MiddleName", "LastName"];
$dbcolumns = [];
$logicalArr = [];
// $logicalStmt = isset($_SESSION['filterdata']) ? " where " . implode(" ", $_SESSION['filterdata']) : "";
if (isset($_SESSION['filterdata'])) {
  foreach ($_SESSION['filterdata'] as $item) {
    $logicalArr[] = $item['logic'] . " " . $item['column'] . " " . $item['operator'] . " " . "'" . $item['value'] . "'";
  }
  if (empty($_SESSION['filterdata'])) {
    $logicalArr = "";
  }
}
$logicalStmt = empty($logicalArr) ? "" : " where " . implode(" ", $logicalArr);
// var_dump($_SESSION['filterdata']);
// echo "<br>";
// echo "<br>";
// echo "<br>";

// exit();
foreach ($dbresult as $val) {
  if ($val['Field'] != "emp_id" && $val['Field'] != "emp_timestamp" && $val['Field'] != "emp_created" && $val['Field'] != "FirstName" && $val['Field'] != "MiddleName" && $val['Field'] != "LastName" && $val['Field'] != "IdNumber") {
    $dbcolumns[] = $val['Field'];
    $defaultDbCol[] = $val['Field'];
  }

}
// var_dump($dbresult);
// echo ;
$headerResultTemplate = ["IdNumber", "Name"];
$columnTemplate = ["IdNumber", "concat(IFNULL(LastName, ''),', ', IFNULL(FirstName, ''), ' ', IFNULL(MiddleName, '')) as Name"];
if (!array_search("IdNumber", $defaultDbCol) && !array_search("LastName", $defaultDbCol)) {
  $columnTemplate = [];
  $headerResultTemplate = [];
}
// var_dump($columnTemplate);
if (isset($_SESSION['selectedColumn'])) {
  $columns = array_merge($headerResultTemplate, $_SESSION['selectedColumn']);
  $query = "SELECT " . implode(", ", array_merge($columnTemplate, $_SESSION['selectedColumn'])) . " FROM employee_tbl" . $logicalStmt . " order by IdNumber asc";
  echo $query;
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $employee = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
  $columns = array_merge($headerResultTemplate, $dbcolumns);
  $query = "SELECT " . implode(", ", array_merge($columnTemplate, $dbcolumns)) . " FROM employee_tbl" . $logicalStmt . " order by IdNumber asc";
  // echo $query;
  // exit();
  // $query = "SELECT IdNumber, concat(IFNULL(LastName, ''),', ', IFNULL(FirstName, ''), ' ', IFNULL(MiddleName, '')) as Name, emp_status, Category, Position, UnitOfAssignment, Region, SalaryRate, DailyBillRate, StatusOfDeployment, Remarks, MonthlyBillRate FROM employee_tbl where IdNumber=999932949 order by IdNumber asc";
  // echo $query;
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $employee = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo $query;
  // echo "\n";
  // var_dump($employee);
  // exit();
}


//format Header
function format($str)
{
  $new_str = preg_replace('/(?<!^)([A-Z])/', ' $1', $str);
  $formattedStr = strtoupper($new_str);
  return $formattedStr;
}
function mstr($str)
{
  $new_str = preg_replace('/(?<!^)([A-Z])/', ' $1', $str);
  return $new_str;
}


?>


<!-- &&& EMPLOYEE MANAGE &&& -->  
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manninglist Management</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item">Management</li>
              <li class="breadcrumb-item">Manninglist</li>
              <li class="breadcrumb-item active" aria-current="page">Employee List</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Add Employee -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <a class="btn" href="javascript:void(0);" data-toggle="modal" data-target="#manninglist_addEmployee">
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
             <div class="col-xl-3 col-md-6 mb-4">
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
            </div>
          </div>
  

          <!-- Row -->
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Employee Records</h6>
                 <div class="">
                     <button class="btn btn-primary" data-toggle="modal" data-target="#filterTableData">Filter Data</button>
                      <button class="btn btn-primary" data-toggle="modal" data-target="#filterTableColumn">Filter Column</button>
                 </div>
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
                  <table class="table align-items-center table-flush table-hover" id="manningList">
                    <thead class="thead-light">
                        <tr>
                            <?php
                            foreach ($columns as $header) {
                              echo $header == "emp_status" ? "<th>Status</th>" : "<th>" . format($header) . "</th>";
                            }
                            ?>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                        <tbody>
                       <?php
                       foreach ($employee as $emp) {
                         echo "<tr>";
                         foreach ($columns as $header) {
                           if ($header == "emp_status") {
                             $data = $emp[$header] == 1 ? "Active" : "Inactive";
                             echo "<td class='fs-6 fw-light'>{$data}</td>";
                           } else {
                             $data = $emp[$header];
                             echo "<td class='fs-6 fw-light'>{$data}</td>";
                           }
                         }
                         echo '<td><div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group btn-group-sm" role="group" aria-label="First group">
    <button type="button" class="btn btn-info emp_info" title="View"  data-toggle="modal" data-target="#manninglist_view_emp" data-id="' . $emp['IdNumber'] . '"> <i class="fas fa-info-circle"></i></button>
    <button type="button" class="btn btn btn-warning emp_edit" title="Edit"  data-toggle="modal" data-target="#manninglist_edit_emp" data-id="' . $emp['IdNumber'] . '"> <i class="fas fa-edit"></i></button>';
                         if ($emp['emp_status'] == 1) {
                           echo '    <button title="Inactive" type="button" data-target="#manninglist_mdl_disable_status" data-toggle="modal" class="btn btn-danger emp_disable" data-id="' . $emp['IdNumber'] . '" data-name="' . $emp['Name'] . '"> <i class="fas fa-times-circle"></i></button>';
                         } else {
                           echo '<button title="Active" type="button" data-target="#manninglist_mdl_enable_status" data-toggle="modal" class="btn btn-success emp_enable" data-id="' . $emp['IdNumber'] . '" data-name="' . $emp['Name'] . '"><i class="fas fa-check-circle"></i></button>';
                         }
                         echo " </div></div></tr></td>";
                       }
                       ?>  
                        </tbody>
                    </table>
                </div> <!-- #END# TABLE -->
                </div>
                    </div>
                    </div> <!-- END Row -->
                    <!-- ### END EMPLOYEE MANAGE ### -->
