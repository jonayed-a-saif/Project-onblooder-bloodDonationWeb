<?php include 'header.php'?>
<div class="main-content">
        <section class="section">
          <div class="section-body">
           

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                       <h5>Personal Information</h5>
                    <!--<a href="all_donors.php" class="btn btn-primary">Donor List</a>-->
                  </div>
                  <div class="card-body">
                <form method="POST" action="store_user.php" enctype="multipart/form-data">
                 <div class="row">
                      <div class="col-md-6">
                      
                     <div class="form-group">
                        <label >Name:</label>
                        <input type="text" class="form-control"  name="name" required>
                    </div>
             
                     <div class="form-group">
                        <label >User Name:</label>
                        <input type="text" class="form-control"  name="user_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="username" required>
                    </div>
            
                     <div class="form-group">
                        <label>Phone Number:</label>
                        <input type="number" class="form-control"  name="phone" required>
                    </div>
                    <div class="form-group">
                            <label for="country">Country:</label>
                            <select class="form-control" id="country" name="country" required>
                                <option value="">Select Country</option>
                                <option value="Bangladesh" selected>Bangladesh</option>
                            </select>
                    </div>
                    <div class="form-group row mb-4">
                            <label class="form-label">Division</label>
                                <select class="form-control" name="division">
                                 <?php
    $sql = "SELECT DISTINCT division FROM address ORDER BY id DESC";
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
                                    <?php

                                        $sql = "SELECT DISTINCT district FROM address order by id DESC";
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
                                    <?php

                                        $sql = "SELECT * FROM address order by id DESC";
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
                         <textarea class="summernote"  name="address" required></textarea>
                    </div>     
                    <div class="form-group">
                        <label>Occupation:</label>
                        <input type="text" class="form-control"  name="occupation" required>
                    </div>  
                    <div class="form-group">
                        <label>Company/Location:</label>
                        <input type="text" class="form-control"  name="company" required>
                    </div>
                     
                     
                      
                  </div>
                    <div class="col-md-6">
                        <div class="form-group row mb-4">
                            <label class="form-label">Blood Group</label>
                                <select class="form-control" name="blood_group">
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
                            <select class="form-control" name="gender" default>
                                <option selected>Select Gender</option>
                                <option >Male</option>
                                    <option >Female</option>
                                    <option >Other</option>
                            </select>
                    </div>
                     <div class="form-group">
                        <label>Religion:</label>
                        <input type="text" class="form-control"  name="religion" required>
                    </div>
                     <div class="form-group">
                        <label>Profession:</label>
                        <input type="text" class="form-control"  name="profession" required>
                    </div>    
                     <div class="form-group">
                        <label >Total Donate Time:</label>
                        <input type="number" class="form-control"  name="total_donate" required>
                    </div>
             
                     <div class="form-group">
                        <label >Image:</label>
                        <input type="file" class="form-control"  name="fileToUpload" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Date-Of-Birth:</label>
                        <input type="date" class="form-control" id="email" name="date_of_birth" required>
                    </div>
            
                     <div class="form-group">
                        <label>Last Donate:</label>
                        <input type="date" class="form-control"  name="last_donate" required>
                    </div>
                  
                    <div class="form-group">
                        <label>About You:</label>
                        
                         <textarea class="summernote"  name="about_you" required></textarea>
                    </div>  
                    <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirm_password" required>
                            <div id="passwordHelpBlock" class="form-text">
                              Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                            </div>
                    </div>
                 
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary" value="Upload Image" type="submit" >Apply Now</button>
                        </div>
                    </div>
                 </div>
                </form>
            </div>
        </div>
    </div>
             
                        
                    
                  </div>
                </div>
              </div>
            </div>

      </div>
      <script>
    // JavaScript for password confirmation
    var password = document.getElementById("password");
    var confirmPassword = document.getElementById("confirmPassword");

    function validatePassword() {
      if (password.value != confirmPassword.value) {
        confirmPassword.setCustomValidity("Passwords do not match");
      } else {
        confirmPassword.setCustomValidity("");
      }
    }

    password.onchange = validatePassword;
    confirmPassword.onkeyup = validatePassword;
  </script>
<?php include 'footer.php'?>