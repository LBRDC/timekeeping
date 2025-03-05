<div class="modal fade" id="permissionModal" tabindex="-1" role="dialog" aria-labelledby="mobile_addEmployee" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="text-success font-weight-bold">Set Permission </span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="setPermissionFrm">
                <div class="modal-body">
                    <div class="mdl-importfile">
                        <input type="hidden" name="id" id="userid">
                        <div class="form-group">
                            <label class="font-weight-bold">Employee</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" id="p_employee_add" value="employee_add">
                                <label class="form-check-label" for="p_employee_add">Add Employee</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" id="p_employee_edit" value="employee_edit">
                                <label class="form-check-label" for="p_employee_edit">Edit Employee</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" id="p_employee_delete" value="employee_delete">
                                <label class="form-check-label" for="p_employee_delete">Delete Employee</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Fields</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" id="p_department" value="department">
                                <label class="form-check-label" for="p_department">Department </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" id="p_position" value="position">
                                <label class="form-check-label" for="p_position">Position</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" id="p_payroll_group" value="payroll_group">
                                <label class="form-check-label" for="p_payroll_group">Payroll Group</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" id="p_location" value="location">
                                <label class="form-check-label" for="p_location">Satellite Location</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" id="p_schedule" value="schedule">
                                <label class="form-check-label" for="p_schedule">Schedule</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" id="p_signatories" value="signatories">
                                <label class="form-check-label" for="p_signatories">Signatories</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" id="p_holiday" value="holiday">
                                <label class="form-check-label" for="p_holiday">Holiday</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Mobile Account</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" id="p_mobile_add" value="mobile_add">
                                <label class="form-check-label" for="p_mobile_add">Add Account</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" id="p_mobile_email" value="mobile_email">
                                <label class="form-check-label" for="p_mobile_email">Reset Email</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" id="p_mobile_device" value="mobile_device">
                                <label class="form-check-label" for="p_mobile_device">Reset Device</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>