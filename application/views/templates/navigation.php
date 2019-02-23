<body>
  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="<?php echo site_url($this->uri->segment(1).'/dashboard'); ?>"><img src="<?php echo base_url('assets/images/fcs_logo.png'); ?>" alt="Logo"></a>
        <a class="navbar-brand hidden" href="<?php echo site_url($this->uri->segment(1).'/dashboard'); ?>"><img src="<?php echo base_url('assets/images/logo2.png'); ?>" alt="Logo"></a>
      </div><!-- /.navbar-header -->

      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li <?php echo ($this->uri->segment(2) == 'dashboard') ? 'class="active"' : ''; ?>>
            <a href="<?php echo site_url($this->uri->segment(1).'/dashboard'); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
          </li>
          <?php if ($this->uri->segment(1) == 'admin'): ?>
            <h3 class="menu-title">Settings</h3><!-- /.menu-title -->
            <li class="<?php echo ($this->uri->segment(2) == 'accnt-mgr') ? 'active' : ''; ?> menu-item-has-children">
              <a href="<?php echo site_url($this->uri->segment(1).'/accnt-mgr'); ?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Account Manager</a>
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'fee-mgr') ? 'active' : ''; ?> menu-item-has-children">
              <a href="<?php echo site_url($this->uri->segment(1).'/fee-mgr'); ?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-credit-card"></i>Payment Authorizer</a>
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'discounts') ? 'active' : ''; ?> menu-item-has-children">
              <a href="<?php echo site_url($this->uri->segment(1).'/discounts'); ?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-percent"></i>Discounts</a>
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'aysem') ? 'active' : ''; ?> menu-item-has-children">
              <a href="<?php echo site_url($this->uri->segment(1).'/aysem'); ?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-calendar"></i>A.Y and Semester</a>
            </li>
            <h3 class="menu-title">Reports</h3><!-- /.menu-title -->
          <?php elseif ($this->uri->segment(1) == 'registrar'): ?>
            <h3 class="menu-title">Departments</h3><!-- /.menu-title -->
            <li class="<?php echo ($this->uri->segment(3) == 'elementary') ? 'active' : ''; ?> menu-item-has-children">
              <a href="<?php echo site_url($this->uri->segment(1).'/dept/elementary'); ?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Elementary</a>
            </li>
            <li class="<?php echo ($this->uri->segment(3) == 'juniorhs') ? 'active' : ''; ?> menu-item-has-children">
              <a href="<?php echo site_url($this->uri->segment(1).'/dept/juniorhs'); ?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Junior High School</a>
            </li>
            <li class="<?php echo ($this->uri->segment(3) == 'shs') ? 'active' : ''; ?> menu-item-has-children">
              <a href="<?php echo site_url($this->uri->segment(1).'/dept/shs'); ?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Senior High School</a>
            </li>
            <li class="<?php echo ($this->uri->segment(3) == 'college') ? 'active' : ''; ?> menu-item-has-children">
              <a href="<?php echo site_url($this->uri->segment(1).'/dept/college'); ?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>College</a>
            </li>
            <h3 class="menu-title">Settings</h3><!-- /.menu-title -->
            <li class="<?php echo ($this->uri->segment(3) == 'sysem') ? 'active' : ''; ?> menu-item-has-children">
              <a href="<?php echo site_url($this->uri->segment(1).'/settings/sysem'); ?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cog"></i>School Year & Semester</a>
            </li>
          <?php endif; ?>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav><!-- /.navbar -->
  </aside><!-- /#left-panel -->
  <!-- Left Panel -->

  <!-- Right Panel -->
  <div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
      <div class="header-menu">
        <div class="col-sm-7">
          <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
        </div>
        <div class="col-sm-5">
          <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="user-avatar rounded-circle" src="<?php echo base_url('assets/images/admin.jpg'); ?>" alt="User Avatar">
            </a>

            <div class="user-menu dropdown-menu">
              <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>
              <a class="nav-link" href="<?php echo site_url('logout'); ?>"><i class="fa fa-power-off"></i> Logout</a>
            </div><!-- /.user-menu -->
          </div><!-- /.user-area -->
        </div><!-- /.col-sm-5 -->
      </div><!-- /.header-menu -->
    </header>
    <!-- Header-->