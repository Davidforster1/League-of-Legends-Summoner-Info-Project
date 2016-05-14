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
    <meta name="LoL Summoner Info" content="">
	
<title>About and FAQ's - <?php echo $userRow['userName']; ?></title>
 <!-- Bootstrap core CSS - template taken from http://getbootstrap.com/ customised to suit my client--> 
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet"> 
</head>

<div class="container">

        <h1> <center>About and FAQ's</h1>
		<br />
		<ul class="nav nav-tabs">
			<li role="presentation"> <a href="logout.php?logout">Logout </a> </li>
			<li role="presentation"> <a href="home.php">Summoner Information </a> </li>
			<li role="presentation"> <a href="serverstatus.php">Server Status </a> </li>
			<li role="presentation"> <a href="legal.php">Legal </a> </li>
			<li role="presentation" class="active"> <a href="faqabout.php">About and FAQ's </a> </li>
			<li role="presentation"> <a href="userhelpdocs.php">Help Documentation </a> </li>
			</ul>
			
			<div class="col-md-12 col-sm-12 col-xs-12">
	
	<h2> About the Website and Frequently Asked Questions </h2>
	<br />
	<b> Will more features be added in the future? </b>
	<br /> <br />
	<i> Most certainly, this project has only just began and there is plenty of room for expansion! </i>
	<br /> <br />
	<b> How many searches can i do in... lets say 1 minute? </b>
	<br /> <br />
	<i> Due to rate limiting, Riot allows this website to make up to ten requests per ten seconds. However, this rate may be increased in the future if Riot allow it. </i>
	<br /> <br />
	<b> How are you getting this summoner information from Riot's databases?</b>
	<br /> <br />
	<i> I am communicating with Riot's API (Application Programming Interface) using a client side script known as 'Ajax' to contact the API, the data is then handled using JavaScript and PHP code. </i>
	<br /> <br />
	<b> How long did it take to make this website from scratch? </b>
	<br /> <br />
	<i> Around two to three months including the planning process before creating the website. </i>
	<br /> <br />
	<b> Could i check out the source code for this project to help me create my own website like this?</b>
	<br /> <br />
	<i> Absolutely! The source code for this project will be available on GitHub once it has been completed in due course.  </i>
	<br /> <br />
		</div>
		
		
</div>			
		
<!-- include javascript, jQuery FIRST -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script> 
 
</body>
</html>