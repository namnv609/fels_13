<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title_for_layout; ?></title>
<?php
    echo $this->Html->css(array(
        'admin/bootstrap.min',
        'admin/brain-theme',
        'admin/styles',
        'admin/font-awesome.min'
    ));
?>
<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<?php
    echo $this->Html->script(array(
        'admin/bootstrap.min',
        'admin/script'
    ));
?>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="hidden-lg pull-right">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-right">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar">
                        <span class="sr-only">Toggle sidebar</span>
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <ul class="nav navbar-nav navbar-left-custom">
                    <li class="user dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <img src="http://placehold.it/500" alt="">
                            <span><?php echo $this->Session->read("UserSession.userName"); ?></span>
                            <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="#"><i class="fa fa-tasks"></i> Tasks</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="<?php echo SITE_URL . DS; ?>logout"><i class="fa fa-mail-forward"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-icon sidebar-toggle"><i class="fa fa-bars"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /navbar -->
    <!-- Page header -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="logo"><a href="<?php echo ADMIN_ALIAS; ?>" title=""><img src="img/admin/logo.png" alt=""></a></div>
        </div>
    </div>
    <!-- /page header -->
    <!-- Page container -->
    <div class="page-container container-fluid">
        
        <!-- Sidebar -->
        <div class="sidebar collapse">
            <ul class="navigation">
                <li class="active">
                    <a><i class="fa fa-laptop"></i> Dashboard</a>
                    <ul>
                        <li>
                            <a href="<?php echo ADMIN_ALIAS; ?>">&raquo; Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo ADMIN_ALIAS; ?>/website-configuration">&raquo; Website configuration</a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a><i class="fa fa-th-large"></i> Words</a>
                    <ul>
                        <li><a href="<?php echo ADMIN_ALIAS; ?>/words-manage">&raquo; Words Manage</a></li>
                        <li><a href="<?php echo ADMIN_ALIAS; ?>/add-new-words">&raquo; Add new words</a></li>
                    </ul>
                </li>
                <li class="active">
                    <a><i class="fa fa-th-large"></i> Lessons</a>
                    <ul>
                        <li><a href="<?php echo ADMIN_ALIAS; ?>/lessons-manage">&raquo; Lessons Manage</a></li>
                        <li><a href="<?php echo ADMIN_ALIAS; ?>/add-new-lessons">&raquo; Add new lessons</a></li>
                    </ul>
                </li>
                <li class="active">
                    <a href="<?php echo ADMIN_ALIAS; ?>/users-manage"><i class="fa fa-user"></i> Users Manage</a>
                </li>
                <!--<li>
                    <a><i class="fa fa-th-large"></i> Lessons</a>
                    <ul>
                        <li><a href="#">&raquo; Menu 1</a></li>
                    </ul>
                </li>-->
            </ul>
        </div>
        <!-- /sidebar -->
    
        <!-- Page content -->
        <div class="page-content">
            <!-- Page title -->
            <div class="page-title">
                <h5><i class="fa fa-bars"></i> <?php echo $title_for_layout; ?></h5>
            </div>
            <!-- /page title -->
            <div class="panel-default panel">
                <div class="panel-body">
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
            <!-- Footer -->
            <div class="footer">
                &copy; Copyright 2014. All rights reserved.
            </div>
            <!-- /footer -->
        </div>
    </div>
</body>
</html>
