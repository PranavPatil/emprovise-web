/* If your going to nick/borrow any of this jQuery code please be kind enough to link back to me in your code! */
/* Failure to do so could result in severe kicking to your nether regions!!! */

jQuery(function($) {

/* CSS3 */ 


$(".entry, #tipinfo, ol.commentlist, li.comment, #respond, #commentform textarea, #commentform input, #contactform, #contactform input, #contactform textarea").css("-moz-border-radius","10px");
$(".entry, #tipinfo, ol.commentlist, li.comment, #respond, #commentform textarea, #commentform input, #contactform, #contactform input, #contactform textarea").css("-webkit-border-radius","10px");


/* Menu Hover effects */

$(".menu a").hover(function(){
	$(this).stop().animate({
		paddingLeft: "15px"
			}, 300);
}, function(){
	$(this).stop().animate({
		paddingLeft: "0px"
			}, 300);
});


$("#sidebar li.widget_text").removeClass("widget");

$("#sidebar li.widget a").hover(function(){
	$(this).stop().animate({
		paddingLeft: "20px"
			}, 300);
}, function(){
	$(this).stop().animate({
		paddingLeft: "10px"
			}, 300);
});

 
/* Tooltip */ 

$("div.tool a").addClass("tip");

function tooltip(target){

$(target).each(function(i){

 		
				$(this).mouseover(function(){
				
						var tt = "tooltip"
						var str = $(this).text();
						$("#tipinfo").append("<p class=" + tt + ">" + str + "</p>");
								
				}).mouseout(function(){
				
						$(".tooltip").remove();		
				});
			});
		}

	 tooltip(".tip");
	 
	 
/* Collapse Widgets */ 
	 
var c = 0;
var panel = $("li.widget ul");
var l = $('li.widget h2').length - 1;
var allOpened = 0;

for (c=0;c<=l;c++){

   if ( $.cookie('panel' + c) == null) {
      allOpened = allOpened + 1;
   };
};

if(allOpened > 1) {

  for (c=0;c<=l;c++){

   		$(panel).eq(c).css({display:"none"});
  	    $(panel).eq(c).prev().removeClass('active').addClass('inactive');
  };
}
else {

  $("li.widget h2").addClass("active");

  for (c=0;c<=l;c++){

     var cvalue = $.cookie('panel' + c);
  
     if ( cvalue == 'closed' + c ) {
   
     		$(panel).eq(c).css({display:"none"});
   	  	    $(panel).eq(c).prev().removeClass('active').addClass('inactive');
     };
  };
}


$("li.widget h2.active").toggle(
      function () {
        	var num = $("li.widget h2").index(this);
        	var cooky = 'panel' + num;
    		var value = 'closed' + num;
   			$(this).next("ul").slideUp(500);
			$(this).removeClass('active');
    		$.cookie(cooky, value, { path: '/', expires: 10 });	
    		
      },
      function () {
            collapseAll();
        	var num = $("li.widget h2").index(this);
        	var cooky = 'panel' + num;
     		$(this).next("ul").slideDown(500);
    		$(this).addClass("active");  		
	  		$.cookie(cooky, null, { path: '/', expires: 10 });
      }
    );


$("li.widget h2.inactive").toggle(

      function () {
            collapseAll();	  
        	var num = $("li.widget h2").index(this);
        	var cooky = 'panel' + num;
     		$(this).next("ul").slideDown(500);
    		$(this).addClass("active"); 
    		$(this).removeClass('inactive'); 		
	  		$.cookie(cooky, null, { path: '/', expires: 10 });
    		
      },
      function () {
        	var num = $("li.widget h2").index(this);
        	var cooky = 'panel' + num;
    		var value = 'closed' + num;
   			$(this).next("ul").slideUp(500);
			$(this).removeClass('active');
    		$.cookie(cooky, value, { path: '/', expires: 10 });	
      }
    );

});

function collapseAll() {
	
	var c = 0;
    var panel = $("li.widget ul");
	var l = $('li.widget h2').length - 1;

	for (c=0;c<=l;c++){

       if ($(panel).eq(c).prev().hasClass('active')) {
			
			// Mircosoft Internet Explorer prefers triggering
			if($.browser.msie) {
				$(panel).eq(c).prev().trigger('click');
			}
			else {
              var el = $(panel).eq(c).prev().get(0);
              var evt = document.createEvent("MouseEvents");
              evt.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
              el.dispatchEvent(evt);
			}
        } 
	};
}
