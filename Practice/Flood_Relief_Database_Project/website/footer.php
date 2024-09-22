<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<footer>
    All Rights Reserved 2024
    <br>
    Endeavour Group
    <?php 
    include 'database.php';
    $sql = "SELECT SUM(amount) AS total_amount FROM funds_received";
    $result = mysqli_query($conn, $sql);

    if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total_amount = $row['total_amount'];
    } 
    else {
    $total_amount = 0; // In case of an error or no records
    }
    echo "<br>Total Funds Recieved: {$total_amount} BDT";
    ?>
</footer>
</html>