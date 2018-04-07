<?php

session_start();

$id = "";
$name = $contact = $email = $branch =$college = "edit ur profile";
$eventid = $decription = "";
$eventids = array();
$eventdescription = array();
$EventName[] = array();
$registeruserid[] =array();
$registereventid[] = array();
$registerdescription[] = array();
$registereventname[] = array();
$contacts[] = array();
$prize[] = array();
$rules[] = array();
$count2 = 0;
$count = 0 ;
if($_SESSION['status'] == "loggedin")
	{
    	$id = $name = $contact = $email = $branch =$college = "";
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
      //echo "connected";
        $sql = "SELECT * FROM users WHERE contact =\"".$_SESSION['usernumber']."\"";
            $result = $conn->query($sql);
           // echo "<br><hr>";

              if ($result->num_rows > 0) {
                    // echo "retreived";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        // echo "id =".$row["id"]."\nname =".$row["name"]."\n college =".$row["college"]."\nbranch =".$row["branch"]."\nemail =".$row["email"]." \nec_id =".$row["ec_id"]."\ncontact =".$row["contact"]."";
                        $_SESSION['id'] = $id = $row["id"];
                        $name = $row["name"];
                        $college = $row["college"];
                        $ec_id = $row["ec_id"] ;
                        $semester = $row['semester'];
                        $email = $row["email"];
                        $branch = $row["branch"];
                        $contact = $row["contact"];
                          $_SESSION['semester']= $semester;
		              $_SESSION['name']= $name ;
		              $_SESSION['college']= $college ;
		              $_SESSION['branch']= $branch ;
		              $_SESSION['email']= $email ;

                    }
                    
              } else {
                    //echo "0 results";
              }

            // if($result){
            //   echo "inserted successfully";
            //   $_SESSION['name']= $name ;
            //   $_SESSION['college']= $college ;
            //   $_SESSION['branch']= $branch ;
            //   $_SESSION['email']= $email ;
            //   //header("location:Mainpage.php");
            // }else{
            //   echo "no insertion is done";
            // }
            
          $sql1 = "SELECT * FROM events" ;
              
             $conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}else{
		//echo "connected";
		}
		
		$result = mysqli_query($conn, $sql1);

		if (mysqli_num_rows($result) > 0) {              
               
		    while($row = mysqli_fetch_assoc($result)) {
		    $eventids[] =   $row["id"];
		    $eventdescription[] = $row['description'];
		    $contacts[] = $row['contacts'];
		    $prize[] = $row['prize'];
		    $rules[] = $row['rules'];
		    $EventName[] = $row['name'];
		 $count = $count + 1;
   			 }		
		
		}
		
		 $sql2 = "SELECT * FROM usereventsregister where id = ".$_SESSION['id'] ;
		 $result2 = mysqli_query($conn, $sql2);
		 if (mysqli_num_rows($result2) > 0) {              
               
		    while($row = mysqli_fetch_assoc($result2)) {
		    $registeruserid[] =   $row["id"];
		    $registereventid[] =   $row["eventid"];
		    $registerdescription[] = $row['description'];
		    $registereventname[] = $row['eventname'];
		 $count2 = $count2 + 1;
   			 }		
		
		}

              
      }

    
	}
	else
	{
		header("location:index.php");
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
 <style>
.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 15px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.accordion1 {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 15px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.active, .accordion:hover {
    background-color: #ccc;
}

.active, .accordion1:hover {
    background-color: #ccc;
}

.accordion2 {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 15px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.active, .accordion2:hover {
    background-color: #ccc;
}

.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;

}

  .navbar {
      margin-bottom: 0;
      background-color: #FF4000;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }

</style>

 
</head>
<body style="background:#FF4000">

<div class="container" style="background:#FF4000">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="">Eclectika'18</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="register.php">PROFILE</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
         <li><a href="events-display/">REGISTER FOR EVENTS</a></li>
      </ul>
    </div>
  </div>
</nav>

<div style="height:100px;"></div>

    <div class="row profile" style='height: 90%;'>
    <div class="col-lg-3">
      <div class="profile-sidebar" style='height: 90%;'>
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
          <img src="http://ashwanipandey.in/chatapp/Images/DummyUser.png" class="img-responsive" alt="User Pic" width="100%">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
            <center><h3 style="color:#ffffff"><b><?php echo $name ?><b/></h3></center>
          </div>
          <!--<div class="profile-usertitle-job">
            Developer
          </div>-->
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav">
            <li class="active">
              <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal">Info</button>
              <!-- my implementation -->
                            <!-- Modal -->
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                      <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
              <!-- ends -->

            </li>
          </ul>
          <br />
          <ul>
            <li style="color:#ffffff">Phone No: 
             <?php 
              echo $_SESSION['usernumber'];
              ?> 
            </li>
            <li style="color:#ffffff">Email id:<?php 
              echo $email;
              ?> </li>
          </ul>
        </div>
        <div>
          <hr style = 'height: 2px; width: 80%; align: center; background-color: black;'>
          <img src="http://d2r5da613aq50s.cloudfront.net/wp-content/uploads/324172.image0.jpg" class="img-responsive" alt='qrcode'>
          
        </div>
        <!-- END MENU -->
      </div>
    </div>
    <div class="col-lg-9">
            <div class="profile-content" style="padding:5px;">
              <div class='row event-box'>
                <h3 style="color:#ffffff">Major Attractions</h3>
                <hr style = 'height: 1px; width: 98%; align: center; background-color: black;'>
                
                
			  <button class="accordion2">Tafree</button>
			<div class="panel">
			<h2>Tafree – Stand Up comedy</h2>
			  <p> To make someone smile and take away their worries with a dose of laughter, it isn't an easy job. It takes a joker and the joker's 				remedy.</p><p>Show that Gagman style in you for we bring you the new entrant to our coaster of mega events, a Stand up Comedy 						competition - "Tafree"</p>
				 <p>Date : 24 </p>
			<p>Venue : Archi Audotorium
			</p>
			</div>
			
			<button class="accordion2">Allure </button>
			<div class="panel">
			<h2>Allure</h2>
			  <p>It is your aura, your Style that makes you stand out rather than fitting in this ridiculously monotonous world of ours with boring				 routines and monochrome people. Bring out that style and talent in you and let your halo overtake these spotlights for Eclectika brings 			to you its flagship event "Allure"</p><p>
			Prelims : 23rd</p><p>
			Finals : 25th</p><p>
			Venue : Archi Auditorium
				</p>
			</div>
			
			<button class="accordion2">Kalopsia</button>
			<div class="panel">
			  <p>The boundaries of the canvas do not confine the world of imagination and for an artist this escape is ethereal.
			Eclectika brings to you its flagship Art exhibition - Kalopsia.</p><p>
			Prelims: 19 </p><p>
			</p>
			</div>
			
			<script>
			var acc = document.getElementsByClassName("accordion2");
			var i;
			
			for (i = 0; i < acc.length; i++) {
			  acc[i].addEventListener("click", function() {
			    this.classList.toggle("active");
			    var panel = this.nextElementSibling;
			    if (panel.style.maxHeight){
			      panel.style.maxHeight = null;
			    } else {
			      panel.style.maxHeight = panel.scrollHeight + "px";
			    } 
			  });
			}
			</script>
			                
                
                              </div>
              <br />
              <div class='row'>
                <div class='col-lg-6 col-md-12 event-box'>
                  <h3 style="color:#ffffff"> Events Registered</h3>
                  <marquee style="color:#ffffff">Register MORE</marquee> 

                  <hr style = 'height: 1px; width: 98%; align: center; background-color: black;'>
                  <?php
                  //registered events
                  for($x = 1 ;$x <= $count2 ;$x++){
                  echo '<button class="accordion1">'.$registereventname[$x].'</button>
			<div class="panel">
			<form method="post" action="eventunregister.php" >
			<input type="hidden" name="registeruserid" value="'.$registeruserid[$x].'">
			<input type="hidden" name="registereventid" value="'.$registereventid[$x].'">
			<p>'.$registerdescription[$x].'</p>
			<button class="btn btn-danger" style="float:left" type="submit" > unregister</button></form>
			</div>';
			
			}
                  ?>
                  
                  
			
			
			<script>
			var acc = document.getElementsByClassName("accordion1");
			var i;
			
			for (i = 0; i < acc.length; i++) {
			  acc[i].addEventListener("click", function() {
			    this.classList.toggle("active");
			    var panel = this.nextElementSibling;
			    if (panel.style.maxHeight){
			      panel.style.maxHeight = null;
			    } else {
			      panel.style.maxHeight = panel.scrollHeight + "px";
			    } 
			  });
			}
			</script>
                  
                                  </div>
                
                <div class='col-lg-6 col-md-12 event-box'>
                  <h3>All Events</h3>
                  <marquee style="color:#ffffff">Register HERE</marquee> 
                  <hr style = 'height: 1px; width: 98%; align: center; background-color: black;'>
                  
                  <?php
                  //all events
                  for($x = 1 ;$x <= $count ;$x++){
                  echo '<button class="accordion" >'.$EventName[$x].'</button>
			<div class="panel"><form method="post" action="eventregister.php" >
			<input type="hidden" name="eventid" value="'.$eventids[$x-1].'">
			<input type="hidden" name="eventname" value="'.$EventName[$x].'">
			<input type="hidden" name="contacts" value="'.$contacts[$x].'">
			<input type="hidden" name="prize" value="'.$prize[$x].'">
			<input type="hidden" name="rules" value="'.$rules[$x].'">
			<input type="hidden" name="eventdescription" value="'.$eventdescription[$x-1].'"><p>'.$eventdescription[$x-1].'</p>
			<button class="btn btn-danger" style="float:left" type="submit" > register</button></form>
			</div>';
			
			}
                  ?>
                  
                
			
			<script>
			var acc = document.getElementsByClassName("accordion");
			var i;
			
			for (i = 0; i < acc.length; i++) {
			  acc[i].addEventListener("click", function() {
			    this.classList.toggle("active");
			    var panel = this.nextElementSibling;
			    if (panel.style.maxHeight){
			      panel.style.maxHeight = null;
			    } else {
			      panel.style.maxHeight = panel.scrollHeight + "px";
			    } 
			  });
			}
			</script>
                  
                  
                                  </div>
              </div>

             <!--  Additioinally added correct it with ui -->
             <!-- <form action="logout.php">
                <div class="form-group">        
                    <div class="">
                      <button type="submit" class="btn btn-default">Logout</button>
                    </div>
                  </div>
              </form>-->
              
              
            


            </div>
    </div>
  </div>
</div>
<br> 
<br>

 
</body>
</html>