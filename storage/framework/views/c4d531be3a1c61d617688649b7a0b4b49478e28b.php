<?php $__env->startSection('title','文章标签'); ?>

<?php $__env->startSection('header'); ?>
    <h1>
        文章标签
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
                            <a href="<?php echo e(route('lufeijun.tag.create')); ?>" class="btn btn-white tooltips"
                               data-toggle="tooltip" data-original-title="新增"><i
                                        class="glyphicon glyphicon-plus"></i></a>
                        </div>
                    </div><!-- pull-right -->
                </div>
                <div class="box-body table-responsive no-padding ">
                    <table class="table table-hover">
                        <tr>
                            <th>序号</th>
                            <th>标签名</th>
                            <th>文章数</th>
                            <th>操作</th>
                        </tr>
                        <?php if($tags): ?>
                            <?php $line = 1  ?>
                            <?php foreach($tags as $tag): ?>
                                <tr>
                                    <td><?php echo e($line); ?></td>
                                    <td><?php echo e($tag->tag_name); ?></td>
                                    <td>
                                        <?php /*<?php $articleTag = app('App\Presenters\ArticleTagPresenter'); ?>*/ ?>
                                        <?php /*<?php echo e($articleTag->getArticleNumber($tag->id)); ?>*/ ?>
                                    </td>
                                    <td>
                                        <a href='<?php echo e(route("lufeijun.tag.edit", ["id" => $tag->id])); ?>' class='btn btn-info btn-xs'>
                                            <i class="fa fa-pencil"></i> 修改</a>
                                        <a data-href='<?php echo e(route("lufeijun.tag.destroy", ["id" => $tag->id])); ?>'
                                           class='btn btn-danger btn-xs tag-delete'><i class="fa fa-trash-o"></i> 删除</a>
                                    </td>
                                </tr>
                                <?php $line++ ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $tags->links(); ?>

                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

    <script>
        $(function() {
            $(".tag-delete").click(function(){
                var url = $(this).attr('data-href');
                Moell.ajax.delete(url);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>