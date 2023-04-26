<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'filmhub_db');


if (isset($_POST['submit-btn-log'])) {
    $user =$_POST['username1'];
    $password =$_POST['password1'];

    $sql = mysqli_query($conn, "SELECT * FROM login_register WHERE username = '$user'");
    $num = mysqli_num_rows($sql);

    if ($num > 0) {
        $row = mysqli_fetch_assoc($sql);
		echo $row['password'];
		echo '<br>';
		echo strlen($row['password']);
		echo '<br>';
		echo $password;
		echo '<br>';
		// var_dump(password_verify($password, substr($row['password'],0,60) ) );
		var_dump(password_verify($password, $row['password'] ) );
		var_dump(gettype($row['password']));
		var_dump(gettype($row['password']));
			if (!password_verify($password, $row['password'] )) {
            $_SESSION['user'] = $row['id'];
            header("location:index.php");
            exit();
        } else {
            echo '<script>alert("pass ghalet")</script>';
        }
    } else {
        echo '<script>alert("user famech")</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	
	<link rel="stylesheet" href="./assets/css/style.css">
	<link rel="stylesheet" href="./assets/css/style2.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.css">
	<link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
	<style>
		.alert.alert-success {
			text-align: center;
	background-color: #dff0d8;
	font-size: 16px;
	color: #3c763d;
	border-color: #d6e9c6;
	padding:10px;
	border-radius: 10px;
  }

  .alert.alert-danger {
	text-align: center;
	background-color: #dff0d8;
	font-size: 16px;
	color: #9c1717;
	border-color: #d6e9c6;
	padding:10px;
	border-radius: 10px;
  }
	</style>
</head>
<body>
	

	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup" id="registration-form">
				<form method="post" id="signup-form" action="../Streaming-Platform-Project/register.php">
					<label>Sign up</label>
					<input type="text" name="username" placeholder="User name" id="username" required="">
					<input type="email" name="email" placeholder="Email" id="email"required="">
					<input type="password" name="pswd2" placeholder="Password" id="password" required="">
					<button type="submit" name="submit-btn" >Sign up</button>
				</form>
			</div>

			<div class="login">
				<form method="post" id="login-form" action="../Streaming-Platform-Project/php/login.php" >
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="username" placeholder="Username" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button type="submit" name="submit-btn-log" >Login</button>
				</form>
				  <a href="../Streaming-Platform-Project/guest.html"> <button  id="submit-btn">Login as a guest</button> </a>
			</div>

	</div>
	<script>
/* $(document).ready(function(){
    $('#login-form').submit(function(e){
        e.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();
        $.ajax({
            url: '../Streaming-Platform-Project/assets/php/login.php',
            method: 'POST',
            data: {
                username: username,
                password: password,
                
            },
            success: function(response){
				
                if(response.success) {
                    $('.login .alert-success').remove();
                    $('.login').append('<div class="alert alert-success">You are now logged in you will be redirected.</div>');
                    $('#login-form')[0].reset();
                    console.log(response);
                } else {
                    $('.login .alert-danger').remove();
                    $('.login').append('<div class="alert alert-danger">You are not logged in.</div>');
                    $('#login-form')[0].reset();
                    console.log(response);
                }
            }
        });
    });
});
 */










		$(document).ready(function(){
			$('#signup-form').submit(function(e){
				e.preventDefault();
				var username = $('#username').val();
				var email = $('#email').val();
				var password = $('#password').val();
				$.ajax({
					url: '../Streaming-Platform-Project/assets/php/register.php',
					method: 'POST',
					data: {
						username: username,
						email: email,
						password: password,
						submit: true
					},
					success: function(response){
						
						$('.signup .alert-success').remove();
						$('.signup').append('<div class="alert alert-success">You are now registered successfully.</div>');
						$('#signup-form')[0].reset();
						console.log(response);
					}
					
				});
			});
		});
	</script>	
</body>
</html>