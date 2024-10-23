<?php 
include('login.php'); // Includes Login Script
    if (!isset($_SESSION['login_user'])) {
        header("location: signin.php"); // Redirecting To Profile Page
    }

include 'header.php'; 
include 'session.php';
 $id=$_GET['id'];
  $sql = "SELECT * FROM user where username='$login_session'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                    $name=$row['name'];
                    $phone=$row['phone'];
                     $username=$row['username'];
                     $password=$row['password'];
                     $confirm_password=$row['confirm_password'];
                    $country=$row['country'];
                    $division=$row['division'];
                    $district=$row['district'];
                    $upazila=$row['upazila'];
                    $thana=$row['thana'];
                    $address=$row['address'];
                    $occupation=$row['occupation'];
                    $company=$row['company'];
                    $blood_group=$row['blood_group'];
                    $gender=$row['gender'];
                    $religion=$row['religion'];
                    $profession=$row['profession'];
                    $total_donate=$row['total_donate'];
                    $date_of_birth=$row['date_of_birth'];
                    $last_donate=$row['last_donate'];
                    $about_you=$row['about_you'];
                    $image=$row['image'];
                    
                                                       
            }}
            
            
            

?>



<section class="pt-100 pb-100 position-relative z-index section--bg">
    <div class="container">
        <div class="row">
            <div class="card-body">
                 <form method="POST" action="update_account.php" enctype="multipart/form-data">
                 <div class="row mt-4 mb-4">
                      <div class="col-md-6">
                      
                     <div class="form-group">
                        <label >Name:</label>
                        <input type="text" class="form-control"  name="name" value="<?php echo $name ?>"    >
                    </div>
             
                    <!-- <div class="form-group">-->
                    <!--    <label >User Name:</label>-->
                    <!--    <input type="text" class="form-control"  name="user_name"  value="<?php echo $username ?>" readonly>-->
                    <!--</div>-->
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="username" value="<?php echo $username ?>" readonly>
                    </div>
            
                     <div class="form-group">
                        <label>Phone Number:</label>
                        <input type="number" class="form-control"  name="phone" value="<?php echo $phone ?>" >
                    </div>
                    <div class="form-group">
                            <label for="country">Country:</label>
                            <select class="form-control" id="country" name="country" required>
                                <option value="<?php echo $country ?>"><?php echo $country ?></option>
                                <option value="">Select Country</option>
                                <option value="Bangladesh" selected>Bangladesh</option>
                            </select>
                    </div>
                    <div class="form-group row mb-4">
                            <label class="form-label">Division</label>
                                <select class="form-control" name="division">
                                     <option value="<?php echo $division ?>"><?php echo $division ?></option>
                                 <?php
                                $sql = "SELECT DISTINCT division FROM address ORDER BY division ASC";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                            ?>
                                <option><?php echo $row['division']?></option>
                            <?php 
                                    }
                                }
                            ?>

                                </select>
                        </div>
                   <div class="form-group row mb-4">
                            <label class="form-label">District</label>
                                 
                                <select class="form-control" name="district">
                                    <option value="<?php echo $district ?>"><?php echo $district ?></option>
                                    <?php

                                        $sql = "SELECT DISTINCT district FROM address order by district ASC";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                    ?>
                                <option><?php echo $row['district']?></option>
                                <?php }}?>
                              
                                </select>
                        </div>
                   <div class="form-group row mb-4">
                            <label class="form-label">Upazila</label>
                                <select class="form-control" name="upazila">
                                    <option value="<?php echo $upazila ?>"><?php echo $upazila ?></option>
                                    <?php

                                        $sql = "SELECT DISTINCT upozila FROM address order by upozila ASC";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                    ?>
                                <option><?php echo $row['upozila']?></option>
                                <?php }}?>
                              
                                </select>
                        </div>
                     <div class="form-group row mb-4">
                            <label class="form-label">Thana</label>
                                
                                <select class="form-control" name="thana">
                                     <option value="<?php echo $thana ?>"><?php echo $thana ?></option>
                                    <?php

                                        $sql = "SELECT * FROM address order by id DESC";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                    ?>
                                <option><?php echo $row['thana']?></option>
                                <?php }}?>
                              
                                </select>
                        </div>

                        
                     <div class="form-group">
                        <label>Address:</label>
                         <textarea class="summernote"  name="address" required><?php echo $address ?></textarea>
                    </div>     
                    <div class="form-group">
                        <label>Occupation:</label>
                        <input type="text" class="form-control"  name="occupation" value="<?php echo $occupation ?>"  >
                    </div>  
                    <div class="form-group">
                        <label>Company/Location:</label>
                        <input type="text" class="form-control"  name="company" value="<?php echo $company ?>" >
                    </div>
                     
                     
                      
                  </div>
                    <div class="col-md-6">
                        <div class="form-group row mb-4">
                            <label class="form-label">Blood Group</label>
                                <select class="form-control" name="blood_group">
                                     <option value="<?php echo $blood_group ?>"><?php echo $blood_group ?></option>
                                    <?php

                                        $sql = "SELECT * FROM blood order by id DESC";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                    ?>
                                <option><?php echo $row['bloodGroup']?></option>
                                <?php }}?>
                              
                                </select>
                        </div>
                     <div class="form-group">
                            <label>Gender:</label>
                            <select class="form-control" name="gender" >
                                 <option value="<?php echo $gender ?>"><?php echo $gender ?></option>
                               
                                <option value="Male" >Male</option>
                                    <option value="Female" >Female</option>
                                    <option value="Other" >Other</option>
                            </select>
                    </div>
                     <div class="form-group">
                        <label>Religion:</label>
                        <input type="text" class="form-control"  name="religion"  value="<?php echo $religion ?>" >
                    </div>
                     <div class="form-group">
                        <label>Profession:</label>
                        <input type="text" class="form-control"  name="profession" value="<?php echo $profession ?>" >
                    </div>    
                     <div class="form-group">
                        <label >Total Donate Time:</label>
                        <input type="number" class="form-control"  name="total_donate" value="<?php echo $total_donate ?>" >
                    </div>
             
                     <div class="form-group">
                        <label >Image: <b>(Required)</b></label>
                        <input type="file" class="form-control"  name="fileToUpload" required>
                        <img src="img/user/<?php echo $image ?>" alt="" width="50" height="50">
                    </div>
                    <div class="form-group">
                        <label for="email">Date-Of-Birth:</label>
                        <input type="date" class="form-control" id="email" name="date_of_birth" value="<?php echo $date_of_birth ?>" >
                    </div>
            
                     <div class="form-group">
                        <label>Last Donate:</label>
                        <input type="date" class="form-control"  name="last_donate" value="<?php echo $last_donate ?>" >
                    </div>
                  
                    <div class="form-group">
                        <label>About You:</label>
                        
                         <textarea class="summernote"  name="about_you" required><?php echo $about_you ?></textarea>
                    </div>  
                    <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password ?>" >
                    </div>
                    <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirm_password" value="<?php echo $confirm_password ?>" >
                            <div id="passwordHelpBlock" class="form-text">
                              Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                            </div>
                    </div>
                 
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary" value="Upload Image" type="submit" >Update Now</button>
                        </div>
                    </div>
                 </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php include('footer.php');?>