<?php 
error_reporting(0);
session_start();
define( "FB_ACCOUNT_KIT_APP_ID", "149895478982756" );
define( "FB_ACCOUNT_KIT_APP_SECRET", "7a065e0f2d559b223960346f71ab7be0" );

$code = $_POST['code'];
$csrf = $_POST['csrf'];

$auth = file_get_contents( 'https://graph.accountkit.com/v1.1/access_token?grant_type=authorization_code&code='.  $code .'&access_token=AA|'. FB_ACCOUNT_KIT_APP_ID .'|'. FB_ACCOUNT_KIT_APP_SECRET );

$access = json_decode( $auth, true );

if( empty( $access ) || !isset( $access['access_token'] ) ){
    return array( "status" => 2, "message" => "Unable to verify the phone number." );
}

$appsecret_proof= hash_hmac( 'sha256', $access['access_token'], FB_ACCOUNT_KIT_APP_SECRET ); 

//echo 'https://graph.accountkit.com/v1.1/me/?access_token='. $access['access_token'];
$ch = curl_init();

// Set query data here with the URL
curl_setopt($ch, CURLOPT_URL, 'https://graph.accountkit.com/v1.1/me/?access_token='. $access['access_token'].'&appsecret_proof='. $appsecret_proof ); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch, CURLOPT_TIMEOUT, '4');
$resp = trim(curl_exec($ch));

curl_close($ch);

$info = json_decode( $resp, true );

if( empty( $info ) || !isset( $info['phone'] ) || isset( $info['error'] ) ){
    return array( "status" => 2, "message" => "Unable to verify the phone number." );
}

$phoneNumber = $info['phone']['number'];

$accesstoken = $info['id'];


//echo json_encode( $info );

$servername = "localhost";
$username = "ecleca9f";
$password = "newWeb16@ec#";
$dbname = "ecleca9f_eclectika18";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$phone = (string)$phoneNumber;
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

} else{

	$sql1 = "SELECT * FROM users where contact = \"".$phoneNumber."\"";
	$result1 = $conn->query($sql1);
	if($result1->num_rows > 0){
	echo "Already registered,login Success,Click below button to view ur profile";
	echo'<form action="Mainpage.php"><button type="submit" class="btn btn-danger btn-block">Registered successfully,Click to Login</button></form>';
		$_SESSION['status']="loggedin";
		$_SESSION['usernumber'] = $phoneNumber;
		$_SESSION['accesstoken'] = $accesstoken;
		//echo $phoneNumber."\n";
		//echo $_SESSION['usernumber'].$_SESSION['status'];

	}else{
	//echo "connected";
	$sql = "INSERT INTO users(contact,accessToken) VALUES(\"".$phoneNumber."\",\"".$accesstoken."\")";
	$result = $conn->query($sql);
	if($result === TRUE){
		echo'<p>Registeration success,click below button to login</p><form action="Mainpage.php"><button type="submit" class="btn btn-danger btn-block">Registered successfully,Click to Login</button></form>';
		$_SESSION['status']="loggedin";
		$_SESSION['usernumber'] = $phoneNumber;
		$_SESSION['accesstoken'] = $accesstoken;
		//echo $phoneNumber."\n";
		//echo $_SESSION['usernumber'].$_SESSION['status'];
	}else{
			$conn->close();
			echo "not inserted,try again";
	}
	}
}



?>