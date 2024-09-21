<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANK PORTAL</title>

</head>
<?php include'header.php' ?>
<body>
    <div align = "center">
    <img style="height: 200px;" src="https://static.vecteezy.com/system/resources/previews/013/948/616/non_2x/bank-icon-logo-design-vector.jpg">
    <br>
    <!--Form for payemnt-->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="select">
        <label for= "number">ACCOUNT NUMBER</label>
        <input type="tel" id="amount" name="number" max="16" min="16" required><br><br>

        <label for="amount">Amount</label>

            <input type="number" id="amount" name="amount" max="25000" min="50" required>
            <br><br>
            <button type="submit">Submit</button>
    </form> 
</div>
</body>
</html>
