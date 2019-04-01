<link rel="stylesheet" href="<?php echo base_url('assets/vendors/chosen/chosen.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/sweet-alert/dist/sweetalert2.min.css'); ?>">
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Senior High School</h1>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-4 -->
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li><a href="<?php echo site_url('registrar/dept/'.$this->uri->segment(3)); ?>">Senior High School</a></li>
          <li class="active"><?php echo $this->uri->segment(4); ?></li>
          <li class="active"><?php echo $this->uri->segment(5); ?></li>
        </ol>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-8 -->
</div>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open_multipart('', 'role="form" id="editStudInfoForm"'); ?>
        <input type="hidden" name="row_id" value="<?php echo $stud_info->row_id ?>">
        <div class="card">
          <div class="card-header">
            <strong>Learner Basic Information</strong>
          </div><!-- /.card-header -->
          <div class="card-body form-horizontal">
            <small><i>Fields with (*) are mandatory. Please don't leave it blank</i></small>
            <div class="row form-group">
              <div class="col col-sm-1 d-none d-sm-block">
                <label for="LRN" class=" form-control-label">*LRN</label>
              </div>
              <div class="col-sm-3 col-xs-12">
                <input type="text" id="LRN" name="LRN" placeholder="Learner Reference Number" class="input-sm form-control-sm form-control resFld" value="<?php echo $stud_info->stud_lrn ?>" data-parsley-type="number" maxlength="12" data-parsley-length="[12, 12]" data-parsley-length-message="" data-parsley-remote="check_stud_lrn" data-parsley-remote-options="{ 'type': 'GET', 'dataType': 'json', 'data': { 'LRN': 'value' } }" data-parsley-remote-message="LRN already exists">
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-1 d-none d-sm-block">
                <label for="lname" class="form-control-label">*Lastname</label>
              </div>
              <div class="col col-sm-3 col-xs-12">
                <input type="text" id="lname" name="lname" placeholder="Lastname" class="input-sm form-control-sm form-control resFld" value="<?php echo $stud_info->stud_lname ?>" required data-parsley-required-message="">
              </div>
              <div class="col col-sm-1 d-none d-sm-block">
                <label for="fname" class="form-control-label">*Firstname</label>
              </div>
              <div class="col col-sm-3 col-xs-12">
                <input type="text" id="fname" name="fname" placeholder="Firstname" class="input-sm form-control-sm form-control resFld" value="<?php echo $stud_info->stud_fname ?>" required data-parsley-required-message="">
              </div>
              <div class="col col-sm-1 d-none d-sm-block">
                <label for="mname" class="form-control-label">Middlename</label>
              </div>
              <div class="col col-sm-3 col-xs-12">
                <input type="text" id="mname" name="mname" placeholder="Middlename" class="input-sm form-control-sm form-control resFld" value="<?php echo $stud_info->stud_mname ?>">
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-1 d-none d-sm-block">
                <label for="bdate" class="form-control-label">*Birthdate</label>
              </div>
              <div class="col col-sm-3 col-xs-12">
                <input type="date" id="bdate" name="bdate" placeholder="Birthdate" class="input-sm form-control-sm form-control resFld" value="<?php echo $stud_info->stud_bdate ?>" required data-parsley-type="date" data-parsley-required-message="" data-parsley-date-message="">
              </div>
              <div class="col col-sm-1 d-none d-sm-block">
                <label for="gender" class=" form-control-label">*Gender</label>
              </div>
              <div class="col col-sm-3 col-xs-12">
                <select class="input-sm form-control-sm form-control resFld" name="gender" required data-parsley-required-message="">
                  <option value=""></option>
                  <option value="1" <?php echo ($stud_info->stud_gender == 1) ? 'selected' : ''; ?>>Male</option>
                  <option value="2" <?php echo ($stud_info->stud_gender == 2) ? 'selected' : ''; ?>>Female</option>
                </select>
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-1 d-none d-sm-block">
                <label for="tnum" class="form-control-label">Tel. No.#</label>
              </div><!-- /.col col-sm-1 -->
              <div class="col col-sm-3">
                <input type="text" id="tnum" name="tnum" placeholder="Tel. No.#" class="input-sm form-control-sm form-control resFld" value="<?php echo ($stud_info->stud_tnum > 0) ? $stud_info->stud_tnum : '' ?>" data-parsley-type="number" data-parsley-type-message="" maxlength="7" data-parsley-length="[7, 7]" data-parsley-length-message="" data-parsley-length-message="">
              </div><!-- /.col col-sm-3 -->
              <div class="col col-sm-1 d-none d-sm-block">
                <label for="cnum" class="form-control-label">Cel. No.#</label>
              </div><!-- /.col col-sm-1 -->
              <div class="col col-sm-3">
                <input type="text" id="cnum" name="cnum" placeholder="Cel. No.#" class="input-sm form-control-sm form-control resFld" value="<?php echo ($stud_info->stud_cnum > 0) ? $stud_info->stud_cnum : '' ?>" data-parsley-type="number" data-parsley-type-message="" maxlength="11" data-parsley-length="[11, 11]" data-parsley-length-message="" data-parsley-length-message="">
              </div><!-- /.col col-sm-3 -->
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-2 d-none d-sm-block">
                <label for="eadd" class="form-control-label">E-mail Address</label>
              </div>
              <div class="col col-sm-10">
                <input type="email" id="eadd" name="eadd" placeholder="E-mail Address" class="input-sm form-control-sm form-control resFld" value="<?php echo $stud_info->stud_email ?>" data-parsley-type="email" data-parsley-type-message="">
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-2 d-none d-sm-block">
                <label for="cur_addrs" class="form-control-label">*Current Address</label>
              </div>
              <div class="col col-sm-10">
                <input type="text" id="cur_addrs" name="cur_addrs" placeholder="Current Address" class="input-sm form-control-sm form-control resFld" value="<?php echo $stud_info->stud_cur_adrs ?>" required data-parsley-required-message="">
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-2 d-none d-sm-block">
                <label for="perm_addrs" class="form-control-label">*Permanent Address</label>
              </div>
              <div class="col col-sm-10">
                <input type="text" id="perm_addrs" name="perm_addrs" placeholder="Permanent Address" class="input-sm form-control-sm form-control resFld" value="<?php echo $stud_info->stud_perm_adrs ?>" required data-parsley-required-message="">
                <small id="" class="form-text text-muted">
                  <input type="checkbox" name="addr_ticker" id="addr_ticker">
                  <label for="addr_ticker">Check this box if current address is the same with permanent address</label>
                </small>
              </div>
            </div><!-- /.row form-group -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
        <div class="card">
          <div class="card-header">
            <strong>Additional Information</strong>
          </div><!-- /.card-header -->
          <div class="card-body form-horizontal">
            <div class="row form-group">
              <div class="col col-sm-2 d-none d-sm-block">
                <label for="grdnsName" class="form-control-label">*Guardian's Name</label>
              </div>
              <div class="col col-sm-10">
                <input type="text" id="grdnsName" name="grdns_name" placeholder="Guardian's Name" class="input-sm form-control-sm form-control" value="<?php echo $stud_info->stud_grdns_name ?>" required data-parsley-required-message="" maxlength="50">
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-2 d-none d-sm-block">
                <label for="tnum1" class=" form-control-label">Telephone Number</label>
              </div>
              <div class="col col-sm-3">
                <input type="text" id="tnum1" name="tnum1" placeholder="Tel. No.#" class="input-sm form-control-sm form-control" value="<?php echo $stud_info->stud_grdns_tnum ?>" data-parsley-type="number" maxlength="7" data-parsley-length="[7, 7]" data-parsley-type-message="" data-parsley-length-message="">
              </div>
              <div class="col col-sm-2 d-none d-sm-block">
                <label for="cnum1" class=" form-control-label">Cellphone Number</label>
              </div>
              <div class="col col-sm-3">
                <input type="text" id="cnum1" name="cnum1" placeholder="Cel. No.#" class="input-sm form-control-sm form-control" value="<?php echo $stud_info->stud_grdns_cnum ?>" data-parsley-type="number" maxlength="11" data-parsley-length="[11, 11]" data-parsley-type-message="" data-parsley-length-message="">
              </div>
            </div>
            <div class="row form-group">
              <div class="col col-sm-2 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                <label for="addrs2" class=" form-control-label">*Residing Address</label>
              </div>
              <div class="col col-sm-10">
                <input type="text" id="addrs2" name="addrs2" placeholder="Address" class="input-sm form-control-sm form-control" value="<?php echo $stud_info->stud_grdns_adrs ?>" required data-parsley-required-message="">
              </div>
            </div><!-- /.row form-group -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
        <div class="card">
          <div class="card-header">
            <strong>Credentials</strong>
          </div><!-- /.card-header -->
          <div class="card-body form-horizontal">
            <div class="row form-group">
              <div class="col col-sm-12">
                <div class="form-check">
                  <div class="checkbox col-sm-4 col-xs-12">
                    <label for="bCertPSA" class="form-check-label ">
                      <input type="checkbox" id="bCertPSA" name="bCertPSA" value="<?php echo ($stud_info->bCertPSA) ? 1 : 0; ?>" class="form-check-input docu" <?php echo ($stud_info->bCertPSA) ? 'checked' : ''; ?>>Birth Certificate (PSA)
                    </label>
                  </div>
                  <div class="checkbox col-sm-4 col-xs-12">
                    <label for="certGMC" class="form-check-label ">
                      <input type="checkbox" id="certGMC" name="certGMC" value="<?php echo ($stud_info->certGMC) ? 1 : 0; ?>" class="form-check-input docu" <?php echo ($stud_info->certGMC) ? 'checked' : ''; ?>> Certificate of Good Moral
                    </label>
                  </div>
                  <div class="checkbox col-sm-4 col-xs-12">
                    <label for="certHonDis" class="form-check-label ">
                      <input type="checkbox" id="certHonDis" name="certHonDis" value="<?php echo ($stud_info->certHonDis) ? 1 : 0; ?>" class="form-check-input docu" <?php echo ($stud_info->certHonDis) ? 'checked' : ''; ?>> Certificate of Honourable Dismissal
                    </label>
                  </div>
                  <div class="checkbox col-sm-4 col-xs-12">
                    <label for="frm138" class="form-check-label ">
                      <input type="checkbox" id="frm138" name="frm138" value="<?php echo ($stud_info->frm138) ? 1 : 0; ?>" class="form-check-input docu" <?php echo ($stud_info->frm138) ? 'checked' : ''; ?>> Form 138
                    </label>
                  </div>
                  <div class="checkbox col-sm-4 col-xs-12">
                    <label for="frm137" class="form-check-label ">
                      <input type="checkbox" id="frm137" name="frm137" value="<?php echo ($stud_info->frm137) ? 1 : 0; ?>" class="form-check-input docu" <?php echo ($stud_info->frm137) ? 'checked' : ''; ?>> Form 137
                    </label>
                  </div>
                </div>
              </div>
            </div><!-- /.row form-group -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
        <div class="card">
          <div class="card-footer">
            <button type="submit" id="submitBtn" class="btn btn-outline-primary btn-sm">
              <i class="fa fa-check"></i> Update
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
<script src="<?php echo base_url('assets/assets/js/pages/registrar/seniorhs/stud_frm_validation.js'); ?>"></script>