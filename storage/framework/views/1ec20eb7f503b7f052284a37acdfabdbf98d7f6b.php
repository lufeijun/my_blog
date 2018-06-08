<?php $__env->startSection('title', '友情链接修改'); ?>

<?php $__env->startSection('header'); ?>
    <h1>
        友情链接修改
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php echo $__env->make('backend.alert.warning', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-xs-12">
            <div class="box box-solid">
                <form role="form" method="post" action="<?php echo e(route('lufeijun.link.update', ['id' => $link->id])); ?>" id="link-form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">链接名称</label>
                            <div class="row">
                                <div class='col-md-6'>
                                    <input type='text' value=<?php echo e($link->name); ?> class='form-control' name="name" id='name' placeholder='请输入链接名称'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <div class="row">
                                <div class='col-md-6'>
                                    <input type='text' value=<?php echo e($link->url); ?> class='form-control' name="url" id='url' placeholder='请输入以http或https合法的链接'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sequence">顺序</label>
                            <div class="row">
                                <div class='col-md-6'>
                                    <input type='text' value="<?php echo e($link->sequence); ?>" class='form-control' name="sequence" id='sequence' placeholder='请输入链接顺序'>
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