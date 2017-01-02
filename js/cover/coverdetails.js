define([
	'jquery',
	'underscore',
	'text!./coverdetails.html'
], function ($, _, template) {
	
	debugger;
	
	return {
		
		template: _.template(template),
		
		_COVER_ALBUM: 'cover,album',		
		
		INIT: function () {
			debugger;
			document.APP.makeCall(this._COVER_ALBUM, function (response){
				debugger;
			})
		}
		
	}
	
});
	