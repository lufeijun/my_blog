<?php $userPresenter = app('App\Presenters\UserPresenter'); ?>
<?php
$author = isset($user->id) ? $user : $userPresenter->getUserInfo();
?>
<?php if($articles[0]!=""): ?>
    <?php foreach($articles as $article): ?>
        <div class="blogs" data-scroll-reveal="enter bottom over 1s" >
            <h3 class="blogtitle"><a href="<?php echo e(route('article',['id'=>$article->id])); ?>"><?php echo e($article->title); ?></a></h3>
            <span class="blogpic"><a href="<?php echo e(route('article',['id'=>$article->id])); ?>" title=""><img src="<?php echo e($article->list_pic); ?>" style="height: 120px;" alt=""></a></span>
            <p class="blogtext"><?php echo e($article->desc); ?> </p>
            <div class="bloginfo">
                <ul>
                    <li class="author"><a><?php echo e($author->name); ?></a></li>
                    <?php if($article->category): ?>
                    <li class="lmname"><a href="<?php echo e(route('category', ['id' => $article->cate_id])); ?>"><?php echo e($article->category->name); ?></a></li>
                    <?php endif; ?>
                    <li class="timer"><?php echo e(date('Y-m-d',strtotime($article->created_at))); ?></li>
                    <li class="view"><span><?php echo e($article->read_count); ?></span> </li>
                    <li class="comment"><?php echo e($article->comment_count); ?></li>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
    <?php echo $articles->links(); ?>

<?php else: ?>
    <br/><br/><br/>
    <h2 style="color: #666;">Ooops...没找到你想要的 ：(</h2>
    <span>您可以尝试搜点别的 或 <a href="<?php echo e(url("/")); ?>" >返回首页</a></span>
    <br><br><br>
<?php endif; ?>