<?php
session_start();

if($_SESSION['status'] == "loggedin")
	{
$servername = "localhost";
$username = "ecleca9f";
$password = "newWeb16@ec#";
$dbname = "ecleca9f_eclectika18";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
	echo "connected";
}

$sql = "SELECT id FROM users where contact=\"".$_SESSION['usernumber']."\"";
$result = $conn->query($sql);
echo $_SESSION['usernumber'];


if ($result->num_rows > 0) {


    // output data of each row
    while($row = $result->fetch_assoc()) {
         $_SESSION['userid'] = $row["id"];
         echo $row["id"]."  z ".$_SESSION['userid'];
       	 header("location:Mainpage.php");
    }

} else {
        header("location:index.php"); 
}


}else {
       header("location:index.php"); 
}

?>

