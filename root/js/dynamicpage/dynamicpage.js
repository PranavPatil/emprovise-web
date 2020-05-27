$(function() {

    var newHash      = "",
        $mainContent = $("#dynpage-main-content"),
        $pageWrap    = $("#dynpage-page-wrap"),
        baseHeight   = 0,
        $el;
        
    $pageWrap.height($pageWrap.height());
    baseHeight = $pageWrap.height() - $mainContent.height();
    
    $("nav").delegate("a", "click", function() {
        window.location.hash = $(this).attr("href");
        return false;
    });
    
    $(window).bind('hashchange', function(){
    
        newHash = window.location.hash.substring(1);
        
        if (newHash) {
            $mainContent
                .find("#dynpage-guts")
                .fadeOut(200, function() {
                    $mainContent.hide().load(newHash + " #dynpage-guts", function() {

			            loadScript('pageBoxScript', 'js/pagebox/pagebox.js');
						
                        $mainContent.fadeIn(200, function() {
                            $pageWrap.animate({
                                height: baseHeight + $mainContent.height() + "px"
                            });
                        });

                        $("nav a").removeClass("current");
                        $("nav a[href="+newHash+"]").addClass("current");
                    });
                });
        };
        
    });
    
    $(window).trigger('hashchange');
	
});


function loadScript(scriptId, scriptPath) {

		var old = document.getElementById(scriptId);  
	    if (old != null) {  
	      old.parentNode.removeChild(old);  
          delete old;  
        } 

        var head = document.getElementsByTagName("head")[0];  
        script = document.createElement('script');  
        script.id = scriptId;  
        script.type = 'text/javascript';  
        script.src = scriptPath;  
//        script.onload = refresh_page;    
        head.appendChild(script); 		

}

