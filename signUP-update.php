<!DOCTYPE html>
<html>
<head>
	
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
  <h2>Your Information</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">CLICK</button>

<button type="button" class="btn btn-info btn-lg"   onclick="window.location.href='signUP.php'">Back to Main PAge</button>
																				

  <!-- Modal HEAD-->
  <div class="modal fade" id="myModal" role="dialog">
  	<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button align="left" type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Student Information</h4>
        </div>
        <div class="modal-body">
          <p id="message"></p>
																	<form method="POST" id="updateForm">
																		<table cellpadding="5" cellspacing="5">
																			<tr>
																				
																				<th>ID</th>
																				<td><input name="id"  type="text" value="<?php echo $_GET['id'];?>" ></td>
																			</tr>
																			<tr>
																				
																				<th>Student ID</th>
																				<td><input name="idnumber" type="text" value="<?php echo $_GET['idnumber'];?>" ></td>
																			</tr>
																			<tr>
																			<th>LAStname</th>
																				<td><input name="lastname" type="text" value="<?php echo $_GET['lastname'];?>" ></td>
																			</tr>
																			<tr>
																			<th>Name</th>
																				<td><input name="name" type="text" value="<?php echo $_GET['name'];?>" ></td>
																			</tr>
																			<tr>
																			<th>Bday</th>
																				<td><input name="bday" type="text" value="<?php echo $_GET['bday'];?>" ></td>
																			</tr>
																			<tr>
																			<th>Program</th>
																				<td><input name="program" type="text" value="<?php echo $_GET['program'];?>"  ></td>
																			</tr>
																			<tr>
																			<th>Yearlevel</th>
																				<td><input name="yearlevel" type="text" value="<?php echo $_GET['yearlevel'];?>" ></td>
																			</tr>

																		

																			
																			
																		</table>
																		<div class="container" style="padding: 5px;">
																			<tr>
																				<td  align="center"><input class="btn btn-primary btn-sm" type="submit" name="update" id="update" value="Update">
																					<input class="btn btn-primary btn-sm" type="submit" name="delete" id="delete" value="Delete">
																					
																				
																				
																			</tr>
																		</div>
																		
																	</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">CLose</button>
        </div>
      </div>
      <!--MODAL ENDS-->
    </div>
  </div>
  
</div>
</body>
</html>

<?php
include 'update.php';


if(isset($_POST['update']))
{
	$id=$_POST['id'];
	$idnumber=$_POST['idnumber'];
	$lastname=$_POST['lastname'];
	$name=$_POST['name'];
	$bday=$_POST['bday'];
	$program=$_POST['program'];
	$yearlevel=$_POST['yearlevel'];

	$sql="UPDATE userfile SET idnumber=:idnumber,lastname=:lastname,name=:name,bday=:bday,program=:program,yearlevel=:yearlevel where id=:id";
	$sql_run =$pdo->prepare($sql);
	$sql_exec =$sql_run->execute(array(":idnumber"=>$idnumber,":lastname"=>$lastname,":name"=>$name,":bday"=>$bday,":program"=>$program,":yearlevel"=>$yearlevel,":id"=>$id,));

	if($sql_exec){
		echo '<script> alert("Data Updated")</script>';
	}
	else{
		echo '<script> alert("Data NOt Updated")</script>';
	}
}

elseif (isset($_POST['delete'])) {
	$id=$_POST['id'];

	$sql="DELETE FROM userfile   where id=:id";
	$sql_run =$pdo->prepare($sql);
	$sql_exec =$sql_run->execute(array(":id"=>$id,));


	if($sql_exec){
		echo '<script> alert("Data deleted")</script>';
	}
	else{
		echo '<script> alert("Data NOt deleted")</script>';
	}
}


?>