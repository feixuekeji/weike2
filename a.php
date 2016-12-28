<?php
$firstname="aaa";
$lastname="aaa";
$age=123;
$con=mysqli_connect("localhost","root","123");
if ($con)
	 echo "连接数据库成功<br>";
  else
  die("Could not connect:". mysql_error());
/*if (mysqli_query($con,"CREATE DATABASE first_db"))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database:".mysql_error();
  }*/


mysql_select_db("first_db");
$sql = "CREATE TABLE Persons 
(
FirstName varchar(15),
LastName varchar(15),
Age int
)";
mysqli_query($con,$sql);
$sql1="INSERT INTO Persons (FirstName, LastName, Age)
VALUES
('firstname','lastname','age')";

if (!mysqli_query($con,$sql1))
  {
  die("插入不成功Error:". mysqli_error());
  }
echo "1 record added";
echo $firstname.$lastname.$age;
mysqli_close($con)
?>
