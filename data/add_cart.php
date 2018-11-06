<?php 
require_once('../class/Cart.php');
require_once('../class/Stock.php');
if(isset($_POST['stock_id'])){
	$stock_id = $_POST['stock_id'];
	$item_id = $_POST['item_id'];
	$cqty = $_POST['cqty'];//cart qty
	$cdep = $_POST['cdep'];//cart department
	$csom = $_POST['csom'];//cart someone taken 
	$user_id = $_SESSION['logged_id'];
	$nqty = $_POST['nqty'];//cart qty 
	$uniqid = $_SESSION['uniqid'];
	//add to cart
	$saveToCart = $cart->add_toCart($item_id, $cqty, $cdep, $csom, $stock_id, $user_id, $uniqid);

	//update stock og minus si sa cart qty
	$updateStockQty = $stock->update_stockQty($stock_id, $nqty);

}//end isset
$cart->Disconnect();