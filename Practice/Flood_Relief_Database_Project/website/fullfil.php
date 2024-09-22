<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relief Item Status Updater- Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://cdn.vectorstock.com/i/500p/29/64/dark-royal-green-gradient-seamless-pattern-vector-52062964.jpg') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            color: white; /* White text color */
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form, table {
            background: rgba(255, 255, 255, 0.1); /* Transparent white background */
            backdrop-filter: blur(10px); /* Glass effect */
            border-radius: 15px;
            padding: 20px;
            margin: 10px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5); /* Darker shadow for contrast */
            width: 80%;
            max-width: 600px;
        }
        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin: 5px;
            border: 1px solid rgba(255, 255, 255, 0.5); /* Transparent border */
            border-radius: 5px;
            width: calc(100% - 22px); /* Full width minus padding */
            background: rgba(255, 255, 255, 0.2); /* Slightly transparent background for inputs */
            color: white; /* White text color for inputs */
        }
        input[type="submit"] {
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid rgba(255, 255, 255, 0.3); /* Transparent border for table */
        }
        td {
            text-align: center; /* Center-align table data */
        }
    </style>
</head>
<body>

<h1>Check Relief Item Status</h1>

<!-- Form to input Relief ID -->
<form method="POST">
    <label for="relief_id">Enter Relief ID:</label>
    <input type="text" name="relief_id" required>
    <input type="submit" name="check_status" value="Check Status">
</form>

<!-- Display Unique Relief IDs -->
<h2>Unique Relief IDs</h2>
<table>
    <tr>
        <th>Relief ID</th>
    </tr>
    <?php
    include 'database.php'; // Include your database connection file

    // Fetch unique relief IDs
    $unique_query = "SELECT DISTINCT relief_id FROM relief_item_sent_";
    $unique_result = mysqli_query($conn, $unique_query);

    if ($unique_result && mysqli_num_rows($unique_result) > 0) {
        while ($row = mysqli_fetch_assoc($unique_result)) {
            echo "<tr><td>{$row['relief_id']}</td></tr>";
        }
    } else {
        echo "<tr><td>No unique Relief IDs found.</td></tr>";
    }
    ?>
</table>

<?php
// Check status when form is submitted
if (isset($_POST['check_status'])) {
    $relief_id = $_POST['relief_id'];

    // Fetch the status from the database
    $query = "SELECT * FROM relief_item_sent_ WHERE relief_id = '$relief_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table>
                <tr>
                    <th>Item ID</th>
                    <th>Quantity</th>
                    <th>Received</th>
                    <th>Action</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            $item_id = $row['item_id'];
            $quantity = $row['quantity'];
            $received = $row['received'];

            echo "<tr>
                    <td>$item_id</td>
                    <td>$quantity</td>
                    <td>" . ($received ? 'Yes' : 'No') . "</td>
                    <td>
                        <form method='POST'>
                            <input type='hidden' name='item_id' value='$item_id'>
                            <input type='hidden' name='relief_id' value='$relief_id'>
                            <input type='hidden' name='current_received' value='$received'>
                            <input type='submit' name='update_received' value='Mark as Received' " . ($received ? 'disabled' : '') . ">
                        </form>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No items found for this Relief ID.</p>";
    }
}

// Handle updating the received status
if (isset($_POST['update_received'])) {
    $item_id = $_POST['item_id'];
    $relief_id = $_POST['relief_id'];
    $current_received = $_POST['current_received'];

    if ($current_received == 0) {
        $update_query = "UPDATE relief_item_sent_ SET received = 1 WHERE item_id = '$item_id' AND relief_id = '$relief_id'";
        if (mysqli_query($conn, $update_query)) {
            echo "<p>Item marked as received successfully.</p>";
        } else {
            echo "<p>Error updating record: " . mysqli_error($conn) . "</p>";
        }
    }
}
?>

</body>
</html>