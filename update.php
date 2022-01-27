<?php
$host ='localhost';
$dbname="web101";
$user="root";
$password="";

try {
	$dsn = 'mysql:host='.$host.'; dbname='.$dbname;
	$pdo= new PDO($dsn,$user,$password);

	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	
} catch (Exception $error) {
	$error->getMessage();
	echo '<h1>DATAbase failed to Connect</h1>';
}



?>