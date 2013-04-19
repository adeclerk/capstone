<html>
<head>
<title>LLTIC Login</title>
</head>

<body>
  <?php

error_reporting(E_ALL);
require once 'Session.inc.php';
require once 'LlticDbConnection.inc.php';
$session = new Session;
if ($_SERVER['REQUEST_METHOD'] === 'POST')
  {
    $employeeData = new EmployeeTable;
    $userFound = $employeeData->hasUser($_POST['username']);
    if($userFound == False)
      {
	print "Login error: Invalid Username.";
	exit();
      }

    // check if password is valid
    $user = $employeeData->findByUsername($_POST['username']);

    if($user->getPassword() == md5("ewokllticsalt:".$_POST['password']))
      {
      print "LOGIN SUCCESSFUL";
      }
    else
      {
	print "Login error: Invalid Password.";
	exit();
      }
    
  }
else
  {
    print "<form action=\"login.php\" method=\"post\">
            <fieldset>
                    <legend>Login</legend>
                    Username: <input type=\"text\" name=\"username\"> </br>
                    Password: <input type=\"text\" name=\"password\"> </br>
                    <input type=\"submit\" name=\"formSubmit\" value=\"Submit\">
            </fieldset>
           </form>";
  }

	?>
</body>

</html>