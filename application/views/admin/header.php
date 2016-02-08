<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Plannetads</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE11">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url().'assets/admin/'; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	<!-- datepicker -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!-- DATA TABLES -->
	<?php /* <link href="<?php echo base_url().'assets/admin/'; ?>css/jquery.dataTables.css" rel="stylesheet" type="text/css" /> */ ?>
	
	<link href="<?php echo base_url().'assets/admin/'; ?>css/buttons.dataTables.css" rel="stylesheet" type="text/css" />
	
	
    <link href="<?php echo base_url().'assets/admin/'; ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> 
	<?php /*
	<link href="<?php echo base_url().'assets/admin/'; ?>plugins/datatables/extensions/TableTools/css/dataTables.tableTools.css" rel="stylesheet" type="text/css" /> */ ?>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/admin/'; ?>plugins/datatables/extensions/Buttons/css/buttons.dataTables.css">
	<!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/admin/'; ?>plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link href="<?php echo base_url().'assets/admin/'; ?>dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url().'assets/admin/'; ?>dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url().'admin/'; ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>LT</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Plannetads</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
		  <span style="color:white; line-height: 50px;font-size: 20px;"><b></b></span>
		  
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
				
              <!-- Messages: style can be found in dropdown.less-->
             <?php /* <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo base_url().'assets/'; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li> */?>
              <!-- User Account: style can be found in dropdown.less -->
			  <li style="color:white; line-height: 50px;font-size: 20px;">Welcome <i>Admin</i></li>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url().'assets/admin/'; ?>dist/img/user2-160x160_1.jpg" class="user-image" alt="User Image" />
                  <span class="hidden-xs"><?php
                  if($this->session->userdata('logged_in'))
                  {
                     $session_data = $this->session->userdata('logged_in');
                     echo $session_data['username'];
                  } 
                  ?></span>
                </a>
				
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url().'assets/admin/'; ?>dist/img/user2-160x160_1.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?php 
                      if($this->session->userdata('logged_in'))
                      {
                         echo $session_data['username'];
                      } 
                       ?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                 <!-- <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>admin/profile" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>admin/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!--<li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- =============================================== -->
      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url().'assets/admin/'; ?>dist/img/user2-160x160_1.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php 
                      if($this->session->userdata('logged_in'))
                      {
                         echo $session_data['username'];
                      } 
                       ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <?php
            $pagename = $this->uri->segment(2, 0);
          ?>
          <ul class="sidebar-menu">
		    <li <?php if($pagename=='users_info_list') { ?> class="active" <?php } ?>>
				<a href="<?php echo base_url(); ?>admin/users_info_list">
					<i class="fa fa-dashboard"></i> <span>Users</span> 
				</a>
			</li>
			<li <?php if($pagename=='admin_entry') { ?> class="active" <?php } ?>>
				<a href="<?php echo base_url(); ?>admin/admin_entry">
					<i class="fa fa-dashboard"></i> <span>Users Adds</span> 
				</a>
			</li>
			
		  <li <?php if($pagename=='admin_entry') { ?> class="active" <?php } ?>>
			<a href="<?php echo base_url(); ?>admin/admin_entry">
				<i class="fa fa-dashboard"></i> <span>Custom Pages</span> 
			</a>
		  </li>
		  <?php /*<li <?php if($pagename=='list_admin_entries') { ?> class="active" <?php } ?>>
			  <a href="<?php echo base_url(); ?>admin/list_admin_entries">
				<i class="fa fa-circle-o"></i> <span>List Admin Entry</span> 
			  </a>
			</li><?php */ ?>
			<!--
			<li <?php if($pagename=='pick3_entries') { ?> class="active" <?php } ?>>
			  <a href="<?php echo base_url(); ?>admin/pick3_entries">
				<i class="fa fa-circle-o"></i> <span>3 Pick Entry</span> 
			  </a>
			</li>
			 <li <?php if($pagename=='pick4_entries') { ?> class="active" <?php } ?>>
			  <a href="<?php echo base_url(); ?>admin/pick4_entries">
				<i class="fa fa-circle-o"></i> <span>4 Pick Entry</span> 
			  </a>
			</li>
			<li <?php if($pagename=='list_7_admin_entries_4_pick') { ?> class="active" <?php } ?>>
			  <a href="<?php echo base_url(); ?>admin/list_7_admin_entries_4_pick">
				<i class="fa fa-circle-o"></i> <span>Last 7 Games - 4 Pick</span> 
			  </a>
			</li>
			<li <?php if($pagename=='list_7_admin_entries_3_pick') { ?> class="active" <?php } ?>>
			  <a href="<?php echo base_url(); ?>admin/list_7_admin_entries_3_pick">
				<i class="fa fa-circle-o"></i> <span>Last 7 Games - 3 Pick</span> 
			  </a>
			</li>-->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>