<?php 
	session_start();
	$userId = isset($_SESSION['uid']) ? $_SESSION['uid'] : ""; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
</head>
<body style="background-color: #CCD1D1 ">

	<h1>Welcome, <?php echo $userId; ?></h1>
	<br><br>
	<h2>
	<p align="right";>
    <a href="logout.php">Logout</a></h2></p><br>

    
</body>
</html>