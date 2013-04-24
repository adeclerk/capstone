<html>
	<head>
	<link href="views/view.portal.main.css" rel="stylesheet" type="text/css">
		<title>LLTIC Inc, Admin Portal</title>
	</head>
	<body>
	<div id='header'>
		<div id="logo">
		LLTIC, Inc.
		</div>

	</div>
	<div id='main'>
				<?php 
				foreach($this->content as $cont)
					$cont->render();
					//$this->content->render();
					var_dump($this);
					?>
	
	</div>
	</body>
</html>