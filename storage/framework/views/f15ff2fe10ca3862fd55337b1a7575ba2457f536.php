<?php $__env->startSection('title', '用户列表'); ?>

<?php $__env->startSection('header'); ?>
    <h1>
        用户列表
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
                            <a href="<?php echo e(route('lufeijun.user.create')); ?>" class="btn btn-white tooltips"
                               data-toggle="tooltip" data-original-title="新增"><i
                                        class="glyphicon glyphicon-plus"></i></a>
                        </div>
                    </div><!-- pull-right -->
                </div>
                <div class="box-body table-responsive no-padding ">
                    <table class="table table-hover">
                        <tr>
                            <th>序号</th>
                            <th>头像</th>
                            <th>名字</th>
                            <th>邮箱</th>
                            <th>操作</th>
                        </tr>
                        <?php if($users): ?>
                            <?php $line = 1  ?>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <td><?php echo e($line); ?></td>
                                    <td>
                                        <img src="<?php echo e(asset('uploads/avatar')); ?>/<?php echo e($user['user_pic']); ?>" class="img-circle" style="width:30px;height:auto;">
                                    </td>
                                    <td><?php echo e($user['name']); ?></td>
                                    <td><?php echo e($user['email']); ?></td>
                                    <td>
                                        <a href='<?php echo e(route("lufeijun.user.edit", ["id" => $user['id']])); ?>' class='btn btn-info btn-xs'>
                                            <i class="fa fa-pencil"></i> 修改</a>
                                        <a data-href='<?php echo e(route("lufeijun.user.destroy", ["id" => $user['id']])); ?>'
                                           class='btn btn-danger btn-xs user-delete'><i class="fa fa-trash-o"></i> 删除</a>
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
            $(".user-delete").click(function(){
                var url = $(this).attr('data-href');
                Moell.ajax.delete(url);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>