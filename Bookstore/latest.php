<?php
session_start();
 $_SESSION['content']="latest";
 header("location:shop.php");
 exit;
 ?>