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
    .body-back{background: url(/term/newSpaperSystem/Application/Home/View/public/img/rebc.gif) repeat;}
    .qq{background-image: url(/term/newSpaperSystem/Application/Home/View/public/img/QQ1.png);}
    .weixin{background-image: url(/term/newSpaperSystem/Application/Home/View/public/img/weixin1.png);}
    .weibo{background-image: url(/term/newSpaperSystem/Application/Home/View/public/img/weibo1.png);}
    .qq:hover{background-image: url(/term/newSpaperSystem/Application/Home/View/public/img/QQ.png);}
    .weixin:hover{background-image: url(/term/newSpaperSystem/Application/Home/View/public/img/weixin.png);}
    .weibo:hover{background-image: url(/term/newSpaperSystem/Application/Home/View/public/img/weibo.png);}
</style>
<body class="body-back">
<div class="login">
    <div class="share-box">
        <div class="passport-goto">没有账号? <a data-toggle="modal" data-position="center" data-target="#open-register">新用户注册</a>
        </div>
        <div class="passport-third"><p style="color: #999">合作方账号登陆</p></div>
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
                            <input type="text" class="form-control form-type" id="user" placeholder="手机/用户名">
                        </div>
                    </div>
                    <div class="form-group form-group-mar">
                        <div class="input-group width">
                            <input type="password" name="password" class="form-control form-type" id="password"
                                   placeholder="请输入6~32位密码">
                        </div>
                    </div>
                    <div class="form-group form-group-mar">
                        <div class="input-group">
                            <input type="text" name="verify" class="form-control form-type" id="verify"
                                   placeholder="验证码">
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="fr a-link">忘记密码</p>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> 记住密码
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
                            <input type="text" class="form-control form-type" name="user" id="new-user"
                                   placeholder="用户名">
                        </div>
                    </div>
                    <div class="form-group form-group-mar">
                        <div class="input-group">
                            <input type="password" name="password" class="form-control form-type" id="new-password"
                                   placeholder="验证码">
                        </div>
                    </div>
                    <div class="form-group form-group-mar">
                        <div class="input-group width">
                            <input type="text" name="verify" class="form-control form-type" id="aginst-password"
                                   placeholder="请输入6~32位密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="fr a-link">忘记密码</p>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> 记住密码
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-login btn-lg btn-block form-group-mar" id='sign' type="button">注册</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="open-register">
    <div class="modal-dialog modal-dialog-1">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                        class="sr-only">关闭</span></button>
                <h4 class="modal-title">笔者注册</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group form-group-mar">
                        <div class="input-group width">
                            <input type="text" class="form-control form-type " name="phone" id="r-phone"
                                   placeholder="手机号">
                        </div>
                    </div>
                    <div class="form-group form-group-mar">
                        <div class="input-group width">
                            <input type="password" class="form-control form-type" name="password" id="r-password"
                                   placeholder="请输入6~32位密码">
                        </div>
                    </div>
                    <div class="form-group form-group-mar">
                        <div class="input-group">
                            <input type="text" name="verify" class="form-control form-type" id="r-verify"
                                   placeholder="验证码">
                        </div>
                    </div>
                    <div class="form-group form-group-mar">
                        <div class="input-group form-mcode width">
                            <input type="text" class="form-control form-type " name="code" id="code" placeholder="动态码">
                            <div class="btn-getcode">
                                <button type="button" class="passport-btn js-getcode" jktag="0001|0.1|91024">获取动态码
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> 同意极客学院用户协议
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
<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/Login/jquery.1.7.2.min.js' charset='utf-8'></script>
<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/Login/zui.min.js' charset='utf-8'></script>
<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/Login/login.js' charset='utf-8'></script>
<script type="text/javascript">
    $(document).ready(function () {

    });
</script>
</body>
</html>