<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo SCHOOL_NAME;?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo ASSET_URL; ?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
        <!-- Ionicons -->
<!--        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo ASSET_URL; ?>dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo ASSET_URL; ?>dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        
        <link rel="stylesheet" href="<?php echo ASSET_URL; ?>upload/css/jquery.fileupload.css">

        <script src="<?php echo ASSET_URL;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <style>
            .error{
                color: #EF0000 !important;
                font-size: 13px !important;
            }
            .sidebar-menu .treeview img{
                width: 17px;

                padding-right: 1px;
            }
            .alert{
                width: 96% !important;
                margin-left: 2% !important;
            }
            .ms-container .ms-list{
                height: 450px;
            }
            .report-img{
                margin-top: 26px;
            }
        </style>
    </head>
    
    
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
<!--                <a href="index2.html" class="logo">   mini logo for sidebar mini 50x50 pixels 
                    <span class="logo-mini"><b>A</b>LT</span>
                
                    <span class="logo-lg"><b>Admin</b>LTE</span>
                </a>-->
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                           
                           
                            <!-- User Account: style can be found in dropdown.less -->
                           <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo ASSET_URL; ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                                    <span class="hidden-xs"><?php
//    if ($this->session->userdata('user_name') != '') {
//        echo $this->session->userdata('user_name');
//    }
    ?>Hello</span>
                                </a>
                                <ul class="dropdown-menu">
                                    
                                    <!-- Menu Footer-->
                                    <li class="user-footer" style="background-color: #367FA9;">
                                       
                                        <div class="pull-right">
                                            <a href="../auth/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <?php require_once 'app/views/includes/sidebar.php';?>
            
              <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $data['header'];?>
          </h1>
          
        </section>