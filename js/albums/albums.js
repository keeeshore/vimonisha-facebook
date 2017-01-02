define([
	'jquery',
	'underscore',
	'app/utils/AppView',
	'app/gallery/gallery',
	'text!./albums.html'
], function ($, _, AppView, GalleryView, template) {
	
	return AppView.extend({
		
		template: _.template(template),
		
		viewId: '#albumsRegion',
		
		galleryView: null,
		
		query: {
			'fields': 'albums.limit(100){cover_photo,picture,name}'
		},	
		
		INIT: function () {
			this._getData(this.query, _.bind(function (response) {
				this._show(response);
				this.setEvents();
			}, this));
		},
		
		setEvents: function () {
			
			$(this.viewId).find('.albumsList li a.albumName').on('click', _.bind(function (evt) {
				
				this.galleryView = new GalleryView();
				
				this.galleryView._onTrigger('EVT_GALLERY_OFF', _.bind(function () {
					this._trigger('EVT_GALLERY', false);
				}, this));
				
				this.galleryView._onTrigger('EVT_GALLERY_SHOW_IMG', _.bind(function (srcId) {
					$(this.viewId).find('.galleryModal .modal-body').empty().html('<img src=' + srcId +' class="img-responsive">');
				}, this));				
				
				this.galleryView.INIT(evt.currentTarget.id);				
				this._trigger('EVT_GALLERY', true);
			}, this));
			
			
		}
		
	});
	
});
	