<?php
    include 'header.php';
    
    include("database.php");
    session_start();
    
    // Initialize error message variable
    $error_message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["person"]) && !empty($_POST["username"]) && !empty($_POST["pass"])) {
            $person = $_POST["person"];
            $username = $_POST["username"];
            $pass = $_POST["pass"];

            
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                if ($row["username"] == $username && $row["password"] == $pass) {
                    $_SESSION["username"] = "$username";
                    if ($row["Flag"] == "requester") {
                        header("Location: affected.php");
                    } elseif ($row["Flag"] == "sender") {
                        header("Location: Home_sender.php");
                    } elseif ($row["Flag"] == "admin") {
                        header("Location: admin.php");
                    }
                } else {
                    $error_message = "Please provide the correct username/password.";
                }
            } else {
                $error_message = "No user found by that name.";
            }
        } else {
            $error_message = "Please provide the user type, username, and password correctly.";
        }

        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head >
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="form-container">
    <form action="" method="post" align = "center">
        <label>Please Select Login Option</label><br><br>
        <input type="radio" name="person" value="Affected person"> Affected person <br>
        <input type="radio" name="person" value="Sender person"> Sender person <br>
        <input type="radio" name="person" value="Admin"> Admin<br><br>

        <label>Username: </label>
        <input type="text" name="username">

        <label>Password: </label><br>
        <input type="password" name="pass">

        <input type="submit" name="login" value="Log In"><br>

        <!-- Error message container -->
        <div class="error-message">
            <?php
            // Display the error message if it's set
            if (!empty($error_message)) {
                echo $error_message;
            }
            ?>
        </div>
    </form>
</div>
</body>
</html>

<style>
    /* Style for body */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Container for the form */
form {
    background-color: rgba(0, 0, 0, 0.2);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    width: 300px;
}
.form-container {
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /*100vh makes it take 100% window height*/
}


/* Label styling */
label {
    color: white;
    font-weight: bold;
    margin-bottom: 10px;
    display: block;
   
}

/* Input field styling */
input[type="text"], 
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    transition: border-color 0.3s;
}

input[type="text"]:focus, 
input[type="password"]:focus {
    border-color: #4CAF50;
}

/* Radio button styling */
input[type="radio"] {
    margin-right: 5px;
}

form input[type="radio"] + label {
    display: inline-block;
    margin-right: 10px;
}

/* Submit button styling */
input[type="submit"] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

/* Add some space between form elements */
form > *:not(:last-child) {
    margin-bottom: 15px;
}

/* Style for error message */
.error-message {
    color: red;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;
}

</style>