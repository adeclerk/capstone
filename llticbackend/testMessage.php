<?php
require ('classes/class.Message.php');


$msg = new Message();
$cur = $msg->read(0);
print $cur;

?>