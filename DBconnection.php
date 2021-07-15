<?php 

  function connect(){
    $conn = new mysqli("localhost", "jilapi", "1111", "wtg");
    if($conn->connect_error){
    	die("Database connection failed..." . $conn->connect_error);
    }

    return $conn;
}

?>