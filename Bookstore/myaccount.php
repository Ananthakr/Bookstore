<?php
session_start();
if(isset($_SESSION['user'])){
        $uname=$_SESSION['user'];}
    else {  
        $uname="guest";    
    }
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bookstore";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
        //getting cartid
          $sql = "SELECT * FROM cart_user where u_name='$uname'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) { 
          // output data of each row
        while($row = $result->fetch_assoc()) {
        $cartid=$row['cart_id'];$tot=$row['tot_price'];}
        //getting ct
          $sql = "SELECT * FROM cart where cart_id='$cartid'";
          $result = $conn->query($sql);
          $ct=mysqli_num_rows($result);
        } else {
        $ct=0;$tot=0;$cartid=0;}
         $cc=0;
        $sql="SELECT `or_id` FROM `us_or` WHERE `u_name`='$uname'";
         $result = $conn->query($sql);

          if ($result->num_rows > 0) { 
          // output data of each row
        while($row = $result->fetch_assoc()) {
        $orid[$cc]=$row['or_id'];
        $ship[$cc]=ships($orid[$cc]);
        $price[$cc]=prices($orid[$cc]);
        $cc++;
    }
    }
    function ships($id){
        $servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bookstore";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$s=0;
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
        $sql="SELECT `ship_st` FROM `order` WHERE or_id=$id";
         $result = $conn->query($sql);

          if ($result->num_rows > 0) { 
          // output data of each row
        while($row = $result->fetch_assoc()) {
        $s=$row['ship_st'];
    }
    }
    return $s;
    }
    function prices($id){
        $servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bookstore";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$s=0;
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
        $sql="SELECT `price` FROM `order` WHERE or_id=$id";
         $result = $conn->query($sql);

          if ($result->num_rows > 0) { 
          // output data of each row
        while($row = $result->fetch_assoc()) {
        $s=$row['price'];
    }
    }
    return $s;
    }

    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookstore - The more you read,the more you know.</title>
    <link rel="icon" type="image/png" href="img/fav.png" sizes="16x16"/>
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="myaccount.php"><i class="fa fa-user"></i><?php echo $uname;?></a></li>
                            <!--li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li-->
                            <li><a href="cart.php"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="checkout.php"><i class="fa fa-user"></i> Checkout</a></li>
                            <li><a href="login.php"><i class="fa fa-user"></i> Login</a></li>
                            <?php if($uname!="guest")
                           echo " have another account?";

                           ?>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.php"><!--span>Bookstore</span-->
                            <img src="img/logo-bs.png" class="img-responsive" alt=""></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">Cart - <span class="cart-amunt"><?php echo $tot;?></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo $ct;?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <!--li><a href="shop.html">Categories</a></li-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Books <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <li><a href="latest.php">Latest</a></li>
                            <li><a href="child.php">For children</a></li>
                            <li><a href="fiction.php">Fiction</a></li>
                            <li><a href="non-fiction.php">Non-fiction</a></li>
                            <li><a href="exams.php">For competitive exams</a></li>
                            </ul>
                        </li>
                        <li><a href="ebooks.php">E books</a></li>
                        <li><a href="ejournals.php">E journals</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->


<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>My account</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title"><?php echo $uname;?></h2>
                          <a href="logout.php">LOG OUT</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
        <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                       <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">Order id</th>
                                            <th class="product-name">Order Status</th>
                                            <th class="product-price">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $q=0;
                                    for(;$q<$cc;$q++){
                                        ?>
                                        <tr class="cart_item">
                                           <td class="order_id">
                                                <span class="amount"><?php echo $orid[$q];?></span>
                                            </td>
                                            <td class="product-name">
                                                <a href=""><?php echo $ship[$q];?></a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">$ <?php echo $price[$q];?></span> 
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>












    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2><span>Bookstore</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="#">My account</a></li>
                            <li><a href="#">Order history</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Vendor contact</a></li>
                            <li><a href="index.html">Front page</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">We sell</h2>
                        <ul>
                            <li><a href="#">Books</a></li>
                            <li><a href="#">Study Materials</a></li>
                            <li><a href="#">E books</a></li>
                            <li><a href="#">E journals</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 Bookstore. All Rights Reserved. </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>



