<?php 
    include 'DBconnection.php';
	$firstName =$lastName =$gender = $dobN = $religion = $presentAdd = $permanetAdd = $phoneNum = $email = $userName = $password = "";
	$isValid = true;

	$firstNameErr = $lastNameErr = $genderErr = $dobNErr = $religionErr = $presentAddErr = $permanetAddErr = $phoneNumErr = $emailErr = $userNameErr = $passwordErr = "";

	$successfulMessage = $errorMessage = "";

	if($_SERVER['REQUEST_METHOD'] === "POST") {
		
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$gender = $_POST['gender'];
		$dobN = $_POST['dob'];
		$religion = $_POST['religion'];
		$presentAdd = $_POST['presentadd'];
        $permanetAdd = $_POST['permanetadd'];
        $phoneNum = $_POST['phonenum'];
        $email = $_POST['email'];

		$userName = $_POST['username'];
		$password = $_POST['password'];

		if(empty($firstName)) {
			$firstNameErr = "First name can not be empty!";
			$isValid = false;
		}
		if(empty($lastName)) {
			$lastNameErr = "Last name can not be empty!";
			$isValid = false;
		}
		if(empty($gender)) {
			$genderErr = "Gender can not be empty!";
			$isValid = false;
		}
		if(empty($dobN)) {
			$dobNErr = "Date of Birth can not be empty!";
			$isValid = false;
		}
		if(empty($religion)) {
			$religionErr = "Religion can not be empty!";
			$isValid = false;
		}
		if(empty($presentAdd )) {
			$presentAddErr = "Present Address can not be empty!";
			$isValid = false;
		}
		if(empty($permanetAdd )) {
			$permanetAddErr = "Permanet Address can not be empty!";
			$isValid = false;
		}
		if(empty($phoneNum)) {
			$phoneNumErr = "Phone Number can not be empty!";
			$isValid = false;
		}
		if(empty($email)) {
			$emailErr = "E-mail can not be empty!";
			$isValid = false;
		}
		if(empty($userName)) {
			$userNameErr = "Username can not be empty!";
			$isValid = false;
		}
		if(empty($password)) {
			$passwordErr = "Password can not be empty!";
			$isValid = false;
		}
		if($isValid) {
			$firstName = test_input($firstName);
            $lastName  = test_input($lastName);
            $gender = test_input($gender);
            $dobN      = test_input($dobN);
            $religion = test_input($religion);
            $presentAdd= test_input($presentAdd);
            $permanetAdd = test_input($permanetAdd);
            $phoneNum  = test_input($phoneNum);
            $email = test_input($email);
			$userName = test_input($userName);
			$password = test_input($password);

			$response = register($userName, $password);
			if($response) {
				$successfulMessage = "Successfully saved.";
			}
			else {
				$errorMessage = "Error while saving.";
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

	<form action="" method="POST">
		<fieldset>
			<legend>Registration Form:</legend>

			<label for="firstname">First Name:</label>
			<input type="text" name="firstname" id="firstname">
			<span style="color:red"><?php echo $firstNameErr; ?></span>

			<br><br>

			<label for="lastname">Last Name:</label>
			<input type="text" name="lastname" id="lastname">
			<span style="color:red"><?php echo $lastNameErr; ?></span>

			<br><br>
			<p> Gender </p> 
	<input type="radio" id="male"name="gender"value="male">
	<span><?php if(isset($radio_error))echo $radio_error; ?></span>
	<label for="male">Male</label><br>
	<input type="radio" id="female"name="gender"value="female">
	<label for="female">Female</label>
		 <span style="color:red"><?php echo $genderErr ?></span>
		<br><br>
			<label style="color:black" for="dob">Date of birth:</label>
 	        <input type="date" id="dob"name="dob">
 	        <span style="color:red"><?php echo $dobNErr; ?></span>	
 	        <br><br>
 	        <label style="color:black">Religion:</label> 
                            <select name="religion"> 
                                <option value="" selected disabled>--Select--</option>
                                <option <?php echo $religion=='Muslim'?"selected":"" ?> value="Muslim">Muslim</option> 
                                <option <?php echo $religion=='Hindu'?"selected":"" ?> value="bussiness">Hindu</option>
                                <option <?php echo $religion=='Buddha'?"selected":"" ?> value="teacher">Buddha</option>
                                <option <?php echo $religion=='Christian'?"selected":"" ?> value="teacher">Christian</option>
                            </select> 
                        
                        <span style="color:red"><?php echo $religionErr ?></span>

 	        <br><br>
		</fieldset>
		<fieldset>
			<legend>Contact Infromation:</legend>

 	        <label for="presentadd">Present Address:</label>
			<input type="text" name="presentadd" id="presentadd">
			<span style="color:red"><?php echo $presentAddErr; ?></span>

			<br><br>

			<label for="permanetadd">Permanent Address:</label>
			<input type="text" name="permanetadd" id="permanetadd">
			<span style="color:red"><?php echo $permanetAddErr; ?></span>

			<br><br>

			<label for="phonenum">Phone:</label>
			<input type="tel" name="phonenum" id="phonenum">
			<span style="color:red"><?php echo $phoneNumErr; ?></span>
			<br><br>
             <label for="email">Email:</label>
 	         <input type="email" id="email"name="email">
 	         <span style="color:red"><?php echo $emailErr; 

 	         ?>
			<br><br>
			
 	 </fieldset>
 	 <fieldset>
 	 	<legend>Account Information:</legend>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username">
			<span style="color:red"><?php echo $userNameErr; ?></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red"><?php echo $passwordErr; ?></span>

			
</fieldset>
<br><br>
			<input type="submit" name="submit" value="Submit">
		
	</form>

	<p style="color:green;"><?php echo $successfulMessage; ?></p>
	<p style="color:red;"><?php echo $errorMessage; ?></p>


	<p>Back to <a href="login.php">Login</a></p>

</body>
</html>