<?php 
$connect = mysqli_connect("localhost", "root" , "", "onblooder");

if(isset($_POST['city_id'])){
    $city_id  = $_POST['city_id'];
    $sql = mysqli_query($connect, "SELECT * FROM districts where division_id  = '$city_id' order by district_name");
    ?>
<select class="select" name="location_id">
                    <option value="" selected="" disabled="">Select One</option>
                    <?php 
									
										// output data of each row
										while ($row = mysqli_fetch_array($sql)) {
										
									?>
                                            <option value="<?php echo $row['id']?>" ><?php echo $row['district_name']?></option>
                                           <?php }?> 
                </select>


<?php
}
?>