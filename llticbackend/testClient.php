<?php
require ('classes/class.Client.php');

$clientTable = new Client();

$clients = $clientTable->getAllClients();

print json_encode($clients);


?>
