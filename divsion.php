<?php
include 'admin/config.php';

$city_id =  $_POST['country_data'];

$city = "SELECT * FROM districts WHERE division_id  = $city_id";
$city_qry = mysqli_query($conn, $city);


$output = '<option value="">Select State</option>';
while ($row = mysqli_fetch_assoc($city_qry)) {
    $output .= '<option value="' . $city_row['id'] . '">' . $city_row['name'] . '</option>';
}
echo $output;
