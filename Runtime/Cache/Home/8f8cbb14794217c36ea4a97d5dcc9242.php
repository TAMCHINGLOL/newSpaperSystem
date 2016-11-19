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
<body>
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
<div class="centent">
	<div class="user-course">
		<div class="course-nav">
			<div class="quesall">
				<h1 id="allques-title">全部分类</h1>
			<div class="lesson-classfiy-nav">
				<ul style="overflow: hidden; border-bottom-width: 0px; height: 185px;">
					<li>
						<div>
							<a cgid="1" href="http://wenda.jikexueyuan.com/lists/mobile/">移动开发</a>
							<div class="lesson-list-show" style="width: 401px; min-height: 410px;">
								<div style="width: 400px;">
									<dl>
										<dt><a href="#" cgid="13">应用开发</a></dt>
										<dd class="cf">
											<a href="#" cgid="63">Android</a>
											<a href="#" cgid="63">iOS</a>
										</dd>
									</dl>
									<dl>
										<dt><a href="#" cgid="13">游戏开发</a></dt>
										<dd class="cf">
											<a href="#" cgid="63">Cocos</a>
											<a href="#" cgid="63">Unity3D</a>
											<a href="#" cgid="63">SpriteKit 2D</a>
											<a href="#" cgid="63">Unreal</a>
										</dd>
									</dl>
									<dl>
										<dt><a href="#" cgid="13">常用框架</a></dt>
										<dd class="cf">
											<a href="#" cgid="63">Cordova</a>
											<a href="#" cgid="63">React Native</a>
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div>
							<a cgid="1" href="#">前端开发</a>
							<div class="lesson-list-show" style="width: 401px; min-height: 410px;">
								<div style="width: 400px;">
									<dl>
										<dt><a href="#" cgid="13">前端基础</a></dt>
										<dd class="cf">
											<a href="#" cgid="63">HTML</a>
											<a href="#" cgid="63">CSS</a>
											<a href="#" cgid="63">JavaScript</a>
											<a href="#" cgid="63">HTML5</a>
											<a href="#" cgid="63">CSS3</a>
											<a href="#" cgid="63">技术前瞻</a>
										</dd>
									</dl>
									<dl>
										<dt><a href="#" cgid="13">前端进阶</a></dt>
										<dd class="cf">
											<a href="#" cgid="63">Typescript</a>
											<a href="#" cgid="63">前端安全</a>
											<a href="#" cgid="63">项目实战</a>
										</dd>
									</dl>
									<dl>
										<dt><a href="#" cgid="13">前端框架</a></dt>
										<dd class="cf">
											<a href="#" cgid="63">jQuery</a>
											<a href="#" cgid="63">jQuery UI</a>
											<a href="#" cgid="63">jQuery Mobile</a>
											<a href="#" cgid="63">Ext JS</a>
											<a href="#" cgid="63">AngularJS</a>
											<a href="#" cgid="63">ReactJS</a>
											<a href="#" cgid="63">Bootstrap</a>
											<a href="#" cgid="63">React Native</a>
											<a href="#" cgid="63">Backbone</a>
											<a href="#" cgid="63">Three.js</a>
											<a href="#" cgid="63">MooTools</a>
											<a href="#" cgid="63">Compass</a>
										</dd>
									</dl>
									<dl>
										<dt><a href="#" cgid="13">HTML5游戏</a></dt>
										<dd class="cf">
											<a href="#" cgid="63">Canvas</a>
											<a href="#" cgid="63">SVG</a>
											<a href="#" cgid="63">WebGL</a>
											<a href="#" cgid="63">Cocos2d-js</a>
											<a href="#" cgid="63">CreateJS</a>
											<a href="#" cgid="63">Flash</a>
											<a href="#" cgid="63">Unreal</a>
											<a href="#" cgid="63">Egret</a>
											<a href="#" cgid="63">Phaser</a>
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div>
							<a cgid="1" href="http://wenda.jikexueyuan.com/lists/web/">前端开发</a>
							<div class="lesson-list-show" style="width: 401px; min-height: 410px;">
								<div style="width: 400px;">
									<dl>
										<dt><a href="http://wenda.jikexueyuan.com/lists/webbase/" cgid="13">前端基础</a></dt>
										<dd class="cf">
											<a href="http://wenda.jikexueyuan.com/lists/html/" cgid="63">HTML</a>
											<a href="http://wenda.jikexueyuan.com/lists/css/" cgid="63">CSS</a>
											<a href="http://wenda.jikexueyuan.com/lists/javascript/" cgid="63">JavaScript</a>
											<a href="http://wenda.jikexueyuan.com/lists/html5/" cgid="63">HTML5</a>
											<a href="http://wenda.jikexueyuan.com/lists/css3/" cgid="63">CSS3</a>
											<a href="http://wenda.jikexueyuan.com/lists/prospective/" cgid="63">技术前瞻</a>
										</dd>
									</dl>
									<dl>
										<dt><a href="http://wenda.jikexueyuan.com/lists/advance/" cgid="13">前端进阶</a></dt>
										<dd class="cf">
											<a href="http://wenda.jikexueyuan.com/lists/typescript/" cgid="63">Typescript</a>
											<a href="http://wenda.jikexueyuan.com/lists/security/" cgid="63">前端安全</a>
											<a href="http://wenda.jikexueyuan.com/lists/practice/" cgid="63">项目实战</a>
										</dd>
									</dl>
									<dl>
										<dt><a href="http://wenda.jikexueyuan.com/lists/webframe/" cgid="13">前端框架</a></dt>
										<dd class="cf">
											<a href="http://wenda.jikexueyuan.com/lists/jquery/" cgid="63">jQuery</a>
											<a href="http://wenda.jikexueyuan.com/lists/jqueryui/" cgid="63">jQuery UI</a>
											<a href="http://wenda.jikexueyuan.com/lists/jquerymobile/" cgid="63">jQuery Mobile</a>
											<a href="http://wenda.jikexueyuan.com/lists/extjs/" cgid="63">Ext JS</a>
											<a href="http://wenda.jikexueyuan.com/lists/angularjs/" cgid="63">AngularJS</a>
											<a href="http://wenda.jikexueyuan.com/lists/reactjs/" cgid="63">ReactJS</a>
											<a href="http://wenda.jikexueyuan.com/lists/bootstrap/" cgid="63">Bootstrap</a>
											<a href="http://wenda.jikexueyuan.com/lists/reactnative/" cgid="63">React Native</a>
											<a href="http://wenda.jikexueyuan.com/lists/backbone/" cgid="63">Backbone</a>
											<a href="http://wenda.jikexueyuan.com/lists/threejs/" cgid="63">Three.js</a>
											<a href="http://wenda.jikexueyuan.com/lists/mootools/" cgid="63">MooTools</a>
											<a href="http://wenda.jikexueyuan.com/lists/compass/" cgid="63">Compass</a>
										</dd>
									</dl>
									<dl>
										<dt><a href="http://wenda.jikexueyuan.com/lists/html5games/" cgid="13">HTML5游戏</a></dt>
										<dd class="cf">
											<a href="http://wenda.jikexueyuan.com/lists/canvas/" cgid="63">Canvas</a>
											<a href="http://wenda.jikexueyuan.com/lists/svg/" cgid="63">SVG</a>
											<a href="http://wenda.jikexueyuan.com/lists/webgl/" cgid="63">WebGL</a>
											<a href="http://wenda.jikexueyuan.com/lists/cocos2djs/" cgid="63">Cocos2d-js</a>
											<a href="http://wenda.jikexueyuan.com/lists/createjs/" cgid="63">CreateJS</a>
											<a href="http://wenda.jikexueyuan.com/lists/webflash/" cgid="63">Flash</a>
											<a href="http://wenda.jikexueyuan.com/lists/webunreal/" cgid="63">Unreal</a>
											<a href="http://wenda.jikexueyuan.com/lists/webegret/" cgid="63">Egret</a>
											<a href="http://wenda.jikexueyuan.com/lists/phaser/" cgid="63">Phaser</a>
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div>
							<a cgid="1" href="http://wenda.jikexueyuan.com/lists/web/">前端开发</a>
							<div class="lesson-list-show" style="width: 401px; min-height: 410px;">
								<div style="width: 400px;">
									<dl>
										<dt><a href="http://wenda.jikexueyuan.com/lists/webbase/" cgid="13">前端基础</a></dt>
										<dd class="cf">
											<a href="http://wenda.jikexueyuan.com/lists/html/" cgid="63">HTML</a>
											<a href="http://wenda.jikexueyuan.com/lists/css/" cgid="63">CSS</a>
											<a href="http://wenda.jikexueyuan.com/lists/javascript/" cgid="63">JavaScript</a>
											<a href="http://wenda.jikexueyuan.com/lists/html5/" cgid="63">HTML5</a>
											<a href="http://wenda.jikexueyuan.com/lists/css3/" cgid="63">CSS3</a>
											<a href="http://wenda.jikexueyuan.com/lists/prospective/" cgid="63">技术前瞻</a>
										</dd>
									</dl>
									<dl>
										<dt><a href="http://wenda.jikexueyuan.com/lists/advance/" cgid="13">前端进阶</a></dt>
										<dd class="cf">
											<a href="http://wenda.jikexueyuan.com/lists/typescript/" cgid="63">Typescript</a>
											<a href="http://wenda.jikexueyuan.com/lists/security/" cgid="63">前端安全</a>
											<a href="http://wenda.jikexueyuan.com/lists/practice/" cgid="63">项目实战</a>
										</dd>
									</dl>
									<dl>
										<dt><a href="http://wenda.jikexueyuan.com/lists/webframe/" cgid="13">前端框架</a></dt>
										<dd class="cf">
											<a href="http://wenda.jikexueyuan.com/lists/jquery/" cgid="63">jQuery</a>
											<a href="http://wenda.jikexueyuan.com/lists/jqueryui/" cgid="63">jQuery UI</a>
											<a href="http://wenda.jikexueyuan.com/lists/jquerymobile/" cgid="63">jQuery Mobile</a>
											<a href="http://wenda.jikexueyuan.com/lists/extjs/" cgid="63">Ext JS</a>
											<a href="http://wenda.jikexueyuan.com/lists/angularjs/" cgid="63">AngularJS</a>
											<a href="http://wenda.jikexueyuan.com/lists/reactjs/" cgid="63">ReactJS</a>
											<a href="http://wenda.jikexueyuan.com/lists/bootstrap/" cgid="63">Bootstrap</a>
											<a href="http://wenda.jikexueyuan.com/lists/reactnative/" cgid="63">React Native</a>
											<a href="http://wenda.jikexueyuan.com/lists/backbone/" cgid="63">Backbone</a>
											<a href="http://wenda.jikexueyuan.com/lists/threejs/" cgid="63">Three.js</a>
											<a href="http://wenda.jikexueyuan.com/lists/mootools/" cgid="63">MooTools</a>
											<a href="http://wenda.jikexueyuan.com/lists/compass/" cgid="63">Compass</a>
										</dd>
									</dl>
									<dl>
										<dt><a href="http://wenda.jikexueyuan.com/lists/html5games/" cgid="13">HTML5游戏</a></dt>
										<dd class="cf">
											<a href="http://wenda.jikexueyuan.com/lists/canvas/" cgid="63">Canvas</a>
											<a href="http://wenda.jikexueyuan.com/lists/svg/" cgid="63">SVG</a>
											<a href="http://wenda.jikexueyuan.com/lists/webgl/" cgid="63">WebGL</a>
											<a href="http://wenda.jikexueyuan.com/lists/cocos2djs/" cgid="63">Cocos2d-js</a>
											<a href="http://wenda.jikexueyuan.com/lists/createjs/" cgid="63">CreateJS</a>
											<a href="http://wenda.jikexueyuan.com/lists/webflash/" cgid="63">Flash</a>
											<a href="http://wenda.jikexueyuan.com/lists/webunreal/" cgid="63">Unreal</a>
											<a href="http://wenda.jikexueyuan.com/lists/webegret/" cgid="63">Egret</a>
											<a href="http://wenda.jikexueyuan.com/lists/phaser/" cgid="63">Phaser</a>
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div>
							<a cgid="1" href="http://wenda.jikexueyuan.com/lists/web/">前端开发</a>
							<div class="lesson-list-show" style="width: 401px; min-height: 410px;">
								<div style="width: 400px;">
									<dl>
										<dt><a href="http://wenda.jikexueyuan.com/lists/webbase/" cgid="13">前端基础</a></dt>
										<dd class="cf">
											<a href="http://wenda.jikexueyuan.com/lists/html/" cgid="63">HTML</a>
											<a href="http://wenda.jikexueyuan.com/lists/css/" cgid="63">CSS</a>
											<a href="http://wenda.jikexueyuan.com/lists/javascript/" cgid="63">JavaScript</a>
											<a href="http://wenda.jikexueyuan.com/lists/html5/" cgid="63">HTML5</a>
											<a href="http://wenda.jikexueyuan.com/lists/css3/" cgid="63">CSS3</a>
											<a href="http://wenda.jikexueyuan.com/lists/prospective/" cgid="63">技术前瞻</a>
										</dd>
									</dl>
									<dl>
										<dt><a href="http://wenda.jikexueyuan.com/lists/advance/" cgid="13">前端进阶</a></dt>
										<dd class="cf">
											<a href="http://wenda.jikexueyuan.com/lists/typescript/" cgid="63">Typescript</a>
											<a href="http://wenda.jikexueyuan.com/lists/security/" cgid="63">前端安全</a>
											<a href="http://wenda.jikexueyuan.com/lists/practice/" cgid="63">项目实战</a>
										</dd>
									</dl>
									<dl>
										<dt><a href="http://wenda.jikexueyuan.com/lists/webframe/" cgid="13">前端框架</a></dt>
										<dd class="cf">
											<a href="http://wenda.jikexueyuan.com/lists/jquery/" cgid="63">jQuery</a>
											<a href="http://wenda.jikexueyuan.com/lists/jqueryui/" cgid="63">jQuery UI</a>
											<a href="http://wenda.jikexueyuan.com/lists/jquerymobile/" cgid="63">jQuery Mobile</a>
											<a href="http://wenda.jikexueyuan.com/lists/extjs/" cgid="63">Ext JS</a>
											<a href="http://wenda.jikexueyuan.com/lists/angularjs/" cgid="63">AngularJS</a>
											<a href="http://wenda.jikexueyuan.com/lists/reactjs/" cgid="63">ReactJS</a>
											<a href="http://wenda.jikexueyuan.com/lists/bootstrap/" cgid="63">Bootstrap</a>
											<a href="http://wenda.jikexueyuan.com/lists/reactnative/" cgid="63">React Native</a>
											<a href="http://wenda.jikexueyuan.com/lists/backbone/" cgid="63">Backbone</a>
											<a href="http://wenda.jikexueyuan.com/lists/threejs/" cgid="63">Three.js</a>
											<a href="http://wenda.jikexueyuan.com/lists/mootools/" cgid="63">MooTools</a>
											<a href="http://wenda.jikexueyuan.com/lists/compass/" cgid="63">Compass</a>
										</dd>
									</dl>
									<dl>
										<dt><a href="http://wenda.jikexueyuan.com/lists/html5games/" cgid="13">HTML5游戏</a></dt>
										<dd class="cf">
											<a href="http://wenda.jikexueyuan.com/lists/canvas/" cgid="63">Canvas</a>
											<a href="http://wenda.jikexueyuan.com/lists/svg/" cgid="63">SVG</a>
											<a href="http://wenda.jikexueyuan.com/lists/webgl/" cgid="63">WebGL</a>
											<a href="http://wenda.jikexueyuan.com/lists/cocos2djs/" cgid="63">Cocos2d-js</a>
											<a href="http://wenda.jikexueyuan.com/lists/createjs/" cgid="63">CreateJS</a>
											<a href="http://wenda.jikexueyuan.com/lists/webflash/" cgid="63">Flash</a>
											<a href="http://wenda.jikexueyuan.com/lists/webunreal/" cgid="63">Unreal</a>
											<a href="http://wenda.jikexueyuan.com/lists/webegret/" cgid="63">Egret</a>
											<a href="http://wenda.jikexueyuan.com/lists/phaser/" cgid="63">Phaser</a>
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			</div>
		</div>
		<div class="user-course-content tab-content">
			<div class="user-course-cont ">
				<div id="learn-course-missing">
				  <div class="items">
					<div class="item">
					  <div class="item-heading">
						<div class="pull-right"><span class="text-muted">2013-11-11 16:14:37</span> &nbsp; <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a></div>
						<h4><a href="<?php echo U('Home/All/thesisshow');?>">我的论文</a></h4>
					  </div>
					  <div class="item-content">
						<div class="text">HTML 5草案的前身名为Web Applications 1.0，是在2004年由WHATWG提出。2008年1月22日，第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作，仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
					  </div>
					</div>
					<div class="item">
					  <div class="item-heading">
						<div class="pull-right"><span class="text-muted">2013-11-11 16:14:37</span> &nbsp; <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a></div>
						<h4><a href="thesisshow.html">HTML5 发展历史</a></h4>
					  </div>
					  <div class="item-content">
						<div class="text">HTML 5草案的前身名为Web Applications 1.0，是在2004年由WHATWG提出。2008年1月22日，第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作，仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
					  </div>
					</div>
					<div class="item">
					  <div class="item-heading">
						<div class="pull-right"><span class="text-muted">2013-11-11 16:14:37</span> &nbsp; <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a></div>
						<h4><a href="thesisshow.html">HTML5 发展历史</a></h4>
					  </div>
					  <div class="item-content">
						<div class="text">HTML 5草案的前身名为Web Applications 1.0，是在2004年由WHATWG提出。2008年1月22日，第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作，仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
					  </div>
					</div>
					<div class="item">
					  <div class="item-heading">
						<div class="pull-right"><span class="text-muted">2013-11-11 16:14:37</span> &nbsp; <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a></div>
						<h4><a href="thesisshow.html">HTML5 发展历史</a></h4>
					  </div>
					  <div class="item-content">
						<div class="text">HTML 5草案的前身名为Web Applications 1.0，是在2004年由WHATWG提出。2008年1月22日，第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作，仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
					  </div>
					</div>
					<div class="item">
					  <div class="item-heading">
						<div class="pull-right"><span class="text-muted">2013-11-11 16:14:37</span> &nbsp; <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a></div>
						<h4><a href="thesisshow.html">HTML5 发展历史</a></h4>
					  </div>
					  <div class="item-content">
						<div class="text">HTML 5草案的前身名为Web Applications 1.0，是在2004年由WHATWG提出。2008年1月22日，第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作，仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
					  </div>
					</div>
				   </div>
				</div>
			</div>
			<div class="user-side">
				<div class="user-visit-header"><h2>最近访客</h2></div>
				<div class="user-visit user-popBoxs-container">
					<div id="learn-data-missing"><img src="http://sm1.jikexueyuan.com/assets/images/empty/face-he-no-visit.png" class="data-missing-bg" alt="暂无访客"></div>													</div>
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
					<img src="http://e.jikexueyuan.com/headerandfooter/images/app.png?t=1475152597000" class="twoCode" alt="下载二维码"> iPhone
				</div>
				<div class="downCon down-and">
					<img src="http://e.jikexueyuan.com/headerandfooter/images/app.png?t=1475152597000" class="twoCode" alt="下载二维码"> Android
				</div>
			</div>
		</div>
	</div>
	<div class="w-1000 copyright">
		Copyright © 2013-2016&nbsp;<strong><a href="#" target="_blank">jikexueyuan.com</a></strong> All Rights Reserved. 京ICP备11018032号-8 京公网安备11010802020210
		<a href="http://qun.jikexueyuan.com/jikexueyuan/topic/430" target="_blank" class="down-wechat"></a>
		<a href="http://weibo.com/jikexueyuan" target="_blank" class="down-sina"></a>
	</div>
</div>
<!--底部结束-->

<script type='text/javascript' src='../js/jquery.1.7.2.min.js' charset='utf-8'></script>
<script type='text/javascript' src='../js/zui.min.js' charset='utf-8'></script>
<script type='text/javascript' src='../js/login.js' charset='utf-8'></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#search-btn").click(function(){
		$("#searchbox").addClass("scale");
	});
	$("#close-btn").click(function(){
		$("#searchbox").removeClass("scale");
	});

});
$(document).ready(function(){
	$(".lesson-classfiy-nav ul li").hover(function(){
		$(".lesson-classfiy-nav ul").css({"width":"565","height":"445"});
	});
});
</script>


<!--[if lt IE 9]>
  <script type='text/javascript' src="lib/ieonly/html5shiv.js"></script>
<![endif]-->
<!--[if lt IE 9]>
  <script type='text/javascript' src="lib/ieonly/respond.js"></script>
<![endif]-->
<!--[if lt IE 9]>
  <script type='text/javascript' src="lib/ieonly/excanvas.js"></script>
<![endif]-->
</body>
</html>