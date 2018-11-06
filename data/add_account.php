<?php 
require_once('../class/Account.php');
if(isset($_POST['iUsername']) && isset($_POST['iPassword'])){
	$iUsername = $_POST['iUsername'];
	$iPassword = md5($_POST['iPassword']);
	$iUsertype = $_POST['iUsertype'];
	$phone = $_POST['phone'];
	$iNames = $_POST['iNames'];
	$iUsername = strtolower($iUsername);
	$iPassword = strtolower($iPassword);
	$iUsername = ucwords(strtolower($iUsername));
	$phone = ucwords(strtolower($phone));
	$iNames = ucwords(strtolower($iNames));

	$saveUser = $user->add_user($iUsername, $iPassword, $iUsertype, $iNames, $phone);
	if($saveUser){
		$return['valid'] = true;
		$return['msg'] = "New Record Added Successfully!";
	}else{
		$return['valid'] = false;
	}
	echo json_encode($return);
}//end isset

$user->Disconnect();