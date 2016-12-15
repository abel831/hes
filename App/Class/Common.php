<?php
/**
* 
*/
class Common
{
	
	function __construct()
	{
		session_start();
		if (!isset($_SESSION['uid']) || !isset($_SESSION['id'])) throw new Exception('请先登录.', 400);
		return true;
	}
}