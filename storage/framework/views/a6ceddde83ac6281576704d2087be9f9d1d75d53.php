<?php $__env->startSection('title', '评论管理'); ?>

<?php $__env->startSection('header'); ?>
    <h1>
        评论管理
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-xs-12">
            <?php echo $__env->make('backend.alert.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box box-solid">
                <?php /*<div class="box-header">*/ ?>
                    <?php /*<form class="form-inline" action="" method="get">*/ ?>
                        <?php /*<div class="form-group">*/ ?>
                            <?php /*<label for="title">文章</label>&nbsp;*/ ?>
                            <?php /*<input name='title' type="text" class="form-control" id="title" placeholder="请输入文章标题">&nbsp;*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*<div class="form-group">*/ ?>
                            <?php /*<label for="cate_id">分类</label>&nbsp;*/ ?>
                            <?php /*<?php $categoryPresenter = app('App\Presenters\CategoryPresenter'); ?>*/ ?>
                            <?php /*<?php echo $categoryPresenter->getSelect(0, '请选择', ''); ?>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*<button type="submit" class="btn btn-info">搜索</button>*/ ?>
                        <?php /*<div class="pull-right">*/ ?>
                            <?php /*<a href='<?php echo e(route("lufeijun.article.create")); ?>' class='btn btn-success btn-xs'>*/ ?>
                                <?php /*<i class="fa fa-plus"></i>发布文章</a>*/ ?>
                        <?php /*</div>*/ ?>
                    <?php /*</form>*/ ?>
                <?php /*</div>*/ ?>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding ">
                    <table class="table table-hover">
                        <tr>
                            <th>标题</th>
                            <th>内容</th>
                            <th>用户</th>
                            <th>邮箱</th>
                            <th>网站</th>
                            <th>ip</th>
                            <th>城市</th>
                            <th>操作</th>
                        </tr>
                        <?php if($comments): ?>
                            <?php $articlePresenter = app('App\Presenters\ArticlePresenter'); ?>
                            <?php foreach($comments as $comment): ?>
                                <tr>
                                    <td><a href="/article/<?php echo e($comment->article_id); ?>" target="_blank"><?php echo e($articlePresenter->formatTitle($comment->article->title)); ?></a></td>
                                    <td>
                                        <?php echo e($comment->content); ?>

                                    </td>
                                    <td><?php echo e($comment->name); ?></td>
                                    <td><?php echo e($comment->email); ?></td>
                                    <td><?php echo e($comment->website); ?></td>
                                    <td>
                                        <?php echo e($comment->ip); ?>

                                    </td>
                                    <td><?php echo e($comment->city); ?></td>
                                    <td>
                                        <a data-href='<?php echo e(route("lufeijun.comment.destroy", ["id" => $comment->id])); ?>'
                                           class='btn btn-danger btn-xs article-delete'><i class="fa fa-trash-o"></i> 删除</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </table>
                </div>
                <!-- /.box-body -->

                <div class="box-footer clearfix">
                    <?php echo $comments->links(); ?>

                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        $(function() {
            $(".article-delete").click(function(){
                var url = $(this).attr('data-href');
                Moell.ajax.delete(url);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>