<?php // derived from https://www.youtube.com/watch?v=G_7oYeNU_3g;

header('Cache-Control: no-cache, must-revalidate'); // stops the caching of this json file so it refreshes everytime it loads
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

session_start();
include_once 'dbconnect.php';

$summID= $_POST['ID'];

$sql = "SELECT * FROM `summoner_info` WHERE `summonerName` = '$summID' ";

$res = mysql_query($sql);
$result = array();


while( $row = mysql_fetch_array($res) )
	array_push($result, array('summonerLevel' => $row[0],
							  'summonerID' => $row[1],
							  'summonerName' => $row[2],
							  'summonerIcon' => $row[3],
							  'summonerTier' => $row[4],
							  'summonerDivision' => $row[5],
							  'summonerLp' => $row[6]));
							  
if(empty($result)){ // if the query returns nothing, echo this
	echo 'No results found';
}
else{

echo json_encode(array("result" => $result)); // if the query returns results, return this
}
?>

