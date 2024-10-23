
<?php include('header.php'); 
 $blood_id = ($_REQUEST['blood_id']);
 $city_id = ($_REQUEST['city_id']);


?>




<div class="donor-search-area">
    <div class="container">

            <form method="post" action="donors.php" class="donor-search-form">
 <div class="donor-search-form__field">
                <label>Blood Group</label>
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
    <div class="donor-search-form__field">
                <label>City</label>
                <select class="select"  name="divisions" onchange="showUser(this.value)">
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

<div id="txtHint"></div>
</form>


           

            <div class="donor-search-form__field">
                <label>City</label>
                <select class="select" name="city_id">
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

            <div class="donor-search-form__field">
                <label>Districts</label>
                <select class="select" name="location_id">
                    <option value="" selected="" disabled="">Select One</option>
                    <?php 
									$sql = "SELECT * FROM districts  order by id ASC ";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										// output data of each row
										while ($row = $result->fetch_assoc()) {
										
									?>
                                            <option value="<?php echo $row['name']?>" ><?php echo $row['name']?></option>
                                           <?php }}?> 
                </select>
            </div>

            <div class="donor-search-form__field">
                <label>Upozila</label>
                  <select class="select" name="upozila_id">
                    <option value="" selected="" disabled="">Select One</option>
                    <?php 
									$sql = "SELECT * FROM unions  order by id ASC ";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										// output data of each row
										while ($row = $result->fetch_assoc()) {
										
									?>
                                            <option value="<?php echo $row['name']?>" ><?php echo $row['name']?></option>
                                           <?php }}?> 
                </select>
            </div>

            <div class="donor-search-form__btn">
                <button type="submit" class="btn btn-md btn--base">Search</button>
            </div>
        </form>
    </div>
</div>

<section class="pt-50 pb-50 shade--bg">
    <div class="container">
        <div class="row">
           
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="row gy-4">
                     <?php 
									$sql = "SELECT * FROM user where ((blood_group='$blood_id')&&(division='$city_id'))  order by id ASC ";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										// output data of each row
										while ($row = $result->fetch_assoc()) {
										
									?> 
                                            <div class="col-lg-6 col-md-12 col-sm-6">
                            <div class="donor-item has--link">
                                <a href="donor_details.php?id=<?php echo $row['id']?>" class="item--link"></a>
                                <div class="donor-item__thumb">
                                    <img src="img/user/<?php echo $row['image'] ?>" alt="image">
                                </div>
                                <div class="donor-item__content">
                                    <h5 class="donor-item__name"><?php echo $row['name'] ?></h5>
                                    <ul class="donor-item__list mt-2">
                                        <li class="text-truncate">
                                            <i class="las la-map-marker-alt"></i> Location : <?php echo $row['address'] ?>
                                        </li>
                                        <li>
                                            <i class="las la-tint"></i>Blood Group : <span class="text--base">(<?php echo $row['blood_group'] ?>)</span>
                                        </li>
                                    </ul>
                                    <a href="donor_details.php?id=<?php echo $row['id']?>" class="text--base fs--14px text-decoration-underline">View Profile</a>
                                </div>
                            </div>
                        </div>
                                           <?php }}?>
                                    </div>
                <nav class="mt-4 pagination-md">
                <nav>
        <ul class="pagination">
            
                            <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            
            
                            
                
                
                                                                                        <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                                                                                <li class="page-item"><a class="page-link" href="donor4658.html?page=2">2</a></li>
                                                                        
            
                            <li class="page-item">
                    <a class="page-link" href="donor4658.html?page=2" rel="next" aria-label="Next &raquo;">&rsaquo;</a>
                </li>
                    </ul>
    </nav>

                </nav>
            </div>
            
        </div>
    </div>
</section>

<!--
        <div class="row justify-content-center mt-12">
            <div class="col-xxl-7 col-xl-8 col-lg-10">
                <form method="GET" action="#" class="hero__blood-search-form" id="heroBloodSearchForm">
                    <div class="input-field">
                        <i class="las la-tint"></i>
                        <select class="form-control" name="bloodGroup" id="bloodGroupSelect">
                            <option value="" selected disabled>Select Blood Group</option>
                            <?php
                            include 'db_connection.php'; // Ensure you have your DB connection here
                            $sql = "SELECT * FROM blood ORDER BY bloodGroup ASC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $selected = isset($_GET['bloodGroup']) && $_GET['bloodGroup'] == $row['bloodGroup'] ? 'selected' : '';
                                    echo "<option value='" . urlencode($row['bloodGroup']) . "' $selected>" . $row['bloodGroup'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="input-field">
                        <i class="las la-city"></i>
                        <select class="form-control" name="division" id="divisionSelect">
                            <option value="" selected disabled>Select Division</option>
                            <?php
                            $sql = "SELECT DISTINCT division FROM address ORDER BY division ASC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $selected = isset($_GET['division']) && $_GET['division'] == $row['division'] ? 'selected' : '';
                                    echo "<option value='" . urlencode($row['division']) . "' $selected>" . $row['division'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="input-field">
                        <i class="las la-city"></i>
                        <select class="form-control" name="district" id="districtSelect">
                            <option value="" selected disabled>Select District</option>
                            <?php
                            if (isset($_GET['division'])) {
                                $selectedDivision = $_GET['division'];
                                $sql = "SELECT DISTINCT district FROM address WHERE division = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param('s', $selectedDivision);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while ($row = $result->fetch_assoc()) {
                                    $selected = isset($_GET['district']) && $_GET['district'] == $row['district'] ? 'selected' : '';
                                    echo "<option value='" . urlencode($row['district']) . "' $selected>" . $row['district'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="input-field">
                        <i class="las la-city"></i>
                        <select class="form-control" name="thana" id="thanaSelect">
                            <option value="" selected disabled>Select Thana</option>
                            <?php
                            if (isset($_GET['district'])) {
                                $selectedDistrict = $_GET['district'];
                                $sql = "SELECT DISTINCT thana FROM address WHERE district = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param('s', $selectedDistrict);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while ($row = $result->fetch_assoc()) {
                                    $selected = isset($_GET['thana']) && $_GET['thana'] == $row['thana'] ? 'selected' : '';
                                    echo "<option value='" . urlencode($row['thana']) . "' $selected>" . $row['thana'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="input-field">
                        <i class="las la-venus-mars"></i>
                        <select class="form-control" name="gender" id="genderSelect">
                            <option value="" selected disabled>Select Gender</option>
                            <option value="Male" <?php if (isset($_GET['gender']) && $_GET['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if (isset($_GET['gender']) && $_GET['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                        </select>
                    </div>

                    <div class="btn-area">
                        <button type="submit" class="btn btn-md btn--base"><i class="las la-search"></i> Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 

<section class="pt-50 pb-50 shade--bg">
    
    <div class="container">
        <div class="row">
            
                      <div class="col-xl-2 col-lg-3 col-md-4 d-md-block d-none">
                <a  target="_blank" href="add/eyJpdiI6ImcyR1pZNm5uc0ppbGR3QUNObDlMc3c9PSIsInZhbHVlIjoiWE5JSDhpYi9NSTZzME05akEvNVppdz09IiwibWFjIjoiMWQ4NmIxOTU0YzU1NWYxYWJiNDRhZmI3OTBiNWMwMWNkMjc3ZmVjZWVjYWU1MDZmN2Y1MmMzYj" class="d-block bonus"><img src="assets/images/advertisement/6107f739b69161627911993.png" alt="image"></a>
                <a  target="_blank" href="add/eyJpdiI6Ik9DMTg3cFZzNGFmK1k1YU5JNHQ4ZEE9PSIsInZhbHVlIjoibmozMXh5Y0ZDakxhSHM0aFEyRnRndz09IiwibWFjIjoiMTU3MjYzNWI1MTRjYjBlMDAzNjYxYzJhNGQyYzcxZjNkNzcyYTg1MzBkMjc0MzhiOTFhNjg3ZD" class="d-block bonus"><img src="assets/images/advertisement/6107f72aeef731627911978.png" alt="image"></a>
                <a  target="_blank" href="add/eyJpdiI6ImI5VDl6TkgvVElSSmY3Q3lXQnJMOVE9PSIsInZhbHVlIjoibm9VckU5R0pybGViUWZjbGhaSzYrZz09IiwibWFjIjoiZTFhODU4MWFhZDA3OTBjMTAxMjY3MTVkNWI1ZjY4MWMwM2UzZjZjMmYxNTBjYTAxZmVmNjVjMz" class="d-block bonus"><img src="assets/images/advertisement/6107f71a3be0e1627911962.png" alt="image"></a>
                <a  target="_blank" href="add/eyJpdiI6IllkbVl0L0JHcFM1VjdSL3VKUGFYc2c9PSIsInZhbHVlIjoiazVGMDlaaUdaOUxHeCtndmVMMTN0UT09IiwibWFjIjoiMWI4ZTg2YTYwYjJmNWE4NDRlZTllZmQ3M2NlM2E5NDJiOTQ4YmRkMmMwNjQ2ZTAwNTM2MjJmMD" class="d-block bonus"><img src="assets/images/advertisement/6107f71a3be0e1627911962.png" alt="image"></a>            </div>
      
      
            <?php
            // Include your database connection script
            include 'db_connection.php';

            // Initialize variables to store parameters from URL
            $division = isset($_GET['division']) ? urldecode($_GET['division']) : '';
            $district = isset($_GET['district']) ? urldecode($_GET['district']) : '';
            $thana = isset($_GET['thana']) ? urldecode($_GET['thana']) : '';
            $bloodGroup = isset($_GET['bloodGroup']) ? urldecode($_GET['bloodGroup']) : '';
            $gender = isset($_GET['gender']) ? $_GET['gender'] : '';

            // Prepare an array to store conditions
            $conditions = array();
            $params = array();

            // Build SQL conditions based on provided parameters
            if (!empty($division)) {
                $conditions[] = "division = ?";
                $params[] = $division;
            }
            if (!empty($district)) {
                $conditions[] = "district = ?";
                $params[] = $district;
            }
            if (!empty($thana)) {
                $conditions[] = "thana = ?";
                $params[] = $thana;
            }
            if (!empty($bloodGroup)) {
                $conditions[] = "blood_group = ?";
                $params[] = $bloodGroup;
            }
            if (!empty($gender)) {
                $conditions[] = "gender = ?";
                $params[] = $gender;
            }

            // Check if any conditions are provided
            if (!empty($conditions)) {
                // Prepare SQL statement with dynamic WHERE clause
                $sql = "SELECT * FROM user WHERE " . implode(" AND ", $conditions);

                // Prepare and execute SQL statement
                $stmt = $conn->prepare($sql);
                if ($stmt === false) {
                    die('Prepare failed: ' . htmlspecialchars($conn->error));
                }

                // Bind parameters and execute query
                $stmt->bind_param(str_repeat('s', count($params)), ...$params);
                $stmt->execute();
                $result = $stmt->get_result();

                // Check if results are found
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-lg-4 mb-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="img/user/<?php echo $row['image']; ?>" alt="Donor Image" class="img-fluid mb-3">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                    <p class="card-text">Blood Group: <?php echo $row['blood_group']; ?></p>
                                    <p class="card-text">District: <?php echo $row['district']; ?></p>
                                    <p class="card-text">Phone: <?php echo $row['phone']; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="col-lg-12 text-center">
                        <p>No donors found for the selected criteria.</p>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="col-lg-12 text-center">
                    <p>Please select at least one parameter to search for donors.</p>
                </div>
                <?php
            }
            ?>
            <div class="col-xl-2 d-xl-block d-none">
                <a  target="_blank" href="add/eyJpdiI6IlZETFhyelpuVWNLeGdPWXdEVGFkSWc9PSIsInZhbHVlIjoibnMzcDNaWkhnY2VKQzA5UlZZbVc1dz09IiwibWFjIjoiN2M2NzVkNjNlMTY5MjA2ZTAxOTdmYzdmM2Y4OWQyM2QxY2I4ZjM5OWM4YTM3M2ViZTE3MTA0Mj" class="d-block bonus"><img src="assets/images/advertisement/6107f739b69161627911993.png" alt="image"></a>
                <a  target="_blank" href="add/eyJpdiI6IlN2YWFId1prUTM4Q1RxM2tKWklaUnc9PSIsInZhbHVlIjoiODhFRExqSmE5NStQYmprQ1ZOWkVxQT09IiwibWFjIjoiZjk5MmI2NjE0ZTkyNTk4MzMzNWQ2ODlkMWU1NGRiMjE1MjBjMjBjN2RkZDViZTkwNjFjYTA4Nz" class="d-block bonus"><img src="assets/images/advertisement/6107f7c80596c1627912136.png" alt="image"></a>
                <a  target="_blank" href="add/eyJpdiI6ImhtTG1wVkRtSCswUW01N0tGbEZaSkE9PSIsInZhbHVlIjoibnY4UGErVTZqaTY3alJtTUR3dFJ0UT09IiwibWFjIjoiYzA1OTBhNzQ2NjRiZWVlYTY4MjA3OGVhY2MxNDUwZWJmODc1NDM3NTBlODA1YTRiNjQ0Nzg1ZT" class="d-block bonus"><img src="assets/images/advertisement/6107f71a3be0e1627911962.png" alt="image"></a>
                <a  target="_blank" href="add/eyJpdiI6IkZST1pCNzVEcDVFZU5XZ3h4TXFVdVE9PSIsInZhbHVlIjoibVVTelJpZkxkT2NaazYySDlpZVZYQT09IiwibWFjIjoiNTU5ZjlkN2FmNDUyZGViODc1N2ViMTUwNTI4YWM0YmY3YThlMmU3NDUwZTQ3Y2M4YWJlNjYxYW" class="d-block bonus"><img src="assets/images/advertisement/6107f71a3be0e1627911962.png" alt="image"></a>            </div>
        </div>
    </div>

-->



<!--
<script>
    // JavaScript to handle form submission on dropdown change
    document.getElementById('heroBloodSearchForm').addEventListener('change', function() {
        this.submit();
    });
</script>
-->



<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","family.php?q="+str,true);
  xmlhttp.send();
}
</script>
<?php include('footer.php');?>