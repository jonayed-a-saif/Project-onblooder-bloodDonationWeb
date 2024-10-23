<?php include('header.php'); 

// Ensure the form is submitted

    $blood_id = $_REQUEST['blood_id'];
    $division = $_REQUEST['division'];
    $district = $_REQUEST['district'];
    $union = $_REQUEST['union'];


                   
                        

?>



<div class="donor-search-area">
    <div class="container">
        <form method="POST" action="donors.php" class="donor-search-form">
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
                <select class="select"  id="division" >
                    <option value="" >Select One</option>
                     
                </select>
            </div>
            
           

            <div class="donor-search-form__field">
                <label>Districts</label>
                <select class="select" id="district" >
                    <option value="" >Select One</option>
                   
                </select>
            </div>

            <div class="donor-search-form__field">
                <label>Upozila</label>
                  <select class="select" id="union">
                    <option value="" >Select One</option>
                   
                </select>
            </div>

            <div class="donor-search-form__btn">
            <button type="submit" class="btn btn-md btn--base"><i class="las la-search"></i> Search</button>
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
									$sql = "SELECT * FROM user where ((blood_group='$blood_id')&&(division='$division'))  order by id ASC ";
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
            </div>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>

<script type="text/javascript" src="./assets/js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        function loadData(type, category_id){
            $.ajax({
                url: "donor.php",
                type: "POST",
                data: {type: type, id: category_id},
                success: function(data){
                    if(type == "stateData"){
                        $("#district").html(data);
                    }else if(type == "unionData") {
                        $("#union").html(data);
                    }else{
                        $("#division").append(data);
                    }
                    
                }
            });
        }
        loadData();

        $("#division").on("change", function(){
            var division = $("#division").val();
            // if(division != ""){
            //     loadData("stateData", division);
            // }else{
            //     $("#district").html("");
            // }


            loadData("stateData", division);
        })


        $("#district").on("change", function(){
            var district = $("#district").val();
           


            loadData("unionData", district);
        })
    });
</script>