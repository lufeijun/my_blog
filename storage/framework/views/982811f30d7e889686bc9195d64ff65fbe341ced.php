<?php $__env->startSection('title','路飞君1234'); ?>

<?php $__env->startSection('header'); ?>
    <h1>
        Home
        <small>welcome back</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        p {
            text-indent: 10px;
        }
    </style>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid" style="padding: 10px; padding-top: 200px; min-height: 600px; text-align: center;">
                <h1>不知道该说点啥子</h1>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>