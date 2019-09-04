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

	function __construct($user,$pwd,$host,$dbname)
	{
		$this->user=$user;
		$this->pwd=$pwd;
		$this->host=$host;
		$this->dbname=$dbname;
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