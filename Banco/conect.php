<?php 

$dbname = "web20191series";
$user = "ph";
$passw = "Parzival@29";

try {
	$con = new PDO("mysql:host=localhost;dbname=".$dbname,$user, $passw);
	// echo"deu bom";
} 
 catch (PDOException $e) {
	$e-> getMessage();
	// echo "ERROR";
}

?>