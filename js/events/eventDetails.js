define([
	'jquery',
	'underscore',
	'app/utils/AppView',
	'text!./eventDetails.html'
], function ($, _, AppView, template) {
	
	return AppView.extend({
		
		template: _.template(template),
		
		viewId: '#eventDetailsRegion',
		
		query: {
			'fields': 'name,description,photos{name,picture,images}'
		},		
		
		INIT: function (eventId) {
			debugger;
			this.query.id = eventId;
			this._getData(this.query, _.bind(function (response){
				if (response) {
					this._show(response);
					this.setEvents();
				}				
			}, this));
		},
		
		setEvents: function () {
			$(this.viewId).find('#closeEvtDetailsBtn').on('click', _.bind(function (evt) {
				$(this.viewId).empty();
			}, this));
			
			$(this.viewId).find('ul.eventDetailsList li img.eventDetailsImg').on('click', _.bind(function (evt) {
				$(this.viewId).find('.eventDetailsModal .modal-body').empty().html('<img src="' + evt.target.id + '" class="img-responsive">');
			}, this));
			
		},
		
		hideRegion: function (hide) {
			if (hide) {
				$(this.viewId).addClass('hidden');
			} else {
				$(this.viewId).removeClass('hidden');
			}
		}
		
	});
	
});
	