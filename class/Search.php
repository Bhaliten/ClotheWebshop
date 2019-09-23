<?php /**
 * 
 */
class Search extends Connection
{
	protected $kind;
	protected $min;
	protected $max;
	protected $sex;

	function __construct($kind,$min,$max,$sex)
	{
		parent::__construct();
		parent::getConnection();
		if($kind=="Mind")
			$kind="%%";
		$this->kind=$kind;
		$this->min=$min;
		$this->max=$max;
		$this->sex=$sex;
	}

	function getProducts(){
		$res=$this->conn->prepare("select products.id as 'id', name, price, img from products inner join collection on products.kind_id=collection.id where kind like ? and price>=? and price<=? and sex like ?");
		$res->bindparam(1,$this->kind);
		$res->bindparam(2,$this->min);
		$res->bindparam(3,$this->max);
		$res->bindparam(4,$this->sex);
		$res->execute();

		$array=array();

			while ($row=$res->fetch()) 
				array_push($array, $row);

		return $array;
			
	}
} ?>