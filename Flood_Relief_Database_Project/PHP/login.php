<?php
include("database.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post" align="center" required>
        <label>Please Select User Type First </label><br>
        <input type="radio" name="person" value="Affected person"> Affected person <br>
        <input type="radio" name="person" value="Sender person"> Sender person <br>
        <input type="radio" name="person" value="Admin"> Admin<br>
        <label>Phone Number: </label><br>
        <input type="text" name="Phone"><br>
        <label>Password: </label><br>
        <input type="password" name="pass"><br><br>
        <input type="submit" name="login" value="Log In"><br><br>
    </form>

<div align="center">
<br>
<?php
if(!empty($_POST["person"]) && !empty($_POST["Phone"]) && !empty($_POST["pass"])){

    $person = $_POST["person"];
    $Phone = $_POST["Phone"];
    $pass = $_POST["pass"];

    if ($person == "Affected person"){
        $sql = "SELECT * FROM affected_person WHERE Phone = '$Phone'";
    }
    elseif ($person == "Sender person")
    {
        $sql = "SELECT * FROM sender WHERE Phone = '$Phone'";

    }
    else{
        $sql = "SELECT * FROM admins WHERE Phone = '$Phone'";

    }
    $result = mysqli_query($conn, $sql);

    // Check for errors
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit; // Stop further execution if query fails
    }

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if($row["Phone"] == $Phone && $row["Password"] == $pass) {
            $_SESSION['Phone'] = $Phone;
            echo "Please select the correct $person for login <br>";
            if($person == "Affected person") {
                session_start();
                header("Location: affected.php");

            } elseif($person == "Sender person") {
                session_start();
                header("Location: Home_sender.php");
            } elseif($person == "Admin") {
                session_start();
                header("Location: admin.php");
            }
        } else {
            echo "Please give the authenticated user/pass";
        }
    } else {
        echo "Did not find any user by that name";
    }
} else {
    echo "please provide user/pass correctly";
}
mysqli_close($conn);
?>
</div>
</body>
</html>
