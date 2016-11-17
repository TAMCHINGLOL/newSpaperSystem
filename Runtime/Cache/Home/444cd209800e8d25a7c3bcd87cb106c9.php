<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>个人中心</title>
    <link rel="stylesheet" href="/term/newSpaperSystem/Application/Home/View/public/css/Login/zui.min.css">
    <link rel="stylesheet" href="/term/newSpaperSystem/Application/Home/View/public/css/Login/common.css">
    <link rel="stylesheet" href="/term/newSpaperSystem/Application/Home/View/public/css/Login/login.css">
</head>
<body>
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
            <input id="web_search_header" placeholder="搜索课程、问答或Wiki" value=""/>
        </div>
    </div>
</div>
<div class="centent">
    <div class="common-head">
        <div class="common-portrait">
            <?php if($info["head_img"] != ''): ?><img src="<?php echo ($info["head_img"]); ?>" width="80px" alt="头像">
                <?php else: ?>
                <img src="/term/newSpaperSystem/Application/Home/View/public/img/default.gif" width="80px" alt="头像"><?php endif; ?>
            <i class="noprohead-icon portrait-icon"></i></div>

        <div class="common-data">
            <h3>
						<span>
							<?php if($info["alias"] != ''): echo ($info["alias"]); ?>
                                <?php else: ?>
                                <?php echo ($info["username"]); endif; ?>
						</span>
                <!--<a href="http://my.jikexueyuan.com/setting/ca/" class="nopro-icon"></a>-->
                <!--<a href="http://my.jikexueyuan.com/setting/vip/" class="novip-icon"></a>-->
            </h3>
            <p class="common-data-info"><span>性别：<?php echo ($info["sex"]); ?></span>
                <span class="local">现居住地： <?php echo ($info["address"]); ?></span>
            </p>
            <p class="common-data-detail">个人简介：<?php echo ($info["backup"]); ?></p>
        </div>
        <a href="<?php echo U('Home/Person/account');?>" class="edit-data">编辑个人资料</a>
    </div>
    <div class="user-course">
        <div class="course-nav" id="courseNav">
            <a href="/0xgqjUgVW/" id="navHome" class="active">我的论文</a>
            <a href="/0xgqjUgVW/course/" id="navStudy" class="">我的收藏</a>
        </div>
        <div class="user-course-content">
            <div class="user-course-cont">
                <div id="learn-course-missing"><img src="/term/newSpaperSystem/Application/Home/View/public/img/shangche.jpg"
                                                    class="data-missing-bg"></div>
            </div>
            <div class="user-side">
                <div class="user-visit-header"><h2>最近访客</h2></div>
                <div class="user-visit user-popBoxs-container">
                    <div id="learn-data-missing"><img
                            src="http://sm1.jikexueyuan.com/assets/images/empty/face-he-no-visit.png"
                            class="data-missing-bg" alt="暂无访客"></div>
                </div>
            </div>
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

<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/jquery.1.7.2.min.js'
        charset='utf-8'></script>
<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/zui.min.js' charset='utf-8'></script>
<script type='text/javascript' src='/term/newSpaperSystem/Application/Home/View/public/js/login.js' charset='utf-8'></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#search-btn").click(function () {
            $("#searchbox").addClass("scale");
        });
        $("#close-btn").click(function () {
            $("#searchbox").removeClass("scale");
        });

    });
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