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

	function stock($sql){
		$res=$this->conn->prepare($sql);
		$res->execute();
		$array=array();

			while ($row=$res->fetch()) 
				array_push($array, $row);
			
		return $array;
	}

	function getAllMen(){
		return $this->stock("select * from products where sex like 'men'");
	}
	function getAllWomen(){
		return $this->stock("select * from products where sex like 'women'");
	}
	function getAllKind(){
		return $this->stock("select distinct kind from products inner join collection on products.kind_id=collection.id");
	}
	function getMinPrice(){
		return $this->stock("select min(price) as min from products");
	}
	function getManPrice(){
		return $this->stock("select max(price) as max from products");
	}
} ?>