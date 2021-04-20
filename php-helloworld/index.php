<?php
 $servername = $_ENV["MYMARIADB_SERVICE_HOST"];
 $serviceport = $_ENV["MYMARIADB_SERVICE_PORT"];
 $username = "jtesar";
 $password = "redhat";
 $db = "db";


 try {
	   $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	     // set the PDO error mode to exception
	   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   echo "Connected successfully";
	   } catch(PDOException $e) {
	     echo "Connection failed: " . $e->getMessage();
	   }

 $sql = "SELECT * from names";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
// output data of each row
   while($row = $result->fetch_assoc()) {
      echo "name: " . $row["name"]."<br>";
   }
 } else {
      echo "No names";
   }
   $conn->close();
?>
