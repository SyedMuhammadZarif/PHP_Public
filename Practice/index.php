
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Place</title>
</head>
<body align = "center">
    <br>
        <?php
        //Naming a variable and Printing it
        $shop = "Pizza Place";
        $username = "Syed";
        $numorders = 21;
        $points = $numorders*15;
        echo "{$shop}<br>"; 
        echo "Hello {$username}!<br> Welcome to Pizza Place!";
        echo "<br>You have ordered {$numorders} times!";
        echo "<br><br> Your total points are: {$numorders}x 15 = {$points} points! ";
        ?>  
</body>
</html>