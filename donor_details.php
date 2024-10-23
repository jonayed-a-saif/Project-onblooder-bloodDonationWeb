<?php 


include 'header.php'; 

 $id=$_GET['id'];
  $sql = "SELECT * FROM user  where id='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                    $name=$row['name'];
                    $phone=$row['phone'];
                       $username=$row['username'];
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


       <div class="main-wrapper">
            <div class="profile-header dark--overlay bg_img" style="background-image: url(../../assets/images/frontend/breadcrumb/61023f89990b81627537289.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="donor-profile">
					<div class="donor-profile__thumb">
						<img src="img/user/<?php echo $image ?>" alt="image">
					</div>
					<div class="donor-profile__content">
						<h3 class="donor-profile__name"><?php echo $name ?></h3>
						<p><i class="las la-map-marker-alt mt-2"></i> Location : <?php echo $address ?> <?php echo $thana ?> <?php echo $upazila ?> <?php echo $district ?> <?php echo $division ?> <?php echo $country ?></p>
						<!--<ul class="d-flex flex-wrap align-items-center donor-card__social justify-content-center mt-1">-->
      <!--                      <li><a href="#" target="_blank" tabindex="-1"><i class="lab la-facebook-f"></i></a></li>-->
      <!--                      <li><a href="#" target="_blank" tabindex="-1"><i class="lab la-twitter"></i></a></li>-->
      <!--                      <li><a href="#" target="_blank" tabindex="-1"><i class="lab la-linkedin-in"></i></a></li>-->
      <!--                      <li><a href="#" tabindex="-1"><i class="lab la-instagram"></i></a></li>-->
      <!--                  </ul>-->
					</div>
				</div>
			</div>
		</div>
		<div class="blood-donor-info-area">
			<div class="row justify-content-center">
				<div class="col-xl-3 col-lg-4">
					<div class="dono-info-item d-flex align-items-center justify-content-center">
						<h5 class="text-white me-3"><i class="las la-tint"></i> Blood Group : </h5>
						<p class="text--base"><?php echo $blood_group ?></p>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 mt-lg-0 mt-3">
					<div class="dono-info-item d-flex align-items-center justify-content-center">
						<h5 class="text-white me-3"><i class="las la-calendar-check"></i> Last Donate : </h5>
						<p class="text--base"><?php echo $last_donate ?></p>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 mt-lg-0 mt-3">
					<div class="dono-info-item d-flex align-items-center justify-content-center">
						<h5 class="text-white me-3"><i class="las la-clipboard-list"></i> Total Donate : </h5>
						<p class="text--base"><?php echo $total_donate ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="pt-100 pb-50 shade--bg">
	<div class="container">
		<div class="row gy-4">
			<div class="col-lg-8 pe-lg-5">
				<h3>Donor Details</h3>
				<p class="mt-2"><?php echo $about_you ?></p>
				<!--<div class="mt-4">-->
				<!--	<a  target="_blank" href="../../add/eyJpdiI6IlVybmZ2OVVVUUwrRFloczkyNzRaaEE9PSIsInZhbHVlIjoibzVjUDAvRjAxNnI4YVYyQ3ljemMrQT09IiwibWFjIjoiYmRiNDc5ZDliYjdhMDQ1N2Q4MTk3YzhiYWMxZDI0NzlhZWNmZTkyYmIyZmNiYmIxMDVlZWM5OT" class="d-block bonus"><img src="../../assets/images/advertisement/6107f875cb7c11627912309.png" alt="image"></a>		-->
				<!--	</div>-->
				<ul class="caption-list-two mt-4">
					<li>
						<span class="caption">Name</span>
						<span class="value"><?php echo $name ?></span>
					</li>
					<li>
						<span class="caption">Gender</span>
						<span class="value"> <?php echo $gender ?> </span>
					</li>
					<li>
						<span class="caption">Date of Birth</span>
						<span class="value"><?php echo $date_of_birth ?></span>
					</li>
					<!--<li>-->
					<!--	<span class="caption">Age</span>-->
					<!--	<span class="value">19 Years</span>-->
					<!--</li>-->
					<li>
						<span class="caption">Religion</span>
						<span class="value"><?php echo $religion ?></span>
					</li>
					<li>
						<span class="caption">Email</span>
						<span class="value"><?php echo $username ?></span>
					</li>
					<li>
						<span class="caption">Phone</span>
						<span class="value"><?php echo $phone ?></span>
					</li>
					<li>
						<span class="caption">Profession</span>
						<span class="value"><?php echo $occupation ?></span>
					</li>
					
					<li>
						<span class="caption">Address</span>
						<span class="value"><?php echo $address ?> <?php echo $thana ?> <?php echo $upazila ?> <?php echo $district ?> <?php echo $division ?> <?php echo $country ?></span>
					</li>
				</ul>

				<!--<div class="mt-4">-->
				<!--	<a  target="_blank" href="../../add/eyJpdiI6InM0UVZpei9zODBWY2Rna1UzVUpRTnc9PSIsInZhbHVlIjoiUVMzY25SYUNzaytBSkhuQVVkZHNuUT09IiwibWFjIjoiMzY4YzNiYjk2MjAwZjQ5YmM5Yjg2OTE3ZWNkMTdhNmM2YzEyMWVmZWM0ZjY3ZDIwMjRhMGQyND" class="d-block bonus"><img src="../../assets/images/advertisement/6107f875cb7c11627912309.png" alt="image"></a>	-->
				<!--	</div>-->
	         
			</div>
		<div class="col-lg-4">
				<div class="custom--card section--bg2">
					<div class="card-header">
						<h5 class="text-white">Contact with Donor</h5>
					</div>
					<div class="card-body">
						<form method="POST" action="https://script.viserlab.com/bloodlab/donor/contact" class="contact-donor-form">
							<input type="hidden" name="_token" value="w4ARB189GTNH3jYa3LYnfHGJlpmYmNe8zBKZ9Olh">							<input type="hidden" name="donor_id" value="4">
							<div class="form-group">
								<input type="text" name="name" value="" class="form--control form-control-md" placeholder="Enter name" maxlength="80" required="">
							</div>
							<div class="form-group">
								<input type="email" name="email" value="" class="form--control form-control-md" placeholder="Enter email" maxlength="80" required="">
							</div>
							<div class="form-group">
								<textarea name="message" class="form--control" placeholder="Message" maxlength="500" required=""></textarea>
							</div>
							<button type="submit" class="btn btn--base w-100">Message Now</button>
						</form>
					</div>
				</div>
			
		</div>
	</div>
</section>
        </div>
       <?php include('footer.php'); ?>
