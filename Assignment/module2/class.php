<?php
class Car
{
	public $model;
	public $year;
	
	public function getDetail($m,$y="12/02/25")
	{
		$this->model=$m;
		$this->year=$y;
	}
	public function Display()
	{
		return "Model: " . $this->model . ", Year: " . $this->year;
	}
}
$obj=new Car();
$obj->getDetail('pgen');
echo $obj->Display();
?>