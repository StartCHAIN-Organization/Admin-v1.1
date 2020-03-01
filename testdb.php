<?php


	$username="root";
	$password="pass";
	$host="localhost";
	$dbname="StartCHAIN";
	$conn=mysqli_connect($host,$username,$password,$dbname);

	if($conn->connect_error){
		echo "Error";
	}
	$select="SELECT * FROM campaign ORDER BY campaign.CampaignID DESC LIMIT 4 ";
	$result=mysqli_query($conn,$select);


?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>MultiChain Demo</title>
		<link rel="stylesheet" href="main.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
	<!-- Two -->
				<?php if(mysqli_num_rows($result)){
					$count = 0;
						while($count<4) {
				?>
			<section id="two">
				<div class="inner">
				<?php
					    while($row=mysqli_fetch_assoc($result)){
						$campaignID=$row['CampaignID'];
				                $name=$row['ProTitle'];
						$descpBrief=$row['DescpBrief'];
				?>
					<article>
						<div class="content">
							<header>
								<center><h3><?php echo $name?>  </h3></center>
							</header>
							<div class="image fit">
								<img src="crowdfunding.png" alt="" />
							</div>
     						<!--	<p>Cumsan mollis eros. Pellentesque a diam sit amet mi magna ullamcorper vehicula. Integer adipiscin sem. Nullam quis massa sit amet lorem ipsum feugiat tempus.</p>-->
							<p><?php echo wordwrap($descpBrief,53,"<br>",TRUE); ?></p>
							<center><button class="disp-campaign-btn"><a href=<?php echo "campaignDetails.php?campaignId=".$campaignID?>  style="color:#fff; text-decoration:none">Click here for Details</a></button></center>
						</div>
					</article>

				<?php
							$count = $count + 1;
							if(($count%2)== 0)
								break;
						}
				?>
				</div>
			</section>
				<?php
					}
				} else{
						echo "error";
					}
				?>

	</body>
</html>

