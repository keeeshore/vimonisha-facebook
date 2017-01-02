define([
	'jquery',
	'underscore',
	'app/utils/AppView',
	'app/events/eventDetails',
	'text!./upComingEvents.html',
	'text!./pastEvents.html'
], function ($, _, AppView, EventDetailsView, upComingEventsTemplate, pastEventsTemplate) {
	
	return AppView.extend({
		
		upcomingTemplate: _.template(upComingEventsTemplate),
		
		pastTemplate: _.template(pastEventsTemplate),
		
		mainContainerId: '#homeRegion',
		
		upComingViewId: '#upComingEventsRegion',
		
		pastViewId: '#pastEventsRegion',	

		eventDetailsView: null,
		
		query: {
			'fields': 'events.limit(10){cover,name,start_time,end_time,location}'
		},

		_show: function (response) {
			var $upComingViewId = $(this.upComingViewId);
			$upComingViewId.html(this.upcomingTemplate(response));
			
			var $pastViewId = $(this.pastViewId);
			$pastViewId.html(this.pastTemplate(response));			
		},
		
		INIT: function (eventId) {			
			$(this.mainContainerId).removeClass('hidden');
			this._getData(this.query, _.bind(function (response) {
				this._show(response);
				this.setEvents();
				this.showSpecifics();
			}, this));
		},
		
		INIT_EVENT_DETAILS: function (eventId) {
			$(this.mainContainerId).addClass('hidden');
			if (eventId) {
				this.eventDetailsView = new EventDetailsView();
				this.eventDetailsView.INIT(eventId);	
			}
		},
		
		setEvents: function () {
			
			$(this.pastViewId).find('.eventName a').on('click', _.bind(function (evt) {
				var eventId = evt.target.id.replace('event_', '');
				this._trigger('EVT_DETAIL', eventId);
			}, this));
			
			$(this.upComingViewId).find('.eventName a').on('click', _.bind(function (evt) {
				var eventId = evt.target.id.replace('event_', '');
				this._trigger('EVT_DETAIL', eventId);
			}, this));
		},
		
		hideRegion: function (hide) {
			if (hide) {
				$(this.viewId).addClass('hidden');
			} else {
				$(this.viewId).removeClass('hidden');
			}
		},
		
		showSpecifics: function () {
			if (window.location.href.indexOf('exhibitions.php') !== -1) {
				$(this.pastViewId).find('.eventsList li').removeClass('hidden');
				
				$(this.pastViewId).find('.eventDetails').removeClass('hidden');
				$(this.upComingViewId).find('.eventDetails').removeClass('hidden');
			}
		}
		
	});
	
});
	