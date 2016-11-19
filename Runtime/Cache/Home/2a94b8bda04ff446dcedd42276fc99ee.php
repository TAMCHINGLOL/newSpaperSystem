<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>首页</title>
    <link rel="stylesheet" href="/newSpaperSystem/Application/Home/View/public/css/Login/zui.min.css">
    <link rel="stylesheet" href="/newSpaperSystem/Application/Home/View/public/css/Login/common.css">
    <link rel="stylesheet" href="/newSpaperSystem/Application/Home/View/public/css/Login/login.css">
</head>
<body class="body-color">
<div class="header">
    <div class="centent">
        <a class="logo-img" href="<?php echo U('Home/Index/index');?>"><img class="pull-left" src="/newSpaperSystem/Application/Home/View/public/img/logo2.png" width="105px" height="45px" /></a>
        <nav>
            <ul class="header-nav">
                <li><a href="<?php echo U('Home/Index/index');?>" style="color: rgb(53, 181, 88);">首页</a></li>
                <li><a href="<?php echo U('Home/All/thesisclassify');?>">论文分类<i class="arrow-icon"></i></a>
                    <div class="submenu school-list">
                        <h3>前端学院</h3>
                        <a href="#"><i class="web-icon"></i>Web 前端工程师</a>
                        <h3>后端学院</h3>
                        <a href="#"><i class="python-icon"></i>Python Web工程师</a>
                        <a href="#"><i class="go-icon"></i>Go语言工程师</a>
                        <h3>移动学院</h3>
                        <a href="#"><i class="ios-icon"></i>iOS工程师</a>
                    </div>
                </li>
                <li>论文投递</li>
                <li>社区</li>
            </ul>
        </nav>
        <div class="icon-box">
            <span class="search-icon" id="search-btn"></span>
                <?php if(session('uid') == ''): ?><span class="relative loginlist login-icon" id="loginlist">
                    <?php else: ?>
                    <span class="relative loginlist" id="loginlist">
                    <img src="/newSpaperSystem/Application/Home/View/public/img/default.gif" style="height: 25px;width: 25px;margin-bottom: 54px"><?php endif; ?>
                    <dl class="submenu"><i class="top-icon"></i>
                        <dd>
                            <?php if(session('uid') == ''): ?><a href="<?php echo U('Home/Login/register');?>" class="reg-btn">注册</a>|<a href="<?php echo U('Home/Login/index');?>" class="login-btn">登录</a><?php endif; ?>
                        </dd>
                        <dd><a href="<?php echo U('Home/Person/index');?>"><i class="grzy-icon"></i>个人主页</a></dd>
                        <dd><a href="<?php echo U('Home/Person/message');?>"><i class="xxtz-icon"></i>消息通知</a></dd>
                        <dd><a href="<?php echo U('Home/Person/account');?>"><i class="zhsz-icon"></i>账号设置</a></dd>
                        <?php if(session('uid') != ''): ?><dd><a href="<?php echo U('Home/Index/exitLogin');?>"><i class="zhsz-icon"></i>退出登录</a></dd><?php endif; ?>
                    </dl>
                </span>
        </div>
        <div class="searchbox" id="searchbox">
            <i class="close-icon" id="close-btn"></i>
            <i class="search-icon" id="search-btn"></i>
            <input id="web_search_header" placeholder="搜索文章 / 问答" value="" />
        </div>
    </div>
</div>
<div class="centent mar-t20">
    <!-- 轮播开始 -->
    <div id="myNiceCarousel" class="carousel slide" data-ride="carousel">
        <!-- 圆点指示器 -->
        <ol class="carousel-indicators carousel-green">
            <li data-target="#myNiceCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myNiceCarousel" data-slide-to="1"></li>
            <li data-target="#myNiceCarousel" data-slide-to="2"></li>
        </ol>

        <!-- 轮播项目 -->
        <div class="carousel-inner">
            <div class="item active">
                <img alt="First slide" src="http://zui.sexy/docs/img/slide1.jpg">
                <div class="carousel-caption">
                    <h3>我是第一张幻灯片</h3>
                    <p>:)</p>
                </div>
            </div>
            <div class="item">
                <img alt="Second slide" src="http://zui.sexy/docs/img/slide2.jpg">
                <div class="carousel-caption">
                    <h3>我是第二张幻灯片</h3>
                    <p>0.0</p>
                </div>
            </div>
            <div class="item">
                <img alt="Third slide" src="http://zui.sexy/docs/img/slide3.jpg">
                <div class="carousel-caption">
                    <h3>我是第三张幻灯片</h3>
                    <p>最后一张咯~</p>
                </div>
            </div>
        </div>
    </div>
    <!-- 轮播结束 -->
    <!-- 热门论文排行开始 -->
    <div class="cards" style="padding-top: 20px;">
        <div class="col-md-4 col-sm-6 col-lg-3">
            <a class="card" href="###">
                <img src="http://jiuye-res.jikexueyuan.com/zhiye/showcase/attach-/20161013/2a7bf0a0-d94d-40d4-a244-20e5a5e359e6.jpg"
                     alt="">
                <div class="caption">“良辰美景” 出自《牡丹亭》</div>
                <div class="card-heading"><strong>良辰美景</strong></div>
                <div class="card-content text-muted">良辰美景奈何天，赏心乐事谁家院。</div>
            </a>
        </div>
        <div class="col-md-4 col-sm-6 col-lg-3">
            <a class="card" href="###">
                <img src="http://jiuye-res.jikexueyuan.com/zhiye/showcase/attach-/20161013/2a7bf0a0-d94d-40d4-a244-20e5a5e359e6.jpg"
                     alt="">
                <div class="caption">“良辰美景” 出自《牡丹亭》</div>
                <div class="card-heading"><strong>良辰美景</strong></div>
                <div class="card-content text-muted">良辰美景奈何天，赏心乐事谁家院。</div>
            </a>
        </div>
        <div class="col-md-4 col-sm-6 col-lg-3">
            <a class="card" href="###">
                <img src="http://jiuye-res.jikexueyuan.com/zhiye/showcase/attach-/20161013/2a7bf0a0-d94d-40d4-a244-20e5a5e359e6.jpg"
                     alt="">
                <div class="caption">“良辰美景” 出自《牡丹亭》</div>
                <div class="card-heading"><strong>良辰美景</strong></div>
                <div class="card-content text-muted">良辰美景奈何天，赏心乐事谁家院。</div>
            </a>
        </div>
        <div class="col-md-4 col-sm-6 col-lg-3">
            <a class="card" href="###">
                <img src="http://jiuye-res.jikexueyuan.com/zhiye/showcase/attach-/20161013/2a7bf0a0-d94d-40d4-a244-20e5a5e359e6.jpg"
                     alt="">
                <div class="caption">“良辰美景” 出自《牡丹亭》</div>
                <div class="card-heading"><strong>良辰美景</strong></div>
                <div class="card-content text-muted">良辰美景奈何天，赏心乐事谁家院。</div>
            </a>
        </div>
    </div>
    <!-- 列表开始 -->
    <div class="list-news">
        <div class="width50 pull-left pad-rl-10">
            <div class="list list-condensed">
                <header>
                    <h3><i class="icon-list-ul"></i> 最新动态
                        <small>更新 123 条</small>
                    </h3>
                </header>
                <div class="items items-hover">
                    <div class="item">
                        <div class="item-heading">
                            <div class="pull-right"><span class="text-muted">2013-11-11 16:14:37</span> &nbsp; <a
                                    href="#" class="text-muted"><i class="icon-comments"></i> 243</a></div>
                            <h4><a href="###">HTML5 发展历史</a></h4>
                        </div>
                        <div class="item-content">
                            <div class="text">HTML 5草案的前身名为Web Applications
                                1.0，是在2004年由WHATWG提出。2008年1月22日，第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作，仍须多年的努力。[8]目前Mozilla
                                Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-heading">
                            <div class="pull-right label label-success">维基</div>
                            <h4><a href="###">HTML5 发展历史</a></h4>
                        </div>
                        <div class="item-content">
                            <div class="text">HTML 5草案的前身名为Web Applications
                                1.0，是在2004年由WHATWG提出。2008年1月22日，第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作，仍须多年的努力。[8]目前Mozilla
                                Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。
                            </div>
                        </div>
                        <div class="item-footer">
                            <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a> &nbsp; <span
                                class="text-muted">2013-11-11 16:14:37</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-heading">
                            <div class="pull-right label label-success">维基</div>
                            <h4><a href="###">HTML5 发展历史</a></h4>
                        </div>
                        <div class="item-content">
                            <div class="media pull-right"><img
                                    src="http://jiuye-res.jikexueyuan.com/zhiye/showcase/attach-/20161013/2a7bf0a0-d94d-40d4-a244-20e5a5e359e6.jpg"
                                    alt=""></div>
                            <div class="text">HTML 5草案的前身名为Web Applications
                                1.0，是在2004年由WHATWG提出。2008年1月22日，第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作，仍须多年的努力。[8]目前Mozilla
                                Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。
                            </div>
                        </div>
                        <div class="item-footer">
                            <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a> &nbsp; <span
                                class="text-muted">2013-11-11 16:14:37</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-heading">
                            <div class="pull-right"><a href="###"><i class="icon-pencil"></i> 编辑</a> &nbsp;<a
                                    href="#"><i class="icon-remove"></i> 删除</a></div>
                            <h4><span class="label label-success">维基</span> <a href="###">HTML5 发展历史</a></h4>
                        </div>
                        <div class="item-content">
                            <div class="text">HTML 5草案的前身名为Web Applications
                                1.0，是在2004年由WHATWG提出。2008年1月22日，第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作，仍须多年的努力。[8]目前Mozilla
                                Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。
                            </div>
                        </div>
                        <div class="item-footer">
                            <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a> &nbsp; <span
                                class="text-muted">2013-11-11 16:14:37</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="width50 pull-right pad-rl-10">
            <div class="list list-condensed">
                <header>
                    <h3><i class="icon-list-ul"></i> 最新动态
                        <small>更新 123 条</small>
                    </h3>
                </header>
                <div class="items items-hover">
                    <div class="item">
                        <div class="item-heading">
                            <div class="pull-right"><span class="text-muted">2013-11-11 16:14:37</span> &nbsp; <a
                                    href="#" class="text-muted"><i class="icon-comments"></i> 243</a></div>
                            <h4><a href="###">HTML5 发展历史</a></h4>
                        </div>
                        <div class="item-content">
                            <div class="text">HTML 5草案的前身名为Web Applications
                                1.0，是在2004年由WHATWG提出。2008年1月22日，第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作，仍须多年的努力。[8]目前Mozilla
                                Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-heading">
                            <div class="pull-right label label-success">维基</div>
                            <h4><a href="###">HTML5 发展历史</a></h4>
                        </div>
                        <div class="item-content">
                            <div class="text">HTML 5草案的前身名为Web Applications
                                1.0，是在2004年由WHATWG提出。2008年1月22日，第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作，仍须多年的努力。[8]目前Mozilla
                                Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。
                            </div>
                        </div>
                        <div class="item-footer">
                            <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a> &nbsp; <span
                                class="text-muted">2013-11-11 16:14:37</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-heading">
                            <div class="pull-right label label-success">维基</div>
                            <h4><a href="###">HTML5 发展历史</a></h4>
                        </div>
                        <div class="item-content">
                            <div class="media pull-right"><img
                                    src="http://jiuye-res.jikexueyuan.com/zhiye/showcase/attach-/20161013/2a7bf0a0-d94d-40d4-a244-20e5a5e359e6.jpg"
                                    alt=""></div>
                            <div class="text">HTML 5草案的前身名为Web Applications
                                1.0，是在2004年由WHATWG提出。2008年1月22日，第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作，仍须多年的努力。[8]目前Mozilla
                                Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。
                            </div>
                        </div>
                        <div class="item-footer">
                            <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a> &nbsp; <span
                                class="text-muted">2013-11-11 16:14:37</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-heading">
                            <div class="pull-right"><a href="###"><i class="icon-pencil"></i> 编辑</a> &nbsp;<a
                                    href="#"><i class="icon-remove"></i> 删除</a></div>
                            <h4><span class="label label-success">维基</span> <a href="###">HTML5 发展历史</a></h4>
                        </div>
                        <div class="item-content">
                            <div class="text">HTML 5草案的前身名为Web Applications
                                1.0，是在2004年由WHATWG提出。2008年1月22日，第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作，仍须多年的努力。[8]目前Mozilla
                                Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。
                            </div>
                        </div>
                        <div class="item-footer">
                            <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a> &nbsp; <span
                                class="text-muted">2013-11-11 16:14:37</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 列表结束-->
    <!---->
    <!-- 轮播开始 -->
    <div id="myhear" class="carousel slide mar-t20" data-ride="carousel">
        <!-- 圆点指示器 -->
        <ol class="carousel-indicators carousel-green bottom-50">
            <li data-target="#myhear" data-slide-to="0" class="active"></li>
            <li data-target="#myhear" data-slide-to="1"></li>
            <li data-target="#myhear" data-slide-to="2"></li>
        </ol>
        <!-- 笔者心声轮播项目 -->
        <div class="carousel-inner">
            <div class="item active">
                <ul class="story">
                    <li class="col-md-4">
                        <a href="http://blog.jikexueyuan.com/5.html" target="_blank">
                            <div class="story-content">
                                <p>
                                    爆炸力学硕士转安卓开发，回顾自己从爆炸力学走向代码世界的历程，感触良多。庆幸自己没有留在研究所，程序员不断学习不断进步的感觉更有意义。稳定绝不代表停滞，历练才是我们的财富。</p>
                            </div>
                            <div class="story-info">
                                <img src="http://wirrorcdn.jikexueyuan.com/v6/index-a/student-4-avatar.jpg">
                                <p>张少龙</p>
                                <span>入职 北京中航智科技</span>
                            </div>
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="http://blog.jikexueyuan.com/6.html" target="_blank">
                            <div class="story-content">
                                <p>
                                    美女程序媛，从运维转岗到前端开发工程师。工作上的变化只是一部分，遇到极客学院更重要的是让我知道了自己的潜力，不被未来的不确定性吓倒，相信有目标，肯努力就可以得到想要的生活。</p>
                            </div>
                            <div class="story-info">
                                <img src="http://wirrorcdn.jikexueyuan.com/v6/index-a/student-5-avatar.jpg">
                                <p>杨帆</p>
                                <span>入职 深圳IBM</span>
                            </div>
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="http://blog.jikexueyuan.com/7.html" target="_blank">
                            <div class="story-content">
                                <p>Web大前端工程师就业班五期 03 班学员，某 985 大学信息与计算科学 2016 届毕业生，2 个月完成 16 个任务，被同班同学称为「大神」。2016
                                    年拿到毕业证书的同时也拿到了 15K 高薪的 offer。</p>
                            </div>
                            <div class="story-info">
                                <img src="http://wirrorcdn.jikexueyuan.com/v6/index-a/student-6-avatar.jpg">
                                <p>路昕宇</p>
                                <span>入职 浪弯融科科技公司</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="item">
                <ul class="story">
                    <li class="col-md-4">
                        <a href="http://blog.jikexueyuan.com/5.html" target="_blank">
                            <div class="story-content">
                                <p>
                                    爆炸力学硕士转安卓开发，回顾自己从爆炸力学走向代码世界的历程，感触良多。庆幸自己没有留在研究所，程序员不断学习不断进步的感觉更有意义。稳定绝不代表停滞，历练才是我们的财富。</p>
                            </div>
                            <div class="story-info">
                                <img src="http://wirrorcdn.jikexueyuan.com/v6/index-a/student-4-avatar.jpg">
                                <p>张少龙</p>
                                <span>入职 北京中航智科技</span>
                            </div>
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="http://blog.jikexueyuan.com/6.html" target="_blank">
                            <div class="story-content">
                                <p>
                                    美女程序媛，从运维转岗到前端开发工程师。工作上的变化只是一部分，遇到极客学院更重要的是让我知道了自己的潜力，不被未来的不确定性吓倒，相信有目标，肯努力就可以得到想要的生活。</p>
                            </div>
                            <div class="story-info">
                                <img src="http://wirrorcdn.jikexueyuan.com/v6/index-a/student-5-avatar.jpg">
                                <p>杨帆</p>
                                <span>入职 深圳IBM</span>
                            </div>
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="http://blog.jikexueyuan.com/7.html" target="_blank">
                            <div class="story-content">
                                <p>Web大前端工程师就业班五期 03 班学员，某 985 大学信息与计算科学 2016 届毕业生，2 个月完成 16 个任务，被同班同学称为「大神」。2016
                                    年拿到毕业证书的同时也拿到了 15K 高薪的 offer。</p>
                            </div>
                            <div class="story-info">
                                <img src="http://wirrorcdn.jikexueyuan.com/v6/index-a/student-6-avatar.jpg">
                                <p>路昕宇</p>
                                <span>入职 浪弯融科科技公司</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="item">
                <ul class="story">
                    <li class="col-md-4">
                        <a href="http://blog.jikexueyuan.com/5.html" target="_blank">
                            <div class="story-content">
                                <p>
                                    爆炸力学硕士转安卓开发，回顾自己从爆炸力学走向代码世界的历程，感触良多。庆幸自己没有留在研究所，程序员不断学习不断进步的感觉更有意义。稳定绝不代表停滞，历练才是我们的财富。</p>
                            </div>
                            <div class="story-info">
                                <img src="http://wirrorcdn.jikexueyuan.com/v6/index-a/student-4-avatar.jpg">
                                <p>张少龙</p>
                                <span>入职 北京中航智科技</span>
                            </div>
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="http://blog.jikexueyuan.com/6.html" target="_blank">
                            <div class="story-content">
                                <p>
                                    美女程序媛，从运维转岗到前端开发工程师。工作上的变化只是一部分，遇到极客学院更重要的是让我知道了自己的潜力，不被未来的不确定性吓倒，相信有目标，肯努力就可以得到想要的生活。</p>
                            </div>
                            <div class="story-info">
                                <img src="http://wirrorcdn.jikexueyuan.com/v6/index-a/student-5-avatar.jpg">
                                <p>杨帆</p>
                                <span>入职 深圳IBM</span>
                            </div>
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="http://blog.jikexueyuan.com/7.html" target="_blank">
                            <div class="story-content">
                                <p>Web大前端工程师就业班五期 03 班学员，某 985 大学信息与计算科学 2016 届毕业生，2 个月完成 16 个任务，被同班同学称为「大神」。2016
                                    年拿到毕业证书的同时也拿到了 15K 高薪的 offer。</p>
                            </div>
                            <div class="story-info">
                                <img src="http://wirrorcdn.jikexueyuan.com/v6/index-a/student-6-avatar.jpg">
                                <p>路昕宇</p>
                                <span>入职 浪弯融科科技公司</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--底部-->
<div id="footer" class="mar-t50">
    <link rel="stylesheet" href="http://e.jikexueyuan.com/headerandfooter/css/footer.css?t=1475152597000">
    <div class=" jkinfor-block">
        <div class="jkinfor cf">
            <div class="jk-logo">
                <img src="http://e.jikexueyuan.com/headerandfooter/images/jk-logo-footer.png?t=1475152597000">
                <p>极客学院，编程是一种信仰！</p>
            </div>
            <dl>
                <dt>职业学院</dt>
                <dd><a target="_blank" href="http://www.jikexueyuan.com/zhiye/web">Web前端工程师</a></dd>
                <dd><a target="_blank" href="http://www.jikexueyuan.com/zhiye/python">Python Web工程师</a></dd>
                <dd><a target="_blank" href="http://www.jikexueyuan.com/zhiye/go">Go语言工程师</a></dd>
                <dd><a target="_blank" href="http://www.jikexueyuan.com/zhiye/ios">iOS工程师</a></dd>
            </dl>
            <dl>
                <dt>会员课程</dt>
                <dd><a target="_blank" href="http://www.jikexueyuan.com/course/">课程库</a></dd>
                <dd><a target="_blank" href="http://www.jikexueyuan.com/path/">知识体系图</a></dd>
                <dd><a target="_blank" href="http://ke.jikexueyuan.com/zhiye/">职业路径图</a></dd>
                <dd><a target="_blank" href="http://ke.jikexueyuan.com/xilie/">系列课程</a></dd>
                <dd><a target="_blank" href="http://www.jikexueyuan.com/tag/">课程标签</a></dd>
            </dl>
            <dl>
                <dt>极客社区</dt>
                <dd><a target="_blank" href="http://wenda.jikexueyuan.com/">技术问答</a></dd>
                <dd><a target="_blank" href="http://wiki.jikexueyuan.com/">Wiki</a></dd>
                <dd><a target="_blank" href="http://download.jikexueyuan.com/">资源下载</a></dd>
                <dd><a target="_blank" href="http://qun.jikexueyuan.com/">社群</a></dd>
            </dl>
            <dl>
                <dt>其他</dt>
                <dd><a target="_blank" href="http://help.jikexueyuan.com/">关于我们</a></dd>
                <dd><a target="_blank" href="http://help.jikexueyuan.com/join.html">加入我们</a></dd>
                <dd><a target="_blank" href="http://press.jikexueyuan.com/evangelist/apply.html">讲师合作</a></dd>
                <dd><a target="_blank" href="http://help.jikexueyuan.com/contact.html">联系我们</a></dd>
                <dd><a target="_blank" href="http://www.jikexueyuan.com/friendlink.html">友情链接</a></dd>
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
        Copyright © 2013-2016&nbsp;<strong><a href="http://www.jikexueyuan.com/"
                                              target="_blank">jikexueyuan.com</a></strong> All Rights Reserved.
        京ICP备11018032号-8 京公网安备11010802020210
        <a href="http://qun.jikexueyuan.com/jikexueyuan/topic/430" target="_blank" class="down-wechat"></a>
        <a href="http://weibo.com/jikexueyuan" target="_blank" class="down-sina"></a>
    </div>
</div>
<!--底部结束-->

<script type='text/javascript' src='/newSpaperSystem/Application/Home/View/public/js/Login/jquery.1.7.2.min.js'></script>
<script type='text/javascript' src='/newSpaperSystem/Application/Home/View/public/js/Login/zui.min.js'></script>
<script type='text/javascript' src='/newSpaperSystem/Application/Home/View/public/js/Login/login.js'></script>
<script type='text/javascript' src='/newSpaperSystem/Application/Home/View/public/js/layer/layer.js'></script>
<!--<script type='text/javascript' src='/newSpaperSystem/Application/Home/View/public/js/md5/md5.js'></script>-->
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
<script type='text/javascript' src="/newSpaperSystem/Application/Home/View/public/js/lib/ieonly/html5shiv.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script type='text/javascript' src="/newSpaperSystem/Application/Home/View/public/js/lib/ieonly/respond.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script type='text/javascript' src="/newSpaperSystem/Application/Home/View/public/js/lib/ieonly/excanvas.js"></script>
<![endif]-->
</body>
</html>