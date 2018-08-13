<?php
$conn = new mysqli("localhost", "root", "root", "miniproject");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	$id = $_GET['id'];
	$sql="SELECT * from data WHERE email='".$id."'";
	$result=$conn->query($sql);
	while ($row=$result->fetch_assoc()) {
		$name=$row['name'];
		$uname=$row['uname'];
		$email=$row['email'];
		$pno=$row['pno'];
		$house=$row['house'];
		$street=$row['street'];
		$city=$row['city'];
		$state=$row['state'];
		$pcode=$row['pcode'];
		$isadmin=$row['isadmin'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>View</title>
</head>
<body>
	<table border="1">
		<tr><td colspan="3" align="center" height="50" width="50"></td></tr>
		<tr>
			<td>Name: </td>
			<td><?php echo $name; ?></td>
		</tr>
		<tr>
			<td>Username: </td>
			<td><?php echo $uname; ?></td>
		</tr>
		<tr>
			<td>Email: </td>
			<td><?php echo $email; ?></td>
		</tr>
		<tr>
			<td>Phone: </td>
			<td><?php echo $pno; ?></td>
		</tr>
		<tr>
			<td>House: </td>
			<td><?php echo $house; ?></td>
		</tr>
		<tr>
			<td>Street: </td>
			<td><?php echo $street; ?></td>
		</tr>
		<tr><td colspan="3" align="center">Permanent Address</td></tr>
		<tr>
			<td>City: </td>
			<td><?php echo $city; ?></td>
		</tr>
		<tr>
			<td>State: </td>
			<td><?php echo $state; ?></td>
		</tr>
		<tr>
			<td>Pincode: </td>
			<td><?php echo $pcode; ?></td>
		</tr>
		<tr>
			<td>IsAdmin? :</td>
			<td><?php echo $isadmin; ?></td>
		</tr>
	</table>
</body>
</html>