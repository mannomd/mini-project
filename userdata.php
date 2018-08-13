<?php session_start();  ?>
<!DOCTYPE html>
<html>
<head>
	<title>User Page</title>
	<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="form.css" type="text/css">
</head>
<body>
	
	<div class="body-content">
		<div class="welcome">
			<div class="alert alert-success"><?= $_SESSION['message']?></div>
			<table border="solid" cellpadding="15px" cellspacing="10px">
			<tr>
				<th>Profile Picture</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>House Location</th>
				<th>Street Address</th>
				<th>City</th>
				<th>State</th>
				<th>Pin</th>
			</tr>
			<tr>
				<td><img src=<?= "images/".$_SESSION['avatar'] ?>></td>
				<td><?= $_SESSION['name']?></td>
				<td><?= $_SESSION['username']?></td>
				<td><?= $_SESSION['email']?></td>
				<td><?= $_SESSION['phone']?></td>
				<td><?= $_SESSION['house']?></td>
				<td><?= $_SESSION['street']?></td>
				<td><?= $_SESSION['city']?></td>
				<td><?= $_SESSION['state']?></td>
				<td><?= $_SESSION['pin']?></td>
			</tr>
			</table>
			<span class="user"></span>
		</body>
		</html>
