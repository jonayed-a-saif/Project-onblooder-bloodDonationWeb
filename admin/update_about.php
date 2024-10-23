<!--<?php-->
<!--include 'config.php';-->

<!-- $id=$_GET['id'];-->
<!--echo $title = ($_REQUEST['title']);-->
<!--echo $description = ($_REQUEST['description']);-->
<!--echo $link = ($_REQUEST['link']);-->


// image upload 
<!--$target_dir = "../img/about/";-->
<!--$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);-->
<!--$uploadOk = 1;-->
<!--$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));-->

// Check if image file is a actual image or fake image
<!--if(isset($_POST["submit"])) {-->
<!--  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);-->
<!--  if($check !== false) {-->
<!--    echo "File is an image - " . $check["mime"] . ".";-->
<!--    $uploadOk = 1;-->
<!--  } else {-->
<!--    echo "File is not an image.";-->
<!--    $uploadOk = 0;-->
<!--  }-->
<!--}-->

// Check if file already exists
<!--if (file_exists($target_file)) {-->
<!--  echo "Sorry, file already exists.";-->
<!--  $uploadOk = 0;-->
<!--}-->


// Allow certain file formats
<!--if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"-->
<!--&& $imageFileType != "gif" ) {-->
<!--  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";-->
<!--  $uploadOk = 0;-->
<!--}-->

// Check if $uploadOk is set to 0 by an error
<!--if ($uploadOk == 0) {-->
<!--  echo "Sorry, your file was not uploaded.";-->
// if everything is ok, try to upload file
<!--} else {-->
<!--  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {-->
<!--    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";-->
<!--  } else {-->
<!--    echo "Sorry, there was an error uploading your file.";-->
<!--  }-->
<!--}-->
<!-- $name= htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));-->
<!--if($name==null){-->
    
<!--     $sql = "SELECT * FROM about where id=$id";-->
<!--                            $result = $conn->query($sql);-->
<!--                            if ($result->num_rows > 0) {-->
                                // output data of each row
<!--                                while ($row = $result->fetch_assoc()) {-->
<!--                                    $name=$row['image'];-->
<!--                                }}-->
<!--}-->


<!-- $sql = "UPDATE about SET -->
<!--title='$title',-->
<!--description='$description',-->
<!--link='$link',-->
<!--image= '$name'-->

<!-- WHERE id='$id'";-->

<!--if (mysqli_query($conn, $sql)) {-->
    
<!--      header("Location: all_about.php");-->
<!--} else {-->
<!--    $error = mysqli_error($conn);-->
<!--    echo "ERROR: Could not able to execute  $error";-->
<!--}-->



<!--?>-->