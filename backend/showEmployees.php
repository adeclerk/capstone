<html>
<head>
</head>

<body>
  <?php
    include 'LlticDbConnection.inc.php';

    $connection = new LlticDbConnection;
    $result = $connection->query("SELECT * FROM `employees`");
    $row = $result->fetch_assoc();
    print $row['id'];


   ?>
</body>

</html>