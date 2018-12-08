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
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>LRN</th>
                  <th>Name</th>
                  <th>Grade Level</th>
                  <th>Section</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>000000000001</td>
                  <td>Juan Dela Cruz Jr.</td>
                  <td>Grade 5</td>
                  <td>Persimmon</td>
                  <td><span>Enrolled</span></td>
                  <td>
                    <a href="#" style="color: #007bff!important;"><i class="ti ti-eye"></i> VIEW</a>
                  </td>
                </tr>
              </tbody>
            </table><!-- /.table -->
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
<script src="<?php echo base_url('assets/vendors/jszip/dist/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/pdfmake/build/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/pdfmake/build/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/init-scripts/data-table/datatables-init.js'); ?>"></script>
