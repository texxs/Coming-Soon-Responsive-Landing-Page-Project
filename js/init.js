//Hook up the tweet display

$(document).ready(function() {
						   
	$("#countdown").countdown({
				date: "01 august 2016 12:00:00",
				format: "on"
			},
			
			function() {
				// callback function
			});

});	
