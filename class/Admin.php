<?php /**
 * 
 */
class Admin extends Connection
{
	
	function __construct()
	{
		parent::__construct();
		parent::getConnection();
	}

	function isAdmin($email){
		$res=$this->conn->prepare("SELECT isAdmin from customers where email like ? and isAdmin like '1'");
		$res->bindparam(1,$email);
		$res->execute();

		while ($row=$res->fetch()) 
			return true;

			return false;
		
	}

	function upload($price,$name,$kind,$img,$sex){
		$res=$this->conn->prepare("INSERT into products(price,name,kind_id,img,sex) values (?,?,(select id from collection where kind like ?),?,?)");
		$res->bindparam(1,$price);
		$res->bindparam(2,$name);
		$res->bindparam(3,$kind);
		$res->bindparam(4,$img);
		$res->bindparam(5,$sex);

		$res->execute();
	}

	function checkImg(){
		$target_dir = "img/products/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

	$problems=array();
	


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
    	if($check[0]==900&&$check[1]==1200){
    		array_push($problems, "900*1200 méret az elfogadott a képnél!");
    	}
    } else {
        array_push($problems, "Csak képet lehet feltölteni!");
        
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    array_push($problems, "Ez a kép már fel van töltve!");
    
}

// Allow certain file formats

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   array_push($problems, "Csak jpg, png, jpeg, gif formátum támogatott!");
    
}

// if everything is ok, try to upload file
	if(count($problems)==0){
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
       return 0;
   		}
    } else {
       return $problems;
    }

	}

} ?>