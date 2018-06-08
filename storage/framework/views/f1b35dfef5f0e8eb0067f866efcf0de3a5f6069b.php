<?php $__env->startSection('title','文章分类'); ?>

<?php $__env->startSection('header'); ?>
    <h1>
        文章分类
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <?php echo $__env->make('backend.alert.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box box-solid">
                <!-- /.box-header -->
                <div class="box-header">
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="<?php echo e(route('lufeijun.category.create')); ?>" class="btn btn-white tooltips"
                               data-toggle="tooltip" data-original-title="新增"><i
                                        class="glyphicon glyphicon-plus"></i></a>
                        </div>
                    </div><!-- pull-right -->
                </div>
                <div class="box-body table-responsive no-padding ">
                    <table class="table table-hover">
                        <tr>
                            <th>序号</th>
                            <th>分类名</th>
                            <th>操作</th>
                        </tr>
                        <?php if($category): ?>
                            <?php $line = 1  ?>
                            <?php foreach($category as $id => $cate_name): ?>
                                <tr>
                                    <td><?php echo e($line); ?></td>
                                    <td><?php echo e($cate_name); ?></td>
                                    <td>
                                        <a href='<?php echo e(route("lufeijun.category.edit", ["id" => $id])); ?>' class='btn btn-info btn-xs'>
                                            <i class="fa fa-pencil"></i> 修改</a>
                                        <a href='<?php echo e(route("lufeijun.category.set-nav", ["id" => $id])); ?>' class='btn btn-info btn-xs'>
                                            设为导航
                                        </a>
                                        <a data-href='<?php echo e(route("lufeijun.category.destroy", ["id" => $id])); ?>'
                                           class='btn btn-danger btn-xs category-delete'><i class="fa fa-trash-o"></i> 删除</a>
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
            $(".category-delete").click(function(){
                var url = $(this).attr('data-href');
                Moell.ajax.delete(url);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>