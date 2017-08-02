<?php
/**
 * Created by PhpStorm.
 * User: symphp <symphp@foxmail.com>
 * Date: 2017/8/2
 * Time: 20:53
 */
?>
<script src="/public/assets/jquery-validate/dist/jquery.validate.min.js"></script>
<script src="/public/assets/jquery-validate/localization/messages_zh.js"></script>
<script>
    $().ready(function() {
        var validator = $("#autoForm").validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parent().parent());
            }
        });
        $("#reset").click(function() {
            validator.resetForm();
        });
    });
</script>
<link rel="stylesheet" href="/public/css/validate.css">
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <form class="form-horizontal form-label-left" action="add" method="post" id="autoForm">
                    <span class="section">添加角色</span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">角色名称 <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="title" class="form-control col-md-7 col-xs-12" name="title" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">上级菜单<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="pid">
                                    <option value="0">顶级分类</option>
                                    <?php if(!empty($menus)) :?>
                                        <?php foreach ($menus as $menu) :?>
                                            <option value="<?= $menu['auth_id'];?>"><?= $menu['title']??'';?></option>
                                            <?php if($menu['children']) :?>
                                                <?php foreach ($menu['children'] as $child) :?>
                                                        <option value="<?php echo $child['auth_id'];?>">&nbsp;&nbsp;&nbsp;┗━
                                                            <?= $child['title'];?>
                                                        </option>
                                                <?php endforeach;?>
                                            <?php endif;?>
										<?php endforeach;?>
                                    <?php endif;?>
                                </select>
                            </div>
                    </div>
                    <div class="itme form-group">
                        <label for="icon" class="control-label col-md-3 col-sm-3 col-xs-12">显示状态</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="radio" name="status" id="status1" value="1" checked="checked">显示
                            <input type="radio" name="status" id="status2" value="2">不显示
                        </div>
                    </div>
                    <div class="itme form-group">
                        <label for="icon" class="control-label col-md-3 col-sm-3 col-xs-12">权限</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="icon" class="control-label col-md-3 col-sm-3 col-xs-12">角色说明</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <textarea class="resizable_textarea form-control" name="explain" placeholder="" data-parsley-id="16"></textarea>
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button id="reset" type="button" class="btn btn-primary">重置</button>
                            <button id="send" type='submit' class="btn btn-success">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>