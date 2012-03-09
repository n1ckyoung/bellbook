
var $j = jQuery.noConflict();

function stopLoader(spinner) {
	spinner.stop();
	$j("#loading").hide();
}

function startLoader(spinner, target) {
	$j("#loading").show("slow", function() {
		
	});
	spinner.spin(target);
}

$j(document).ready(function(){

	var opts = {
	  lines: 16, // The number of lines to draw
	  length: 25, // The length of each line
	  width: 4, // The line thickness
	  radius: 10, // The radius of the inner circle
	  color: '#3D3D3D', // #rgb or #rrggbb
	  speed: 1, // Rounds per second
	  trail: 33, // Afterglow percentage
	  shadow: false, // Whether to render a shadow
	  hwaccel: false, // Whether to use hardware acceleration
	  className: 'spinner', // The CSS class to assign to the spinner
	  zIndex: 2e9, // The z-index (defaults to 2000000000)
	  top: 'auto', // Top position relative to parent in px
	  left: 'auto' // Left position relative to parent in px
	};
	
	var target = document.getElementById('animation');
	var spinner = new Spinner(opts).spin(target);
	stopLoader(spinner);
	
	$j(window).scroll(function() {
	   if($j(window).scrollTop() + $j(window).height() > $j(document).height() - 100) {
	       startLoader(spinner, target);
	   }
	});
	
});

