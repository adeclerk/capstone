<html>
<head>
	<title><?php print $this->title; ?></title>

	<style type="text/css">
		#header
		{
			text-align: left;
			width: 100%;
		}
		
		#logo
		{
		
		}
	</style>
</head>

<body>
	<div id='header'>
		<div id='logo'>
	 		<b>LLTIC</b> 
		</div>
	Admin Page
		<div id='rightHeader'>
			<a href='../logoutuser.php'>Logout</a>$nbsp; <?php print $this->loggedInUser; ?>
		</div>
	</div>

</body>

</html>