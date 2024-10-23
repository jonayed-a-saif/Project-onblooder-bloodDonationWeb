<?php include 'admin/config.php';
include 'session.php';


if($login_session==null){
    $name="Login";
    $profile1="Login to Website";
    $profile2="Apply as Donner";
}else{
    $sql = "SELECT * FROM user where username='$login_session'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $name=$row['name'];
}}
  $profile1="Go to  Profile";
   
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OnBlooder - Empowering Blood Donation in Bangladesh</title>
  <meta name="title" Content="OnBlooder - Empowering Blood Donation in Bangladesh">
    <meta name="description" content="OnBlooder is a dedicated blood donation platform in Bangladesh, connecting voluntary blood donors with those in need. Join our community of compassionate donors, create your account, and contribute to saving lives. Together, let's make a difference in bridging the gap between blood supply and demand.">
    <meta name="keywords" content="OnBlooder,Blood Donation,Blood Donation Platform, donor bd, Blood, Donor, Blood, Bangladesh, Need, Blood Donor bangladesh, Emergency Blood, Blood lagbe">
    <link rel="shortcut icon" href="assets/images/logoIcon/favicon.png" type="image/x-icon">

    
    <link rel="apple-touch-icon" href="assets/images/logoIcon/logo.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="OnBlooder - Home">
    
    <meta itemprop="name" content="OnBlooder - Home">
    <meta itemprop="description" content="">
    <meta itemprop="image" content="https://www.daralriyadh.com/uploads/in-the-media/2023.jpg">
    
    <meta property="og:type" content="website">
    <meta property="og:title" content="OnBlooder - Empowering Blood Donation in Bangladesh">
    <meta property="og:description" content="OnBlooder is a dedicated blood donation platform in Bangladesh, connecting voluntary blood donors with those in need. Join our community of compassionate donors, create your account, and contribute to saving lives. Together, let's make a difference in bridging the gap between blood supply and demand.">
    <meta property="og:image" content="https://www.daralriyadh.com/uploads/in-the-media/2023.jpg"/>
    <meta property="og:image:type" content="image/jpg" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:url" content="#">
    
    <meta name="twitter:card" content="summary_large_image">
  <link rel="icon" type="image/png" href="assets/images/logoIcon/favicon.png" sizes="16x16">
  <link rel="stylesheet" href="assets/templates/basic/frontend/css/lib/bootstrap.min.css">
  <link rel="stylesheet" href="assets/templates/basic/frontend/css/all.min.css"> 
  <link rel="stylesheet" href="assets/templates/basic/frontend/css/line-awesome.min.css"> 
  <link rel="stylesheet" href="assets/templates/basic/frontend/css/lightcase.css"> 
  <link rel="stylesheet" href="assets/templates/basic/frontend/css/lib/slick.css">
  <link rel="stylesheet" href="assets/templates/basic/frontend/css/main.css">
  <link rel="stylesheet" href="assets/templates/basic/css/custom.css">
      <link href="assets/templates/basic/frontend/css/colore4b4.css?color=FB3640&amp;secondColor=17173A" rel="stylesheet"/>


      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
</head>
    <body> 
                <div class="scroll-to-top">
            <span class="scroll-icon">
                <i class="las la-arrow-up"></i>
            </span> 
        </div> 
       <div class="preloader-holder">
              <div class="preloader">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </div>
        </div>
        <header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row align-items-center gy-2">
                <div class="col-lg-6 col-md-8 col-sm-9">
                    <ul class="header__info-list d-flex flex-wrap align-items-center justify-content-sm-start justify-content-center">
                       <!-- <li><a href="#"><i class="las la-phone"></i> +889638241654</a></li>-->
                        <li><a href=""><i class="las la-envelope"></i> <span class="__cf_email__" data-cfemail="">info@onblooder.com</span></a></li>
                    </ul>
                </div>
               <!-- <div class="col-lg-6 col-md-4 col-sm-3 text-sm-end text-center">
                    <select class="language-select langSel">
                                                    <option value="en"  selected  >English</option>
                                                    <option value="hn" >Hindi</option>
                                                    <option value="bn" >Bangla</option>
                                            </select>
                </div>-->
            </div>
        </div>
    </div>

    <div class="header__bottom"> 
        <div class="container">
            <nav class="navbar navbar-expand-xl p-0 align-items-center">
                <a class="site-logo site-title" href="https://onblooder.com">
                    <img src="https://onblooder.com/assets/images/logoIcon/logo.png" alt="logo"> 
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu-toggle"></span>
                </button>
                <div class="collapse navbar-collapse mt-lg-0 mt-3" id="navbarSupportedContent">
                    <ul class="navbar-nav main-menu ms-auto">
                        <li><a href="https://onblooder.com/">Home</a></li>
                                                     <li><a href="about-us.php">About</a></li>
                                                    <li><a href="single_donor.php">Donor</a></li>
                                                    <li><a href="blog.php">Blog</a></li>
                                                    <li><a href="contact.php">Contact</a></li>
                                                    
                                                    <li><a href="signin.php"><?php echo $name?> </a></li>
                                            </ul>
                                            
                                            <?php 
                                            if($login_session == null){?>
                    <div class="nav-right">
                        <a href="apply_donor.php" class="btn btn-md btn--base d-flex align-items-center"><i class="las la-user fs--18px me-2"><?php echo $profile2?></i> </a>
                    </div>
                 <?php   }?>
                </div>
            </nav>
        </div>
    </div>
</header>     
