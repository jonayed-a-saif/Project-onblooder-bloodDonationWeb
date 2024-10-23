<?php include 'header.php';
 $id=$_GET['id'];
 $sql = "SELECT * FROM about where id=$id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    $title=$row['title'];
                                    $description=$row['description'];
                                    $link=$row['link'];
                                    $image=$row['image'];
                                   
                                   
                              
                                  
                                  
                                }}
?>


<div class="main-content">
        <section class="section">
          <div class="section-body">
           

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit About </h4>
                    <a href="all_about.php" class="btn btn-primary">About List</a> 
                  </div>
                  <div class="card-body">
                    <form action="update_about.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
                        
                         <div class="form-group row mb-4">
                            <label class="form-label">Title:</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $title?>">
                        </div>
                        
                        <div class="form-group row mb-4">
                            <label class="form-label">Description:</label>
                            <input type="text" class="form-control" name="description" value="<?php echo $description?>">
                        </div>
                      
                        
                        <div class="form-group row mb-4">
                            <label class="form-label">Youtube Emabaded Link:</label>
                            <input type="text" class="form-control" name="link" value="<?php echo $link?>">
                        </div>
                           
                             <div class="form-group row mb-4">
                            <label class="form-label">Image:</label>
                            <input type="file" class="form-control" name="fileToUpload">
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