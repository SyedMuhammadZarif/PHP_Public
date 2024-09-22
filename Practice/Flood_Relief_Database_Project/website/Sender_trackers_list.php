<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Links</title>
</head>
<body>
    
</body>
</html>
<?php
include 'database.php';
include 'header.php';
session_start();

if (!isset($_SESSION['username'])){
    header("Location: login.php");
         exit();}
    $username = $_SESSION["username"];
    $query = "SELECT * FROM sender_tracking WHERE contact_number=$username";
    $result = mysqli_query($conn,$query);
    
    // Check if the query returned any results
    if ($result && mysqli_num_rows($result) > 0) {
        // Loop through all rows returned by the query
        echo "<span style='color: white;'>Here are your Tracking Links:</span><br>";
        while ($row = mysqli_fetch_assoc($result)) {
            // Assign each column value to variables
            $tracker = $row['tracking_number'];
            echo "<span style='color: white;'>$tracker</span><br>";
        }
        
        }
?>

