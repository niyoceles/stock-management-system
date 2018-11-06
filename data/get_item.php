<?php 
require_once('../class/Item.php');
if(isset($_POST['item_id'])){
	$item_id = $_POST['item_id'];
	$itemDetails = $item->get_item($item_id);
	$return['title'] = "Edit Item";
	$return['event'] = "edit";
	if($itemDetails > 0){
		$return['code'] = $itemDetails['code'];
		$return['depart'] = $itemDetails['depart'];
		$return['name'] = $itemDetails['item_name'];
		$return['price'] = $itemDetails['item_price'];
		$return['id'] = $itemDetails['item_id'];
		$return['description'] = $itemDetails['item_description'];
		$return['type'] = $itemDetails['item_type_id'];
	}
	echo json_encode($return);	
	
}//end isset

$item->Disconnect();