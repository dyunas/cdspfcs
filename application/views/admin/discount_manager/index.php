<link rel="stylesheet" href="<?php echo base_url('assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'); ?>">
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Discount Manager</h1>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-4 -->
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li class="active">Discount Manager</li>
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
            <button type="button" id="createDiscBtn" data-toggle="modal" data-target="#newDiscModal" data-backdrop="static" data-keyboard="false" class="btn btn-sm btn-primary pull-right"><i class="ti ti-plus"></i> Create new discount</button>
          </div><!-- /.card-header -->
          <div class="card-body">
            <table id="feeTbl" class="table table-striped table-bordered" width="100%">
              <thead>
                <th></th>
                <th>Discount Name</th>
                <th class="text-center">Code</th>
                <th class="text-right">Amount</th>
                <th class="text-center">For</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
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

<div class="modal fade" id="newDiscModal" tabindex="-1" role="dialog" aria-labelledby="newDiscModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newDiscModalLabel">New Discount</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <?php echo form_open('', 'role="form" id="discForm"'); ?>
      <div class="modal-body">
        <small style="display:block;padding: 10px 10px 10px 0px;font-size: 11px;"><i>Fields with (*) are mandatory. Please don't leave it blank</i></small>
        <div class="row form-group">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-2 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">*Discount Name:</label></div>
            <div class="col-lg-9 col-sm-10 col-xs-12">
              <input type="text" id="dname" name="dname" placeholder="Fee Name" class="form-control form-control-sm" required data-parsley-required-message="This field is required" maxlength="50">
            </div>
          </div>
        </div><!-- /.row form-group -->
        <div class="row form-group">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-2 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">*Discount Code:</label></div>
            <div class="col-lg-3 col-sm-3 col-xs-12">
              <input type="text" id="dcode" name="dcode" placeholder="Fee Code" class="form-control form-control-sm" data-parsley-remote="discounts/check_disccode" data-parsley-remote-options="{ 'type': 'GET', 'dataType': 'json', 'data': { 'dCode': 'value' } }" data-parsley-remote-message="Code already exists" required data-parsley-required-message="This field is required" maxlength="10">
            </div>
          </div>
        </div><!-- /.row form-group -->
        <div class="row form-group">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-2 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">*Percentage:</label></div>
            <div class="col-lg-3 col-sm-3 col-xs-12">
              <input type="text" id="pcnt" name="pcnt" placeholder="Percentage" class="form-control form-control-sm" data-parsley-type="integer" required data-parsley-required-message="This field is required" maxlength="3">
            </div>
          </div>
        </div><!-- /.row form-group -->
        <div class="row form-group">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-2 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">*For:</label></div>
            <div class="col-lg-3 col-sm-3 col-xs-12">
              <select name="dFor" class="dFor form-control form-control-sm" required data-parsley-required-message="This field is required">
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
      <?php form_close(); ?>
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
<script src="<?php echo base_url('assets/assets/js/init-scripts/data-table/datatables-init.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/pages/admin/discount_manager/discManager.js'); ?>"></script>
<script src="<?php echo base_url('assets/parsley/dist/parsley.min.js'); ?>"></script>
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
  });
</script>