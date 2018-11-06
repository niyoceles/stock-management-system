<?php
require_once('../database/Database.php');
require_once('../interface/iItem.php');
class Item extends Database implements iItem {
	public function all_items()
	{
		$sql = "SELECT *
				FROM item i 
				INNER JOIN item_type it 
				ON i.item_type_id = it.item_type_id
				ORDER BY i.item_name ASC";
		return $this->getRows($sql);
	}//end all_items
	
	public function get_item($item_id)
	{
		$sql = "SELECT *
				FROM item
				WHERE item_id = ?";
		return $this->getRow($sql, [$item_id]);
	}//end edit_item

	public function add_item($iCode, $iName, $iDepart, $iPrice, $type_id,  $description)
	{
		$sql = "INSERT INTO item(code, item_name, depart, item_price, item_type_id, item_description)
				VALUES(?, ?, ?, ?, ? ,?)";
		return $this->insertRow($sql, [$iCode, $iName, $iDepart, $iPrice, $type_id, $description]);
	}//end add_item

	public function edit_item($item_id, $iCode, $iName, $iDepart, $iPrice,  $type_id, $description)
	{
		$sql = "UPDATE item 
				SET  code = ?, item_name = ?, depart = ?, item_price = ?, item_type_id = ?, item_description = ?
				WHERE item_id = ?";
		return $this->updateRow($sql, [$iCode, $iName, $iDepart, $iPrice, $type_id, $description, $item_id]);
	}//end edit_item
}//end class Item

$item = new Item();

/* End of file Item.php */
/* Location: .//D/xampp/htdocs/regis/class/Item.php */