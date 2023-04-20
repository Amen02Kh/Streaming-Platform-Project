<?php

$connection=mysqli_connect('localhost','root','','filmhub_db');
$query = "SELECT name,year FROM `movies`;";
$result = mysqli_query($connection, $query);
$array2 = [];
if (mysqli_num_rows($result) > 0) {
    // OUTPUT DATA OF EACH ROW
    while($row = mysqli_fetch_assoc($result)) {
        $array[$row["name"]] = $row["year"];
        $array2_push($array);
    }
    
} else {
    echo "0 results";
}
/* foreach ($array as $key => $value) {
    echo nl2br("Key: $key; Value: $value\n");
} */
$connection->close();
header('Content-Type: application/json');
echo json_encode($array2);
?>