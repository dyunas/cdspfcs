<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1><?php echo ucfirst($this->uri->segment(2)); ?></h1>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-4 -->
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li class="active"><?php echo $this->uri->segment(2); ?></li>
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
      <div class="col-lg-4 col-md-12">
        <div class="card">
        <a href="<?php echo site_url(); ?>" style="color:#000;">
          <div class="card-body">
            <div class="stat-widget-four">
              <div class="stat-icon dib">
                <i class="ti-calendar text-muted"></i>
              </div><!-- stat-icon dib -->
              <div class="stat-content">
                <div class="text-left dib">
                  <div class="stat-heading">2018 - 2019</div><!-- /.stat-heading -->
                  <div class="stat-text">Academic Year</div><!-- /.stat-text -->
                </div><!-- /.text-left dib -->
              </div><!-- /.stat-content -->
            </div><!-- /.stat-widget-four -->
          </div><!-- /.card-body -->
        </a>
        </div><!-- /.card -->
      </div><!-- /.col-lg-3 col-md-6 -->
      <div class="col-lg-4 col-md-12">
        <div class="card">
        <a href="<?php echo site_url(); ?>" style="color:#000;">
          <div class="card-body">
            <div class="stat-widget-four">
              <div class="stat-icon dib">
                <i class="ti-calendar text-muted"></i>
              </div><!-- stat-icon dib -->
              <div class="stat-content">
                <div class="text-left dib">
                  <div class="stat-heading">2nd Semester</div><!-- /.stat-heading -->
                  <div class="stat-text">Semester</div><!-- /.stat-text -->
                </div><!-- /.text-left dib -->
              </div><!-- /.stat-content -->
            </div><!-- /.stat-widget-four -->
          </div><!-- /.card-body -->
        </a>
        </div><!-- /.card -->
      </div><!-- /.col-lg-3 col-md-6 -->
    </div><!-- /.row -->
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="card">
          <div class="card-body">
            <h4 class="mb-3">TOTAL NUMBER OF REGISTERED STUDENTS</h4>
            <canvas id="barChart"></canvas>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col=lg-6 -->
      <div class="col-lg-6 col-md-12">
        <div class="card">
          <div class="card-body">
            <h4 class="mb-3">DISTRIBUTION OF STUDENTS</h4>
            <canvas id="doughutChart"></canvas>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col=lg-6 -->
    </div><!-- /.row -->
  </div><!-- /.animated fadeIn -->
</div> <!-- .content -->

<!--  Chart js -->
<script src="<?php echo base_url('assets/vendors/chart.js/dist/Chart.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/init-scripts/chart-js/chartjs-init.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/widgets.js'); ?>"></script>
<script type="text/javascript">
  (function($) {
    "use strict";

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
  })(jQuery);
</script>