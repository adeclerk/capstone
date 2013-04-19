<html>
<head>
  <title>Add Employee</title>
</head>

<body>
 <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')
  {
   // Create connection	
    // server, user, password, database
    connection= new mysqli("192.168.1.102","admin","llticewok","lltic");

    // Check connection
    if (connection->connect_errno)
       	{
 		echo "Failed to connect to MySQL: " . connection->connect_erro;
 }	}
else
{
  
}



?>

</body>