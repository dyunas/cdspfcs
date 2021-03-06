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
          <li><?php echo anchor(site_url('assessor_elem/'.$this->uri->segment(2)), 'Junior High School'); ?></li>
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
        <div class="card" id="soaReload">
          <div class="card-header">
            <strong class="pull-left">Statement of Account</strong>
            <button type="button" id="addNewAssessment" data-toggle="modal" data-target="#newAssessment" data-backdrop="static" data-keyboard="false" class="btn btn-sm btn-outline-primary pull-right"><i class="ti ti-plus"></i> Add new assessment</button>
          </div><!-- /.card-header -->
          <div class="card-body form-horizontal">
          <?php if ($assessmentInfo): ?>
            <div class="custom-tab">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <?php foreach($assessmentInfo as $row): ?>
                    <a class="nav-item nav-link" id="<?php echo $row->rowID; ?>" data-id="<?php echo $row->gradeLevel ?>" data-assessmentID="<?php echo $row->assessmentID ?>" data-toggle="tab" href="<?php echo '#custom-nav-'.$row->rowID; ?>" role="tab" aria-controls="custom-nav-profile" aria-selected="false"><?php echo $row->grd_lvl; ?></a>
                  <?php endforeach; ?>
                  <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Others</a>
                  <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">History</a>
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
                                    <span><?php echo 'Php '.number_format($fee->amount, 2, '.', ','); ?></span>
                                  </td>
                                </tr>
                                <?php endforeach ?>
                              <?php else: ?>
                              <?php endif ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td>TOTAL:</td>
                                <td><?php echo 'Php '.number_format($row->totalAmt, 2, '.', ','); ?></td>
                              </tr>
                              <tr>
                                <td colspan="2">
                                  <div class="col col-sm-2 d-none d-sm-block">
                                    <label for="tnum1" class=" form-control-label">Discount</label>
                                  </div>
                                  <div class="col col-sm-6">
                                    <strong><?php echo $row->disc_code; ?></strong>
                                  </div>
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
                              <tr>
                                <td style="font-weight: bold;font-size: 14px;"><em>TOTAL AMOUNT:</em></td>
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
                <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                  <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                      butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, irure terry richardson ex sd. Alip placeat salvia cillum iphone. Seitan alip s cardigan american apparel, butcher voluptate nisi .
                  </p>
                </div>
                <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                  <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                      butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, irure terry richardson ex sd. Alip placeat salvia cillum iphone. Seitan alip s cardigan american apparel, butcher voluptate nisi .
                  </p>
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
      <input type="hidden" name="stud_id" value="<?php echo $stud_info->stud_lrn ?>">
      <input type="hidden" name="gradeLevel" value="<?php echo $stud_info->stud_grade_lvl ?>">
      <input type="hidden" id="totalDiscount" name="totalDiscount" value="0">
      <input type="hidden" id="totalDiscAmount" name="totalDiscAmount" value="0">
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
                              <input type="checkbox" name="paymentCode[<?php echo $fee->fee_code ?>]" id="<?php echo $fee->row_id ?>" data-name="<?php echo $fee->fee_code ?>" data-id="<?php echo $fee->row_id ?>" class="fees form-check-input" value="<?php echo $fee->row_id ?>"> <?php echo $fee->fee_name; ?>
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
                      <td colspan="2">
                        <div class="col col-sm-2 d-none d-sm-block">
                          <label for="tnum1" class=" form-control-label">Discount</label>
                        </div>
                        <div class="col col-sm-6">
                          <select name="discount" id="discount" class="form-control form-control-sm" disabled>
                            <option value="">---</option>
                            <?php foreach ($discounts as $discount): ?>
                              <option value="<?php echo $discount->row_id ?>"><?php echo $discount->disc_code ?></option>
                            <?php endforeach ?>
                          </select>
                          <input type="hidden" id="hidDiscount" value="0">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="checkbox col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label for="escGrant" class="form-check-label ">
                            <input type="checkbox" name="escGrant" id="escGrant" class="form-check-input" value="1" disabled>
                            ESC Grantee
                          </label>
                        </div>
                      </td>
                      <td>
                        <span id="escGrantDiscount"></span>
                        <input type="hidden" id="escGrantAmnt" name="escGrantAmnt" value="0">
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
            <div class="card">
              <div class="card-header">
                <strong>Payment Scheme</strong>
              </div>
              <div class="card-body">
                <div class="col col-sm-6">
                  <select name="paymentScheme" id="paymentScheme" class="form-control form-control-sm" disabled required>
                    <option value="">---</option>
                    <option value="CASH">CASH</option>
                    <option value="MINIMUM">MINIMUM</option>
                    <option value="PARTIAL">PARTIAL</option>
                    <option value="ENPL">ENPL</option>
                  </select>
                  <input type="hidden" id="hidSchemeDiscount" value="0">
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <strong>Payables</strong>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody id="payables"></tbody>
                </table>
              </div>
            </div>
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
<script src="<?php echo base_url('assets/sweet-alert/dist/sweetalert2.all.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/parsley/dist/parsley.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/pages/assessor/juniorhs/assessment.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/pages/assessor/juniorhs/assessmentInfo.js'); ?>"></script>