<?php $__env->startSection('title', '博客用户修改'); ?>

<?php $__env->startSection('header'); ?>
    <h1>
        博客用户修改
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <?php echo $__env->make('backend.alert.warning', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box box-solid">
                <form role="form" method="post" enctype="multipart/form-data" action="<?php echo e(route('lufeijun.user.update', ['id' => $user->id])); ?>" id="edit-user-form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="user_pic">头像</label>
                            <div class="row">
                                <div class='col-md-3'>
                                    <input type="file" name="user_pic" id="user_pic" accept="image/png,image/gif,image/jpeg" >
                                </div>
                                <div class='col-md-6'>
                                    <img src="<?php echo e(asset('uploads/avatar')); ?>/<?php echo e($user->user_pic); ?>" class="img-circle" style="width:80px;height:auto;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">名字</label>
                            <div class="row">
                                <div class='col-md-6'>
                                    <input type='text' value="<?php echo e($user->name); ?>" class='form-control' name="name" id='name' placeholder='请输入名字'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">登录邮箱</label>
                            <div class="row">
                                <div class='col-md-6'>
                                    <input type="text" value="<?php echo e($user->email); ?>" class='form-control' name="email" id="email" placeholder="请输入唯一的邮箱">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">登录密码</label>
                            <div class="row">
                                <div class='col-md-6'>
                                    <input type="password" class='form-control' name="password" id="password" placeholder="请输入大于等于8位的密码">
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PUT')); ?>



                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">确定</button>
                        <button type="button" class="btn btn-warning" id="reset-btn">重置</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>