<!DOCTYPE html>
<html>
<head>
  <title>User Registration</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script defer type="text/javascript" src="src/script.js"></script>
  
 
</head>
<body>
  <div class="container " style="margin: 30px; " >
  <h2 style="text-align: center;">USER registration</h2>
 
  <div  style="border:1px solid gray ;padding:20px;">
         <form class="form-inline" id="userForm" >

                        <div class="mb-3">
                          <label for="idnumber">ID Number:</label>
                          <input type="text" pattern="\d{3}-\d{5}" maxlength="9" class="form-control input-sm-12" id="idnumber" placeholder="Enter ID" name="idnumber" required>
                        </div>
                         <div class="mb-3">
                          <label for="lastname">Last Name:</label>
                          <input type="text" class="form-control input-sm-12" id="lastname" placeholder="Enter Lastname" name="lastname" required>
                        </div>

                        <div class="mb-3">
                          <label for="name">Name:</label>
                          <input type="text" class="form-control input-sm-12" id="name" placeholder="Enter Name" name="name" required>
                        </div>
                        <div class="mb-3">
                          <label for="bday">Birthday:</label>
                          <input type="date" class="form-control input-sm-12" id="bday" placeholder="Birthday" name="bday" required>
                        </div>
                        <div class="mb-3">
                          <label for="program">Program:</label>
                          <input type="text" class="form-control input-sm-12" id="program" placeholder="Program" name="program" required>
                        </div>

                        <div class="mb-3">
                          <label for="yearlevel">Year Level:</label>
                          <input  type="number" max="5" min="1" class="form-control input-sm" id="yearlevel" placeholder="Enter Yearlevel" name="yearlevel" required>
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox" name="remember"> Remember me</label>
                        </div>
                        <button id="register" style="background-color:lavender; border: 1px solid black; "type="submit" class="btn btn-default">Register</button>
                      </form>

</div>

<div class="table-responsive" style="margin: 50px;">          
  <table class="table" id="usertable">
    <thead>
      <tr>
        <th scope="col ">#</th>
        <th scope="col ">idnumber</th>
        <th scope="col ">Lastname</th>
        <th scope="col ">name</th>
        <th scope="col ">bday</th>
        <th scope="col ">program</th>
         <th scope="col ">yearlevel</th>
          <th scope="col "></th>
         <th scope="col "></th>

      </tr>
    </thead>

    <tbody>




    </tbody>

  </table>

                                
  




</div>
</div>


</div>

  </body>
 
  
<script>


////////////////////////USER TABLE
 function getUsers(){
    $.ajax({
      type:"GET",
      data:{action:"getuser"},
      url:"src/php/user.php",
      success:function(response){
        users =jQuery.parseJSON(response)
        var table = $("#usertable tbody");
        for (var i = 0; i < users.length; i++) {
          appendUser(users[i],table);
        
        }


      },
    });
   }
  function appendUser(users,table){

    row = " <tr>"+
            "<th scope=\"row\">"+users.id +"</th>"+
                "<td>"+users.idnumber +"</td>"+
                "<td>"+users.lastname +"</td>"+
                "<td>"+users.name +"</td>"+
                "<td>"+users.bday +"</td>"+
                "<td>"+users.program +"</td>"+
                "<td>"+users.yearlevel +"</td>"+
                "<td>"+'<a data-toggle="modal"  href="signUP-update.php?id='+users.id+'&idnumber='+users.idnumber+'&lastname='+users.lastname+'&name='+users.name+'&bday='+users.bday+'&program='+users.program+'&yearlevel='+users.yearlevel+'"">EDIT</a>'+"</td>"+
                
             "</tr>"; 

            table.append(row);
   
   }

   getUsers();
</script>
     
<style type="text/css">
  
  input:invalid, select:invalid{
    border: 2px dotted red;
  }
  </style>
  
  
</html>



