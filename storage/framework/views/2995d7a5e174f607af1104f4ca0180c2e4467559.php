<?php $__env->startSection('title','自定义页面'); ?>

<?php $__env->startSection('header'); ?>
    <h1>
        自定义页面管理
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <?php echo $__env->make('backend.alert.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box box-solid">
                <div class="box-header">
                    <div class="pull-right">
                        <a href='<?php echo e(route("lufeijun.page.create")); ?>' class='btn btn-success btn-xs'>
                            <i class="fa fa-plus"></i>新增页面</a>
                    </div>

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding ">
                    <table class="table table-hover">
                        <tr>
                            <th>标题</th>
                            <th>链接名</th>
                            <th>关键字</th>
                            <th>描述</th>
                            <th>操作</th>
                        </tr>
                        <?php $pagePresenter = app('App\Presenters\PagePresenter'); ?>
                        <?php if($pages): ?>
                            <?php foreach($pages as $page): ?>
                                <tr>
                                    <td><?php echo e($page->title); ?></td>
                                    <td><?php echo e($pagePresenter->getLink($page->id, $page->link_alias)); ?></td>
                                    <td><?php echo e($page->keyword); ?></td>
                                    <td><?php echo e($page->desc); ?></td>
                                    <td>
                                        <a href='<?php echo e(route("lufeijun.page.edit", ["id" => $page->id])); ?>' class='btn btn-info btn-xs'>
                                            <i class="fa fa-pencil"></i> 修改</a>
                                        <a data-href='<?php echo e(route("lufeijun.page.destroy", ["id" => $page->id])); ?>'
                                           class='btn btn-danger btn-xs page-delete'><i class="fa fa-trash-o"></i> 删除</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        $(function() {
            $(".page-delete").click(function(){
                var url = $(this).attr('data-href');
                Moell.ajax.delete(url);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>