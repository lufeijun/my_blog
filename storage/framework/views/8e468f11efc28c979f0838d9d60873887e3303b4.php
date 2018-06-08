<?php $__env->startSection('title', '文章管理'); ?>

<?php $__env->startSection('header'); ?>
    <h1>
        文章管理
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-xs-12">
            <?php echo $__env->make('backend.alert.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box box-solid">
                <div class="box-header">
                    <form class="form-inline" action="" method="get">
                        <div class="form-group">
                            <label for="title">标题</label>&nbsp;
                            <input name='title' type="text" class="form-control" id="title" placeholder="请输入文章标题">&nbsp;
                        </div>
                        <div class="form-group">
                            <label for="cate_id">分类</label>&nbsp;
                            <?php $categoryPresenter = app('App\Presenters\CategoryPresenter'); ?>
                            <?php echo $categoryPresenter->getSelect(0, '请选择', ''); ?>

                        </div>
                        <button type="submit" class="btn btn-info">搜索</button>
                        <div class="pull-right">
                            <a href='<?php echo e(route("lufeijun.article.create")); ?>' class='btn btn-success btn-xs'>
                                <i class="fa fa-plus"></i>发布文章</a>
                        </div>
                    </form>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding ">
                    <table class="table table-hover">
                        <tr>
                            <th>序号</th>
                            <th>作者</th>
                            <th>标题</th>
                            <th>阅读数</th>
                            <th>评论数</th>
                            <th>分类</th>
                            <th>时间</th>
                            <th>操作</th>
                        </tr>
                        <?php if($articles): ?>
                            <?php $articlePresenter = app('App\Presenters\ArticlePresenter'); ?>

                            <?php $line = 1 ?>
                            <?php foreach($articles as $article): ?>
                                <tr>
                                    <td><?php echo e($line); ?></td>
                                    <td>
                                        <?php if($article->user): ?>
                                            <?php echo e($article->user->name); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($articlePresenter->formatTitle($article->title)); ?></td>
                                    <td><?php echo e($article->read_count); ?></td>
                                    <td><?php echo e($article->comment_count); ?></td>
                                    <td>
                                        <?php if($article->category): ?>
                                            <?php echo e($article->category->name); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($article->created_at); ?></td>
                                    <td>
                                        <a href='<?php echo e(route("lufeijun.article.edit", ["id" => $article->id])); ?>' class='btn btn-info btn-xs'>
                                            <i class="fa fa-pencil"></i> 修改</a>
                                        <a data-href='<?php echo e(route("lufeijun.article.destroy", ["id" => $article->id])); ?>'
                                           class='btn btn-danger btn-xs article-delete'><i class="fa fa-trash-o"></i> 删除</a>
                                    </td>
                                </tr>
                                <?php $line++ ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </table>
                </div>
                <!-- /.box-body -->

                <div class="box-footer clearfix">
                    <?php echo $articles->links(); ?>

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