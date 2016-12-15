<?php
try{
	$type = isset ($_REQUEST["type"])?$_REQUEST["type"]:'';
	$title = isset ($_REQUEST["title"])?$_REQUEST["title"]:'';
	$content = isset ($_REQUEST["content"])?$_REQUEST["content"]:'';
	$room_id = isset ($_REQUEST["room_id"])?$_REQUEST["room_id"]:'';

	// require_once '../../Class/DB.php';
	require_once '../../Class/Documents.php';

	$document = new Documents();
	$create = $document->create($type, $title, $content, 2, $room_id);

	echo json_encode(array('code'=>0, 'msg'=>$create));
}catch(Exception $e){
	$code = $e->getCode() ? $e->getCode() : 404;
	echo json_encode(array('code'=>$code, 'msg'=>$e->getMessage()));
}
exit;