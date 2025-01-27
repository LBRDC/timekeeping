<div class="modal fade" id="mdlAddHoliday" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAddDepartment" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Add Holiday</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmAddHoliday">
                <div class="modal-body d-flex flex-column">
                    <div class="d-flex flex-column">
                        <div class="form-group">
                            <select required class="form-control" id="txtHolidayDate" name="holidayType">
                                <option value="Legal">Legal</option>
                                <option value="Special">Special</option>
                                <option value="Local">Local</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" id="txtHolidayDate" name="holidayDate" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="txtHolidayDate" name="holidayName" placeholder="Name" required>
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


<div class="modal fade" id="mdldeletHoliday" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete <span id="mdlDeleteHolidayName"
                        class="text-danger font-weight-bold">NAME</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteHolidayForm">
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="text" id="holiday_delete_id" value="" hidden required>
                        <div class="form-row mb-2">
                            Are you sure you want to &nbsp;<span class=" text-danger font-weight-bold">DELETE</span>?
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">DELETE</button>
                </div>
            </form>
        </div>
    </div>
</div>