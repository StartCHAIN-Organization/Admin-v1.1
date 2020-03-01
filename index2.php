<?php
	
	require_once 'functions.php';
	
	$config=read_config();
	$chain=@$_GET['chain'];
	
	if (strlen($chain))
		$name=@$config[$chain]['name'];
	else
		$name='';

	set_multichain_chain($config[$chain]);
		
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>MultiChain Demo</title>
		<!--
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		-->
		<!-- <link rel="stylesheet" href="bootstrap.min.css">
		<link rel="stylesheet" href="styles.css">-->
		<link rel="stylesheet" href="main.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>
	<body>
		<header id="header">
			<div class="inner">
				<a href="./" class="logo">MultiChain Demo<?php if (strlen($name)) { ?> &ndash; <?php echo $name?><?php } ?></a>
				<nav id="nav">
					<a href="./?chain=<?php echo htmlspecialchars($chain)?>">Node</a>
					<a href="./?chain=<?php echo htmlspecialchars($chain)?>.createSample.php">Create Campaign</a>
					<a href="./?chain=<?php echo htmlspecialchars($chain)?>&page=permissions">Permissions</a>
					<a href="./?chain=<?php echo htmlspecialchars($chain)?>&page=issue">Issue Asset</a>
					<a href="./?chain=<?php echo htmlspecialchars($chain)?>&page=publish">Publish</a>
					<a href="./?chain=<?php echo htmlspecialchars($chain)?>&page=view">View Streams</a>
				</nav>
			</div>
		</header>

		<!-- Banner -->
			<section id="banner" style="background-image:url('banner.jpg')">
				<div class="inner">
					<h1>StartCHAIN: A Crowdfunding Platform<br /></h1>
					<ul class="actions">
						<li><a href="#" class="button alt">Start Campaign/Fund a Campaign</a></li>
					</ul>
				</div>
			</section>

		<!-- Two -->
			<section id="two">
				<div class="inner">
					<article>
						<div class="content">
							<header>
								<h3>Pellentesque adipis</h3>
							</header>
							<div class="image fit">
								<img src="crowdfunding.png" alt="" />
							</div>
							<p>Cumsan mollis eros. Pellentesque a diam sit amet mi magna ullamcorper vehicula. Integer adipiscin sem. Nullam quis massa sit amet lorem ipsum feugiat tempus.</p>
						</div>
					</article>
					<article class="alt">
						<div class="content">
							<header>
								<h3>Morbi interdum mol</h3>
							</header>
							<div class="image fit">
								<img src="crowdfunding.jpg" alt="" />
							</div>
							<p>Cumsan mollis eros. Pellentesque a diam sit amet mi magna ullamcorper vehicula. Integer adipiscin sem. Nullam quis massa sit amet lorem ipsum feugiat tempus.</p>
						</div>
					</article>
				</div>
			</section>

		<div class="container">
			<h1><a href="./">MultiChain Demo</a><?php if (strlen($name)) { ?> &ndash; <?php echo html($name)?><?php } ?></h1>
<?php
	if (strlen($chain)) {
		$name=@$config[$chain]['name'];
?>
			
			<nav class="navbar navbar-default">
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="./?chain=<?php echo html($chain)?>">Node</a></li>
						<li><a href="./?chain=<?php echo html($chain)?>&page=permissions">Permissions</a></li>
						<li><a href="./?chain=<?php echo html($chain)?>&page=issue" class="pair-first">Issue Asset</a></li>
						<li><a href="./?chain=<?php echo html($chain)?>&page=update" class="pair-second">| Update</a></li>
						<li><a href="./?chain=<?php echo html($chain)?>&page=send">Send</a></li>
						<li><a href="./?chain=<?php echo html($chain)?>&page=offer" class="pair-first">Create Offer</a></li>
						<li><a href="./?chain=<?php echo html($chain)?>&page=accept" class="pair-second">| Accept</a></li>
						<li><a href="./?chain=<?php echo html($chain)?>&page=create">Create Stream</a></li>
						<li><a href="./?chain=<?php echo html($chain)?>&page=publish">Publish</a></li>
						<li><a href="./?chain=<?php echo html($chain)?>&page=view">View Streams</a></li>

<?php
	if (multichain_has_smart_filters()) {
?>						

						<li><a href="./?chain=<?php echo html($chain)?>&page=txfilter" class="pair-first">Filters: Transaction</a></li>
						<li><a href="./?chain=<?php echo html($chain)?>&page=streamfilter" class="pair-second">| Stream</a></li>

<?php
	}
?>

					</ul>
				</div>
			</nav>

<?php
		switch (@$_GET['page']) {
			case 'label':
			case 'permissions':
			case 'issue':
			case 'update':
			case 'send':
			case 'offer':
			case 'accept':
			case 'create':
			case 'publish':
			case 'view':
			case 'txfilter':
			case 'streamfilter':
			case 'approve':
			case 'asset-file':
				require_once 'page-'.$_GET['page'].'.php';
				break;
				
			default:
				require_once 'page-default.php';
				break;
		}
		
	} else {
?>
			<p class="lead"><br/>Choose an available node to get started:</p>
		
			<p>
<?php
		foreach ($config as $chain => $rpc)
			if (isset($rpc['rpchost']))
				echo '<p class="lead"><a href="./?chain='.html($chain).'">'.html($rpc['name']).'</a><br/>';
?>
			</p>
<?php
	}
?>
		</div>
	</body>
</html>
