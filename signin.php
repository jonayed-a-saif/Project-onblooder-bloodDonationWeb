
    <?php


    include('login.php'); // Includes Login Script
 
         if (isset($_SESSION['login_user'])) {
        header("location: donor_profie.php"); // Redirecting To Profile Page
    
    }?>
<?php include('header.php');?>

<div class="container">
    <div class="row">
        <div class="col-md-6 mt-5 mb-5">
            <form  method="Post">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="required" name="username">
              
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" required="required" name="password">
              </div>
              <div class="mb-3 form-check">
                 <div class="mt-3 ">
                                <!--<button type="submit"  class="btn btn-dark btn-lg" style="border-radius:10px; ">Login</button>
                                <input name="submit" class="btn btn-dark btn-lg" style="border-radius:10px; " type="submit" value="Log In">-->
                                 <input name="submit" class="btn btn-md btn--base d-flex align-items-center" style="border-radius:5px; " type="submit" value="Log In">
                            </div>
              </div>
              <p class="mb-3">Are you Register? <a href="apply_donor.php">Register</a></p>
              
            </form>
        </div>
        <div class="col-md-6 mt-3 mb-3">
            <img src="img/Blood.jpg" alt=""  style="width: 100%; border-radius: 20px; ">
        </div>
    </div>
</div>




<?php include('footer.php');?>