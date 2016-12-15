<?php
try{
	session_start();
	unset($_SESSION['uid']);
	echo json_encode(array('code'=>0, 'msg'=>'success'));
}catch(Exception $e){
	$code = $e->getCode() ? $e->getCode() : 404;
	echo json_encode(array('code'=>$code, 'msg'=>$e->getMessage()));
}
exit;