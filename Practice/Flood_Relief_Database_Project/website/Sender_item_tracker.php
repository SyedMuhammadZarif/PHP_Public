<?php
include 'database.php';
include 'header.php';
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
    <title>RELIEF TRACKING</title>
    <style>
        body {
            font-family: 'Calibri', sans-serif;
            
            color: white; /* Make all text white */
            text-align: center; /* Center align text */
        }
        
        label {
            display: block;
            margin: 20px 0 10px;
        }

        input[type="search"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.2); /* Transparent input */
            color: white; /* Input text color */
            backdrop-filter: blur(5px);
        }

        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.5); /* Semi-transparent submit button */
            color: white; /* Button text color */
            cursor: pointer;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background: rgba(255, 255, 255, 0.7); /* Button hover effect */
        }

        .result {
            
            margin-top: 20px;
        }
    </style>
</head>
<body>
  <div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="searchform">
        <label>Enter Tracking Number:</label>
        <input type="search" name="searchkey" placeholder="Your Tracking Number" required>
        <input type="submit" value="Search">
    </form>
  </div>  

  <div class="result">
  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $searchkey = $_POST["searchkey"];
        
        // Query to select item_id, quantity, and received from the table based on relief_id
        $sql = "SELECT item_id, quantity, received FROM relief_item_sent_ WHERE relief_id = $searchkey";
        $result = mysqli_query($conn, $sql);

        // Check if the query returned any results
        if ($result && mysqli_num_rows($result) > 0) {
            // Loop through all rows returned by the query
            while ($row = mysqli_fetch_assoc($result)) {
                // Assign each column value to variables
                $item_id = $row['item_id'];
                $quantity = $row['quantity'];
                $received = $row['received'];

                switch ($item_id) {
                    case 1:
                        $item_id = 'Bandages';
                        break;
                    case 2:
                        $item_id = 'Water';
                        break;
                    case 3:
                        $item_id = 'Clothes';
                        break;
                    case 4:
                        $item_id = 'Food';
                        break;
                } 

                // Single line else if statement
                $received = ($received == 1) ? 'Yes' : 'No';

                // Display each item_id, quantity, and received
                echo "<div>Item Type: " . htmlspecialchars($item_id) . "</div>";
                echo "<div>Quantity: " . htmlspecialchars($quantity) . "</div>";
                echo "<div>Received: " . htmlspecialchars($received) . "</div><br>";
            }
        } else {
            // Handle case where no results are returned
            echo "<div>No records found for relief_id = " . htmlspecialchars($searchkey) . "</div>";
        }
    }
  ?>
  </div>
</body>
</html>
