<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Administrator Area</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
  
    <link href="<?=FwBase::$baseUrl?>/../public/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css' />
    <link href='<?=FwBase::$baseUrl?>/../public/css/font-awesome.min.css' rel='stylesheet' type='text/css' />
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=FwBase::$baseUrl?>/../public/plugins/js/jvectormap/jquery-jvectormap-1.2.2.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=FwBase::$baseUrl?>/../public/plugins/css/AdminLTE.min.css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=FwBase::$baseUrl?>/../public/plugins/css/_all-skins.min.css" />
  
  <script src="<?=FwBase::$baseUrl?>/../public/js/jQuery-2.2.0.min.js"></script>
  <script src="<?=FwBase::$baseUrl?>/../public/ckeditor/ckeditor.js"></script>
  <style type="text/css" media="screen">
      html{width: 100%;height: 100%;}
      body{width: inherit;height: inherit;}
      .TableRecords { width: 90% !important; font-family: 'Comic Sans MS', cursive !important;}
      .TableRecords th, td {vertical-align: middle !important;}
      .TableRecords_Header > tr th {padding-left: 10px;}
      .TableRecords_Header > tr th a{padding-left: 10px; font-family: 'Comic Sans MS', cursive !important;}
  </style>
</head>
<body class="hold-transition skin-blue-light sidebar-mini sidebar-collapse">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="<?=FwBase::$baseUrl?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>TB</b>+</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Thái Bình</b> Plus</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
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
                        <img src="<?=FwBase::$baseUrl?>/../public/images/user/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
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
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="min-width: 150px;margin: 0px auto;padding: 15px 0px;">
              <img src="<?=FwBase::$baseUrl?>/../public/images/user/user2-160x160.jpg" class="user-image" alt="User Image" />
              <span class="hidden-xs" style="max-height: 20px; line-height: 20px; font-size: 12px; display: inline;">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=FwBase::$baseUrl?>/../public/images/user/user2-160x160.jpg" class="img-circle" alt="User Image" />

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=FwBase::$baseUrl?>/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=FwBase::$baseUrl?>/../public/images/user/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Tìm kiếm...">
              <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu quản lý</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Quản lý thông tin</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> QL thành viên </a></li>
            <li><a href="<?=FwBase::$baseUrl?>/news"><i class="fa fa-circle-o"></i> QL Tin tức </a></li>
            <li><a href="<?=FwBase::$baseUrl?>/slider"><i class="fa fa-circle-o"></i> TL Slider </a></li>
          </ul>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Hòm thư</span>
            <small class="label pull-right bg-yellow">12</small>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=ucfirst(Fw::$controller) == "Index" ? "Thái Bình Plus" : ucfirst(Fw::$controller)?>
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=ucfirst(Fw::$controller)?></li>
      </ol>
    </section>

    <section class="content"> 
            <?=$this->placeholder() ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
          
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<script src="<?=FwBase::$baseUrl?>/../public/js/bootstrap.js"></script>
<script src="<?=FwBase::$baseUrl?>/../public/js/respond.js"></script>

<!-- FastClick -->
<script src="<?=FwBase::$baseUrl?>/../public/plugins/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=FwBase::$baseUrl?>/../public/plugins/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?=FwBase::$baseUrl?>/../public/plugins/js/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?=FwBase::$baseUrl?>/../public/plugins/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=FwBase::$baseUrl?>/../public/plugins/js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?=FwBase::$baseUrl?>/../public/plugins/js/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?=FwBase::$baseUrl?>/../public/plugins/js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=FwBase::$baseUrl?>/../public/plugins/js/demo.js"></script>
<!--<script src="<?=FwBase::$baseUrl?>/../public/js/jquery.form.js"></script>-->
</body>
</html>
