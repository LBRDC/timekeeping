
<!-- Modal Add Employee -->
<div class="modal fade" id="mdlAddEmployee" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAddEmployee" aria-hidden="true">
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
                    <hr/>
                    <h5 class="font-weight-bold text-center">Company Information</h5>
                    <hr/>
                    <div class="form-row mb-2">
                        <label for="in_EmpId">Employee Number<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="in_EmpId">
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-md-6">
                            <label for="in_EmpShift">Type of Shift<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="in_EmpShift" data-style="btn-outline-light">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="in_EmpSched">Shift Schedule<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="in_EmpSched" data-style="btn-outline-light">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-md-6">
                            <label for="in_dept">Department<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="in_dept" data-style="btn-outline-light">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="in_satLoc">Satellite Location<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="in_satLoc" data-live-search="true" data-style="btn-outline-light">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                </div> <!-- #END# Company -->
                <div name="personal_info">
                    <hr/>
                    <h5 class="font-weight-bold text-center">Personal Information</h5>
                    <hr/>
                    <div class="form-row mb-2">
                        <div class="col-md-3">
                            <label for="in_nameFirst">First Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="in_EmpId">
                        </div>
                        <div class="col-md-3">
                            <label for="in_nameMid">Middle Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="in_EmpId">
                        </div>
                        <div class="col-md-3">
                            <label for="in_nameLast">Last Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="in_EmpId">
                        </div>
                        <div class="col-md-3">
                            <label for="in_nameSuf">Suffix<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" id="in_satLoc" data-style="btn-outline-light">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-primary">Add</a>
            </div>
        </div>
    </div>
</div>
