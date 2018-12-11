<link rel="stylesheet" href="<?php echo base_url('assets/vendors/chosen/chosen.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/sweet-alert/dist/sweetalert2.min.css'); ?>">
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
          <li><a href="<?php echo site_url('registrar/dept/'.$this->uri->segment(3)); ?>"><?php echo $this->uri->segment(3); ?></a></li>
          <li class="active">Register new student</li>
        </ol>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-8 -->
</div>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open_multipart('', 'role="form" id="regForm"'); ?>
        <div class="card">
          <div class="card-header">
            <strong>Learner Basic Information</strong>
          </div><!-- /.card-header -->
          <div class="card-body form-horizontal">
            <div class="row form-group">
              <div class="col col-sm-1">
                <label for="LRN" class=" form-control-label">LRN</label>
              </div>
              <div class="col col-sm-11">
                <input type="text" id="LRN" name="LRN" placeholder="Learner Reference Number" class="input-sm form-control-sm form-control" required data-parsley-type="number" data-parsley-required-message="This field is required" maxlength="12" data-parsley-length="[12, 12]">
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-1">
                <label for="lname" class=" form-control-label">Lastname</label>
              </div>
              <div class="col col-sm-3">
                <input type="text" id="lname" name="lname" placeholder="Lastname" class="input-sm form-control-sm form-control" required data-parsley-required-message="Please enter a last name">
              </div>
              <div class="col col-sm-1">
                <label for="fname" class=" form-control-label">Firstname</label>
              </div>
              <div class="col col-sm-3">
                <input type="text" id="fname" name="fname" placeholder="Firstname" class="input-sm form-control-sm form-control" required data-parsley-required-message="Please enter a first name">
              </div>
              <div class="col col-sm-1">
                <label for="mname" class=" form-control-label">M.N</label>
              </div>
              <div class="col col-sm-3">
                <input type="text" id="mname" name="mname" placeholder="Middlename" class="input-sm form-control-sm form-control">
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-1">
                <label for="bdate" class=" form-control-label">Birthdate</label>
              </div>
              <div class="col col-sm-3">
                <input type="date" id="bdate" name="bdate" placeholder="Birthdate" class="input-sm form-control-sm form-control" required data-parsley-type="date" data-parsley-required-message="This field is required" data-parsley-date-message="Please enter a valid date">
              </div>
              <div class="col col-sm-1">
                <label for="gender" class=" form-control-label">Gender</label>
              </div>
              <div class="col col-sm-3">
                <select class="input-sm form-control-sm form-control" name="gender" required data-parsley-required-message="Please select gender">
                  <option value=""></option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="col col-sm-1">
                <label for="cnum" class=" form-control-label">Tel. No.#</label>
              </div>
              <div class="col col-sm-3">
                <input type="text" id="cnum" name="cnum" placeholder="Tel. No.#" class="input-sm form-control-sm form-control" data-parsley-type="number"  maxlength="11" data-parsley-length="[7, 11]">
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-1">
                <label for="eadd" class=" form-control-label">E-mail Address</label>
              </div>
              <div class="col col-sm-11">
                <input type="email" id="eadd" name="eadd" placeholder="E-mail Address" class="input-sm form-control-sm form-control" data-parsley-type="email" data-parsley-type-message="Please enter a valid e-mail address">
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-1">
                <label for="addrs" class=" form-control-label">Address</label>
              </div>
              <div class="col col-sm-11">
                <input type="text" id="addrs" name="addrs" placeholder="Address" class="input-sm form-control-sm form-control" required data-parsley-required-message="This field is required">
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
              <div class="col col-sm-1">
                <label for="fthrsName" class=" form-control-label">Father's Name</label>
              </div>
              <div class="col col-sm-6">
                <input type="text" id="fthrsName" name="fthrsName" placeholder="Father's Name" class="input-sm form-control-sm form-control">
              </div>
              <div class="col col-sm-1">
                <label for="cnum1" class=" form-control-label">Contact Number</label>
              </div>
              <div class="col col-sm-3">
                <input type="text" id="cnum1" name="cnum1" placeholder="Contact Number" class="input-sm form-control-sm form-control" data-parsley-type="number">
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-1">
                <label for="addrs2" class=" form-control-label">Address</label>
              </div>
              <div class="col col-sm-11">
                <input type="text" id="addrs2" name="addrs2" placeholder="Address" class="input-sm form-control-sm form-control">
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-1">
                <label for="mthrsName" class=" form-control-label">Mother's Name</label>
              </div>
              <div class="col col-sm-6">
                <input type="text" id="mthrsName" name="mthrsName" placeholder="Mother's Name" class="input-sm form-control-sm form-control">
              </div>
              <div class="col col-sm-1">
                <label for="cnum2" class=" form-control-label">Contact Number</label>
              </div>
              <div class="col col-sm-3">
                <input type="text" id="cnum2" name="cnum2" placeholder="Contact Number" class="input-sm form-control-sm form-control" data-parsley-type="number">
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-1">
                <label for="addrs3" class=" form-control-label">Address</label>
              </div>
              <div class="col col-sm-11">
                <input type="text" id="addrs3" name="addrs3" placeholder="Address" class="input-sm form-control-sm form-control">
              </div>
            </div><!-- /.row form-group -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
        <div class="card">
          <div class="card-header">
            <strong>Documents submitted</strong>
          </div><!-- /.card-header -->
          <div class="card-body form-horizontal">
            <div class="row form-group">
              <div class="col col-sm-12">
                <div class="form-check">
                  <div class="checkbox col-sm-4 col-xs-12">
                    <label for="bCertPSA" class="form-check-label ">
                      <input type="checkbox" id="bCertPSA" name="bCertPSA" value="0" class="form-check-input docu">Birth Certificate (PSA)
                    </label>
                  </div>
                  <div class="checkbox col-sm-4 col-xs-12">
                    <label for="certGMC" class="form-check-label ">
                      <input type="checkbox" id="certGMC" name="certGMC" value="0" class="form-check-input docu"> Certificate of Good Moral
                    </label>
                  </div>
                  <div class="checkbox col-sm-4 col-xs-12">
                    <label for="certHonDis" class="form-check-label ">
                      <input type="checkbox" id="certHonDis" name="certHonDis" value="0" class="form-check-input docu"> Certificate of Honourable Dismissal
                    </label>
                  </div>
                  <div class="checkbox col-sm-4 col-xs-12">
                    <label for="frm137" class="form-check-label ">
                      <input type="checkbox" id="frm137" name="frm137" value="0" class="form-check-input docu"> Form 137
                    </label>
                  </div>
                  <div class="checkbox col-sm-4 col-xs-12">
                    <label for="frm138" class="form-check-label ">
                      <input type="checkbox" id="frm138" name="frm138" value="0" class="form-check-input docu"> Form 138
                    </label>
                  </div>
                </div>
              </div>
            </div><!-- /.row form-group -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
        <div class="card">
          <div class="card-header">
            <strong>Student Assessment</strong>
          </div><!-- /.card-header -->
          <div class="card-body form-horizontal">
            <div class="row form-group">
              <div class="col col-sm-1">
                <label for="stud_grade_lvl" class="form-control-label">Grade</label>
              </div><!-- col col-sm-1 -->
              <div class="col col-sm-3">
                <select class="input-sm form-control-sm form-control" name="stud_grade_lvl" required data-parsley-required-message="Please select grade level">
                  <option value=""></option>
                  <option value="Grade 1">Grade 1</option>
                  <option value="Grade 2">Grade 2</option>
                  <option value="Grade 3">Grade 3</option>
                  <option value="Grade 4">Grade 4</option>
                  <option value="Grade 5">Grade 5</option>
                  <option value="Grade 6">Grade 6</option>
                </select>
              </div><!-- col col-sm-3 -->
              <div class="col col-sm-1">
                <label for="stud_acad_yr" class="form-control-label">School Year</label>
              </div><!-- col col-sm-1 -->
              <div class="col col-sm-3">
                <input type="text" class="input-sm form-control-sm form-control" name="stud_acad_yr" value="<?php echo $acad_yr; ?>" readonly>
              </div><!-- col col-sm-3 -->
            </div><!-- /.row form-group -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
        <div class="card">
          <div class="card-footer">
            <button type="submit" id="submitBtn" class="btn btn-primary btn-sm">
              <i class="fa fa-dot-circle-o"></i> Submit
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
              <i class="fa fa-ban"></i> Reset
            </button>
          </div><!-- /.card-footer -->
        </div><!-- /.card -->
        <?php echo form_close(); ?>
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
  </div><!-- /.animated fadeIn -->
</div> <!-- .content -->

<script src="<?php echo base_url('assets/vendors/chosen/chosen.jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/sweet-alert/dist/sweetalert2.all.min.js'); ?>"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="<?php echo base_url('assets/parsley/dist/parsley.min.js'); ?>"></script>

<script>
  jQuery(document).ready(function() {
    jQuery(':checkbox').on('click', function(){
      if(jQuery(this).is(':checked')){
        jQuery(this).val(1);
      }
      else {
        jQuery(this).val(0);
      }
    });

    var form = jQuery('#regForm');
    form.parsley({
      errorClass: 'is-invalid text-danger',
      // successClass: 'is-valid', // Comment this option if you don't want the field to become green when valid. Recommended in Google material design to prevent too many hints for user experience. Only report when a field is wrong.
      errorsWrapper: '<span class="form-text text-danger" style="font-size: 12px;"></span>',
      errorTemplate: '<span></span>',
      trigger: 'change'
    });

    form.on('submit', function(e) {
      e.preventDefault();
      // var f = jQuery(this);
      // f.parsley().validate();

      Swal({
        title: 'Register Student?',
        text: "",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, continue.'
      }).then((result) => {
        if (result.value) {
          jQuery.ajax({
            type: 'POST',
            data: form.serialize(),
            dataType: 'json',
            url: '<?php echo site_url('registrar/dept/elementary/register_student'); ?>',
            success:function(data){
              if (data == true) {
                Swal(
                  'Registered!',
                  'Student has been added to the record.',
                  'success',
                );
                // form.find("input[type=text], input[type=date], textarea").val("");
                jQuery(':input').not(':button, :submit, :reset, :hidden').removeAttr('checked').removeAttr('selected').val('');
              }
              else {
                Swal(
                  'Error!',
                  'Failed to add student to the record! Please try again.',
                  'error'
                );
              }
            }
          });
        }
      })
    })
  });
</script>