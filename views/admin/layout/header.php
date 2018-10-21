<header class="main-header">
<!-- Logo -->
<a href="<?php echo base_url('admin/dasbor') ?>" class="logo">
<!-- mini logo for sidebar mini 50x50 pixels -->
<span class="logo-mini"><b>FIB</b></span>
<!-- logo for regular state and mobile devices -->
<span class="logo-lg"><b>Admin FIB</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>

<div class="navbar-custom-menu">
<ul class="nav navbar-nav">

<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<img src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
<span class="hidden-xs">User Yang Login</span>
</a>
<ul class="dropdown-menu">
<!-- User image -->
<li class="user-header">
<img src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

<p>
  User Yang Logon - Level Akses
  <small>Member since Nov. 2012</small>
</p>
</li>
<!-- Menu Footer-->
<li class="user-footer">
<div class="pull-left">
  <a href="<?php echo base_url('admin/profile') ?>" class="btn btn-success btn-flat"><i class="fa fa-user"></i> Profile</a>
</div>
<div class="pull-right">
  <a href="<?php echo base_url('admin/logout') ?>" class="btn btn-success btn-flat"><i class="fa fa-sign-out"></i>Sign out</a>
</div>
</li>
</ul>
</li>
</ul>
</div>
</nav>
</header>