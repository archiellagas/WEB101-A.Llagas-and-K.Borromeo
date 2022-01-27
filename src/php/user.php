<?php
require ('conn.php');


if($_SERVER ['REQUEST_METHOD'] === 'POST' && $_POST['action']=="register")
{
	$pdo ->beginTransaction();
		try {
			$sql = 'INSERT INTO userfile(idnumber,lastname,name,bday,program,yearlevel) VALUES(:idnumber, :lastname, :name, :bday, :program,:yearlevel)';
		$statement = $pdo -> prepare($sql);
		$statement ->execute([
			':idnumber' => $_POST['userdata']['idnumber'],
			':lastname' => $_POST['userdata']['lastname'],
			':name' => $_POST['userdata']['name'],
			':bday' => $_POST['userdata']['bday'],
			':program' => $_POST['userdata']['program'],
			':yearlevel' =>(int)$_POST['userdata']['yearlevel'],
 			]);
		echo $pdo ->lastInsertid();	// show enter id in db
		$pdo->commit();
		                    
		} catch (Exception $e) {
			$pdo->rollback();
			
			
		}
	}

else if($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action']=="getuser"){
	
		$sql = "SELECT * FROM userfile";
		$statement = $pdo->query($sql);
		$users = $statement->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($users);
	}


?>