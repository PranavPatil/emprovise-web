/*
 * getStockData
 *
 * A simple jQuery plugin to display the stock market information
 * for NADAQ and S&P 500. The stock information is pulled using the
 * Yahoo Finance API and YQL.
 *
 * Developed by Pranav Patil <pranav@gmail.com>
 *
 * Version 1.0 - Last updated: August 23 2012
 */


(function($) {

	$.extend({

		getStockData: function(options){
			var options = $.extend({
				symbol: ['^IXIC', 'DJITR'],
				startDate: '2012-08-01',
				endDate: '2012-08-17',
				dateFormat: 'yy-mm-dd',
				success: function(stockData){},
				error: function(message){}
			}, options);

			var yqlURL = "http://query.yahooapis.com/v1/public/yql?q=";
			var dataFormat = "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
			var stockDataList = []; //declare array

			var allRequestsCompleted = (function() {
				var numRequestToComplete, requestsCompleted, callBacks, singleCallBack;

				return function(options) {
					if (!options) options = {};

					numRequestToComplete = options.numRequest || 0;
					requestsCompleted = options.requestsCompleted || 0;
					callBacks = [];
					var fireCallbacks = function() {
						for (var i = 0; i < callBacks.length; i++) callBacks[i]();
					};
					if (options.singleCallback) callBacks.push(options.singleCallback);

					this.addCallbackToQueue = function(isComplete, callback) {
						if (isComplete) requestsCompleted++;
						if (callback) callBacks.push(callback);
						if (requestsCompleted == numRequestToComplete) fireCallbacks();
					};
					this.requestComplete = function(isComplete) {
						if (isComplete) requestsCompleted++;
						if (requestsCompleted == numRequestToComplete) fireCallbacks();
					};
					this.setCallback = function(callback) {
						callBacks.push(callBack);
					};
				};
			})();

			var requestCallback = new allRequestsCompleted({
				numRequest: options.symbol.length,
				singleCallback: function(){

					if(stockDataList[0].length > 0 && stockDataList[1].length > 0) {
						options.success(stockDataList);
					}
					else {
						options.error("Error in Accessing Stock Data");
					}
				}
			});

			$.each(options.symbol, function (index, value) { //loop results.quote object

				var stockData = []; //declare array
				var historicalQ = yqlURL + "select%20*%20from%20yahoo.finance.historicaldata%20where%20symbol%20%3D%20%22" + value + "%22%20and%20startDate%20%3D%20%22" + options.startDate + "%22%20and%20endDate%20%3D%20%22" + options.endDate + "%22" + dataFormat;

				var loadHistoricalData = function() {
					$.getJSON(historicalQ, function(json) {//YQL Request

						$.each(json.query.results.quote, function (i, quote) { //loop results.quote object

							var parts = quote.Date.match(/(\d+)/g);   // Date Format is yyyy-mm-dd
							stdDate = Date.UTC(parts[0], parts[1]-1, parts[2]);

							var stockGranule = [stdDate, parseFloat(quote.Close)]; //declare array
							stockData.push(stockGranule);
						});

						stockData.reverse();
						stockDataList.push(stockData);
						requestCallback.requestComplete(true);
					});
				};

				loadHistoricalData();
			});

			return this;
		}
	});

		$.extend({

		loadStockData: function(callback) {
			$.getStockData({
				symbol: ['^IXIC', '^GSPC'],
				startDate: (1).months().ago().toString("yyyy-MM-dd"),
				endDate: Date.today().toString("yyyy-MM-dd"),
				dateFormat: 'yy-mm-dd',
				success: function(stockData){
					callback(stockData);
				},
				error: function(error) {
					$("#stockcontainer").html('<p>'+error+'</p>');
				}
			});
		}
		});

		$.loadStockData(function (stockData) {

//			var isChartLoaded = false;

			if(stockData != null && stockData[0] != null) {
				var arr1 = stockData[0];
				$("#stockvalue1").html(stockData[0][arr1.length-1][1]);

				todayval = stockData[0][arr1.length-1][1];
				yesterdayval = stockData[0][arr1.length-2][1];

				if(yesterdayval > todayval) {
					$("#stockimage").attr("src", "img/stock/stock_down.png");
				}
				else {
					$("#stockimage").attr("src", "img/stock/stock_up.png");
				}
			}

			if(stockData != null && stockData[1] != null) {
				var arr2 = stockData[1];
				$("#stockvalue2").html(stockData[1][arr2.length-1][1]);
			}

		    $("#stockwidget").hover(
                function () {

//				if(isChartLoaded == false) {

					this.chart = new Highcharts.StockChart({
						chart: {
							renderTo: 'stockcontainer',
							height: $("#stockcontainer").height(),
							width: $("#stockcontainer").width(),
							spacingRight: 30,
							borderColor: '#EBBA95',
							borderWidth: 2,
							type: 'line'
						},
						title: {
							text: 'STOCK UPDATES'
						},
						subtitle: {
							text: 'Monthly Data'
						},
						xAxis: {
							type: 'datetime',
							dateTimeLabelFormats: { // don't display the dummy year
							month: '%e. %b',
							day: '%b %e',
							hour: '%b %e',
							year: '%b'
							}
						},

						yAxis: {
							title: {
								text: 'Index (delta %)'
							}
							,align: 'left',

							labels: {
								formatter: function() {
									return (this.value > 0 ? '+' : '') + this.value + '%';
								}
							},
							plotLines: [{
								value: 1300,
								width: 2,
								color: 'silver'
							}]
						},

						plotOptions: {
							series: {
								compare: 'percent',
				                animation: {
				                    duration: 2000
				                }
							}
						},

						credits: {
							enabled: false
						},
						scrollbar: {
							enabled: false
						},
						rangeSelector: {
							selected: 1,
							enabled: false
						},

						series: [{
							name: 'NASDAQ',
							data: stockData[0],
						}
						, {
							name: 'S&P 500',
							data: stockData[1],
						}]
					});

//					isChartLoaded = true;
//				}
				},
                function () {
/*					if (this.chart && this.chart.destroy && isChartLoaded == true) {
						this.chart.destroy();
						isChartLoaded = false;
					}
*/
				}
            );
		});

})(jQuery);
