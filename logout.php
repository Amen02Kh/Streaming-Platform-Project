<?php   
 session_start();  

if (isset($_SESSION['USER_ID'])) {  
    session_destroy();
     header("location:..\Streaming-Platform-Project\signin.php");  
       
}   
?> 