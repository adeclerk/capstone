<html>
<head>
</head>

<body>
  <?php
    include 'LlticDbConnection.inc.php';

    $connection = EmployeeTable;
    $connection->printEmployees();


   ?>
</body>

</html>