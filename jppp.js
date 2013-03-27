
;(function(window, $){
    "use strict";    
  // Check to see if our global is available as a member of window; if it is, our namespace root exists; if not, we'll create it.
    var JPP = window.JPP = (typeof window.JPP !== "undefined") ? window.JPP : {};
    (JPP.header = function(){
	return{
	    _init : function(){
		$(document).ready(function(){
		    if (screen.width >= 600){
		$.getJSON("/wp-content/themes/jppp/img/headers.php", function( data ){ 
		    var index = Math.floor(data.length * Math.random());
		    $("#jppp_header").attr("src","/wp-content/themes/jppp/img/header/"+ data[index]);

 });	
		    }
		$(".alignnone").each(function(index,el){
		    var $el = $(el);
                    $el.removeAttr("height").css("max-width", $el.width()).attr("width", "100%")});
		});
	    }
	}
    }())._init();
}(window, jQuery));