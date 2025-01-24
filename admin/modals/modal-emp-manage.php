<!-- Modal Add Employee -->
<div class="modal fade" id="mdlAddEmployee" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAddEmployee" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <form id="mdlAddEmployees">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Add Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Company -->
                    <div name="company_info">
                        <hr />
                        <h5 class="font-weight-bold text-center">Company Information</h5>
                        <hr />
                        <div class="form-row mb-2">
                            <div class="col-md-6">
                                <label for="add_Dept">Department<span class="text-danger">*</span></label>
                                <select class="form-control selectpicker" name="add_emp_dept" id="add_emp_dept" data-live-search="true" data-style="btn-outline-light">
                                    <option value="">Select...</option>
                                    <?php foreach ($departments as $list): ?>
                                        <option value="<?= $list['fld_dept_id']; ?>"><?= "[" . $list['code'] . "]" ?> <?= $list['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="add_Position">Position<span class="text-danger">*</span></label>
                                <select class="form-control selectpicker" id="add_emp_pos" name="add_emp_pos" data-live-search="true" data-style="btn-outline-light">
                                    <option value="">Select...</option>
                                    <?php foreach ($position as $list): ?>
                                        <option value="<?= $dept['fld_position_id']; ?>"><?= "[" . $list['code'] . "]" ?> <?= $list['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-6">
                                <label for="add_EmpId">Employee Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="add_emp_idnumber" name="add_emp_idnumber">
                            </div>
                            <div class="col-md-6">
                                <label for="add_EmpSched">Shift Schedule<span class="text-danger">*</span></label>
                                <select class="form-control selectpicker" id="add_emp_shift" name="add_emp_shift" data-style="btn-outline-light">
                                    <option value="">Select...</option>
                                    <option value="1">Day Shift</option>
                                    <option value="2">Mid Shift</option>
                                    <option value="3">Night Shift</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="add_SatLoc">Satellite Location<span class="text-danger">*</span></label>
                                <select class="form-control selectpicker" id="add_emp_location" name="add_emp_location" data-live-search="true" data-style="btn-outline-light">
                                    <option value="">Select...</option>
                                    <?php foreach ($location as $list): ?>
                                        <option value="<?= $dept['fld_location_id']; ?>"><?= $list['name_location']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col-md-6">
                                <label for="add_EmpType">Employment Type<span class="text-danger">*</span></label>
                                <select class="form-control selectpicker" id="add_emp_type" name="add_emp_type" data-style="btn-outline-light">
                                    <option value="">Select...</option>
                                    <option value="regular">Regular</option>
                                    <option value="reliever">Reliever</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="add_EmpStatus">Employment Status<span class="text-danger">*</span></label>
                                <select class="form-control selectpicker" id="add_emp_status" name="add_emp_status" data-style="btn-outline-light">
                                    <option value="">Select...</option>
                                    <option value="active">Active</option>
                                    <option value="resigned">Resigned</option>
                                    <option value="retired">Retired</option>
                                </select>
                            </div>
                        </div>
                    </div> <!-- #END# Company -->
                    <!-- Personal -->
                    <div name="personal_info">
                        <hr />
                        <h5 class="font-weight-bold text-center">Personal Information</h5>
                        <hr />
                        <div class="form-row mb-2">
                            <div class="col-md-3">
                                <label for="add_NameFirst">First Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="add_emp_fname" id="add_emp_fname" placeholder="">
                            </div>
                            <div class="col-md-3">
                                <label for="add_NameMid">Middle Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="add_emp_mname" id="add_emp_mname">
                            </div>
                            <div class="col-md-3">
                                <label for="add_NameLast">Last Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="add_emp_lname" id="add_emp_lname">
                            </div>
                            <div class="col-md-3">
                                <label for="add_NameSuf">Suffix</label>
                                <select class="form-control selectpicker" id="add_emp_suffix" data-style="btn-outline-light" name="add_emp_suffix">
                                    <option value="">Select...</option>
                                    <option value="Jr.">Jr.</option>
                                    <option value="Sr.">Sr.</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="add_Resident">Residential Address</label>
                                <input type="text" class="form-control" id="add_emp_address" name="add_emp_address">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-6">
                                <label for="add_Email">Email Address</label>
                                <input type="email" class="form-control" id="add_emp_email" name="add_emp_email">
                            </div>
                            <div class="col-md-6">
                                <label for="add_Contact">Contact Number</label>
                                <input type="text" class="form-control" id="add_emp_contact" name="add_emp_contact">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-3" id="datepicker-year">
                                <label for="add_Birth">Date of Birth</label>
                                <div class="input-group date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="add_emp_bdate" name="add_emp_bdate" placeholder="MM/DD/YYYY">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="add_Sex">Sex</label>
                                <select class="form-control selectpicker" id="add_emp_gender" name="add_emp_gender" data-style="btn-outline-light">
                                    <option value="">Select...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="add_Civil">Civil Status</label>
                                <select class="form-control selectpicker" id="add_emp_civil" name="add_emp_civil" data-style="btn-outline-light">
                                    <option value="">Select</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Annulled">Annulled</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                            </div>
                            <div class="col-md-3" id="datepicker-year">
                                <label for="add_Nation">Nationality</label>
                                <input type="text" class="form-control" id="add_emp_nationality" name="add_emp_nationality">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>
</div> <!-- #END# Modal Add Employee -->