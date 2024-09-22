<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Endeavour</title>
    <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Arial', sans-serif;
        }

        .background {
            /* Background image (you can replace the src value with your image URL) */
            background: url('https://akm-img-a-in.tosshub.com/indiatoday/images/story/202408/bangladesh-flood-315258422-16x9_0.jpg?VersionId=UJbgKmlbjLrvCYSrj4eAosnLdGfJiuq8&size=690:388') no-repeat center center/cover;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .glass-box {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            max-width: 700px;
            width: 90%;
            color: #ffffff;
            text-align: center;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Styling for h1 and paragraph */
        h1 {
            font-size: 2.5em;
            font-weight: 700;
            color:green;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            line-height: 1.6;
            color: white;
        }

        @media only screen and (max-width: 768px) {
            h1 {
                font-size: 2em;
            }

            p {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="glass-box">
            <h1>About Us</h1>
            <p>
                Welcome to <strong>Endeavour</strong>. Our mission is to bring relief to everyone in need, no matter where they are. 
                We believe in swift action, compassionate aid, and making a difference in the lives of those affected by crises. 
                Through collaboration, dedication, and innovation, we aim to reach every corner of the world and offer support where it’s needed most.
            </p>
        </div>
    </div>
</body>
</html>
