<div class="modal fade" id="mdlAddSchedule" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAddDepartment" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Add Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmAddSchedule">
                <div class="modal-body d-flex flex-column">
                    <div class="form-group">
                        <input type="text" class="form-control" id="scheduleCode" name="scheduleCode" placeholder="Code" required>
                    </div>

                    <div class="form-group d-flex flex-row justify-content-between gap-2">
                        <div style="width: 95%;">
                            <label for="">Check In</label>
                            <input type="time" class="form-control" id="checkIn" name="checkIn" placeholder="Check In" required>
                        </div>
                        <div style="width: 95%;">
                            <label for="">Check Out</label>
                            <input type="time" class="form-control" id="checkOut" name="checkOut" placeholder="Check In" required>
                        </div>
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




<div class="modal fade" id="mdlEditSchedule" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAddDepartment" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Edit Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmEditSchedule">
                <div class="modal-body d-flex flex-column">
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit_scheduleCode" name="edit_scheduleCode" placeholder="Code" required>
                    </div>

                    <div class="form-group d-flex flex-row justify-content-between gap-2">
                        <div style="width: 95%;">
                            <label for="">Check In</label>
                            <input type="time" class="form-control" id="edit_checkIn" name="edit_checkIn" placeholder="Check In" required>
                        </div>
                        <div style="width: 95%;">
                            <label for="">Check Out</label>
                            <input type="time" class="form-control" id="edit_checkOut" name="edit_checkOut" placeholder="Check In" required>
                        </div>
                    </div>
                    <input type="text" name="edit_schedule_id" id="edit_schedule_id" hidden required>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="modal_DisableSched" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Disable <span id="mdlDisableschedcode"
                        class="text-danger font-weight-bold">NAME</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="disable_sched">
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="text" id="sched_disable_id" value="" hidden required>
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
<div class="modal fade" id="modal_EnableSched" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enable <span
                        class="text-success font-weight-bold" id="mdlEnableschedcode">NAME</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="enable_sched">
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="text" id="sched_enable_id" value="" hidden required>
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