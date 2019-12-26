<?php
	define('DB_SERVER', 'remotemysql.com:3306');
   define('DB_USERNAME', 'Apo8JTOkea');
   define('DB_PASSWORD', 'RsEuqvZ4t6');
   define('DB_DATABASE', 'Apo8JTOkea');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   if (!$db) {
       echo "Failed";
    die("Connection failed: " . mysqli_connect_error());
	}else{
		echo "Connected successfully";
		
	}
?>

