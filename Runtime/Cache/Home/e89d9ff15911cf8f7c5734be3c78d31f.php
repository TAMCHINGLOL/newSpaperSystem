<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>账号设置</title>
    <link rel="stylesheet" href="/term/newSpaperSystem/Application/Home/View/public/css/Login/zui.min.css">
    <link rel="stylesheet" href="/term/newSpaperSystem/Application/Home/View/public/css/Login/common.css">
    <link rel="stylesheet" href="/term/newSpaperSystem/Application/Home/View/public/css/Login/login.css">
    <link rel="stylesheet" href="/term/newSpaperSystem/Application/Home/View/public/css/Login/datetimepicker.css">
</head>
<body class="body-color">
<div class="header">
    <div class="centent">
        <a class="logo-img" href="<?php echo U('Home/Index/index');?>"><img class="pull-left"
                                                                 src="/term/newSpaperSystem/Application/Home/View/public/img/logo2.png"
                                                                 width="105px" height="45px"/></a>
        <nav>
            <ul class="header-nav">
                <li><a href="<?php echo U('Home/Index/index');?>" style="color: rgb(53, 181, 88);">首页</a></li>
                <li>
                    <?php if(session('sys_tag') == admin): ?>审核文章
                        <?php else: ?>
                        投递文章<?php endif; ?>
                </li>
                <li>分类浏览<i class="arrow-icon"></i>
                    <div class="submenu school-list">
                        <h3>前端学院</h3>
                        <a href="http://www.jikexueyuan.com/zhiye/web"><i class="web-icon"></i>Web 前端工程师</a>
                        <h3>后端学院</h3>
                        <a href="http://www.jikexueyuan.com/zhiye/python"><i class="python-icon"></i>Python Web工程师</a>
                        <a href="http://www.jikexueyuan.com/zhiye/go"><i class="go-icon"></i>Go语言工程师</a>
                        <h3>移动学院</h3>
                        <a href="http://www.jikexueyuan.com/zhiye/ios"><i class="ios-icon"></i>iOS工程师</a>
                    </div>
                </li>

                <li>社区</li>
            </ul>
        </nav>
        <div class="icon-box">
            <span class="search-icon" id="search-btn"></span>
            <?php if(session('uid') == ''): ?><span class="relative loginlist login-icon" id="loginlist">
                    <?php else: ?>
                    <span class="relative loginlist" id="loginlist">
                    <img src="/term/newSpaperSystem/Application/Home/View/public/img/default.gif"
                         style="height: 25px;width: 25px;margin-bottom: 54px"><?php endif; ?>
            <dl class="submenu"><i class="top-icon"></i>
                <dd>
                    <?php if(session('uid') == ''): ?><a href="<?php echo U('Home/Login/index');?>" class="reg-btn">注册</a>|<a href="<?php echo U('Home/Login/index');?>" class="login-btn">登录</a><?php endif; ?>
                </dd>
                <dd><a href="<?php echo U('Home/Person/index');?>"><i class="grzy-icon"></i>个人主页</a></dd>
                <dd><a href="<?php echo U('Home/Person/message');?>"><i class="xxtz-icon"></i>消息通知</a></dd>
                <dd><a href="<?php echo U('Home/Person/account');?>"><i class="zhsz-icon"></i>账号设置</a></dd>
                <dd><a href="<?php echo U('Home/Index/exitLogin');?>"><i class="zhsz-icon"></i>退出登录</a></dd>
            </dl>
            </span>
        </div>
        <div class="searchbox" id="searchbox">
            <i class="close-icon" id="close-btn"></i>
            <i class="search-icon" id="search-btn"></i>
            <input id="web_search_header" placeholder="搜索文章 / 问答" value=""/>
        </div>
    </div>
</div>
<div class="centent mar-t20">
    <nav class="leftnav" id="leftNav">
        <ul class="">
            <li class="active"><a class="active" data-toggle="tab" href="#tabContent1">基本信息</a></li>
            <li><a class="" data-toggle="tab" href="#tabContent2">账号安全</a></li>
            <li><a class="" data-toggle="tab" href="#tabContent3">消息设置</a></li>
        </ul>
    </nav>
    <div class="tab-content" style="height: 1000px;">
        <div class="tab-pane fade active in  main" id="tabContent1">
            <h2>个人资料</h2>
            <section class="basic">
                <h3>基本信息</h3>
                <form id="basicForm">
                    <ul>
                        <li>
                            <label for="setPhoto">头像</label>
                            <div class="inputbox">
                                <div class="portrait-box">
                                    <?php if($info["head_img"] != ''): ?><img class="headpic" name="headpic" src="<?php echo ($info["head_img"]); ?>">
                                        <?php else: ?>
                                        <img class="headpic"
                                             src="/term/newSpaperSystem/Application/Home/View/public/img/default.gif"><?php endif; ?>
                                    <p class="change" id="setPhoto"><span>修改</span></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <label for="uname">用户名</label>
                            <div class="inputbox">
                                <input type="text" id="uname" name="uname" maxlength="30" value="<?php echo ($info["alias"]); ?>">
                            </div>
                        </li>
                        <li>
                            <label for="truename">真实姓名</label>
                            <div class="inputbox">
                                <input type="text" id="truename" name="truename" value="<?php echo ($info["username"]); ?>"
                                       maxlength="30">
                            </div>
                        </li>
                        <li>
                            <label for="usex">性别</label>
                            <div class="inputbox">
                                <span class="select-box-sex"><select id="usex" name="gender">
                                    <?php if($info["sex"] == '女'): ?><option value="保密">保密</option>
                                        <option value="男">男</option>
                                        <option value="女" selected>女</option>
                                        <?php elseif($info["sex"] == '男'): ?>
                                        <option value="保密">保密</option>
                                        <option value="男" selected>男</option>
                                        <option value="女">女</option>
                                        <?php else: ?>
                                        <option value="保密" selected>保密</option>
                                        <option value="男">男</option>
                                        <option value="女">女</option><?php endif; ?>
                                </select></span>
                            </div>
                        </li>
                        <li>
                            <label for="birthday">生日</label>
                            <div class="inputbox">
                                <input class="laydate-icon form_date" type="text" name="birthday" id="birthday"
                                       value="<?php echo ($info["birthday"]); ?>">
                            </div>
                        </li>
                        <li>
                            <label>现居住地</label>
                            <div class="inputbox">
                                <!--<span class="select-box-home"><select class="select-home" name="provice_id" id="proviceSel" data-value="0"><option value="0">省</option><option value="2">北京市</option>,<option value="3">上海市</option>,<option value="4">天津市</option>,<option value="5">重庆市</option>,<option value="6">河北省</option>,<option value="7">山西省</option>,<option value="8">内蒙古</option>,<option value="9">辽宁省</option>,<option value="10">吉林省</option>,<option value="11">黑龙江省</option>,<option value="12">江苏省</option>,<option value="13">浙江省</option>,<option value="14">安徽省</option>,<option value="15">福建省</option>,<option value="16">江西省</option>,<option value="17">山东省</option>,<option value="18">河南省</option>,<option value="19">湖北省</option>,<option value="20">湖南省</option>,<option value="21">广东省</option>,<option value="22">广西</option>,<option value="23">海南省</option>,<option value="24">四川省</option>,<option value="25">贵州省</option>,<option value="26">云南省</option>,<option value="27">西藏</option>,<option value="28">陕西省</option>,<option value="29">甘肃省</option>,<option value="30">青海省</option>,<option value="31">宁夏</option>,<option value="32">新疆</option>,<option value="33">台湾省</option>,<option value="34">香港</option>,<option value="35">澳门</option>,<option value="3358">钓鱼岛</option></select></span>-->
                                <!--<span class="">-->
                                <!--<div class="inputbox">-->
                                <input type="text" id="city_id" name="cityname" placeholder="请输入详细地址" maxlength="60"
                                       value="<?php echo ($info["address"]); ?>" style="width: 280px">
                                <!--</div>-->
                                <!--<select class="select-home" name="city_id" id="citySel" data-value="0">-->
                                <!--<option value="0">市</option>-->
                                <!--</select>-->
                                </span>
                            </div>
                        </li>
                        <li>
                            <label for="">个人简介</label>
                            <div class="inputbox">
                                <textarea id="basArea" placeholder="一句话介绍一下自己吧，让别人更了解你" maxlength="200"
                                          name="description"><?php echo ($info["backup"]); ?></textarea>
                                <p class="extra-tips">还可以输入 <span id="tipsNum">200</span> 字</p>
                            </div>
                        </li>
                    </ul>
                    <!--<input type="hidden" name="stoken" id="stoken" value="18efe2116253c9b92077362399341113">-->
                    <button type="button" class="green-btn" id="submit1">保存</button>
                </form>
            </section>
        </div>
        <div class="tab-pane fade main" id="tabContent2">
            <h2>账号安全</h2>
            <div class="security">
                <ul>
                    <li>
                        <label>绑定手机</label>
                        <?php if($info["phone"] != ''): ?><span><?php echo ($info["phone"]); ?></span>
                            <a id="changePhone" href="javascript:;" data-toggle="modal" data-position="center"
                               data-target="#open-dailog-phone">修改手机号</a>
                            <?php else: ?>
                            <span></span>
                            <a id="changePhone" href="javascript:;" data-toggle="modal" data-position="center"
                               data-target="#open-dailog-phone">绑定手机号</a><?php endif; ?>

                    </li>
                    <li>
                        <label>绑定邮箱</label>
                        <?php if($info["email"] != ''): ?><span><?php echo ($info["email"]); ?></span>
                            <a id="setEmail" href="javascript:;" data-toggle="modal" data-position="center"
                               data-target="#open-dailog-email">修改邮箱</a>
                            <?php else: ?>
                            <!--<span>没有绑定 </span>-->
                            <a id="setEmail" href="javascript:;" data-toggle="modal" data-position="center"
                               data-target="#open-dailog-email">绑定邮箱</a><?php endif; ?>
                    </li>
                    <li>
                        <label>设置密码</label>
                        <span>********</span>
                        <!-- 没绑定邮箱或手机不显示设定密码 -->
                        <?php if(($info["phone"] == '') AND ($info["email"] == '')): ?><a id="changePw" href="javascript:;" style="cursor: default"><span class="ora">( 设置密码前，请先绑定邮箱或手机 )</span></a>
                            <?php else: ?>
                            <a id="changePw" href="javascript:;" data-toggle="modal" data-position="center"
                               data-target="#open-dailog-password">修改登录密码</a><?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-pane fade main" id="tabContent3">
            <h2>消息设置</h2>
            <section class="notify">
                <form id="notifyForm" method="post" action="">
                    <!-- 未绑定 -->
                    <h3>微信通知</h3>
                    <p class="notify-explain">每当有与你有关的新动态，系统会给微信推送消息</p>
                    <p class="notify-notyet">你尚未绑定微信服务号，扫描下方的二维码，并关注完成绑定：</p>
                    <img src="https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=gQHP7zoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL2h6amhuSkxsMXZTdlBBeWIyUllKAAIE_zEjWAMEAOkHAA%3D%3D"
                         width="150px">
                    <div class="popup" id="notifyPop" style="display: none;">
                        <header>
                            <h2>解绑确认</h2>
                            <i class="close popclose"></i>
                        </header>
                        <div class="wrap">
                            <p class="notify-popp">解绑之后将无法再收到微信消息通知，确定解绑？</p>
                            <div class="notify-btns cf">
                                <button class="green-btn" id="notifyConfirm">确定</button>
                                <button class="cancel-btn popclose">取消</button>
                            </div>
                        </div>
                    </div>
                    <h3 class="notify-msg">短信通知</h3>
                    <p class="notify-yet">当与你有关的「重要」动态，系统会给你手机发送短信</p>
                    <label for="sms-notifyOpen">
                        <input type="radio" name="sms-notifyradio" checked="checked" id="sms-notifyOpen" value="1"><span
                            class="notify-circle"><i></i></span><span class="notify-label"> 开 启</span>
                    </label>
                    <label for="sms-notifyClose">
                        <input type="radio" name="sms-notifyradio" id="sms-notifyClose" value="-1"><span
                            class="notify-circle"><i></i></span><span class="notify-label"> 关 闭</span>
                    </label>
                    <button class="green-btn" type="submit" id="notifySave">保 存</button>
                </form>
            </section>
        </div>
    </div>
</diV>
<!--底部-->
<div id="footer" class="mar-t50">
    <div class=" jkinfor-block">
        <div class="jkinfor cf">
            <div class="jk-logo">
                <img src="http://e.jikexueyuan.com/headerandfooter/images/jk-logo-footer.png?t=1475152597000">
                <p>极客学院，编程是一种信仰！</p>
            </div>
            <dl>
                <dt>职业学院</dt>
                <dd><a target="_blank" href="#">Web前端工程师</a></dd>
                <dd><a target="_blank" href="#">Python Web工程师</a></dd>
                <dd><a target="_blank" href="#">Go语言工程师</a></dd>
                <dd><a target="_blank" href="#">iOS工程师</a></dd>
            </dl>
            <dl>
                <dt>会员课程</dt>
                <dd><a target="_blank" href="#">课程库</a></dd>
                <dd><a target="_blank" href="#">知识体系图</a></dd>
                <dd><a target="_blank" href="#">职业路径图</a></dd>
                <dd><a target="_blank" href="#">系列课程</a></dd>
                <dd><a target="_blank" href="#">课程标签</a></dd>
            </dl>
            <dl>
                <dt>极客社区</dt>
                <dd><a target="_blank" href="#">技术问答</a></dd>
                <dd><a target="_blank" href="#">Wiki</a></dd>
                <dd><a target="_blank" href="#">资源下载</a></dd>
                <dd><a target="_blank" href="#">社群</a></dd>
            </dl>
            <dl>
                <dt>其他</dt>
                <dd><a target="_blank" href="#">关于我们</a></dd>
                <dd><a target="_blank" href="#">加入我们</a></dd>
                <dd><a target="_blank" href="#">讲师合作</a></dd>
                <dd><a target="_blank" href="#">联系我们</a></dd>
                <dd><a target="_blank" href="#">友情链接</a></dd>
            </dl>

            <div class="jk-down">
                <p class="hot-tel">服务热线:400-678-8266</p>
                <div class="downCon down-ios">
                    <img src="http://e.jikexueyuan.com/headerandfooter/images/app.png?t=1475152597000" class="twoCode"
                         alt="下载二维码"> iPhone
                </div>
                <div class="downCon down-and">
                    <img src="http://e.jikexueyuan.com/headerandfooter/images/app.png?t=1475152597000" class="twoCode"
                         alt="下载二维码"> Android
                </div>
            </div>
        </div>
    </div>
    <div class="w-1000 copyright">
        Copyright © 2013-2016&nbsp;<strong><a href="#" target="_blank">jikexueyuan.com</a></strong> All Rights Reserved.
        京ICP备11018032号-8 京公网安备11010802020210
        <a href="http://qun.jikexueyuan.com/jikexueyuan/topic/430" target="_blank" class="down-wechat"></a>
        <a href="http://weibo.com/jikexueyuan" target="_blank" class="down-sina"></a>
    </div>
</div>
<!--底部结束-->
<!--跳窗-->
<div class="modal fade" id="open-dailog-phone">
    <div class="modal-dialog modal-dialog-1">
        <div class="modal-content" style="height: 300px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                        class="sr-only">关闭</span></button>
                <h4 class="modal-title">绑定手机</h4>
            </div>
            <div class="modal-body">
                <div class="bd">
                    <form class="form form-setting">
                        <fieldset>
                            <div class="form-item">
                                <div id="newPhone" style="display: inline-block; margin-bottom: 30px;">
                                    <div class="item-label">
                                        <label>手机号</label>
                                    </div>
                                    <div class="item-cont no-right">
                                        <input class="txt w-sm auth-code" type="text" id="phone" name="phone">
                                        <!--<a href="javascript:;" class="get-code orange-btn">发送验证码</a>-->
                                    </div>
                                </div>
                                <!--<div class="item-cont w-lg" id="verifyPwd" style="display: none;">-->
                                    <!--<input class="txt w-lg" id="ver-pwd" type="password">-->
                                <!--</div>-->
                                <div id="verifyOther1" style="display: inline-block;">
                                    <div class="item-label">
                                        <label>验证码</label>
                                    </div>
                                    <div class="item-cont no-right">
                                        <input class="txt w-xs auth-code" type="text" id="verifyCode">
                                        <a href="javascript:;" class="get-code orange-btn" id="verifyBtn">发送验证码</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="item-cont">
                                    <input type="button" id="verifyIdBtn1" class="btn green-btn lg" value="确认绑定">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--跳窗-->
<div class="modal fade" id="open-dailog-email">
    <div class="modal-dialog modal-dialog-1">
        <div class="modal-content" style="height: 240px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                        class="sr-only">关闭</span></button>
                <h4 class="modal-title">绑定邮箱</h4>
            </div>
            <div class="modal-body">
                <div class="bd">
                    <form class="form form-setting">
                        <fieldset>
                            <div class="form-item">
                                <div class="item-cont w-lg" id="verifyPwd" style="display: none;">
                                    <input class="txt w-lg" id="ver-pwd" type="password">
                                </div>
                                <div id="verifyOther" style="display: block;">
                                    <div class="item-label">
                                        <label>邮箱</label>
                                    </div>
                                    <div class="item-cont no-right">
                                        <input class="txt sm init-email" type="text" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="item-cont">
                                    <input type="button" id="verifyIdBtn" class="btn green-btn lg" value="确认绑定">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--跳窗-->
<div class="modal fade" id="open-dailog-password">
    <div class="modal-dialog modal-dialog-1">
        <div class="modal-content" style="height: 300px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                        class="sr-only">关闭</span></button>
                <h4 class="modal-title">修改密码</h4>
            </div>
            <div class="modal-body">
                <div class="bd">
                    <form class="form form-setting">
                        <fieldset>
                            <div class="form-item">
                                <div id="newPwd" style="display: inline-block; margin-bottom: 30px;">
                                    <div class="item-label">
                                        <label>原密码</label>
                                    </div>
                                    <div class="item-cont no-right">
                                        <input class="txt w-sm auth-code" type="password" id="oldpassword" name="pwd1" placeholder="请输入旧密码">
                                    </div>
                                </div>
                                <div id="oldPwd" style="display: inline-block;">
                                    <div class="item-label">
                                        <label>新密码</label>
                                    </div>
                                    <div class="item-cont no-right">
                                        <input class="txt w-sm auth-code" type="password" id="newpassword" name="pwd2" placeholder="请输入6~21位新密码">
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="item-cont">
                                    <input type="button" id="verifyIdBtn2" class="btn green-btn lg" value="确认修改">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/jquery.1.7.2.min.js'></script>
<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/zui.min.js'></script>
<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/datetimepicker.js'></script>
<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/login.js' ></script>
<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/layer/layer.js'></script>
<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/md5/md5.js'></script>
<script type="text/javascript">
    var getSms_url = "<?php echo U('Home/Login/getSms','',false);?>";
    var login_url = "<?php echo U('Home/Login/index','',false);?>";
    var account_url = "<?php echo U('Home/Person/account','',false);?>";
    var updateAccount_url = "<?php echo U('Home/Person/updateAccount');?>";
    var bindPhone_url = "<?php echo U('Home/Person/bindPhone','',false);?>";
    var bindEmail_url = "<?php echo U('Home/Person/bindEmail','',false);?>";
    var updatePassword_url = "<?php echo U('Home/Person/updatePassword','',false);?>";
    $(document).ready(function () {
        //修改密码
        $("#verifyIdBtn2").on('click',function(){
            var newpassword = $("#newpassword").val();
            var oldpassword = $("#oldpassword").val();
            if(oldpassword == '' || oldpassword == null){
                alertTips("#oldpassword","请输入旧密码");
                return false;
            }
            if(newpassword == '' || newpassword == null){
                alertTips("#newpassword","请输入新密码");
                return false;
            }
            if(newpassword.length < 6 || newpassword.length >21){
                alertTips("#newpassword","密码长度限制6~21位");
                return false;
            }
            $.ajax({
                url: updatePassword_url,
                type: 'post',
                dataType: 'json',
                data: {oldPwd: hex_md5(oldpassword),newPwd: hex_md5(newpassword)},
                success: function(result){
                    if (result.status == 1) {
                        layer.msg(result.info, {time: 4000});
                        setTimeout(function(){
                            window.location.href = login_url;
                        },2000);
                        return false;
                    } else if (result.status == 0) {
                        layer.alert(result.info, {icon: 6});
                        return false;
                    }
                },error: function(){
                    layer.alert(' 小 编 抢 修 网 络 Ing...', {time: 3000});
                    return false;
                }
            });
        });

        //修改/绑定邮箱
        $("#verifyIdBtn").on('click',function(){
            var email = $("#email").val();
            if(email == '' || email == null){
                alertTips("#email","请输入邮箱");
                return false;
            }
                var reg = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/;
            if(!reg.test(email)){
                alertTips('#email',"邮箱格式不正确");
                return false;
            }
            $.ajax({
                url: bindEmail_url,
                type: 'post',
                dataType: 'json',
                data: {email: email},
                success: function(result){
                    if (result.status == 1) {
                        layer.msg(result.info, {time: 4000});
                        setTimeout(function(){
                            window.location.href = account_url;
                        },2000);
                        return false;
                    } else if (result.status == 0) {
                        layer.alert(result.info, {icon: 6});
                        return false;
                    }
                },error: function(){
                    layer.alert(' 小 编 抢 修 网 络 Ing...', {time: 3000});
                    return false;
                }
            });
        });

        //修改/绑定手机号
        $("#verifyIdBtn1").on('click',function(){
            var phone = $("#phone").val();
            var code = $("#verifyCode").val();
            if(code == '' || code == null){
                alertTips("#verifyCode","请输入验证码");
                return false;
            }
            if(phone == '' || phone == null){
                alertTips("#phone","请输入手机号");
                return false;
            }
            var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
            if(!reg.test(phone)){
                alertTips('#phone',"手机号不正确");
                return false;
            }
            $.ajax({
                url: bindPhone_url,
                type: 'post',
                dataType: 'json',
                data: {phone: phone,code: hex_md5(code)},
                success: function(result){
                    if (result.status == 1) {
                        layer.msg(result.info, {time: 4000});
                        setTimeout(function(){
                            window.location.href = account_url;
                        },2000);
                        return false;
                    } else if (result.status == 0) {
                        layer.alert(result.info, {icon: 6});
                        return false;
                    }
                },error: function(){
                    layer.alert(' 小 编 抢 修 网 络 Ing...', {time: 3000});
                    return false;
                }
            });
        });

        //发送验证码
        $("#verifyBtn").on('click',function(){
            var phone = $("#phone").val();
            if(phone == '' || phone == null){
                alertTips("#phone","请输入手机号");
                return false;
            }
            var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
            if(!reg.test(phone)){
                alertTips('#phone',"手机号不正确");
                return false;
            }
            $.ajax({
                url: getSms_url,
                type: 'post',
                dataType: 'json',
                data: {phone: phone},
                success: function(result){
                    if (result.status == 1) {
                        layer.msg(result.info, {time: 4000});
                        return false;
                    } else if (result.status == 0) {
                        layer.alert(result.info, {icon: 6});
                        return false;
                    }
                },error: function(){
                    layer.alert(' 小 编 抢 修 网 络 Ing...', {time: 3000});
                    return false;
                }
            })
        });

        //保存(修改个人信息)
        $("#submit1").on('click',function(){
            var formValue = $("#basicForm").serialize();    //序列化获取所有表单元素的值
            var url = updateAccount_url+'&'+formValue;
            layer.load(3,{time: 2000});
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(result){
                    if (result.status == 1) {
                        layer.msg(result.info);
                        setTimeout(function(){
                            window.location.href = account_url;
                            return false;
                        },2000)
                    } else if (result.status == 0) {
                        layer.msg(result.info);
                        return false;
                    }
                },error: function(){
                    layer.alert(' 小 编 抢 修 网 络 Ing...', {time: 3000});
                    return false;
                }
            });
        });

        //提示统一接口
        function alertTips(id,info){
            var erorr='<div class="passport-note passport-error-text"><span>'+info+'</span></div>';
            $(id).parent().addClass("has-error");
            $(id).after(erorr);
        }

        $("#search-btn").click(function () {
            $("#searchbox").addClass("scale");
        });
        $("#close-btn").click(function () {
            $("#searchbox").removeClass("scale");
        });

    });
</script>
<script>
    // 仅选择日期
    $.fn.datetimepicker.dates['en'] = {
        days: ["周日", "周一", "周二", "周三", "周四", "周五", "周六", "周日"],
        daysShort: ["日", "一", "二", "三", "四", "五", "六", "日"],
        daysMin: ["日", "一", "二", "三", "四", "五", "六", "日"],
        months: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
        monthsShort: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
        meridiem: ['上午', '下午'],
        suffix: ['st', 'nd', 'rd', 'th'],
        today: '今天',
        clear: 'Clear'
    };
    $('.form_date').datetimepicker({
        language: "en",
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0,
        format: "yyyy-mm-dd",
        initialDate: new Date()
    });

    $('.form_date').datetimepicker('setStartDate', '2000-01-01');
    $('.form_date').datetimepicker('setEndDate', '2016-11-03');
</script>

<!--[if lt IE 9]>
<script type='text/javascript' src="/term/newSpaperSystem/Application/Home/View/public/js/lib/ieonly/html5shiv.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script type='text/javascript' src="/term/newSpaperSystem/Application/Home/View/public/js/lib/ieonly/respond.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script type='text/javascript' src="/term/newSpaperSystem/Application/Home/View/public/js/lib/ieonly/excanvas.js"></script>
<![endif]-->
</body>
</html>