
<?php include('header.php'); ?>

<?php include('admin/config.php'); 



?>
            <?php
$user=$_GET['user'];
?>
<div class="main-wrapper">
            <section class="inner-hero bg_img overlay--one" style="background-image: url('../assets/images/frontend/breadcrumb/61023f89990b81627537289.jpg');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h2 class="page-title text-white">Apply as a Donor</h2>
                <ul class="page-breadcrumb justify-content-center">
                    <li><a href="">Home</a></li>
                    <li>Apply as a Donor</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="pt-100 pb-100 position-relative z-index section--bg">
    <div class="container">
        <div class="row">
            <div class="card-body">
                 <form method="POST" action="store_user.php" enctype="multipart/form-data">
                 <div class="row mt-4 mb-4">
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
                                <option selected="" disabled="">Select Gender</option>
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
</section>

<section class="pt-100 pb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">Frequently Asked Questions</h2>
                    <p class="mt-3">Dolor sit amet consectetur adipisicing elit. Ad voluptatum fuga eius expedita, nulla quos blanditiis nobis laboriosam. Natus cum eum fuga praesentium.</p>
                </div>
            </div>
        </div><!-- row end -->
        <div class="accordion custom--accordion" id="faqAccordion">
            <div class="row">
                    <div class="col-lg-6 mb-4">
                                                                            <div class="accordion-item">
                                <h2 class="accordion-header" id="h-1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-1" aria-expanded="false" aria-controls="c-1">
                                        Who can donate blood?
                                    </button>
                                </h2>
                                <div id="c-1" class="accordion-collapse collapse" aria-labelledby="h-1" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>Generally, individuals aged 16-65 who weigh at least 50 kg (110 lbs) and are in good health may be eligible to donate blood. Specific eligibility criteria may vary by country or blood donation center.</p>
                                    </div>
                                </div>
                            </div>
                                                                                                                                                    <div class="accordion-item">
                                <h2 class="accordion-header" id="h-3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-3" aria-expanded="false" aria-controls="c-3">
                                        How will my donated blood be used?
                                    </button>
                                </h2>
                                <div id="c-3" class="accordion-collapse collapse" aria-labelledby="h-3" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>Donated blood is used to help patients with various medical conditions, including those undergoing surgeries, cancer treatment, trauma victims, and individuals with blood disorders.</p>
                                    </div>
                                </div>
                            </div>
                                                                                                                                                    <div class="accordion-item">
                                <h2 class="accordion-header" id="h-5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-5" aria-expanded="false" aria-controls="c-5">
                                        Eligendi in enim quisquam dolor voluptates nihil.
                                    </button>
                                </h2>
                                <div id="c-5" class="accordion-collapse collapse" aria-labelledby="h-5" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>olor sit amet consectetur adipisicing elit. Doloremque perspiciatis harum voluptatibus natus alias nesciunt eius similique tenetur corporis fuga eligendi in enim quisquam dolor voluptates nihil obcaecati pariatur commodi facilis, officiis nobis porro eum architecto! Delectus ut voluptatibus voluptatem, aliquam tenetur et facilis, quia veritatis temporibus, ex magni soluta.</p>
                                    </div>
                                </div>
                            </div>
                                                                                                                    </div>

                     <div class="col-lg-6 mb-4">
                                                                                                                            <div class="accordion-item">
                                <h2 class="accordion-header" id="h-2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-2" aria-expanded="false" aria-controls="c-2">
                                        How often can I donate blood?
                                    </button>
                                </h2>
                                <div id="c-2" class="accordion-collapse collapse" aria-labelledby="h-2" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>The frequency of blood donation depends on your country's regulations and your health status. In many places, whole blood donors can typically donate every 8-12 weeks.</p>
                                    </div>
                                </div>
                            </div>
                                                                                                                                                    <div class="accordion-item">
                                <h2 class="accordion-header" id="h-4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-4" aria-expanded="false" aria-controls="c-4">
                                        Eligendi in enim quisquam dolor voluptates nihil.
                                    </button>
                                </h2>
                                <div id="c-4" class="accordion-collapse collapse" aria-labelledby="h-4" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>dolor sit amet consectetur adipisicing elit. Doloremque perspiciatis harum voluptatibus natus alias nesciunt eius similique tenetur corporis fuga eligendi in enim quisquam dolor voluptates nihil obcaecati pariatur commodi facilis, officiis nobis porro eum architecto! Delectus ut voluptatibus voluptatem, aliquam tenetur et facilis, quia veritatis temporibus, ex magni soluta</p>
                                    </div>
                                </div>
                            </div>
                                                                                                                                                    <div class="accordion-item">
                                <h2 class="accordion-header" id="h-6">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-6" aria-expanded="false" aria-controls="c-6">
                                        Eligendi in enim quisquam dolor voluptates nihil.
                                    </button>
                                </h2>
                                <div id="c-6" class="accordion-collapse collapse" aria-labelledby="h-6" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>dolor sit amet consectetur adipisicing elit. Ad voluptatum fuga eius expedita, nulla quos blanditiis nobis laboriosam. Natus cum eum fuga</p>
                                    </div>
                                </div>
                            </div>
                                                                    </div>
            </div>
        </div>
    </div>
</section>

        </div>
        

<?php include('footer.php'); ?>

