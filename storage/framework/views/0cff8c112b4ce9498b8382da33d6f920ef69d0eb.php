<?php $__env->startSection('title', '新建页面'); ?>

<?php $__env->startSection('stylesheet'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('editor.md/css/editormd.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <h1>
        新建页面
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <?php echo $__env->make('backend.alert.warning', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box box-solid">
                <form role="form" method="post" action="<?php echo e(url('lufeijun/page')); ?>" id="page-form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">页面标题</label>
                            <div class="row">
                                <div class='col-md-6'>
                                    <input type='text' class='form-control' name="title" id='title' placeholder='标题'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link_alias">链接别名</label>
                            <div class="row">
                                <div class='col-md-6'>
                                    <input type='text' class='form-control' name="link_alias" id='link_alias' placeholder='链接别名,关于页面请用about关联'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keyword">关键字(Keywords)</label>
                            <div class="row">
                                <div class='col-md-6'>
                                    <input type='text' class='form-control' name="keyword" id='keyword' placeholder='请输入关键字，以英文逗号分割，利于搜索引擎收录'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc">描述(Description)</label>
                            <div class="row">
                                <div class='col-md-10'>
                                    <input type='text' class='form-control' name="desc" id='desc' placeholder='请输入页面描述'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content">页面内容</label>
                            <div id="editormd">
                                <textarea class="editormd-markdown-textarea" style="display:none;" id="content" name="content"></textarea>
                                <textarea style="display:none;"  name="html_content"></textarea>
                            </div>
                        </div>
                    </div>

                    <?php echo e(csrf_field()); ?>



                    <div class="box-footer">
                        <button type="submit" id="submit-page" class="btn btn-primary">创建</button>
                        <button type="button" id="reset-btn" class="btn btn-warning">重置</button>
                    </div>
                </form>

            </div>
            <!-- /.box -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('editor.md/editormd.min.js')); ?>"></script>
    <script>

        var editor = editormd("editormd", {
            path        : "<?php echo e(asset('/editor.md/lib/')); ?>/",
            height  : 500,
            syncScrolling : "single",
            toolbarAutoFixed: false,
            saveHTMLToTextarea : false,
            imageUpload: true,
            imageFormats : ["jpg","jpeg","gif","png","bmp","webp"],
            imageUploadURL:"<?php echo e(url('lufeijun/uploadimage')); ?>"
        });

        /* 页面操作验证 */
        $("#page-form").bootstrapValidator({
            live: 'disables',
            message: "This Values is not valid",
            feedbackIcons: {
                valid: 'glyphicon ',
                invalid: 'glyphicon ',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields : {
                title : {
                    validators : {
                        notEmpty : {
                            message : "页面标题不能为空"
                        }
                    }
                }
            }
        }).on('success.form.bv', function(e) {
            var html = editor.getPreviewedHTML();
            $("#page-form textarea[name='html_content']").val(html);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>