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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filmlane - Best movie collections</title>

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

<body id="top">
 
  <!-- 
    - #HEADER
  -->

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
        <a href="..\Streaming-Platform-Project\watchlist.php"><ion-icon size="large" name="time-outline"></ion-icon>
        
</a>

        

        <a href="..\Streaming-Platform-Project\logout.php"><button class="btn btn-primary" id="signin-btn" >Log out</button></a>

      </div>

      <button class="menu-open-btn" data-menu-open-btn>
        <ion-icon name="reorder-two"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <div class="navbar-top">

          <a href="./index.php" class="logo">
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
            <a href="#upcoming" class="navbar-link">Upcoming</a>
          </li>

          <li>
            <a href="#tvshow" class="navbar-link">Tv Show</a>
          </li>

         

          <li>
            <a href="#pricing" class="navbar-link">Pricing</a>
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





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">Filmlane</p>

            <h1 class="h1 hero-title">
              Unlimited <strong>Movie</strong>, TVs Shows, & More.
            </h1>

            <div class="meta-wrapper">

              <div class="badge-wrapper">
                <div class="badge badge-fill">PG 18</div>

                <div class="badge badge-outline">HD</div>
              </div>

              <div class="ganre-wrapper">
                <a href="#">Romance,</a>

                <a href="#">Drama</a>
              </div>

              <div class="date-time">

                <div>
                  <ion-icon name="calendar-outline"></ion-icon>

                  <time datetime="2022">2022</time>
                </div>

                <div>
                  <ion-icon name="time-outline"></ion-icon>

                  <time datetime="PT128M">128 min</time>
                </div>

              </div>

            </div>

            <button class="btn btn-primary">
              <ion-icon name="play"></ion-icon>

              <span>Watch now</span>
            </button>

          </div>

        </div>
      </section>





      <!-- 
        - #UPCOMING
      -->

      <section id ="upcoming" class="upcoming">
        <div class="container">

          <div class="flex-wrapper">

            <div class="title-wrapper">
              <p class="section-subtitle">Online Streaming</p>

              <h2 class="h2 section-title">Upcoming Movies</h2>
            </div>

            <ul class="filter-list">

              <li>
                <button class="filter-btn">Movies</button>
              </li>

              <li>
                <button class="filter-btn">TV Shows</button>
              </li>

              <li>
                <button class="filter-btn">Anime</button>
              </li>

            </ul>

          </div>

          <ul class="movies-list  has-scrollbar">
    <?php

      $connection=mysqli_connect('localhost','root','','filmhub_db');
      $query = "SELECT name,year,image,rating,time FROM `movies`where upcoming='yes';";
      $result = mysqli_query($connection, $query);

      if (mysqli_num_rows($result) > 0) {
        foreach($result as $row) {
   
    ?>
<li> 
  
                    
              <div class="movie-card">
              <form id="detail" action="./movie-details.php" method="POST">
                    <input type="hidden" name="named" value="<?php echo $row['name'] ?>"> 
                    
                <a href="#">
                <button class="overlay-button" hidden type='submit' name='detail'>
                  <figure class="card-banner">
                    <img src='<?php echo $row['image']?>' alt="">
                  </figure>
                </a>
                </button>



                <div class="title-wrapper">
                  <a href="">
                    
                    <h3 class="card-title"><?php echo $row['name']?></h3>
                  </a>

                  <time datetime='<?php echo $row['year']?>'><?php echo $row['year']?></time>
                </div>
                </form>
                <div class="card-meta">
                  <div class="badge badge-outline">HD</div>
                  <form id="addwatch" method="post" action="../Streaming-Platform-Project/add.php">
            <input type="hidden" name="namee" value="<?php echo $row['name'] ?>">         
            <button type="submit" name="watchbtn">
            </form>
              <div class="badge badge-outline">Watch List &nbsp;&nbsp;♡</div>
            </button>
          
                  <div class="duration">
                    <ion-icon name="time-outline"></ion-icon>

                    <time datetime="PT'<?php echo $row['time']?>'M"><?php echo $row['time']?> min</time>
                  </div>

                  <div class="rating">
                    <ion-icon name="star"></ion-icon>

                    <data><?php echo $row['rating']?></data>
                  </div>
                </div>

              </div>
              
   
           
    <?php
    
  }

}
mysqli_close($connection);
?>
 </li>
          </ul>

        </div>
      </section>





      <!-- 
        - #SERVICE
      -->
      <section id="pricing" class="pricing-plans">
        <div class="pricing-card basic">
          <div class="heading">
            <h4>BASIC</h4>
            
          </div>
          <p class="price">
            2Dt
            <sub>/month</sub>
          </p>
          <ul class="features">
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>Unlimited</strong> Shows
            </li>
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>480p</strong> Quality
            </li>
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>Exclusive</strong> Profile
            </li>
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>One </strong>Server
            </li>
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>Translation</strong> 3 Languages
            </li>
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>24/7</strong> support
            </li>
          </ul>
          <button class="cta-btn" onclick="window.location.href = 'checkout.html';">SELECT</button>
        </div>
        <div class="pricing-card standard">
          <div class="heading">
            <h4>STANDARD</h4>
            
          </div>
          <p class="price">
            5DT
            <sub>/month</sub>
          </p>
          <ul class="features">
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>Unlimited</strong> Shows and Movies
            </li>
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>HD</strong> Quality
            </li>
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>Exclusive</strong> Profile
            </li>
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>two </strong>Servers
            </li>
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>Translation</strong> 5 Languages
            </li>
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>24/7</strong> support
            </li>
          </ul>
          <button class="cta-btn" onclick="window.location.href = 'checkout.html';"> Select</button>
        </div>
        <div class="pricing-card premium">
          <div class="heading">
            <h4>PREMIUM</h4>
            
          </div>
          <p class="price">
            10DT
            <sub>/month</sub>
          </p>
          <ul class="features">
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>Unlimited</strong> Shows and Movies
            </li>
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>4K</strong> Quality
            </li>
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>Multiple </strong>Profiles
            </li>
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>4</strong> Servers
            </li>
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>Translation</strong> 8 Languages
            </li>

            <li>
              <i class="fa-solid fa-check"></i>
              <strong>24/7 priority</strong> support
            </li>
            <li>
              <i class="fa-solid fa-check"></i>
              <strong>Advanced</strong> security features
            </li>
          </ul>
          <button class="cta-btn" onclick="window.location.href = 'checkout.html';">SELECT</button>
        </div>
      </section>





      <!-- 
        - #TOP RATED
      -->

      <section class="top-rated">
        <div class="container">

          <p class="section-subtitle">Online Streaming</p>

          <h2 class="h2 section-title">Top Rated Movies</h2>

          <ul class="filter-list">

            <li>
              <button class="filter-btn">Movies</button>
            </li>

            <li>
              <button class="filter-btn">TV Shows</button>
            </li>

            <li>
              <button class="filter-btn">Documentary</button>
            </li>

            <li>
              <button class="filter-btn">Sports</button>
            </li>

          </ul>

          <ul class="movies-list">
          <?php

$connection=mysqli_connect('localhost','root','','filmhub_db');
$query = "SELECT name,year,image,rating,time FROM `movies` where category='movie';";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
  foreach($result as $row){
   
    ?>
<li>
              <div class="movie-card">

                <a href="./movie-details.html">
                  <figure class="card-banner">
                    <img src='<?php echo $row['image']?>' alt="">
                  </figure>
                </a>

                <div class="title-wrapper">
                  <a href="./movie-details.html">
                    <h3 class="card-title"><?php echo $row['name']?></h3>
                  </a>

                  <time datetime='<?php echo $row['year']?>'><?php echo $row['year']?></time>
                </div>

                <div class="card-meta">
                  <div class="badge badge-outline">HD</div>
                  <form id="addwatch" method="post" action="../Streaming-Platform-Project/add.php">
            <input type="hidden" name="namee" value="<?php echo $row['name'] ?>">         
            <button type="submit" name="watchbtn">
              <div class="badge badge-outline">Watch List &nbsp;&nbsp;♡</div>
            </button>
          </form>
                  <div class="duration">
                    <ion-icon name="time-outline"></ion-icon>

                    <time datetime="PT'<?php echo $row['time']?>'M"><?php echo $row['time']?> min</time>
                  </div>

                  <div class="rating">
                    <ion-icon name="star"></ion-icon>

                    <data><?php echo $row['rating']?></data>
                  </div>
                </div>

              </div>
            </li>
    <?php
    
  }

}
mysqli_close($connection);
?>
            

          </ul>

        </div>
      </section>





      <!-- 
        - #TV SERIES
      -->

      <section id="tvshow" class="tv-series">
        <div class="container">

          <p class="section-subtitle">Best TV Series</p>

          <h2 class="h2 section-title">World Best TV Series</h2>

          <ul class="movies-list">
          <?php
$connection = mysqli_connect('localhost', 'root', '', 'filmhub_db');
$query = "SELECT name, year, image, rating, time FROM `movies` WHERE category='tvshow';";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
  foreach ($result as $row) {
?>
    <li>
      <div class="movie-card">
        <a href="./movie-details.html">
          <figure class="card-banner">
            <img src="<?php echo $row['image'] ?>" alt="">
          </figure>
        </a>
        <div class="title-wrapper">
          <a href="./movie-details.html">
            <h3 class="card-title"><?php echo $row['name'] ?></h3>
          </a>
          <time datetime="<?php echo $row['year'] ?>"><?php echo $row['year'] ?></time>
        </div>
        <div class="card-meta">
          <div class="badge badge-outline">HD</div>
          <form id="addwatch" method="post" action="../Streaming-Platform-Project/add.php">
            <input type="hidden" name="namee" value="<?php echo $row['name'] ?>">         
            <button type="submit" name="watchbtn">
              <div class="badge badge-outline">Watch List &nbsp;&nbsp;♡</div>
            </button>
          </form>
          <div class="duration">
            <ion-icon name="time-outline"></ion-icon>
            <time datetime="PT'<?php echo $row['time'] ?>'M"><?php echo $row['time'] ?> min</time>
          </div>
          <div class="rating">
            <ion-icon name="star"></ion-icon>
            <data><?php echo $row['rating'] ?></data>
          </div>
        </div>
      </div>
    </li>
<?php
  }
}
mysqli_close($connection);
?>

          </ul>

        </div>
      </section>
     


      <!-- 
        - #CTA
      -->

      <section class="cta">
        <div class="container">

          <div class="title-wrapper">
            <h2 class="cta-title">Trial start first 30 days.</h2>

            <p class="cta-text">
              Enter your email to create or restart your membership.
            </p>
          </div>

          <form action="" class="cta-form">
            <input type="email" name="email" required placeholder="Enter your email" class="email-field">

            <button type="submit" class="cta-form-btn">Get started</button>
          </form>

        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand-wrapper">

          <a href="./index.php" class="logo">
            <img src="./assets/images/logo.svg" alt="Filmlane logo">
          </a>

          <ul class="footer-list">

            <li>
              <a href="./index.html" class="footer-link">Home</a>
            </li>

            <li>
              <a href="#" class="footer-link">Movie</a>
            </li>

            <li>
              <a href="#" class="footer-link">TV Show</a>
            </li>

            <li>
              <a href="#" class="footer-link">Web Series</a>
            </li>

            <li>
              <a href="#" class="footer-link">Pricing</a>
            </li>

          </ul>

        </div>

        <div class="divider"></div>

        <div class="quicklink-wrapper">

          <ul class="quicklink-list">

            <li>
              <a href="#" class="quicklink-link">Faq</a>
            </li>

            <li>
              <a href="#" class="quicklink-link">Help center</a>
            </li>

            <li>
              <a href="#" class="quicklink-link">Terms of use</a>
            </li>

            <li>
              <a href="#" class="quicklink-link">Privacy</a>
            </li>

          </ul>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-pinterest"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2023 <a href="#">FilmHub</a>. All Rights Reserved
        </p>

        <img src="./assets/images/footer-bottom-img.png" alt="Online banking companies logo" class="footer-bottom-img">

      </div>
    </div>

  </footer>





  <!-- 
    - #GO TO TOP
  -->

  

  



  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>
  
 
  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
