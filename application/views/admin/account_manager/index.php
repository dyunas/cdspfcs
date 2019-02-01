<link rel="stylesheet" href="<?php echo base_url('assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'); ?>">
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
          <li class="active">Account Manager</li>
        </ol>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-8 -->
</div>

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
            <a href="<?php echo site_url('admin/accnt-mgr/new'); ?>" class="btn btn-sm btn-primary pull-right"><i class="ti ti-plus"></i> Register new account</a>
          </div><!-- /.card-header -->
          <div class="card-body">
            <table id="acctTbl" class="table table-striped table-bordered" width="100%">
              <thead>
                <th></th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Role</th>
                <th>Status</th>
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

<script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/init-scripts/data-table/datatables-init.js'); ?>"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    var dtble = jQuery('#acctTbl').DataTable({
      // "processing": true,
      // "serverSide": true,
      "searching": true,
      "ajax": {
        type: "GET",
        url: 'accnt-mgr/get_account_table_data',
        dataType: 'json'
      }
    });

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