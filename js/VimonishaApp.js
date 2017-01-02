define([
	'jquery',
	'underscore'
], function ($, _) {
	
	var APP = function () {
	
			var accesToken = 'EAAG6qlC4FlIBAGBC6Q1XxNYSIZBB54RBiWxcHQIP0xnIHvQcekcCdxt95dCvvpWb0UKtcvZCTgINLSnvVZAaL3BwMCG1IZCJSQFYL1wnkj4pbviGBsi2YOZA7enr2bsF29WG0HcMTPcc1ZB8zrlqTtP7R4sgmPZAzwZD',
				vimonishaId = 'VimonishaExhibitions';
			
			
		var API = {
			
			// makeCall: function (options, callback) {
				// $('#loaderBar').removeClass('hidden');
				// var vId = _.isUndefined(options.id) ? vimonishaId : options.id;
				// var cb = callback;
				// FB.api('https://graph.facebook.com/v2.4/' + vId, 'get', {'access_token': accesToken, 'fields': options.fields }, function (response) {				$('#loaderBar').addClass('hidden');		
							// if (response && response.error) {
								// alert(response.error.message);							
							// }
							// cb(response);
						// });
			// }
			
			makeCall: function (options, callback) {
				$('#loaderBar').removeClass('hidden');
				var vId = _.isUndefined(options.id) ? vimonishaId : options.id;
				var cb = callback;
				$.ajax({
				  url: "../include/get-facebook-graph-data.php",
				  data: { 'fields': options.fields, 'id': options.id || 'VimonishaExhibitions' }
				}).done(function(response) {
					if (response && response.error) {
						alert(JSON.stringify(response));
					}					
					$('#loaderBar').addClass('hidden');	
					cb(response);
				});
			}
			
			
			
		}
	
		return {			
			
			INIT: function (urlParams) {},
			
			makeCall: API.makeCall
			
		}
	}
	
	return APP;
	
});
	