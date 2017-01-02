define([
	'jquery',
	'underscore',
	'app/utils/AppView',
	'app/events/events',
	'app/albums/albums',
	'app/timeline/timeline',
	'text!./home.html'
], function ($, _, AppView, EventsView, AlbumsView, TimelineView, template) {
	
	return AppView.extend({
		
		template: _.template(template),
		
		eventsView: null,
		
		timelineView: null,
		
		albumView: null,
		
		
		viewId: '#homeRegion',		
		
		INIT: function () {
			
			this.albumView = new AlbumsView();
			this.eventsView = new EventsView();
			this.timelineView = new TimelineView();
			
			this.albumView._onTrigger('EVT_GALLERY', _.bind(function (isEnabled) {
				this.eventsView.hideRegion(isEnabled);
			}, this));	
			
			this.albumView.INIT();			
			this.eventsView.INIT();			
			this.timelineView.INIT();
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
	