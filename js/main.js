define([
	'jquery',
	'underscore',
	'app/utils/AppView',
	'app/home/home',
	'app/VimonishaApp'
], function ($, _, AppView, HomeView, VimonishaApp) {

	window.AppView = AppView;
	var timer = null;	
		
	timer = setInterval(function () {
		console.log('waiting for window.isAccessToken: ');
		if (document.cookie.indexOf('isAccessToken') !== -1) {
			console.log('isAccessToken is present now: ');		
			clearInterval(timer);
			document.APP = new VimonishaApp();
			document.APP.INIT();
			homeView = new HomeView();
			homeView.INIT();				
		}
	}, 100);

	
})