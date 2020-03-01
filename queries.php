<?php

	$username="root";
	$password="pass";
	$host="localhost";
	$dbname="StartCHAIN";
	$IP=file_get_contents("http://ipecho.net/plain");

	$conn=mysqli_connect($host,$username,$password,$dbname);

	if($conn->connect_error) {
		echo "Error";
	}

	$ID=$_POST['UID'];
	$Name=$_POST['name'];
	$Email=$_POST['email'];
	$Message=$_POST['message'];
//	echo "$ID,  $Username, $Email, $Password, $Usertype";
	$insert="INSERT INTO Queries VALUES('$ID','$Name','$Email','$Message')";

	$result=mysqli_query($conn,$insert);

	if($result) {
//		echo "$hashed_password";
		header("Location: http://$IP/multichain-web-demo/index.php");
	} else {
		echo "error";
	}

	mysqli_close($conn);

?>
