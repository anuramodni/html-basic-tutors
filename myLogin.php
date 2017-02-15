<?php 
include'wp-config.php';
session_start();

if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	//username and password sent from form

	$myusername = mysqli_real_escape_string($db,$_POST['username']);
	$mypassword = mysqli_real_escape_string($db,$_POST['password']);

	$sql = "SELECT id FROM mylogin WHERE username = '$myusername' and password = '$mypassword'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active = $row['active'];

	$count = mysqli_num_rows($result);

	// If result matched $myusername and $mypassword,table row must be 1 row
    if ($count == 1) {
    	 	 // session_register("myusername");
    	 	$_SESSION['login_user'] = "myusername";
    	 	header("welcome.php");
    	 	$valid = "Succesfuly login !";
    	 	// <a href="E:/SotfWare%20Developing/Business/index.html"></a>;
    	 }else {
    	 	$error ="Invalid username and password";
    	 }	 
}
 ?>
<html>
<head>
	<title>Login Page</title>
</head>
<body bgcolor="#FFFFFF">
	<div align="center">
		<div style="width: 300px; border:solid 1px #333333;" align="left">
			<div style="background-color: #333333; clogin:#FFFFFF; padding:3px;"><b>
			</div>
			<div style="margin: 30px">
		
<form  method="post" action="">
	<lable>Username :</lable><input type="text" name="username" class="box"/><br/><br/>
	<lbble>Password   :</lbble><input type="password" name ="password"><br><br>
	<input type="submit" value="submit"/><br/>
</form>
			<div style="font-size: 11px; color: #cc0000; margin-top: 10px"><?php echo $error, $valid; ?> </div>
		</div>
		</div>
</body>
</html>