<?php /**
 * 
 */
class SetOrder extends Connection
{
	
	function __construct()
	{
		parent::__construct();
		parent::getConnection();
	}

	function uploadOrder($email){
		$res=$this->conn->prepare("INSERT into orders(customers_id,date,time) values ((select id from customers where email like ?),?,?)");
		$res->bindparam(1,$email);
			$date=date("Y-m-d");
		$res->bindparam(2,$date);
			$time=date("H:i:s");
		$res->bindparam(3,$time);

		$res->execute();
	}

	function uploadItems($products,$sizes){
		$res=$this->conn->prepare("INSERT into items(orders_id,products_id,size) values ((SELECT max(id) FROM orders),?,?)");

		for ($i=0; $i < count($products); $i++) { 
			$res->bindparam(1,$products[$i]);
			$res->bindparam(2,$sizes[$i]);
			$res->execute();
		}
	}

} ?>