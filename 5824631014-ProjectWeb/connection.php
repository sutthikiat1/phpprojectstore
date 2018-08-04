<?php
    $host = "localhost";
    $db = "prj-5824631014";
    $use = "root";
    $pwd = "";
    $port = "3306";
    $conn = mysqli_connect($host,$use,$pwd,$db,$port);
    if (!$conn) {
        die('Could not connect to MySQL: ' . mysqli_connect_error());
    }
    mysqli_query($conn, 'SET NAMES \'utf8\'');
?>
