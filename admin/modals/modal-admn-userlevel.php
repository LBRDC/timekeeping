<div class="modal fade" id="accountleveelADD" tabindex="-1" role="dialog" aria-labelledby="mobile_addEmployee" aria-hidden="true">
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
                            <label for="startingRow">Userlevel Name<span class="text-danger">*</span></label>
                            <input type="text" name="fld_position" id="fld_position" class="form-control" placeholder=""
                                autocomplete="off" required style="width:100%" readonly>
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