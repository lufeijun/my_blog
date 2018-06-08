<div class="links">
    <h2 class="hometitle">友情链接</h2>
    <?php $linkPresenter = app('App\Presenters\LinkPresenter'); ?>
    <ul>
        <?php $links = $linkPresenter->linkList() ?>

        <?php if($links): ?>
            <?php foreach($links as $link): ?>
                <li><a href="<?php echo e($link->url); ?>" target="_blank"><?php echo e($link->name); ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>