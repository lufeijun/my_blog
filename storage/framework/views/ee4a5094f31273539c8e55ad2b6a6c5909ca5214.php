<?php $__env->startSection('title','导航管理'); ?>

<?php $__env->startSection('header'); ?>
    <h1>
        导航管理
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <?php echo $__env->make('backend.alert.warning', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('backend.alert.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box box-solid">
                <!-- /.box-header -->
                <div class="box-header">
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="<?php echo e(route('lufeijun.navigation.create')); ?>" class="btn btn-white tooltips"
                               data-toggle="tooltip" data-original-title="新增"><i
                                        class="glyphicon glyphicon-plus"></i></a>
                        </div>
                    </div><!-- pull-right -->
                </div>
                <div class="box-body table-responsive no-padding ">
                    <table class="table table-hover">
                        <tr>
                            <th>序号</th>
                            <th>导航名</th>
                            <th>URL</th>
                            <th>类型</th>
                            <th>顺序</th>
                            <th>状态</th>
                            <th>文章分类</th>
                            <th>操作</th>
                        </tr>
                        <?php if($navigations): ?>
                            <?php /*<?php $articleCategory = app('App\Presenters\CategoryPresenter'); ?>*/ ?>
                            <?php $line = 1  ?>
                            <?php foreach($navigations as $navigation): ?>
                                <tr>
                                    <td><?php echo e($line); ?></td>
                                    <td><?php echo e($navigation->name); ?></td>
                                    <td><?php echo e($navigation->url); ?></td>
                                    <td>
                                        <?php if($navigation->nav_type == 1): ?>
                                            文章分类
                                        <?php else: ?>
                                            自定义
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($navigation->sequence); ?></td>
                                    <td>
                                        <?php if($navigation->state == 1): ?>
                                            隐藏
                                        <?php else: ?>
                                            显示
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($navigation->category): ?>
                                            <?php echo e($navigation->category->name); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href='<?php echo e(route("lufeijun.navigation.edit", ["id" => $navigation->id])); ?>' class='btn btn-info btn-xs'>
                                            <i class="fa fa-pencil"></i> 修改</a>
                                        <a data-href='<?php echo e(route("lufeijun.navigation.destroy", ["id" => $navigation->id])); ?>'
                                           class='btn btn-danger btn-xs navigation-delete'><i class="fa fa-trash-o"></i> 删除</a>
                                    </td>
                                </tr>
                                <?php $line++ ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        $(function() {
            $(".navigation-delete").click(function(){
                var url = $(this).attr('data-href');
                Moell.ajax.delete(url);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>