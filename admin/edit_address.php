<?php include 'header.php';
 $id=$_GET['id'];
 $sql = "SELECT * FROM address where id=$id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    $division=$row['division'];
                                    $district=$row['district'];
                                    $upozila=$row['upozila'];
                                    $thana=$row['thana'];
                                   
                                   
                              
                                  
                                  
                                }}
?>


<div class="main-content">
        <section class="section">
          <div class="section-body">
           

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Address </h4>
                    <a href="all_address.php" class="btn btn-primary">Address List</a> 
                  </div>
                  <div class="card-body">
                    <form action="update_address.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
                        
                         <div class="form-group row mb-4">
                            <label class="form-label">Division:</label>
                            <input type="text" class="form-control" name="division" value="<?php echo $division?>">
                        </div>
                        
                        <div class="form-group row mb-4">
                            <label class="form-label">District:</label>
                            <input type="text" class="form-control" name="district" value="<?php echo $district?>">
                        </div>
                      
                        
                        <div class="form-group row mb-4">
                            <label class="form-label">Upazila:</label>
                            <input type="text" class="form-control" name="upozila" value="<?php echo $upozila?>">
                        </div>
                           
                             <div class="form-group row mb-4">
                            <label class="form-label">Thana:</label>
                            <input type="text" class="form-control" name="thana" value="<?php echo $thana?>">
                        </div>
                      
                           
                        <div class="form-group row mb-4">
                        <div class="col-sm-12">
                            <button class="btn btn-primary" value="Upload Image" type="submit">Submit</button>
                        </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

      </div>
<?php include 'footer.php'?>