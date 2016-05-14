<?php // derived from http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM user_login WHERE userID=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="LoL Server Status" content="">
	
<title>Server Status - <?php echo $userRow['userName']; ?></title>
 <!-- Bootstrap core CSS - template taken from http://getbootstrap.com/ customised to suit my client--> 
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet"> 
</head>
<body onload="serverstatus()">

<div class="container">

        <h1> <center>Server Status</h1>
		<br />
		<ul class="nav nav-tabs">
			<li role="presentation"> <a href="logout.php?logout">Logout </a> </li>
			<li role="presentation"> <a href="home.php">Summoner Information </a> </li>
			<li role="presentation" class="active"> <a href="serverstatus.php">Server Status </a> </li>
			<li role="presentation"> <a href="legal.php">Legal </a> </li>
			<li role="presentation"> <a href="faqabout.php">About and FAQ's </a> </li>
			<li role="presentation"> <a href="userhelpdocs.php">Help Documentation </a> </li>
			</ul>
		
	<div class="col-md-12 col-sm-12 col-xs-12"">
	
	<h2> Service Status Messages </h2>
		<br />
		<b> Service Affected: </b> Client
		<br /> <br />
		<b> Server: </b> <span id="serverstatus"> There were no service messages found, please try refreshing the page or try again later!</span>
		<br /> <br />
		<b> Message: </b> <span id="clientmessage"></span>
		<br /> <br />
		<b> Date Created: </b> <span id="clientupdatedatecreated"></span>
		<br /> <br />
		
		<h2> Game Status Messages </h2>
		<br /> 
		<b> Service Affected: </b> Game
		<br /> <br />
		<b> Server: </b> <span id="gameserverstatus"> There were no service messages found, please try refreshing the page or try again later!</span>
		<br /> <br />
		<b> Message: </b> <span id="gamemessage"></span>
		<br /> <br />
		<b> Date Created: </b> <span id="gameupdatedatecreated"></span>
		<br /> <br />
		
		
	</div>
	
		
</div>			



		
<!-- include javascript, jQuery FIRST -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/serverstatus.js"></script> 
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script> 
 
</body>
</html>