<?php 
//add to expired table before e delete sa type table
require_once('../class/Expired.php');
require_once('../class/Type.php');
if(isset($_POST['item_type_id'])){
	$item_type_id = $_POST['item_type_id'];

	$delType =	$type->del_typeList($item_type_id);
	$return['valid'] = false;
	if($delType){
		$return['valid'] = true;
		$return['msg'] = "Remove Successfully!";
	}
	echo json_encode($return);
}//end isset

$type->Disconnect();//close connection
