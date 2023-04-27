<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<?php
$connection=mysqli_connect('localhost','root','','filmhub_db');
$errors= array();
if(!$connection){
    die("Something went wrong;");
}

 if (isset($_POST['pswd2'])) {
   $username=$_POST['username'];
   $email=$_POST['email'];
   $password=$_POST['pswd2'];
   
    #encrypting pwd for security
//    $password_hash=password_hash($password,PASSWORD_DEFAULT);
   $password_hash=password_hash($password,PASSWORD_DEFAULT);
   #insertion user jdid
    $sql="INSERT INTO login_register(`username`,`email`,`password`) values( ?, ?,?)";
    
    # preventing SQL INJECTION
    $stmt=mysqli_stmt_init($connection);
    $preparestmt=mysqli_stmt_prepare($stmt,$sql);
    if($preparestmt) {
        mysqli_stmt_bind_param($stmt,"sss",$username,$email,$password_hash);
        mysqli_stmt_execute($stmt);
        echo json_encode(array('success' => true));
        exit();
        //echo"<div class='alert alert-success'> You are now registered successfully. </div>";
        //header('location:../../signin.html');

    }
    else{
        die("Something went wrong");
    } 
}
?> --> 