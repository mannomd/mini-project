<?php
$conn = new mysqli('localhost', 'root', 'root', 'miniproject');
$house=$_POST['house'];
$street=$_POST['street'];
$city=$_POST['city'];
$state=$_POST['state'];
$pin=$_POST['pin'];
$sql="INSERT INTO data (s_house,s_street,s_city,s_state,s_pcode) VALUES ('".$house."','".$street."','".$city."','".$state."','".$pin."')";
if ($conn->query($sql) === TRUE) {
    echo "Data inserted";
}
else 
{
    echo "failed";
}
?>