<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!--Making the form-->
<body>
    <form align = "center" action="Login.php" method="post">
        <label>Contact Number: </label><br>
        <input type = "text" name = "login_num" placeholder="+8801234567890"> <br>
        <br>
        <label>Password: </label><br>
        <input type = "password" name = "pass"> <br><br>
        <input type = "submit" name = "login"> <br>
    </form>
</body>
</html>
<?php
    echo $_POST["login_num"] . "<br>";
    echo "<br>";
    echo $_POST["pass"]
?>