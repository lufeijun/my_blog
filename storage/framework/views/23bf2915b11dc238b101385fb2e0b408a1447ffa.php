<?php $__env->startSection('title','文章分分类添加'); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        文章分分类添加
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <?php echo $__env->make('backend.alert.warning', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box box-solid">
                <form role="form" method="post" action="<?php echo e(url('lufeijun/category')); ?>" id="category-form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">分类名称</label>
                            <div class="row">
                                <div class='col-md-6'>
                                    <input type='text' class='form-control' name="name" id='name' placeholder='请输入分类名称'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cate_id">上级分类</label>
                            <div class="row">
                                <div class='col-md-6'>
                                    <?php $category = app('App\Presenters\CategoryPresenter'); ?>
                                    <?php echo $category->getSelect(0, '顶级分类'); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php echo e(csrf_field()); ?>



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