<div class="menu">
    <nav class="nav" id="topnav">
        <h1 class="logo"><a href="<?php echo e(url("/")); ?>"><?php echo e($systemPresenter->getKeyValue('blog_name')); ?></a></h1>
        <?php $navPresenter = app('App\Presenters\NavigationPresenter'); ?>
        <?php $navigations = $navPresenter->getNavList(); ?>
        <?php if($navigations): ?>
            <?php foreach($navigations as $navigation): ?>
                <li><a href="<?php echo e($navigation->url); ?>"><?php echo e($navigation->name); ?></a> </li>
            <?php endforeach; ?>
        <?php endif; ?>
        <!--search begin-->
        <div id="search_bar" class="search_bar">
            <form  id="searchform" action="<?php echo e(route('search')); ?>" method="get" name="searchform">
                <input class="input" placeholder="想搜点什么呢..." type="text" name="keyword" id="keyboard">
                <input type="hidden" name="Submit" value="搜索" />
                <span class="search_ico"></span>
            </form>
        </div>
        <!--search end-->
    </nav>
</div>
<!--mnav begin-->
<div id="mnav">
    <h2><a href="<?php echo e(url("/")); ?>" class="mlogo"><?php echo e($systemPresenter->getKeyValue('blog_name')); ?></a><span class="navicon"></span></h2>
    <dl class="list_dl">
        <?php $navPresenter = app('App\Presenters\NavigationPresenter'); ?>
        <?php $navigations = $navPresenter->getNavList(); ?>
        <?php if($navigations): ?>
            <?php foreach($navigations as $navigation): ?>
                <dt class="list_dt"> <a href="<?php echo e($navigation->url); ?>"><?php echo e($navigation->name); ?></a> </dt>
            <?php endforeach; ?>
        <?php endif; ?>
    </dl>
</div>
<!--mnav end-->