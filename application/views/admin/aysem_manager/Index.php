<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1><?php echo 'A.Y. and Semester Manager'; ?></h1>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-4 -->
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li class="active"><?php echo 'A.Y. and Semester Manager'; ?></li>
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
  </div><!-- /.animated fadeIn -->
</div> <!-- .content -->

<div class="modal fade" id="acadYrModal" tabindex="-1" role="dialog" aria-labelledby="acadYrModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="acadYrModalLabel">Academic Year</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <form role="form" id="acadYearForm">
      <div class="modal-body">
        <div class="row form-group">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-2 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">Academic Year:</label></div>
            <div class="col-lg-9 col-sm-10 col-xs-12">
              <select class="form-control form-control-sm" name="acadYear" required data-parsley-required-message="">
                <option value="">---</option>
                <?php $yearToday = date('Y').'-'.(date('Y')+1); ?>
                <?php foreach($acadYear as $row): ?>
                  <?php if ($row->acad_yr == $yearToday): ?>
                    <option value="<?php echo $yearToday ?>" <?php echo ($row->status > 0) ? 'selected':'' ?>><?php echo $yearToday ?></option>
                  <?php else: ?>
                    <option value="<?php echo $row->acad_yr ?>" <?php echo ($row->status > 0) ? 'selected':'' ?>><?php echo $row->acad_yr ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div><!-- /.row form-group -->
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary btn-sm">
          <i class="fa fa-check"></i> Update
        </button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="semesterModal" tabindex="-1" role="dialog" aria-labelledby="semesterModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="semesterModalLabel">Semester</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <form role="form" id="semForm">
      <div class="modal-body">
        <div class="row form-group">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-2 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">Semester:</label></div>
            <div class="col-lg-9 col-sm-10 col-xs-12">
              <select class="form-control form-control-sm" name="semester" required data-parsley-required-message="">
                <option value="">---</option>
                <?php foreach($semester as $row): ?>
                  <option value="<?php echo $row->semester ?>" <?php echo ($row->status > 0) ? 'selected':'' ?>><?php echo $row->semester.' Semester' ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div><!-- /.row form-group -->
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary btn-sm">
          <i class="fa fa-check"></i> Update
        </button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
  
<script src="<?php echo base_url('assets/sweet-alert/dist/sweetalert2.all.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/parsley/dist/parsley.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/pages/admin/acadyear_manager/aysem.js'); ?>"></script>