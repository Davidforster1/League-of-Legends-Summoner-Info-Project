<?php // derived from http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM user_login WHERE userID=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

	// saves to database

$summID= $_POST['ID'];  
$summName= $_POST['Name'];     
$summLevel= $_POST['Level']; 
$summIcon= $_POST['Icon']; 
$summTier= $_POST['Tier'];
$summDivision= $_POST['Division'];
$summLp= $_POST['Lp'];
					 
echo $summID;
echo $summName;
echo $summLevel;
echo $summIcon;
echo $summTier;
echo $summDivision;
echo $summLp;
 		
		
mysql_query("INSERT INTO summoner_info (summonerID, summonerName, summonerLevel, summonerIcon, summonerTier, summonerDivision, summonerLp) 
VALUES ('$summID', '$summName', '$summLevel', '$summIcon', '$summTier', '$summDivision', '$summLp') ON DUPLICATE KEY UPDATE summonerName='$summName', 
summonerLevel='$summLevel', summonerIcon='$summIcon', summonerTier='$summTier', summonerDivision='$summDivision', summonerLp='$summLp'");

												
											
	// reads from database

//$summonerLevel = mysql_query("SELECT summonerLevel FROM summoner_info WHERE $summID=summonerID')";
//$summonerName = mysql_query("SELECT summonerName FROM summoner_info WHERE $summID=summonerID')";
//$summonerIcon = mysql_query("SELECT summonerIcon FROM summoner_info WHERE $summID=summonerID')";
//$summonerID = mysql_query("SELECT summonerID FROM summoner_info WHERE $summID=summonerID')";

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="LoL Summoner Info" content="">
	
<title>Home - <?php echo $userRow['userName']; ?></title>
 <!-- Bootstrap core CSS - template taken from http://getbootstrap.com/ customised to suit my client--> 
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet"> 
</head>
<body>

    <div class="container">

        <h1> <center>League of Legends Summoner Information</h1>
		<br />
		<ul class="nav nav-tabs">
			<li role="presentation"> <a href="logout.php?logout">Logout </a> </li>
			<li role="presentation" class="active"> <a href="home.php">Summoner Information </a> </li>
			<li role="presentation"> <a href="serverstatus.php">Server Status </a> </li>
			<li role="presentation"> <a href="legal.php">Legal </a> </li>
			<li role="presentation"> <a href="faqabout.php">About and FAQ's </a> </li>
			<li role="presentation"> <a href="userhelpdocs.php">Help Documentation </a> </li>
			</ul>
		  	
		<br /> <center>  <img id="userImg" src="http://ddragon.leagueoflegends.com/cdn/6.2.1/img/profileicon/900.png" class="img-rounded" alt = "Summoner icon not found :("> 
        <p class="lead"> <br />  Search for a summoner to begin!</p> </center>
				

<center> <b>Summoner Name:</b>
<br />
<br />
<input id="userName" />
<input type="submit" value = "Search Summoner" class="btn btn-success btn-sm" onclick="dbsummonerinfo()"/> </center> 
<br />
<center> <p class="lead">  Summoner not found in the database?</p>
<b> Try clicking the "Refresh Summoner" button to update that summoner! </b>
<input type="submit" value = "Refresh Summoner" class="btn btn-success btn-sm" onclick="btnsleep(this);" /> </center>  	
<script> <!-- Inspired by: http://jsfiddle.net/BvYwr/1/ --> 
function btnsleep(btn) {
	summonerinfo();
    btn.disabled = true;
    setTimeout(function() {
        btn.disabled = false;
    }, 5000);
}
</script>		
<br /> <b>Summoner Icon URL:</b> <span id="sIcon"></span>
<br />
<br /> <b> Summoner Level: </b> <span id="sLevel"></span>

<br /> <b> Summoner ID: </b> <span id="sID"></span>
<br /> <b> Rank: </b> <span id="sRank"></span> <span id="division"></span> <span id="lp"></span> <b> Lp </b>
<br/>
<br />


<div class="row">

	<div class="col-md-4 col-sm-4 col-xs-4">
		<b>List of mastery pages</b> (<span id="masteryPagesCount"></span>)
		<hr />
		<span id="masteryPagesAll"></span>
		<br />
	</div>
	
	<div class="col-md-4 col-sm-4 col-xs-4"> 
	</div>
	
	<div class="col-md-4 col-sm-4 col-xs-4">
		<b> List of rune pages</b> (<span id="runePagesCount"></span>)
		<hr />
		<span id="runePagesAll"></span>
	</div>
	
</div>
<br />	
<br />	
<!-- This row is where we print the results of the summomer ID -->
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-6">		
		<!-- The contents of this div get replaced by JavaScript -->
		<div id="championid"></div>
	<br /> 
	<input type="submit" value="Next Match" class="btn btn-success" id="nextMatch" /> 
	</div>
	<div class="col-md-6 col-sm-6 col-xs-6">
	<br />
	<img id="champicon" src="" class="img-rounded" alt = "Champion image not found :("> 
	<br /> <br />
	</div>
</div>

		
<!-- include javascript, jQuery FIRST -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/index.js"></script> <!-- Operates from the API -->
<script src="js/indexdb.js"></script> <!-- Operates from the database locally -->
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script> 
 
</body>
</html>