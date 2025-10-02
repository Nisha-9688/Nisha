<?php
class demo
{
	private $a=10;
	
	public function setName($b)
	{
		if(!empty($b))
		{
			$this->a=$b;
		}
		else
		{
			echo "Value a is not access";
		}
		
	}
	public function getName()
	{
		return $this->a;
	}
}
$obj=new demo();
$obj->setName("hello");
echo "Value of a=".$obj->getName();
?>