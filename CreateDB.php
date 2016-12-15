<?php
header("Content-Type: text/html;charset=utf-8"); 
$configPath = 'etc/config.ini';
$configArray = parse_ini_file($configPath, true);
$redishost = array();
if ($configArray === false) {
    $json = json_encode(array ("msg"=>"配置文件读取失败"));
    $json = isset ($_GET['callback']) ? "{$_GET['callback']}($json)" : $json;
    echo $json;
    exit;
} else {
    $database = isset ($configArray['mysql'] ['DATABASE'])?$configArray['mysql'] ['DATABASE']:'';
    $host = isset ($configArray['mysql'] ['HOST'])?$configArray['mysql'] ['HOST']:'';
    $user = isset ($configArray['mysql'] ['USER'])?$configArray['mysql'] ['USER']:'';
    $password = isset ($configArray['mysql'] ['PASSWORD'])?$configArray['mysql'] ['PASSWORD']:'';
}

$con = mysqli_connect($host,$user,$password);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
// Create database
if (!mysqli_query($con, "CREATE DATABASE ".$database." CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'")) {
  echo "创建库失败";
  exit;
}
mysqli_select_db($con, $database);
//user表
$sql = "CREATE TABLE user 
(
id int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
uid varchar(11),
name varchar(15) COMMENT '姓名',
sex tinyint(4) COMMENT '性别 1.男2.女3.保密',
age int(2) COMMENT '年龄',
position_id tinyint(4) COMMENT '职称',
room_id tinyint(4) COMMENT '科室',
password varchar(15) COMMENT '密码',
email varchar(30) COMMENT '邮箱',
status tinyint(4) COMMENT '状态 1.正常2.注销4.删除',
create_at datetime,
update_at datetime
) DEFAULT CHARSET=utf8";
mysqli_query($con, $sql);

//position表
$sql = "CREATE TABLE positions
(
id int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
title varchar(20) COMMENT '职称名称',
status tinyint(4) COMMENT '状态 1.正常4.删除'
)DEFAULT CHARACTER SET utf8";
mysqli_query($con, $sql);

//room表
$sql = "CREATE TABLE rooms
(
id int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
title varchar(20) COMMENT '科室名称',
status tinyint(4) COMMENT '状态 1.正常4.删除'
)DEFAULT CHARACTER SET utf8";
mysqli_query($con, $sql);

//news表
$sql = "CREATE TABLE news 
(
id int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
user_id int,
type tinyint(4) COMMENT '类型 1.新闻2.公告',
title varchar(20) COMMENT '标题',
content text COMMENT '内容',
status tinyint(4) COMMENT '状态 1.正常2.待审核4.审核未通过5.已删除',
create_at datetime,
update_at datetime
)DEFAULT CHARACTER SET utf8";
mysqli_query($con, $sql);

//plan表
$sql = "CREATE TABLE plans 
(
id int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
room_id int,
type tinyint(4) COMMENT '类型 1.首页显示2.不显示',
title varchar(20) COMMENT '标题',
content text COMMENT '内容',
place varchar(20) COMMENT '地点',
date datetime COMMENT '时间',
status tinyint(4) COMMENT '状态 1.正常4.已删除',
create_at datetime,
update_at datetime
)DEFAULT CHARACTER SET utf8";
mysqli_query($con, $sql);
sleep(10);
mysqli_close($con);

echo 'DB "hes" Created!';