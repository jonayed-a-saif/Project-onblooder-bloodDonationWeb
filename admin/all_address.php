<?php include 'header.php'?>
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Address List</h4>
                    <a class="btn btn-primary" href="add_address.php">Add Address</a>
                  </div>
                  <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Division</th>
                          <th scope="col">District</th>
                          <th scope="col">Upazila</th>
                          <th scope="col">Thana</th>
                       
                          
                          <th scope="col">Action</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                            $sl =0;
                            $sql = "SELECT * FROM address order by id DESC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                  $sl++;
                            ?>
                        <tr>
                          <th scope="row"><?php echo $sl?></th>
                          <td><?php echo $row['division']?></td>
                          <td><?php echo $row['district']?></td>
                          <td><?php echo $row['upozila']?></td>
                          <td><?php echo $row['thana']?></td>
                         
                          
                          <td>
                            <a href="edit_address.php?id=<?php echo $row['id']?>" class="btn btn-warning">Edit</a>
                            <a href="delete_address.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                        <?php }}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>  
<?php include 'footer.php'?>