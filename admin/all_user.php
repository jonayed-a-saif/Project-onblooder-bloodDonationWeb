<?php include 'header.php'?>
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>User List</h4>
                    <a class="btn btn-primary" href="add_user.php">Add user</a>
                  </div>
                  <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Name</th>
                               <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                                             <th scope="col">Address</th>
                                                                  <th scope="col">Blood Group</th>
                                                                       <th scope="col">Gender</th>
                                                                            <th scope="col">Total Donate</th>
                                                                                 <th scope="col">Last Donate</th>
                                                                                      <th scope="col">Image</th>
                         
                          
                          
                          <th scope="col">Action</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                            $sl =0;
                            $sql = "SELECT * FROM user order by id DESC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                  $sl++;
                            ?>
                        <tr>
                          <th scope="row"><?php echo $sl?></th>
                          
                          <td><?php echo $row['name']?></td>
                          <td><?php echo $row['username']?></td>
                           <td><?php echo $row['phone']?></td>
                            <td><?php echo $row['address']?></td>
                             <td><?php echo $row['blood_group']?></td>
                              <td><?php echo $row['gender']?></td>
                               <td><?php echo $row['total_donate']?></td>
                                <td><?php echo $row['last_donate']?></td>
                          <td><img src="../img/user/<?php echo $row['image']?>" alt="Girl in a jacket" width="50" height="60"></td>
                          
                          <td>
                            <a href="edit_user.php?id=<?php echo $row['id']?>" class="btn btn-warning">Edit</a>
                             <a href="delete_user.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>
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