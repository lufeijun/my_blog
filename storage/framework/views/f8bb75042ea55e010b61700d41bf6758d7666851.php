<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>" />
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>">

    <link href="<?php echo e(asset('default/css/base.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('default/css/index_new.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('default/css/m.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('style'); ?>
    <style>
        #cnzz_stat_icon_1264398044{
            display: inline-block;
        }
        h2{
            margin-top: 0;
        }
    </style>
</head>
<body>
<?php $systemPresenter = app('App\Presenters\SystemPresenter'); ?>

<header>
    <!--menu begin-->
    <?php echo $__env->make('default.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!--menu end-->
</header>
<!-- Main jumbotron for a primary marketing message or call to action -->
<!--people-->
<div id="app"></div>
<script type="text/javascript">
    var isindex=true;var title="";var visitor="游客";
</script>
<!--end people-->
<article>
    <div class="blogsbox">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <div class="sidebar">
        <?php echo $__env->make('default.hot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make('default.tag', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make('default.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make('default.author', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</article>
<?php echo $__env->make('default.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(asset('default/js/jQuery-2.2.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('default/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('default/js/jquery.easyfader.min.js')); ?>"></script>
<script src="<?php echo e(asset('default/js/conn.js')); ?>"></script>
<script src="<?php echo e(asset('default/js/nav.js')); ?>"></script>
<script src="<?php echo e(asset('default/js/scrollReveal.js')); ?>"></script>
<!--[if lt IE 9]>
<script src="<?php echo e(asset('default/js/modernizr.js')); ?>"></script>
<![endif]-->


<?php echo $__env->yieldContent('script'); ?>
</body>
</html>

