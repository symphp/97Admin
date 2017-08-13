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
            $(':input','#autoForm')
                .not(':button, :submit, :reset, :hidden')
                .val('')
                .removeAttr('checked')
                .removeAttr('selected');
        });
    });
</script>
<link rel="stylesheet" href="/public/css/validate.css">
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<form class="form-horizontal form-label-left" action="user" method="post" id="autoForm">
					<span class="section">个人资料</span>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">用户名 <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="title" class="form-control col-md-7 col-xs-12" name="username" disabled="disabled" type="text" value="<?=$admin['username']??'';?>" required>
						</div>
					</div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="head_pic">头像
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="head_pic" type="image" multiple class="file" data-overwrite-initial="false" data-min-file-count="1">
                            <img src="" alt="">
<!--                            <input type="text" id="head_pic" name="head_pic"  value="--><?//= $admin['head_pic']??'';?><!--"  placeholder="fa fa-tachometer" class="form-control col-md-7 col-xs-12" >-->
                        </div>
                    </div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="icon">性别
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control valid" name="sex" aria-invalid="false">
                                    <?php if(!empty($selects)) :?>
                                        <?php foreach ($selects as $select) :?>
                                            <option value="<?= $select['status']??'';?>" <?php if($admin['sex'] == $select['status']) {echo 'selected="selected"';} ?>><?= $select['msg']??'';?></option>
										<?php endforeach;?>
									<?php endif;?>
                                </select>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">手机
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="number" id="phone" name="phone" value="<?= $admin['phone']??'';?>" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">邮箱
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="email" name="email" value="<?= $admin['email']??'';?>" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
					<div class="item form-group">
						<div class="col-md-6 col-md-offset-3">
							<button id="send" type='submit' class="btn btn-success">提交</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
    $("#head_pic").fileinput({
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions : ['jpg', 'png','gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        language: 'zh', //设置语言
        browseClass: "btn btn-primary", //按钮样式
        showPreview : true,
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
    $(".file-drop-zone-title").html("拖拽或者点击选择文件");
</script>