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
        $ct=0;$tot=0;}
        $id=$_GET['id'];
        $sql="SELECT * from books where bk_id=$id";
        $result=$conn->query($sql);
        while($row = $result->fetch_assoc()) {
        $name=$row['bk_name'];
        $price=$row['price'];
        $rate=$row['user_rating'];
        $autid=$row['aut_id'];
        $pubid=$row['pub_id'];
        $edit=$row['edition'];
        }
       $sql = "SELECT name,age FROM author where aut_id=$autid";
          $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
        $autname=$row['name'];
        $age=$row['age'];}
        function contemporary_authors($i){
          $servername = "localhost";
          $username = "root";
        $password = "root";
        $dbname = "bookstore";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
          $sql = "SELECT name FROM author where age<=($i+10) and age>=($i-10)";
          $result = $conn->query($sql);
          $j=0;
        while($row = $result->fetch_assoc()) {
        $aut[$j]=$row['name'];
        $j++;}
        return $aut;   
        }
        function related_products(){
             $servername = "localhost";
        $username = "root";
          $password = "root";
            $dbname = "bookstore";
         // Create connection
          $conn = new mysqli($servername, $username, $password,$dbname);
             $sql = "SELECT bk_name FROM books limit 5";
          $result = $conn->query($sql);
          $k=0;
        while($row = $result->fetch_assoc()) {
        $pro[$k]=$row['bk_name'];
        $k++;}
        return $pro;
        }
        
        function findid($s){
              $servername = "localhost";
        $username = "root";
          $password = "root";
            $dbname = "bookstore";
         // Create connection
          $conn = new mysqli($servername, $username, $password,$dbname);
         // echo $s;
             $sql = "SELECT bk_id FROM books bk_name='$s'";
          $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
        $ps=$row['bk_id'];
        }
        return $ps;
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
                        <a href="cart.html">Cart - <span class="cart-amunt"><?php echo $tot;?></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo $ct;?></span></a>
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
                        <li><a href="index.html">Home</a></li>
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
                        <h2>Shop</h2>
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
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="search.php" method="post">
                            <input type="text" name="product" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Know more...</h2>
                           <div class="thubmnail-recent">
                            <img src="img/temp-1.jpg" class="recent-thumb" alt="">
                            <h2><a href=""><br><?php echo $autname; ?></a></h2>
                            <div class="product-sidebar-price">
                                <br><h6><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. </p>
                                    <p>Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. </p>
                                    <p>Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.Mauris placerat vitae lorem gravida viverra. Mauris in fringilla ex. </p>
                                    <p>Nulla facilisi. Etiam scelerisque tincidunt quam facilisis lobortis. In malesuada pulvinar neque a consectetur. Nunc aliquam gravida purus, non malesuada sem accumsan in. Morbi vel sodales libero.</p></h6>
                            </div>
                            </div>     
                            </div>                        
                        <!--div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                    </div-->
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Contemporary Authors</h2>
                        <ul>
                            <?php 
                             $x=contemporary_authors($age);
                             $n=0;
                             for(;$x[$n]!=NULL;$n++){
                                echo "<li><a href=''>";echo $x[$n]; echo "</a></li>";
                             }
                            ?>
                            <!--li><a href="">Author 1</a></li>
                            <li><a href="">Author 2</a></li>
                            <li><a href="">Author 3</a></li>
                            <li><a href="">Author 4</a></li>
                            <li><a href="">Author 5</a></li-->
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <!--div class="product-breadcroumb">
                            <a href="">Home</a>
                            <a href="">Category Name</a>
                            <a href="">Sony Smart TV - 2015</a>
                        </div-->
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="img/temp-2.jpg" alt="">
                                    </div>
                                    
                                    <div class="product-gallery">
                                        <img src="img/temp-1.jpg" alt="">
                                        <img src="img/temp-1.jpg" alt="">
                                        <img src="img/temp-1.jpg" alt="">
                                        <img src="img/temp-1.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $name ?></h2>
                                    <div class="product-inner-price">
                                        <ins>$ <?php echo $price; ?></ins>
                                    </div>    
                                    <?php
                                    $_SESSION['bid']=$id;     ?>
                                    <form action="addtocart.php" method="post" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="qty" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                                    </form>   
                                    
                                    <!--div class="product-inner-category">
                                        <p>Category: <a href="">Summer</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                    </div--> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.</p>

                                                <p>Mauris placerat vitae lorem gravida viverra. Mauris in fringilla ex. Nulla facilisi. Etiam scelerisque tincidunt quam facilisis lobortis. In malesuada pulvinar neque a consectetur. Nunc aliquam gravida purus, non malesuada sem accumsan in. Morbi vel sodales libero.</p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Ratings</h2>
                                                <!--div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div-->
                                                    <div class="rating-chooser">
                                                        <p>User rating</p>

                                                        <div class="rating-wrap-post">
                                                            <?php $q=0; 
                                                            for(;$q<$rate;$q++){
                                                               echo '<i class="fa fa-star"></i>';
                                                            }?>
                                                            <!--i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i-->
                                                        </div>
                                                    </div>
                                                    <!--p><h4> Your Rating : </h4>
                                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                         <p><input type="submit" value="Submit"></p-->
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                          <?php
                                $a=related_products();
             $sql = "SELECT bk_id FROM books limit 5";
          $result = $conn->query($sql);
          $k=0;
          while($row = $result->fetch_assoc()) {
                  $b[$k]=$row['bk_id'];
                  $k++;
                }
                                ?>
                        
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                            <div class="related-products-carousel">
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/temp-1.jpg" alt="">
                                        <div class="product-hover">
                                            <!--a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a-->
                                            <a href="<?php echo "singlebook.php?id="; echo $b[0];?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>
                                    <h2><a href='<?php echo "singlebook.php?id="; echo $b[0];?>'><?php echo $a[0];?></a></h2>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/temp-2.jpg" alt="">
                                        <div class="product-hover">
                                            <!--a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a-->
                                            <a href="<?php echo "singlebook.php?id="; echo $b[1];?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="<?php echo "singlebook.php?id="; echo $b[1];?>"><?php echo $a[1];?></a></h2>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/temp-1.jpg" alt="">
                                        <div class="product-hover">
                                            <!--a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a-->
                                            <a href="<?php echo "singlebook.php?id="; echo $b[2];?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="<?php echo "singlebook.php?id="; echo $b[2];?>"><?php echo $a[2];?></a></h2>                                
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/temp-2.jpg" alt="">
                                        <div class="product-hover">
                                            <!--a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a-->
                                            <a href="<?php echo "singlebook.php?id="; echo $b[3];?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="<?php echo "singlebook.php?id="; echo $b[3];?>"><?php echo $a[3];?></a></h2>                          
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/temp-2.jpg" alt="">
                                        <div class="product-hover">
                                            <!--a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a-->
                                            <a href="<?php echo "singlebook.php?id="; echo $b[4];?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="<?php echo "singlebook.php?id="; echo $b[4];?>"><?php echo $a[4];?></a></h2>                                 
                                </div>                        
                                </div>                                    
                            </div>
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