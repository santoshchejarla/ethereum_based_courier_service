<?php
session_start();
$_SESSION['email']=$_POST['email'];
$_SESSION['location_id']=$_POST['location_id'];
$_SESSION['fast']=$_POST['fast'];
$_SESSION['delicate']=$_POST['delicate'];
$_SESSION['to_address']=$_POST['to_address'];
$_SESSION['item_1_id']=$_POST['item_1_id'];
$_SESSION['item_2_id']=$_POST['item_2_id'];
$_SESSION['item_3_id']=$_POST['item_3_id'];
$_SESSION['desc']=$_POST['desc'];
$conn= new mysqli("localhost","root","","courier");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$valid=mysqli_fetch_array(mysqli_query($conn,"select email from user where email='$_POST[email]'"));
if($valid[0]!=''){
        if($_POST['fast']==1) $exp=date('d')+1;
        else $exp=date('d')+2;
        $date= date("Y")."-".date("m")."-".$exp;

        $query="select cost from cost where location_id='$_POST[location_id]'";
        $cost=mysqli_fetch_array(mysqli_query($conn,$query));
        if($_POST['fast']==1){
            $cost[0]=$cost[0]+1;
        }  
        if($_POST['delicate']==1){
            $cost[0]=$cost[0]+1;
        }

      }

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='font-awesome.min.css'>
<link rel="stylesheet" href="./style.css">
</head>
<body>
<!-- partial:index.partial.html -->

<div class="container">
  <form action="../add_order.php" method="POST">
    <div class="row">
    <?php
              echo "<h4> Total Cost : ".$cost[0]." Ether</h4>";
      ?>
      <div class="input-group input-group-icon">
        <input name='pvtkey' type="password" placeholder="pvtkey"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <!-- <div class="input-group input-group-icon">
        <input name='password' type="password" placeholder="Password"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div> -->
    </div>
    <input type="submit" value="Authenticate Transaction">
  </form>
</div>
<!-- partial -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="./script.js"></script>

</body>
</html>