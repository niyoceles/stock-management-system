<?php 
interface iType {
	public function all_typeList();
	public function get_typeList($item_type_id);//get only 1 typelist
	public function del_typeList($item_type_id);
	public function add_type($item_type_desc);
}//end itype