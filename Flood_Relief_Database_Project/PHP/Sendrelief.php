<?php
    include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Relief Item</title>
</head>
<body>
    Select the type of relief you want to send:
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="select">
        
        <input type="radio" name="reliefitem" value="Medical aid" required> Medical Aid<br>
        <input type="radio" name="reliefitem" value="Food aid" required> Food Aid<br>
        <input type="radio" name="reliefitem" value="Transport aid" required>Transportation<br><br>
        <input type="submit" value="Select">

    </form>
</body>
</html>

<?php

 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
       $item = $_POST["reliefitem"];
        switch ($item){
            case "Medical aid":
                echo "sex";
                header("Location: medical_aid.php");
                break;
            
    }
}
 include ("footer.html");
?>
   
</body>
</html>
