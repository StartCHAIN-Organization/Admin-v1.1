<?php

	$username="root";
	$password="pass";
	$host="localhost";
	$dbname="StartCHAIN";
	$IP=file_get_contents("http://ipecho.net/plain");

	$conn=mysqli_connect($host,$username,$password,$dbname);
//	mysql_select_db($dbname);

	if($conn->connect_error) {
		echo "Error";
	}

	$ID=$_POST['UID'];
	$Username=$_POST['username'];
	$Email=$_POST['email'];
	$Password=$_POST['password'];
	$hashed_password = md5($Password); //password_hash($Password, PASSWORD_DEFAULT);
	$Usertype=$_POST['usertype'];

//	echo "$ID,  $Username, $Email, $Password, $Usertype";
	$insert="INSERT INTO users VALUES('$ID','$Username','$Email','$hashed_password','$Usertype')";

	$result=mysqli_query($conn,$insert);
	
	if($result) {
//		echo "$hashed_password";
		header("Location: http://$IP/multichain-web-demo/login.php");
	} else {
		echo "error";
	}

	mysqli_close($conn);

?>
