<?php

include 'header.php';
include 'database.php'; 
session_start();

if (!isset($_SESSION['Phone'])) {
    header("Location: login.php");
    exit();}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Sender</title>
</head>
<body>
    <div style="max-height:max-content;">
    <br>
    <a href="Sendmoney.php">
        <button>Send Money</button><br>
    </a>

    <a href="Sendrelief.php">
        <button>Send Relief Items</button><br>
    </a>
    <a href="AreaRequest.php">
        <button>Send Requested Orders</button>
    </a>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <input type="submit" name="logout" value="Log Out">
    </form>
    </div>
</body>
</html>
<?php 


    
if(isset($_POST["logout"])){
    mysqli_close($conn);
    session_destroy() ;
    header ("Location: login.php");
}
include 'footer.html';
?>