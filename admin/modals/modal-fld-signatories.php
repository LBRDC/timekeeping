<div class="modal fade" id="mdlSignatoryHoliday" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Add Signatory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmAddSignatory">
                <div class="modal-body d-flex flex-column">
                    <div class="d-flex flex-column">
                        <div class="form-group">
                            <input type="number" class="form-control" id="signatoryNo" name="signatoryNo" placeholder="Signatory No." required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="signatoryName" name="signatoryName" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="signatoryPosition" name="signatoryPosition" placeholder="Positon" required>
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