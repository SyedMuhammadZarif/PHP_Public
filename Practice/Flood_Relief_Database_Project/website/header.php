<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Reset styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Calibri', sans-serif;
            background: url('https://cdn.vectorstock.com/i/500p/29/64/dark-royal-green-gradient-seamless-pattern-vector-52062964.jpg') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: center;
        }

        .header {
            width: 100%;
            margin: 0;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: black;
        }

        .header h1 {
            color: white;
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .nav-buttons {
            margin-top: 10px;
        }

        .nav-buttons a, .nav-buttons button {
            margin: 0 10px;
            padding: 10px 20px;
            font-size: 1.1em;
            font-family: 'Calibri', sans-serif;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            backdrop-filter: blur(5px);
        }

        .nav-buttons a:hover, .nav-buttons button:hover {
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .nav-buttons a, .nav-buttons button {
            text-decoration: none;
            color: white;
        }

        hr {
            border: none;
            height: 2px;
            background-color: rgba(255, 255, 255, 0.2);
            width: 80%;
            margin: 20px auto;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2em;
                
                
            }

            .nav-buttons a, .nav-buttons button {
                color: #fff;
                font-size: 1em;
                padding: 8px 15px;
                
            }
        }
    </style>
<div class="header">
        <h1>Endeavour Relief Distribution System</h1><br>
        <div class="nav-buttons">
            <a href="Home_sender.php">
                Home
            </a>
            <a href="About.php">
                About us
            </a>
            <a href="Contact.php">
                Contact Us
            </a>
        </div>
    </div>
</head>
<body>
    
    
</body>
</html>
