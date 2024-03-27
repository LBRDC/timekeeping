
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
            <form>
                <div class="modal-body">
                    <!-- Company -->
                    <div name="department_info">
                        <div class="form-row mb-2 justify-content-center">
                            <div class="col-xl-6 col-md-6">
                                <label for="add_DeptCode">Department Code<span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-dark" id="add_DeptCode" placeholder="AGSD" required>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="add_DeptName">Department Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="add_DeptName" placeholder="Administrative and General Services Department" required>
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
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                    <a href="#" class="btn btn-primary">Add</a>
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
            <form>
                <div class="modal-body">
                    <!-- Company -->
                    <div name="department_info">
                        <div class="form-row mb-2 justify-content-center">
                            <div class="col-xl-6 col-md-6">
                                <label for="add_DeptCode">Department Code<span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-dark" id="add_DeptCode" placeholder="AGSD" value="AGSD" required>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="add_DeptName">Department Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="add_DeptName" placeholder="Administrative and General Services Department" value="Administrative and General Services Department" required>
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
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                    <a href="#" class="btn btn-primary">Update</a>
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
