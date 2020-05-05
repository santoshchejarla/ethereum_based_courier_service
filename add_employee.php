<?php
session_start();
include 'config.php';
//---------------------------
$employee=$_POST["employee"];
$email=$_POST["email"];
$name=$_POST['name'];
$password=$_POST["password"];
$salary=$_POST["salary"];
$area=$_POST["area"];
$address=$_POST["address"];
$pvtkey=$_POST["pvtkey"];
// if($_SESSION['role']=='a'){
//---------------------------
$query="INSERT INTO user VALUES( '$email', '$password', '$employee','$name','$pvtkey','$address')";
$result1 = mysqli_query($conn,$query);
if ($employee=='i'){
    $query="INSERT INTO incharge VALUES( '$email', '$salary', '$area')";
    $result2 = mysqli_query($conn,$query);  
}
else{
    $query="INSERT INTO delivery VALUES( '$email', '$salary', '$area')";
    $result2 = mysqli_query($conn,$query); 
}

if ($result1==1 && $result2==1){
    echo "Registered Succsfully! Redirecting you to the home page.";
    header("Location: admin.php"); 
}
else{
    echo "Unable to process the request!";
}
// }
?>