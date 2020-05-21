<?php
session_start();
error_reporting(0);
if ($_SESSION['role']!='i'){die('Please login! <a href="login/"> here </a>');}
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fast Delivery</title>

    <link rel="stylesheet" href="bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="font-awesome.min.css" rel="stylesheet">
    <link href="fonts/stylesheet.css" rel="stylesheet">
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/slick.css" rel="stylesheet">
    <link href="css/jquery.mb.YTPlayer.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/meanmenu.css">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body class="js">

    <div id="preloader"></div>

    <section class="about-us">
        <div class="logo_menu" id="sticker">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-lg-2 col-sm-2 col-xs-6">
                        <div class="logo">
                            <!-- <a href="index.html"><img src="img/logo.png" alt="logo"></a> -->
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6 col-md-offset-1 col-sm-7 col-lg-offset-1 col-lg-6 mobMenuCol">
                        <nav class="navbar">
                                <ul class="nav navbar-nav navbar-right menu">
                                    <li><a href="index.html">home</a>
                                    </li>
                                </ul>
                            <!-- /.navbar-collapse -->
                        </nav>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-4 col-lg-3 signup">
                        <ul class="nav navbar-nav">
                            <li><a href="login/">login</a></li>
                            <li><a href="sign-up/">sign up</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--    start pricing area-->
    <!-- Pricing Area -->
    <section class="about_top">
        <div class="container">
            <div class="row page-title">
                <div class="col-md-5 col-sm-6">
                    <div class="pricing-desc section-padding-two">
                        <div class="pricing-desc-title">
                            <div class="title">
                                <h2>Employee Panel</h2>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                    <div class="about_us_content_title">
                        <ul class="breadcrumbs">
                            <li><a href="index.html">home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <style>
                table {
                border-collapse: collapse;
                width: 100%;
                }

                th, td {
                text-align: left;
                padding: 8px;
                }

                tr:nth-child(even) {background-color: #f2f2f2;}
                hr { 
                    display: block;
                    margin-top: 0.5em;
                    margin-bottom: 0.5em;
                    margin-left: auto;
                    margin-right: auto;
                    border-style: inset;
                    border-width: 1px;
                    } 
                </style>
                <?php
                
                    $result=mysqli_query($conn,"select * from orders order by order_id");
                    $result2=mysqli_query($conn,"select * from status order by order_id");
                    echo "<h3><b>Orders</b></h3><hr>";
                    echo '<table callpadding="10" border="1">
                    <tr>
                    <th>Order ID</th>
                    <th>Email</th>
                    <th>Delivery Address</th>
                    <th>Fast</th>
                    <th>Delicate</th>
                    <th>Status</th>
                    <th>Last Update</th>
                    <th>Expected</th>
                    <th>Cost</th>
                    </tr>';

                    while($row = mysqli_fetch_array($result) and $row2 = mysqli_fetch_array($result2))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['1'] . "</td>";
                        echo "<td>" . $row['0'] . "</td>";
                        echo "<td>" . $row['2'] . "</td>";
                        echo "<td>" . $row['3'] . "</td>";
                        echo "<td>" . $row['4'] . "</td>";
                        echo "<td>" . $row2['1'] . "</td>";
                        echo "<td>" . $row2['2'] . "</td>";
                        echo "<td>" . $row2['3'] . "</td>";
                        echo "<td>" . $row['t_cost'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></br>";
                
            
                ?>
                <br><h3><b>Add A New Order</b></h3><hr>
            <form action="payment/index.php" method="post">
            <p>Email : </p><input name="email" type="email" placeholder="email"/><br><br>
            <p>Delivery address : </p>
                <input type="text" name="to_address" placeholder="delivery address"><br><br>
            <p>Location ID</p>
                <input typr="int" name="location_id" placeholder="Location ID"><br><br>
            <p>Item 1 ID</p>
            <input type="int" name="item_1_id" placeholder="Item ID"><br><br>
            <p>Item 2 ID </p>
            <input type="int" name="item_2_id" placeholder="Item ID"><br><br>
            <p>Item 3 ID </p>
            <input type="int" name="item_3_id" placeholder="Item ID"><br><br>
            <p>Description</p>
            <input type="text" name="desc" placeholder="Note"><br><br>
            <p>Fast Delivery : 
                <input type="radio" name="fast" value="0" checked> No 
                <input type="radio" name="fast" value="1"> Yes </p>
            <p>Delicate Delivery :
            <input type="radio" name="delicate" value="0" checked> No 
                <input type="radio" name="delicate" value="1"> Yes </p>
            <input type="submit">
            </form><br>
            <h3><b>Update Orders</b></h3><hr>
            <form action="up_order.php" method="post">
            <p>Order id : </p><input name="order_id" type="text" placeholder="Order ID"/><br><br>
            <p>Order Status : </p>
                <input type="text" name="status_update" placeholder="New State">
                <br><br>
                <input type="submit">
            </form>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </section>
    <!-- /.End Of Pricing Area -->

    <div class="copyright-area">
        <div class="container">
            <div class="col-xs-12 col-sm-6 col-md-6 text-left">
                <div class="footer-text">
                    <p>Copyright 2016, All Rights Reserved</p>
                </div>
            </div>
            <div class="col-xs-12  col-sm-6 col-md-6 text-right">
                <div class="footer-text">
                </div>
            </div>
        </div>
    </div>



    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.nav.js"></script>
    <script src="js/jquery.mb.YTPlayer.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>