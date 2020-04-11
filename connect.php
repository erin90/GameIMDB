<?php

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="game"; // Database name
$tbl_name="games"; // Table name
// Connect to server and select databse.
$dbcon=mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect");



?>