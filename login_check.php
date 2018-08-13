<?php
session_start();
$conn = new mysqli("localhost", "root", "root", "miniproject");
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$email=$_POST['email_id'];
$pwd=$_POST['pass_word'];
$_SESSION['email']=$email;
$rows = array();
$select=$conn->query("select * from data where email='".$email."' and pwd='".$pwd."'");
$items = array();
$index = 0;
while ($rows= $select->fetch_assoc()) {
	$items[$index]=$rows["isadmin"];
	$index++;
}
foreach ($items as $data)
{ 
	$admins[]=$data;
}
$all_data=implode(" ", $admins);
if(preg_match('/1/', $all_data)){
	header('Location:details.php');
}
elseif(preg_match('/0/', $all_data)){
	header('Location:userdata.php');
}
else{
	echo "You have entered incorrect username or password";
}

?>
