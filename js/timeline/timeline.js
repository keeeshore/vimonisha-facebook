define([
	'jquery',
	'underscore',
	'app/utils/AppView',
	'text!./timeline.html'
], function ($, _, AppView, template) {
	
	return AppView.extend({
		
		template: _.template(template),
		
		viewId: '#timelineRegion',
		
		totalCount: 0,
		
		currentIndex: 0,
		
		timer: null,
		
		prevElem: null,
		
		query: {
			'fields': 'posts{picture,description,name,comments,message,created_time,full_picture}'
		},		
		
		INIT: function () {
			this._getData(this.query, _.bind(function (response){
				if (response) {
					this.totalCount = response.posts.data.length;
					this._show(response);
					
					//show the first item instantly
					this.prevElem = $(this.viewId).find('.timelinePhotoList li')[this.currentIndex];
					$(this.prevElem).show();//.removeClass('hidden');
					
					this.startAnim();
				}
				
			}, this));
		},
		
		startAnim: function () {

			setInterval(_.bind(function () {
				var currentIndex = this.currentIndex;
				//console.log('currentInde = ' + currentIndex);
				if (this.prevElem) {
					$(this.prevElem).hide()//.addClass('hidden');
				}
				if (currentIndex < this.totalCount) {
					this.prevElem = $(this.viewId).find('.timelinePhotoList li')[currentIndex];
					$(this.prevElem).show();//.removeClass('hidden');
				} else {
					this.currentIndex = -1;
				}				
				this.currentIndex = this.currentIndex + 1;
				
			}, this), 5000);
			
		}
		
	});
	
});
	