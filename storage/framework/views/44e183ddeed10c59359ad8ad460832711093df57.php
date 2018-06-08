<div class="cloud">
    <h2 class="hometitle">标签云</h2>
    <ul>
        <?php $tagPresenter = app('App\Presenters\TagPresenter'); ?>
        <?php
        $tagList = $tagPresenter->tagList();
        ?>
        <?php if($tagList): ?>
            <?php foreach($tagList as $item): ?>
                <a href="<?php echo e(route('tag', ['id' => $item->id])); ?>"><?php echo e($item->tag_name); ?></a>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>