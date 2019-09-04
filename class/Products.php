<?php /**
 * 
 */
class Products extends Connection
{
	
	function __construct()
	{
		parent::__construct("root","","localhost","clothe");
		parent::getConnection();
	}

	function getAllMen(){
		$res=$this->conn->prepare("select * from products where sex like 'men'");
		$res->execute();
		$array=array();

			while ($row=$res->fetch()) 
				array_push($array, $row);
			
		return $array;
	}

	function getAllWomen(){
		$res=$this->conn->prepare("select * from products where sex like 'women'");
		$res->execute();
		$array=array();

			while ($row=$res->fetch()) 
				array_push($array, $row);
			
		return $array;
	}
} ?>