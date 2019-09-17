<?php /**
 * 
 */
class Connection
{
	protected $user;
	protected $pwd;
	protected $host;
	protected $dbname;
	protected $conn;

	function __construct()
	{
		$this->user="root";//Clothe
		$this->pwd="";//asdasd
		$this->host="localhost";//127.0.0.1
		$this->dbname="clothe";
	}

	function getConnection(){
		try {
			$this->conn=new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->pwd);
			$this->conn->exec("set names utf8");
		} catch (PDOException $e) {
			throw new Exception("Az adatbázissal való kapcsolódás sikertelen.");
		}
	}
} ?>