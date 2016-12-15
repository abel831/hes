<?php
include_once('Common.php');
class Documents extends Common
{
	public function create($type, $title, $content, $status, $room_id)
	{
		$configPath = '../../../etc/config.ini';
		require_once 'DB.php';
		$now = date('Y-m-d H:i:s', time());
		$link=new DB($configPath);
		$id = $_SESSION['id'];
		$data = array(
			'user_id' => $id,
			'type' => $type,
			'title' => $title,
			'content' => $content,
			'status' => $status,
			'room_id' => $room_id,
			'create_at' => $now,
			'update_at' => $now
		);
		$inter = $link->insert('news', $data);
		if (!$inter) throw new Exception('提交失败.', 400);
		return $inter;
		echo 111;
	}
}