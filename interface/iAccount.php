<?php 
interface iAccount{
	public function all_users();
	// public function myaccount();
	public function get_user($user_id);
	public function add_user($user_account, $user_pass, $type_id, $names, $phone);
	public function edit_user($user_id, $user_account, $user_pass, $type_id, $names, $phone);
}//end iItem