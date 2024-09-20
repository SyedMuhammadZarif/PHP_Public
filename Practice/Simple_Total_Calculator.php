<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
</head>
<body>
    <form action="Simple_Total_Calculator.php" method="post">
        <label>Quantity: </label><br>
        <input type="number" name="qtt" placeholder="0" min="1" max="100"><br>
        
        <!--Here the value means whats inside the submit button-->
        <input type="submit" value="Add to cart"><br>

    </form>
</body>
</html>

<?php
    //if else statements are used here to check quantity and return feedback
    $quantity = $_POST["qtt"]; 
    if ($quantity<=0){
        echo "<br>Your cart is empty!";
    }
    else
    {$price = 5.99;
    $total = $price*$quantity;
    echo "<br>You have ordered {$quantity} pizza/s!<br>";
    echo "Your Total is: \${$total}!<br>";}
?>