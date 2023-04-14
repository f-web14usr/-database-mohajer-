<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iranshop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn ->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("مشکلی در اتصال به وجود آمده".$conn-> connect_error);
}


