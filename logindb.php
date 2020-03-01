<?php
	session_start();
	$username="root";
	$password="pass";
	$host="localhost";
	$dbname="StartCHAIN";
	$IP=file_get_contents("http://ipecho.net/plain");

	$conn=mysqli_connect($host,$username,$password,$dbname);

	if($conn->connect_error) {
		echo "Error";
	}

	$Email=$_POST['email'];
	$Password=$_POST['password'];
//	$Usertype=$_POST['usertype'];

//	echo "$Email, $Password";
	$select="SELECT * FROM users WHERE Email='$Email'";

	$result=mysqli_query($conn,$select);

	if(mysqli_num_rows($result)) {
		while($row=mysqli_fetch_assoc($result)) {
			$name=$row['Username'];
			$checkPass=$row['Password'];
			if(strcmp(md5($Password),$checkPass) == 0) {
				 if(isset($_POST['email'])) {
			                $_SESSION['display_name']=$name;
			                //Storing the name of user in SESSION variable.
			                header("Location: http://$IP/multichain-web-demo/index.php");
			        }
			}
		}
	} else {
		echo "error";
	}

	if(isset($_POST['email'])) {
		$_SESSION['display_name']=$name;
		//Storing the name of user in SESSION variable.
		header("Location: http://$IP/multichain-web-demo/index.php");
	}

	mysqli_close($conn);

?>
