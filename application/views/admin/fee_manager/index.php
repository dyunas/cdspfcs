<link rel="stylesheet" href="<?php echo base_url('assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/vendors/selectFX/css/cs-skin-elastic.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/vendors/chosen/chosen.min.css'); ?>">
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Payment Authorizer</h1>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-4 -->
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li class="active">Payment Authorizer</li>
        </ol>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-8 -->
</div><!-- /.breadcrumbs -->

<div class="content mt-3">
  <div class="row">
    <div class="col-sm-12">
      <div id="notice"></div><!-- /.notice -->
    </div><!-- /.col-sm-12 -->
  </div><!-- /.row -->
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <button type="button" id="createPaymentBtn" data-toggle="modal" data-target="#newPaymentModal" data-backdrop="static" data-keyboard="false" class="btn btn-sm btn-primary pull-right"><i class="ti ti-plus"></i> Create new payment</button>
          </div><!-- /.card-header -->
          <div class="card-body">
            <table id="PaymentTbl" class="table table-striped table-bordered" width="100%">
              <thead>
                <th></th>
                <th>Payment Name</th>
                <th class="text-right">Amount</th>
                <th class="text-center">For</th>
                <th class="text-center">Status</th>
                <th>Action</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
  </div><!-- /.animated fadeIn -->
</div> <!-- .content -->

<div class="modal fade" id="newPaymentModal" tabindex="-1" role="dialog" aria-labelledby="newPaymentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newPaymentModalLabel">New Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <form action="#" role="form" id="PaymentForm">
      <div class="modal-body">
        <small style="display:block;padding: 10px 10px 10px 0px;font-size: 11px;"><i>Fields with (*) are mandatory. Please don't leave it blank</i></small>
        <div class="row form-group">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-1 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">*Fee Name:</label></div>
            <div class="col-lg-9 col-sm-10 col-xs-12">
              <select data-placeholder="Choose fee name" id="fname" name="fname" class="standardSelect" tabindex="-1" required data-parsley-required-message="This field is required">
                <option value=""></option>
                <option value="Tuition Fee">Tuition Fee</option>
                <option value="Miscellaneous">Miscellaneous</option>
                <option value="Computer Fee">Computer Fee</option>
                <option value="Energy Fee">Energy Fee</option>
                <option value="Books">Books</option>
                <option value="Educational Tour">Educational Tour</option>
                <option value="Foundation Day">Foundation Day</option>
                <option value="Learner's Insurance Premium">Learner's Insurance Premium</option>
                <option value="ID Lanyard">ID Lanyard</option>
                <option value="Laboratory Fee">Laboratory Fee</option>
                <option value="Student Handbook">Student Handbook</option>
                <option value="Student's Physical Examination">Student's Physical Examination</option>
                <option value="Acquaintance Party">Acquaintance Party</option>
                <option value="Science Laboratory">Science Laboratory</option>
                <option value="NSTP">NSTP</option>
                <option value="Thesis Defense Fee">Thesis Defense Fee</option>
                <option value="Graduation Fee">Graduation Fee</option>
                <option value="Year Book">Year Book</option>
                <option value="Retreat">Retreat</option>
                <option value="Team Building">Team Building</option>
              </select>
            </div>
          </div>
        </div><!-- /.row form-group -->
        <!-- <div class="row form-group">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-1 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">*Payment Code:</label></div>
            <div class="col-lg-3 col-sm-3 col-xs-12">
              <input type="text" id="fcode" name="fcode" placeholder="Payment Code" class="form-control form-control-sm" data-parsley-remote="fee-mgr/check_feecode" data-parsley-remote-options="{ 'type': 'GET', 'dataType': 'json', 'data': { 'fcode': 'value' } }" data-parsley-remote-message="Code already exists" required data-parsley-required-message="This field is required" maxlength="10">
            </div>
          </div>
        </div> --><!-- /.row form-group -->
        <div class="row form-group">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-1 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">*Amount:</label></div>
            <div class="col-lg-3 col-sm-3 col-xs-12">
              <input type="text" id="amnt" name="amnt" placeholder="Amount" class="form-control form-control-sm" data-parsley-type="integer" required data-parsley-required-message="This field is required" maxlength="5">
            </div>
          </div>
        </div><!-- /.row form-group -->
        <div class="row form-group">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-1 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">*For:</label></div>
            <div class="col-lg-3 col-sm-3 col-xs-12">
              <select name="fFor" class="fFor form-control form-control-sm" required data-parsley-required-message="This field is required">
                <option value="">---</option>
              </select>
            </div>
          </div>
        </div><!-- /.row form-group -->
      </div>
      <div class="modal-footer">
        <button type="submit" id="submitBtn" class="btn btn-outline-primary btn-sm">
          <i class="fa fa-check"></i> Create
        </button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editPaymentModal" tabindex="-1" role="dialog" aria-labelledby="editPaymentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPaymentModalLabel">Edit Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <form action="#" role="form" id="editForm">
      <input type="hidden" id="row_id" name="row_id" value="">
      <div class="modal-body">
        <small style="display:block;padding: 10px 10px 10px 0px;font-size: 11px;"><i>Fields with (*) are mandatory. Please don't leave it blank</i></small>
        <div class="row form-group">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-1 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">*Fee Name:</label></div>
            <div class="col-lg-9 col-sm-10 col-xs-12">
              <select data-placeholder="Choose fee name" id="editFname" name="editFname" class="form-control form-control-sm" tabindex="-1" required data-parsley-required-message="This field is required">
                <option value=""></option>
                <option value="Tuition Fee">Tuition Fee</option>
                <option value="Miscellaneous">Miscellaneous</option>
                <option value="Computer Fee">Computer Fee</option>
                <option value="Energy Fee">Energy Fee</option>
                <option value="Books">Books</option>
                <option value="Educational Tour">Educational Tour</option>
                <option value="Foundation Day">Foundation Day</option>
                <option value="Learner's Insurance Premium">Learner's Insurance Premium</option>
                <option value="ID Lanyard">ID Lanyard</option>
                <option value="Laboratory Fee">Laboratory Fee</option>
                <option value="Student Handbook">Student Handbook</option>
                <option value="Student's Physical Examination">Student's Physical Examination</option>
                <option value="Acquaintance Party">Acquaintance Party</option>
                <option value="Science Laboratory">Science Laboratory</option>
                <option value="NSTP">NSTP</option>
                <option value="Thesis Defense Fee">Thesis Defense Fee</option>
                <option value="Graduation Fee">Graduation Fee</option>
                <option value="Year Book">Year Book</option>
                <option value="Retreat">Retreat</option>
                <option value="Team Building">Team Building</option>
              </select>
            </div>
          </div>
        </div><!-- /.row form-group -->
        <div class="row form-group">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-1 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">*Amount:</label></div>
            <div class="col-lg-3 col-sm-3 col-xs-12">
              <input type="text" id="editAmnt" name="editAmnt" placeholder="Amount" class="form-control form-control-sm" data-parsley-type="integer" required data-parsley-required-message="This field is required" maxlength="5">
            </div>
          </div>
        </div><!-- /.row form-group -->
        <div class="row form-group">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-1 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">*For:</label></div>
            <div class="col-lg-3 col-sm-3 col-xs-12">
              <select name="fFor" class="fFor form-control form-control-sm" required data-parsley-required-message="This field is required">
                <option value="">---</option>
              </select>
            </div>
          </div>
        </div><!-- /.row form-group -->
      </div>
      <div class="modal-footer">
        <button type="submit" id="submitBtn" class="btn btn-outline-primary btn-sm">
          <i class="fa fa-save"></i> Save
        </button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script src="<?php echo base_url('assets/sweet-alert/dist/sweetalert2.all.min.js'); ?>"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/chosen/chosen.jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/init-scripts/data-table/datatables-init.js'); ?>"></script>
<script src="<?php echo base_url('assets/parsley/dist/parsley.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/pages/admin/fee_manager/feeManager.js'); ?>"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    var notice = jQuery('#notice');
    var error = '<div class="alert  alert-danger alert-dismissible fade show" role="alert">'+
                      '<?php echo $this->session->flashdata('error'); ?>'+
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                      '</button>'+
                    '</div>';
    var success = '<div class="alert  alert-success alert-dismissible fade show" role="alert">'+
                      '<?php echo $this->session->flashdata('success'); ?>'+
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                      '</button>'+
                    '</div>';

    var flashNotice = "<?php echo $this->session->flashdata('error'); ?>";
    var flashSuccess = "<?php echo $this->session->flashdata('success'); ?>";

    if (flashNotice) {
      notice.append(error);
    }
    if (flashSuccess) {
      notice.append(success);
    }

    jQuery(".standardSelect").chosen({
      disable_search_threshold: 10,
      no_results_text: "Oops, nothing found!",
      width: "100%"
    });
  });
</script>