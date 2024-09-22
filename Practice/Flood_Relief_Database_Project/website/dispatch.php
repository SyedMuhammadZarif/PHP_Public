<?php
    include("database.php");
    if(isset($_POST["dispatch"])){
        $need = "SELECT * FROM item";
        $all = mysqli_query($conn, $need);
    
        if(mysqli_num_rows($all) > 0){
            while($row = mysqli_fetch_assoc($all)){
                $user = $row["username"];
                $water = $row["water"]; 
                $food = $row["food"];
                $cloth = $row["cloth"];
                $medical = $row["medical"];
    
                if($water == 0 && $food == 0 && $cloth == 0 && $medical == 0){
                    continue;
                }
    
                if ($water > 0) {
                    $changew = "UPDATE item_stock p SET p.Quantity_in_stock = (p.Quantity_in_stock - $water) WHERE p.Item_name = 'Water'";
                    mysqli_query($conn, $changew);
                }
                if ($food > 0) {
                    $changef = "UPDATE item_stock p SET p.Quantity_in_stock = (p.Quantity_in_stock - $food) WHERE p.Item_name = 'Food'";
                    mysqli_query($conn, $changef);
                }
                if ($cloth > 0) {
                    $changec = "UPDATE item_stock p SET p.Quantity_in_stock = (p.Quantity_in_stock - $cloth) WHERE p.Item_name = 'Cloths'";
                    mysqli_query($conn, $changec);
                }
                if ($medical > 0) {
                    $changem = "UPDATE item_stock p SET p.Quantity_in_stock = (p.Quantity_in_stock - $medical) WHERE p.Item_name = 'Bandages'";
                    mysqli_query($conn, $changem);
                }
    
                if ($water > 0) {
                    $wchange = "UPDATE item p SET p.water = (p.water - $water) WHERE p.username = '$user'";
                    mysqli_query($conn, $wchange);
                }
                if ($food > 0) {
                    $fchange = "UPDATE item p SET p.food = (p.food - $food) WHERE p.username = '$user'";
                    mysqli_query($conn, $fchange);
                }
                if ($cloth > 0) {
                    $cchange = "UPDATE item p SET p.cloth = (p.cloth - $cloth) WHERE p.username = '$user'";
                    mysqli_query($conn, $cchange);
                }
                if ($medical > 0) {
                    $mchange = "UPDATE item p SET p.medical = (p.medical - $medical) WHERE p.username = '$user'";
                    mysqli_query($conn, $mchange);
                }
    
                echo "Successfully Dispatch the items! Now items are out for delivery.<br>";
                echo "Dispatched items for user: $user<br>";
                echo "Water: $water, Food: $food, Cloth: $cloth, Medical: $medical<br><br>";
            }
        } else {
            echo "No items to dispatch.";
        }
    }

    if(isset($_POST["track"])){
        header("Location: tracking.php");
    }
    if(isset($_POST["confirm"])){
        $items = "SELECT * FROM item_stock";
        $result = mysqli_query($conn, $items);
    
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "Item: " . $row["Item_name"] . " - Quantity remaining: " . $row["Quantity_in_stock"] . "<br>";
            }
        } else {
            echo "No items found in stock.";
        }
    }
    
    mysqli_close($conn);

    if(isset($_POST["back"])){
        header("Location: admin.php");
    }
    
    if(isset($_POST["logout"])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispatch</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        label {
            font-size: 18px;
            color: #555;
            display: block;
            margin: 15px 0;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .back-btn, .logout-btn {
            background-color: #f44336;
        }

        .back-btn:hover, .logout-btn:hover {
            background-color: #e41e1e;
        }

        .info {
            text-align: center;
            margin-top: 15px;
        }

        .success-message {
            color: green;
            text-align: center;
            margin-top: 10px;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dispatch Panel</h1>
        <form action="dispatch.php" method="post">
            <label>Dispatch items To User:</label>
            <input type="submit" name="dispatch" value="Tap To Dispatch">
            <label>Update the tracking status:</label>
            <input type="submit" name="track" value="Status Change">
            <label>Remaining Total Items:</label>
            <input type="submit" name="confirm" value="Check Items">
            <label>Go to the admin home page:</label>
            <input type="submit" name="back" value="Go Back" class="back-btn">
            <label>For Logging out:</label>
            <input type="submit" name="logout" value="Log Out" class="logout-btn">
        </form>
        <?php
            if(isset($success_message)) {
                echo "<div class='success-message'>$success_message</div>";
            }

            if(isset($error_message)) {
                echo "<div class='error-message'>$error_message</div>";
            }
        ?>
    </div>
</body>
</html>
