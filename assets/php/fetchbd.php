<?php
$connection=mysqli_connect('localhost','root','','filmhub_db');
$query = "SELECT name,year FROM `movies`;";
$result = mysqli_query($connection, $query);
$array = [];
if (mysqli_num_rows($result) > 0) {
    // OUTPUT DATA OF EACH ROW
    while($row = mysqli_fetch_assoc($result)) {
        $array[] = [
            "name" => $row["name"],
            "year" => $row["year"]
        ];
    }
    
} else {
    echo "0 results";
}
$connection->close();
header('Content-Type: application/json');
echo json_encode($array);
?>
