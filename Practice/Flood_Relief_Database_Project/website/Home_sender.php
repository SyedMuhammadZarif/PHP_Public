<?php
include 'header.php';
include 'database.php'; 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Sender</title>
    <style>
        /* Reset styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Calibri', sans-serif;
            
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: white;
        }

        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1); /* Transparent flex container */
            backdrop-filter: blur(5px); /* Glass effect */
            padding: 20px;
        }

        a {
            margin: 10px 0;
        }

        button {
            padding: 10px 20px;
            font-size: 1.1em;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.2); /* Transparent glass effect */
            color: #fff;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        button:hover {
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 1.1em;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.2); /* Glass effect */
            color: #fff;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        footer {
            width: 100%;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            text-align: center;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="Sendmoney.php">
            <button>Send Money</button>
        </a>
        <a href="item_aid_send.php">
            <button>Send Relief Items</button>
        </a>
        <a href="AreaRequest.php">
            <button>Send Requested Orders</button>
        </a>
        <a href="Sender_item_tracker.php">
            <button>Track Your Sent Relief</button>
        </a>
        <a href="Sender_trackers_list.php">
            <button>Find Your Tracking Numbers</button>
        </a>

        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <input type="submit" name="logout" value="Log Out">
        </form>
        
    </div>
    <?php 
    if (isset($_POST["logout"])) {
        mysqli_close($conn);
        isset($_SESSION['username'])==False;
        session_destroy();
        
        
    }
    include 'footer.php';
    ?>

    <footer>
        &copy; <?php echo date("Y"); ?> Endeavour Relief Distribution System
    </footer>

</body>
</html>