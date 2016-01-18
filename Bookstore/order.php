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
$x=rand(100,1000);
$sql = "INSERT INTO `us_or`(`or_id`, `u_name`) VALUES ($x,'$uname')";
          $result = $conn->query($sql);
          

$price=$_GET['price'];
$bcoun_name=$_POST['billing_country'];
$b_name=$_POST['billing_name'];
$badd1=$_POST['billing_address_1'];
$badd2=$_POST['billing_address_2'];
$bcity=$_POST['billing_city'];
$bstat=$_POST['billing_state'];
$bpin=$_POST['billing_postcode'];
$bemail=$_POST['billing_email'];
$bphone=$_POST['billing_phone'];
if(isset($_POST['ship-to-different-address-checkbox'])){
$scoun_name=$_POST['shipping_country'];
$s_name=$_POST['shipping_name'];
$sadd1=$_POST['shipping_address_1'];
$sadd2=$_POST['shipping_address_2'];
$scity=$_POST['shipping_city'];
$sstat=$_POST['shipping_state'];
$spin=$_POST['shipping_postcode'];
$semail=$_POST['shipping_email'];
$sphone=$_POST['shipping_phone'];	
}
else{
	$scoun_name=$_POST['billing_country'];
$s_name=$_POST['billing_name'];
$sadd1=$_POST['billing_address_1'];
$sadd2=$_POST['billing_address_2'];
$scity=$_POST['billing_city'];
$sstat=$_POST['billing_state'];
$spin=$_POST['billing_postcode'];
$semail=$_POST['billing_email'];
$sphone=$_POST['billing_phone'];
}
//INSERT INTO `order`(`or_id`, `ship_st`, `ship_ad`, `pay_link`, `price`) VALUES ($x,'just placed',$badd1.$badd2.$bcity.$bstat.$bcoun_name,'#',$price);
$sql = "INSERT INTO `order`(`or_id`, `ship_st`, `ship_ad`, `pay_link`, `price`) VALUES ($x,'payment_not_received','$badd1.$badd2.$bcity.$bstat.$bcoun_name','#',$price);";
          $result = $conn->query($sql);



 $sql = "SELECT `cart_id` FROM `cart_user` WHERE u_name='$uname'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) {
        	$cid=$row['cart_id'];
        }
    }
    $cc=0;
        $sql = "SELECT * FROM cart where cart_id=$cid";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) { 
          // output data of each row
        while($row = $result->fetch_assoc()) {
            $pri[$cc]=$row['price'];
            $qt[$cc]=$row['qty'];
         $bkid[$cc]=$row['bk_id'];
         $bkna[$cc]=bkname($bkid[$cc]);
         $cc++;
        }
    }
function bkname($id){
    $servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bookstore";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   $bk="#";
    $sql = "SELECT bk_name FROM books where bk_id=$id";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) { 
          // output data of each row
        while($row= $result->fetch_assoc()) {
        $bk=$row['bk_name'];
         }}
         return $bk;
     }



  $sql="DELETE FROM `cart` WHERE cart_id=$cid";
    $result=$conn->query($sql);

 $sql = "UPDATE cart_user set tot_price=0,discounts=0 where cart_id=$cid";
       $result = $conn->query($sql);
       $mydate=getdate(date("U"));
     //header("location:index.php");
   //exit;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bookstore | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-globe"></i> Bookstore
              <small class="pull-right">Date: <?php echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";?></small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            From
            <address>
              <strong>Bookstore, Inc.</strong><br>
              1600 Amphitheatre Parkway,<br> 
              Mountain View, CA <br>
              Phone: 9943925036<br>
              Email: info@bookstore.website.pk
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            To
            <address>
              <strong><?php echo  $b_name;?></strong><br>
              <?php echo $badd1.$badd2.$bcity;?><br>
              <?php echo $bstat; echo "Pin code :".$bpin;?><br>
              Phone: <?php echo $bphone;?><br>
              Email: <?php echo $bemail;?>
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>Order ID:</b> <?php echo $x;?><br>
            <!--b>Payment Due:</b> 2/22/2014<br-->
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Book</th>
                  <th>qty</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                <?php $q=0;
                for(;$q<$cc;$q++){?>
                <tr>
                  <td></td>
                  <td><?php echo $bkna[$q];?></td>
                  <td><?php echo $qt[$q];?></td>
                  <td>$ <?php echo $pri[$q];?></td>
                </tr>
                <?php } ?>
                <!--tr>
                  <td>1</td>
                  <td>Need for Speed IV</td>
                  <td>247-925-726</td>
                  <td>Wes Anderson umami biodiesel</td>
                  <td>$50.00</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Monsters DVD</td>
                  <td>735-845-642</td>
                  <td>Terry Richardson helvetica tousled street art master</td>
                  <td>$10.70</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Grown Ups Blue Ray</td>
                  <td>422-568-642</td>
                  <td>Tousled lomo letterpress</td>
                  <td>$25.99</td>
                </tr-->
              </tbody>
            </table>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
          <!-- accepted payments column -->
          <!--div class="col-xs-6">
            <p class="lead">Payment Methods:</p>
            <img src="../../dist/img/credit/visa.png" alt="Visa">
            <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
            <img src="../../dist/img/credit/american-express.png" alt="American Express">
            <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
            </p>
          </div><!-- /.col -->
          <div class="col-xs-6">
            <p class="lead">Amount Due 2/22/2014</p>
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">Subtotal:</th>
                  <td>$ <?php echo $price;?></td>
                </tr>
                <tr>
                  <th>Shipping:</th>
                  <td>$5.00</td>
                </tr>
                <tr>
                  <th>Total:</th>
                  <td>$ <?php echo $price+5;?></td>
                </tr>
              </table>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
  </body>
</html>
