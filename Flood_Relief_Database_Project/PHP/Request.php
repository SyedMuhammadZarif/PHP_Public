<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relief Request</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Fill up all the Information</h2>
        <form action="relief_request.php" method="post">
            <label>Your Area details:</label><br>
            
            <label>Division:</label><br>
            <input type="text" name="division" placeholder="Enter your division" required> <br>

            <label>Zilla:</label><br>
            <input type="text" name="zilla" placeholder="Enter your zilla" required> <br>

            <label>Village:</label><br>
            <input type="text" name="village" placeholder="Enter your village" required> <br>

            <label>House No:</label><br>
            <input type="text" name="house" placeholder="Enter your house number" required> <br>

            <input type="submit" name="submit" value="Confirm"> <br>
            <p class="note">NB: You will be redirected to the item page after confirmation.</p>
        </form>

        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <input type="submit" name="back" value="Go Back">
        </form>
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <input type="submit" name="logout" value="Log Out">
        </form>

    </div>
    <div class="error-messages">
        <?php
            session_start();

            if (!isset($_SESSION['Phone'])) {
                header("Location: login.php");
                exit();
            }


            if (isset($_POST["Phone"])) {
                $Phone = $_POST['Phone'];
            }
            if (isset($_POST["submit"])) {
                $division = $_POST["division"];
                $zilla = $_POST["zilla"];
                $vill = $_POST["village"];
                $house = $_POST["house"];

                // Check if all fields are filled
                if (!empty($division) && !empty($zilla) && !empty($vill) && !empty($house)) {
                    $sql = "INSERT INTO releif_request (Request_id, Phone_number)
                            VALUES (CONCAT(phone_number, '_', NOW()), $Phone)";
                            
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    header("Location: item.php");
                }
            }
            if(isset($_POST["back"])){
                header("Location: affected.php");
            }

            if(isset($_POST["logout"])){
                mysqli_close($conn);
                session_destroy() ;
                header ("Location: login.php");
            }
            
        ?>
    </div>
</body>
</html>

<style>
/* General body styling */
body {
    background-color: #f0f4f8;
    font-family: 'Arial', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Container styling */
.container {
    background-color: #ffffff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    width: 100%;
    text-align: center;
}

/* Heading styling */
h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

/* Label styling */
label {
    font-size: 16px;
    color: #555;
    display: block;
    margin: 10px 0 5px;
    text-align: left;
}

/* Input fields styling */
input[type="text"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
}

/* Submit button styling */
input[type="submit"] {
    background-color: #28a745;
    color: white;
    padding: 10px;
    width: 100%;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 15px;
}

input[type="submit"]:hover {
    background-color: #218838;
}

/* Note styling */
.note {
    font-size: 14px;
    color: #888;
    margin-top: 10px;
}

/* Error message styling */
.error-messages {
    margin-top: 20px;
}

.error {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}

/* Responsive design */
@media (max-width: 480px) {
    .container {
        width: 90%;
    }
}
</style>