<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<form action="addEmployee.php" method="post" enctype="application/x-www-form-urlencoded" name="employee">
	<fieldset>
    	<legend>Name</legend>
        First:<input name="firstName" type="text" /><br />
        Last:<input name="lastName" type="text"/>
     </fieldset>
     Email: <input name="email" type="text" /><br/>
     <fieldset>
     	<legend>User Details</legend>
     	Username: <input name="username" type="text" /><br/>
        Password: <input name="password" type="password" /><br/>
     </fieldset>
     Phone: <input name="phone" type="text" />
     <input name="formSubmit" type="submit" />
     
</form>
</body>
</html>