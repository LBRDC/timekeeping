<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!--<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>-->
            <div class="modal-body text-center">
                <p>Are you sure you want to logout?</p>
            </div>
            <form id="">
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <a href="query/logoutExe.php" class="btn btn-primary">Logout</a>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- MODAL CHANGE PASSWORD -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="mdl_change_mobile_user"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlChangePasswordLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="user_change_password" name="user_change_password" method="post">
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="text" name="password_change_id" id="password_change_id" value="<?= $user['admin_id'] ?>" hidden required>
                        <div class="form-row mb-2">
                            <label for="new_password">Current Password<span class="text-danger">*</span></label>
                            <input type="password" name="curr_password" id="curr_password" class="form-control" required>
                        </div>
                        <div class="form-row mb-2">
                            <label for="new_password">New Password<span class="text-danger">*</span></label>
                            <input type="password" name="new_password" id="new_password" class="form-control" required>
                        </div>
                        <div class="form-row mb-2">
                            <label for="confirm_password">Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- MODAL END CHANGE PASSWORD -->