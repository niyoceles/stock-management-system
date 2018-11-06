<?php 
interface iLosts{
	public function new_sales($generic, $gram, $type, $qty, $department, $someone, $price);
	public function daily_sales($date);
}
