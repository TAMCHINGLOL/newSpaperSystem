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
		<!--文章部分-->
		<article class="article">
		  <header>
			<div class="point-good"><img src="/newSpaperSystem/Application/Home/View/public/img/getted.png"/><span class="label label-danger">235</span></div>
			<h1><strong>《牛顿第一定理》</strong></h1>
			<dl class="dl-inline">
			  <dt>来源：</dt>
			  <dd>维基百科</dd>
			  <dt>最后修订：</dt>
			  <dd>2016年8月12日 (星期五) 12:53</dd>
			  <dt></dt>
			  <dd class="pull-right"><span class="label label-success">HTML</span> <span class="label label-warning">网页设计</span> <span class="label label-info">W3C</span> <span class="label label-danger"><i class="icon-eye-open"></i> 235</span></dd>
			</dl>
			<section class="abstract">
			  <p><strong>摘要：</strong>HTML5是HTML最新的修订版本，2014年10月由万维网联盟（W3C）完成标准制定。目标是替换1999年所制定的HTML 4.01和XHTML 1.0标准，以期能在互联网应用迅速发展的时候，使网络标准达到匹配当代的网络需求。广义论及HTML5时，实际指的是包括HTML、CSS和JavaScript在内的一套技术组合。</p>
			</section>
		  </header>
		  <section class="content">
			<p>HTML5是HTML最新的修订版本，2014年10月由万维网联盟（W3C）完成标准制定。目标是替换1999年所制定的HTML 4.01和XHTML 1.0标准，以期能在互联网应用迅速发展的时候，使网络标准达到匹配当代的网络需求。广义论及HTML5时，实际指的是包括HTML、CSS和JavaScript在内的一套技术组合。它希望能够减少网页浏览器对于需要插件的丰富性网络应用服务（Plug-in-Based Rich Internet Application，RIA），例如：AdobeFlash、Microsoft Silverlight与Oracle JavaFX的需求，并且提供更多能有效加强网络应用的标准集。</p>

			<h2><strong>发展历史</strong></h2>
			<p>HTML 5草案的前身名为Web Applications 1.0，是在2004年由WHATWG提出。2008年1月22日，第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作，仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</p>
			<p>2014年10月28日，W3C正式发布HTML5.0推荐标准。</p>
			<img src="/newSpaperSystem/Application/Home/View/public/img/logo.png" alt="">
			<h3><strong>标准化进程</strong></h3>
			<p>2004年6月，Mozilla基金会和Opera软件公司在万维网联盟（W3C）所主办的研讨会上提出了一份联合建议书，这份提案主要针对该技术能向下兼容浏览器的同时，也可以扩展更多新技术[17]，其中Web Forms 2.0初步规范草案被提出，但因W3C已着力于XHTML的发展，故此建议书于8票赞成，14票反对下被否决[18]，这引起部分人的不满，不久后，一些厂商宣布成立网页超文本技术工作小组（WHATWG）组织，以继续推动该规范的开发工作，该组织再度提出Web Applications 1.0规范草案，后来这两种规范逐渐合并成今天的HTML5。2007年，获得W3C接纳，并成立了新的HTML工作团队。</p>
			<h3><strong>2014计划</strong></h3>
			<p>2012年9月，W3C提出计划要在2014年底前发布一个HTML5推荐标准，并在2016年底前发布HTML5.1推荐标准。</p>
			<h4><strong>核心HTML标准</strong></h4>
			<p>HTML5.0，HTML5.1和HTML5.2的合并时间表：</p>
			<table>
			  <thead>
				<tr>
				  <th></th>
				  <th>2012</th>
				  <th>2013</th>
				  <th>2014</th>
				  <th>2015</th>
				  <th>2016</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td>HTML 5.0</td>
				  <td>候选版</td>
				  <td>征求评价</td>
				  <td>推荐标准</td>
				  <td></td>
				  <td></td>
				</tr>
				<tr>
				  <td>HTML 5.1</td>
				  <td>第一工作草案</td>
				  <td></td>
				  <td>最后召集</td>
				  <td>候选版</td>
				  <td>推荐标准</td>
				</tr>
				<tr>
				  <td>HTML 5.2</td>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td>第一工作草案</td>
				  <td></td>
				</tr>
			  </tbody>
			</table>
			<h2>新应用程序接口（API）</h2>
			<p>除了原先的DOM接口，HTML5增加了更多样化的应用程序接口（API）：</p>
			<ul>
			  <li>
				即时二维绘图
				<ul>
				  <li>Canvas API：有关动态产出与渲染图形、图表、图像和动画的API</li>
				</ul>
			  </li>
			  <li>定时媒体播放</li>
			  <li>离线存储数据库（离线网络应用程序）</li>
			  <li>编辑</li>
			  <li>拖放</li>
			</ul>
		  </section>
		  <footer>
			<p class="pull-right text-muted">本文在知识共享 署名-相同方式共享 3.0协议之条款下提供。</p>
			<p class="text-important">本文节选自 Wikipedia HTML5 词条。</p>
			<ul class="pager pager-justify">
			  <li class="previous"><a target="_blank" href="#"><i class="icon-arrow-left"></i>上一章</a></li>
			  <li class="next disabled"><a target="_blank" href="#">下一章 <i class="icon-arrow-right"></i></a></li>
			</ul>
		  </footer>
		</article>
		<!--评论部分-->
		<div class="comments">
		  <footer>
			<div class="reply-form" id="commentReplyForm1">
			  <a href="###" class="avatar">
				<img src="/newSpaperSystem/Application/Home/View/public/img/back.png" />
			  </a>
			  <form class="form">
				<div class="form-group">
				  <textarea class="form-control new-comment-text" onpropertychange="MaxMe(this)" oninput="MaxMe(this)"  placeholder="撰写评论..."></textarea>
				</div>
				<a class="publish-comment">评论</a>
			  </form>
			</div>
		  </footer>
		</div>
		<div class="comment">
			<a href="###" class="avatar"><img src="/newSpaperSystem/Application/Home/View/public/img/back.png"></a>
			<div class="content">
				<div class="pull-right text-muted">3 个小时前</div>
				<div><a href="###"><strong>我</strong></a></div>
				<div class="text">今天玩的真开心！~~~~~~</div>
				<a href="##">编辑</a> &nbsp;<a class="del-comment">删除</a>
			</div>
		</div>
		<div class="comment">
		  <a href="###" class="avatar">
			<img src="/newSpaperSystem/Application/Home/View/public/img/back.png" />
		  </a>
		  <div class="content">
			<div class="pull-right text-muted">3 个小时前</div>
			<div><a href="###"><strong>张士超</strong></a></div>
			<div class="text">今天玩的真开心！~~~~~~</div>
			  <a href="##" class="reply">回复</a>
		  </div>
		  <div class="comments-list">
			<div class="comment">
			  <a href="###" class="avatar">
			<img src="/newSpaperSystem/Application/Home/View/public/img/back.png" />
			  </a>
			  <div class="content">
				<div class="pull-right text-muted">2 个小时前</div>
				<div><a href="###"><strong>我</strong></a> <span class="text-muted">回复</span> <a href="###">张士超</a></div>
				<div class="text">你到底把我家钥匙放哪里了...</div>
				<a href="##">编辑</a>
				<a href="##" class="del-comment">删除</a>
			  </div>
			  <div class="comments-list">
				<div class="comment">
				  <a href="###" class="avatar">
					<img src="/newSpaperSystem/Application/Home/View/public/img/back.png" />
				  </a>
				  <div class="content">
					<div class="pull-right text-muted">1 个小时前</div>
					<div><a href="###"><strong>门口大爷</strong></a> <span class="text-muted">回复</span> <a href="###">我</a></div>
					<div class="text">不在我这儿...</div>
					<a href="##" class="reply">回复</a>
				  </div>
				</div>
				<div class="comment">
				  <a href="###" class="avatar">
					<img src="/newSpaperSystem/Application/Home/View/public/img/back.png" />
				  </a>
				  <div class="content">
					<div class="pull-right text-muted">1 个小时前</div>
					<div><a href="###"><strong>队长</strong></a> <span class="text-muted">回复</span> <a href="###">Catouse</a></div>
					<div class="text">也不在我这儿...</div>
					<a href="##" class="reply">回复</a>
				  </div>
				</div>
			  </div>
			</div>
			<div class="comment">
			  <a href="###" class="avatar">
					<img src="/newSpaperSystem/Application/Home/View/public/img/back.png" />
			  </a>
			  <div class="content">
				<div class="pull-right text-muted">30 分钟前</div>
				<div><a href="###"><strong>华师大第一美女</strong></a> <span class="text-muted">回复</span> <a href="###">张士超</a></div>
				<div class="text">很开心~~~</div>
				<a href="##" class="reply">回复</a>
			  </div>
			</div>
		  </div>
		</div>
	</div>
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

	<script type='text/javascript' src='/newSpaperSystem/Application/Home/View/public/js/jquery.1.7.2.min.js' charset='utf-8'></script>
	<script type='text/javascript' src='/newSpaperSystem/Application/Home/View/public/js/zui.min.js' charset='utf-8'></script>
	<script type='text/javascript' src='/newSpaperSystem/Application/Home/View/public/js/login.js' charset='utf-8'></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#search-btn").click(function(){
			$("#searchbox").addClass("scale");
		});
		$("#close-btn").click(function(){
			$("#searchbox").removeClass("scale");
		});
	});
	</script>
  <script type="text/javascript">
	function MaxMe(o) {
	  o.style.height = o.scrollTop + o.scrollHeight + "px";//输入框随字数增加而改变
	}
  </script>
	<script>//评论
	//回复按钮点击之后添加文本框
	$(document).ready(function(){
		$(".reply").click(function(){
			var anwser="<div class='comments-list'>"
					+"<div class='comment'>"
					+'<div class=comments>'
					+'<footer>'
					+'<div class="reply-form" id="commentReplyForm1">'
					+'<a href="###" class="avatar">'
					+'<img src="/newSpaperSystem/Application/Home/View/public/img/back.png" />'
					+'</a>'
					+'<form class="form">'
					+'<div class="form-group">'
					+'<textarea class="form-control new-comment-text" onpropertychange="MaxMe(this)" oninput="MaxMe(this)"  placeholder="撰写评论..."></textarea>'
					+'</div>'
					+'<a href="#">评论</a>'
					+'</form>'
					+'</div>'
					+'</footer>'
					+'</div>'
					+'</div>'
					+'</div>';
			$(this).parent().after(anwser);
		});
	});
	//评论按钮点击之后添加文本框
	$(document).ready(function(){
		$(".publish-comment").click(function(){
			var comment="<div class='comment'>"
					+'<a href="###" class="avatar">'
					+'<img src="/newSpaperSystem/Application/Home/View/public/img/back.png" />'
					+'</a>'
					+'<div class="content">'
					+'<div class="pull-right text-muted">3 个小时前</div>'
					+'<div><a href="###"><strong>我</strong></a></div>'
					+'<div class="text">今天玩的真开心！~~~~~~</div>'
					+'<a href="##">编辑</a> &nbsp;<a class="del-comment">删除</a>'
					+'</div>'
					+'</div>';
			$(this).closest(".comments").after(comment);
		});
	});
	//删除按钮点击之后添加文本框
	$(document).ready(function () {
		$(".del-comment").click(function () {
			var commentDel='<div class="content">'
					+'<div class="pull-right text-muted">3 个小时前</div>'
					+'<div><a href="###"><strong>我</strong></a></div>'
					+'<div class="text">该评论已删除</div>'
					+'</div>';
			$(this).parent().after(commentDel);
			$(this).parent().remove();
		})
	});
	</script>
	<!--[if lt IE 9]>
	  <script type='text/javascript' src="/newSpaperSystem/Application/Home/View/public/lib/ieonly/html5shiv.js"></script>
	<![endif]-->
	<!--[if lt IE 9]>
	  <script type='text/javascript' src="/newSpaperSystem/Application/Home/View/public/lib/ieonly/respond.js"></script>
	<![endif]-->
	<!--[if lt IE 9]>
	  <script type='text/javascript' src="/newSpaperSystem/Application/Home/View/public/lib/ieonly/excanvas.js"></script>
	<![endif]-->
</body>
</html>