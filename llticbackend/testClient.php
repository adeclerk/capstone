<?php
require ('classes/class.Client.php');

$clientTable = new Client();

$clients = $clientTable->getAllClients();

foreach($clients as $client)
	print $client;


?>