
<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','onbloode_onbloode_admin','123@jAmifree');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"onbloode_blood");
$sql="SELECT * FROM districts WHERE id = 'division_id".$q." order by ASC'";
$result = mysqli_query($con,$sql);
$name = $row['name'];
echo "
 <div class='donor-search-form__field'>
                <label>Districts</label>
                <select class='select' name='location_id'>
                    <option value='' selected='' disabled=''>Select One</option>
                   
                                            
                                         
              
";
while($row = mysqli_fetch_array($result)) {
  echo "<option value='<?php echo $name?>' ><?php echo $name?></option>";
 
}
echo "  </select>
            </div>";

mysqli_close($con);

?>