<?php include 'header.php';
 $id=$_GET['id'];
 $sql = "SELECT * FROM blood where id=$id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                  
                                    $bloodGroup = $row['bloodGroup'];
                                 
                                  
                                  
                                }}
?>


<div class="main-content">
        <section class="section">
          <div class="section-body">
           
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Blood Group </h4>
                    <a href="all_group.php" class="btn btn-primary">Blood Group List</a>
                  </div>
                  <div class="card-body">
                    <form action="update_group.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-group row mb-4">
                            <label class="form-label">Blood Group:</label>
                            <input type="text" class="form-control" name="bloodGroup" value="<?php echo $bloodGroup?>" >
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