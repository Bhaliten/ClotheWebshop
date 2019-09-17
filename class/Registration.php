<?php /**
 * 
 */
class Registration extends Connection
{
	
	function __construct()
	{
		parent::__construct();
		parent::getConnection();
	}

	function existsEmail($email){
		$res=$this->conn->prepare("SELECT email from customers where email like ?");
		$res->bindparam(1,$email);
		$res->execute();

		while ($row=$res->fetch()) 
			return true;
			
			return false;
	}

	function upload($name,$mobile,$city,$street,$number,$email,$pwd){
		if($pwd==""||$pwd==null)
			$pwd="";
		else
			$pwd=sha1($pwd);

		$res=$this->conn->prepare("INSERT into customers(name,phone,city,street,street_num,email,pwd) values (?,?,?,?,?,?,?)");
		$res->bindparam(1,$name);
		$res->bindparam(2,$mobile);
		$res->bindparam(3,$city);
		$res->bindparam(4,$street);
		$res->bindparam(5,$number);
		$res->bindparam(6,$email);
		$res->bindparam(7,$pwd);
		$res->execute();
	}
} ?>