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
	
<title>User Help Documentation - <?php echo $userRow['userName']; ?></title>
 <!-- Bootstrap core CSS - template taken from http://getbootstrap.com/ customised to suit my client--> 
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet"> 
</head>
<a name="0"> </a>
<div class="container">

        <h1> <center>User Help Documentation</h1>
		<br />
		<ul class="nav nav-tabs">
			<li role="presentation"> <a href="logout.php?logout">Logout </a> </li>
			<li role="presentation"> <a href="home.php">Summoner Information </a> </li>
			<li role="presentation" *********
> <a href="serverstatus.php">Server Status </a> </li>
			<li role="presentation"> <a href="legal.php">Legal </a> </li>
			<li role="presentation"> <a href="faqabout.php">About and FAQ's </a> </li>
			<li role="presentation" class="active"> <a href="userhelpdocs.php">Help Documentation </a> </li>
			</ul>	


<div class="col-md-12 col-sm-12 col-xs-12">
	
	<h2> User Help and Documentation </h2> 
	<br/> <br/>
	<b> Contents: </b>
	<br/> <br/>
	<a href="http://for11122369.studentweb.citybathcoll.ac.uk/userhelpdocs.php#1">1. Searching for a Summoner </a>
	<br/> <br/>
	<a href="http://for11122369.studentweb.citybathcoll.ac.uk/userhelpdocs.php#2">2. Updating a Summoner </a>
	<br/> <br/>
	<a href="http://for11122369.studentweb.citybathcoll.ac.uk/userhelpdocs.php#3">3. Registering a New Account </a>
	<br/> <br/>
	<a href="http://for11122369.studentweb.citybathcoll.ac.uk/userhelpdocs.php#4">4. Forgot Password? </a>
	<br/> <br/> <br /> 
	
	<a name="1"><h1><b>How to Search for a Summoner:</b><h1/> </a>
	
	<h2> Step 1 - Log in </h2> <img src="/images/logineditedpaint.png" alt="Login Screen" style="width:500px;height:400px;">
	<br /> <br />
	<h2> Step 2 - Click Search for a Summoner </h2>
	<img src="/images/searchforsummoner.png" alt="Summoner Search" style="width:600px;height:400px;">
	<br /> <br />
	<h2> Result </h2>
	<img src="/images/searchforsummoner2.png" alt="Result" style="width:700px;height:600px;">
	<br /> <br />
	<a name="2"><h1><b>How to Update a Summoner:</b><h1/> </a>
	<h2> Step 1 - Repeat Steps Taken for Searching a Summoner but Click "Refresh Summoner" </h2> <img src="/images/updatesummonersearch.PNG" alt="Summoner Update" style="width:700px;height:400px;">
	<br /> <br />
	<h2> Step 1 (Continued) </h2>
	<img src="/images/updatesummonersearch2.PNG" alt="Summoner Update 2" style="width:700px;height:400px;">
	<br /> <br />
	<a name="3"><h1><b>How to Register a New Account:</b><h1/> </a>
	<h2> Step 1 - Click "Sign Up Here" </h2>
	<img src="/images/register1.PNG" alt="Log in" style="width:700px;height:500px;">
	<br /> <br />
	<h2> Step 2 - Enter Details and Submit </h2>
	<img src="/images/register2.PNG" alt="Registration Complete" style="width:700px;height:500px;">
	<br /> <br />
	<a name="4"><h1><b>How to Change Your Password:</b><h1/> </a>
	<h2> Step 1 - Click Forgot Password </h2>
	<img src="/images/resetpw1.PNG" alt="Forgot password" style="width:700px;height:500px;">
	<br /> <br />
	<h2> Step 2 - Enter Details and Click Submit </h2>
	<img src="/images/resetpw2.PNG" alt="Submit Details" style="width:700px;height:500px;">
	<br /> <br />
	<h2> Step 3 - Check Your Emails for a Message </h2>
	<img src="/images/resetpw3.PNG" alt="Check Emails" style="width:700px;height:500px;">
	<br /> <br />
	<h2> Step 4 - The Message Should Look Like This </h2>
	<img src="/images/resetpw5.PNG" alt="Message" style="width:700px;height:30px;">
	<br /> <br />
	<h2> Step 5 - Click The Link in the Email </h2>
	<img src="/images/resetpw4.PNG" alt="Link in Email" style="width:700px;height:250px;">
	<br /> <br />
	<h2> Step 6 - Enter Details, Then Click Update Password </h2>
	<img src="/images/resetpw6.PNG" alt="Update Password" style="width:800px;height:500px;">
	<br /> <br />
	<h2> Step 7 - Password Recovery Complete </h2>
	<img src="/images/resetpw7.PNG" alt="Password Recovery Complete" style="width:700px;height:500px;">
	<br /> <br />
	<a href="http://for11122369.studentweb.citybathcoll.ac.uk/userhelpdocs.php#0">Click Here to Return to the Top of the Page </a>
	<br /> <br />
	
</div>			
</div>			
	
<!-- include javascript, jQuery FIRST -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script> 
 
</body>
</html>