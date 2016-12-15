<?php
try{
	$uid = isset ($_REQUEST["uid"])?$_REQUEST["uid"]:'';
	$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';

	if ($password == '' || $uid == '') throw new Exception('缺少参数.');
	if (strlen($uid) != 11 || substr($uid, 0, 1) != 1) throw new Exception('用户名错误.', 400);
	if (!is_numeric($uid)) throw new Exception('用户名错误.');
	if (strlen($password) > 15 || strlen($password) < 5) throw new Exception('密码错误.', 400);

	$now = date('Y-m-d H:i:s', time());
	require_once '../Class/DB.php';
	$data = array(
		'id',
		'uid',
		'name',
		'sex',
		'age',
		'position_id',
		'room_id',
		'email',
		'create_at'
		);
	$link=new DB();
	$check = $link->select('user', 'name', ['uid'=>$uid]);
	if (!$check) throw new Exception('请先注册再来登录.', 404);
	$res = $link->select('user', $data, ['AND'=>['password'=>$password, 'uid'=>$uid]]);
	if (!$res) throw new Exception('账号或密码错误.', 400);
	session_start();
	$_SESSION['uid'] = $uid;
	$_SESSION['id'] = $res[0]['id'];
	echo json_encode(array('code'=>0, 'msg'=>$res));
}catch(Exception $e){
	$code = $e->getCode() ? $e->getCode() : 404;
	echo json_encode(array('code'=>$code, 'msg'=>$e->getMessage()));
}
exit;