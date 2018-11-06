<?php 
require_once('../class/Item.php');
if(isset($_POST['iName']) && isset($_POST['iPrice'])){
	$iName = $_POST['iName'];
	$iCode = $_POST['iCode'];
	$iDepart = $_POST['iDepart'];
	$iPrice = $_POST['iPrice'];
	$iType = $_POST['iType'];
	$description = $_POST['description'];
	$iName = strtolower($iName);
	$iCode = strtolower($iCode);
	$iDepart = ucwords(strtolower($iDepart));
	$iPrice = strtolower($iPrice);
	$iName = ucwords(strtolower($iName));
	$description = ucwords(strtolower($description));

	$saveItem = $item->add_item($iCode, $iName, $iDepart, $iPrice, $iType, $description);
	if($saveItem){
		$return['valid'] = true;
		$return['msg'] = "New Record Added Successfully!";
	}else{
		$return['valid'] = false;
	}
	echo json_encode($return);
}//end isset

$item->Disconnect();