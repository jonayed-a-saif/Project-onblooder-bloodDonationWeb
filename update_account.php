<?php
include 'admin/config.php';
include 'session.php';
echo $login_session;
 $id=$_GET['id'];

echo $name = ($_REQUEST['name']);
echo $phone = ($_REQUEST['phone']);
echo $password = ($_REQUEST['password']);
echo $confirm_password = ($_REQUEST['confirm_password']);
echo $country = ($_REQUEST['country']);
echo $division = ($_REQUEST['division']);
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
echo $date_of_birth = ($_REQUEST['date_of_birth']);
echo $last_donate = ($_REQUEST['last_donate']);
echo $about_you = ($_REQUEST['about_you']);


// image upload 
$target_dir = "img/user/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}


// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
 $image= htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
  if($image==null){
    
     $sql = "SELECT * FROM user where username=$login_session";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    $image=$row['image'];
                                }}
}






 


 $sql = "UPDATE user SET 
        name='$name',
          phone='$phone',
            password='$password',
              confirm_password='$confirm_password',
                country='$country',
                  division='$division',
                                      district='$district',
                      upazila='$upazila',
                        thana='$thana',
                          address='$address',
                                                      occupation='$occupation',
 company='$company',
  blood_group='$blood_group',
  gender='$gender',
  religion='$religion',
  profession='$profession',
  total_donate='$total_donate',
  last_donate='$last_donate',
  about_you='$about_you',
  image='$image'

 
  
 WHERE username='$login_session'";

if (mysqli_query($conn, $sql)) {
    // $text="Coupon Updated";
      header("Location: edit_account.php");
} else {
    $error = mysqli_error($conn);
    echo "ERROR: Could not able to execute  $error";
}

 

?>