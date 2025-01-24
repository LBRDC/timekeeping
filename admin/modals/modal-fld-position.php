<!-- Modal Add Position -->
<div class="modal fade" id="mdlAddPosition" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAddPosition" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelPosition">Add Position</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmAddPosition">
                <div class="modal-body">
                    <!-- Company -->
                    <div name="positon_info">
                        <div class="form-row mb-2 justify-content-center">
                            <div class="col-xl-6 col-md-6">
                                <label for="add_PosCode">Position Code<span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-dark" name="add_PosCode" id="add_PosCode" required>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="add_PosDesc">Daily Rate<span class="text-danger">*</span></label>
                                <input type="number" class="form-control text-dark" name="dailyRate" id="dailyRate" required>
                            </div>
                            <div class="col">
                                <label for="add_PosDesc">Monthly Rate<span class="text-danger">*</span></label>
                                <input type="number" class="form-control text-dark" name="monthlyRate" id="monthlyRate" required>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="add_PosName">Position Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="pos_name" id="pos_name" required>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="add_PosDesc">Position Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="add_PosDesc" id="add_PosDesc" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Add</button>

                </div>
            </form>
        </div>
    </div>
</div> <!-- #END# Modal Add Position -->


<!-- Modal Edit Position -->
<div class="modal fade" id="mdlEditPosition" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabelEditPosition" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelEditPosition">Edit Position</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmEditPosition">
                <div class="modal-body">
                    <!-- Company -->
                    <div name="positon_info">
                        <div class="form-row mb-2 justify-content-center">
                            <div class="col-xl-6 col-md-6">
                                <label for="edit_PosCode">Position Code<span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-dark" name="edit_PosCode" id="edit_PosCode" required>
                                <input type="text" name="edit_pos_id" id="edit_pos_id" hidden required>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="add_PosDesc">Daily Rate<span class="text-danger">*</span></label>
                                <input type="number" class="form-control text-dark" name="edit_dailyRate" id="edit_dailyRate" required>
                            </div>
                            <div class="col">
                                <label for="add_PosDesc">Monthly Rate<span class="text-danger">*</span></label>
                                <input type="number" class="form-control text-dark" name="edit_monthlyRate" id="edit_monthlyRate" required>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="edit_PosName">Position Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="edit_PosName" id="edit_PosName" value="" required>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="edit_PosDesc">Position Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="edit_PosDesc" id="edit_PosDesc" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-secondary">Update</button>

                </div>
            </form>
        </div>
    </div>
</div> <!-- #END# Modal Edit Position -->



<!-- Modal Disable department -->
<div class="modal fade" id="modal_DisablePos" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Disable <span id="mdlDisablePosition"
                        class="text-danger font-weight-bold">NAME</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="disable_position">
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="text" id="pos_disable_id" value="" hidden required>
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
<div class="modal fade" id="modal_EnablePos" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enable <span
                        class="text-success font-weight-bold" id="mdlEnablePosition">NAME</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="enable_position">
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="text" id="pos_enable_id" value="" hidden required>
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
</div>