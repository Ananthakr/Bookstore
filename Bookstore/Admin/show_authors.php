<?php

   $servername = "localhost";
           $username = "root";
          $password = "root";
            $dbname = "bookstore";
         // Create connection
          $conn = new mysqli($servername, $username, $password,$dbname);

 $sql = "SELECT aut_id,name,age FROM `author`";
          $result = $conn->query($sql);
           $q=0;
        while($row = $result->fetch_assoc()) {
          $array[$q]=$row['name'];
          $bkid[$q]=$row['aut_id'];
          $bpri[$q]=$row['age'];
          $q++;
           }
?>
<html>
<head>
</head>
<body>
<center>
<h4>All Authors</h4>
<br>
<table>
	<thead>
		<tr>
			<td>Author id</td>
			<td>Author name</td>
			<td>Age</td>
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