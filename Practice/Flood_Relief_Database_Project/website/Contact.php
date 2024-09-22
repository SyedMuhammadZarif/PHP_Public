<?php
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: 'Calibri', sans-serif;
            color: white; /* Default text color */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start; /* Start from the top */
            min-height: 100vh; /* Full viewport height */
            margin: 0; /* Remove default margin */
   
            background-size: cover; /* Cover the entire background */
        }

        .header-spacing {
            height: 20px; /* Adjust space between header and body */
        }

        .contact-form {
            background: rgba(255, 255, 255, 0.1); /* Semi-transparent background */
            border-radius: 10px;
            padding: 20px;
            backdrop-filter: blur(10px); /* Glass effect */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            width: 300px; /* Set a fixed width for the form */
            text-align: center;
            margin-top: 20px; /* Space below the header */
        }

        h3 {
            margin-bottom: 20px;
        }

        .phone-numbers {
            margin-top: 20px;
        }

        p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="header-spacing"></div> <!-- Space between header and body -->
    <div class="contact-form">
        <h3>Contact Us</h3>
        <p>If you need assistance, you can reach us at the following numbers:</p>
        <div class="phone-numbers">
            <p>+880 1712-345678</p>
            <p>+880 1823-456789</p>
            <p>+880 1912-345670</p>
            <p>+880 1783-456712</p>
            <p>+880 1725-678901</p>
        </div>
    </div>
</body>
</html>
