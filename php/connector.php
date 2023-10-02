<?php
  session_start();
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'myfinalproject';

    $con = mysqli_connect($server, $username, $password, $database);
    if ($con->connect_error)
    {
        die("Connection failed: " . $con->connect_error);
    }
  
?>