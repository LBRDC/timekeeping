<!-- Modal Add Employee -->
<!-- Modal Add Employee -->
<div class="modal fade" id="mdlTimekeeping" data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAddEmployee" aria-hidden="true">
    <div class="modal-content modal-lg modal-dialog ">
        <div id="pdfPreview">

        </div>
    </div>
</div>


<div class="modal fade" id="mdlLoadSelectedEmployee" data-backdrop="true" tabindex="-2" role="dialog" aria-labelledby="ModalLabelAddEmployee" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-3">
            <!-- Modern Table Design -->
            <style>
                .big {
                    width: 20px;
                    height: 20px;
                }

                .table thead {
                    background-color: #f8f9fa;
                    color: #495057;
                }

                .table th,
                .table td {
                    vertical-align: middle;
                }

                .table-hover tbody tr:hover {
                    background-color: #f1f1f1;
                }

                .table td {
                    border-top: 1px solid #ddd;
                }

                .btn-submit {
                    width: 100%;
                    padding: 12px;
                    background-color: #007bff;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    font-size: 16px;
                    cursor: pointer;
                    margin-top: 20px;
                }

                .btn-submit:hover {
                    background-color: #0056b3;
                }
            </style>

            <!-- Table with selection checkboxes -->
            <table class="table table-hover" id="dtr_selection_employee">
                <thead>
                    <tr>
                        <th><input class="big" type="checkbox" id="select-all" /></th>
                        <th>ID</th>
                        <th style="width: 100%;">NAME</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input class="big row-checkbox" type="checkbox" data-name="1" /></td>
                        <td>3102</td>
                        <td>John Doe</td>
                    </tr>
                    <!-- You can add more rows here -->
                </tbody>
            </table>

            <!-- Submit Button -->
            <button type="button" data-toggle="modal" data-target="#mdlTimekeeping" class="btn-submit" id="submit-selected">Submit</button>
        </div>
    </div>
</div>