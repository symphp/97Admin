<?php
/**
 * Created by PhpStorm.
 * User: symphp <symphp@foxmail.com>
 * Date: 2017/7/20
 * Time: 23:45
 */
?>
<div class=""></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <br>
                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">菜单名称 <span
                                    class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" required="required"
                                   class="form-control col-md-7 col-xs-12 parsley-error" data-parsley-id="5">
                            <ul class="parsley-errors-list filled" id="parsley-id-5">
                                <li class="parsley-required">This value is required.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">上级菜单<span
                                    class="required">*</span></label>
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
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Controller/Function
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="name" name="name" required="required"
                                   class="form-control col-md-7 col-xs-12 parsley-error" placeholder="Admin/admin"
                                   data-parsley-id="9">
                            <ul class="parsley-errors-list filled" id="parsley-id-9">
                                <li class="parsley-required">This value is required.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3 col-sm-3 col-xs-12">菜单icon图标</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="icon" class="form-control col-md-7 col-xs-12" type="text" name="icon"
                                   placeholder="fa fa-tachometer" data-parsley-id="11">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3 col-sm-3 col-xs-12">显示状态</label>
                        <div class="">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>
                                <input type="checkbox" class="js-switch" checked="" style="display: none;"
                                       data-switchery="true"><span class="switchery switchery-default"
                                                                   style="border-color: rgb(38, 185, 154); box-shadow: rgb(38, 185, 154) 0px 0px 0px 11px inset; transition: border 0.4s, box-shadow 0.4s, background-color 1.2000000000000002s; -webkit-transition: border 0.4s, box-shadow 0.4s, background-color 1.2000000000000002s; background-color: rgb(38, 185, 154);"><small
                                            style="left: 12px; transition: background-color 0.4s, left 0.2s; -webkit-transition: background-color 0.4s, left 0.2s; background-color: rgb(255, 255, 255);"></small></span>
                                显示
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3 col-sm-3 col-xs-12">排序</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="first-name" required="required"
                                   class="form-control col-md-7 col-xs-12 parsley-error" data-parsley-id="14">
                            <ul class="parsley-errors-list filled" id="parsley-id-14">
                                <li class="parsley-required">This value is required.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3 col-sm-3 col-xs-12">页面提示</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="resizable_textarea form-control" placeholder=""
                                      data-parsley-id="16"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default" data-toggle-class="btn-primary"
                                       data-toggle-passive-class="btn-default">
                                    <input type="radio" name="gender" value="male" data-parsley-multiple="gender"
                                           data-parsley-id="19"> &nbsp; Male &nbsp;
                                </label>
                                <label class="btn btn-primary" data-toggle-class="btn-primary"
                                       data-toggle-passive-class="btn-default">
                                    <input type="radio" name="gender" value="female" data-parsley-multiple="gender">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="birthday" class="date-picker form-control col-md-7 col-xs-12 parsley-error"
                                   required="required" type="text" data-parsley-id="23">
                            <ul class="parsley-errors-list filled" id="parsley-id-23">
                                <li class="parsley-required">This value is required.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">保存</button>
                            <button class="btn btn-primary" type="reset">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>