  var Zipcode = '61265';
  var Unit = 'c';

  (function($) {
    $.extend({
        loadWeather: function(Zipcode, Unit) {
			
			$.simpleWeather({
				zipcode: Zipcode,
				unit: Unit,
				success: function(weather) {
					
				    if(timeOfDay == 'n') {
					  $("#yw-forecast").attr('class', 'night');
					  $("#yw-fivedayforecast").attr('class', 'night');
					}
					
					$("#yw-cond").html(weather.city+', '+weather.region+', '+weather.country);
					$("#currentweather").html(weather.currently);
					$("#humidity").html(weather.humidity);
					$("#wind").html(weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed);
					$("#visibility").html(weather.visibility+' mi');
					$("#pressure").html(weather.pressure+' mb');
					$("#heatindex").html(weather.heatindex);
					$("#yw-temp").html(weather.temp+'&deg;');  // +weather.units.temp
					$("#forecast-icon").css('background-image', 'url(' + weather.image + ')');  
					$("#high-low").html('High: '+weather.high+'&deg; Low: '+weather.low+'&deg;');
					
					$("#wid4title").html(weather.city+', '+weather.region);
					$("#wid4image").attr("src", weather.image);
					$("#ywtemp").html(weather.temp+'&deg;'+weather.units.temp);
					$("#ywcurrent").html(weather.currently);

				},
				error: function(error) {
					$("#weather").html('<p>'+error+'</p>');
				}
			});
			
			$.simpleForecast({
				zipcode: Zipcode,
				unit: Unit,
				success: function(wforecast) {
					
					$("#day3name").html(wforecast.day3.day);
					$("#day4name").html(wforecast.day4.day);
					$("#day5name").html(wforecast.day5.day);
					
					$("#wiffday1 div").html(wforecast.today.forecast);
					$("#wiffday2 div").html(wforecast.tommorrow.forecast);
					$("#wiffday3 div").html(wforecast.day3.forecast);
					$("#wiffday4 div").html(wforecast.day4.forecast);
					$("#wiffday5 div").html(wforecast.day5.forecast);
					
					if(imagePosition[wforecast.today.forecast] != null) {
					  $("#wiffday1 img").css('background-position', imagePosition[wforecast.today.forecast] + ' 0px');  
					}
					
					if(imagePosition[wforecast.tommorrow.forecast] != null) {
					  $("#wiffday2 img").css('background-position', imagePosition[wforecast.tommorrow.forecast] + ' 0px');  
					}
					
					if(imagePosition[wforecast.day3.forecast] != null) {
				 	  $("#wiffday3 img").css('background-position', imagePosition[wforecast.day3.forecast] + ' 0px');  
					}
					
					if(imagePosition[wforecast.day4.forecast] != null) {
					  $("#wiffday4 img").css('background-position', imagePosition[wforecast.day4.forecast] + ' 0px');  
					}
					
					if(imagePosition[wforecast.day5.forecast] != null) {
					  $("#wiffday5 img").css('background-position', imagePosition[wforecast.day5.forecast] + ' 0px');
					}

					$("#tempday1").html('High: '+wforecast.today.high+'&deg; <div>Low: '+wforecast.today.low+'&deg;</div>');
					$("#tempday2").html('High: '+wforecast.tommorrow.high+'&deg; <div>Low: '+wforecast.tommorrow.low+'&deg;</div>');
					$("#tempday3").html('High: '+wforecast.day3.high+'&deg; <div>Low: '+wforecast.day3.low+'&deg;</div>');
					$("#tempday4").html('High: '+wforecast.day4.high+'&deg; <div>Low: '+wforecast.day4.low+'&deg;</div>');
					$("#tempday5").html('High: '+wforecast.day5.high+'&deg; <div>Low: '+wforecast.day5.low+'&deg;</div>');		
					
			        $("#wiffday6 a").attr("href","http://www.weather.com/weather/extended/" + Zipcode +  "?par=yahoo&site=www.yahoo.com&promo=extendedforecast&cm_ven=Yahoo&cm_cat=www.yahoo.com&cm_pla=forecastpage&cm_ite=CityPage");
				},
				error: function(error) {
					$("#weather").html('<p>'+error+'</p>');
				}
			});
        }
    });
  })(jQuery);

  $(function() {
        $('#zipcodetext').val(Zipcode);
        $.loadWeather(Zipcode, Unit);
		
		$("#zipcodetext").focus(function(){
		// Select input field contents
			 this.select();
		});
					   
		$('#zipcodetext').live('keyup', function(e) {
			 var ziplength = $("#zipcodetext").val().length;
  
			 if(ziplength == 5) {
				Zipcode = $("#zipcodetext").val();
				$.loadWeather(Zipcode, Unit);
			 }
	    });
						 
        $("#templink a").click(function(e) {
							 
			 var classattrib = $(this).attr("class");
							 
			 if($(this).attr("id") == 'cellink') {
			   $("#ferlink").attr('class', classattrib);
			 }
			 else if($(this).attr("id") == 'ferlink') {
			   $("#cellink").attr('class', classattrib);
			 }
  
			 if($(this).attr("class") == 'seltempType') {
			   $(this).attr('class', 'unseltempType');
			 }
			 else if($(this).attr("class") == 'unseltempType') {
			   $(this).attr('class', 'seltempType');
			 }
							 
			 if($("#cellink").attr("class") == 'seltempType') {
			   Unit = 'c';
			 }
			 else if($("#ferlink").attr("class") == 'seltempType') {
			   Unit = 'f';
			 }
							 
			 e.preventDefault();
			 $.loadWeather(Zipcode, Unit);
		 });
  });
