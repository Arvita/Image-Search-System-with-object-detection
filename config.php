<?php
$mysqli = new mysqli("localhost", "root", "", "dm_imgse_amel");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}
?>
