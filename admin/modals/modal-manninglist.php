<div class="modal fade" id="filterTableColumn" tabindex="-1" role="dialog" aria-labelledby="mdlImportfile" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <span class="text-success font-weight-bold">Filter Table Column</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="SavefilterColumn">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-6">
                            <span id="checkboxList" class="font-weight-light text-muted text-sm"></span>
                           </div>
                        </div>
                        <div class="row">
                        <?php
                        foreach ($dbcolumns as $header) {
                            if ($header != "IdNumber" && $header != "Name") {
                                $txt = $header == "emp_status" ? "Status" : $header;
                                echo '<div class="col-md-6">
                                <div id="column-1-content">
                               <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"><input type="checkbox" class="listColumns" name="" value="' . $header . '" value=""></div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroupUsername2" value="' . mstr($txt) . '" readonly>
                            </div>
                                </div>
                            </div>';
                            }
                        }
                        ?>     
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                        <div class="div">
                    <button type="button" class="btn btn-primary" id="uncheckAll">Uncheck</button>
                    <button type="button" class="btn btn-primary" id="checkAll">Check</button>
                        </div>
                    <div class="div">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="filterTableData" tabindex="-1" role="dialog" aria-labelledby="mdlImportfile" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <span class="text-success font-weight-bold">Filter Table Data</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="SavefilterData">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-3">
                            <div class="form-group">
                                <label for="filterColumn" class="font-weight-bold">Filter Column</label>
                                <span class="text-danger">*</span>
                                <select name="filterColumn" id="filterdata_column" class="form-control form-control">
                                    <option value="" disabled selected></option>
                                    <?php
                                    foreach ($dbcolumns as $header) {
                                        $txt = $header == "emp_status" ? "Status" : $header;
                                        echo '<option value="' . $header . '">' . mstr($txt) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                           </div>
                           <div class="col-md-3">
                            <div class="form-group">
                                <label for="filterOperator" class="font-weight-bold">Filter Operator</label>
                                <span class="text-danger">*</span>
                                <select name="filterOperator" id="filterdata_operator" class="form-control form-control">
                                    <option value="" selected disabled></option>
                                    <option value="=">Equal</option>
                                    <option value="!=">Not Equal</option>
                                    <option value=">">Greater than</option>
                                    <option value="<">Less than</option>
                                    <option value=">=">Greater or Equal</option>
                                    <option value="<=">Less or Equal</option>
                                </select>
                            </div>
                           </div>
                           <div class="col-md-3">
                            <div class="form-group">
                                <label for="filterValue" class="font-weight-bold">Filter Value</label>
                                <span class="text-danger">*</span>
                                <input type="text" name="filterValue" id="filterdata_value" class="form-control form-control">
                            </div>
                           </div>
                           <div class="col-md-2" id="logic_input">
                            <div class="form-group">
                                <label for="filterOperator" class="font-weight-bold">Filter Logic</label>
                                <span class="text-danger">*</span>
                                <select name="filterOperator" id="filterdata_logic" class="form-control form-control">
                                    <option value="">NONE</option>
                                    <option value="AND">AND</option>
                                    <option value="OR">OR</option>
                                </select>
                            </div>
                           </div>
                           
                           <div class="col-md-1 d-flex justify-content-center align-items-center">
                             <button type="button" class="btn btn-success" id="addFilter"><i class="fas fa-plus"></i></button>
                           </div>
                        </div>
                        <div class="row mt-3 mb-2"> 
                            <div class="col-md-12">
                                <div id="filterList" class="font-weight-light text-muted text-sm">Filter List</div>
                            </div>  
                        </div>
                        <div class="row" >
                            <div class="container-fluid" id="filterListtable">
                                <!-- <div class="row listfilter">
                                    <div class="col-md-11 shadow-sm pt-2  d-flex align-items-center rounded">
                                        <label class="font-weight-bold">1. Status != "heheehhe"</label>
                                    </div>
                                     <div class="col-md-1 d-flex justify-content-center align-items-center">
                             <button type="button" class="btn btn-danger removeFilter"><i class="fas fa-times"></i></button>
                           </div>
                                </div> -->
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between ">
                    <div class="div">
                    <button type="button" id="btndefaultFilter" class="btn btn-dark">Default</button>
                    </div>
                    <div class="div">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="manninglist_addEmployee" tabindex="-1" role="dialog" aria-labelledby="mdlImportfile" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <span class="text-success font-weight-bold">Add Employee</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addEmployeeManninglist">
                <div class="modal-body">
                    <div class="container-fluid ">
                    <!-- <div class="row">
                        <div class="container-fluid d-flex justify-content-center">
                            <div class="form-group px-5 mb-4 col-md-6">
                                <label for="emp_status" class="font-weight-bold">Status</label>
                                <select name="emp_status" id="emp_status" class="form-control form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div> -->
                        <div class="row">
                            <!-- <div class="col-md-6 hoverable-input" id="' . $val . '">
                                <div class="form-group">
                                <label for="' . $val . '" class="font-weight-bold"></label> <span class="close close-btn" aria-hidden="true">&times;</span>
                                <input type="text" class="form-control"  id="' . $val . '" placeholder="' . format($val) . '"/>
                                </div>
                            </div> -->
                           <?php
                           foreach ($defaultDbCol as $val) {
                               if ($val != "emp_status" && $val != "emp_timestamp" && $val != "emp_created" && $val != "emp_id") {
                                   $mtype = str_contains(format($val), "NUMBER") || str_contains(format($val), "RATE") ? "number" : "text";
                                   $isNumber = str_contains(format($val), "RATE") ? "step='any'" : "";
                                   if ($val == "Region") {
                                       echo ' <div class="col-md-6 hoverable-input" id="' . $val . '">
                                   <div class="form-group">
                                   <label for="' . $val . '" class="text-monospace">' . format($val) . '</label>
                                   <span class="text-danger">*</span>
                                   <span class="close close-btn" data-name="' . format($val) . '" data-id="' . $val . '" aria-hidden="true">&times;</span>
                                 <select id="Region" name="Region" class="form-select custom-select">
                                 <option value="">Select Region</option>
                                 </select>
                                   </div>
                               </div>';
                                   } else {
                                       echo ' <div class="col-md-6 hoverable-input" id="' . $val . '">
                                   <div class="form-group">
                                   <label for="' . $val . '" class="text-monospace">' . format($val) . '</label>
                                   <span class="text-danger">*</span>
                                   <span class="close close-btn" data-name="' . format($val) . '" data-id="' . $val . '" aria-hidden="true">&times;</span>
                                   <input type="' . $mtype . '" class="form-control"  id="' . $val . '" name="' . $val . '"required autocomplete="off" ' . $isNumber . ' />
                                   </div>
                               </div>';
                                   }
                               }
                           }
                           ?>

                        </div>
                    </div>
                    <div class="modal-footer ">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>


                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="manninglist_view_emp" tabindex="-1" role="dialog" aria-labelledby="mdlImportfile" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title"> <span class="text-success font-weight-bold">Employee Information</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addEmployeeManninglist">
                <div class="modal-body">
                    <div class="container-fluid ">
                    <!-- <div class="row">
                        <div class="container-fluid d-flex justify-content-center">
                            <div class="form-group px-5 mb-4 col-md-6">
                                <label for="emp_status" class="font-weight-bold">Status</label>
                                <select name="emp_status" id="emp_status" class="form-control form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div> -->
                        <div class="row" id="emp_info_container">
                            <!-- <div class="col-md-6 hoverable-input" id="' . $val . '">
                                <div class="form-group">
                                <label for="' . $val . '" class="font-weight-bold"></label> <span class="close close-btn" aria-hidden="true">&times;</span>
                                <input type="text" class="form-control"  id="' . $val . '" placeholder="' . format($val) . '"/>
                                </div>
                            </div> -->
                           <?php
                           foreach ($defaultDbCol as $val) {
                               if ($val != "emp_status" && $val != "emp_timestamp" && $val != "emp_created" && $val != "emp_id") {
                                   $mtype = str_contains(format($val), "NUMBER") || str_contains(format($val), "RATE") ? "number" : "text";
                                   echo ' <div class="col-md-6 hoverable-input" id="' . $val . '">
                                   <div class="form-group">
                                   <label for="' . $val . '" class="text-monospace">' . format($val) . '</label>
                                   <input type="' . $mtype . '" class="form-control font-weight-bold"  id="' . $val . '" name="' . $val . '"readonly/>
                                   </div>
                               </div>';
                               }
                           }
                           ?>

                        </div>
                    </div>
                    <div class="modal-footer ">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="submit" class="btn btn-success">Save</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="manninglist_edit_emp" tabindex="-1" role="dialog" aria-labelledby="mdlImportfile" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title"> <span class="text-success font-weight-bold">Employee Information</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editEmployeeManninglist">
                <div class="modal-body">
                    <div class="container-fluid ">
                    <!-- <div class="row">
                        <div class="container-fluid d-flex justify-content-center">
                            <div class="form-group px-5 mb-4 col-md-6">
                                <label for="emp_status" class="font-weight-bold">Status</label>
                                <select name="emp_status" id="emp_status" class="form-control form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div> -->
                        <div class="row" id="emp_edit_container">
                            <!-- <div class="col-md-6 hoverable-input" id="' . $val . '">
                                <div class="form-group">
                                <label for="' . $val . '" class="font-weight-bold"></label> <span class="close close-btn" aria-hidden="true">&times;</span>
                                <input type="text" class="form-control"  id="' . $val . '" placeholder="' . format($val) . '"/>
                                </div>
                            </div> -->
                           <?php
                           foreach ($defaultDbCol as $val) {
                               if ($val != "emp_status" && $val != "emp_timestamp" && $val != "emp_created" && $val != "emp_id") {
                                   $mtype = str_contains(format($val), "NUMBER") || str_contains(format($val), "RATE") ? "number" : "text";
                                   $isNumber = str_contains(format($val), "RATE") ? "step='any'" : "";
                                   $tx = $val == "IdNumber" ? "readonly" : "";
                                   echo ' <div class="col-md-6 hoverable-input" id="' . $val . '">
                                   <div class="form-group">
                                   <label for="' . $val . '" class="text-monospace">' . format($val) . '</label>
                                   <input type="' . $mtype . '" class="form-control font-weight-bold"  id="' . $val . '" name="' . $val . '"' . $tx . $isNumber . '/>
                                   </div>
                               </div>';
                               }
                           }
                           ?>

                        </div>
                    </div>
                    <div class="modal-footer ">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="manninglist_mdl_disable_status" tabindex="-1" role="dialog" aria-labelledby="manninglist_mdl_disable_status"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlDisableEmployeeLabel">Disable <span id="disable_name"
                        class="text-danger font-weight-bold">NAME</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="manninglist_disable_emp" name="disableEmployeeFrm" method="post">
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="text" name="disable_EmpId" id="disable_emp_id" value="" hidden required>
                        <div class="form-row mb-2">
                            Are you sure you want to DISABLE&nbsp;<span class=" text-danger font-weight-bold"></span>?
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">DISABLE</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<div class="modal fade" id="manninglist_mdl_enable_status" tabindex="-1" role="dialog" aria-labelledby="manninglist_mdl_enable_status"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlEnableEmployeeLabel">Enable <span
                        class="text-success font-weight-bold" id="enable_name">NAME</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="manninglist_enable_emp" name="enableEmployeeFrm" method="post">
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="text" name="enable_EmpId" id="enable_emp_id" value="" hidden required>
                        <div class="form-row mb-2">
                            Are you sure you want to ENABLE&nbsp;<span class=" text-success font-weight-bold"></span>?
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">ENABLE</button>
                </div>
            </form>
        </div>
    </div>
</div> 