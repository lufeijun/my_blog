<?php $__env->startSection('title','文件管理'); ?>

<?php $__env->startSection('header'); ?>
    <h1>
        文件管理
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <?php echo $__env->make('backend.alert.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('backend.alert.warning', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box box-solid">
                <!-- /.box-header -->
                <div class="box-header">
                    <p>
                        <a href="<?php echo e(url('lufeijun/file-upload')); ?>?dir=<?php echo e($dir); ?>" class="btn btn-info btn-sm">上传文件</a>
                        <buttom type="button" class="btn btn-info btn-sm" onclick="mkdir()">新建目录</buttom>
                    </p>
                </div>
                <div class="box-body table-responsive no-padding ">
                    <table class="table table-hover">
                        <tr>
                            <th>名字</th>
                            <th>类型</th>
                            <th>日期</th>
                            <th>大小</th>
                            <th>链接地址</th>
                            <th>操作</th>
                        </tr>
                        <?php if($fileList): ?>
                            <?php if($fileList['dirList']): ?>
                                <?php foreach($fileList['dirList'] as $dirName): ?>
                                    <tr>
                                        <td>
                                            <?php $dirPath = "/".trim($dir."/".$dirName,'/'); ?>
                                            <a href="<?php echo e(route('lufeijun.upload.index')); ?>?dir=<?php echo e($dirPath); ?>">
                                                <?php echo e($dirName); ?>

                                            </a>
                                        </td>
                                        <td>dir</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a data-href='<?php echo e(route('lufeijun.upload.dir-del')); ?>?dir=<?php echo e($dirPath); ?>'
                                               class='btn btn-danger btn-xs upload-delete'><i class="fa fa-trash-o"></i> 删除</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if($fileList['fileList']): ?>
                                <?php foreach($fileList['fileList'] as $file): ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e($file['path']); ?>" target="_blank"><?php echo e($file['file_name']); ?></a>
                                        </td>
                                        <td><?php echo e($file['mime_type']); ?></td>
                                        <td><?php echo e($file['modified_date']); ?></td>
                                        <td><?php echo e($file['size']); ?></td>
                                        <td><?php echo e($file['path']); ?></td>
                                        <td>
                                            <a data-href='<?php echo e(route('lufeijun.upload.file-del')); ?>?file=<?php echo e($dir.'/'.$file['file_name']); ?>'
                                               class='btn btn-danger btn-xs upload-delete'><i class="fa fa-trash-o"></i>
                                                删除
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div id="mkdir" style="display: none">
        <form role="form" method="post" class="form-inline"  action=""  >
            <div class="box-body">
                <div class="form-group">
                    <label for="dir_name">目录名称</label>
                    &nbsp;
                    <input name="dir" value="<?php echo e($dir); ?>" type="hidden" />
                    <input type="text"  name="dir_name" id="dir_name" placeholder="目录名称">
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('zclip/jquery.zclip.min.js')); ?>"></script>
    <script>
        $(function() {
            $(".upload-delete").click(function(){
                var url = $(this).attr('data-href');
                Moell.ajax.delete(url);
            });
        });

        function mkdir() {
            layer.open({
                type: 1,
                title: ['创建目录','padding-left:10px;font-size:16px;'],
                closeBtn: 1,
                area: '300px',
                shadeClose: true,
                skin: 'yourclass',
                id: 'mkdir-form',
                content: $("#mkdir").html(),
                btn: ['确认创建'],
                yes: function(index, layero){
                    var dirName = $("#mkdir-form input[name='dir_name']").val();
                    var dir = $("#mkdir-form input[name='dir']").val();
                    if (!dirName) {
                        layer.msg('目录名不能为空', {time: 1000, icon: 5});
                    }
                    Moell.ajax.postForm("<?php echo e(route('lufeijun.upload.mkdir')); ?>", {dir_name : dirName, dir:dir}, 'POST');
                }
            })
        }

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>