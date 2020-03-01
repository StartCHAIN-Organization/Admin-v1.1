<?php 

	$username="root";
	$password="pass";
	$host="localhost";
	$dbname="StartCHAIN";
	$IP=file_get_contents("http://ipecho.net/plain");

        $conn=mysqli_connect($host,$username,$password,$dbname);

	if($conn->connect_error){
		echo "Error";
	}


	$Name=$_POST['name'];
	$OrgName=$_POST['org_name'];
	$Email=$_POST['email'];
	$ProTitle=$_POST['pro_title'];
	$FundAmt=$_POST['fund'];
	$Milestone=$_POST['milestone'];
	$Time=$_POST['time'];
	$DescpBrief=$_POST['descp_brief'];
	$DescpDetail=$_POST['text'];

	echo $Name;

       $insert ="INSERT INTO campaign(Name,OrgName,Email,ProTitle,FundAmt,Milestone,Time,DescpBrief,DescpDetail) VALUES('$Name','$OrgName','$Email','$ProTitle','$FundAmt','$Milestone','$Time','$DescpBrief','$DescpDetail')";

	$result=mysqli_query($conn,$insert);

         if($result){
		header("Location: http://$IP/multichain-web-demo/index.php");
	}
	else{
		echo "Error".$conn->error;
	}
	mysqli_close($conn);

?>
