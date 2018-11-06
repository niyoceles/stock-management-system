<?php 
interface iItem{
	public function all_items();
	public function get_item($item_id);
	public function add_item($iCode, $iName, $iDepart, $iPrice, $type_id, $description);
	public function edit_item($item_id, $iCode, $iName, $iDepart, $iPrice, $type_id, $description);
}//end iItem