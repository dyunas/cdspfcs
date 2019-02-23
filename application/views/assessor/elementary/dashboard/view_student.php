<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Elementary</h1>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-4 -->
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li><?php echo anchor(site_url('assessor_elem/'.$this->uri->segment(2)), 'Elementary'); ?></li>
          <li class="active"><?php echo $this->uri->segment(3); ?></li>
          <li class="active"><?php echo $this->uri->segment(4); ?></li>
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
                <label for="LRN" class=" form-control-label">LRN:</label>
              </div>
              <div class="col-sm-3 col-xs-12">
                <?php echo $stud_info->stud_lrn ?>
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-1 d-none d-sm-block">
                <label class="form-control-label">Name:</label>
              </div>
              <div class="col col-sm-9 col-xs-12">
                <?php echo $stud_info->stud_lname.', '.$stud_info->stud_fname.' '.$stud_info->stud_mname ?>
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-1 d-none d-sm-block">
                <label for="bdate" class="form-control-label">Birthdate:</label>
              </div>
              <div class="col col-sm-2 col-xs-12">
                <?php
                  $date = new DateTime($stud_info->stud_bdate);
                  echo date_format($date, 'M d, Y');
                ?>
              </div>
              <div class="col-sm-1 d-none d-sm-block">
                <label for="gender" class=" form-control-label">Age:</label>
              </div>
              <div class="col-sm-1 col-xs-12">
                <?php
                  $bdate = $stud_info->stud_bdate;
                  $now = date('Y-m-d');
                  $diff = date_diff(date_create($bdate), date_create($now));

                  echo ($stud_info->stud_bdate != '0000-00-00') ? $diff->format('%y') : '';
                ?>
              </div>
              <div class="col-sm-1 d-none d-sm-block">
                <label for="gender" class=" form-control-label">Gender:</label>
              </div>
              <div class="col-sm-3 col-xs-12">
                <?php echo $stud_info->gender ?>
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col-sm-2 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                <label for="tnum" class="form-control-label">Telephone Number:</label>
              </div><!-- /.col-sm-1 -->
              <div class="col-sm-2">
                <?php echo (intval($stud_info->stud_tnum) != 0) ? $stud_info->stud_tnum : 'N/A'; ?>
              </div><!-- /.col-sm-3 -->
              <div class="col-sm-2 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                <label for="cnum" class="form-control-label">Cellphone Number:</label>
              </div><!-- /.col-sm-1 -->
              <div class="col-sm-3">
                <?php echo (intval($stud_info->stud_cnum) != 0) ? $stud_info->stud_cnum : 'N/A'; ?>
              </div><!-- /.col-sm-3 -->
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col-sm-2 d-none d-sm-block">
                <label for="eadd" class="form-control-label">E-mail Address:</label>
              </div>
              <div class="col-sm-10">
                <?php echo $stud_info->stud_email ?>
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col-sm-2 d-none d-sm-block">
                <label for="cur_addrs" class="form-control-label">Current Address:</label>
              </div>
              <div class="col-sm-10">
                <?php echo $stud_info->stud_cur_adrs ?>
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col-sm-2 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                <label for="perm_addrs" class="form-control-label">Permanent Address:</label>
              </div>
              <div class="col-sm-10">
                <?php echo $stud_info->stud_perm_adrs ?>
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
            <strong>Admission Status</strong>
          </div><!-- /.card-header -->
          <div class="card-body form-horizontal">
            <div class="row form-group">
              <div class="d-none d-sm-block col-sm-1">
                <label for="stud_grade_lvl" class="form-control-label" placeholder="level">Level:</label>
              </div><!-- col col-sm-1 -->
              <div class="col-sm-1 col-xs-6">
                <?php echo $stud_info->grd_lvl ?>
              </div><!-- col col-sm-3 -->
              <div class="d-none d-sm-block col col-sm-1">
                <label for="stud_acad_yr" class="form-control-label">S.Y.:</label>
              </div><!-- col col-sm-1 -->
              <div class="col col-sm-2">
                <?php echo $stud_info->acad_yr ?>
              </div><!-- col col-sm-2 -->
              <div class="col-sm-1 d-none d-sm-block">
                <label class=" form-control-label">Status:</label>
              </div>
              <div class="col-sm-2 col-xs-12">
                <?php echo $stud_info->stud_status ?>
              </div><!-- /.col-sm-2 -->
            </div><!-- /.row form-group -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong class="pull-left">Statement of Account</strong>
            <button type="button" id="addNewAssessment" data-toggle="modal" data-target="#newAssessment" data-backdrop="static" data-keyboard="false" class="btn btn-sm btn-outline-primary pull-right"><i class="ti ti-plus"></i> Add new assessment</button>
          </div><!-- /.card-header -->
          <div class="card-body form-horizontal">
            <div class="row form-group">
            </div><!-- /.row form-group -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
  </div><!-- /.animated fadeIn -->
</div> <!-- .content -->

<div class="modal fade" id="newAssessment" tabindex="-1" role="dialog" aria-labelledby="newAssessmentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-full" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newAssessmentModalLabel">New Assessment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <?php echo form_open('', 'role="form" id="assessmentForm"'); ?>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
              <div class="card-header">
                <strong>Admission Status</strong>
              </div><!-- /.card-header -->
              <div class="card-body form-horizontal">
                <div class="row form-group">
                  <div class="d-none d-sm-block col-sm-1">
                    <label for="stud_grade_lvl" class="form-control-label" placeholder="level">Level:</label>
                  </div><!-- col col-sm-1 -->
                  <div class="col-sm-1 col-xs-6">
                    <?php echo $stud_info->grd_lvl ?>
                  </div><!-- col col-sm-3 -->
                  <div class="d-none d-sm-block col col-sm-1">
                    <label for="stud_acad_yr" class="form-control-label">S.Y.:</label>
                  </div><!-- col col-sm-1 -->
                  <div class="col col-sm-2">
                    <?php echo $stud_info->acad_yr ?>
                  </div><!-- col col-sm-2 -->
                  <div class="col-sm-1 d-none d-sm-block">
                    <label class=" form-control-label">Status:</label>
                  </div>
                  <div class="col-sm-2 col-xs-12">
                    <?php echo $stud_info->stud_status ?>
                  </div><!-- /.col-sm-2 -->
                </div><!-- /.row form-group -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div>
        </div>
        <small style="display:block;padding: 10px 10px 10px 0px;font-size: 11px;"><i>Fields with (*) are mandatory. Please don't leave it blank</i></small>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
              <div class="card-header">
                <strong>Assessment</strong>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>SCHOOL FEES</th>
                      <th>AMOUNT</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($fees): ?>
                      <?php foreach ($fees as $fee): ?>
                      <tr>
                        <td>
                          <div class="checkbox">
                            <label for="<?php echo $fee->row_id ?>" class="form-check-label ">
                              <input type="checkbox" id="<?php echo $fee->row_id ?>" data-name="<?php echo $fee->fee_code ?>" data-id="<?php echo $fee->row_id ?>" class="fees form-check-input"> <?php echo $fee->fee_name; ?>
                            </label>
                          </div>
                        </td>
                        <td>
                          <span><?php echo 'Php '.number_format($fee->amount, 2, '.', ','); ?></span>
                          <input type="hidden" id="rowAmount<?php echo $fee->row_id ?>" value="<?php echo $fee->amount; ?>">
                        </td>
                      </tr>
                      <?php endforeach ?>
                    <?php else: ?>
                    <?php endif ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td>TOTAL:</td>
                      <td><span id="total"></span><input type="hidden" name="totalAmount" id="totalAmount" value=""></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="col col-sm-2 d-none d-sm-block">
                          <label for="tnum1" class=" form-control-label">Discount</label>
                        </div>
                        <div class="col col-sm-6">
                          <select name="discount" id="discount" class="form-control form-control-sm" disabled>
                            <option value="">---</option>
                            <?php foreach ($discounts as $discount): ?>
                              <option value="<?php echo $discount->disc_code ?>"><?php echo $discount->disc_code ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr id="discHere"></tr>
                    <tr>
                      <td style="font-weight: bold;font-size: 14px;"><em>TOTAL AMOUNT:</em></td>
                      <td style="text-align: right;font-style: italic;"><span id="totAmount"></span><input type="hidden" name="grandTotal" id="grandTotal" value=""></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div>Payment Scheme</div>
            <div>Payables</div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="submitBtn" class="btn btn-outline-primary btn-sm">
          <i class="fa fa-check"></i> Create
        </button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
      <?php form_close(); ?>
    </div>
  </div>
</div>

<script src="<?php echo base_url('assets/parsley/dist/parsley.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/pages/assessor/elementary/assessment.js'); ?>"></script>