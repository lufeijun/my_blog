<?php $__env->startSection('title', '友情链接'); ?>

<?php $__env->startSection('header'); ?>
    <h1>
        友情链接
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
                            <a href="<?php echo e(route('lufeijun.link.create')); ?>" class="btn btn-white tooltips"
                               data-toggle="tooltip" data-original-title="新增"><i
                                        class="glyphicon glyphicon-plus"></i></a>
                        </div>
                    </div><!-- pull-right -->
                </div>
                <div class="box-body table-responsive no-padding ">
                    <table class="table table-hover">
                        <tr>
                            <th>名字</th>
                            <th>排序</th>
                            <th>URL</th>
                            <th>操作</th>
                        </tr>
                        <?php if($links): ?>
                            <?php foreach($links as $link): ?>
                                <tr>
                                    <td><?php echo e($link->name); ?></td>
                                    <td><?php echo e($link->sequence); ?></td>
                                    <td><?php echo e($link->url); ?></td>
                                    <td>
                                        <a href='<?php echo e(route("lufeijun.link.edit", ["id" => $link->id])); ?>' class='btn btn-info btn-xs'>
                                            <i class="fa fa-pencil"></i> 修改</a>
                                        <a data-href='<?php echo e(route("lufeijun.link.destroy", ["id" => $link->id])); ?>'
                                           class='btn btn-danger btn-xs link-delete'><i class="fa fa-trash-o"></i> 删除</a>
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
            $(".link-delete").click(function(){
                var url = $(this).attr('data-href');
                Moell.ajax.delete(url);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>