<div class="modal fade" id="mdlImport" tabindex="-1" role="dialog" aria-labelledby="mdlImportfile" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <span class="text-success font-weight-bold">Upload
                        Excel</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="importfileFrm">
                <div class="modal-body">
                    <div class="mdl-importfile">
                        <div class="form-row">
                            <label for="sheetName">Name of Sheet<span class="text-danger">*</span></label>
                            <input type="text" name="sheetName" id="sheetName" class="form-control" placeholder=""
                                autocomplete="off" required style="width:100%" 
                                value="JFU">
                        </div>
                        <div class="form-row">
                            <label for="sheetName">Table Range<span class="text-danger">*</span></label>
                            <input type="text" name="sheetName" id="range" class="form-control" placeholder=""
                                autocomplete="off" required style="width:100%" 
                                value="A1:J114">
                        </div>

                        <div class="form-row">
                            <label for="startingRow">Excel File<span class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="importFile">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>