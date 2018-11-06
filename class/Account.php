<?php
require_once('../database/Database.php');
require_once('../interface/iAccount.php');
class Account extends Database implements iAccount {
	public function all_users()
	{
		$sql = "SELECT *
				FROM user ORDER BY user_account ASC";
		return $this->getRows($sql);
	}//end all_users
	
	public function get_user($user_id)
	{
		$sql = "SELECT *
				FROM user
				WHERE user_id = ?";
		return $this->getRow($sql, [$user_id]);
	}//end edit_item

	public function add_user($user_account, $user_pass, $type_id,  $names, $phone)
	{
		$sql = "INSERT INTO user(user_account, user_pass, user_type, names, phone)
				VALUES(?, ?, ?, ?, ?)";
		return $this->insertRow($sql, [$user_account, $user_pass, $type_id, $names, $phone]);
	}//end add_item

	public function edit_user($user_id, $user_account, $user_pass, $type_id, $names, $phone)
	{
		$sql = "UPDATE user 
				SET user_account = ?, user_pass = ?, user_type = ?, names = ?, phone = ?
				WHERE user_id = ?";
		return $this->updateRow($sql, [$user_account, $user_pass, $type_id, $names, $phone, $user_id]);
	}//end edit_item
}//end class Item

$user = new Account();

/* End of file Item.php */
/* Location: .//D/xampp/htdocs/regis/class/Item.php */