<body class="bg-dark">
  <div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
      <div class="login-content">
        <div class="login-logo">
          <!-- <a href="index.html">
            <img class="align-content" src="<?php echo base_url('assets/images/fcs_logo.png'); ?>" alt="">
          </a> -->
        </div>
        <div class="login-form">
            <div class="row">
              <div class="col-sm-12">
                <div id="notice"></div>
              </div><!-- /.col-sm-12 -->
            </div><!-- /.row -->
            <?php echo form_open(site_url('login/authenticate'), 'id="login-form"'); ?>
              <div class="form-group">
                <label>Username</label>
                <input type="textbox" class="form-control" name="uname" placeholder="Username" value="<?php echo ($this->input->post('uname')) ? $this->input->post('uname') : ''; ?>">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="pword" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
              <br/><br/>
              <div class="checkbox">
                <label class="pull-right">
                  <a href="#">Forgotten Password?</a>
                </label>
              </div>
            <?php echo form_close(); ?>
            <br/>
        </div>
      </div>
    </div>
  </div>
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