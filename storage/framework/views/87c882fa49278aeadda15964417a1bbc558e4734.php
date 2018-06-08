<div class="guanzhu" id="float">
    <?php $userPresenter = app('App\Presenters\UserPresenter'); ?>
    <?php
    $author = isset($user->id) ? $user : $userPresenter->getUserInfo();
    ?>
    <h2 class="hometitle">关注</h2>
    <ul>
        <?php
        $github_url = '';
        $qq = '';
        if(!isset($user->id)||$user->id == 1){
            $github_url = $systemPresenter->getKeyValue('github_url');
            $qq = $systemPresenter->getKeyValue('qq');
        }
        ?>
        <li class="wx"><img src="<?php echo e(asset('uploads/avatar')."/".$author->user_pic); ?>"></li>
        <?php if($github_url != ""): ?>
         <li class="tencent"><a href="<?php echo e($github_url); ?>" target="_blank"><span>GitHub</span>路飞君1234</a></li>
         <?php endif; ?>
         <?php if($qq != ""): ?>
        <li class="qq"><a><span>QQ号</span><?php echo e($qq); ?></a></li>
        <?php endif; ?>
    </ul>
</div>