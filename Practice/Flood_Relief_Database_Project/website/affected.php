<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affected Page</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <div class="container">
        <button id="openPopup" class="popup-btn">Open Menu</button>
        <form action="affected.php" method="post" class="logout-form">
            <label for="logout">Logout:</label>
            <input type="submit" name="Logout" value="Log Out">
        </form>
    </div>

    <div id="popupMenu" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h2>Menu</h2>
            <a href="relief_request.php">Relief Request</a>
            <a href="request_track.php">Request Track</a>
        </div>
    </div>

    <?php
        

        if (isset($_POST["Logout"])) {
            session_destroy();
            header("Location: login.php");
        }
    ?>

    <script>
        // Get the popup
        var popup = document.getElementById("popupMenu");

        // Get the button that opens the popup
        var btn = document.getElementById("openPopup");

        // Get the <span> element that closes the popup
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the popup 
        btn.onclick = function() {
            popup.style.display = "block";
        }

        // When the user clicks on <span> (x), close the popup
        span.onclick = function() {
            popup.style.display = "none";
        }

        // When the user clicks anywhere outside of the popup, close it
        window.onclick = function(event) {
            if (event.target == popup) {
                popup.style.display = "none";
            }
        }
    </script>
</body>
</html>

<style> 
    /* General body styling */
body {
    background-color: #f0f4f8;
    font-family: 'Arial', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Container for the content */
.container {
    background-color: #ffffff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    text-align: center;
}

/* Popup button styling */
.popup-btn {
    background-color: #3498db;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    margin-bottom: 20px;
}

.popup-btn:hover {
    background-color: #2980b9;
}

/* Popup styling */
.popup {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

/* Popup content styling */
.popup-content {
    background-color: #fff;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    border-radius: 10px;
    width: 300px;
    text-align: center;
}

/* Close button styling */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

/* Link styling inside the popup */
.popup-content a {
    display: block;
    margin: 10px 0;
    font-size: 16px;
    text-decoration: none;
    color: #3498db;
    padding: 10px 0;
}

.popup-content a:hover {
    color: #2980b9;
}

/* Logout form styling */
.logout-form {
    margin-top: 20px;
}

.logout-form input[type="submit"] {
    background-color: #e74c3c;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.logout-form input[type="submit"]:hover {
    background-color: #c0392b;
}

</style>