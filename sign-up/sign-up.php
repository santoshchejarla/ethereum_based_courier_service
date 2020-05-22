<?php
include 'config.php';
// error_reporting(-1);
// ini_set('display_errors', 'On');
//---------------------------
$fname=addslashes($_POST["fname"]);
$lname=addslashes($_POST["lname"]);
$email=addslashes($_POST["email"]);
$password=addslashes($_POST["password"]);
$phone=addslashes($_POST["phone"]);
$address=addslashes($_POST["address"]);
$eaddress=addslashes($_POST["eaddress"]);
//---------------------------
$query="INSERT INTO user VALUES('$email', '$password', 'c','$fname','$eaddress')";
$result = mysqli_query($conn,$query);
echo $query;
$query = "INSERT INTO customer VALUES('$email','$fname','$lname','$phone','$address')";
#echo $query;
$result2= mysqli_query($conn,$query);
if ($result==1 && $result2==1){
    session_start();
    $_SESSION['role']='c';
    echo "Registered Succsfully! Redirecting you to the home page.";
    header("Location: ../customer.php"); 
}
else{
    echo "Unable to process the request!";
}
?>