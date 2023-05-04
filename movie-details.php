
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Free Guy 2021</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

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

<body id="#top">

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
        

        <div class="lang-wrapper">
          <label for="language">
            <ion-icon name="globe-outline"></ion-icon>
          </label>

          <select name="language" id="language">
            <option value="en">EN</option>
            <option value="au">AU</option>
            <option value="ar">AR</option>
            <option value="tu">TU</option>
          </select>
        </div>

        <button class="btn btn-primary" id="signin-btn" >Log Out</button>

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





  <main>
    <article>

      <!-- 
        - #MOVIE DETAIL
      -->

      <section class="movie-detail">
        <div class="container">
        <?php
               
               $connection=mysqli_connect('localhost','root','','filmhub_db');
$errors = array();
if (!$connection) {
    die("Something went wrong;");
}

if (isset($_POST['detail'])) {

  $name = mysqli_real_escape_string($connection, $_POST['named']);
  $query2 = "SELECT id FROM movies WHERE name=?";
  $stmt = mysqli_prepare($connection, $query2);
  mysqli_stmt_bind_param($stmt, "s", $name);
  mysqli_stmt_execute($stmt);
  $result2 = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result2);
  $movie_id = $row['id'];
  $query = "SELECT name,year,image,rating,time FROM movies where id='$movie_id' ;";
  $result = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($result);
 
  if($row){ 
     
    
    
    
    


?>
          <figure class="movie-detail-banner">

            <img src='<?php echo $row['image']?>' alt="">

            <button class="play-btn">
              <ion-icon name="play-circle-outline"></ion-icon>
            </button>

          </figure>

          <div class="movie-detail-content">

            

            <h1 class="h1 detail-title">
             <strong><?php echo $row['name']?></strong>
            </h1>

            <div class="meta-wrapper">

              <div class="badge-wrapper">
                <div class="badge badge-fill">PG 13</div>

                <div class="badge badge-outline">HD</div>
              </div>

              <div class="ganre-wrapper">
                <a href="#">Comedy,</a>

                <a href="#">Action,</a>

                <a href="#">Adventure,</a>

                <a href="#">Science Fiction</a>
              </div>

              <div class="date-time">

                <div>
                  <ion-icon name="calendar-outline"></ion-icon>

                  <time datetime="<?php echo $row['year']?>"><?php echo $row['year']?></time>
                </div>

                <div>
                  <ion-icon name="time-outline"></ion-icon>

                  <time datetime="PT<?php echo $row['time']?>M"><?php echo $row['time']?></time>
                </div>

              </div>

            </div>

            <p class="storyline">
              A bank teller called Guy realizes he is a background character in an open world video game called Free
              City that will
              soon go offline.
            </p>

            <div class="details-actions">

              <button class="share">
                <ion-icon name="share-social"></ion-icon>

                <span>Share</span>
              </button>

              <div class="title-wrapper">
                <p class="title">Prime Video</p>

                <p class="text">Streaming Channels</p>
              </div>

              <button class="btn btn-primary">
                <ion-icon name="play"></ion-icon>

                <span>Watch Now</span>
              </button>

            </div>

            <a href='<?php echo $row['image']?>' download class="download-btn">
              <span>Download</span>

              <ion-icon name="download-outline"></ion-icon>
            </a>

          </div>

        </div>
      </section>

<?php
  }
}else{
  echo "
  <script >
  alert('zab');
  </script>
";
}


?>



      <!-- 
        - #TV SERIES
      -->

      <section class="tv-series">
        <div class="container">

          <p class="section-subtitle">Best TV Series</p>

          <h2 class="h2 section-title">World Best TV Series</h2>

          <ul class="movies-list">

            <li>
              <div class="movie-card">

                <a href="./movie-details.html">
                  <figure class="card-banner">
                    <img src="./assets/images/series-1.png" alt="Moon Knight movie poster">
                  </figure>
                </a>

                <div class="title-wrapper">
                  <a href="./movie-details.html">
                    <h3 class="card-title">Moon Knight</h3>
                  </a>

                  <time datetime="2022">2022</time>
                </div>

                <div class="card-meta">
                  <div class="badge badge-outline">2K</div>

                  <div class="duration">
                    <ion-icon name="time-outline"></ion-icon>

                    <time datetime="PT47M">47 min</time>
                  </div>

                  <div class="rating">
                    <ion-icon name="star"></ion-icon>

                    <data>8.6</data>
                  </div>
                </div>

              </div>
            </li>

            <li>
              <div class="movie-card">

                <a href="./movie-details.html">
                  <figure class="card-banner">
                    <img src="./assets/images/series-2.png" alt="Halo movie poster">
                  </figure>
                </a>

                <div class="title-wrapper">
                  <a href="./movie-details.html">
                    <h3 class="card-title">Halo</h3>
                  </a>

                  <time datetime="2022">2022</time>
                </div>

                <div class="card-meta">
                  <div class="badge badge-outline">2K</div>

                  <div class="duration">
                    <ion-icon name="time-outline"></ion-icon>

                    <time datetime="PT59M">59 min</time>
                  </div>

                  <div class="rating">
                    <ion-icon name="star"></ion-icon>

                    <data>8.8</data>
                  </div>
                </div>

              </div>
            </li>

            <li>
              <div class="movie-card">

                <a href="./movie-details.html">
                  <figure class="card-banner">
                    <img src="./assets/images/series-3.png" alt="Vikings: Valhalla movie poster">
                  </figure>
                </a>

                <div class="title-wrapper">
                  <a href="./movie-details.html">
                    <h3 class="card-title">Vikings: Valhalla</h3>
                  </a>

                  <time datetime="2022">2022</time>
                </div>

                <div class="card-meta">
                  <div class="badge badge-outline">2K</div>

                  <div class="duration">
                    <ion-icon name="time-outline"></ion-icon>

                    <time datetime="PT51M">51 min</time>
                  </div>

                  <div class="rating">
                    <ion-icon name="star"></ion-icon>

                    <data>8.3</data>
                  </div>
                </div>

              </div>
            </li>

            <li>
              <div class="movie-card">

                <a href="./movie-details.html">
                  <figure class="card-banner">
                    <img src="./assets/images/series-4.png" alt="Money Heist movie poster">
                  </figure>
                </a>

                <div class="title-wrapper">
                  <a href="./movie-details.html">
                    <h3 class="card-title">Money Heist</h3>
                  </a>

                  <time datetime="2017">2017</time>
                </div>

                <div class="card-meta">
                  <div class="badge badge-outline">4K</div>

                  <div class="duration">
                    <ion-icon name="time-outline"></ion-icon>

                    <time datetime="PT70M">70 min</time>
                  </div>

                  <div class="rating">
                    <ion-icon name="star"></ion-icon>

                    <data>8.3</data>
                  </div>
                </div>

              </div>
            </li>

          </ul>

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

          <a href="./index.html" class="logo">
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
          &copy; 2022 <a href="#">codewithsadee</a>. All Rights Reserved
        </p>

        <img src="./assets/images/footer-bottom-img.png" alt="Online banking companies logo" class="footer-bottom-img">

      </div>
    </div>

  </footer>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up"></ion-icon>
  </a>





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