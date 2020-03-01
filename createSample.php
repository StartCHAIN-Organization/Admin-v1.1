<?php

	require_once 'functions.php';

	$config=read_config();
	$chain=@$_GET['chain'];
         if(isset($chain)){
	  output_success_text('Chain is Set');
	}
	else{
	   output_success_text('Chain is not set');

	}

	if (strlen($chain))
		$name=@$config[$chain]['name'];
	else
		$name='';

      set_multichain_chain($config[$chain]);


/**
//streams
        $labels=multichain_labels();

        no_displayed_error_result($liststreams, multichain('liststreams', '*', true));

        if (no_displayed_error_result($getaddresses, multichain('getaddresses', true))) {
                foreach ($getaddresses as $index => $address)
                        if (!$address['ismine'])
                                unset($getaddresses[$index]);


        if (no_displayed_error_result($listpermissions,
                multichain('listpermissions', 'create', implode(',', array_get_column($getaddresses, 'address')))                ))
                $createaddresses=array_unique(array_get_column($listpermissions, 'address'));


            if (no_displayed_error_result($listpermissions,
                        multichain('listpermissions', 'send', implode(',', array_get_column($getaddresses, 'address')))
                ))
                        $sendaddresses=array_get_column($listpermissions, 'address');

                        foreach($sendaddresses as $myaddress){
                                $mylabel= @$labels[$myaddress];
                                if($mylabel=='Admin' && (in_array($myaddress,$createaddresses,TRUE)))
                                        $campaignAddress = $myaddress;
                                        break;

                        }

                        // foreach ($liststreams as $stream)
                        // {
                        //      if($stream['name']=='stream1')
                        //              $streamName


                        // }


        }



        // ***$label=@$labels[$address];
      
		








	$max_upload_size=multichain_max_data_size()-512; // take off space for file name and mime type

	$allow_multi_keys=multichain_has_multi_item_keys();

	if (isset($_POST['publish'])) {
		output_success_text('success');

          
		$success=no_displayed_error_result($createtxid, multichain('createfrom',
			$campaignAddress, 'stream', $_POST['streamName'], true));


		if($success)
			 output_success_text('Stream successfully created in transaction '.$createtxid);

		else
                         output_success_text('Already exists');

//	  	if (no_displayed_error_result($result, multichain('subscribe', $createtxid)) {
//			output_success_text('Successfully subscribed to stream: '.$stream['name']);
//			$subscribed=true;
//		}


		if(isset($_POST['text'])){
			$data=bin2hex(string_to_txout_bin($_POST['text']));

			$keys=preg_split('/\n|\r\n?/', trim($_POST['key']));
			if (count($keys)<=1) // convert to single key parameter if only one key
				$keys=$keys[0];

			if(isset($myaddress)){
			  output_success_text('Address success');
			  echo $myaddress;
			}
			else
		            output_success_text('Address fail');

			if(isset($data)){
                               output_success_text('data success');
			}
			else{
		               output_success_text('data fail');
			}

		if ($_POST['offchain']) // need to separate cases here since MultiChain 1.0 publishfrom API has no 'options' parameter
				//$result=multichain('publishfrom', $_POST['from'], $_POST['name'], $keys, $data, 'offchain');
				$result=multichain('publishfrom', $campaignAddress, $_POST['streamName'], $keys, $data, 'offchain');
			else
				//$result=multichain('publishfrom', $_POST['from'], $_POST['name'], $keys, $data);
				$result=multichain('publishfrom', $campaignAddress, $_POST['streamName'], $keys, $data, 'offchain');

			if (no_displayed_error_result($publishtxid, $result))
				output_success_text('Item successfully published in transaction '.$publishtxid);
			else

				output_success_text('Error in publishid');
		}
		else{
			output_success_text('Error in text');
		}
	}
 	else{
		output_success_text('Error');
		
	}


        no_displayed_error_result($liststreams, multichain('liststreams', '*', true));   

        foreach( $liststreams as $stream){
		if($stream['subscribed']==0){
			if (no_displayed_error_result($result, multichain('subscribe', $stream['createtxid']))) {
				output_success_text('Successfully subscribed to stream: '.$stream['name']);
				$subscribed=true;
			}
		}

	}
/*
	$labels=multichain_labels();

	no_displayed_error_result($liststreams, multichain('liststreams', '*', true));

	if (no_displayed_error_result($getaddresses, multichain('getaddresses', true))) {
		foreach ($getaddresses as $index => $address)
			if (!$address['ismine'])
				unset($getaddresses[$index]);
				
		if (no_displayed_error_result($listpermissions,
			multichain('listpermissions', 'send', implode(',', array_get_column($getaddresses, 'address')))
		))
			$sendaddresses=array_get_column($listpermissions, 'address');

			foreach($sendaddresses as $myaddress){
				$mylabel= @$labels[$myaddress];
				if($mylabel=='Admin')
					$campaignAddress = $myaddress;
					break;

			}
			// foreach ($liststreams as $stream) 
			// {
			// 	if($stream['name']=='stream1')
			// 		$streamName


			// }


	}
*/
		

	// ***$label=@$labels[$address];

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>MultiChain Demo</title>
		<link rel="stylesheet" href="campaign.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<style>
			#header .logo2 {
			display: inline-block;
			height: inherit;
                        left: 0;
                        line-height: inherit;
                        margin: 0;
			padding: 0;
			position: absolute;
			top: 0;
                        color: #e5474b;
                        font-size: 1.75em;
			text-transform: none;
			font-weight: bold;
			padding: 0;
			}
		#footer{
			background-color:#212121;
			height: 60px;
			bottom:0px;
			left:0px;
			line-height:50px;
			color:#aaa;
			text-align:center;
			width:100%;
		}
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>
	<body>
		<header id="header">
			<div class="inner">
				<a href="./?chain=<?php echo htmlspecialchars($chain)?>" class="logo2">StartCHAIN</a>
				<nav id="nav">
					<a href="./?chain=<?php echo htmlspecialchars($chain)?>">Home</a>
				<!--	<a href="./?chain=<?php echo htmlspecialchars($chain)?>&page=createSample">Create Campaign</a> -->

					<a href="createSample.php?chain=<?php echo htmlspecialchars($chain)?>">Create Campaign</a>
					<a href="./?chain=<?php echo htmlspecialchars($chain)?>&page=send">Fund Campaign</a>
					<a href="#">How it Works</a>
					<a href="#">Register/Login</a>
				</nav>
			</div>
		</header>
		<div class="container" id="margin">
			
		                <form name="myform" class="form-group" action="campaigndb.php"  method="post">
					<div class="ui">
							<h1><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i> Create Campaign</h1>
				 		<div class="row">
							<div class="col-md-5">
				 				<div class="container">
							 		<div class="InputWithIcon">
							 		<label for="inputname ">Name</label>

							 		<input type="text" name="name" class="form-control" placeholder="Name">
							 		<span>
											<i class="fa fa-user icon" aria-hidden="true"></i>
									</span>

							 		</div>

							 		<div class="InputWithIcon">
							 		<label for="input name">Organization name</label>
							 		<span>
							 		<i class="fa fa-building" aria-hidden="true"></i>
							 		</span>
							 		<input type="text" name="org_name" class="form-control"  placeholder="Oragnization Name">
									</div>

									<div class="InputWithIcon">
							 		<label for="input name">Email</label>
							 		<span>
							 		<i class="fa fa-envelope" aria-hidden="true"></i>
							 		</span>
							 		<input type="email" name="email" class="form-control"  placeholder="Enter Email">
									</div>

									<div class="InputWithIcon">
							 		<label for="input name">Project Title</label>
							 		<span>
							 		<i class="fa fa-pencil" aria-hidden="true"></i>
							 		</span>
							 		<input type="text" name="pro_title" class="form-control" name="key" placeholder="Project Title">
									</div>

									<div class="InputWithIcon">
							 		<label for="input name">Category</label>
							 		<select name="streamName" class="form-control">
							 			<option value="0" default selected disabled hidden>Choose category</option>
							 			<option>It Tehnology</option>
							 			<option>Sports</option>
							 			<option>Entertainment</option>
							 			<option>Other</option>
							 		</select>
									</div>
									<div class="InputWithIcon">
							 		<label for="input name">Fund required</label>
							 		<span>
							 		<i class="fa fa-money" aria-hidden="true"></i>
							 		</span>
							 		<input type="number" name="fund" class="form-control"  placeholder="Enter fund amount">
									</div>
									
									<div class="InputWithIcon">
							 		<label for="input name">Milestone</label>
							 		<span>
							 		<i class="fa fa-money" aria-hidden="true"></i>
							 		</span>
							 		<input type="number" name="milestone"  class="form-control"  placeholder="Milestone to be achieved">
									</div>

									<div class="InputWithIcon">
							 		<label for="input name">Time Period</label>
							 		<input type="date" name="time" class="form-control"  >
									</div>

				 				</div>

				 			</div>


				 				<div class="col-md-7">
							 		 <div class="InputWithIcon">
							 		 <label for="input name">Campaign Brief Description</label>
							 		 <textarea class="form-control" name="descp_brief" rows=6 placeholder="Enter Camapign Brief Description..."></textarea>
							 		</div>

							 		 <div class="InputWithIcon">
							 		 <label for="input name">Project Detail Description</label>
							 		 <textarea class="form-control" name="text" rows=14 placeholder="Enter Project Detail Description..."></textarea>
							 		</div>


				 				</div>

				 				<div class="col-md-12 btn-style">
				 					<input type="submit" name="publish" class="btn btn-primary " value="Create">
				 				</div>
						</div>
				 	</div>
				</form>
		</div>





	  <footer  class="footer-distributed">
	        <div class="footer-left">
			<h3>Company<span>Logo</span></h3>
			<p class="footer-company-name">Company Name @ 2020</p>
		</div>
		<div class="footer-center">
			<div>
				<i class="fa fa-map-marker"></i>
				<p><span>444 S. Cedros Ave</span>Solana Beach, California</p>	
			</div>
			<div>
				<i class="fa fa-phone"></i>
				<p>+1.555.555.5555</p>

			</div>
			<div>
			       <i class="fa fa-envelope"></i>
			       <p><a href="mailto:support@company.com">support@comapny.com</a></p>
			</div>

 		</div>
		<div class="footer-right">
			<p class="footer-company-about">
			<span>About the Company</span>
			Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet. </p>
			
			<div class="footer-icons">

			   <a href="#"><i class="fa fa-facebook"></i></a>
			   <a href="#"><i class="fa fa-twitter"></i></a>
			   <a href="#"><i class="fa fa-github"></i></a>
			</div>
		</div>
          </footer>
	</body>

 </html>

