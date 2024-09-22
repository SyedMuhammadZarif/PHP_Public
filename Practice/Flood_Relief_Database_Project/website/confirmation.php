<?php
     include 'database.php'; 
     include 'header.php';
     
     session_start();
     

     if (!isset($_SESSION['username'])) {
         header("Location: login.php");
         exit();}

    $ID = $_SESSION['ID'];
    $username = $_SESSION['username'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Success!</title>
</head>
<body>
    <div align = "center" style="color: white;">
        <?php 
        echo "Relief Submission Request Created<BR>";
        echo "Here is your Tracking Link: {$ID} ";
        $sql = "INSERT INTO sender_tracking(tracking_number, contact_number) VALUES ($ID,$username)";
        if (mysqli_query($conn, $sql)){
            echo "<br>You can find your tracking links in the tracking section!<br><br>";
        }
        include 'footer.php';
         ?>
    </div>
    
</body>
</html>