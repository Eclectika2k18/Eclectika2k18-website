<?php
session_start();
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";


$result = "";

//echo $_POST["registeruserid"];
//echo $_POST["registereventid"];


 $sql1 = 'delete from usereventsregister where (id ='.$_POST["registeruserid"].' and eventid = '.$_POST["registereventid"].')' ;
              
             $conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}else{
		//echo "connected";
		}
		
		
		
		if (mysqli_query($conn, $sql1)) {
		$result = '<div class="w3-container"><center>
  <h2 style="color:#ffffff">updation</h2><hr/>

  <div class="w3-card-4" style="width:50%;background:#ffffff">
    <img src="http://ashwanipandey.in/chatapp/Images/DummyUser.png" alt="Norway" style="width:100%" height="200px">
    <div class="w3-container w3-center">
    <hr/>
      <p><b>unregistered</b></p>
    </div>
  </div></center>
</div>';
//echo "done";

    
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
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
 <?php echo $result;?>
 </body></html>
 
