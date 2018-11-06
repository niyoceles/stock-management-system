<?php 
require_once('../class/Account.php');
if(isset($_POST['user_id'])){
	$user_id = $_POST['user_id'];
	$userDetails = $user->get_user($user_id);
	$return['title'] = "Edit Account";
	$return['event'] = "edit";
	if($userDetails > 0){
		$return['username'] = $userDetails['user_account'];
		$return['password'] = $userDetails['user_pass'];
		$return['user_id'] = $userDetails['user_id'];
		$return['names'] = $userDetails['names'];
		$return['phone'] = $userDetails['phone'];
		$return['user_type'] = $userDetails['user_type'];
	}
	echo json_encode($return);	
	
}//end isset

$user->Disconnect();