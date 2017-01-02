define([
	'jquery',
	'underscore'
], function ($, _) {
	
	var AppViewObjects = function () {
		
		return {
			
			_viewId: '#contentRegion',
			
			_triggerEvents: [],
			
			_triggerListeners: [],
		
			_show: function (response) {
				var $elem = $(this.viewId);
				$elem.html(this.template(response));//.fadeIn('slow');
				return $elem;
			},
			
			_INIT: function () {
				console.log('calling APP VIEW');
			},		
			
			_getData: function (options, callback) {
				console.log('getData  called for ');
				document.APP.makeCall(options, callback);
			},
			
			_trigger: function (evtName, params) {						
				_.each(this._triggerEvents, _.bind(function (triggerObj, indexId) {
					if (triggerObj.evtName === evtName && triggerObj.evtObj === this) {
						triggerObj.callback(params);
					}					
				}, this));
			},
			
			_onTrigger: function (evtName, callback) {
				var evtObj = {
					'evtName': evtName,
					'evtObj': this,
					'callback': callback
				}
				
				if (this._triggerEvents.indexOf(evtObj) === -1) {
					this._triggerEvents.push(evtObj);
				}				
				
			}
		}
		
	};
	
	var AppView = {};
	
	AppView.extend = function (obj) {
		var appView = new AppViewObjects();
		for (var i in obj) {
		  if (obj.hasOwnProperty(i)) {
			appView[i] = obj[i];
		  }
		}   
		return function () {
			return appView;
		};		
	}
	
	return AppView;
	
});
	