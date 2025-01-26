<!-- Modal Add Department -->
<div class="modal fade" id="mdlAddDepartment" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAddDepartment" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Add Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmAddDepartment">
                <div class="modal-body">
                    <!-- Company -->
                    <div name="department_info">
                        <div class="form-row mb-2 justify-content-center">
                            <div class="col-xl-6 col-md-6">
                                <label for="add_DeptCode">Department Code<span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-dark" name="dept_code" id="add_DeptCode" required>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="add_DeptName">Department Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="add_DeptName" name="dept_name" required>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <label for="add_Position">Department Payroll<span class="text-danger">*</span></label>
                            <select class="form-control custom-select-department" name="dept_location" id="dept_location">
                                <option value="">Select...</option>
                                <?php foreach ($payrollgroup as $list): ?>
                                    <option value="<?= $list['fld_payroll_id']; ?>">[<?= $list['code'] ?>] <?= $list['name']; ?></option>
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
</div> <!-- #END# Modal Add Department -->


<!-- Modal Edit Department -->
<div class="modal fade" id="mdlEditDepartment" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabelEditDepartment" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelEditDepartment">Edit AGSD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmEditDepartment">
                <div class="modal-body">
                    <!-- Company -->
                    <div name="department_info">
                        <div class="form-row mb-2 justify-content-center">
                            <div class="col-xl-6 col-md-6">
                                <label for="add_DeptCode">Department Code<span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-dark" name="edit_DeptCode" id="edit_DeptCode" placeholder="AGSD" required>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="add_DeptName">Department Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_DeptName" name="edit_DeptName" placeholder="Administrative and General Services Department" required>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <label for="add_Position">Department Location<span class="text-danger">*</span></label>
                            <select class="form-control custom-select-department" name="edit_dept_payroll" id="edit_dept_payroll">
                                <option value="">Select...</option>
                                <?php foreach ($payrollgroup as $list): ?>
                                    <option value="<?= $list['fld_payroll_id']; ?>">[<?= $list['code'] ?>] <?= $list['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <input type="hidden" id="edit_DeptId" name="edit_DeptId">
                        <!--<div class="form-row mb-2">
                            <div class="col">
                            <label for="add_PayGrp">Payroll Grouping<span class="text-danger">*</span></label>
                                <select class="form-control selectpicker" id="add_PayGrp" data-live-search="true" data-style="btn-outline-light">
                                    <option value="">Select...</option>
                                    <option>1</option>
                                </select>
                            </div>
                        </div>-->
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div> <!-- #END# Modal Add Department -->


<!-- Modal View Department -->
<div class="modal fade" id="mdlViewDepartment" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabelViewDepartment" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelViewDepartment"><b>"AGSD"</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Company -->
                <div name="department_info">
                    <div class="form-row mb-2 justify-content-center">
                        <div class="col-xl-6 col-md-6">
                            <label for="add_DeptCode">Department Code<span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-dark" id="add_DeptCode" placeholder="AGSD" value="AGSD" readonly>
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col">
                            <label for="add_DeptName">Department Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="add_DeptName" placeholder="Administrative and General Services Department" value="Administrative and General Services Department" readonly>
                        </div>
                    </div>
                    <!--<div class="form-row mb-2">
                        <div class="col">
                        <label for="add_PayGrp">Payroll Grouping<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="add_PayGrp" data-live-search="true" data-style="btn-outline-light">
                                <option value="">Select...</option>
                                <option>1</option>
                            </select>
                        </div>
                    </div>-->
                </div>
            </div>
            <!--<div class="modal-footer text-center">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-primary">Update</a>
            </div>-->
        </div>
    </div>
</div> <!-- #END# Modal Add Department -->


<!-- Modal Disable department -->
<div class="modal fade" id="modal_DisableDept" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Disable <span id="mdlDisableDeptname"
                        class="text-danger font-weight-bold">NAME</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="disable_department">
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="text" id="dept_disable_id" value="" hidden required>
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
<div class="modal fade" id="modal_EnableDept" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enable <span
                        class="text-success font-weight-bold" id="mdlEnableDeptname">NAME</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="enable_department">
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="text" id="dept_enable_id" value="" hidden required>
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