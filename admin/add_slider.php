<?php include 'header.php'?>
<div class="main-content">
        <section class="section">
          <div class="section-body">
           

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Slider </h4>
                    <a href="all_slider.php" class="btn btn-primary">Slider List</a>
                  </div>
                  <div class="card-body">
                    <form action="store_slider.php" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-group row mb-4">
                            <label class="form-label">Title:</label>
                            <input type="text" class="form-control" name="title">
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