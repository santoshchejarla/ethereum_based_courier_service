<?php
session_start(); 
include "config.php";
if($_SESSION['role']=='i'){
    $valid=mysqli_fetch_array(mysqli_query($conn,"select order_id from orders where order_id='$_POST[order_id]'"));
    if ($valid[0]!=''){
    $query="update status set status='$_POST[status_update]' where order_id='$_POST[order_id]'";
    $result=mysqli_query($conn,$query);
    }
    else die("Order not found");
    if ($result==1){
         header("Location: employee.php");
    }
    else die("Unable to process request!");
}
?>