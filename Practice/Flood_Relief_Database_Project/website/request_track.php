<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Track</title>
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
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
        }
        h2 {
            color: #333;
        }
        label {
            font-size: 16px;
            color: #555;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .back-btn {
            background-color: #f44336;
        }
        .back-btn:hover {
            background-color: #e41e1e;
        }
        .message {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Product Status:</h2>
        <form action="request_track.php" method="post">
            <label>Your Status:</label><br><br>
            <label>For show the current status, tap on the show button below:</label><br><br>
            <input type="submit" name="show" value="Show Status"><br>
            <input type="submit" name="back" value="Go Back" class="back-btn"><br>
            <div class="message">
                <?php
                    session_start();
                    $foreign = $_SESSION["username"];
                    $sql = "SELECT * FROM users WHERE username = '$foreign'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        if (isset($_POST["show"])) {
                            if ($row["status"] == "ready") {
                                echo "Get Ready! Your product is {$row["status"]} for delivery.<br>";
                            } elseif ($row["status"] == "not ready") {
                                echo "Sorry, your product is {$row["status"]} for delivery.<br>";
                            }
                        }
                    }
                    mysqli_close($conn);
                ?>
            </div>
        </form>
    </div>
</body>
</html>

<?php
    if (isset($_POST["back"])) {
        header("Location: affected.php");
        exit;
    }
?>
