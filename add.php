<?php
               
               $connection=mysqli_connect('localhost','root','','filmhub_db');
$errors = array();
if (!$connection) {
    die("Something went wrong;");
}

if (isset($_POST['watchbtn'])) {
  
  $name = mysqli_real_escape_string($connection, $_POST['namee']);
  $query2 = "SELECT id FROM movies WHERE name=?";
  $stmt = mysqli_prepare($connection, $query2);
  mysqli_stmt_bind_param($stmt, "s", $name);
  mysqli_stmt_execute($stmt);
  $result2 = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result2);
  $movie_id = $row['id'];
  $query3 = "SELECT id FROM watch_list WHERE id=?";
  $stmt = mysqli_prepare($connection, $query3);
  mysqli_stmt_bind_param($stmt, "i", $movie_id);
  mysqli_stmt_execute($stmt);
  $result3 = mysqli_stmt_get_result($stmt);
  if(mysqli_num_rows($result3)==0){  $query = "INSERT INTO watch_list (id) VALUES ('$movie_id')";
    $result = mysqli_query($connection, $query);
    header("location:..\Streaming-Platform-Project\index.php"); }else{
        header("location:..\Streaming-Platform-Project\index.php");
    }

}

?>