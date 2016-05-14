
			<?php // derived from http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

if(isset($_POST['btn-login']))
{
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	
	$username = trim($username);
	$password = trim($password);
	
	$res=mysql_query("SELECT userID, userEmail, userPassword FROM user_login WHERE userName='$username'");
	$row=mysql_fetch_array($res);
	
	$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
	
	if($count == 1 && $row['userPassword']==md5($password))
	{
		$_SESSION['user'] = $row['userID'];
		header("Location: home.php");
	}
	else
	{
		?>
        <script>alert('Your username or password are incorrect, please try again!');</script>
        <?php
	}
	
}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="LoL Summoner Info" content="">
	
<title>Log in Here</title>
 <!-- Bootstrap core CSS - template taken from http://getbootstrap.com/ customised to suit my client--> 
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
			
        <h1> <center>League of Legends Summoner Information</h1>
		<br />	
		<br /> <center>  <img id="userImg" src="http://ddragon.leagueoflegends.com/cdn/6.2.1/img/profileicon/900.png" alt = "Summoner icon not found :("> 
		<br />
		<p class="lead"> <br /> Please log in below to use the website!</p> </center>
		<br />
<center>
		<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-4">
		</div>
		<div class="col-md-4 col-sm-4 col-xs-4">

<form method="post">
<table align="center" width="0%" border="0">
<td align="center"><input type="text" name="username" placeholder="Your Username"  required /></td>
<tr />
<td bgcolor="#FFFFFF" style="line-height:10px;" colspan=3>&nbsp;</td>
<tr />
<td align="center"> <input type="password" name="password" placeholder="Your Password" required /></td>
<tr />
<td bgcolor="#FFFFFF" style="line-height:20px;" colspan=3>&nbsp;</td>
<tr />
<td align="center"><button type="submit" class="btn btn-success btn-sm" name="btn-login">Sign In</button></td>
<tr />
</table>
<br />
</form>
<a href="register.php">Sign up here</a> 
<a bgcolor="#FFFFFF" style="line-width:10px;" colspan=3>&nbsp;</a>
<a href="passwordreset.php">Forgot Password?</a>


		</div>
		</div>
</div>
</center>
</body>
</html>
		