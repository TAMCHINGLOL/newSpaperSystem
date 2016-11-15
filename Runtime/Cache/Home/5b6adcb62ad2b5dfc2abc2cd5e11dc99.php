<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登录</title>
    <link rel="stylesheet" href="/term/newSpaperSystem/Application/Home/View/public/css/Login/zui.min.css">
    <link rel="stylesheet" href="/term/newSpaperSystem/Application/Home/View/public/css/Login/common.css">
    <link rel="stylesheet" href="/term/newSpaperSystem/Application/Home/View/public/css/Login/login.css">
</head>
<style type="text/css">
    .body-back {
        background: url(/term/newSpaperSystem/Application/Home/View/public/img/rebc.gif) repeat;
    }

    .qq {
        background-image: url(/term/newSpaperSystem/Application/Home/View/public/img/QQ1.png);
    }

    .weixin {
        background-image: url(/term/newSpaperSystem/Application/Home/View/public/img/weixin1.png);
    }

    .weibo {
        background-image: url(/term/newSpaperSystem/Application/Home/View/public/img/weibo1.png);
    }

    .qq:hover {
        background-image: url(/term/newSpaperSystem/Application/Home/View/public/img/QQ.png);
    }

    .weixin:hover {
        background-image: url(/term/newSpaperSystem/Application/Home/View/public/img/weixin.png);
    }

    .weibo:hover {
        background-image: url(/term/newSpaperSystem/Application/Home/View/public/img/weibo.png);
    }

    .numberBtn {
        font-size: 10px;
        background: #eaeaea;
        color: #666;
        border: 1px solid #eaeaea;
        outline: 0;

    }
</style>
<body class="body-back">
<div class="login">
    <div class="share-box">
        <div class="passport-goto">没有账号? <a data-toggle="modal" data-position="center" data-target="#open-register">新用户注册</a>
        </div>
        <div class="passport-third"><p style="color: #999">第三方账号登录</p></div>
        <div class="link-third">
            <a class="qq" jktag="0001|0.1|91058">
                <i class="passport-icon icon-tencent"></i>
            </a>
            <a class="weixin" jktag="0001|0.1|91058">
                <i class="passport-icon icon-tencent"></i>
            </a>
            <a class="weibo" jktag="0001|0.1|91058">
                <i class="passport-icon icon-tencent"></i>
            </a>
        </div>
    </div>
    <div class="layout-box">
        <ul class="nav nav-tabs">
            <li class="login-tittle width50 active"><a href="###" data-target="#tab2Content1" data-toggle="tab">笔者登录</a>
            </li>
            <li class="login-tittle width50"><a href="###" data-target="#tab2Content2" data-toggle="tab">管理员登录</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="tab2Content1">
                <form>
                    <div class="form-group form-group-mar">
                        <div class="input-group width">
                            <input type="text" class="form-control form-type" name="user" id="user"
                                   placeholder="请输入手机 / 用户名">
                        </div>
                    </div>
                    <div class="form-group form-group-mar">
                        <div class="input-group width">
                            <input type="password" name="password" class="form-control form-type" id="password"
                                   placeholder="请输入6~21位密码">
                        </div>
                    </div>
                    <div class="form-group form-group-mar">
                        <div class="input-group">
                            <div style="float: left">
                                <input type="text" name="verify" class="form-control form-type" id="verify"
                                       placeholder="验证码">
                            </div>
                            <div style="float: left;width: 46%">
                                <img id="img" name="img" width="90%" height="45" style="float: right" alt="验证码"
                                     src="<?php echo U('Home/Login/verify',array());?>" title="点击刷新">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="fr a-link">忘记密码</p>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" checked> 记住密码
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-login btn-lg btn-block form-group-mar" id='login' type="button">登录</button>
                </form>
            </div>
            <div class="tab-pane fade" id="tab2Content2">
                <form>
                    <div class="form-group form-group-mar">
                        <div class="input-group width">
                            <input type="text" class="form-control form-type" name="phone" id="new-user"
                                   placeholder="请输入手机号">
                        </div>
                    </div>
                    <div class="form-group form-group-mar">
                        <div class="input-group">
                            <div style="float: left;">
                                <input type="text" name="verify" class="form-control form-type" id="new-password"
                                       placeholder="验证码">
                            </div>
                            <div style="float: left;width: 46%">
                                <img id="img2" name="img" width="90%" height="45" style="float: right" alt="验证码"
                                     src="<?php echo U('Home/Login/verify',array());?>" title="点击刷新">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-group-mar">
                        <div class="input-group form-mcode width">
                            <input type="text" class="form-control form-type " name="code" id="gcode" placeholder="动态码">
                            <div class="btn-getcode">
                                <button type="button" id="getSmsBtn" class="passport-btn js-getcode numberBtn"
                                        jktag="0001|0.1|91024">获取动态码
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <!--<p class="fr a-link">忘记密码</p>-->
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" checked> 记住密码
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-login btn-lg btn-block form-group-mar" id='sign' type="button">登录</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="open-register">
    <div class="modal-dialog modal-dialog-1">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="outline: 0;">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">关闭</span>
                </button>
                <span class="modal-title" style="font-size: 16px;color: #35b558;font-weight: 500;">笔 者 注 册</span>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group form-group-mar">
                        <div class="input-group width">
                            <input type="text" class="form-control form-type " name="phone" id="r-phone"
                                   placeholder="请输入手机号">
                        </div>
                    </div>
                    <div class="form-group form-group-mar">
                        <div class="input-group width">
                            <input type="password" class="form-control form-type" name="password" id="r-password"
                                   placeholder="请输入6~21位密码">
                        </div>
                    </div>
                    <div class="form-group form-group-mar">
                        <div class="input-group">
                            <div style="float: left;width: 46%">
                                <input type="text" name="verify" class="form-control form-type" id="r-verify"
                                       placeholder="验证码">
                            </div>
                            <div style="float: left;width: 46%">
                                <img id="img3" name="img" width="90%" height="45" style="float: right" alt="验证码"
                                     src="<?php echo U('Home/Login/verify',array());?>" title="点击刷新">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-group-mar">
                        <div class="input-group form-mcode width">
                            <input type="text" class="form-control form-type " name="code" id="code" placeholder="动态码">
                            <div class="btn-getcode">
                                <button type="button" id="getSmsId" class="passport-btn js-getcode numberBtn" jktag="0001|0.1|91024">
                                    获取动态码
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" checked> 同意<a>鱼易社用户协议</a>
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-login btn-lg btn-block form-group-mar" id='register' type="button">注册
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/Login/jquery.1.7.2.min.js'></script>
<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/Login/zui.min.js'></script>
<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/Login/login.js'></script>
<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/layer/layer.js'></script>
<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/md5/md5.js'></script>
<script type="text/javascript">
    var login_url = "<?php echo U('Home/Login/login','',false);?>";
    var getSms_url = "<?php echo U('Home/Login/getSms','',false);?>";
    var verifySms_url = "<?php echo U('Home/Login/verifySms','',false);?>";
    var verifyCode_url = "<?php echo U('Home/Login/verifyCode','',false);?>";
    var register_url = "<?php echo U('Home/Login/register','',false);?>";
    var home_url = "<?php echo U('Home/Index/index','',false);?>";
    $(document).ready(function () {
        //笔者注册
        $("#register").on("click", function () {
            var user = $('#r-phone').val();
            var password = $('#r-password').val();
            var code = $('#code').val();
            if (code == '' || code == null) {
                layer.alert("请输入动态码");
                $('#code').focus();
                return false;
            }
            if(user == '' || user == null){
                layer.alert('请输入手机号');
                $("#r-phone").focus();
                return false;
            }
            var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
            if (!reg.test(user)) {
                layer.alert("手机号码有误");
                $("#r-phone").focus();
                return false;
            }
            password = hex_md5(password);
            $.ajax({
                url: register_url,
                type: 'post',
                dataType: 'json',
                data: {smsCode: hex_md5(code), phone: user, password: password},
                success: function (result) {
                    if (result.status == 1) {
                        layer.msg(result.info,{time: 3000});
                        $("#open-register").css('display',"none");      //隐藏注册
                    } else if (result.status == 0) {
                        layer.alert(result.info, {icon: 6});
                    }
                }, error: function () {
                    layer.msg(' 小 编 抢 修 网 络 Ing...', {time: 3000});
                }
            });
        });

        //笔者登录
        $("#login").on("click", function () {
            var user = $('#user').val();
            var password = $('#password').val();
            var code = $('#verify').val();
            if (code == '' || code == null) {
                layer.alert("请输入验证码");
                return false;
            }
            if (user.length == 11 && !isNaN(user)) {
                var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
                if (reg.test(user)) {
                    var phone = user;
                } else {
                    layer.alert("手机号码有误");
                    return false;
                }
            } else {
                if (user == "" || user == null) {
                    layer.alert("请输入账号");
                    return false;
                }
                var username = user;
            }
            var userTag = 'author';
            password = hex_md5(password);
            $.ajax({
                url: login_url,
                type: 'post',
                dataType: 'json',
                data: {code: code, username: username, phone: phone, password: password, userTag: userTag},
                success: function (result) {
                    if (result.status == 1) {
                        layer.msg(' 正 在 跳 转...');
                        setTimeout(function () {
                            window.location.href = home_url;
                        }, 2000);
                    } else if (result.status == 0) {
                        layer.alert(result.info, {icon: 6});
                    }
                }, error: function () {
                    layer.msg(' 小 编 抢 修 网 络 Ing...', {time: 3000});
                }
            });
        });

        //管理员登录
        $("#sign").on("click", function () {
            var phone = $('#new-user').val();
            var verify = $("#new-password").val();
            var code = $('#gcode').val();
            var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
            if (!reg.test(phone)) {
                layer.alert("手机号码有误");
                return false;
            }
            if (verify == '' || verify == null) {
                layer.alert("请输入验证码");
                return false;
            }
            if (code == '' || code == null) {
                layer.alert("请输入动态码");
                return false;
            }
            if (phone != '' && verify != '' && code != '') {
                $.ajax({
                    url: verifySms_url,
                    type: 'post',
                    dataType: 'json',
                    data: {code: verify, smsCode: hex_md5(code), phone: phone},
                    success: function (result) {
                        if (result.status == 1) {
                            layer.msg(' 正 在 跳 转...');
                            setTimeout(function(){
                                window.location.href = home_url;
                            },2000)
                        } else if (result.status == 0) {
                            layer.alert(result.info, {icon: 6});
                            return false;
                        }
                    }, error: function () {
                        layer.alert(' 小 编 抢 修 网 络 Ing...', {time: 3000});
                        return false;
                    }
                });
            }
        });

        //笔者注册验证验证码
        $("#r-verify").on('blur',function(){
            var code = $('#r-verify').val();
            if(code == null || code == ''){
                return false;
            }else{
                verifyCode(code,"#r-verify");
            }
        });

        //笔者登录验证验证码
        $("#verify").on('blur',function(){
            var code = $('#verify').val();
            if(code == null || code == ''){
                return false;
            }else{
                verifyCode(code,this);
            }
        });

        //管理员验证验证码
        $("#new-password").on('blur',function(){
            var code = $('#new-password').val();
            if(code == null || code == ''){
                return false;
            }else{
                verifyCode(code);
            }
        });

        //发送短信动态码(笔者注册)
        $("#getSmsId").on('click', function () {
            var phone = $('#r-phone').val();
            var password = $("#r-password").val();
            var verify = $("#r-verify").val();
            var code = $("#code").val();
            var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
            if (phone == '' || phone == null) {
                layer.alert("请输入手机号");
                $("#r-phone").focus();
                return false;
            }
            if (!reg.test(phone)) {
                layer.alert("手机号码有误");
                $("#r-phone").focus();
                return false;
            }
            if(password == '' || password == null){
                layer.alert("请输入密码");
                $("#r-password").focus();
                return false;
            }
            if(password.length < 6 || password.length >21){
                layer.alert("密码长度限制6~21位");
                $("#r-password").focus();
                return false;
            }
            if (verify == '' || verify == null) {
                layer.alert("请输入验证码");
                $("#r-verify").focus();
                return false;
            }
            if (phone != '' && verify != '') {
                sendSms(phone);
            }
        });

        //发送短信动态码(管理员登录)
        $("#getSmsBtn").on('click', function () {
            var phone = $('#new-user').val();
            var verify = $("#new-password").val();
            var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
            if (phone == '' || phone == null) {
                $("#new-user").focus();
                layer.alert("请输入手机号");
                return false;
            }
            if (!reg.test(phone)) {
                layer.alert("手机号码有误");
                $("#new-user").focus();
                return false;
            }
            if (verify == '' || verify == null) {
                layer.alert("请输入验证码");
                $("#new-password").focus();
                return false;
            }
            if (phone != '' && verify != '') {
                sendSms(phone);
            }
        });

        //发送动态码
        function sendSms(phone) {
            if (phone != '' && phone != null) {
                $.ajax({
                    url: getSms_url,
                    type: 'post',
                    dataType: 'json',
                    data: {phone: phone},
                    success: function (result) {
                        if (result.status == 1) {
                            layer.msg(result.info, {time: 4000});
                            return false;
                        } else if (result.status == 0) {
                            layer.alert(result.info, {icon: 6});
                            return false;
                        }
                    }, error: function () {
                        layer.alert(' 小 编 抢 修 网 络 Ing...', {time: 3000});
                        return false;
                    }
                });
            }
        }

        //验证码验证
        function verifyCode(code,id){
            if(code != '' && code != null){
                $.ajax({
                    url: verifyCode_url,
                    type: 'post',
                    dataType: 'json',
                    data: {code: code},
                    success: function(result){
                        if (result.status == 1) {
//                            layer.msg(result.info, {time: 3000});
                            return false;
                        } else if (result.status == 0) {
                            layer.alert(result.info, {icon: 6});
                            var erorr='<div class="passport-note passport-error-text"><span>'+result.info+'</span></div>';
                            $(id).parent().addClass("has-error");
                            $(id).after(erorr);
                            return false;
                        }
                    },error: function(){
                        layer.alert(' 小 编 抢 修 网 络 Ing...', {time: 3000});
                        return false;
                    }
                });
            }
        }

        //点击刷新验证码(笔者注册)
        var captcha_img2 = $('#img3');
        var verifyImg2 = captcha_img2.attr("src");
        captcha_img2.attr('title', '点击刷新');
        captcha_img2.click(function () {
            if (verifyImg2.indexOf('?') > 0) {
                $(this).attr("src", verifyImg2 + '&ran=' + Math.random());
            } else {
                $(this).attr("src", verifyImg2.replace(/\?.*$/, '') + '?' + Math.random());
            }
        });

        //点击刷新验证码(笔者登录)
        var captcha_img = $('#img');
        var verifyImg = captcha_img.attr("src");
        captcha_img.attr('title', '点击刷新');
        captcha_img.click(function () {
            if (verifyImg.indexOf('?') > 0) {
                $(this).attr("src", verifyImg + '&random=' + Math.random());
            } else {
                $(this).attr("src", verifyImg.replace(/\?.*$/, '') + '?' + Math.random());
            }
        });

        //点击刷新验证码(管理员登录)
        var captcha_img1 = $('#img2');
        var verifyImg1 = captcha_img.attr("src");
        captcha_img1.attr('title', '点击刷新');
        captcha_img1.click(function () {
            if (verifyImg1.indexOf('?') > 0) {
                $(this).attr("src", verifyImg1 + '&rand=' + Math.random());
            } else {
                $(this).attr("src", verifyImg1.replace(/\?.*$/, '') + '?' + Math.random());
            }
        });
    });


</script>
</body>
</html>