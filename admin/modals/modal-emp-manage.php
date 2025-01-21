<!-- Modal Add Employee -->
<div class="modal fade" id="mdlAddEmployee" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAddEmployee" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
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
                    <div class="form-row mb-2 justify-content-center">
                        <div class="col-md-6">
                            <label for="add_EmpId">Employee Number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="add_EmpId">
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-md-6">
                            <label for="add_Dept">Department<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="add_Dept" data-live-search="true" data-style="btn-outline-light">
                                <option value="">Select...</option>
                                <option>Administrative and General Services Department</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="add_Position">Position<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="add_Position" data-style="btn-outline-light">
                                <option value="">Select...</option>
                                <option>Information Technology Specialist</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-md-6">
                            <label for="add_EmpShift">Type of Shift<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="add_EmpShift" data-style="btn-outline-light">
                                <option value="">Select...</option>
                                <option>Regular</option>
                                <option>Flexible</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="add_EmpSched">Shift Schedule<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="add_EmpSched" data-style="btn-outline-light">
                                <option value="">Select...</option>
                                <option>8:00 AM - 5:00 PM</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row mb-2">
                        <div class="col">
                            <label for="add_SatLoc">Satellite Location<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="add_SatLoc" data-live-search="true" data-style="btn-outline-light">
                                <option value="">Select...</option>
                                <option>LBRDC Head Office</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row mb-4">
                        <div class="col-md-6">
                            <label for="add_EmpType">Employment Type<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="add_EmpType" data-style="btn-outline-light">
                                <option value="">Select...</option>
                                <option>Regular</option>
                                <option>Reliever</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="add_EmpStatus">Employment Status<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="add_EmpStatus" data-style="btn-outline-light">
                                <option value="">Select...</option>
                                <option>Active</option>
                                <option>Resigned</option>
                                <option>Retired</option>
                                <option>Inactive</option>
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
                            <input type="text" class="form-control" id="add_NameFirst" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <label for="add_NameMid">Middle Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="add_NameMid">
                        </div>
                        <div class="col-md-3">
                            <label for="add_NameLast">Last Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="add_NameLast">
                        </div>
                        <div class="col-md-3">
                            <label for="add_NameSuf">Suffix</label>
                            <select class="form-control selectpicker" id="add_NameSuf" data-style="btn-outline-light">
                                <option value="">Select...</option>
                                <option>Jr.</option>
                                <option>Sr.</option>
                                <option>III</option>
                                <option>IV</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col">
                            <label for="add_Resident">Residential Address</label>
                            <input type="text" class="form-control" id="add_Resident">
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-md-6">
                            <label for="add_Email">Email Address</label>
                            <input type="email" class="form-control" id="add_Email">
                        </div>
                        <div class="col-md-6">
                            <label for="add_Contact">Contact Number</label>
                            <input type="text" class="form-control" id="add_Contact">
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-md-3" id="datepicker-year">
                            <label for="add_Birth">Date of Birth</label>
                            <div class="input-group date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control" id="add_Birth" placeholder="MM/DD/YYYY">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="add_Sex">Sex</label>
                            <select class="form-control selectpicker" id="add_Sex" data-style="btn-outline-light">
                                <option value="">Select...</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="add_Civil">Civil Status</label>
                            <select class="form-control selectpicker" id="add_Civil" data-style="btn-outline-light">
                                <option value="">Select</option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Divorced</option>
                                <option>Separated</option>
                                <option>Annulled</option>
                                <option>Widowed</option>
                            </select>
                        </div>
                        <div class="col-md-3" id="datepicker-year">
                            <label for="add_Nation">Nationality</label>
                            <input type="text" class="form-control" id="add_Nation">
                        </div>
                    </div>
                </div> <!-- #END# Personal -->
                <!-- Login -->
                <div name="login">
                    <hr />
                    <h5 class="font-weight-bold text-center">Login Credentials</h5>
                    <hr />
                    <div class="form-row mb-2 justify-content-center">
                        <div class="col-md-6">
                            <label for="add_Pass">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="add_Pass">
                        </div>
                    </div>
                </div> <!-- #END# Login -->
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-primary">Add</a>
            </div>
        </div>
    </div>
</div> <!-- #END# Modal Add Employee -->