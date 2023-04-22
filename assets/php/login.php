<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<?php
$connection=mysqli_connect('localhost','root','','filmhub_db');
$errors= array();
if(!$connection){
    die("Something went wrong;");
}

if (isset($_POST['username'])) {
   $username=$_POST['username'];
   $password=$_POST['password'];
   
    #test al bd
    $sql="SELECT password FROM login_register WHERE username=?";
    
    # preventing SQL INJECTION
    $stmt = mysqli_stmt_init($connection);
    $preparestmt = mysqli_stmt_prepare($stmt, $sql);
    if ($preparestmt) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
        
        
        if (password_verify($password, $row['password'])) {
            echo json_encode(array('success' => true));
            exit();
        } else {
            echo json_encode(array('success' => false));
        }
    }}
    } else {
        echo json_encode(array('success' => false));
        die("Something went wrong");
    }
}
?>