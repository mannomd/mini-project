<html>
	<head><title>Login</title>
		<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
  		<link rel="stylesheet" href="form.css" type="text/css">
		<style>
			
			input[type=submit]
			{
				width:100%;
				padding:4px 10px;
				margin:10px 0;
				border:none;
				border-radius:4px;
				cursor:pointer;
			}
			input[type=submit]:hover
			{
				background-color:lightblue;
			}*/
			
		</style>
		<script>
			function check()
				{
					if(document.login.email_id.value=="")
						{
						alert("Please enter Email ID");
						document.login.email_id.focus();
						return false;
						}
					if(document.login.pass_word.value=="")
						{
						alert("Please enter Password");
						document.login.pass_word.focus();
						return false;
						}
				}
		</script>
	</head>
<body>
	<div class="body-content">
    <div class="module">
<center>
<table>
	<tr>
		<td><center><div class="login">
	<form name="login" method="post" onSubmit="return check()" action="login_check.php">
	<table>
		<tr><td>Email</td>
			<td><input type="text" name="email_id" size="50" maxlength="50" placeholder="Email" autocomplete="off">
			</td>
		</tr>
		<tr><td>Password</td>
			<td><input type="password" name="pass_word" size="20" maxlength="50" placeholder="Password" autocomplete="off">
			</td>
		</tr>
		<tr><td><input type="submit" value="Sign in"</td>
		</tr>
	</table><br>
	<a id="link" href="index.php" target="_top">New user? Sign up</a>

	</form>
		</td></div></center>
	</tr>
</table>
</center>	
</div>
</div>	
</body>
</html>