<?php
    
    $db_user = "root";
    $db_pass = "";
    $db_server = "localhost";
    $db_name = "reliefdb";

    $conn = "";


    $conn = mysqli_connect($db_server, $db_user,
                        $db_pass, $db_name);

    
?>