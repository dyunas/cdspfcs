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
      <div class="col-lg-6 col-md-12">
        <div class="card">
        <a href="#" data-toggle="modal" data-target="#acadYrModal" data-backdrop="static" data-keyboard="false" style="color:#000;">
          <div class="card-body">
            <div class="stat-widget-one">
              <div class="stat-icon dib"><i class="ti-calendar text-warning border-danger"></i></div>
              <div class="stat-content dib">
                <div class="stat-text">Academic Year</div>
                <div class="stat-digit"><span id="acadYear"><?php echo $activeAcadYear->acad_yr; ?></span></div>
              </div>
            </div>
          </div><!-- /.card-body -->
        </a>
        </div><!-- /.card -->
      </div><!-- /.col-lg-6 col-md-12 -->
      <div class="col-lg-6 col-md-12">
        <div class="card">
        <a href="#" data-toggle="modal" data-target="#semesterModal" data-backdrop="static" data-keyboard="false" style="color:#000;">
          <div class="card-body">
            <div class="stat-widget-one">
              <div class="stat-icon dib"><i class="ti-calendar text-warning border-danger"></i></div>
              <div class="stat-content dib">
                <div class="stat-text">Semester</div>
                <div class="stat-digit"><span id="semester"><?php echo $activeSemester->semester.' Semester'; ?></span></div>
              </div>
            </div>
          </div><!-- /.card-body -->
        </a>
        </div><!-- /.card -->
      </div><!-- /.col-lg-6 col-md-12 -->
    </div><!-- /.row -->
    <div class="row">
      <div class="col-sm-12 mb-4">
        <div class="card-group">
          <div class="card col-md-6 no-padding">
            <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                <i class="fa fa-users"></i>
              </div><!-- /.h1 text-muted text-right mb-4 -->
              <div class="h4 mb-0">
                <span class="count"><?php echo $totalNumberOfStudents->Total_kinder ?></span>
              </div><!-- /.h4 mb-0 -->
              <small class="text-muted text-uppercase font-weight-bold">Pre-Elem</small>
              <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
            </div><!-- /.card-body -->
          </div><!-- /.col-md-6 no-padding -->
          <div class="card col-md-6 no-padding">
            <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                <i class="fa fa-users"></i>
              </div><!-- /.h1 text-muted text-right mb-4 -->
              <div class="h4 mb-0">
                <span class="count"><?php echo $totalNumberOfStudents->Total_elem ?></span>
              </div><!-- /.h4 mb-0 -->
              <small class="text-muted text-uppercase font-weight-bold">Elementary</small>
              <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
            </div><!-- /.card-body -->
          </div><!-- /.col-md-6 no-padding -->
          <div class="card col-md-6 no-padding">
            <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                <i class="fa fa-users"></i>
              </div><!-- /.h1 text-muted text-right mb-4 -->
              <div class="h4 mb-0">
                <span class="count"><?php echo $totalNumberOfStudents->Total_jhs ?></span>
              </div><!-- /.h4 mb-0 -->
              <small class="text-muted text-uppercase font-weight-bold">Junior High School</small>
              <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
            </div><!-- /.card-body -->
          </div><!-- /.col-md-6 no-padding -->
          <div class="card col-md-6 no-padding">
            <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                <i class="fa fa-users"></i>
              </div><!-- /.h1 text-muted text-right mb-4 -->
              <div class="h4 mb-0">
                <span class="count"><?php echo $totalNumberOfStudents->Total_shs ?></span>
              </div><!-- /.h4 mb-0 -->
              <small class="text-muted text-uppercase font-weight-bold">Senior High School</small>
              <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
            </div><!-- /.card-body -->
          </div><!-- /.col-md-6 no-padding -->
          <div class="card col-md-6 no-padding">
            <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                <i class="fa fa-users"></i>
              </div><!-- /.h1 text-muted text-right mb-4 -->
              <div class="h4 mb-0">
                <span class="count"><?php echo $totalNumberOfStudents->Total_college ?></span>
              </div><!-- /.h4 mb-0 -->
              <small class="text-muted text-uppercase font-weight-bold">College</small>
              <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
            </div><!-- /.card-body -->
          </div><!-- /.col-md-6 no-padding -->
        </div><!-- /.card-group -->
      </div><!-- /.col-sm-12 mb-4 -->
    </div><!-- /.row -->
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
        <div class="card">
          <div class="card-body">
            <h4 class="text-muted text-uppercase font-weight-bold mb-3">Student Distribution<br/><small>DEPARTMENT</small></h4>
            <div class="d-flex justify-content-center">
              <div class="spinner-border text-danger spinner1" style="display:none;width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            </div>
            <canvas id="doughnutChart"></canvas>
          </div>
        </div>
      </div><!-- /.col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4 -->
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
        <div class="card">
          <div class="card-body">
            <h4 class="text-muted text-uppercase font-weight-bold mb-3">Total Number of Students<br/><small>YEARLY</small></h4>
            <div class="d-flex justify-content-center">
              <div class="spinner-border text-danger spinner2" style="display:none;width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            </div>
            <canvas id="lineChart"></canvas>
          </div>
        </div>
      </div><!-- /.col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4 -->
    </div><!-- /.row -->
  </div><!-- /.animated fadeIn -->
</div> <!-- .content -->

<!--  Chart js -->
<script src="<?php echo base_url('assets/vendors/chart.js/dist/Chart.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/init-scripts/chart-js/chartjs-init.js'); ?>"></script>
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