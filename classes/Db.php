<?php
class Db{
	
protected function connect(){
$servername = "localhost";
$username = "username";
$password = "password";

try {
    $conn = new PDO("mysql:host=localhost;dbname=employee", 'root', '');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //echo "Connected successfully";
    return $conn;
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	
}

}
?>