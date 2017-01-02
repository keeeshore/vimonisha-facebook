define([
	'jquery',
	'underscore',
	'app/utils/AppView',
	'app/events/events',
	'app/VimonishaApp'
], function ($, _, AppView, EventsView, VimonishaApp) {

	window.AppView = AppView;
	var timer = null;
	var urlParams = document.location.href.split("/").slice(-1)[0].split('?').slice(-1);
	var eventId = null;
	
	if (urlParams.length > 0 && urlParams[0].indexOf('eventId=') !== -1) {
		eventId = urlParams[0].replace('eventId=', '').split('&')[0];
	}
		
	timer = setInterval(function () {
		console.log('waiting for window.isAccessToken: ');
		if (document.cookie.indexOf('isAccessToken') !== -1) {
			console.log('isAccessToken is present now: ');
			clearInterval(timer);
			
			document.APP = new VimonishaApp();
			document.APP.INIT();		
			eventsView = new EventsView();
			if (eventId) {
				eventsView.INIT_EVENT_DETAILS(eventId);
			} else {
				eventsView.INIT();
			}
			
				
		}
	}, 100);
	
})