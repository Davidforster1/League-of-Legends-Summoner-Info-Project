var ID = ""; // Declares variable for ID
var APIKEY = "your API key here"; // api key variable is global to be used later in the program
var i = 0; // global variable for holding the value of i which navigates through the match history array

function summonerinfo()
{
// derived from https://developer.riotgames.com/discussion/tutorials-libraries/show/kvll5V8r
    ID = $("#userName").val(); // assigns ID to username value in html page
	
    if (ID !== "") 
	{
		$.ajax({ // uses ajax to connect
		url: 'https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/by-name/' + ID + '?api_key=' + APIKEY, // this is the api query
		type: 'GET', // getting data
		dataType: 'json', // json format
		data: {},
			
			success: function (json) 
				{ 
					var userID = ID.replace(" ", "");
					userID = userID.toLowerCase().trim();
					summonerLevel = json[userID].summonerLevel; // summoner level which is equal to userid  
					summonerID = json[userID].id; // summoner id is equal to user id
					summonerIcon = json[userID].profileIconId;
					summonerName = json[userID].name;
					icon = "http://ddragon.leagueoflegends.com/cdn/6.6.1/img/profileicon/" + summonerIcon + ".png";
					
					document.getElementById("userImg").src = icon; // sets userimg tag to the source which is icon variable
					document.getElementById("sLevel").innerHTML = summonerLevel; // puts summoner level in html
					document.getElementById("sID").innerHTML = summonerID; // puts summoner id in html
					document.getElementById("sIcon").innerHTML = icon;
					
					Masteries(summonerID); // runs the get masteries function
					summonerrank(summonerID);
					Runes(summonerID);

				},
				
            error: function (XMLHttpRequest, textStatus, errorThrown) 
				{ 
                alert("Error retreiving summoner data, please try again!");	
				}
				});
	} else {
		alert("Please type in a summoner name before clicking refresh!")
	}
	
}

function Masteries(summonerID) 
{  // derived from https://developer.riotgames.com/discussion/tutorials-libraries/show/kvll5V8r
	document.getElementById("masteryPagesAll").innerHTML = ""; // resets the inner html to prevent spam
	$.ajax({ // uses ajax to connect
    url: "https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/" + summonerID + "/masteries?api_key=" + APIKEY, // this is the api query
    type: 'GET', // we are getting the data
    dataType: 'json', // we want json format
    data: {},
		
    success: function (resp) 
	{ 
		numberOfPages = resp[summonerID].pages.length;  // number of pages becomes equal to this           
		document.getElementById("masteryPagesCount").innerHTML = numberOfPages; // displays number of pages next to number of pages in html
            				
      resp[summonerID].pages.forEach(function (item) // for each mastery page found list the name of the mastery page
	  { 
		document.getElementById("masteryPagesAll").innerHTML = document.getElementById("masteryPagesAll").innerHTML + item.name + "<br />";
      });
		
    },

    error: function (XMLHttpRequest, textStatus, errorThrown) 
	{ 
		alert("Error retreiving masteries, please try again!");
    }
		
		});
}


function Runes(summonerID) 
{
		document.getElementById("runePagesAll").innerHTML = ""; // resets the inner html to prevent spam
	    $.ajax({ // uses ajax to connect
        url: "https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/" + summonerID + "/runes?api_key=" + APIKEY, // this is the api query
        type: 'GET', // we are getting the data
        dataType: 'json', // we want json format
        data: {},
		
        success: function (resp) 
		{ 
            numberOfPages = resp[summonerID].pages.length;  // number of pages becomes equal to this           
            document.getElementById("runePagesCount").innerHTML = numberOfPages; // displays number of pages next to number of pages in html
            				
            resp[summonerID].pages.forEach(function (item) // list each rune page name found line by line
			{ 	
			document.getElementById("runePagesAll").innerHTML = document.getElementById("runePagesAll").innerHTML + item.name + "<br />";
            }); // show each mastery page name line by line
        },

        error: function (XMLHttpRequest, textStatus, errorThrown) 
		{ 
            alert("Error retreiving runes, please try again!");
        }
		
			  });
}

function summonerrank(summonerID) 
{
	String.prototype.caps = function() 
	{ // function for ensuring that the first letter of summoner rank is in uppercase (derived from http://stackoverflow.com/questions/1026069/capitalize-the-first-letter-of-string-in-javascript)
    return this.charAt(0).toUpperCase() + this.slice(1);
	}

	$.ajax({
		url: "https://euw.api.pvp.net/api/lol/euw/v2.5/league/by-summoner/" + summonerID + "/entry?api_key=" + APIKEY, 
		type: 'GET', // we are getting the data
        dataType: 'json', // we want json format
        data: {},
		success: function(resp)
		{
		tier = (resp[summonerID][0].tier);
		tier = tier.toLowerCase().trim(); // Sets the summoner rank to lowercase
		division = (resp[summonerID][0].entries[0].division); 
		lp = (resp[summonerID][0].entries[0].leaguePoints);
		
		document.getElementById("sRank").innerHTML = tier.caps(); // .caps calls function to make first letter capitalised
		document.getElementById("division").innerHTML = division;
		document.getElementById("lp").innerHTML = lp;
		  Matchhistory(summonerID, tier, division, lp);
		},
	 
		error: function()
		{
			 document.getElementById("sRank").innerHTML = "Unranked"; // if theres no rank, rank becomes unranked
			 document.getElementById("division").innerHTML = ""; // if theres no division, division becomes ""
			 document.getElementById("lp").innerHTML = "0";
		
		tier = "Unranked";
		division = "";
		lp = 0;
			   Matchhistory(summonerID, tier, division, lp);
		}
		  });
		
}

function Matchhistory(summonerID, tier, division, lp) 
{
	$.ajax(
	{   // api call is made here via ajax
		url: "https://euw.api.pvp.net/api/lol/euw/v1.3/game/by-summoner/" + summonerID + "/recent?api_key=" + APIKEY,
		type: 'GET', 
		dataType: 'json', 
		data: {},
		
		success: function (json) 
		{
			// Our counters for the nextGame function
			game = 1;
			var i = 0;
			
			championid = json.games[i].championId;
			kills = json.games[i].stats.championsKilled;		
			deaths = json.games[i].stats.numDeaths;
			assists = json.games[i].stats.assists;
			minions = json.games[i].stats.minionsKilled;
			damagedone = json.games[i].stats.totalDamageDealtToChampions;
			ip = json.games[i].ipEarned;
			win = json.games[i].stats.win;
			gamedate = json.games[i].createDate;
			
			championid1 = json.games[0].championId;
			kills1 = json.games[0].stats.championsKilled;		
			deaths1 = json.games[0].stats.numDeaths;
			assists1 = json.games[0].stats.assists;
			minions1 = json.games[0].stats.minionsKilled;
			damagedone1 = json.games[0].stats.totalDamageDealtToChampions;
			ip1 = json.games[0].ipEarned;
			win1 = json.games[0].stats.win;
			gamedate1 = json.games[0].createDate;
			
			$.ajax	({
					type: "POST",// see also here
					url: 'home.php',// and this path will be proper
					data: 	{
					ID: summonerID,
					Name: summonerName,
					Level: summonerLevel,
					Icon: summonerIcon,
					Tier: tier,
					Division: division,
					Lp: lp,
					championid1: championid1,
					kills1: kills1,
					deaths1: deaths1,
					assists1: assists1,
					minions1: minions1,
					damagedone1: damagedone1,
					ip1: ip1,
					win1: win1,
					gamedate1: gamedate1,
							}
							})

			champnamestring(); // runs a function to convert champion id to a string in a readable format
			winyesno(); // sets win to victory or defeat instead of true or false
			nozeros(); // if any value is "undefined" it will be changed to 0
			
			kda = (kills + assists); // calculates kda for games
			kda = (kda / deaths);
			
			kda = Math.ceil(kda * 100)/100;
			
			if (kda == Number.POSITIVE_INFINITY || kda == Number.NEGATIVE_INFINITY)
				{
					kda = "Perfect";
				}
			
			var gamedate = new Date(gamedate);
			
	
			// The following code displays data depending on the array position, replaces itself when the array position changes
			document.getElementById("championid").innerHTML = "<div class='resultsBox'><h1 class='resultsTitle'>Game # " + game 
			+ "</h1><span class='resultsTitle'>Champion Played: </span>" + championid + "<br/><span class='resultsTitle'>Kills: </span>" 
			+ kills + "<br/><span class='resultsTitle'>Deaths: </span>" + deaths + "<br/><span class='resultsTitle'>Assists: </span>" 
			+ assists + "<br/><span class='resultsTitle'>Minions: </span>" + minions + "<br/><span class='resultsTitle'>KDA: </span>" + kda  
			 + "<br/><span class='resultsTitle'>Damage Done: </span>" + damagedone + "<br/><span class='resultsTitle'>IP Earned: </span>" + ip 
			+ "<br/><span class='resultsTitle'>Result: </span>" + win + "<br/><span class='resultsTitle'>Date Played: </span>" + gamedate + "</div>";
			
			
			document.getElementById("champicon").src = championicon;
			var championpicture = document.getElementById("champicon");
			championpicture.height = 300;
			championpicture.width = 600;
			
			// Increment the counter so when we click it's ready to rumble
			game++;
			i++;
			
			// When the user clicks to see the next record, this function is called
			document.getElementById("nextMatch").onclick = function nextGame()
			{
				// Loop the results
				if (game > 10) 
				{
					game = 1;
					i = 0;
				}
				
				championid = json.games[i].championId;
				kills = json.games[i].stats.championsKilled;		
				deaths = json.games[i].stats.numDeaths;
				assists = json.games[i].stats.assists;
				minions = json.games[i].stats.minionsKilled;
				damagedone = json.games[i].stats.totalDamageDealtToChampions;
				ip = json.games[i].ipEarned;
				win = json.games[i].stats.win;
				gamedate = json.games[i].createDate;
				
				champnamestring(); // runs a function to convert champion id to a string in a readable format
				winyesno(); // sets win to victory or defeat instead of true or false
				nozeros(); // if any value is "undefined" it will be changed to 0
				
				kda = (kills + assists); // calculates kda for games
				kda = (kda / deaths);
				
				kda = Math.ceil(kda * 100)/100;
				
				if (kda == Number.POSITIVE_INFINITY || kda == Number.NEGATIVE_INFINITY)
				{
					kda = "Perfect";
				}

				var gamedate = new Date(gamedate);
	
				// the following code displays data depending on the array position, replaces itself when the array position changes
				document.getElementById("championid").innerHTML = "<div class='resultsBox'><h1 class='resultsTitle'>Game # " + game 
			+ "</h1><span class='resultsTitle'>Champion Played: </span>" + championid + "<br/><span class='resultsTitle'>Kills: </span>" 
			+ kills + "<br/><span class='resultsTitle'>Deaths: </span>" + deaths + "<br/><span class='resultsTitle'>Assists: </span>" 
			+ assists + "<br/><span class='resultsTitle'>Minions: </span>" + minions + "<br/><span class='resultsTitle'>KDA: </span>" + kda  
			 + "<br/><span class='resultsTitle'>Damage Done: </span>" + damagedone + "<br/><span class='resultsTitle'>IP Earned: </span>" + ip 
			+ "<br/><span class='resultsTitle'>Result: </span>" + win + "<br/><span class='resultsTitle'>Date Played: </span>" + gamedate + "</div>";
				
			document.getElementById("champicon").src = championicon;
			var championpicture = document.getElementById("champicon");
			championpicture.height = 300;
			championpicture.width = 600;
								
				game++;
				i++;

			}

		},

		error: function (XMLHttpRequest, textStatus, errorThrown) 
		{ 
			alert("Could not find players match history please try again!");
		}
	});
						
}

function champnamestring() // converts champion id to a name so humans can read it 
{

				switch(championid) {
					case 1:
					championid = "Annie";
					break;
					case 2:
					championid = "Olaf";
					break;
					case 3:
					championid = "Galio";
					break;
					case 4:
					championid = "Twisted Fate";
					break;
					case 5:
					championid = "Xin Zhao";
					break;
					case 6:
					championid = "Urgot";
					break;
					case 7:
					championid = "Leblanc";
					break;
					case 8:
					championid = "Vladimir";
					break;
					case 9:
					championid = "FiddleSticks";
					break;
					case 10:
					championid = "Kayle";
					break;
					case 11:
					championid = "Master Yi";
					break;
					case 12:
					championid = "Alistar";
					break;
					case 13:
					championid = "Ryze";
					break;
					case 14:
					championid = "Sion";
					break;
					case 15:
					championid = "Sivir";
					break;
					case 16:
					championid = "Soraka";
					break;
					case 17:
					championid = "Teemo";
					break;
					case 18:
					championid = "Tristana";
					break;
					case 19:
					championid = "Warwick";
					break;
					case 20:
					championid = "Nunu";
					break;
					case 21:
					championid = "Miss Fortune";
					break;
					case 22:
					championid = "Ashe";
					break;
					case 23:
					championid = "Tryndamere";
					break;
					case 24:
					championid = "Jax";
					break;
					case 25:
					championid = "Morgana";
					break;
					case 26:
					championid = "Zilean";
					break;
					case 27:
					championid = "Singed";
					break;
					case 28:
					championid = "Evelynn";
					break;
					case 29:
					championid = "Twitch";
					break;
					case 30:
					championid = "Karthus";
					break;
					case 31:
					championid = "Chogath";
					break;
					case 32:
					championid = "Amumu";
					break;
					case 33:
					championid = "Rammus";
					break;
					case 34:
					championid = "Anivia";
					break;
					case 35:
					championid = "Shaco";
					break;
					case 36:
					championid = "Dr Mundo";
					break;
					case 37:
					championid = "Sona";
					break;
					case 38:
					championid = "Kassadin";
					break;
					case 39:
					championid = "Irelia";
					break;
					case 40:
					championid = "Janna";
					break;
					case 41:
					championid = "Gangplank";
					break;
					case 42:
					championid = "Corki";
					break;
					case 43:
					championid = "Karma";
					break;
					case 44:
					championid = "Taric";
					break;
					case 45:
					championid = "Veigar";
					break;
					case 48:
					championid = "Trundle";
					break;
					case 50:
					championid = "Swain";
					break;
					case 51:
					championid = "Caitlyn";
					break;
					case 53:
					championid = "Blitzcrank";
					break;
					case 54:
					championid = "Malphite";
					break;
					case 55:
					championid = "Katarina";
					break;
					case 56:
					championid = "Nocturne";
					break;
					case 57:
					championid = "Maokai";
					break;
					case 58:
					championid = "Renekton";
					break;
					case 59:
					championid = "Jarvan IV";
					break;
					case 60:
					championid = "Elise";
					break;
					case 61:
					championid = "Orianna";
					break;
					case 62:
					championid = "Wukong";
					break;
					case 63:
					championid = "Brand";
					break;
					case 64:
					championid = "Lee Sin";
					break;
					case 67:
					championid = "Vayne";
					break;
					case 68:
					championid = "Rumble";
					break;
					case 69:
					championid = "Cassiopeia";
					break;
					case 72:
					championid = "Skarner";
					break;
					case 74:
					championid = "Heimerdinger";
					break;
					case 75:
					championid = "Nasus";
					break;
					case 76:
					championid = "Nidalee";
					break;
					case 77:
					championid = "Udyr";
					break;
					case 78:
					championid = "Poppy";
					break;
					case 79:
					championid = "Gragas";
					break;
					case 80:
					championid = "Pantheon";
					break;
					case 81:
					championid = "Ezreal";
					break;
					case 82:
					championid = "Mordekaiser";
					break;
					case 83:
					championid = "Yorick";
					break;
					case 84:
					championid = "Akali";
					break;
					case 85:
					championid = "Kennen";
					break;
					case 86:
					championid = "Garen";
					break;
					case 89:
					championid = "Leona";
					break;
					case 90:
					championid = "Malzahar";
					break;
					case 91:
					championid = "Talon";
					break;
					case 92:
					championid = "Riven";
					break;
					case 96:
					championid = "Kog'Maw";
					break;
					case 98:
					championid = "Shen";
					break;
					case 99:
					championid = "Lux";
					break;
					case 101:
					championid = "Xerath";
					break;
					case 102:
					championid = "Shyvana";
					break;
					case 103:
					championid = "Ahri";
					break;
					case 104:
					championid = "Graves";
					break;
					case 105:
					championid = "Fizz";
					break;
					case 106:
					championid = "Volibear";
					break;
					case 107:
					championid = "Rengar";
					break;
					case 110:
					championid = "Varus";
					break;
					case 111:
					championid = "Nautilus";
					break;
					case 112:
					championid = "Viktor";
					break;
					case 113:
					championid = "Sejuani";
					break;
					case 114:
					championid = "Fiora";
					break;
					case 115:
					championid = "Ziggs";
					break;
					case 117:
					championid = "Lulu";
					break;
					case 119:
					championid = "Draven";
					break;
					case 120:
					championid = "Hecarim";
					break;
					case 121:
					championid = "Kha'zix";
					break;
					case 122:
					championid = "Darius";
					break;
					case 126:
					championid = "Jayce";;
					break;
					case 127:
					championid = "Lissandra";
					break;
					case 131:
					championid = "Diana";
					break;
					case 133:
					championid = "Quinn";
					break;
					case 134:
					championid = "Syndra";
					break;
					case 136:
					championid = "Aurelion Sol";
					break;
					case 143:
					championid = "Zyra";
					break;
					case 150:
					championid = "Gnar";
					break;
					case 154:
					championid = "Zac";
					break;
					case 157:
					championid = "Yasuo";
					break;
					case 161:
					championid = "Vel'koz";
					break;
					case 201:
					championid = "Braum";
					break;
					case 202:
					championid = "Jhin";
					break;
					case 203:
					championid = "Kindred";
					break;
					case 222:
					championid = "Jinx";
					break;
					case 223:
					championid = "Tahm Kench";
					break;
					case 236:
					championid = "Lucian";
					break;
					case 238:
					championid = "Zed";
					break;
					case 245:
					championid = "Ekko";
					break;
					case 254:
					championid = "Vi";
					break;
					case 266:
					championid = "Aatrox";
					break;
					case 267:
					championid = "Nami";
					break;
					case 268:
					championid = "Azir";
					break;
					case 412:
					championid = "Thresh";
					break;
					case 420:
					championid = "Illaoi";
					break;
					case 421:
					championid = "Rek'Sai";
					break;
					case 429:
					championid = "Kalista";
					break;
					case 432:
					championid = "Bard";
					break;
					}
					
	// the block of code below will set the champion picturing depending on the champion id				
	var championimageurl = championid.replace(" ", "").replace("'", ""); // .replace replaces the first statement with the second to remove spaces in url
	championicon = 'http://ddragon.leagueoflegends.com/cdn/img/champion/splash/' + championimageurl + '_0.jpg';	
}

function winyesno() // changes true or false from the win variable to victory or defeat 
{
				
				
				switch(win) 
				{
					case true:
					win = "Victory";
					break;
					case false:
					win = "Defeat";
					break;
				}
}

function nozeros() // if any value is "undefined" it will be changed to 0
{
	
				switch(kills) 
				{
					case undefined:
					kills = 0;
					break;			
				}
				
				switch(deaths) 
				{
					case undefined:
					deaths = 0;
					break;	
				}
				
				switch(assists) 
				{
					case undefined:
					assists = 0;
					break;	
				}
				
				switch(minions) 
				{
					case undefined:
					minions = 0;
					break;	
				}
}


