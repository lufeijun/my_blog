<div class="tuijian">
    <?php $articlePresenter = app('App\Presenters\ArticlePresenter'); ?>

    <?php  $hotArticleList = $articlePresenter->hotArticleList(); ?>
    <h2 class="hometitle">点击排行</h2>
    <ul class="sidenews">
        <?php if($hotArticleList): ?>
            <?php foreach($hotArticleList as $item): ?>
            <li> <i><img src="<?php echo e($item->list_pic); ?>" style="width:100%;"></i>
            <p><a href="<?php echo e(route('article', ['id' => $item->id])); ?>"><?php echo e($articlePresenter->formatTitle($item->title)); ?></a></p>
            <span><?php echo e(date('Y-m-d',strtotime($item->created_at))); ?></span> </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>