<!DOCTYPE html>
<html>
<body>
<?php
$servername="localhost";
$username="root";
$password="";
$conn=new mysqli($servername,$username,$password);
if($conn->connect_error)
{
die("connection failed".$conn->connect_error);
}

echo "<br>";
$sql = "CREATE DATABASE mydb1";
$conn->query($sql);
$conn->close();

$dbname="mydb1";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
die("connection failed".$conn->connect_error);
}
$sql="CREATE TABLE websiteusers(fullname VARCHAR(20),userName VARCHAR(20),email VARCHAR(20),pass VARCHAR(20))";
$conn->query($sql);
$conn->close();


$name=$user=$email=$pass="";

$conn=new mysqli($servername,$username,$password,$dbname);


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	
	if((!empty($_POST['user'])) or die("please fill all the details"))
	{
		$username=$_POST['user'];
		$passwd=$_POST['pass'];
    $sql = "SELECT * FROM websiteusers WHERE userName = '$username' AND pass = '$passwd'";
	$result = $conn->query($sql);

	if(!$row=$result->fetch_array())
	{
		
		$fullname=$_POST["name"];
		$userName=$_POST['user'];
		$email=$_POST['email'];
		$password=$_POST['pass'];




		$sql2="INSERT INTO websiteusers(fullname,userName,email,pass) VALUES ('$fullname','$userName','$email','$password')";
		if($conn->query($sql2)==TRUE)
		{
		echo "created successfully";
		}


		
		
	
	
	$result->free();
	}
	else
		{
		echo "Already Created Your Account";
		}
	}
}


$conn->close();

?>
</body>
</html>