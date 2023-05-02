<?php
 session_start();  

 if (!isset($_SESSION['user'])) {   
      header("location:..\Streaming-Platform-Project\signin.php");  
      die(); 
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchlist App</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    
     <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">
  

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  
</head>
<body>
<header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="./index.php" class="logo">
        <img src="./assets/images/logo.svg" alt="Filmlane logo">
      </a>

      <div class="header-actions">

        <div class="searchin"> 
          <input type="text" placeholder="Search"  id="searching">
          <ion-icon name="search-outline"></ion-icon>
          <div class="searchbox">
            <!-- <a href="#">
              
              <div class="content">
                <h6>Doctor Strange</h6>
                <p>2021</p>
              </div>
            </a> -->
          </div>
        </div>
        <a href="..\Streaming-Platform-Project\logout.php"><ion-icon name="time-outline"></ion-icon>
        
</a>

        

        <a href="..\Streaming-Platform-Project\logout.php"><button class="btn btn-primary" id="signin-btn" >Log out</button></a>

      </div>

      <button class="menu-open-btn" data-menu-open-btn>
        <ion-icon name="reorder-two"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <div class="navbar-top">

          <a href="./index.html" class="logo">
            <img src="./assets/images/logo.svg" alt="Filmlane logo">
          </a>

          <button class="menu-close-btn" data-menu-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>

        </div>

        <ul class="navbar-list">

          <li>
            <a href="./index.php" class="navbar-link">Home</a>
          </li>

          <li>
            <a href="./index.php#upcoming" class="navbar-link">Upcoming</a>
          </li>

          <li>
            <a href="./index.php#tvshow" class="navbar-link">Tv Show</a>
          </li>

         

          <li>
            <a href="./index.php#pricing" class="navbar-link">Pricing</a>
          </li>


        </ul>

        <ul class="navbar-social-list">

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-pinterest"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

      </nav>

    </div>
  </header>

  <section id ="upcoming" class="upcoming">
        <div class="container">

          <div class="flex-wrapper">

            <div class="title-wrapper">
              <p class="section-subtitle">Online Streaming</p>

              <h2 class="h2 section-title">My WatchList</h2>
            </div>

            
          </div>

          <ul id="test" class="movies-list  has-scrollbar">
          <script>
$(document).ready(function() {
    $.ajax({
        url: '../Streaming-Platform-Project/watch.php',
        method: "POST",
        dataType: 'json',
        success: function(data) {
            
            var html = '';
            $.each(data, function(index, item) {
                html += '<li>';
                html += '<div class="movie-card">';
                html += '<a href="./movie-details.html">';
                html += '<figure class="card-banner">';
                html += '<img src="' + item.image + '" alt="">';
                html += '</figure>';
                html += '</a>';
                html += '<div class="title-wrapper">';
                html += '<a href="./movie-details.html">';
                html += '<h3 class="card-title">' + item.name + '</h3>';
                html += '</a>';
                html += '<time datetime="' + item.year + '">' + item.year + '</time>';
                html += '</div>';
                html += '<div class="card-meta">';
                html += '<div class="badge badge-outline">HD</div>';
                html += '<form method="post" action="../Streaming-Platform-Project/watch.php">';
                html += '<input type="hidden" name="name" value="' + item.name + '">';
                html += '<button type="submit" name="remove">';
                html += '<div class="badge badge-outline">Remove</div>';
                html += '</button>';
                html += '</form>';
                html += '<div class="duration">';
                html += '<ion-icon name="time-outline"></ion-icon>';
                html += '<time datetime="PT' + item.time + 'M">' + item.time + ' min</time>';
                html += '</div>';
                html += '<div class="rating">';
                html += '<ion-icon name="star"></ion-icon>';
                html += '<data>' + item.rating + '</data>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</li>';
            });
            $('#test').html(html);
        }
    });
});
</script>










<script src="./assets/js/script.js"></script>
  

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>
</html>