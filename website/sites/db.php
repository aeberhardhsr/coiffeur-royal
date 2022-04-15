<?php
//$servername =   "192.168.178.144";
$servername =   "localhost";
$db_user =      "newuser";
$db_password =  "password";
$db_name =      "coiffeur_royal";
$port =         "3306";

// Create connection
$db_conn = mysqli_connect($servername, $db_user, $db_password, $db_name, $port);

// Check connection
if (!$db_conn) {
    die("DB Connection failed because of: ". mysqli_connect_error());
}
//echo "DB Connection established"
?>