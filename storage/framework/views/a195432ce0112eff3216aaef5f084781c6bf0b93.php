<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="<?php echo e(csrf_token()); ?>"/>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/bootstrap/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
    <?php /*<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">*/ ?>
    <link href="//cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Ionicons -->
    <?php /*<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">*/ ?>
    <link href="//cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/dist/css/AdminLTE.min.css')); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/dist/css/skins/_all-skins.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('bootstrapvalidator/dist/css/bootstrapValidator.min.css')); ?>" >

    <?php echo $__env->yieldContent('stylesheet'); ?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->

    <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo e(url('lufeijun' )); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>N</b>B</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>路飞君1234</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo e(asset('uploads/avatar')."/".Auth::user()->user_pic); ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo e(asset('uploads/avatar')."/".Auth::user()->user_pic); ?>" class="img-circle" alt="User Image">

                                <p>
                                    做努力的自己
                                    <?php /*<small></small>*/ ?>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo e(url('/')); ?>" target="_blank" class="btn btn-default btn-flat">首页</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo e(url('/lufeijun/logout')); ?>" class="btn btn-default btn-flat">退出</a>
                                </div>
                            </li>
                        </ul>
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
            <?php $backendPresenter = app('App\Presenters\BackendPresenter'); ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo e(asset('uploads/avatar')."/".Auth::user()->user_pic); ?>" class="img-circle" alt="User Image" style="width: 100%;height: 45px;">
                </div>
                <div class="pull-left info">
                    <p></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <ul class='sidebar-menu'>
                <?php echo $backendPresenter->menu(); ?>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <?php echo $__env->yieldContent('header'); ?>
        </section>
        <section class="content">
            <?php echo $__env->yieldContent('content'); ?>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">

        </div>
        <strong>现在时间 <?php echo e(date('Y-m-d')); ?></strong>
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="<?php echo e(asset('AdminLTE/plugins/jQuery/jQuery-2.2.0.min.js')); ?>"></script>

<!-- Bootstrap 3.3.6 -->
<script src="<?php echo e(asset('AdminLTE/bootstrap/js/bootstrap.min.js')); ?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo e(asset('AdminLTE/dist/js/app.min.js')); ?>"></script>

<script src="<?php echo e(asset('layer/layer.js')); ?>" ></script>

<script src="<?php echo e(asset('bootstrapvalidator/dist/js/bootstrapValidator.min.js')); ?>" ></script>

<script src="<?php echo e(asset('js/moell.js')); ?>" ></script>

<script src="<?php echo e(asset('js/backend.js')); ?>" ></script>

<?php echo $__env->yieldContent('javascript'); ?>
</body>
</html>