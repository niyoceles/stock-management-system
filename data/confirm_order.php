<?php 
require_once('../class/Cart.php');
require_once('../class/Losts.php');

if(isset($_POST['cart_id'])){
	$cart_id = $_POST['cart_id'];

		    $cartDetail = $cart->get_cartList($cart_id);
			$generic = $cartDetail['item_name'];
			$gram = $cartDetail['item_description'];
			$type = $cartDetail['item_type_desc'];
			$cartQty = $cartDetail['cart_qty'];
			$department = $cartDetail['depart'];
			$someone = $cartDetail['someone'];
			$price = $cartDetail['item_price'];
			$insertSale = $sales->new_sales($generic, $gram, $type, $cartQty, $department, $someone, $price);
			$delCart =	$cart->del_cartList($cart_id);
			//insert to lost
	

		//del all cart
		// $delAllCart = $cart->dellAllCart();
		$return['valid'] = false;
		if($delCart && $insertSale){
			$return['valid'] = true;
			$return['msg'] = 'Losted Property was Saved Successfully!';
		}
		echo json_encode($return);
	}//end yes
	$sales->Disconnect();//close connection