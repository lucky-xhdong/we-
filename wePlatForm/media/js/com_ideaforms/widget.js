var IdeaWidget;
IdeaWidget = (function() {
	var defaultConfig = {
		url : "/ideatree-dev/api_new/index.php"
	};
	function IdeaWidget(config) {
		this.opts = $.extend({}, defaultConfig, config);

	}

	/**
	 * widget= { id : null/int, data : {} }
	 * 
	 * @param {Object}
	 *            widgetType
	 * @param {Object}
	 *            widget
	 */
	IdeaWidget.prototype.saveWidget = function(module, widget,callback) {
		var request = {
			module : module,
			action : "save",
			// widgetType : widgetType,
			params : widget
		};
		this.callAPI(request,callback);
	};

	IdeaWidget.prototype.loadWidget = function(module, loadParams, callback) {
		console.log(loadParams);
		var request = {
			module : module,
			action : "load",
			params : loadParams
		};
		this.callAPI(request, callback);
	};

	IdeaWidget.prototype.editWidget = function(widgetType, widget) {

	};

	IdeaWidget.prototype.getWidget = function(widgetId, callback) {
		var request = {
			action : "get",
			widgetId : widgetId
		};
	};

	IdeaWidget.prototype.deleteWidget = function(widgetId) {
		var request = {
			action : "delete",
			widgetId : widgetId
		};
	};

	IdeaWidget.prototype.submit = function(widgetId) {
		var request = {
			action : "delete",
			widgetId : widgetId
		};
	};

	IdeaWidget.prototype.generateAjaxRequest = function(requestData) {
		console.log("Data", requestData);
		var request = {
			method : "post",
			dataType : "json",
			url : this.opts.url,
			data : requestData
		};
		return request;
	};

	IdeaWidget.prototype.callAPI = function(request, callback) {
		var ajaxRequest = this.generateAjaxRequest(request);
		ajaxRequest.success = function(response) {
			console.log("Request finish");
			if (typeof (callback) == "function") {
				console.log(response);
				callback(response);
			}
		};
		console.log(ajaxRequest);
		$.ajax(ajaxRequest);
	};

	return IdeaWidget;
})();
