<?php
#ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
include 'config.php';
//---------------------------
$email=$_POST["email"];
$password=$_POST["password"];
//---------------------------
echo $email;
$query="select email from user where email='$email'";
$result = mysqli_fetch_array(mysqli_query($conn,$query));
if ($result['email']!=''){
$query="select password from user where email='$email'";
$result = mysqli_fetch_array(mysqli_query($conn,$query));
if ($result['password']==$password){
    echo "Login successful!";
   $query="select role,email from user where email='$email' and password='$password'";
   $result=mysqli_fetch_array(mysqli_query($conn,$query));
   session_start();
   $_SESSION['role']=$result['role'];
   $_SESSION['email']=$result['email'];
   if($result['role']=='d') header('Location: ../delivery.php');
   else{
        if($result['role']=='c') header('Location: ../customer.php');
        else{
            if($result['role']=='a') header('Location: ../admin.php');
            else{
            header('Location: ../employee.php');
                }
            }
        }
}
else{
    echo " Unable to login <a href='./'>click here to login again</a>";
}
}
else{
    echo " User not found <a href='../sign-up/'> click here to register</a>";
}
?>
