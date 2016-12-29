<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/Html/css/Article/notice_content_examine.css">
  <title>文章内容审核</title>
 </head>
 <body>
  <div id="base">
    <div class="header">
      <h1>标题</h1>
    </div>
    <div class="title">
      <ul>
        <li class="room lt">科室：急诊科</li>
        <li class="author lt">作者：xxx</li>
        <li class="date rt">时间：2016-12-12</li>
      </ul>
    </div>
    <div class="content">
      <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos dicta quibusdam eius totam voluptatem facilis sed excepturi praesentium esse. Ipsum, doloremque omnis vel quam in sequi similique ullam dignissimos aut.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At repellat necessitatibus fugiat blanditiis libero labore commodi. Laudantium, pariatur, vero, eius, delectus tempora voluptates minima illo doloribus obcaecati consequuntur placeat provident.</span>
    </div>
    <div class="rdo">
      <input type="radio" id="pass" name="examine" value="1" checked>
      <label for="pass">通过</label>
      <input type="radio" id="unpass" name="examine" value="2">
      <label for="unpass">不通过</label>
    </div>
    <div class="txt">
      <textarea class="txt_content" placeholder="不通过原因"></textarea>
    </div>
    <div class="sub">
      <input type="button" value="提交">
    </div>
    <div class="clear"></div>
  </div>
  <script type="text/javascript" src="/Html/js/jquery-1.11.3.js"></script>
  <script type="text/javascript" src="/Html/js/Article/notice_content_examine.js"></script>
 </body>
</html>
