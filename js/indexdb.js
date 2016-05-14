var ID = ""; // Declares variable for ID

function dbsummonerinfo() 
{
	String.prototype.caps = function() 
	{ // function for ensuring that the first letter of summoner rank is in uppercase (derived from http://stackoverflow.com/questions/1026069/capitalize-the-first-letter-of-string-in-javascript)
    return this.charAt(0).toUpperCase() + this.slice(1);
	}
	
    ID = $("#userName").val(); // assigns ID to username value in html page

    if (ID !== "") 
	{	

		$.ajax({ // uses ajax to connect
		url: 'fetch.php', 
		type: 'POST', // getting data
		dataType: 'json', // json format
		data: {ID:ID},
			
			success: function (json)  // success
				{ 
								
					dbsummonerLevel = json.result[0].summonerLevel; // summoner level which is equal to userid  
					dbsummonerID = json.result[0].summonerID; // summoner id which is equal to userid 
					dbsummonerIcon = json.result[0].summonerIcon;
					dbsummonerName = json.result[0].name;
					dbTier = json.result[0].summonerTier;
					dbTier = dbTier.toLowerCase().trim();
					dbDivision = json.result[0].summonerDivision;
					dbLp = json.result[0].summonerLp;
					placeholder = "Refresh Summoner to See this";
					placeholder2 = "";
					
					icon = "http://ddragon.leagueoflegends.com/cdn/6.6.1/img/profileicon/" + dbsummonerIcon + ".png";
					
					document.getElementById("userImg").src = icon; // sets userimg tag to the source which is icon variable
					document.getElementById("sLevel").innerHTML = dbsummonerLevel; // puts summoner level in html
					document.getElementById("sID").innerHTML = dbsummonerID; // puts summoner id in html
					document.getElementById("sIcon").innerHTML = icon;
					document.getElementById("sRank").innerHTML = dbTier.caps(); // .caps calls function to make first letter capitalised
					document.getElementById("division").innerHTML = dbDivision;
					document.getElementById("lp").innerHTML = dbLp;
					
					document.getElementById("masteryPagesCount").innerHTML = placeholder; // placeholder text for items which are not loading from the database below
					document.getElementById("masteryPagesAll").innerHTML = placeholder2;
					document.getElementById("runePagesCount").innerHTML = placeholder; 
					document.getElementById("runePagesAll").innerHTML = placeholder2;
					
					document.getElementById("championid").innerHTML = "<div class='resultsBox'><h1 class='resultsTitle'>Game # " + "</h1><span class='resultsTitle'>Champion Played: </span>" + placeholder + "<br/><span class='resultsTitle'>Kills: </span>" 
					+ placeholder2 + "<br/><span class='resultsTitle'>Deaths: </span>" + placeholder2 + "<br/><span class='resultsTitle'>Assists: </span>" 
					+ placeholder2 + "<br/><span class='resultsTitle'>Minions: </span>" + placeholder2 + "<br/><span class='resultsTitle'>KDA: </span>" + placeholder2  
					+ "<br/><span class='resultsTitle'>Damage Done: </span>" + placeholder2 + "<br/><span class='resultsTitle'>IP Earned: </span>" + placeholder2 
					+ "<br/><span class='resultsTitle'>Result: </span>" + placeholder2 + "<br/><span class='resultsTitle'>Date Played: </span>" + placeholder2 + "</div>";
					
					document.getElementById("champicon").src = placeholder2;
					
					
				},	
							
				
            error: function (XMLHttpRequest, textStatus, errorThrown) 
				{ 
                alert("Cannot find summoner in the database, try clicking refresh to update this profile!");	
				}	

				});
	} else {
		alert("Please type in a summoner name before clicking search!")
	}
	
}

