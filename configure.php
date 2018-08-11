
<html>
<body>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$username=$_POST['username'];
	$password=$_POST['password'];
}
	$login=$_SERVER['HTTP_REFERER'];
	if((!$username) or (!$password))
	{
	header("Location:$login");
	exit();
	}
	$servername="localhost";
$username1="root";
$password1="";

$conn=new mysqli($servername,$username1,$password1);
if($conn->connect_error)
{
die("connection failed".$conn->connect_error);
}
$sql="CREATE DATABASE mydb1";
$conn->query($sql);
echo "<br>";
$conn->close();

$dbname="mydb1";
$conn=new mysqli($servername,$username1,$password1,$dbname);
if($conn->connect_error)
{
die("connection failed".$conn->connect_error);
}

$sql2="select * from websiteusers where userName=\"$username\" and pass=\"$password\"";

$read=$conn->query($sql2);

if($read->num_rows>0)
{
	echo("<h3> $username<br>  welcome </h3>");
	$read->free();
	}
	else
	{
	header("Location:$login");
	exit();
	}
$conn->close();

	?>
	</body>
	</html>
	