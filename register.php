<?php // derived from http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html
session_start();
if(isset($_SESSION['user_login'])!="")
{
	header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$username = mysql_real_escape_string($_POST['username']);
	$email = mysql_real_escape_string($_POST['email']);
	$password = md5(mysql_real_escape_string($_POST['password']));
	
	$username = trim($username);
	$email = trim($email);
	$password = trim($password);
	
	// email exist or not
	$query = "SELECT userEmail FROM user_login WHERE userEmail='$email'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	
	if($count == 0){
		
		if(mysql_query("INSERT INTO user_login(userName,userEmail,userPassword) VALUES('$username','$email','$password')"))
		{
			?>
						<script>alert('You have successfully registered, now you may log in with your new account! ');</script>
			<?php
			header("Location: index.php");
		}
		else
		{
			?>
			<script>alert('Unfortunately an error has occured, please try again.');</script>
			<?php
		}		
	}
	else{
			?>
			<script>alert('This email address has already been taken, please try again.');</script>
			<?php
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="LoL Summoner Info" content="">
<title>Register </title>

    <!-- Bootstrap core CSS - template taken from http://getbootstrap.com/ customised to suit my client--> 
    <link href="css/bootstrap.min.css" rel="stylesheet"> 

</head>
<body>

<div class="container">
			
        <h1> <center>League of Legends Summoner Information</h1>
		<br />	
		<br /> <center>  <img id="userImg" src="http://ddragon.leagueoflegends.com/cdn/6.2.1/img/profileicon/900.png" alt = "Summoner icon not found :("> 
		<br />
		<p class="lead"> <br /> Please register below to use the website!</p> </center>
		<br />
		
<center>
		<div id="login-form">
<form method="post">
<table align="center" width="0%" border="0">
<td><input type="text" name="username" placeholder="User Name" required /></td>
<tr />
<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
<tr />
<td><input type="email" name="email" placeholder="Your Email" required /></td>
<tr />
<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
<tr />
<td><input type="password" name="password" placeholder="Your Password" required /></td>
<tr />
<td bgcolor="#FFFFFF" style="line-height:20px;" colspan=3>&nbsp;</td>
<tr />
<td align="center"><button type="submit" class="btn btn-success btn-sm" name="btn-signup">Sign Me Up</button></td>
<tr />
</table>
<br />
<a href="index.php">Sign In Here</a></td>
</form>
		</div>
</div>
</center>
</body>
</html>