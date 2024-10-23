<?php
include 'config.php';


echo $name = ($_REQUEST['name']);
echo $user_name = ($_REQUEST['user_name']);
echo $email = ($_REQUEST['email']);
echo $phone = ($_REQUEST['phone']);
echo $country = ($_REQUEST['country']);
echo $district = ($_REQUEST['district']);
echo $upazila = ($_REQUEST['upazila']);
echo $thana = ($_REQUEST['thana']);
echo $address = ($_REQUEST['address']);
echo $occupation = ($_REQUEST['occupation']);
echo $company = ($_REQUEST['company']);
echo $blood_group = ($_REQUEST['blood_group']);
echo $gender = ($_REQUEST['gender']);
echo $religion = ($_REQUEST['religion']);
echo $profession = ($_REQUEST['profession']);
echo $total_donate = ($_REQUEST['total_donate']);
echo $image = ($_REQUEST['image']);
echo $date_of_birth = ($_REQUEST['date_of_birth']);
echo $last_donate = ($_REQUEST['last_donate']);
echo $about_you = ($_REQUEST['about_you']);
echo $password = ($_REQUEST['password']);
echo $confirm_password = ($_REQUEST['confirm_password']);



$sql = "INSERT INTO user(name,user_name,email,phone,country,district,upazila,address,occupation,company,blood_group,gender,religion,profession,total_donate, image,date_of_birth,last_donate,about_you,password,confirm_password) VALUES ('$name','$user_name','$email','$phone','$country','$district','$upazila','$thana','$address','$occupation','$company','$blood_group','$gender','$religion','$profession','$total_donate','$image','$date_of_birth','$last_donate','$about_you','$password','$confirm_password')";

if (mysqli_query($conn, $sql)) {
    header("Location: donor.php");
} else {
    $error = mysqli_error($conn);
    echo "ERROR: Could not able to execute  $error";
}

?>