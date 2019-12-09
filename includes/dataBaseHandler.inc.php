<?php

$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "loginsystemtuts";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

if(!$conn) {
    // ob_clean();
    die("Connection failed: " . mysqli_connect_error());
}

?>