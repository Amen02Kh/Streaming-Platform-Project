<?php

$connection=mysqli_connect('localhost','root','','filmhub_db');
$query = "SELECT name,year,image,rating,time FROM movies m,watch_list w where w.id=m.id ;";
$result = mysqli_query($connection, $query);

$data = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

mysqli_close($connection);

header('Content-Type: application/json');
echo json_encode($data);
?>
