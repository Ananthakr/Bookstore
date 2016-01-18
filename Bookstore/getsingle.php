<?php
session_start();
$dep=$_GET['content'];
$id=$_GET['id'];
if($dep!='ebooks'&&$dep!='ejournals'){
	header("location:singlebook.php?id=$id");
	exit;
}
else if($dep=='ebooks'){
	header("location:singleebook.php?id=$id");
	exit;
}
else if($dep=='ejournals'){
	header("location:singleejournal.php?id=$id");
	exit;
}
?>