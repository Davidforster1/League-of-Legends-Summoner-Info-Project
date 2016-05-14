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
		<p class="lead"> <br /> Please enter your email to reset your password!</p> </center>
		<br />
		
<center>
		<div id="login-form">
<?php // derived from https://www.youtube.com/watch?v=pj_SyiP0lCs parts 1 to 3
session_start();
require("dbconnect.php");

if($_GET['code'])
	{
		$get_username = $_GET['userName']; // gets username and code from the form as variables
		$get_code = $_GET['code'];
		
		$query = mysql_query("SELECT * FROM user_login WHERE userName='$get_username'"); // sql query to search database for username
		
		while($row = mysql_fetch_assoc($query))
		{
			$db_code = $row['passreset']; // assigns passreset and username to php variables
			$db_username = $row['userName'];
		}
		
		if($get_username == $db_username && $get_code == $db_code) // if php recieves link which includes username and code, show this form
		{
			echo "
			
			<form action='passwordresetcomplete.php?code=$db_code' method='POST'>
				Enter a new password<br><input type ='password' name='newpass'><br>
				Re-enter your password<br><input type ='password' name='newpass1'><p> <br/>
				<input type='hidden' name='username' value='$db_username'>
				<input type='submit' class='btn btn-success btn-sm' value='Update Password!'>
			</form>
		
			";
		}
	}	 
if(!$_GET['code']) // if website has not recieved code, stay on the password reset page requesting username and email
{

echo "
<form action='passwordreset.php' method='POST'>
	Enter your username<br><input type='text' name='username'><p>
	Enter your email<br><input type='email' name='email'><p>
	<input type='submit' class='btn btn-success btn-sm' value='Submit' name='submit'>
	</form>
	";

if(isset($_POST['submit'])) // if submit button has been clicked
{
	
	$username = $_POST['username']; // post username and email variables
	$email = $_POST['email'];
	
	$query = mysql_query("SELECT * FROM user_login WHERE userName='$username'"); // finds all where username = username variable
	$numrow = mysql_num_rows($query);
	
	if($numrow!=0)
	{
		while($row = mysql_fetch_assoc($query))
		{
			$db_email = $row['userEmail']; // finds user email address from db
		}
		if($email == $db_email) 
		{
			$code = rand(10000, 1000000); // creates random number
			
			$to = $db_email; // email body variables, user recieves theses
			$subject = "Password Reset";
			$body = "
			Someone has requested a password reset on your account.
			
			If this was you, click the link below. If you did not request this action, either change your password or do nothing. 
			
			http://for11122369.studentweb.citybathcoll.ac.uk/passwordreset.php?code=$code&userName=$username
			";
			
			mysql_query("UPDATE user_login SET passreset='$code' WHERE userName='$username'"); // sql query 
			
			mail($to,$subject,$body);
			echo "Request was successful, check your email";
		}
		else{
			echo "Email is incorrect";
			}
	}
	else
	{
		echo "Username or password combination doesnt exist, please try again"; // if fails provide this message
	}
}
}	
?>


<br/> <br/> <a href="index.php">Sign In Here</a></td>
</form>
		</div>
</div>
</center>
</body>
</html>






