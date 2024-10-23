<?php

$server_name        =   "localhost";
$user_name          =   "onbloode_onbloode_admin";
$user_password      =   "123@jAmifree";
$database_name      =   "onbloode_blood	";

$conn = mysqli_connect($server_name, $user_name, $user_password, $database_name);

if ($conn) {

    // echo "Connected!";

} else {

    echo "Connection Failed!" . mysqli_connect_error();
}
