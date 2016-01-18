<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookstore - The more you read,the more you know.</title>
    
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
   
    
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.php"><!--span>Bookstore</span-->
                            <img src="img/logo-bs.png" class="img-responsive" alt=""></a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row">
        <div class="span12">
            <div class="" id="loginModal">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3>Have an Account?</h3>
              </div>
              <div class="modal-body">
                <div class="well">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                    <li><a href="#create" data-toggle="tab">Create Account</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="login">
                      <form class="form-horizontal" action="checklogin.php" method="POST">
                        <fieldset>
                          <div id="legend">
                            <legend class="">Login</legend>
                          </div>    
                          <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  for="username">Username</label>
                            <div class="controls">
                              <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                            </div>
                          </div>
     
                          <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" for="password">Password</label>
                            <div class="controls">
                              <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                            </div>
                          </div>
     
     
                          <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                              <button class="btn btn-success">Login</button>
                            </div>
                          </div>
                        </fieldset>
                      </form>                
                    </div>
                    <div class="tab-pane fade" id="create">
                      <form id="tab" action="signup.php" method="post">
                        <fieldset>
                            <div id="legend">
                            <legend class="">Sign up</legend>
                          </div>
                        <div class="container">
                           <div class="control-group"> 
                            <!-- Username -->
                               <label class="control-label"  for="username">Username</label>
                               <div class="controls">
                               <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                               </div>
                            </div>
                            <div class="control-group"> 
                            <!-- password -->
                               <label class="control-label"  for="password">Password</label>
                               <div class="controls">
                               <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                               </div>
                            </div>
                            <div class="control-group"> 
                            <!-- confirm password -->
                               <label class="control-label"  for="cpassword">Confirm password</label>
                               <div class="controls">
                               <input type="password" id="cpassword" name="cpassword" placeholder="" class="input-xlarge">
                               </div>
                            </div>
                            <div class="control-group"> 
                            <!-- email -->
                               <label class="control-label"  for="email">Email</label>
                               <div class="controls">
                               <input type="email" id="email" name="email" placeholder="" class="input-xlarge">
                               </div>
                            </div>
                            <div class="control-group"> 
                            <!-- DOB -->
                               <label class="control-label"  for="dob">Date Of Birth</label>
                               <div class="controls">
                               <input type="date" id="dob" name="dob" placeholder="" class="input-xlarge">
                               </div>
                            </div>
                            <div class="control-group"> 
                            <!-- Street -->
                               <label class="control-label"  for="street">Street</label>
                               <div class="controls">
                               <input type="text" id="street" name="street" placeholder="" class="input-xlarge">
                               </div>
                            </div>
                            <div class="control-group"> 
                            <!-- City -->
                               <label class="control-label"  for="city">City</label>
                               <div class="controls">
                               <input type="text" id="city" name="city" placeholder="" class="input-xlarge">
                               </div>
                            </div><div class="control-group"> 
                            <!-- pincode -->
                               <label class="control-label"  for="pin">Pincode</label>
                               <div class="controls">
                               <input type="text" id="pin" name="pin" placeholder="" class="input-xlarge">
                               </div>
                            </div>
                            <div class="control-group"> 
                            <!-- Phone no -->
                               <label class="control-label"  for="phone">Phone number</label>
                               <div class="controls">
                               <input type="text" id="phone" name="phone" placeholder="" class="input-xlarge">
                               </div>
                            </div>
                        </div>
                        <div>
                          <button class="btn btn-primary">Create Account</button>
                        </div>
                    </div>
                     </fieldset>
                      </form>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div></div>
    <!--User form-->
    <!--div class="container">
      <div class="col-sm-6 well">
              <span align="center"><h3>Sign up</h3></span>
                       
      </div>
      <div class="col-sm-6 well">
             <span align="center"><h3>Login</h3></span>
                <div class="col-sm-8">
                <form role="form">
                     <div class="form-group">
                         <label for="email">Email address:</label>
                         <input type="email" class="form-control" id="email">
                     </div>
                     <div class="form-group">
                         <label for="pwd">Password:</label>
                         <input type="password" class="form-control" id="pwd">
                     </div>
                  <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
      </div>
    </div-->
    <!--footer-->
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