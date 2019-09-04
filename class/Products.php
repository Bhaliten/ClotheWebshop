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

	function getAllInfo(){
		$res=$this->conn->prepare("select * from products");
		$res->execute();
		$array=array();
		
			while ($row=$res->fetch()) 
				array_push($array, $row);
			
		return $array;
	}
} ?>