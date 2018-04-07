<?php
session_start();
$servername = "localhost";
$username = "ecleca9f";
$password = "newWeb16@ec#";
$dbname = "ecleca9f_eclectika18";

$result="";
 $sql1 = 'INSERT INTO usereventsregister(id,username,eventname,contact,email,description,eventid) values('.$_SESSION['id'].',"'.$_SESSION['name'].'","'.$_POST["eventname"].'","'.$_SESSION['usernumber'].'","'.$_SESSION['email'].'","'.$_POST["eventdescription"].'",'.$_POST["eventid"].')' ;

              
             $conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}else{
		//echo "connected";
		}
		
		
		
		if (mysqli_query($conn, $sql1)) {
    $result = 'registered successfully';
//echo "done";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

//echo $_POST["eventid"];
//echo $_POST["eventdescription"];
//echo $_POST["eventname"];
?>




<!doctype html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
 <link rel="stylesheet" type="text/css" href="style.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lobster" />
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
 
 </head>
 <body style="background:#FF4000">
 <div class="w3-container"><center>
  <h2 style="color:#ffffff">REGISTERATION</h2><hr/>

  <div class="w3-card-4" style="width:95%;background:#ffffff">
    <img src="http://ashwanipandey.in/chatapp/Images/DummyUser.png" alt="Norway" style="width:100%;padding:5px;" height="200px">
    <div class="w3-container w3-center">
    <hr/>
      <p><b><?php echo $result;?></b></p>
      <p><b>rules are:</b><br/><?php echo $_POST[rules];?></p>
          <p><b>contact :</b><br/><?php echo $_POST[contacts];?></p>
    </div>
  </div></center>
</div>
 
 
 </body></html>
 