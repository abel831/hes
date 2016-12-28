<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/Html/css/index.css">
  <title>首页</title>
 </head>
 <body>
 	<!-- 广告图 -->
  	<div id="slider_box">
  		<div class="slider">
  			<img src="/Public/img/timg.jpg">
  		</div>
  		<div class="clear"></div>
  	</div>
  	<div id="section">
  		<div id="news" class="lt">
  			<p>
  				<a href="#">新闻</a>
  			</p>
  		</div>
  		<div id="notice" class="lt">
  			<p>
  				<a href="#">公告</a>
  			</p>
  		</div>
  		<div id="mien" class="lt">
  			<p>
  				<a href="#">医院风采</a>
  			</p>
  		</div>
  		<div id="plan" class="lt">
  			<p>
  				<a href="#">活动计划</a>
  			</p>
  		</div>
  		<div class="news_notice_content lt">
  			<ul>
  				<li>1</li>
  				<li>2</li>
  				<li>3</li>
  				<li>4</li>
  			</ul>
  		</div>
  		<div class="mien_content lt">
  			<ul>
  				<li>1 医院风采1</li>
  				<li>2 医院风采2</li>
  				<li>3 医院风采3</li>
  				<li>4 医院风采4</li>
  			</ul>
  		</div>
  		<div class="mien_content lt">
  			<ul>
  				<li>1</li>
  				<li>2</li>
  				<li>3</li>
  				<li>4</li>
  			</ul>
  		</div>
  		<div class="clear"></div>
  	</div>
 </body>
</html>
<!--
<?php
/*
// $self = $_SERVER['PHP_SELF'];
session_start();
// unset($_SESSION['uid']);
// session_unset('uid');exit;
// $_SESSION['uid'] = 13581555753;exit;
// echo $_SESSION['uid'];exit;
$checkuser = isset($_SESSION['uid']) ? $_SESSION['uid'] : false;
if (!$checkuser) {
	include('../Html/views/user/signin.php');
} else {
	// include('../Html/views/siderbar/signin.php');
	echo 1234567890;
}
*/