<!-- Modal Add Department -->
<div class="modal fade" id="mdlAddPayroll" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAddDepartment" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Add Payroll</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmAddPayroll">
                <div class="modal-body">
                    <!-- Company -->
                    <div name="department_info">
                        <div class="form-row mb-2 justify-content-center">
                            <div class="col-xl-6 col-md-6">
                                <label for="add_DeptCode">Payroll Code<span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-dark" name="payroll_code" id="payroll_code" required>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="add_DeptName">Payroll Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="payroll_name" name="payroll_name" required>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <label for="add_Position">Payroll Location<span class="text-danger">*</span></label>
                            <select class="form-control custom-select-location" name="payroll_location" id="payroll_location">
                                <option value="">Select...</option>
                                <?php foreach ($location as $list): ?>
                                    <option value="<?= $list['fld_location_id']; ?>"><?= $list['name_location']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- <div class="form-row mb-2">
                            <div class="col">
                                <label for="add_PayGrp">Payroll Grouping<span class="text-danger">*</span></label>
                                <select class="form-control selectpicker" id="add_PayGrp" data-live-search="true" data-style="btn-outline-light">
                                    <option value="">Select...</option>
                                    <option>1</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal Add Department -->
<div class="modal fade" id="mdlEditPayroll" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAddDepartment" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Update Payroll</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmEditPayroll">
                <div class="modal-body">
                    <!-- Company -->
                    <div name="department_info">
                        <div class="form-row mb-2 justify-content-center">
                            <div class="col-xl-6 col-md-6">
                                <label for="add_DeptCode">Payroll Code<span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-dark" name="edit_payroll_code" id="edit_payroll_code" required>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="add_DeptName">Payroll Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_payroll_name" name="edit_payroll_name" required>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <label for="add_Position">Payroll Location<span class="text-danger">*</span></label>
                            <select class="form-control custom-select-location1" name="edit_payroll_location" id="edit_payroll_location">
                                <option value="">Select...</option>
                                <?php foreach ($location as $list): ?>
                                    <option value="<?= $list['fld_location_id']; ?>"><?= $list['name_location']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <input type="text" name="edit_payroll_id" id="edit_payroll_id" hidden>
                        <!-- <div class="form-row mb-2">
                            <div class="col">
                                <label for="add_PayGrp">Payroll Grouping<span class="text-danger">*</span></label>
                                <select class="form-control selectpicker" id="add_PayGrp" data-live-search="true" data-style="btn-outline-light">
                                    <option value="">Select...</option>
                                    <option>1</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="modal_DisablePayroll" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Disable <span id="mdlDisablePayrollname"
                        class="text-danger font-weight-bold">NAME</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="disable_payroll">
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="text" id="payroll_disable_id" value="" hidden required>
                        <div class="form-row mb-2">
                            Are you sure you want to &nbsp;<span class=" text-danger font-weight-bold">DISABLE</span>?
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
</div> <!-- #END# Modal Enable department -->

<!-- Modal Enable department -->
<div class="modal fade" id="modal_EnablePayroll" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enable <span
                        class="text-success font-weight-bold" id="mdlEnablePayrollName">NAME</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="enable_payroll">
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="text" id="payroll_enable_id" value="" hidden required>
                        <div class="form-row mb-2">
                            Are you sure you want to &nbsp;<span class=" text-success font-weight-bold">ENABLE</span>?
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
</div> <!-- #END# Modal Enable department -->