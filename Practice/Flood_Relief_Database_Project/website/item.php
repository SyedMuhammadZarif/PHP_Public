<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Relief Items</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            margin-bottom: 5px;
            color: #555;
        }
        input[type="checkbox"] {
            margin-right: 10px;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Submit the relief items you need:</h2>
        <form action="item.php" method="post">
            <div class="form-group">
                <input type="checkbox" name="water" value="Water">
                <label>Water:</label>
                <input type="number" name="wnumber" placeholder="How many" min="0">
            </div>
            <div class="form-group">
                <input type="checkbox" name="food" value="Food">
                <label>Food:</label>
                <input type="number" name="fnumber" placeholder="How many" min="0">
            </div>
            <div class="form-group">
                <input type="checkbox" name="cloth" value="Clothings">
                <label>Clothings:</label>
                <input type="number" name="cnumber" placeholder="How many" min="0">
            </div>
            <div class="form-group">
                <input type="checkbox" name="medical" value="Medical Items">
                <label>Medical Items:</label>
                <input type="number" name="mnumber" placeholder="How many" min="0">
            </div>
            <input type="submit" name="confirm" value="Confirm">
        </form>
    </div>
</body>
</html>
<?php
    session_start();
    $foreign = $_SESSION["username"];
    if(isset($_POST["water"])){
        $wnumber = $_POST["wnumber"];
    }
    else{
        $wnumber = 0;
    }
    if(isset($_POST["food"])){
        $fnumber = $_POST["fnumber"];
    }
    else{
        $fnumber = 0;
    }
    if(isset($_POST["cloth"])){
        $cnumber = $_POST["cnumber"];
    }
    else{
        $cnumber = 0;
    }
    if(isset($_POST["medical"])){
        $mnumber = $_POST["mnumber"];
    }
    else{
        $mnumber = 0;
    }
if(($wnumber != 0) || ($fnumber!=0) || ($cnumber != 0) || ($mnumber!=0)){
    if(isset($_POST["confirm"])){
        $sql = "INSERT INTO item (username, water, food, cloth, medical, Start, Delivered)
        VALUES ('$foreign','$wnumber', '$fnumber', '$cnumber', '$mnumber',0 ,0)";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("Location: affected.php");
    }


}

?>