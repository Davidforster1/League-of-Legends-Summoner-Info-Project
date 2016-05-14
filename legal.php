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
	
<title>Legal - <?php echo $userRow['userName']; ?></title>
 <!-- Bootstrap core CSS - template taken from http://getbootstrap.com/ customised to suit my client--> 
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet"> 
</head>

<div class="container">

    <h1> <center>Legal Information</h1>
	<br />
	<ul class="nav nav-tabs">
		<li role="presentation"> <a href="logout.php?logout">Logout </a> </li>
		<li role="presentation"> <a href="home.php">Summoner Information </a> </li>
		<li role="presentation">  <a href="serverstatus.php">Server Status </a> </li>
		<li role="presentation" class="active"> <a href="legal.php">Legal </a> </li>
		<li role="presentation"> <a href="faqabout.php">About and FAQ's </a> </li>
		<li role="presentation"> <a href="userhelpdocs.php">Help Documentation </a> </li>
		</ul>
			
		<div class="col-md-12 col-sm-12 col-xs-12">
	
	<h2> The Legal Stuff </h2>
	<br /> <br />
	<i>'Summoner Information'</i> isn’t endorsed by Riot Games and doesn’t reflect the views or opinions of Riot Games or anyone officially 
	involved in producing or managing League of Legends. League of Legends and Riot Games are trademarks or registered trademarks of Riot Games, 
	Inc. League of Legends © Riot Games, Inc.
	<br /> <br />
	I agree that anyone can use, copy, modify, distribute, and make derivative works of my project in any form, on a royalty-free, non-exclusive,
	irrevocable, transferable, sub-licensable, worldwide basis, for any purpose and without having to pay me anything, obtain my approval, or 
	give me credit.  
	<br /> <br />
	In addition to the guidelines which are being abided by, all use of intellectual properly related to League of Legends complies with the League of 
	Legends End User License Agreement, Terms of Use, and Privacy Policy.
	<br /> <br />
	I expressly acknowedge that i have read the API terms and understand the rights, obligations, terms and conditions set forth herein. By accessing the
	Riot developer site, the Riot Games API and/or any other materials, I expressly consent to be bound by its terms and conditions and grant to Riot
	the rights set forth herein, and represent that i am of legal age to form a binding contract. 
	
	
	
		</div>
		
</div>			
		
<!-- include javascript, jQuery FIRST -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script> 
 
</body>
</html>