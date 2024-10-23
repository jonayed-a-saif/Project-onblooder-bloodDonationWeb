
<?php include 'config.php'?>
<?php include 'session.php'?>
  



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>OnBlooder - Admin Dashboard</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/bundles/codemirror/lib/codemirror.css">
  <link rel="stylesheet" href="assets/bundles/codemirror/theme/duotone-dark.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/logo.png' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
<div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
             
             <!-- <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
             --> 
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          
          
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Admin</div>
             
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">OnBlooder</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="index.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
              <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="map-pin"></i><span>Address Section</span></a>
              <ul class="dropdown-menu">
                 <li><a class="nav-link" href="all_address.php"> Address List</a></li>

              
              </ul>
            
            
            
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Slider Section</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="all_slider.php">Slider List</a></li>
                
              </ul>
            </li>
               
           
             
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="droplet"></i><span>Blood Section</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="all_group.php">Blood List</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown">
                  <i data-feather="user"></i><span>Donor Section</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="all_donor.php">Donor List</a></li>
                <li><a class="nav-link" href="add_user.php">Add Donor</a></li>
                
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>About Section</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="all_about.php">About List</a></li>
                
              </ul>
            </li>
            
            
              <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>User Section</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="all_user.php">User List</a></li>
                
              </ul>
            </li>
            
            
            
            
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Blog's Section</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="all_category.php">Blog Category List</a></li>
                <li><a class="nav-link" href="all_blogs.php">Blog's List</a></li>
               
              </ul>
        
          
              
              
              
            </li>
          
         
          </ul>
        </aside>
      </div>