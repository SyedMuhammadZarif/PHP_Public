<?php
include 'database.php';
session_start();

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANK PORTAL</title>

</head>
<?php include'header.php' ?>
<body><br>
    <div align = "center">
    <img style="height: 200px; border-radius : 30px;" src="https://static.vecteezy.com/system/resources/previews/013/948/616/non_2x/bank-icon-logo-design-vector.jpg">
    <br>
    <br><br>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="sent">
            <label for="bkash_number" style="color: white;">Account Number</label>
            <input type="tel" id="bkash_number" name="bkash_number" required><br><br>

            <label for="amount" style="color: white; ">Amount</label>
            <input type="number" id="amount" name="amount" max="25000" min="50" required><br><br>

            <button type="submit" style="width: 100px; background-color:rgba(255, 255, 255, 0.1); border-radius: 20px; height: 40px; border: 0; color: white; " >Send</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!isset($_SESSION["username"])) {
                echo "Session username number is not set.";
                exit;
            }

            $bank_acc_num = mysqli_real_escape_string($conn, $_POST["bank_acc_num"]);
            $amount = mysqli_real_escape_string($conn, $_POST["amount"]);
            $username = mysqli_real_escape_string($conn, $_SESSION["username"]);
            $time = new DateTime();
            $timey = $time->format("H:i:s Y-m-d");
            $timex = $time->format('YmdHis');
            $id = $timex . $username;

            $sql_BankTransfer = "INSERT INTO `funds_received` (`donation_id`, `Amount`, `Payment_Method`, `Payment_From`, `Payment_Date`) VALUES('$id', '$amount', 'BankTransfer', '$username', '$timey')";
            
            if (mysqli_query($conn, $sql_BankTransfer)) {
                echo "<p>Amount of $amount has been sent from Bank Account number $bank_acc_num.</p>";
            } else {
                echo "Error: " . $sql_BankTransfer . "<br>" . mysqli_error($conn);
            }
        }
        ?>
    </div>
</body>
</html>

