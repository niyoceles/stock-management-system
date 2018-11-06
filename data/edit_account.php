<?php 
require_once('../class/Account.php');
if(isset($_POST['user_id'])){
	$user_id = $_POST['user_id'];
	$iUsername = $_POST['iUsername'];
	$iPassword = md5($_POST['iPassword']);
	$iUsertype = $_POST['iUsertype'];
	$iNames = $_POST['iNames'];
	$phone = $_POST['phone'];
	$saveEdit = $user->edit_user($user_id, $iUsername, $iPassword, $iUsertype, $iNames, $phone);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Edit Successfully!";
	}
	echo json_encode($return);
}//end isset
$user->Disconnect();
