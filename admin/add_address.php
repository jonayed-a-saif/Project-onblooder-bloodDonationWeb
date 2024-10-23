<?php include 'header.php'?>
<div class="main-content">
        <section class="section">
          <div class="section-body">
           

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Address </h4>
                    <a href="all_address.php" class="btn btn-primary">Address List</a>
                  </div>
                  <div class="card-body">
                    <form action="store_address.php" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-group row mb-4">
                            <label class="form-label">Division:</label>
                            <input type="text" class="form-control" name="division">
                        </div>
                        
                        <div class="form-group row mb-4">
                            <label class="form-label">District:</label>
                            <input type="text" class="form-control" name="district">
                        </div>
                      
                        
                        <div class="form-group row mb-4">
                            <label class="form-label">Upazila:</label>
                            <input type="text" class="form-control" name="upozila">
                        </div>
                        
                          <div class="form-group row mb-4">
                            <label class="form-label">Thana:</label>
                            <input type="text" class="form-control" name="thana">
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