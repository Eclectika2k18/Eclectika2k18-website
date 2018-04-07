<?php
	session_start();

?>


<html>
    <head>
        <script src="jquery-3.0.0.min.js"></script>
       	<script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            body{
                font-family: tahoma;
            }
            .w3-card{
           	background:#ffffff;
              margin-right: 8%;
              margin-left: 8%;
              margin-top: 8%;
              padding: 3%;
              margin-bottom: 3%;
            }
            .message {
                
                
                color: #000000;
                font-family: tahoma;
                margin-top: 20px;
                
                
                text-align: left;
                width: 100%;
                word-wrap: break-word;
            }
        </style>
    </head>

    <body style="background:#FF4000">
        <div>
            <center>
            
              <div class="form-group w3-card" >
              
              <label>Enter your number to login</label><hr/>
                <input value="+91" id="country_code" class="form-control" required/>
                <input placeholder="phone number" id="phone_number" class="form-control" name="phonenumber"/>
                <hr/>
                <button onclick="smsLogin();" type="button" class="btn btn-danger">Login or register via SMS</button> 
               
                <br>              
                <div class="message">
                    <p><center><center></p>
                </div>
              </div>
            </center>
        </div>
        
        
        <script>
          //https://developers.facebook.com/docs/accountkit/webjs
          //$(".message").append("<p>initialized Account Kit.</p>");
          
          // initialize Account Kit with CSRF protection
          AccountKit_OnInteractive = function(){
            AccountKit.init(
              {
               appId:"149895478982756", 
                state:"d121663dc42b63c122184119e7b227cc", 
                version:"v1.1",
                fbAppEventsEnabled:true
              }
            );
          };

            
          // login callback
          function loginCallback(response) {
            if (response.status === "PARTIALLY_AUTHENTICATED") {
              var code = response.code;
              var csrf = response.state;
                //$(".message").append("<p>Received auth token from facebook -  "+ code +".</p>");
                //$(".message").append("<p>Triggering AJAX for server-side validation.</p>");
                
               $.post("verify.php", { code : code, csrf : csrf }, function(result){
                    $(".message").append( "<p>" + result + "</p>" );
                });
                  

              
                
            }
            else if (response.status === "NOT_AUTHENTICATED") {
              // handle authentication failure
               $(".message").append("<p>( Error ) NOT_AUTHENTICATED status received from facebook, something went wrong.</p>");
            }
            else if (response.status === "BAD_PARAMS") {
              // handle bad parameters
                $(".message").append("<p>( Error ) BAD_PARAMS status received from facebook, something went wrong.</p>");
            }
          }
            
            
          // phone form submission handler
          function smsLogin() {
            var countryCode = document.getElementById("country_code").value;
            var phoneNumber = document.getElementById("phone_number").value;
            //$(".message").append("<p>Triggering phone validation.</p>");
         
            
            AccountKit.login(
              'PHONE', 
              {countryCode: countryCode, phoneNumber: phoneNumber}, // will use default values if not specified
              loginCallback
            );
          }


          // email form submission handler
          function emailLogin() {
            var emailAddress = document.getElementById("email").value;
            AccountKit.login(
              'EMAIL',
              {emailAddress: emailAddress},
              loginCallback
            );
          }
        </script>
        
    </body>
</html>
