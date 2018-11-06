<?php 
require_once('../class/Item.php');
if(isset($_POST['item_id'])){
	$item_id = $_POST['item_id'];
	$iCode = $_POST['iCode'];
	$iDepart = $_POST['iDepart'];
	$iName = $_POST['iName'];
	$iPrice = $_POST['iPrice'];
	$iType = $_POST['iType'];
	$description = $_POST['description'];
	$saveEdit = $item->edit_item($item_id, $iCode, $iName, $iDepart, $iPrice, $iType, $description);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Edit Successfully!";
	}
	echo json_encode($return);
}//end isset
$item->Disconnect();
