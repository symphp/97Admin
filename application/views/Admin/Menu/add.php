<?php
/**
 * Created by PhpStorm.
 * User: symphp <symphp@foxmail.com>
 * Date: 2017/7/20
 * Time: 23:45
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
                <form class="form-horizontal form-label-left" method="post" id="autoForm">
                    <span class="section">添加菜单</span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">菜单名称 <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="title" class="form-control col-md-7 col-xs-12" name="title" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">上级菜单<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" data-parsley-id="7">
                                    <option>Choose option</option>
                                    <option>Option one</option>
                                    <option>Option two</option>
                                    <option>Option three</option>
                                    <option>Option four</option>
                                </select>
                            </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Controller/Function</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="name" name="name" class="form-control col-md-7 col-xs-12" required>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="icon">菜单icon图标
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="icon" name="icon"  placeholder="fa fa-tachometer" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">排序 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="sort" name="sort" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="itme form-group">
                        <label for="icon" class="control-label col-md-3 col-sm-3 col-xs-12">显示状态</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="radio" name="status" id="status1" value="1" checked="checked">显示
                            <input type="radio" name="status" id="status2" value="2">不显示
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="icon" class="control-label col-md-3 col-sm-3 col-xs-12">页面提示</label>
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