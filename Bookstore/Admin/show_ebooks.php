<?php

   $servername = "localhost";
           $username = "root";
          $password = "root";
            $dbname = "bookstore";
         // Create connection
          $conn = new mysqli($servername, $username, $password,$dbname);

 $sql = "SELECT eb_id,ed_name,d_link FROM `ebooks`";
          $result = $conn->query($sql);
           $q=0;
        while($row = $result->fetch_assoc()) {
          $array[$q]=$row['ed_name'];
          $bkid[$q]=$row['eb_id'];
          $bpri[$q]=$row['d_link'];
          $q++;
           }
?>
<html>
<head>
</head>
<body>
<center>
<h4>All Ebooks</h4>
<br>
<table>
	<thead>
		<tr>
			<td>Book id</td>
			<td>Book name</td>
			<td>Download link</td>
		</tr>
	</thead>
    <tbody>
    	<?php $x=0;
    	for(;$x<$q;$x++){?>
    	<tr>
    		<td><?php echo $bkid[$x];?></td>
    		<td><?php echo $array[$x];?></td>
    		<td><?php echo $bpri[$x];?></td>
    	<tr>
    	<?php ;}
    	?>
    </tbody>
<table>
</body>
</html>