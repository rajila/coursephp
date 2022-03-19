<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "12345678";
    $databaseName = "dbmovies";

    $connectionDB = mysqli_connect($serverName, $userName, $password, $databaseName);

    if (!$connectionDB) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>