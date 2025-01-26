<!-- MODAL ADD ACCOUNT -->
<div class="modal fade" id="mobile_addEmployee" tabindex="-1" role="dialog" aria-labelledby="mobile_addEmployee" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <span class="text-success font-weight-bold">Add Mobile User</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addMobileUserFrm">
                <div class="modal-body">
                    <div class="mdl-importfile">
                        <div class="form-row mb-2">
                            <label for="fld_location">Location<span class="text-danger">*</span></label>
                            <select class="form-control custom-select-location" name="fld_location" id="fld_location">
                                <option value="" selected disabled>Select Location...</option>
                                <?php
                                foreach ($location as $loc) {
                                    echo '<option value="' . $loc['fld_location_id'] . '">' . $loc['name_location'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-row mb-2">
                            <label for="fld_employee">Employee<span class="text-danger">*</span></label>

                            <select class="form-control custom-select-employee" name="fld_employee" id="fld_employee">

                            </select>
                        </div>

                        <div class="form-row mb-2">
                            <label for="startingRow">Position<span class="text-danger">*</span></label>
                            <input type="text" name="fld_position" id="fld_position" class="form-control" placeholder=""
                                autocomplete="off" required style="width:100%" readonly>
                        </div>
                        <div class="form-row mb-2">
                            <label for="startingRow">Department<span class="text-danger">*</span></label>
                            <input type="text" name="fld_department" id="fld_department" class="form-control" placeholder=""
                                autocomplete="off" required style="width:100%" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL ADD ACCOUNT -->



<!-- MODAL EDIT ACCOUNT -->
<div class="modal fade" id="mobile_editEmployee" tabindex="-1" role="dialog" aria-labelledby="mobile_editEmployee" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <span class="text-success font-weight-bold">Update Mobile User</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editMobileUserFrm">
                <div class="modal-body">
                    <div class="mdl-importfile">
                        <input type="text" id="accountID" name="accountID" required hidden>
                        <div class="form-row mb-2">
                            <label for="fld_location">Location<span class="text-danger">*</span></label>
                            <select class="form-control custom-select-location" name="edit_fld_location" id="edit_fld_location">
                                <option value="" selected disabled>Select Location...</option>
                                <?php
                                foreach ($location as $loc) {
                                    echo '<option value="' . $loc['fld_location_id'] . '">' . $loc['name_location'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-row mb-2">
                            <label for="fld_employee">Employee<span class="text-danger">*</span></label>

                            <select class="form-control custom-select-employee" name="edit_fld_employee" id="edit_fld_employee" disabled>
                                <option value="" selected disabled>Loading Employee...</option>
                                <?php
                                foreach ($employees as $emp) {
                                    $name = $emp['LastName'] . ', ' . $emp['FirstName'] . ' ' . $emp['MiddleName'];
                                    echo '<option value="' . $emp['IdNumber'] . '" data-pos="' . $emp['Position'] . '" data-unit="' . $emp['UnitOfAssignment'] . '" >' . $emp['IdNumber'] . ' - ' . $name . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-row mb-2">
                            <label for="startingRow">Position<span class="text-danger">*</span></label>
                            <input type="text" name="edit_fld_position" id="edit_fld_position" class="form-control" placeholder=""
                                autocomplete="off" required style="width:100%" readonly>
                        </div>
                        <div class="form-row mb-2">
                            <label for="startingRow">Unit of Assignment<span class="text-danger">*</span></label>
                            <input type="text" name="edit_fld_unitofassignment" id="edit_fld_unitofassignment" class="form-control" placeholder=""
                                autocomplete="off" required style="width:100%" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL EDIT ACCOUNT -->



<!-- MODAL ENABLE ACCOUNT -->
<div class="modal fade" id="mdl_disable_mobile_user" tabindex="-1" role="dialog" aria-labelledby="mdl_enabled_mobile_user"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlDisableEmployeeLabel">Disable <span id="acc_disable_name"
                        class="text-danger font-weight-bold">NAME</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="mobile_disabled_user" name="disableEmployeeFrm" method="post">
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="text" name="acc_disable_id" id="acc_disable_id" value="" hidden required>
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
<!-- MODAL END DISABLE ACCOUNT -->


<!-- MODAL ENABLE ACCOUNT -->
<div class="modal fade" id="mdl_enabled_mobile_user" tabindex="-1" role="dialog" aria-labelledby="mdl_disabled_mobile_user"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlEnableEmployeeLabel">Enable <span
                        class="text-success font-weight-bold" id="acc_enable_name">NAME</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="mobile_enable_user" name="mobile_enable_user" method="post">
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="text" name="acc_enable_id" id="acc_enable_id" value="" hidden required>
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
<!-- MODAL END ENABLE ACCOUNT -->

<!-- MODAL RESET PASSWORD -->
<div class="modal fade" id="mdl_reset_mobile_user" tabindex="-1" role="dialog" aria-labelledby="mdl_reset_mobile_user"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlEnableEmployeeLabel">Reset Password <span
                        class="text-success font-weight-bold" id="acc_reset_name">NAME</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="mobile_reset_user" name="mobile_reset_user" method="post">
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="text" name="acc_reset_id" id="acc_reset_id" value="" hidden required>
                        <div class="form-row mb-2">
                            Are you sure you want to RESET&nbsp;<span class=" text-success font-weight-bold"></span>?
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">RESET</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL END RESET PASSWORD -->