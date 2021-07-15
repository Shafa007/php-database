<?php
    require 'DBinsert.php';
	$username = $password = "";
	$isValid = true;

	$usernameErr  = $passwordErr = "";

	$successfulMessage = $errorMessage = "";

	if($_SERVER['REQUEST_METHOD'] === "POST") {

		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(empty($username)) {
			$usernameErr = "Username can not be empty!";
			$isValid = false;
		}
		if(empty($password)) {
			$passwordErr = "Password can not be empty!";
			$isValid = false;
		}

		if($isValid) {
			if(strlen($username) > 6){
				$usernameErr = "Username can not be upper than 10 characters!";
			$isValid = false;
		}
			if(strlen($password) > 8){
				$passwordErr = "Password max size 8 characters!";
			$isValid = false;
		}
		if($isValid){
			$username = test_input($username);
			$password = test_input($password);

			$response = register($username, $password);
			if($response) {
				$successfulMessage = "Successfully saved.";
			}
			else {
				$errorMessage = "Error while saving.";
			}
		}
	}
}
	function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>
</head>
<body style="background-color: #ABEBC6 ">

	<h1>Registration Form</h1>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
 	 <fieldset>
 	 	<legend>Account Information:</legend>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username" value="<?php echo $username; ?>">
			<span style="color:red"><?php echo $usernameErr; ?></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red"><?php echo $passwordErr; ?></span>

			
</fieldset>
<br><br>
			<input type="submit" name="submit" value="Register">
		
	</form>

	<p style="color:green;"><?php echo $successfulMessage; ?></p>
	<p style="color:red;"><?php echo $errorMessage; ?></p>


	<p>Back to <a href="login.php">Login</a></p>

</body>
</html>