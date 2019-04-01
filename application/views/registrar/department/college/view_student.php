<link rel="stylesheet" href="<?php echo base_url('assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'); ?>">
<style type="text/css">
  .tuition-fee {
    width: 20%!important;
    margin:  0px;
  }
</style>
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>College</h1>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-4 -->
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li><?php echo anchor(site_url('registrar/dept/'.$this->uri->segment(3)), 'College'); ?></li>
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
            <?php if ($stud_info->stud_avatar == ""): ?>
              <img class="mx-auto d-block" src="<?php echo base_url('assets/images/avatar/blank_profile_pic.jpg'); ?>">
            <?php else: ?>
              <img class="mx-auto d-block" src="<?php echo base_url('assets/uploads/avatars/'.$stud_info->stud_avatar); ?>">
            <?php endif; ?>
          </div><!-- /.card-body -->
          <div class="card-footer">
            <button type="button" id="uploadMod" data-toggle="modal" data-target="#uploadModal" data-backdrop="static" data-keyboard="false" class="btn btn-sm btn-outline-primary ml-5"><i class="ti ti-plus"></i> Upload Avatar</button>
          </div>
        </div><!-- /.card -->
      </div><!-- /.col-md-3 -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">
            <strong>Learner Basic Information</strong>
            <a href="<?php echo site_url('registrar/dept/'.$this->uri->segment(3).'/edit/'.$stud_info->stud_id); ?>" class="pull-right btn btn-sm btn-outline-primary"><i class="ti ti-pencil-alt"></i> Edit student info</a>
          </div><!-- /.card-header -->
          <div class="card-body form-horizontal">
            <div class="row form-group">
              <div class="col-sm-1 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                <label for="LRN" class=" form-control-label">Stud. ID:</label>
              </div>
              <div class="col-sm-3 col-xs-12">
                <?php echo $stud_info->stud_id ?>
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
        <div class="card">
          <div class="card-header">
            <strong>Additional Information</strong>
          </div><!-- /.card-header -->
          <div class="card-body form-horizontal">
            <div class="row form-group">
              <div class="col col-sm-2 d-none d-sm-block">
                <label for="grdnsName" class="form-control-label">Guardian's Name:</label>
              </div>
              <div class="col col-sm-6">
                <?php echo $stud_info->stud_grdns_name ?>
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-2 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                <label for="cnum1" class=" form-control-label">Telephone Number:</label>
              </div>
              <div class="col col-sm-3">
                <?php echo ($stud_info->stud_grdns_tnum != 0) ? $stud_info->stud_grdns_tnum : 'N/A' ?>
              </div>
              <div class="col col-sm-2 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                <label for="cnum1" class=" form-control-label">Cellphone Number:</label>
              </div>
              <div class="col col-sm-3">
                <?php echo $stud_info->stud_grdns_cnum ?>
              </div>
            </div>
            <div class="row form-group">
              <div class="col col-sm-2 d-none d-sm-block">
                <label for="addrs2" class=" form-control-label">Residing Address:</label>
              </div>
              <div class="col col-sm-10">
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
                  <div class="checkbox col-sm-4 col-xs-12">
                    <label for="TOR" class="form-check-label ">
                      <input type="checkbox" id="TOR" name="TOR" value="0" class="form-check-input docu" <?php echo ($stud_info->TOR) ? 'checked="checked"' : '' ?> disabled> Transcript of Record
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
            <strong>Admission Status</strong>
            <button type="button" id="editAdmissionStatus" data-toggle="modal" data-target="#editAdmission" data-backdrop="static" data-keyboard="false" class="btn btn-sm btn-outline-primary pull-right"><i class="ti ti-pencil-alt"></i> Edit admission status</button>
          </div><!-- /.card-header -->
          <div class="card-body form-horizontal">
            <div class="row form-group">
              <div class="col col-sm-12">
                <div class="col-sm-1 d-none d-sm-block">
                  <label class=" form-control-label">Level:</label>
                </div>
                <div class="col-sm-1 col-xs-12">
                  <?php echo $stud_info->stud_year_lvl ?>
                </div>
                <div class="col-sm-1 d-none d-sm-block">
                  <label class=" form-control-label">Semester:</label>
                </div>
                <div class="col-sm-1 col-xs-12">
                  <?php echo $stud_info->semester ?>
                </div>
                <div class="col-sm-1 d-none d-sm-block">
                  <label class=" form-control-label">Course:</label>
                </div>
                <div class="col-sm-1 col-xs-12">
                  <?php echo $stud_info->course_code ?>
                </div>
                <div class="col-sm-1 d-none d-sm-block">
                  <label class=" form-control-label">A.Y.:</label>
                </div>
                <div class="col-sm-2 col-xs-12">
                  <?php echo $stud_info->acad_yr ?>
                </div>
                <div class="col-sm-1 d-none d-sm-block">
                  <label class=" form-control-label">Status:</label>
                </div>
                <div class="col-sm-2 col-xs-12">
                  <?php echo $stud_info->stud_status ?>
                </div>
              </div><!-- /.col col-sm-12 -->
            </div><!-- /.row form-group -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <div class="card" id="soaReload">
          <div class="card-header">
            <strong class="pull-left">Statement of Account</strong>
          </div><!-- /.card-header -->
          <div class="card-body form-horizontal">
          <?php if ($assessmentInfo): ?>
            <div class="custom-tab">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <?php foreach($assessmentInfo as $row): ?>
                    <a class="nav-items nav-link" id="<?php echo $row->rowID; ?>" data-id="<?php echo $row->gradeLevel ?>" data-assessmentID="<?php echo $row->assessmentID ?>" data-toggle="tab" href="<?php echo '#custom-nav-'.$row->rowID; ?>" role="tab" aria-controls="custom-nav-profile" aria-selected="false"><?php echo $row->gradeLevel.' '.$row->course_code; ?></a>
                  <?php endforeach; ?>
                  <a class="nav-item nav-link" id="custom-nav-other-tab" data-toggle="tab" href="#custom-nav-other" role="tab" aria-controls="custom-nav-other" aria-selected="false">Others</a>
                  <a class="nav-item nav-link" id="custom-nav-history-tab" data-toggle="tab" data-id="<?php echo $stud_info->stud_id ?>" href="#custom-nav-history" role="tab" aria-controls="custom-nav-history" aria-selected="false">History</a>
                </div>
              </nav>
              <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                <?php foreach($assessmentInfo as $row): ?>
                  <div class="tab-pane fade" id="<?php echo 'custom-nav-'.$row->rowID ?>" data-id="<?php echo $row->gradeLevel ?>" data-assessmentID="<?php echo $row->assessmentID ?>" role="tabpanel" aria-labelledby="<?php echo 'custom-nav-'.$row->gradeLevel ?>">
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
                                      <label class="form-check-label">
                                        <input type="checkbox" class="checkFee form-check-input" data-id="<?php echo $fee->row_id ?>" data-assessmentID="<?php echo $row->assessmentID ?>" disabled> <?php echo $fee->fee_name; ?>
                                      </label>
                                    </div>
                                  </td>
                                  <td>
                                    <?php if(stripos($fee->fee_name, 'tuition') !== FALSE): ?>
                                      <input type="text" class="form-control-sm form-control tuition-fee" value="<?php echo $row->numUnits ?>" disabled>
                                    <?php elseif(stripos($fee->fee_name, 'thesis') !== FALSE): ?>
                                      <input type="text" class="form-control-sm form-control tuition-fee" value="<?php echo $row->numThesis ?>" disabled>
                                    <?php endif; ?>
                                  </td>
                                  <td>
                                    <?php if(stripos($fee->fee_name, 'tuition') !== FALSE): ?>
                                      <span><?php echo 'Php '.number_format(floatval($fee->amount) * intval($row->numUnits), 2, '.', ','); ?></span>
                                    <?php elseif(stripos($fee->fee_name, 'thesis') !== FALSE): ?>
                                      <span><?php echo 'Php '.number_format(floatval($fee->amount) * intval($row->numThesis), 2, '.', ','); ?></span>
                                    <?php else: ?>
                                      <span><?php echo 'Php '.number_format($fee->amount, 2, '.', ','); ?></span>
                                    <?php endif; ?>
                                  </td>
                                </tr>
                                <?php endforeach ?>
                              <?php else: ?>
                              <?php endif ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="2">TOTAL:</td>
                                <td><?php echo 'Php '.number_format($row->totalAmt, 2, '.', ','); ?></td>
                              </tr>
                              <tr>
                                <td style="font-weight: bold;font-size: 14px;" colspan="2"><em>TOTAL AMOUNT:</em></td>
                                <td style="text-align: right;font-style: italic;"><?php echo "Php ".number_format($row->grandTotal, 2, '.', ',') ?></span></td>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                    </div><!-- /.col-lg-6 col-md-6 col-sm-12 col-xs-12 -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="card">
                        <div class="card-header">
                          <strong>Payment Scheme</strong>
                        </div>
                        <div class="card-body">
                          <div class="col col-sm-6">
                            Payment Scheme:
                            <strong><?php echo $row->paymentScheme ?></strong>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          <strong>Discounts</strong>
                        </div>
                        <div class="card-body">
                          <div class="col col-sm-12">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <td colspan="3">
                                    <strong><?php echo ($row->discount) ? $row->discount : 'No discount'; ?></strong>
                                  </td>
                                </tr>
                                <tr>                            
                                  <?php
                                    if ($row->totalDiscount > 0):
                                      echo "<td><strong>".$row->totalDiscount."% in Tuition Fee</strong></td>";
                                      echo "<td><strong>Php ".number_format($row->totalDiscAmount, 2, '.', ',')."</strong></td>";
                                    endif;
                                  ?>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          <strong>Payables</strong>
                        </div>
                        <div class="card-body">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Payables</th>
                                <th>AmountDue</th>
                                <th>AmountPd</th>
                                <th>Balance</th>
                              </tr>
                            </thead>
                            <tbody id="assessmentPayables<?php echo $row->rowID; ?>"></tbody>
                          </table>
                        </div>
                      </div>
                    </div><!-- /.col-lg-6 col-md-6 col-sm-12 col-xs-12 -->
                  </div>
                <?php endforeach; ?>
                <div class="tab-pane fade" id="custom-nav-other" role="tabpanel" aria-labelledby="custom-nav-other-tab">
                  <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                      butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, irure terry richardson ex sd. Alip placeat salvia cillum iphone. Seitan alip s cardigan american apparel, butcher voluptate nisi .
                  </p>
                </div>
                <div class="tab-pane fade" id="custom-nav-history" role="tabpanel" aria-labelledby="custom-nav-history-tab">
                  <table id="historyTbl" class="table table-striped table-bordered" width="100%">
                    <thead>
                      <th></th>
                      <th style="text-align: center;">O.R. Number</th>
                      <th style="text-align: center;">Invoice Number</th>
                      <th style="text-align: center;">Assessment ID</th>
                      <th>Cashier</th>
                      <th style="text-align: center;">Transaction Date</th>
                      <th style="text-align: center;">Action</th>
                    </thead>
                    <tbody>
                      <?php if ($paymentHistory): ?>
                        <?php foreach($paymentHistory as $row): ?>
                          <tr>
                            <td><?php echo $row->rowID ?></td>
                            <td><?php echo $row->orNum ?></td>
                            <td><?php echo $row->invoiceNum ?></td>
                            <td><?php echo $row->assessmentID ?></td>
                            <td><?php echo $row->fname.' '.$row->lname ?></td>
                            <td><?php echo $row->transDate ?></td>
                            <td><a href="#" data-toggle="modal" data-target="#historyModal" data-id="<?php echo $row->orNum ?>" data-backdrop="static" data-keyboard="false" class="checkHistory btn btn-outline-primary btn-sm"><i class="ti ti-eye"></i></a></td>
                          </tr>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="7">
                            <strong><div style="text-align: center;">Table emtpy</div></strong>
                          </td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- /.custom-tab -->
          <?php endif; ?>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
  </div><!-- /.animated fadeIn -->
</div> <!-- .content -->

<div class="modal fade" id="editAdmission" tabindex="-1" role="dialog" aria-labelledby="editAdmissionLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAdmissionLabel">Admission Status</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
              <form action="#" method="POST" id="editAdmissionForm">
              <input type="hidden" name="stud_id" value="<?php echo $stud_info->stud_id; ?>">
              <div class="card-body form-horizontal">
                <div class="row form-group">
                  <div class="d-none d-sm-block col-sm-1 col-xs-2">
                    <label for="stud_course" class="form-control-label" placeholder="Course">*Course</label>
                  </div><!-- col col-sm-1 -->
                  <div class="col-sm-2 col-xs-6">
                    <select class="input-sm form-control-sm form-control" id="stud_course" name="stud_course" required data-parsley-required-message="">
                      <option value="<?php echo $stud_info->stud_course ?>" selected><?php echo $stud_info->stud_course ?></option>
                    </select>
                  </div><!-- col col-sm-3 -->
                  <div class="d-none d-sm-block col-sm-1 col-xs-1">
                    <label for="stud_year_lvl" class="form-control-label" placeholder="level">*Level</label>
                  </div><!-- col col-sm-1 -->
                  <div class="col-sm-2 col-xs-6">
                    <select class="input-sm form-control-sm form-control" id="yr_lvl" name="stud_year_lvl" required data-parsley-required-message="">
                      <option value="">---</option>
                    </select>
                  </div><!-- col col-sm-3 -->
                  <div class="d-none d-sm-block col-sm-1">
                    <label for="stud_acad_yr" class="form-control-label">A.Y.</label>
                  </div><!-- col col-sm-1 -->
                  <div class="col col-sm-2">
                    <?php echo $acad_yr->acad_yr ?>
                    <input type="hidden" class="input-sm form-control-sm form-control" name="stud_acad_yr" value="<?php echo $acad_yr->acad_id; ?>" readonly>
                  </div><!-- col col-sm-3 -->
                </div><!-- /.row form-group -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="historyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-full" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="historyModalLabel">Student Invoice</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
              <div class="card-header">
                <strong>Learner Basic Information</strong>
              </div><!-- /.card-header -->
              <div class="card-body form-horizontal">
                <div class="row form-group">
                  <div class="col-sm-1 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                    <label for="" class=" form-control-label">Stud. ID:</label>
                  </div>
                  <div class="col-sm-3 col-xs-12">
                    <?php echo $stud_info->stud_id ?>
                    <input type="hidden" name="studid" value="<?php echo $stud_info->stud_id ?>">
                  </div>
                  <div class="col-sm-1 d-none d-sm-block">
                    <label for="" class=" form-control-label">Invoice No#:</label>
                  </div>
                  <div class="col-sm-2 col-xs-12">
                    <span id="invoiceNum"></span>
                  </div>
                  <div class="col-sm-1 d-none d-sm-block">
                    <label for="" class=" form-control-label">OR No#:</label>
                  </div>
                  <div class="col-sm-2 col-xs-12">
                    <span id="orNum"></span>
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
              </div><!-- /.card-body -->
            </div><!-- /.card -->
            <div class="card">
              <div class="card-header">
                Statement of Account
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Payables</th>
                      <th style="text-align:right;">AmountDue</th>
                      <th style="text-align:right;">Previous Payment</th>
                      <th style="text-align:right;">Balance</th>
                    </tr>
                  </thead>
                  <tbody id="historySoahere"></tbody>
                </table>
              </div>
            </div>
            <br/>
            <div class="card">
              <div class="card-body form-horizontal">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="row form-group">
                      <div class="col col-sm-2 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                        <label class="form-control-label"><strong>Amount Paid:</strong></label>
                      </div>
                      <div class="col col-sm-3 col-xs-12" style="padding: 0px 0px 0px 0px;">
                        <strong><span id="historyAmountPaid"></span></strong>
                      </div>
                    </div><!-- /.row form-group -->
                    <div class="row form-group">
                      <div class="col col-sm-2 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                        <label class="form-control-label"><strong>Change:</strong></label>
                      </div>
                      <div class="col col-sm-3 col-xs-12" style="padding: 0px 0px 0px 0px;">
                        <strong><span id="historySukli"></span></strong>
                      </div>
                    </div><!-- /.row form-group -->
                    <div class="row form-group">
                      <div class="col col-sm-2 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                        <label class="form-control-label"><strong>Balance:</strong></label>
                      </div>
                      <div class="col col-sm-3 col-xs-12" style="padding: 0px 0px 0px 0px;">
                        <strong><span id="historyBalanceHere"></span></strong>
                      </div>
                    </div><!-- /.row form-group -->
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="row form-group">
                      <div class="col col-sm-2 d-none d-sm-block">
                        <label class="form-control-label"><strong>Cashier:</strong></label>
                      </div>
                      <div class="col col-sm-3 col-xs-12">
                        <strong><span id="cashierName"></span></strong>
                      </div>
                    </div><!-- /.row form-group -->
                    <div class="row form-group">
                      <div class="col col-sm-2 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                        <label class="form-control-label"><strong>Transaction Date:</strong></label>
                      </div>
                      <div class="col col-sm-9 col-xs-12">
                        <strong><div id="transDate"></div></strong>
                      </div>
                    </div><!-- /.row form-group -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadModalLabel">Upload Avatar</h5>
      </div>
      <?php echo form_open_multipart('', 'id="uploadForm"'); ?>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <input type="file" id="avatar" name="stud_avatar" required>
            <input type="hidden" id="studId" name="stud_id" value="<?php echo $stud_info->stud_id; ?>" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary btn-sm">Upload</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/init-scripts/data-table/datatables-init.js'); ?>"></script>

<script src="<?php echo base_url('assets/sweet-alert/dist/sweetalert2.all.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/parsley/dist/parsley.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/pages/assessor/college/assessment.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/pages/assessor/college/assessmentInfo.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/pages/registrar/college/paymentHistory.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/pages/registrar/college/uploadAvatar.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/pages/registrar/college/stud_frm_validation.js'); ?>"></script>
<script>
  jQuery(document).ready(function() {
    var courseID = <?php echo $stud_info->stud_course; ?>;
    var yearLevel = '<?php echo $stud_info->stud_year_lvl; ?>';
    jQuery.ajax({
      type: 'GET',
      dataType: 'json',
      url: '../get_student_course',
      success:function(course){
        // console.log(course);
        var html = '<option value="">Course</option>';
        if (course != false) {
          for(var x = 0; x <= course.length-1; x++){
            if (courseID == course[x].course_id){
              html += '<option value="'+course[x].course_id+'" selected>'+course[x].course_code+'</option>';
            } else {
              html += '<option value="'+course[x].course_id+'">'+course[x].course_code+'</option>';
            }
          }
        }
        // console.log(html);
        jQuery('#stud_course').html(html);
      }
    });

    jQuery.ajax({
      type: 'GET',
      dataType: 'json',
      data: {id: courseID},
      url: '../get_course_years',
      success:function(yrLvl){
        var html = '<option value="">---</option>';
        var suffix = ['st Yr', 'nd Yr', 'rd Yr', 'th Yr', 'th Yr'];
        if (yrLvl != false) {
          for(var x = 1; x <= yrLvl.no_of_yrs; x++){
           if (yearLevel == x+suffix[x-1]) {
             html += '<option value="'+x+suffix[x-1]+'" selected>'+x+'</option>';
           } else {
             html += '<option value="'+x+suffix[x-1]+'">'+x+'</option>';
           }
          }
        }
        // console.log(html);
        jQuery('#yr_lvl').html(html);
      }
    });

    jQuery('#stud_course').change(function() {
      var course_id = jQuery('#stud_course').val();
      jQuery.ajax({
        type: 'GET',
        dataType: 'json',
        data: {id: course_id},
        url: '../get_course_years',
        success:function(yrLvl){
          console.log(yrLvl);
          var html = '<option value="">---</option>';
          var suffix = ['st Yr', 'nd Yr', 'rd Yr', 'th Yr', 'th Yr'];
          if (yrLvl != false) {
            for(var x = 1; x <= yrLvl.no_of_yrs; x++){
              html += '<option value="'+x+suffix[x-1]+'">'+x+'</option>';
            }
          }
          // console.log(html);
          jQuery('#yr_lvl').html(html);
        }
      });
    });
  });
</script>