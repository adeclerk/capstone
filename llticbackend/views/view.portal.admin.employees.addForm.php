<div style='text-align: left'>
<a href=''><-Back</a>
</div>
<form name="addemp" action="/portal/admin.php" method="post">
	<fieldset>
		<legend>User Details</legend>
		Username: <input type="text" name="username"><br/>
		Password: <input type="password" name="password1"><br/>
		Repeat Password: <input type="password" name="password2"><br/>
		Email: <input type="text" name="email"><br/>
		User Level
		<select name="userLevel">
			<option value="2"> 2 (Admin) </option>
			<option value="1"> 1 (Employee) </option>
		</select>
	</fieldset>
	<fieldset>
		<legend>Employee Details</legend>
		<fieldset>
			<legend>Name</legend>
			First: <input type='text' name="firstName"><br/>
			Last: <input type='text' name="lastName"><br/>
		</fieldset>
		Country: <input type='text' name="country"><br/>
		Salary: <input type="text" name="salary"><br/>
		Phone: <input type="text" name="phone"><br/>
		Hire Date: <input type="text" name="hireDate">
	</fieldset>
	<input type='submit' name='formSubmit' value='Submit'>
</form>