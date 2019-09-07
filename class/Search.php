<?php /**
 * 
 */
class Search extends Connection
{
	protected $kind;
	protected $min;
	protected $max;

	function __construct($kind,$min,$max)
	{
		parent::__construct("root","","localhost","clothe");
		parent::getConnection();
		if($kind=="Mind")
			$kind="%%";
		$this->kind=$kind;
		$this->min=$min;
		$this->max=$max;
	}

	function getProducts(){
		$res=$this->conn->prepare("select * from products inner join collection on products.kind_id=collection.id where kind like ? and price>=? and price<=?");
		$res->bindparam(1,$this->kind);
		$res->bindparam(2,$this->min);
		$res->bindparam(3,$this->max);
		$res->execute();

		$array=array();

			while ($row=$res->fetch()) 
				array_push($array, $row);

		return $array;
			
	}
} ?>