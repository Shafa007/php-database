<?php 

    function connect(){
    $conn = new mysqli("localhost", "shafa007", "1111", "wtk");

    if($conn -> connect_errno){
    	die("Failed to connect...!!! ". $conn -> connect_error);
    }
    return $conn;
}
?>