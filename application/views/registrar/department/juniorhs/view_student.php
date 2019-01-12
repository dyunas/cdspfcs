<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Junior High School</h1>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-4 -->
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li><?php echo anchor(site_url('registrar/dept/'.$this->uri->segment(3)), 'Junior High School'); ?></li>
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
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <img class="mx-auto d-block" src="<?php echo base_url('assets/images/avatar/blank_profile_pic.jpg'); ?>">
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col-md-3 -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">
            <strong>Learner Basic Information</strong>
          </div><!-- /.card-header -->
          <div class="card-body form-horizontal">
            <div class="row form-group">
              <div class="col-sm-1 d-none d-sm-block">
                <label for="LRN" class=" form-control-label">LRN</label>
              </div>
              <div class="col-sm-4 col-xs-12">
                <?php echo $stud_info->stud_lrn ?>
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col-sm-1 d-none d-sm-block">
                <label class="form-control-label">Name</label>
              </div>
              <div class="col-sm-9 col-xs-12">
                <?php echo $stud_info->stud_lname.', '.$stud_info->stud_fname.' '.$stud_info->stud_mname ?>
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col-sm-2 d-none d-sm-block">
                <label for="bdate" class="form-control-label">Birthdate</label>
              </div>
              <div class="col-sm-3 col-xs-12">
                <?php echo $stud_info->stud_bdate ?>
              </div>
              <div class="col-sm-1 d-none d-sm-block">
                <label for="gender" class=" form-control-label">Age</label>
              </div>
              <div class="col-sm-2 col-xs-12">
                <?php
                  $bdate = $stud_info->stud_bdate;
                  $now = date('Y-m-d');
                  $diff = date_diff(date_create($bdate), date_create($now));

                  echo ($stud_info->stud_bdate != '0000-00-00') ? $diff->format('%y') : '';
                ?>
              </div>
              <div class="col-sm-1 d-none d-sm-block">
                <label for="gender" class=" form-control-label">Gender</label>
              </div>
              <div class="col-sm-3 col-xs-12">
                <?php echo $stud_info->stud_gender ?>
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col-sm-2 d-none d-sm-block">
                <label for="tnum" class="form-control-label">Tel. No.#</label>
              </div><!-- /.col-sm-1 -->
              <div class="col-sm-3">
                <?php echo (intval($stud_info->stud_tnum) != 0) ? $stud_info->stud_tnum : 'N/A'; ?>
              </div><!-- /.col-sm-3 -->
              <div class="col-sm-2 d-none d-sm-block">
                <label for="cnum" class="form-control-label">Cel. No.#</label>
              </div><!-- /.col-sm-1 -->
              <div class="col-sm-3">
                <?php echo (intval($stud_info->stud_cnum) != 0) ? $stud_info->stud_cnum : 'N/A'; ?>
              </div><!-- /.col-sm-3 -->
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col-sm-2 d-none d-sm-block">
                <label for="eadd" class="form-control-label">E-mail Address</label>
              </div>
              <div class="col-sm-10">
                <?php echo $stud_info->stud_email ?>
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col-sm-2 d-none d-sm-block">
                <label for="cur_addrs" class="form-control-label">Current Address</label>
              </div>
              <div class="col-sm-10">
                <?php echo $stud_info->stud_cur_adrs ?>
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col-sm-2 d-none d-sm-block">
                <label for="perm_addrs" class="form-control-label">Permanent Address</label>
              </div>
              <div class="col-sm-10">
                <?php echo $stud_info->stud_perm_adrs ?>
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
              <div class="col-sm-2 d-none d-sm-block">
                <label for="grdnsName" class=" form-control-label">Guardian's Name</label>
              </div>
              <div class="col-sm-5">
                <?php echo $stud_info->stud_grdns_name ?>
              </div>
              <div class="col-sm-2 d-none d-sm-block">
                <label for="cnum1" class=" form-control-label">Contact Number</label>
              </div>
              <div class="col-sm-3">
                <?php echo $stud_info->stud_grdns_cnum ?>
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col-sm-2 d-none d-sm-block">
                <label for="addrs2" class=" form-control-label">Address</label>
              </div>
              <div class="col-sm-10">
                <?php echo $stud_info->stud_grdns_adrs ?>
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
                      <input type="checkbox" id="bCertPSA" name="bCertPSA" value="0" class="form-check-input docu" <?php echo ($stud_info->bCertPSA) ? 'checked="checked"' : '' ?> disabled>Birth Certificate (PSA)
                    </label>
                  </div>
                  <div class="checkbox col-sm-4 col-xs-12">
                    <label for="certGMC" class="form-check-label ">
                      <input type="checkbox" id="certGMC" name="certGMC" value="0" class="form-check-input docu" <?php echo ($stud_info->certGMC) ? 'checked="checked"' : '' ?> disabled> Certificate of Good Moral
                    </label>
                  </div>
                  <div class="checkbox col-sm-4 col-xs-12">
                    <label for="certHonDis" class="form-check-label ">
                      <input type="checkbox" id="certHonDis" name="certHonDis" value="0" class="form-check-input docu" <?php echo ($stud_info->certHonDis) ? 'checked="checked"' : '' ?> disabled> Certificate of Honourable Dismissal
                    </label>
                  </div>
                  <div class="checkbox col-sm-4 col-xs-12">
                    <label for="frm137" class="form-check-label ">
                      <input type="checkbox" id="frm137" name="frm137" value="0" class="form-check-input docu" <?php echo ($stud_info->frm137) ? 'checked="checked"' : '' ?> disabled> Form 137
                    </label>
                  </div>
                  <div class="checkbox col-sm-4 col-xs-12">
                    <label for="frm138" class="form-check-label ">
                      <input type="checkbox" id="frm138" name="frm138" value="0" class="form-check-input docu" <?php echo ($stud_info->frm138) ? 'checked="checked"' : '' ?> disabled> Form 138
                    </label>
                  </div>
                </div>
              </div>
            </div><!-- /.row form-group -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col-md-9 -->
    </div><!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong>Assessment</strong>
          </div><!-- /.card-header -->
          <div class="card-body">
            //
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
  </div><!-- /.animated fadeIn -->
</div> <!-- .content -->