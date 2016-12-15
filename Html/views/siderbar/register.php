<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/Html/css/register.css"> 
    <title>注册页面</title>
</head>
<body>
    <div class="bd">
       <form class="form">
            <div>
                <span class="gray">（所有栏目均为必填）</span>    
            </div>
            <div class="input">
               <label for="uid">手&nbsp;机&nbsp;号：</label>
               <input id="uid"  name="uid" placeholder="11位手机号">
           </div>
           <div class="input">
                <span>(将作为用户名)</span>
                <span class="uid_err red"></span>
           </div>
           <div class="input">
               <label for="name">姓&nbsp;&nbsp;&nbsp;名：</label>
               <input id="name" name="name" placeholder="6个字之内">
           </div>
           <div class="input">
                 <span class="name_err red"></span>
           </div>
           <div id="sex">
               <span>性&nbsp;&nbsp;&nbsp;别：</span>
               <input type="radio" value="1" id="sex1" name="sex">男
               <input type="radio" value="2" id="sex2" name="sex">女
           </div>
           <div class="input">
              <span class="sex_err red"></span>
           </div>
           <div class="input">
               <label for="age">年&nbsp;&nbsp;&nbsp;龄：</label>
               <input id="age"  name="age">
           </div>
           <div class="input">
              <span class="age_err red"></span>
           </div>
           <div class="input">
               <label for="position">职&nbsp;&nbsp;&nbsp;称：</label>
               <select id="position" name="position">
                   <option name="position" value="0">请选择</option>
                   <option name="position" value="1">护士</option>
                   <option name="position" value="2">护师</option>
                   <option name="position" value="3">主管护师</option>
                   <option name="position" value="4">副主任护师</option>
                   <option name="position" value="5">主任护师</option>
               </select>
           </div>
           <div class="input">
              <span class="position_err red"></span>
           </div>
           <div class="input">
               <label for="room">科&nbsp;&nbsp;&nbsp;室：</label>
               <select id="room" name="room">
                    <option value="0">请选择</option>
                    <option value="1">急诊科</option>
                    <option value="2">内科</option>
                    <option value="3">外科</option>
                    <option value="4">儿科</option>
                    <option value="5">妇产科</option>
               </select>
           </div>
            <div class="input">
              <span class="room_err red"></span>
            </div>
            <div class="input">
               <label for="password">密&nbsp;&nbsp;&nbsp;码：</label>
               <input type="password" id="password" name="password">
           </div>
            <div class="input">
              <span class="password_err red"></span>
            </div>
           <div class="input">
               <label for="tpassword">&nbsp;确认密码：</label>
               <input type="password" id="tpassword" name="tpassword">
           </div>
            <div class="input">
              <span class="tpassword_err red"></span>
            </div>
           <div class="input">
               <label for="email">邮&nbsp;&nbsp;&nbsp;箱：</label>
               <input id="email" name="email" >
           </div>
           <div class="input">
              <span class="email_err red"></span>
            </div>
           <div>
               <label for="code">验&nbsp;证&nbsp;码：</label>
               <input type="text" id="code" class="code_txt" name="code">
               <span class="code_num"></span>
               <input type="button" value="重新获取" class="code_obt" onclick="getcode()">
           </div>
           <div class="input">
             <span class="code_err red"></span>
           </div>
           <div>
              <input type="button" value="提交" class="sub" onclick="sub()">
           </div>
       </form>
    </div>
<script src="/Html/js/jquery-1.11.3.js"></script>
<script src="/Html/js/register.js"></script>
</body>
</html>