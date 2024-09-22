<?php
    include("database.php");
    session_start();
    $foreign = $_SESSION["username"];
    
    // Initialize message variable
    $message = "";

    if(isset($_POST["submit"])){
        $stname = $_POST["user"];
        if (!empty($stname)) {
            $update = "UPDATE users SET status = 'ready' WHERE username = '$stname'";
            mysqli_query($conn, $update);
            $message = "Successfully updated the status.";
        } else {
            $message = "Please enter a username.";
        }
    }

    if(isset($_POST["unsubmit"])){
        $stname = $_POST["user"];
        if (!empty($stname)) {
            $update = "UPDATE users SET status = 'not ready' WHERE username = '$stname'";
            mysqli_query($conn, $update);
            $message = "Successfully defied the status.";
        } else {
            $message = "Please enter a username.";
        }
    }

    if(isset($_POST["back"])){
        header("Location: admin.php");
        exit;
    }

    if(isset($_POST["logout"])){
        header("Location: login.php");
        exit;
    }

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
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
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            font-size: 16px;
            color: #555;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 16px;
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
        .message {
            margin-top: 20px;
            font-size: 16px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Tracking Status</h1>
        <form action="tracking.php" method="post">
            <label>Enter username to update status:</label>
            <input type="text" name="user" placeholder="Enter username">
            <input type="submit" name="submit" value="Submit">
            <input type="submit" name="unsubmit" value="Defy"><br>
            <label>Go back to the admin home page:</label>
            <input type="submit" name="back" value="Go Back" class="back-btn"><br>
            <label>You can log out from here:</label>
            <input type="submit" name="logout" value="Log Out" class="logout-btn"><br>
        </form>
        <!-- Show message below all buttons -->
        <div class="message">
            <?php echo $message; ?>
        </div>
    </div>
</body>
</html>
