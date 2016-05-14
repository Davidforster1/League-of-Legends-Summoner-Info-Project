function serverstatus()
{
	    $.ajax({ // uses ajax to connect
        url: "http://status.leagueoflegends.com/shards/euw", // this is the api query
        type: 'GET', // we are getting the data
        dataType: 'json', // we want json format
        data: {
        },
        success: function (json) 
		{ // if success:
		
		// the code below will display CLIENT service messages from the website
		serverlocation = json.name;
		clientupdatesincoming = json.services[0].incidents[0].updates[0].content;
		clientupdatedatecreated = json.services[0].incidents[0].updates[0].created_at;
		var clientupdatedatecreated = new Date(clientupdatedatecreated); // converts the time to readable human format

          
            document.getElementById("serverstatus").innerHTML = serverlocation; 
			document.getElementById("clientmessage").innerHTML = clientupdatesincoming; 
			document.getElementById("clientupdatedatecreated").innerHTML = clientupdatedatecreated;
			
			

		serverstatus2();        
		
        },

        error: function (XMLHttpRequest, textStatus, errorThrown) { // if theres a problem, display this message
            alert("Error retreiving server status information, please refresh the page and try again!");
        }
		
		});
		
		
}

function serverstatus2()
{
	$.ajax({ // uses ajax to connect
        url: "http://status.leagueoflegends.com/shards/euw", // this is the api query
        type: 'GET', // we are getting the data
        dataType: 'json', // we want json format
        data: {
        },
        success: function (json) 
		{ // if success:
		
		// the code below will display CLIENT service messages from the website
		serverlocation = json.name;
		gameupdatesincoming = json.services[1].incidents[0].updates[0].content;
		gameupdatedatecreated = json.services[1].incidents[0].updates[0].created_at;
		var gameupdatedatecreated = new Date(gameupdatedatecreated); // converts the time to readable human format

          
            document.getElementById("gameserverstatus").innerHTML = serverlocation; 
			document.getElementById("gamemessage").innerHTML = gameupdatesincoming; 
			document.getElementById("gameupdatedatecreated").innerHTML = gameupdatedatecreated;

        },

        error: function (XMLHttpRequest, textStatus, errorThrown) { // if theres a problem, display this message
            alert("Error retreiving server status information, please refresh the page and try again!");
        }
		
		});
}