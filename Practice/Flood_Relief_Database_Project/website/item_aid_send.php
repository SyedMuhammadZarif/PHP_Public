<?php
// Start output buffering
ob_start();

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
    <title>MedAid</title>
    <style>
        body {
            margin: 0; /* Remove default body margin */
            font-family: 'Calibri', sans-serif;
            color: white; /* Default text color */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start; /* Start from the top */
            height: 100vh; /* Full viewport height */
        }

        header {
            margin-bottom: 20px; /* Gap between header and body */
        }

        form {
            background: rgba(255, 255, 255, 0.1); /* Semi-transparent background */
            border-radius: 10px;
            padding: 20px;
            backdrop-filter: blur(10px); /* Glass effect */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 300px; /* Set a fixed width for the form */
        }

        label {
            display: block;
            margin: 15px 0 5px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.2); /* Transparent input */
            color: white; /* Input text color */
            backdrop-filter: blur(5px);
        }

        button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.5); /* Semi-transparent button */
            color: white; /* Button text color */
            cursor: pointer;
            transition: background 0.3s;
            width: 100%; /* Full width buttons */
            margin-top: 10px; /* Space between buttons */
        }

        button:hover {
            background: rgba(255, 255, 255, 0.7); /* Button hover effect */
        }

        p {
            color: red; /* Error message color */
        }
    </style>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h3>Send Items</h3>

    <label for="bandage_amount">Bandage:</label>
    <input type="number" id="bandage_amount" name="bandage_amount" min="0" value="0" placeholder="Quantity">

    <label for="clothes_amount">Clothes:</label>
    <input type="number" id="clothes_amount" name="clothes_amount" min="0" value="0" placeholder="Quantity">

    <label for="water_amount">Water:</label>
    <input type="number" id="water_amount" name="water_amount" min="0" value="0" placeholder="Quantity">

    <label for="food_amount">Food:</label>
    <input type="number" id="food_amount" name="food_amount" min="0" value="0" placeholder="Quantity">

    <button type="submit">Submit</button>
</form>

<a href="Sendrelief.php"><button>Go Back</button></a>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the quantities
    $bandage_quantity = $_POST['bandage_amount'];
    $cloth_quantity = $_POST['clothes_amount'];
    $water_quantity = $_POST['water_amount'];
    $food_quantity = $_POST['food_amount'];

    // Check if all quantities are zero
    if ($bandage_quantity == 0 && $cloth_quantity == 0 && $water_quantity == 0 && $food_quantity == 0) {
        echo "<p>Please enter at least one item to send.</p>";
    } else {
        // Prepare the SQL queries
        $now = new DateTime();
        $now = $now->format('YmdHis');
        $ID = $now . $_SESSION['username']; // Generate unique ID using date-time and username
        $_SESSION['ID'] = $ID;

        if ($bandage_quantity > 0) {
            $sql_bandage = "INSERT INTO `relief_item_sent_` (`relief_id`, `item_id`, `quantity`, `received`) VALUES ('$ID', '1', '$bandage_quantity', '0')";
            mysqli_query($conn, $sql_bandage);
        }

        if ($cloth_quantity > 0) {
            $sql_cloth = "INSERT INTO `relief_item_sent_` (`relief_id`, `item_id`, `quantity`, `received`) VALUES ('$ID', '3', '$cloth_quantity', '0')";
            mysqli_query($conn, $sql_cloth);
        }

        if ($water_quantity > 0) {
            $sql_water = "INSERT INTO `relief_item_sent_` (`relief_id`, `item_id`, `quantity`, `received`) VALUES ('$ID', '2', '$water_quantity', '0')";
            mysqli_query($conn, $sql_water);
        }

        if ($food_quantity > 0) {
            $sql_food = "INSERT INTO `relief_item_sent_` (`relief_id`, `item_id`, `quantity`, `received`) VALUES ('$ID', '4', '$food_quantity', '0')";
            mysqli_query($conn, $sql_food);
        }

        // Redirect to confirmation
        header("Location: confirmation.php");
        exit();
    }
}

include 'footer.php';

// End output buffering and flush output
ob_end_flush();
?>

</body>
</html>
