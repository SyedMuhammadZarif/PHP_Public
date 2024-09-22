<?php
// Include database connection
include 'database.php'; 
include 'header.php';

// Start session to get the sender's username
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Initialize variables for error and success messages
$error = '';
$success = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selected_requests'])) {
    // Check if the address is provided
    if (empty($_POST['address'])) {
        $error = "Please enter your address.";
    } else {
        // Get the sender's phone from the session
        $sender_phone = $_SESSION['username'];
        $sender_address = htmlspecialchars($_POST['address']);
        $selected_requests = $_POST['selected_requests']; // Array of selected request_ids

        // Loop through selected request IDs
        foreach ($selected_requests as $request_id) {
            // Insert into relief_order_sent table
            $sql_insert = "INSERT INTO relief_order_sent (Sender_Phone, Sender_Address, request_id, delivered) 
                           VALUES ('$sender_phone', '$sender_address', '$request_id', '0')";
            if (!mysqli_query($conn, $sql_insert)) {
                $error = "Error inserting into relief_order_sent: " . mysqli_error($conn);
                break; // Exit the loop if there's an error
            }

            // Update the 'start' and 'Delivered' columns in the item table
            $sql_update = "UPDATE item SET start = 1, Delivered = 0 WHERE item_id = '$request_id'";
            if (!mysqli_query($conn, $sql_update)) {
                $error = "Error updating item table: " . mysqli_error($conn);
                break; // Exit the loop if there's an error
            }
        }

        // Redirect to Home_sender.php after successful submission
        if (empty($error)) {
            header("Location: Home_sender.php");
            exit();
        }
    }
}

// Fetch all requests from the database where start = 0 (requests not yet started)
$sql = "SELECT username, item_id, water, food, cloth, medical FROM item WHERE start = 0";
$result = mysqli_query($conn, $sql);

// Check if the query executed successfully
if ($result === false) {
    echo "Error: " . mysqli_error($conn);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Relief</title>
    <style>
        body {
            font-family: 'Calibri', sans-serif;
            color: white;
            background-color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
            backdrop-filter: blur(10px);
            width: 400px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
        h3 {
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: none;
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }
        input[type="submit"]:hover {
            background: rgba(255, 255, 255, 0.4);
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

<h3>Relief Item Requests</h3>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <ul>
        <?php
        // Check if there are any requests in the table
        if (mysqli_num_rows($result) > 0) {
            // Loop through all the requests and display them with checkboxes
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>";
                echo "<input type='checkbox' name='selected_requests[]' value='" . htmlspecialchars($row['item_id']) . "'>";
                echo "<label><strong>Username:</strong> " . htmlspecialchars($row['username']) . "</label><br>";
                echo "<strong>Request ID:</strong> " . htmlspecialchars($row['item_id']) . "<br>";
                echo "<strong>Water:</strong> " . htmlspecialchars($row['water']) . "<br>";
                echo "<strong>Food:</strong> " . htmlspecialchars($row['food']) . "<br>";
                echo "<strong>Cloth:</strong> " . htmlspecialchars($row['cloth']) . "<br>";
                echo "<strong>Medical:</strong> " . htmlspecialchars($row['medical']) . "<br>";
                echo "</li><br>";
            }
        } else {
            // If no requests are found
            echo "<p>No requests found.</p>";
        }
        ?>
    </ul>
    
    <!-- Input for the sender's address -->
    <label for="address">Enter Your Address:</label>
    <input type="text" id="address" name="address" placeholder="Your Address" required>
    
    <!-- Submit button -->
    <input type="submit" value="Send Relief">
    
    <!-- Display error message -->
    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
</form>

</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>