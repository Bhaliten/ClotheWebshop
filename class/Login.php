<?php /**
 * 
 */
class Login extends Connection
{
	
	function __construct()
	{
		parent::__construct();
		parent::getConnection();
	}

	function check($email,$pwd){
		$pwd=sha1($pwd);
		$res=$this->conn->prepare("SELECT email from customers where email like ? and pwd like ?");
		$res->bindparam(1,$email);
		$res->bindparam(2,$pwd);
		$res->execute();

		while ($row=$res->fetch())
			return true;

			return false; 

	}
} ?>