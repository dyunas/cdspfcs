<link rel="stylesheet" href="<?php echo base_url('assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'); ?>">
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1><?php echo ucfirst($this->uri->segment(3)); ?></h1>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-4 -->
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li class="active"><?php echo $this->uri->segment(3); ?></li>
        </ol>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-8 -->
</div>

<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <a href="<?php echo site_url('registrar/dept/elementary/new'); ?>" class="btn btn-sm btn-primary pull-right"><i class="ti ti-plus"></i> Register new student</a>
          </div><!-- /.card-header -->
          <div class="card-body">
            <table id="elemTbl" class="table table-striped table-bordered" width="100%"></table>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
  </div><!-- /.animated fadeIn -->
</div> <!-- .content -->

<script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js'); ?>"></scr
<script src="<?php echo base_url('assets/assets/js/init-scripts/data-table/datatables-init.js'); ?>"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery.ajax({
      type: 'POST',
      dataType: 'json',
      url: 'elementary/get_elem_table_data',
      success:function(result){
        // console.log(result);
        jQuery('#elemTbl').DataTable({
            "searching": true, //this is disabled because I have a custom search.
            "aaData": [result], //here we get the array data from the ajax call.
            "aoColumns": [
              { "sTitle": "LRN" },
              { "sTitle": "Last Name" },
              { "sTitle": "First Name" },
              { "sTitle": "Grade Level" },
              { "sTitle": "Section" },
              { "sTitle": "Status" },
              { "sTitle": "Action" }
            ] //this isn't necessary unless you want modify the header
              //names without changing it in your html code. 
              //I find it useful tho' to setup the headers this way.
        });
      }
    });
  });
</script>