<?php $systemPresenter = app('App\Presenters\SystemPresenter'); ?>



<?php $__env->startSection('title',$systemPresenter->checkReturnValue('title',$article->title)); ?>

<?php $__env->startSection('description',$systemPresenter->checkReturnValue('seo_desc',$article->desc)); ?>

<?php $__env->startSection('keywords',$systemPresenter->checkReturnValue('seo_keyword',$article->keyword)); ?>

<?php $userPresenter = app('App\Presenters\UserPresenter'); ?>
<?php
$author = isset($user->id) ? $user : $userPresenter->getUserInfo();
?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('default/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('editor.md/css/editormd.preview.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('share.js/css/share.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

    <style>
        body{
            background: #f6f6f6;
        }
        header{
            background: none;
        }
        .nav li{
            list-style: none;
        }
        ul,li{
            list-style: disc;
        }
        .nav>li>a:focus, .nav>li>a:hover{
            background: none;
        }
        .nav>li>a{
            padding: 0 20px;
            font: 15px "Microsoft YaHei", Arial, Helvetica, sans-serif;
            line-height: 80px;
        }
        .logo>a{
            font: 26px "Microsoft YaHei", Arial, Helvetica, sans-serif;
            font-weight: bold;
        }
        .logo>a:hover{
            text-decoration:none ;
            color: #00A7EB;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('backend.alert.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <input type="hidden" id="action">
    <input type="hidden" id="replyid">
    <div class="infosbox" style="width: 100%;">
        <div class="newsview">
            <h3 class="news_title"><?php echo e($article->title); ?></h3>
            <div class="bloginfo">
                <ul>
                    <li class="author"><a><?php echo e($author->name); ?></a></li>
                    <li class="lmname"><a href="<?php echo e(route('category',['id'=>$article->cate_id])); ?>"><?php echo e($article->category->name); ?></a></li>
                    <li class="timer"><?php echo e(date("Y-m-d" ,strtotime($article->created_at))); ?></li>
                    <li class="view"><?php echo e($article->read_count); ?></li>
                    <li class="comment"><?php echo e($article->comment_count); ?></li>
                </ul>
            </div>
            <div class="tags">
                <?php foreach( $article->tag as $tag ): ?>
                    <a href="<?php echo e(route('tag',['id'=>$tag->id])); ?>"><?php echo e($tag->tag_name); ?></a> &nbsp;
                <?php endforeach; ?>

            </div>

            <div class="news_con">
                <div class="markdown-body editormd-html-preview" style="padding:0;">
                    <?php echo $article->html_content; ?>

                </div>
                <div style="margin-top:20px;">
                    <div id="share" class="social-share"></div>
                </div>
                <br><br>
                <p class="z-counter">
                <h4 style="display: inline-block;">评论 <?php echo e($article->comment_count); ?></h4>
                <a href="" onclick="return false" style="float:right" data-toggle="modal" data-target="#commentModal"><h4><span class="glyphicon glyphicon-pencil" ></span>发表评论</h4></a>
                </p>
                <div class="z-comments" id="commentdiv">
                    <?php foreach($comments as $comment): ?>
                        <hr id="comment<?php echo e($comment->id); ?>">
                        <?php if( $comment->user_id == 1 ): ?>
                            <img src="<?php echo e(asset('uploads/avatar')."/".$author->user_pic); ?>" class="img-circle z-avatar">
                            <p class="z-name z-center-vertical"><?php echo e($author->name); ?> <span class="label label-info z-label">博主</span></p>
                        <?php elseif( $comment->website ): ?>
                            <p class="z-avatar-text"><?php echo $comment['avatar_text'] ? $comment['avatar_text'] : '匿' ?></p>
                            <a href="<?php echo e($comment->website); ?>" target="_blank">
                                <p class="z-name"><?php echo $comment['name'] ? $comment['name'] : '匿名' ?></p>
                            </a>
                        <?php else: ?>
                            <p class="z-avatar-text"><?php echo $comment['avatar_text'] ? $comment['avatar_text'] : '匿' ?></p>
                            <p class="z-name"><?php echo $comment['name'] ? $comment['name'] : '匿名' ?></p>
                        <?php endif; ?>
                        <p class="z-content"><?php echo e($comment->content); ?></p>
                        <p class="z-info"><?php echo e($comment->created_at_diff); ?> · <?php echo e($comment->city); ?> <span data-toggle="modal" data-target="#commentModal" data-replyid="<?php echo e($comment->id); ?>" data-replyname="<?php echo e($comment->name); ?>" data-commentid="<?php echo e($comment->id); ?>" id="replyid<?php echo e($comment->id); ?>" class="glyphicon glyphicon-share-alt z-reply-btn"></span></p>
                        <div class="z-reply" id="commentid<?php echo e($comment->id); ?>">
                            <?php foreach( $comment->replys as $reply ): ?>
                                <?php if( $reply->user_id == 1 ): ?>
                                    <img src="<?php echo e(asset('uploads/avatar')."/".$author->user_pic); ?>" class="img-circle z-avatar">
                                    <p class="z-name z-center-vertical"><?php echo e($author->name); ?> <span class="label label-info z-label">博主</span></p>
                                <?php elseif( $reply->website ): ?>
                                    <p class="z-avatar-text"><?php echo $reply['avatar_text'] ? $reply['avatar_text'] : '匿' ?></p>
                                    <a href="<?php echo e($reply->website); ?>" target="_blank">
                                        <p class="z-name"><?php echo $reply['name'] ? $reply['name'] : '匿名' ?></p>
                                    </a>
                                <?php else: ?>
                                    <p class="z-avatar-text"><?php echo $reply['avatar_text'] ? $reply['avatar_text'] : '匿' ?></p>
                                    <p class="z-name"><?php echo $reply['name'] ? $reply['name'] : '匿名' ?></p>
                                <?php endif; ?>
                                <p class="z-content">回复 <b><?php echo e($reply->target_name); ?></b>：<?php echo e($reply->content); ?></p>
                                <p class="z-info"><?php echo e($reply->created_at_diff); ?> · <?php echo e($reply->city); ?> <span data-toggle="modal" data-target="#commentModal" data-replyid="<?php echo e($comment->id); ?>" data-replyname="<?php echo e($reply->name); ?>" data-commentid="<?php echo e($reply->id); ?>" id="replyid<?php echo e($comment->id); ?>" class="glyphicon glyphicon-share-alt z-reply-btn"></span></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php /*<strong>发表评论</strong>*/ ?>
            <?php /*<?php if($systemPresenter->getKeyValue('comment_script') !=""): ?>*/ ?>
            <?php /*<div id="SOHUCS" sid="<?php echo e(route('article', ['id' => $article->id])); ?>" ></div>*/ ?>
            <?php /*<?php echo $systemPresenter->getKeyValue('comment_script'); ?>*/ ?>
            <?php /*<?php endif; ?>*/ ?>


            <!-- comment Modal -->
                <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">发表评论</h4>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" id="form1">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="form-group">
                                        <label for="exampleInputFile">留言</label>
                                        <textarea class="form-control" id="contents" name="contents" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">昵称</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="[选填] 怎么称呼？" value="<?php echo e($inputs->name); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">邮箱</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="[选填] 如果有人回复，会收到邮件提醒" value="<?php echo e($inputs->email); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">个人网站</label>
                                        <input type="text" class="form-control" id="website" name="website" placeholder="[选填] 包含 http:// 或 https:// 的完整域名" value="<?php echo e($inputs->website); ?>">
                                    </div>
                                    <input type="text" id="parent_id" name="parent_id" style="display:none">
                                    <input type="text" id="target_name" name="target_name" style="display:none">
                                    <input type="text" id="comment_id" name="comment_id" style="display:none">
                                    <input type="text" name="article_id" value="<?php echo e($article->id); ?>" style="display:none">
                                    <input type="submit" id="commentFormBtn"  style="display:none">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                <button type="button" class="btn btn-primary" onclick="comment()">发表</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('share.js/js/jquery.share.min.js')); ?>"></script>

    <script>
        $('#commentModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            if (button.data('replyid')) {
                var replyid = button.data('replyid')
                var replyname = button.data('replyname') ? button.data('replyname') : '匿名'
                var commentid = button.data('commentid')
                var modal = $(this)
                modal.find('#parent_id').val(replyid)
                modal.find('#target_name').val(replyname)
                modal.find('#content').attr("placeholder", "回复 @"+replyname)
                modal.find('#comment_id').val(commentid)
                $('#action').val('reply');
                $('#replyid').val('commentid'+replyid);
            }else {
                var modal = $(this)
                modal.find('#parent_id').val(0)
                modal.find('#target_name').val('')
                modal.find('#content').attr("placeholder", "")
                $('#action').val('comment');
            }
        })

        $(function(){
            $('#share').share({sites: ['qzone', 'qq', 'weibo','wechat']});
        });

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : '<?php echo e(csrf_token()); ?>' }
        });

        function comment() {
            $content=$('#contents').val();
            if($content==null || $content==''){
                document.getElementById('commentFormBtn').click();
                return false;
            }else{
                if($('#email').val()!=''){
                    var reg1 = /[a-zA-Z0-9]{1,10}@[a-zA-Z0-9]{1,5}/;
                    if(!reg1.test($('#email').val())){
                        document.getElementById('commentFormBtn').click();
                        return false;
                    }
                }
                $.ajax({
                    type: "POST",//方法类型
                    dataType: "json",//预期服务器返回的数据类型
                    url: "/comment" ,//url
                    data: $('#form1').serialize(),
                    success: function (result) {
                        console.log(result);//打印服务端返回的数据(调试用)
                        if (result.resultCode == 200) {
                            $('contents').val('');
                            $('#commentModal').modal('hide');

                            var action=$('#action').val();
                            if(action=='comment'){
                                document.all.commentdiv.insertAdjacentHTML("afterBegin",result.html);
                            }else{
                                var replyid=$('#replyid').val();
                                $('#'+replyid).append(result.html);
                            }
                            $.ajax({
                                type:'GET',
                                dataType:'json',
                                url:'/send',
                                data:{'comment_id':result.comment_id,'article_id':result.article_id},
                                success:function (res) {

                                },
                                error:function () {

                                }
                            });
                        }else{

                        }
                    },
                    error : function() {
                        alert("服务器异常，请稍后评论！");
                    }
                });
            }
        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>