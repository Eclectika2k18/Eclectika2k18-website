<!DOCTYPE html>
<html lang="en">
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
  <style type="text/css">
	.w3-card{
		margin: 20px;
		background:#ffffff;
	}
	.form1{
		padding: 3%;
		padding-top:5%;
		padding-bottom:5%;
	}
</style>
<script type="text/javascript">
	function clear(argument) {
		if(document.getElementById("name").value != ""){
			document.getElementById("name").value = "";
		}
		if(document.getElementById("email").value != ""){
			document.getElementById("email").value = "";
		}
		if(document.getElementById("branch").value != ""){
			document.getElementById("branch").value = "";
		}
		if(document.getElementById("semester").value != ""){
			document.getElementById("semester").value = "";
		}
		if(document.getElementById("college").value != ""){
			document.getElementById("college").value = "";
		}
	}
	
</script>
  
</head>
<body onload="clear()" style="background:#FF4000">

<div class="container w3-card">
  <center><h2>Register your profile</h2></center><hr/>
  <form action="upload.php" method="post" class="form1" enctype="multipart/form-data">
    <div class="form-group">
     <!--  email -->
      <label for="email" >Email:</label>
      <div>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
        
      </div>
    </div>
    <div class="form-group">
      <!-- name -->
      <label for="name">Name:</label>
      <div >          
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required> 
  
      </div>
    </div>
     <div class="form-group">
      <!-- college -->
      <label for="college">College:</label>
      <div>          
        <input type="text" class="form-control" id="college" placeholder="Enter College name" name="college" required> 
  
      </div>
    </div>
     <div class="form-group">
     <!--  branch -->
      <label for="branch">branch:</label>
      <div>          
        <input type="text" class="form-control" id="branch" placeholder="Enter branch" name="branch" required> 
  
      </div>
    </div>
      <div class="form-group">
     <!--  semsester-->
      <label for="semester">semseter:</label>
      <div>          
        <input type="text" class="form-control" id="semester" placeholder="Enter semester" name="semester" required> 
  
      </div>
    </div>
       <div class="form-group">
     <!--  image-->
      <label for="image">image(jpg,png only):</label>
      <div >          
                <input type="file" name="fileToUpload" id="fileToUpload" required>
  <br>
      </div>
    </div>

    
    <center>
		    	<button type="submit" class="btn btn-block btn-danger" name="submit">Submit</button>
			</center>
  </form>
</div>

</body>
</html>
