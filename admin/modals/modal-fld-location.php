<!-- Modal Disable Location -->
<div class="modal fade" id="mdlWarnDisable" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabelWarnDisable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelWarnDisable">Disable Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editDisableLoc" method="POST">
                <div class="modal-body text-center">
                    <input type="" id="edit_Id1" value="" hidden>
                    <input type="" id="edit_LocName1" value="" hidden>
                    <input type="" id="edit_Status1" value="inactive" hidden>
                    <p>Are you sure you want to disable?</p>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">DISABLE</button>
                </div>
            </form>
        </div>
    </div>
</div> <!-- #END# Modal Disable Location -->


<!-- Modal Enable Location -->
<div class="modal fade" id="mdlWarnEnable" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabelWarnEnable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelWarnEnable">Enable Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editEnableLoc" method="POST">
                <div class="modal-body text-center">
                    <input type="" id="edit_Id2" value="" hidden>
                    <input type="" id="edit_Status2" value="1" hidden>
                    <p>Are you sure you want to enable?</p>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">ENABLE</button>
                </div>
            </form>
        </div>
    </div>
</div> <!-- #END# Modal Enable Location -->