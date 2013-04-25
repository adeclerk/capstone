<script type="text/javascript">
function minimize(windowID)
{
	var window = document.getElementById(windowID+"_content");
	window.style.display = 'none';
}
</script>

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
				//foreach($this->content as $cont)
					//$cont->render();
					$this->content->render();
					?>
	
	</div>
	</body>
</html>