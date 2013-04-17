;(function( window, $ ){
  "use strict";    
  var JPP = window.JPP = ( typeof window.JPP !== "undefined" ) ? window.JPP : {};
  ( JPP.common = function(){
	  return{
	    _init : function(){
		    $( document ).ready(function(){
        if ( window.matchMedia !== undefined && window.matchMedia( "(min-width: 768px)" ).matches) {
          $.getJSON("/wp-content/themes/jppp/img/headers.php", function( data ){ 
		        var index = Math.floor(data.length * Math.random());
		        $("#jppp_header").attr("src","http://diqmvuv8zy5jv.cloudfront.net/wp-content/themes/jppp/img/header/"+ data[index]);
          });	
	} else if (window.matchMedia === undefined) {
            $.getJSON("/wp-content/themes/jppp/img/headers.php", function( data ) {      
              var index = Math.floor(data.length * Math.random());                                 
              $("#jppp_header").attr("src","http://diqmvuv8zy5jv.cloudfront.net/wp-content/themes/jppp/img/header/"+ data[index]);                                                   
          });       
        }
		    $(".alignnone").each(function(index,el){
		      var $el = $(el);
          $el.removeAttr("height").css("max-width", $el.width()).attr("width", "100%")});
		    });
        $( document ).on('movestart', function(e) {
          if ((e.distX > e.distY && e.distX < -e.distY) ||
              (e.distX < e.distY && e.distX > -e.distY)) {
            e.preventDefault();
          }
        });
       $( document ).on("swipeleft",function(){
          if ($( "[rel=next]" ).length) {
            window.location.href = $( "[rel=next]" ).attr("href");  
          }
          
        });
        $( document ).on("swiperight",function(){
          if ($( "[rel=prev]" ).length) {
            window.location.href = $( "[rel=prev]" ).attr("href");
          }
        });
      }
	  }
  }())._init();
}(window, jQuery));