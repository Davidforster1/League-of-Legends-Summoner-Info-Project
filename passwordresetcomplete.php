<?php // derived from http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html
session_start();
include_once 'dbconnect.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="LoL Summoner Info" content="">
<title>Password Reset </title>

    <!-- Bootstrap core CSS - template taken from http://getbootstrap.com/ customised to suit my client--> 
    <link href="css/bootstrap.min.css" rel="stylesheet"> 

</head>
<body>

<div class="container">
			
        <h1> <center>Password Reset Page</h1>
		<br />	
		<br /> <center>  <img id="userImg" src="http://ddragon.leagueoflegends.com/cdn/6.2.1/img/profileicon/900.png" alt = "Summoner icon not found :("> 
		<br />
		<p class="lead"> <br /> Password Recovery</p> </center>
		<br />
		
<center>
		<div id="login-form">
<?php // derived from https://www.youtube.com/watch?v=pj_SyiP0lCs parts 1 to 3
session_start();
	require("dbconnect.php");
	
$newpass = $_POST['newpass'];
$newpass1 = $_POST['newpass1'];
$post_username = $_POST['username'];
$code = $_GET['code'];


if($newpass == $newpass1)
{
	$enc_pass = md5($newpass);
	
	mysql_query("UPDATE user_login SET userPassword='$enc_pass' WHERE userName='$post_username'"); // says password to md5 password where username = php variable for username
	mysql_query("UPDATE user_login SET passreset='0' WHERE userName='$post_username'"); // sets password reset variable in table to 0
	
	
	
	echo "Your password has been updated<p><a href='http://for11122369.studentweb.citybathcoll.ac.uk/'>Click here to login</a>"; // success message
}
else
{												
	echo "Passwords must match<p><a href='http://for11122369.studentweb.citybathcoll.ac.uk/passwordreset.php?code=$code&userName=$post_username'>Click here to go back</a>"; // fail message
}

	
?>
		</div>
</div>
</center>
</body>
</html>













