<?php
require_once('../database/Database.php');
require_once('../interface/iType.php');
class Type extends Database implements iType {

	public function all_typeList()
	{
		$sql = "SELECT *
				FROM item_type
				ORDER BY item_type_id ASC"; //I REPLACED BY ORDER TO GROUP
		return $this->getRows($sql, [0]);
	}//end all_typeList

	public function get_typeList($item_type_id) {
		$sql = "SELECT *
				FROM item_type
				WHERE item_type_id = ?";
		return $this->getRow($sql, [$item_type_id]);
	}//end get_typelist

	public function del_typeList($item_type_id)
	{
		$sql = "DELETE FROM item_type 
				WHERE item_type_id = ?";
		return $this->deleteRow($sql, [$item_type_id]);
	}//end del_typeList

	public function add_type($item_type_desc)
	{
		$sql = "INSERT INTO item_type (item_type_desc)
				VALUES(?)";
		// return true;
		return $this->insertRow($sql, [$item_type_desc]);
	}//end add_type


}//end class Stock
$type = new Type();
/* End of file Stock.php */
/* Location: .//D/xampp/htdocs/celes/class/Stock.php */