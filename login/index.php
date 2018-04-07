<?php

session_start();

if($_SESSION['status'] == "loggedin")
	{
		header("location:login.php");
	}
	else
	{
		header("location:front.php");
	}

?> 