<?php
    include("database.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
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
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .logout {
            background-color: #f44336;
        }

        .logout:hover {
            background-color: #e41e1e;
        }

        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Panel</h1>
        <form action="admin.php" method="post">
            <label><input type="radio" name="check" value="track">Tracking Status</label>
            <label><input type="radio" name="check" value="sent">Dispatch</label>
            <input type="submit" name="confirm" value="Click to Open">
            <br>
            If you want to logout:
            <input type="submit" name="logout" value="Log Out" class="logout">
            <input type="submit" name="fulfill" value="FulFill" class="logout">
        </form>
        <?php
            if(isset($_POST["confirm"])){
                if(isset($_POST["check"])){
                    if($_POST["check"] == "track"){
                        header("Location: tracking.php");
                    }
                    if($_POST["check"] == "sent"){
                        header("Location: dispatch.php");
                    }
                } else {
                    echo "<div class='error'>Please select an option</div>";
                }
            }
            if(isset($_POST["logout"])){
                session_destroy();
                header("Location: login.php");
            }
            if(isset($_POST["fulfill"])){
                session_destroy();
                header("Location: fullfil.php");
            }
        ?>
    </div>
</body>
</html>
