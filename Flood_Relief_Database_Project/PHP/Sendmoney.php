<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php' ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Money</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="select">
        <label>Select Payment Method: </label><br>
        <input type="radio" name="payment" value="bkash" required> Bkash<br>
        <input type="radio" name="payment" value="bank" required> Bank Transfer<br><br>
        <input type="submit" value="Select">
    </form>

    <?php 
    // Check if the form was submitted using POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the selected option
        $choice = $_POST['payment'];

        // Redirect based on the selected option
        if ($choice == 'bkash') {
            header("Location: bkash.php"); // Redirect to bkash.php
            exit();
        } elseif ($choice == 'bank') {
            header("Location: bank.php"); // Redirect to bank.php
            exit();
        }
    }
    ?>
</body>
</html>
