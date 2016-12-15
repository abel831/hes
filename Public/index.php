<?php
// $self = $_SERVER['PHP_SELF'];
session_start();
// unset($_SESSION['uid']);
// session_unset('uid');exit;
// $_SESSION['uid'] = 13581555753;exit;
// echo $_SESSION['uid'];exit;
$checkuser = isset($_SESSION['uid']) ? $_SESSION['uid'] : false;
if (!$checkuser) {
	include('../Html/views/siderbar/signin.php');
} else {
	// include('../Html/views/siderbar/signin.php');
	echo 1234567890;
}
