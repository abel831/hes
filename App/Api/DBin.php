<?php
try{
	$now = date('Y-m-d H:i:s', time());
	require_once '../Class/DB.php';
	$link=new DB();
	$titleArr = array('急诊科', '内科', '外科', '儿科', '妇产科');
	foreach ($titleArr as $key => $value) {
		$data = array(
			'title' => $value,
			'status' => 1
			);
		$inter = $link->insert('rooms', $data);
	}
	if (!$inter) throw new Exception('提交失败1.');
	unset($titleArr, $key, $value, $inter, $data);
	$titleArr = array('护士', '护师', '主管护师', '副主任护师', '主任护师');
	foreach ($titleArr as $key => $value) {
		$data = array(
			'title' => $value,
			'status' => 1
			);
		$inter = $link->insert('positions', $data);
	}
	
	if (!$inter) throw new Exception('提交失败2.');
	echo json_encode(array('code'=>0, 'msg'=>'提交成功'));
}catch(Exception $e){
	echo json_encode(array('code'=>1, 'msg'=>$e->getMessage()));
}
exit;