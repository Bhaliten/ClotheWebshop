<?php /**
 * 
 */
class Basket extends Connection
{
	
	function __construct()
	{
		parent::__construct();
		parent::getConnection();
	}

	function getProducts($id){
		$res=$this->conn->prepare("select * from products where id like ?");
		$res->bindparam(1,$id);
		$res->execute();

		 return $res->fetch();
	}
} ?>