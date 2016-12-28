<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/Html/css/Article/notice.css">
  <title>公告发布</title>
 </head>
 <body>
 	<form action="">
	 	<div class="header">
	 	 	<h1>新闻/公告 发布</h1>
	 	</div>
	 	<div class="content">
	 		<label for="title">标题</label>
	 	 	<input type="text" id="title" name="title">
	 	</div>
	 	<div class="content">
	 	 	<label for="type">类型</label>
	 	 	<select id="type" name="type">
	 	 		<option value="0">-- 请选择 --</option>
	 	 		<option value="1">新闻</option>
	 	 		<option value="2">公告</option>
	 	 	</select>
	 	 </div>
	 	 <div class="content">
	 	 	<label for="room">科室</label>
	 	 	<select id="room" name="room">
	 	 		<option value="0">-- 请选择 --</option>
	 	 		<option value="1">急诊科</option>
	 	 		<option value="2">内科</option>
	 	 		<option value="3">外科</option>
	 	 		<option value="4">儿科</option>
	 	 		<option value="5">妇产科</option>
	 	 	</select>
	 	 </div>
	 	 <div class="content">
	 	 	<div>
	 	 		<label for="content_txt">内容</label>
	 	 	</div>
	 	 	<textarea id="content_txt"></textarea>
	 	 </div>
	 	 <div class="sub">
	 	 	<input type="button" value="提交" click="">
	 	 </div>
 	</form>
 	

 <script type="text/javascript" src="/Html/js/jquery-1.11.3.js"></script>
 <script type="text/javascript" src="/Html/js/Article/notice.js"></script>
 </body>
</html>
