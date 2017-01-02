define([
	'jquery',
	'underscore',
	'app/utils/AppView',
	'text!./gallery.html'
], function ($, _, AppView, template) {
	
	return AppView.extend({
		
		template: _.template(template),
		
		viewId: null,
		
		query: {
			'fields': 'photos.limit(15){picture,images},description,name'
		},	
		
		INIT: function (vId) {
			this.query.id = vId.replace('list_', '');
			this.viewId = '#album_' + this.query.id;
			this._getData(this.query, _.bind(function (response) {
				this._show(response);
				this.setEvents();
			}, this));
		},
		
		setEvents: function () {
			$(this.viewId).find('.emptyGalleryBtn').on('click', _.bind(function (evt) {
				$('#album_' + evt.target.id.replace('removeAlbum_', '')).empty();
			}, this));
			
			$(this.viewId).find('ul.galleryList li img').on('click', _.bind(function (evt) {
				this._trigger('EVT_GALLERY_SHOW_IMG', evt.target.id);
				
			}, this));
			
		}
		
	});
	
});
	