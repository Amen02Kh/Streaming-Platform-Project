<?php
session_start();
$connection=mysqli_connect('localhost','root','','filmhub_db');
$errors = array();
if (!$connection) {
    die("Something went wrong;");
}
echo "heloo";
if (isset($_GET['name'])) {
  echo "zzzzzzzz";
    $name = mysqli_real_escape_string($connection, $_GET['name']);
    $query = "SELECT * FROM movies WHERE name = '$name'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      echo "nnnnnnnnn";
        // display the movie details
        while ($row = mysqli_fetch_assoc($result)) {
            $year = $row['year'];
            $image = $row['image'];
            $category = $row['category'];
            $rating = $row['rating'];
        }

        // add the movie to watchlist
        if (isset($_POST['watchbtn'])) {
          $watchlist = isset($_SESSION['watchlist']) ? $_SESSION['watchlist'] : array();
      
          if (!isset($watchlist[$name])) {
              $watchlist[$name] = array(
                  'name' => $name,
                  'year' => $year,
                  'image' => $image,
                  'category' => $category,
                  'rating' => $rating
              );
          }
          
          $_SESSION['watchlist'] = $watchlist;
      
          header("Location: watchlist.php");
          exit;
      }
        
    } else {
        $errors[] = "Movie not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchlist App</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Streaming-Platform-Project/assets/css/style4.css">
    <link rel="stylesheet" href="../Streaming-Platform-Project/assets/css/style.css">
</head>
<body>
  <a href="index.php"> <button> Go back home</button> </a>
    <div class="container watchlist-container">
        <h2 class="watchlist-heading">Watchlist</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Poster</th>
                    <th>Rating</th>
                    <th>Year</th>
                    <th>Genre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                  $name = mysqli_real_escape_string($connection, $_GET['name']);
                  $query = "SELECT * FROM movies WHERE name = '$name'";
                  $result = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($result)): ?>
                    
                    <tr>
                        <td class="card-title"><?php echo $row['name']; ?></td>
                        <td class="card-title"><img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?> poster" class="movie-poster"></td>
                        <td class="card-title"><?php echo $row['rating']; ?></td>
                        <td class="card-title"><?php echo $row['year']; ?></td>
                        <td class="card-title"><?php echo $row['category']; ?></td>
                       <td>
                            <form method="post">
                                <button type="submit" name="submit" class="btn btn-primary">Add to Watchlist</button>
                            </form>
                        </td> 
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>
</body>
</html>