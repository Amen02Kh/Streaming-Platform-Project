<?php
$connection=mysqli_connect('localhost','root','','filmhub_db');
if (isset($_POST['remove'])) {
  
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $query2 = "SELECT id FROM movies WHERE name=?";
    $stmt = mysqli_prepare($connection, $query2);
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    $result2 = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result2);
    $movie_id = $row['id'];
    $query = "DELETE FROM watch_list WHERE id='$movie_id';";
    $result = mysqli_query($connection, $query);
    header("location:..\Streaming-Platform-Project\watchlist.php");  
  }
?>