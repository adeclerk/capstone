<html>
	<head>
	<link href="views/view.portal.main.css" rel="stylesheet" type="text/css">
		<title>LLTIC Inc, Portal Main</title>
	</head>
	<body>
	<div id='header'>
		<div id="logo">
		LLTIC, Inc.
		</div>

	</div>
	<div id='main'>
				<?php 
				foreach($this->template->content as $cont)
					$cont->invoke();
					?>
	
	</div>
	</body>
</html>