<?php
$host = 'localhost';
$dbname = 'reliefdb';
$username = 'root';
$password = '';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*debugger
else{
    echo "connected";
}*/

?>