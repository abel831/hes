<?php
try{
	$n_id = isset ($_REQUEST["n_id"])?$_REQUEST["n_id"]:'';
	$type = isset ($_REQUEST["type"])?$_REQUEST["type"]:'';
	$count = isset ($_REQUEST["count"])?$_REQUEST["count"]:'5';
	$page = isset ($_REQUEST["page"])?$_REQUEST["page"]:'1';
	$orderby = isset ($_REQUEST["orderby"])?$_REQUEST["orderby"]:'desc';
	$room_id = isset ($_REQUEST["room_id"])?$_REQUEST["room_id"]:'';

	if ($type == '') throw new Exception('type不可空.',400);

	require_once '../../Class/Documents.php';

	$document = new Documents();
	$data = $document->getContent($type, $n_id, $count, $page, $orderby, $room_id);

	echo json_encode(array('code'=>0, 'msg'=>$data));
}catch(Exception $e){
	$code = $e->getCode() ? $e->getCode() : 404;
	echo json_encode(array('code'=>$code, 'msg'=>$e->getMessage()));
}
exit;