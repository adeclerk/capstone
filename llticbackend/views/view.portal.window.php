<script type="text/javascript">
function minimize(windowID)
{
	var window = document.getElementById(windowID+"_content");
	window.style.display = 'none';
}
</script>
<div id='<?php print $this->windowname; ?>' class='window'>
	<div class='windowtitle' id='<?php print $this->windowname; ?>_title' onclick="minimize(<?php print $this->windowname; ?>)">
	<?php print $this->windowtitle; ?>
	</div>
	<div class='windowcontent' id='<?php print $this->windowname . "_content"?>'>
	<?php print $this->windowcontent->render(); ?>
	</div>
</div>