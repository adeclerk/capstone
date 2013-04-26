<script type="text/javascript">
function minimize(windowID)
{
	var window = document.getElementById(windowID+"_content");
	var windowTitle = document.getElementById(windowID+"_title");
	if(window.style.display == 'none')
	{
		window.style.display = 'inline';
		windowTitle.style.width = "auto";
	}
	else
	{
		window.style.display = 'none';
		windowTitle.style.width = "auto";
	}
}
</script>
<div id='<?php print $this->windowname; ?>' class='window'>
	<div class='windowtitle' id='<?php print $this->windowname; ?>_title' onclick='minimize("<?php print $this->windowname; ?>")'>
	<?php print $this->windowtitle; ?>
	</div>
	<div class='windowcontent' id='<?php print $this->windowname . "_content"?>'>
	<?php print $this->windowcontent->render(); ?>
	</div>
</div>