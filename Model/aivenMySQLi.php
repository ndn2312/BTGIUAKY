<?php
echo "hello";
phpinfo();

$host="mysql-29f2e3e5-giuaky.l.aivencloud.com";

$user="avnadmin";
$port="10600";
$password="AVNS_H-A3C52kI1HzdzQXnXk";

$con=mysqli_connect($host,$user,$password);

mysqli_select_db($con,"defaultdb"); 
//To select the database

session_start(); //To start the session

$query=mysqli_query($con,"select * from sach"); 

//$row = mysqli_fetch_array($query);

$rowcount=mysqli_num_rows($query);
//made query after establishing connection with database.

//echo "my result <a href='data/" . htmlentities($row['classtype'], ENT_QUOTES, 'UTF-8') . ".php'>sinh vien</a>";

printf($rowcount);
?>
