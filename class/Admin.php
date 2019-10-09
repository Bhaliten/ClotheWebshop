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



	function readCSV($csv){

		$prod=0;

	$file=fopen("csv/".$csv, "r");
    $need=array("price_novat", "code","sottocategorie", "picture 1", "categorie");
    feof($file);
   
    $splitted=fgetcsv($file);
    $location=array();


//begyűjtjük a szükséges oszlopok helyét
    foreach ($need as $v) {
        for ($i=0; count($splitted)>$i; $i++) { 
            similar_text($v, strtolower($splitted[$i]), $per);
            //A minimum 80%-ban hasonló oszlopnevekkel tud dolgozni
           if($per>80){
            array_push($location, $i);
            break;
            }
        }
    }


    $data=array();

   
    while (!feof($file)) {
       $splitted=fgetcsv($file);
      

       //Az utolsó 2 sor üres
       if(count($splitted)>3)
        if($splitted[0]!="MODEL"){//Mivel csak a termékeket tudom használni
 
       	

    //Azért kell a 2 for, hogy a $need tömbben megadott sorrend szerint szerezzük be az adatokat
        foreach ($location as $v) { 

            for ($i=0; $i < count($splitted); $i++) { 
                    if($v==$i){
                    	array_push($data, $splitted[$i]);
                    }
             }
         }

         if(count($data)>4){
         //Ha még nincs ilyen kategória, akkor fel kell vinni a táblába
         $cat=$this->isNewCategory($data[2]);
         if($cat==0){
         	$cat=$this->addNewCategory($data[2]);
         }
         $data[1]=str_replace("_", " ",$data[1]);
         $data[0]=$data[0]*300;
        
        
     $this->upload($data[0],$data[1],$data[2],$data[3],$data[4]);
     $prod++;
 			}
     
     $data=array();
     }

    }
    fclose($file);
    return $prod;
	}


	


//Ha létezik már a kategória, akkor vissza adja az id-ját, ha nem akkot 0-át
	function isNewCategory($category){
		$res=$this->conn->prepare("SELECT id from collection where kind like ?");
		$res->bindparam(1,$category);
		$res->execute();

		while ($row=$res->fetch()) 
			return $row["id"];

			return 0;
		
	}


//Hozzáadja a kategóriákhoz a megkapott adatot, és vissza adja annak id-ját
	function addNewCategory($category){
		$res=$this->conn->prepare("INSERT into collection(kind) values (?)");
		$res->bindparam(1,$category);
		$res->execute();

		$res=$this->conn->prepare("SELECT max(id) as id from collection");
		$res->execute();

		while ($row=$res->fetch()) 
			return $row["id"];

	}

//Ha admin a felhasznáóü true-val tér vissza
	function isAdmin($email){
		$res=$this->conn->prepare("SELECT isAdmin from customers where email like ? and isAdmin like '1'");
		$res->bindparam(1,$email);
		$res->execute();

		while ($row=$res->fetch()) 
			return true;

			return false;
		
	}

//Termék feltöltése
	function upload($price,$name,$kind,$img,$sex){
		$res=$this->conn->prepare("INSERT into products(price,name,kind_id,img,sex) values (?,?,(select id from collection where kind like ?),?,?)");
	
		$res->bindparam(1,$price);
		$res->bindparam(2,$name);
		$res->bindparam(3,$kind);
		$res->bindparam(4,$img);
		$res->bindparam(5,$sex);

		$res->execute();
	}



//CSV fájl létezik-e, ha üres tömbel tér vissza, akkor nem volt probléma
	function checkCSV(){
		$target_dir="csv/";
		$target_file=$target_dir.basename($_FILES["file"]["name"]);


		$problems=array();



//Csak CSV-t lehessen feltölteni
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if($imageFileType != "csv") {
		   array_push($problems, "Csak csv formátum támogatott!");
		    
		}

//Ha már lézetik a fájl akkor nem lehet 
		if (file_exists($target_file)) {
    		array_push($problems, "Ez a CSV már fel van töltve!");
    	}

		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
			
		}else{
			array_push($problems, "Sikertelen feltöltés!");
		}

		return $problems;
	}


//A kép ellenörzése
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
&& $imageFileType != "gif" && $imageFileType != "webp") {
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