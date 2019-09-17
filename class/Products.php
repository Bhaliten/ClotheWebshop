<?php /**
 * 
 */
class Products extends Connection
{
	
	function __construct()
	{
		parent::__construct();
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
		return $this->stock("SELECT * from products where sex like 'men'");
	}
	function getAllWomen(){
		return $this->stock("SELECT * from products where sex like 'women'");
	}
	function getAllKind(){
		return $this->stock("SELECT distinct kind from products inner join collection on products.kind_id=collection.id");
	}
	function getMinPrice(){
		return $this->stock("SELECT min(price) as min from products");
	}
	function getMaxPrice(){
		return $this->stock("SELECT max(price) as max from products");
	}
} ?>