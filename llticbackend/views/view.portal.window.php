<div id='<?php print $this->windowname; ?>' class='window'>
	<div class='windowtitle'>
	<?php print $this->windowtitle; ?>
	</div>
	<div class='windowcontent' id='<?php print $this->windowname . "_content"?>'>
	<?php print $this->windowcontent->render(); ?>
	</div>
</div>