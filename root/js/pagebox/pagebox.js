(function($){

// Creating the sweetPages jQuery plugin:
$.fn.sweetPages = function(opts){
	
	// If no options were passed, create an empty opts object
	if(!opts) opts = {};
	
	var resultsPerPage = opts.perPage || 3;
	
	// The plugin works best for unordered lists, althugh ols would do just as well:
	var ul = this;
	var li = ul.find('li');
	
	li.each(function(){
		// Calculating the height of each li element, and storing it with the data method:
		var el = $(this);
		el.data('height',el.outerHeight(true));
	});
	
	// Calculating the total number of pages:
	var pagesNumber = Math.ceil(li.length/resultsPerPage);
	
	// If the pages are less than two, do nothing:
	if(pagesNumber<2) return this;

	// Creating the controls div:
	var swControls = $('<div class="swControls">');
	
	for(var i=0;i<pagesNumber;i++)
	{
		// Slice a portion of the lis, and wrap it in a swPage div:
		li.slice(i*resultsPerPage,(i+1)*resultsPerPage).wrapAll('<div class="swPage" />');
		
		// Adding a link to the swControls div:
		swControls.append('<a href="" class="swShowPage">'+(i+1)+'</a>');
	}

	ul.append(swControls);
	
	var maxHeight = 0;
	var totalWidth = 0;
	
	var swPage = ul.find('.swPage');
	swPage.each(function(){
		
		// Looping through all the newly created pages:
		
		var elem = $(this);

		var tmpHeight = 0;
		elem.find('li').each(function(){tmpHeight+=$(this).data('height');});

		if(tmpHeight>maxHeight)
			maxHeight = tmpHeight;

		totalWidth+=elem.outerWidth();
		
		elem.css('float','left').width(ul.width());
	});
	
	swPage.wrapAll('<div class="swSlider" />');
	
	// Setting the height of the ul to the height of the tallest page:
	ul.height(maxHeight);
	
	var swSlider = ul.find('.swSlider');
	swSlider.append('<div class="clear" />').width(totalWidth);

	var hyperLinks = ul.find('a.swShowPage');
	
	hyperLinks.click(function(e){
		
		// If one of the control links is clicked, slide the swSlider div 
		// (which contains all the pages) and mark it as active:

		$(this).addClass('active').siblings().removeClass('active');
		
		swSlider.stop().animate({'margin-left':-(parseInt($(this).text())-1)*ul.width()},'slow');
		e.preventDefault();
	});
	
	// Mark the first link as active the first time this code runs:
	hyperLinks.eq(0).addClass('active');
	
	// Center the control div:
	swControls.css({
		'left':'50%',
		'margin-left':-swControls.width()/2
	});
	
	return this;
	
}})(jQuery);


$(document).ready(function(){

	/* The following code is executed once the DOM is loaded */
	
	// Calling the jQuery plugin and splitting the
	// #holder UL into pages of 3 LIs each:
	
	$('#holder').sweetPages({perPage:3});
	
	// The default behaviour of the plugin is to insert the 
	// page links in the ul, but we need them in the pagebox container:

	var controls = $('.swControls').detach();
	controls.appendTo('#pagebox');

    $("#pagebox").swipe( {data:"#pagebox", swipeLeft:swipe1, swipeRight:swipe1, allowPageScroll:"auto"} );
	  
	$(document).bind('keydown',function(e){ 

      if (e.keyCode == 37) { 
	    swipe1(e, "right") 
        return false;
      }
      else if (e.keyCode == 39) { 
		swipe1(e, "left") 
        return false;
      }
    });
});

//Swipe handlers.
function swipe1(event, direction)
{
    var $activepage = $("div.swControls").find("a.active");
    var pgno = $activepage.html();
	var $nextpage = null;
	
    if(direction == 'right' && $activepage.prev().length ) {
		$nextpage = $activepage.prev();
	}
	else if(direction == 'left' && $activepage.next().length) {
		$nextpage = $activepage.next();
	}
	
	if($nextpage != null) {
		// Mircosoft Internet Explorer prefers triggering
		if($.browser.msie) {
			$nextpage.trigger('click');
		}
		else {
            var el = $nextpage.get(0);
            var evt = document.createEvent("MouseEvents");
            evt.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
            el.dispatchEvent(evt);
		}
	}
}
			
/*
function swipe2(event, phase, direction, distance)
{
	var str=phase +" you have swiped " + distance + "px in direction:" + direction;
	$(this.data).text(str);
}
*/
