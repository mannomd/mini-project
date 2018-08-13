<?php
$conn = new mysqli('localhost', 'root', 'root', 'miniproject');
$name=$_SESSION['name'];
$username=$_SESSION['username'];
$email=$_SESSION['email'];
$password=$_SESSION['pwd'];
$c_pwd=$_SESSION['c_pwd'];
$phone=$_SESSION['phone'];
$house=$_SESSION['house'];
$street=$_SESSION['street'];
$city=$_SESSION['city'];
$state=$_SESSION['state'];
$pin=$_SESSION['pin'];
$s_house=$_SESSION['house'];
$s_street=$_SESSION['street'];
$s_city=$_SESSION['city'];
$s_state=$_SESSION['state'];
$s_pin=$_SESSION['pin'];
$avatar=$_SESSION['avatar'];
$sql="INSERT INTO data (name,uname,email,pwd,cpwd,pno,house,street,city,state,pcode,s_house,s_street,s_city,s_state,s_pcode,avatar) VALUES ('".$name."','".$username."','".$email."','".$password."','".$c_pwd."','".$phone."','".$house."','".$street."','".$city."','".$state."','".$pin."','".$s_house."','".$s_street."','".$s_city."','".$s_state."','".$s_pin."','".$avatar_path."')";
if ($conn->query($sql) === TRUE) {
    header("Location: welcome.php");
}
else 
{
    echo "failed";
}
?>

