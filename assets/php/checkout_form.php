<?php

$connection=mysqli_connect('localhost','root','','filmhub_db');
if(!$connection){
    die("Something went wrong;");
}

if (isset($_POST['send'])) {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zipcode=$_POST['zipcode'];
    $cardname=$_POST['cardname'];
    $creditcard=$_POST['creditcard'];
    $expm=$_POST['expm'];
    $expy=$_POST['expy'];
    $cvv=$_POST['cvv'];

    $request="INSERT INTO payment(name,email,address,city,state,zipcode,cardname,creditcard,expm,expy,cvv) VALUES('$name','$email','$address','$city','$state','$zipcode','$cardname','$creditcard','$expm','$expy','$cvv')";

    mysqli_query($connection,$request);
    sleep(2);
    header('location:../../index.html');
}
else{
    echo "Page d'erreur coocking ...";
}

?>
