<link rel="stylesheet" href="<?php echo base_url('assets/vendors/chosen/chosen.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/sweet-alert/dist/sweetalert2.min.css'); ?>">
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Account Manager</h1>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-4 -->
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li><a href="<?php echo site_url('admin/accnt-mgr'); ?>">Account Manager</a></li>
          <li class="active"><?php echo $this->uri->segment(3); ?></li>
        </ol>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-8 -->
</div><!-- /.breadcrumbs -->
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open_multipart('', 'role="form" id="regForm"'); ?>
        <div class="card">
          <div class="card-header">
            <strong>Account Information</strong>
          </div><!-- /.card-header -->
          <div class="card-body card-block form-horizontal">
            <small style="display:block;padding: 10px 10px 10px 0px;font-size: 11px;"><i>Fields with (*) are mandatory. Please don't leave it blank</i></small>
            <div class="row form-group">
              <div class="col-lg-1 col-sm-2 d-none d-sm-block"><label class="form-control-label">*Username:</label></div>
              <div class="col-lg-9 col-sm-10 col-xs-12">
                <input type="text" id="uname" name="uname" placeholder="Username" class="form-control form-control-sm" data-parsley-remote="check_username" data-parsley-remote-options="{ 'type': 'GET', 'dataType': 'json', 'data': { 'uname': 'value' } }" data-parsley-remote-message="Username already exists" required data-parsley-required-message="This field is required" maxlength="16">
              </div>
            </div><!-- /.row form-group -->
            <!-- <div class="row form-group">
              <div class="col-lg-1 col-sm-2 d-none d-sm-block"><label class="form-control-label">Password:</label></div>
              <div class="col-lg-9 col-sm-10 col-xs-12">
                <input type="password" id="pword" name="pword" placeholder="Password" class="form-control form-control-sm" required data-parsley-required-message="This field is required" maxlength="16" data-parsley-length="[8, 16]" data-parsley-length="Password must be 8 - 16 characters long.">
              </div>
            </div> --><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col-lg-1 col-sm-2 d-none d-sm-block"><label class="form-control-label">*Firstname:</label></div>
              <div class="col-lg-9 col-sm-10 col-xs-12">
                <input type="text" id="fname" name="fname" placeholder="Firstname" class="form-control form-control-sm" required data-parsley-required-message="This field is required" maxlength="50">
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col-lg-1 col-sm-2 d-none d-sm-block"><label class="form-control-label">*Lastname:</label></div>
              <div class="col-lg-9 col-sm-10 col-xs-12">
                <input type="text" id="lname" name="lname" placeholder="Lastname" class="form-control form-control-sm" required data-parsley-required-message="This field is required" maxlength="50">
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col-lg-1 col-sm-2 d-none d-sm-block"><label class="form-control-label">*Role:</label></div>
              <div class="col-lg-3 col-sm-10 col-xs-12">
                <select id="role" name="role" class="form-control form-control-sm" required data-parsley-required-message="This field is required">
                  <option value="">---</option>
                </select>
              </div>
            </div><!-- /.row form-group -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
        <div class="card">
          <div class="card-footer">
            <button type="submit" id="submitBtn" class="btn btn-outline-primary btn-sm">
              <i class="fa fa-check"></i> Submit
            </button>
            <button type="reset" class="btn btn-outline-danger btn-sm">
              <i class="fa fa-refresh"></i> Reset
            </button>
          </div><!-- /.card-footer -->
        </div><!-- /.card -->
        <?php echo form_close(); ?>
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
  </div><!-- /.animated fadeIn -->
</div> <!-- .content -->
<script src="<?php echo base_url('assets/vendors/chosen/chosen.jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/sweet-alert/dist/sweetalert2.all.min.js'); ?>"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="<?php echo base_url('assets/parsley/dist/parsley.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/pages/admin/account_manager/frm_validation.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/pages/admin/account_manager/getAccountRoles.js'); ?>"></script>