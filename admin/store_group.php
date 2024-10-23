<?php
include 'config.php';


echo $bloodGroup = ($_REQUEST['bloodGroup']);






 $sql = "INSERT INTO blood (bloodGroup) VALUES ('$bloodGroup')";

if (mysqli_query($conn, $sql)) {
    header("Location: all_group.php");
} else {
    $error = mysqli_error($conn);
    echo "ERROR: Could not able to execute  $error";
}

?>