<?php

session_start();

if($_SESSION['status'] == "loggedin")
  {
      
		$servername = "localhost";
		$username = "";
		$password = "";
		$dbname = "";
	
	    
	     	 $conn = new mysqli($servername, $username, $password, $dbname);
	
	  
		      if ($conn->connect_error) {
		       		 die("Connection failed: " . $conn->connect_error);
		    	} else{
			          // define variables and set to empty values
			          //echo "connected";
			          
			          //image uploadation
			          
						          
			          
			          
			          //ends
			          
			          
			          
			          $nameErr = $emailErr = $branchErr = $collegeErr =$semesterErr = $imageErr = "";
			          $result = $name = $email  = $branch = $college = $semester =$image = "";
			
			            function test_input($data) {
			            $data = trim($data);
			            $data = stripslashes($data);
			            $data = htmlspecialchars($data);
			            return $data;
			          }
		
		          if ($_SERVER["REQUEST_METHOD"] == "POST") {
		            //name
			            if (empty($_POST["name"])) {
			              $nameErr = "error";
			
			            } else {
			              $name = test_input($_POST["name"]);
			              
			              // check if name only contains letters and whitespace
			              if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			                $nameErr = "error";
			              }
			            }
		            
		            
		            //name
			            if (empty($_POST["semester"])) {
			              $semesterErr= "error";
			
			            } else {
			              $semester= test_input($_POST["semester"]);
			              
			              // check if name only contains letters and whitespace
			              if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			                $semesterErr= "error";
			              }
			            }
		            //email
		            if (empty($_POST["email"])) {
		              $emailErr = "error";
		            } else {
		              $email = test_input($_POST["email"]);
		               
		       
		              // check if e-mail address is well-formed
		              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		                $emailErr = "error";
		              }
		            }
		              //college
		            if (empty($_POST["college"])) {
		              $college = "error";
		            } else {
		              $college = test_input($_POST["college"]);
		              
		       
		              // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
		             if (!preg_match("/^[a-zA-Z ]*$/",$college)) {
		                $collegeErr = "error";
		              
		              }
		            }
		
		             if (empty($_POST["branch"])) {
		              $branchErr = "error";
		            } else {
		              $branch = test_input($_POST["branch"]);
		              
		              // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
		             if (!preg_match("/^[a-zA-Z ]*$/",$branch)) {
		                $branchErr = "error";
		              }
		            }
		            
			       $filepath = "../loginstructure/images/" . basename($_FILES["fileToUpload"]["name"]);
			       
			      if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filepath)) 
			      {
			       echo "<img src=".$filepath." height=200 width=300 />";
			      } 
			      else 
			      {
			      $imageErr= "Error";
			      }
		
		
		                 if($branchErr == "error" || $nameErr == "error" || $collegeErr == "error" || $emailErr == "error" || $imageErr == "error" || $semester == "error"){
		            $result = "registeration failed,try again";
		          }else{
		            //echo "inserting going on...";
		            //$sql = "INSERT INTO users(name,college,branch,email) VALUES ('".$name."','".$college."','".$branch."','".$email."') where contact = '9398548605' ";
		             // $sql = "INSERT INTO users(name,college,branch,email) VALUES ('".$name."','".$college."','".$branch."','".$email."') where contact = '".$_SESSION['usernumber']."')";
		             //$sql = "UPDATE users SET name = \"".$name."\" ,college = \"".$college."\",branch = \"".$branch."\",email = \"".$email."\"  WHERE contact =\"".$_SESSION['usernumber']."\")";
		             //$sql = 'UPDATE users SET name = "'.$name.'" ,college = "'.$college.'",branch = "'.$branch.'",email = "'.$email.'"  WHERE contact = "'.$_SESSION['usernumber'].'")';
		             $sql = "update  users set name = \"".$name."\" ,college = \"".$college."\" ,branch = \"".$branch."\" ,email = \"".$email."\",semester =\"".$semester."\",user_image = \"".$filepath."\" where contact = \"".$_SESSION['usernumber']."\"";
		
		            $result = $conn->query($sql);
		            
		
		
		            if($result){
		              $result = "profile updated successfull";
		              $_SESSION['semester']= $semester;
		              $_SESSION['name']= $name ;
		              $_SESSION['college']= $college ;
		              $_SESSION['branch']= $branch ;
		              $_SESSION['email']= $email ;
		              //header("location:Mainpage.php");
		            }else{
		              $result = "profile uploading is failed,try again";
		            }
		          }
		          
		            
		          }
		          }
		   
  }else{
  echo "not loggedin";
  }

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
  <h2 style="color:#ffffff">UPLOADING</h2><hr/>

  <div class="w3-card-4" style="width:70%;background:#ffffff;padding-bottom:5px;">
    <img src="http://ashwanipandey.in/chatapp/Images/DummyUser.png" alt="Norway" style="width:100%;padding:5px" height="200px">
    <div class="w3-container w3-center">
    <hr/>
      <p><b><?php echo $result ?><br></b></p>
    </div>
  </div></center>
</div>
 </body></html>
