<?php
           $servername = "localhost";
           $username = "root";
          $password = "root";
            $dbname = "bookstore";
         // Create connection
          $conn = new mysqli($servername, $username, $password,$dbname);
if(!$conn){
  die("connection error");
}
         //most searched

          $sql = "SELECT `bk_name`,max(`search`) FROM `books`";
          $result = $conn->query($sql);
          
        while($row = $result->fetch_assoc()) {
        $bk=$row['bk_name'];
        $cb=$row['max(`search`)'];
      }


          $sql = "SELECT `ed_name`,max(`search`) FROM `ebooks`";
          $result = $conn->query($sql);
          
        while($row = $result->fetch_assoc()) {
        $eb=$row['ed_name'];
        $ce=$row['max(`search`)'];
      }


          $sql = "SELECT `ej_name`,max(`search`) FROM `ejourn`";
          $result = $conn->query($sql);
          
        while($row = $result->fetch_assoc()) {
        $ej=$row['ej_name'];
        $cj=$row['max(`search`)'];
      }

      //past 10 orders

       $sql = "SELECT * FROM `order`";
          $result = $conn->query($sql);
          $rc=mysqli_num_rows($result);
          if($rc>8){
          $rc=$rc-8;


          $sql = "SELECT or_id,price,ship_st FROM `order` limit $rc,8";
          $result = $conn->query($sql);
          }
          else{
            $sql = "SELECT or_id,price,ship_st FROM `order`";
          $result = $conn->query($sql);
          }
           $c=0;
          
        while($row = $result->fetch_assoc()) {
          
          $or[$c]=$row['or_id'];
          $opri[$c]=$row['price'];
          $ost[$c]=$row['ship_st'];
          $c++;
      }
      $result->close();

      //for recently addes books;

          $sql = "SELECT * FROM `books`";
          $result = $conn->query($sql);
          $bc=mysqli_num_rows($result);
          
          $bc=$bc-5;


          $sql = "SELECT bk_name,price FROM `books` limit $bc,5";
          $result = $conn->query($sql);
           $q=0;
          while($row = $result->fetch_assoc()) {
          $array[$q]=$row['bk_name'];
          $bpri[$q]=$row['price'];
          $q++;
           }
      //total sales
           $sql = "SELECT SUM(`price`) as total FROM `order`";
          $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) {
          $tot=$row['total'];}
          $result->close();
      
      //total members
           $sql = "SELECT * FROM `user`";
          $result = $conn->query($sql);
          $users=mysqli_num_rows($result);
          $result->close();

     
     //for chart


         $jan=0;$feb=0;$mar=0;$apr=0;$may=0;$jun=0;$jul=0;$aug=0;$sep=0;$oct=0;$nov=0;$dec=0;


          $sql = "SELECT SUM(`total`) as tot FROM `sales` where `month`=1 AND `year`=year(now())";
          $result = $conn->query($sql);
          
           while($row = $result->fetch_assoc()) {
          $jan=$row['tot'];}
          $result->close();
            
          $sql = "SELECT SUM(`total`) as tot FROM `sales` where `month`=2 AND `year`=year(now())";
          $result = $conn->query($sql);
        
           while($row = $result->fetch_assoc()) {
          $feb=$row['tot'];}
          $result->close();

           $sql = "SELECT SUM(`total`) as tot FROM `sales` where `month`=3  AND `year`=year(now())";
          $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) {
          $mar=$row['tot'];}
          $result->close();

          $sql = "SELECT SUM(`total`) as tot FROM `sales` where `month`=4 AND `year`=year(now())";
          $result = $conn->query($sql);
          
           while($row = $result->fetch_assoc()) {
          $apr=$row['tot'];}
          $result->close();

          $sql = "SELECT SUM(`total`) as tot FROM `sales` where `month`=5 AND `year`=year(now())";
          $result = $conn->query($sql);
        
           while($row = $result->fetch_assoc()) {
          $may=$row['tot'];}
          $result->close();


          $sql = "SELECT SUM(`total`) as tot FROM `sales` where `month`=6 AND `year`=year(now())";
          $result = $conn->query($sql);
          
           while($row = $result->fetch_assoc()) {
          $jun=$row['tot'];}
          $result->close();

          $sql = "SELECT SUM(`total`) as tot FROM `sales` where `month`=7 AND `year`=year(now())";
          $result = $conn->query($sql);
          
           while($row = $result->fetch_assoc()) {
          $jul=$row['tot'];}
          $result->close();

          $sql = "SELECT SUM(`total`) as tot FROM `sales` where `month`=8 AND `year`=year(now())";
          $result = $conn->query($sql);
        
           while($row = $result->fetch_assoc()) {
          $aug=$row['tot'];}
          $result->close();

          $sql = "SELECT SUM(`total`) as tot FROM `sales` where `month`=9 AND `year`=year(now())";
          $result = $conn->query($sql);
          
           while($row = $result->fetch_assoc()) {
          $sep=$row['tot'];}
          $result->close();

          $sql = "SELECT SUM(`total`) as tot FROM `sales` where `month`=10 AND `year`=year(now())";
          $result = $conn->query($sql);
          
           while($row = $result->fetch_assoc()) {
          $oct=$row['tot'];}
          $result->close();

          $sql = "SELECT SUM(`total`) as tot FROM `sales` where `month`=11 AND `year`=year(now())";
          $result = $conn->query($sql);
          if($result!=NULL){
           while($row = $result->fetch_assoc()) {
          $nov=$row['tot'];}
          $result->close();}

          $sql = "SELECT SUM(`total`) as tot FROM `sales` where `month`=12 AND `year`=year(now())";
          $result = $conn->query($sql);
          if($result!=NULL){
           while($row = $result->fetch_assoc()) {
          $dec=$row['tot'];}
          $result->close();}


        $nov=0;
        $dec=0;
          //echo $jan." ".$feb." ".$mar." ".$apr." ".$may." ".$jun." ".$jul." ".$aug." ".$sep." ".$oct." ".$nov." ".$dec;
          //echo "<br><br><br><br><br>"
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bookstore | Dashboard</title>
    <link rel="icon" type="image/png" href="../img/fav.png" sizes="16x16"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><i>b</i></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Bookstore.Inc,</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/avatar04.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Admin</p>
              <a href="#"><i class="fa fa-circle text-success"></i> On Board</a>
            </div>
          </div>
          <!-- search form -->
          <form action="../search.php" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="product" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <!--ul class="treeview-menu">
                <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul-->
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>ADD</span>
                <span class="label label-primary pull-right">5</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="admin_books.php"><i class="fa fa-circle-o"></i>Add books</a></li>
                <li><a href="admin_ebooks.php"><i class="fa fa-circle-o"></i>Add ebooks</a></li>
                <li><a href="admin_ejournals.php"><i class="fa fa-circle-o"></i>Add ejournals</a></li>
                <li><a href="admin_authors.php"><i class="fa fa-circle-o"></i>Add authors</a></li>
                <li><a href="admin_publishers.php"><i class="fa fa-circle-o"></i>Add publishers</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>SHOW</span>
                <span class="label label-primary pull-right">5</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="show_books.php"><i class="fa fa-circle-o"></i>Show all books</a></li>
                <li><a href="show_ebooks.php"><i class="fa fa-circle-o"></i>Show all ebooks</a></li>
                <li><a href="show_ejournals.php"><i class="fa fa-circle-o"></i>Show all ejournals</a></li>
                <li><a href="show_authors.php"><i class="fa fa-circle-o"></i>Show all authors</a></li>
                <li><a href="show_publishers.php"><i class="fa fa-circle-o"></i>Show all publishers</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>SALES</span>
                <span class="label label-primary pull-right">3</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="show_torders.php"><i class="fa fa-circle-o"></i>Show today's orders</a></li>
                <li><a href="archive.php"><i class="fa fa-circle-o"></i>Archive day sales</a></li>
                <li><a href="sales_table.php"><i class="fa fa-circle-o"></i>Sales table</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Bookstore</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">CPU Traffic</span>
                  <span class="info-box-number">50<small>%</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-facebook"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Likes</span>
                  <span class="info-box-number">41,410</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Sales  today</span>
                  <span class="info-box-number">$ <?php echo $tot;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Members</span>
                  <span class="info-box-number"><?php echo $users;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Monthly Recap Report</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      <p class="text-center">
                        <strong>Sales: 2015</strong>
                      </p>
                      <div class="chart">
                        <!-- Sales Chart Canvas -->
                        <canvas id="areaChart" style="height: 180px;"></canvas>
                      </div><!-- /.chart-responsive -->
                    </div><!-- /.col -->
                
                    <div class="col-md-4">
                      <p class="text-center">
                        <strong>Most searched</strong>
                      </p>
                      <div class="progress-group">
                        <span class="progress-text">Book : <?php echo $bk;?></span>
                        <span class="progress-number"><b><?php echo $cb;?> times</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: <?php echo ($cb*10)%100;?>%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Ebook : <?php echo $eb;?></span>
                        <span class="progress-number"><b><?php echo $ce;?> times</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-red" style="width: <?php echo ($ce*10)%100;?>%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Ejournal : <?php echo $ej;?></span>
                        <span class="progress-number"><b><?php echo $cj;?> times</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-green" style="width: <?php echo ($cj*10)%100;?>%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <div class="col-md-12">
            <!-- TABLE: LATEST ORDERS -->
              <div class="col-md-6">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Orders</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Price</th>
                          <th>Status</th>
                         </tr>
                      </thead>
                      <tbody>
                      <?php $s=0;
                       for(;$s<$c;$s++){?>
                        <tr>
                          <td><a href="pages/examples/invoice.html"><?php echo $or[$s];?></a></td>
                          <td>$ <?php echo $opri[$s];?></td>
                          <td><span class="label label-danger"><?php echo $ost[$s];?></span></td>
                         </tr>
                         <?php
                       }?>
                        <!--tr>
                          <td><a href="pages/examples/invoice.html">OR1848</a></td>
                          <td>Samsung Smart TV</td>
                          <td><span class="label label-warning">Pending</span></td>
                          </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR7429</a></td>
                          <td>iPhone 6 Plus</td>
                          <td><span class="label label-danger">Delivered</span></td>
                          </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR7429</a></td>
                          <td>Samsung Smart TV</td>
                          <td><span class="label label-info">Processing</span></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR1848</a></td>
                          <td>Samsung Smart TV</td>
                          <td><span class="label label-warning">Pending</span></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR7429</a></td>
                          <td>iPhone 6 Plus</td>
                          <td><span class="label label-danger">Delivered</span></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR9842</a></td>
                          <td>Call of Duty IV</td>
                          <td><span class="label label-success">Shipped</span></td>
                        </tr-->
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
               <!-- PRODUCT LIST -->
              <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recently Added Books</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                  <?php $d=0;
                     for(;$d<$q;$d++){?>
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title"><?php echo $array[$d];?><span class="label label-warning pull-right">$<?php echo $bpri[$d];?></span></a>
                      </div>
                    </li><!-- /.item -->
                    <?php } ?>
                    <!--li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">Bicycle <span class="label label-info pull-right">$700</span></a>
                        <span class="product-description">
                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                        </span>
                      </div>
                    </li--><!-- /.item -->
                    <!--li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">Xbox One <span class="label label-danger pull-right">$350</span></a>
                        <span class="product-description">
                          Xbox One Console Bundle with Halo Master Chief Collection.
                        </span>
                      </div>
                    </li--><!-- /.item -->
                    <!--li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">PlayStation 4 <span class="label label-success pull-right">$399</span></a>
                        <span class="product-description">
                          PlayStation 4 500GB Console (PS4)
                        </span>
                      </div>
                    </li--><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="../index.php" class="uppercase">Goto shop page</a>
                </div><!-- /.box-footer -->
              </div>
            </div><!-- /.col -->                       
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <!--div class="pull-right hidden-xs">
          <b>Edited and backscripted by</b> Ananthakumar
        </div-->
        <strong>Copyright &copy; 2014-2015 <a href="../index.php">Bookstore.Tnc, </a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nothing</h4>
                    <p>nothing</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->

          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->
     <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script>
      $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas);

        var areaChartData = {
          labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
          datasets: [
            {
              label: "Books",
              fillColor: "rgba(210, 214, 222, 1)",
              strokeColor: "rgba(210, 214, 222, 1)",
              pointColor: "rgba(210, 214, 222, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [<?php echo $jan;?>, <?php echo $feb;?>, <?php echo $mar;?>, <?php echo $apr;?>, <?php echo $may;?>, <?php echo $jun;?>, <?php echo $jul;?>, <?php echo $aug;?>, <?php echo $sep;?>,<?php echo $oct;?>, <?php echo $nov;?>, <?php echo $dec;?>]
              //[<?php echo $jan;?>, <?php echo $feb;?>, <?php echo $mar;?>, <?php echo $apr;?>, <?php echo $may;?>, <?php echo $jun;?>, <?php echo $jul;?>,<?php echo $aug;?>,<?php echo $sep;?>,<?php echo $oct;?>,<?php echo $nov;?>,<?php echo $dec;?>]
              <?php //echo "[1,2,3,4,5,6,7,8,9,10,11,12]";
              //echo $jan=1; echo $feb=2; 
              //echo '['.$jan.','.$feb.','.$mar.','.$apr.','.$may.','.$jun.','.$jul.','.$aug.','.$sep.','.$oct.','.$nov.','.$dec.']'
              //echo "[";echo $jan;echo ",";echo $feb;echo ",";echo $mar;echo ",";echo $apr;echo ",";echo $may;echo ",";echo $jun;echo ",";echo $jul;echo ",";echo $aug;echo ",";echo $sep;echo ",";echo $oct;echo ",";echo $nov;echo ",";echo $dec;echo "]";
              ?>
            }
          ]
        };

        var areaChartOptions = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: false,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: false,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
        };
          
        //Create the line chart
        areaChart.Line(areaChartData, areaChartOptions);
           
      });

    </script>
  </body>
</html>
