<?php $__env->startSection('title','文章标签修改'); ?>

<?php $__env->startSection('header'); ?>
    <h1>
        文章标签修改
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php echo $__env->make('backend.alert.warning', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-xs-12">
            <div class="box box-solid">
                <form role="form" method="post" action="<?php echo e(route('lufeijun.tag.update', ['id' => $tag->id])); ?>" id="tag-form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">标签名称</label>
                            <div class="row">
                                <div class='col-md-6'>
                                    <input type='text' value="<?php echo e($tag->tag_name); ?>" class='form-control' name="name" id='name' placeholder='请输入标签名称'>
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