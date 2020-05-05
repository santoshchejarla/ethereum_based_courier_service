<?php
session_start();
echo $_SESSION['email'];
echo $_SESSION['location_id'];
echo $_SESSION['fast'];
echo $_SESSION['delicate'];
echo $_SESSION['to_address'];
echo $_SESSION['item_1_id'];
echo $_SESSION['item_2_id'];
echo $_SESSION['item_3_id'];
echo $_SESSION['desc'];
//include "config.php";
$conn= new mysqli("localhost","root","","courier");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$valid=mysqli_fetch_array(mysqli_query($conn,"select email from user where email='$_SESSION[email]'"));
if($valid[0]!=''){
    if ($_SESSION['role']=='a' or $_SESSION['role']=='i'){
        if($_SESSION['fast']==1) $exp=date('d')+1;
        else $exp=date('d')+2;
        $date= date("Y")."-".date("m")."-".$exp;
        
        #cost_calc
        //echo $_POST['item_2_id'];
        $query="select cost from cost where location_id='$_SESSION[location_id]'";
        $cost=mysqli_fetch_array(mysqli_query($conn,$query));
        if($_SESSION['fast']==1){
            $cost[0]=$cost[0]+1;
        }  
        if($_SESSION['delicate']==1){
            $cost[0]=$cost[0]+1;
        }
        $query="select address from user where email='$_SESSION[email]'";
        $res=mysqli_fetch_array(mysqli_query($conn,$query));
        $query="./token.py $res[0] $_POST[pvtkey] $cost[0]";
        //echo $query;
        $res=exec($query);
        //var_dump($res);
        if($res==NULL) {echo $res;die("Unable to complete transaction! Incorrect Password");}
        $query="insert into contents (item_id,description) values('$_SESSION[item_1_id]','$_SESSION[desc]')";
        $result=mysqli_query($conn,$query);
        $query="select max(order_id) from contents";
        $id=mysqli_fetch_array(mysqli_query($conn,$query));
        if($_SESSION['item_2_id']!=''){ 
            $query="insert into contents (order_id,item_id,description) values('$id[0]','$_SESSION[item_2_id]','$_SESSION[desc]')";
            echo $query;
            $result=mysqli_query($conn,$query);
        }
        if($_SESSION['item_3_id']!=''){
            $query="insert into contents (order_id,item_id,description) values('$id[0]','$_SESSION[item_3_id]','$_SESSION[desc]')";
            $result=mysqli_query($conn,$query);
        }
        $name="select name from user where email in (select email from delivery where sub_area='$_SESSION[location_id]')";
        $name=mysqli_fetch_array(mysqli_query($conn,$name));
        $query="insert into orders (email,to_address,express,delicate,location_id,t_cost) values('$_SESSION[email]','$_SESSION[to_address]','$_SESSION[fast]','$_SESSION[delicate]','$_SESSION[location_id]','$cost[0]')";
        $result=mysqli_query($conn,$query);
        $query="insert into status (status,expected,delivery_boy) values('Package Received','$date','$name[0]')";  
        mysqli_query($conn,$query);
        if ($_SESSION['role']=='a') header('Location: admin.php');
        else header('Location: employee.php');
    }
    else echo "Not Allowed!";
}
else{
    die("User Not found");
}
?>
