<section class="hero bg_img" style="background-image: url(assets/images/frontend/banner/60fffe430ffba1627389507.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-7 col-lg-8 text-center">
                <h2 class="hero__title">Be the lifeline.<br> Give blood, Give hope.</h2>
            </div>
        </div>
        
        <div class="row justify-content-center mt-4">
            <div class="col-xxl-7 col-xl-8 col-lg-10">
                <form method="POST" action="donors1.php" class="hero__blood-search-form">
                    <div class="input-field">
                        <i class="las la-tint"></i>
                        <select class="select" name="blood_id">
                    <option  >Select Group</option>
                     <?php 
									$sql = "SELECT * FROM blood  order by id ASC ";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										// output data of each row
										while ($row = $result->fetch_assoc()) {
										
									?>
                                            <option value="<?php echo $row['bloodGroup']?>" ><?php echo $row['bloodGroup']?></option>
                                              <?php }}?>
                                    </select>
                    </div>
                    
                    <div class="input-field">
                        <i class="las la-city"></i>
                        <select class="select" name="division">
                    <option value="" >Select One</option>
                      <?php 
									$sql = "SELECT * FROM divisions  order by id ASC ";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										// output data of each row
										while ($row = $result->fetch_assoc()) {
										
									?>
                                            <option value="<?php echo $row['name']?>" ><?php echo $row['name']?></option>
                                           <?php }}?> 
                                    </select>
                    </div>
                    
                    <div class="btn-area">
                        <button type="submit" class="btn btn-md btn--base"><i class="las la-search"></i> Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
