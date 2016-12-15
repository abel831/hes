<?php
try{
	$uid = isset($_REQUEST['uid']) ? $_REQUEST['uid'] : '';
	$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
	$sex = isset($_REQUEST['sex']) ? $_REQUEST['sex'] : '';
	$age = isset($_REQUEST['age']) ? $_REQUEST['age'] : '';
	$position_id = isset($_REQUEST['position_id']) ? $_REQUEST['position_id'] : '';
	$room_id = isset($_REQUEST['room_id']) ? $_REQUEST['room_id'] : '';
	$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
	$tpassword = isset ($_REQUEST["tpassword"])?$_REQUEST["tpassword"]:'';
	$email = isset ($_REQUEST["email"])?$_REQUEST["email"]:'';

	if ($uid == '' || $name == '' || $sex == '' || $age == '' || $position_id == '' || $room_id == '' || $password == '' || $tpassword == '' || $email == '') throw new Exception('缺少参数.');
	if (strlen($uid) != 11 || substr($uid, 0, 1) != 1) throw new Exception('请输入正确的手机号.');
	if (!is_numeric($uid)) throw new Exception('手机号必须是数字.');
	if (strlen($name) > 20) throw new Exception('用户名过长.');
	if (strlen($password) < 5 || strlen($tpassword) < 5) throw new Exception('密码不可少于5位.');
	if (strlen($password) > 15 || strlen($tpassword) > 15) throw new Exception('密码不可超过15位.');
	if ($password != $tpassword) throw new Exception('两次密码不一致.');
	$pattern='/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/';
	$checkemail = preg_match($pattern, $email);
	if (!$checkemail) throw new Exception('请输入正确的邮箱.');
	if (strlen($email) > 50) throw new Exception('邮箱过长，请更换邮箱.');

	$now = date('Y-m-d H:i:s', time());
	require_once '../Class/DB.php';
	$link=new DB();
	// print_r($link);exit;
	$check = $link->select('user', ['name', 'email'], ['uid'=>$uid]);
	if ($check) {
		echo json_encode(array('code'=>2, 'msg'=>'该用户已注册,请直接登录.'));
		exit;
	}
	$data = array(
		'uid' => $uid,
		'name' => $name,
		'sex' => $sex,
		'age' => $age,
		'position_id' => $position_id,
		'room_id' => $room_id,
		'password' => $password,
		'email' => $email,
		'create_at' => $now,
		'update_at' => $now
		);
	$inter = $link->insert('user', $data);
	if (!$inter) throw new Exception('提交失败.');
	echo json_encode(array('code'=>0, 'msg'=>'注册成功'));
}catch(Exception $e){
	echo json_encode(array('code'=>1, 'msg'=>$e->getMessage()));
}
exit;