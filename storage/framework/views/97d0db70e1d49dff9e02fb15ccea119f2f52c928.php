<footer>
    <p>Powered by
        <a><?php echo e($systemPresenter->getKeyValue('blog_name')); ?></a>
        <?php if($systemPresenter->getKeyValue('icp')): ?>
            <a href="http://www.miitbeian.gov.cn" target="_blank"><?php echo e($systemPresenter->getKeyValue('icp')); ?></a>
        <?php endif; ?>
        &nbsp;
        <?php echo $systemPresenter->getKeyValue('statistics_script'); ?>

    </p>
</footer>
<a href="#" class="cd-top">Top</a>
