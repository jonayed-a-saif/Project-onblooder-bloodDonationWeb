<?php include 'header.php';
 $id=$_GET['id'];
 $sql = "SELECT * FROM user where id=$id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                  
$title = $row['name'];
$user_name = $row['user_name'];
$email = $row['username'];
$phone = $row['phone'];
$country = $row['country'];
$division = $row['division'];
$district = $row['district'];
$upazila = $row['upazila'];
$thana = $row['thana'];
$address = $row['address'];
$occupation = $row['occupation'];
$company = $row['company'];
$blood_group = $row['blood_group'];
$gender = $row['gender'];
$religion = $row['religion'];
$profession = $row['profession'];
$total_donate = $row['total_donate'];
$date_of_birth = $row['date_of_birth'];
$last_donate = $row['last_donate'];
$about_you = $row['about_you'];
$image=$row['image'];
                                  
                                  

}}?>

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
                <form method="POST" action="update_user.php?id=<?php echo $id?>" enctype="multipart/form-data">
                 <div class="row">
                      <div class="col-md-6">
                      
                     <div class="form-group">
                        <label >Name:</label>
                        <input type="text" class="form-control"  name="name"  value="<?php echo $title?>">
                    </div>
             
                     <div class="form-group">
                        <label >User Name:</label>
                        <input type="text" class="form-control"  name="user_name"  value="<?php echo $user_name?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="username"  value="<?php echo $email?>">
                    </div>
            
                     <div class="form-group">
                        <label>Phone Number:</label>
                        <input type="number" class="form-control"  name="phone" value="<?php echo $phone?>"     >
                    </div>
                    <div class="form-group">
                            <label for="country">Country:</label>
                            <select class="form-control" id="country" name="country" required>
                                <option> <?php echo $country?></option>
                                <option value="Bangladesh" selected>Bangladesh</option>
                            </select>
                    </div>
                    <div class="form-group row mb-4">
                            <label class="form-label">Division</label>
                                <select class="form-control" name="division">
                                     <option> <?php echo $division?></option>
                                    <?php

                                        $sql = "SELECT * FROM address order by id DESC";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                    ?>
                                <option><?php echo $row['division']?></option>
                                <?php }}?>
                              
                                </select>
                        </div>
                   <div class="form-group row mb-4">
                            <label class="form-label">District</label>
                                <select class="form-control" name="district">
                                     <option> <?php echo $district?></option>
                                    <?php

                                        $sql = "SELECT * FROM address order by id DESC";
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
                                     <option> <?php echo $upazila?></option>
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
                                     <option> <?php echo $thana?></option>
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
                         <textarea class="summernote"  name="address" required>  <?php echo $address?></textarea>
                    </div>     
                    <div class="form-group">
                        <label>Occupation:</label>
                        <input type="text" class="form-control"  name="occupation" value="<?php echo $occupation?>">
                    </div>  
                    <div class="form-group">
                        <label>Company/Location:</label>
                        <input type="text" class="form-control"  name="company" value="<?php echo $company?>">
                    </div>
                     
                     
                      
                  </div>
                    <div class="col-md-6">
                        <div class="form-group row mb-4">
                            <label class="form-label">Blood Group</label>
                                <select class="form-control" name="blood_group">
                                     <option><?php echo $blood_group?></option>
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
                                <option><?php echo $gender?></option>
                                <option >Male</option>
                                    <option >Female</option>
                                    <option >Other</option>
                            </select>
                    </div>
                     <div class="form-group">
                        <label>Religion:</label>
                        <input type="text" class="form-control"  name="religion" value="<?php echo $religion?>">
                    </div>
                     <div class="form-group">
                        <label>Profession:</label>
                        <input type="text" class="form-control"  name="profession" value="<?php echo $profession?>">
                    </div>    
                     <div class="form-group">
                        <label >Total Donate Time:</label>
                        <input type="number" class="form-control"  name="total_donate" value="<?php echo $total_donate?>">
                    </div>
             
                     <div class="form-group">
                        <label >Image:</label>
                        <input type="file" class="form-control"  name="fileToUpload" >
                    </div>
                    <div class="form-group">
                        <label for="email">Date-Of-Birth:</label>
                        <input type="date" class="form-control" id="email" name="date_of_birth" value="<?php echo $date_of_birth?>">
                    </div>
            
                     <div class="form-group">
                        <label>Last Donate:</label>
                        <input type="date" class="form-control"  name="last_donate" value="<?php echo $last_donate?>">
                    </div>
                  
                    <div class="form-group">
                        <label>About You:</label>
                        
                         <textarea class="summernote"  name="about_you" required><?php echo $about_you?></textarea>
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
      
<?php include 'footer.php'?>