<?php
require_once('../database/Database.php');
require_once('../interface/iLosts.php');
class Losts extends Database implements iLosts {

  public function new_sales($generic,$gram,$type,$qty,$department,$someone,$price)
	{
		$sql = "INSERT INTO sales(generic_name,gram,type,qty,department,someone,price)
				VALUES(?,?,?,?,?,?,?);";
		return $this->insertRow($sql, [$generic,$gram,$type,$qty,$department,$someone,$price]);
	}//end new_sales

	public function daily_sales($date)
	{
		// $sql = "SELECT *
		// 		FROM sales
		// 		WHERE DATE(`date_sold`) = ?";
		$sql = "SELECT *
				FROM sales";
		return $this->getRows($sql, [$date]);
	}//end daily_sales
}//end class
$sales = new Losts();
