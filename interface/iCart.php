<?php 
interface iCart{
	public function add_toCart($item_id, $qty, $dep, $som, $stock_id, $user_id, $uniqid);
	public function get_cartList($cart_id);
	public function del_cartList($cart_id);
	public function all_cartDatas($user_id);//filter by uniq ID
	public function delCart($cart_id);//delete cart 
	public function dellAllCart();
	public function allCart();
}//end iCart