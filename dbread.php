<?php 
require 'DBconnection.php';

    function register($userName, $password){
    	$conn = connect();
    	$sql = $conn -> prepare("INSERT INTO USER (username, password) VALUES (?,?)");

    	$sql -> bind_param("ss", $userName, $password);
    	$response = $sql -> execute();
    	$conn->close();
    	return $response;
    }

?>
