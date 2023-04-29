<?php
$connection=mysqli_connect('localhost','root','','filmhub_db');
$errors= array();
if(!$connection){
    die("Something went wrong;");
}

 if (isset($_POST['watchbtn'])) {
    $sql = mysqli_query($connection, "SELECT * FROM movies");
    $num = mysqli_num_rows($sql);
    //if ($num > 0) {
    $row = mysqli_fetch_assoc($sql);
    $name=$row['name'];
    $year=$row['year'];
    $image=$row['image'];
    $category=$row['category'];

   // }



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
    <div class="container watchlist-container">
      <h2 class="watchlist-heading">Watchlist mazelt bditch juste netaaked li howa yabeeth</h2>
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
          <?php while ($row = mysqli_fetch_assoc($sql)): ?>
            <tr>
              <td class="card-title"><?php echo $row['name']; ?></td>
              <td class="card-title"><img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?> poster" class="movie-poster"></td>
              <td class="card-title"><?php echo $row['rating']; ?></td>
              <td class="card-title"><?php echo $row['year']; ?></td>
              <td class="card-title"><?php echo $row['category']; ?></td>
              <td>
                <a href="#" class="btn btn-primary" role="button">Update</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
      <div class="watchlist-stats">
        <p>Number of movies to watch: <?php echo $num; ?></p>
      </
