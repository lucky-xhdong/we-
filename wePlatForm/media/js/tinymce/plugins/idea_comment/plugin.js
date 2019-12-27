/**
 * plugin.js
 * 
 * Copyright, Moxiecode Systems AB Released under LGPL License.
 * 
 * License: http://www.tinymce.com/license Contributing:
 * http://www.tinymce.com/contributing
 */

/* global tinymce:true */

tinymce.PluginManager.add('idea_comment', function(editor) {
	var DomUtils = tinymce.ui.DomUtils;

	var commentDialog = new CommentDialog();
	var currentMenuId;
	var menuShow = false;
	var pmenu = new PMenu();
	document.body.appendChild(DomUtils
			.createFragment("<iframe id='overlay'></iframe>"));
	document.body
			.appendChild(DomUtils
					.createFragment("<div class='img-comment-toolbar'><a class=\"\""
							+ "href=\"#\" title=\"Comment Image\" data-action=\"comment\">"
							+ "<span class=\"img-comment-icon\">Comment Image</span></a></div>"));
	var $modal = $("#overlay");
	var $imgToolbar = $(".img-comment-toolbar");
	$imgToolbar.find("a").click(function(e) {
				e.preventDefault();
				commentMedia();
			});

	editor.on("LoadContent", function() {
		console.log(editor.bodyElement);
		var docBody = editor.dom.doc.body;
		var $imgs = $(editor.bodyElement).find("img");
		var $videos = $(editor.bodyElement).find("video");
		$imgs.on("mouseover", function(e) {
					editor.currentSelectedItem = e.toElement;
					$imgToolbar.css({
								top : $(editor.currentSelectedItem).offset().top,
								left : $(editor.currentSelectedItem).offset().left
										+ $(editor.currentSelectedItem).width()
										- $imgToolbar.width()
							});
					$imgToolbar.show();
				});
		$imgs.on("mouseout", function(e) {
					if (e.toElement != editor.currentSelectedItem
							&& $imgToolbar.find(e.toElement).length <= 0) {
						$imgToolbar.hide();
						editor.currentSelectedItem = null;
					}
				});
		$imgs.each(function(index, img) {
					var ratio = 1;
					var baseOffset = $(img).offset();
					console.log(baseOffset);
					var media_id = $(img).data("media-id");
					console.log(media_id);
					$.ajax({
								url : editor.settings.urlPrefix
										+ "/api/index.php",
								method : "post",
								dataType : "json",
								data : {
									Action : "getComments",
									storyid : editor.settings.pid,
									mediaid : media_id
								},
								success : function(response) {
									console.log("imgs:");
									console.log(response);
									var $tempAnchor = null;
									function addAnchor(iconCls, position) {
										if ($tempAnchor == null) {
											$tempAnchor = $("<span>Anchor</span>");
											$(document.body)
													.append($tempAnchor);
											$tempAnchor.hide();
										}
										$tempAnchor.attr("class", "icon "
														+ iconCls);
										$tempAnchor.css({
													position : "absolute",
													top : position.top
															- $tempAnchor
																	.height()
															/ 2,
													left : position.left
															- $tempAnchor
																	.width()
															/ 2
												});
										$tempAnchor.show();
									}

									if (response)
										$(response).each(
												function(index, comment) {
													var meta = jQuery
															.parseJSON(comment.meta_ideatree)
													var commentType = meta.commentType;
													var position = meta.position;
													position = {
														top : position.top
																* ratio
																+ baseOffset.top,
														left : position.left
																* ratio
																+ baseOffset.left
													}
													addAnchor(
															"icon-"
																	+ commentType,
															position);
													switch (commentType) {
														case "text" :
															$tempAnchor
																	.attr(
																			"title",
																			comment.body);
															$tempAnchor
																	.tooltip();
															break;
														case "smile" :
														case "cry" :
														case "question" :
															break;
														case "audio" :
															break;
													}
													$tempAnchor = null;
												})
								}
							});
				});

		$videos.on("mouseover", function(e) {
					editor.currentSelectedItem = e.toElement;
					$imgToolbar.css({
								top : $(editor.currentSelectedItem).offset().top,
								left : $(editor.currentSelectedItem).offset().left
										+ $(editor.currentSelectedItem).width()
										- $imgToolbar.width()
							});
					$imgToolbar.show();
				});
		$videos.on("mouseout", function(e) {
					if (e.toElement != editor.currentSelectedItem
							&& $imgToolbar.find(e.toElement).length <= 0) {
						$imgToolbar.hide();
						editor.currentSelectedItem = null;
					}
				});
		$videos.each(function(index, video) {
					var ratio = 1;
					var baseOffset = $(video).offset();
					console.log(baseOffset);
					var media_id = $(video).data("media-id");
					console.log(media_id);
					$.ajax({
								url : editor.settings.urlPrefix
										+ "/api/index.php",
								method : "post",
								dataType : "json",
								data : {
									Action : "getComments",
									storyid : editor.settings.pid,
									mediaid : media_id
								},
								success : function(response) {
										console.log("video:");
									console.log(response);
									var $tempAnchor = null;
									function addAnchor(iconCls, position) {
										if ($tempAnchor == null) {
											$tempAnchor = $("<span>Anchor</span>");
											$(document.body)
													.append($tempAnchor);
											$tempAnchor.hide();
										}
										$tempAnchor.attr("class", "icon "
														+ iconCls);
										$tempAnchor.css({
													position : "absolute",
													top : position.top
															- $tempAnchor
																	.height()
															/ 2,
													left : position.left
															- $tempAnchor
																	.width()
															/ 2
												});
										$tempAnchor.show();
									}

									if (response)
										$(response).each(
												function(index, comment) {
													var meta = jQuery
															.parseJSON(comment.meta_ideatree)
													var commentType = meta.commentType;
													var position = meta.position;
													position = {
														top : position.top
																* ratio
																+ baseOffset.top,
														left : position.left
																* ratio
																+ baseOffset.left
													}
													addAnchor(
															"icon-"
																	+ commentType,
															position);
													switch (commentType) {
														case "text" :
															$tempAnchor
																	.attr(
																			"title",
																			comment.body);
															$tempAnchor
																	.tooltip();
															break;
														case "smile" :
														case "cry" :
														case "question" :
															break;
														case "audio" :
															break;
													}
													$tempAnchor = null;
												})
								}
							});
				});
	});

	function commentMedia() {
		if (editor.currentSelectedItem.nodeName == "IMG") {
			console.log("img");
			showImageCommentDialog();
		} else if (editor.currentSelectedItem.nodeName == "VIDEO") {
			console.log("video");
			showVideoCommentDialog();
		}
	}

	function showImageCommentDialog() {
		editor.windowManager.open({
					title : 'Image Comment',
					file : tinyMCE.baseURL
							+ '/plugins/idea_comment/image_dialog.php?editor='
							+ editor.id,
					filetype : 'all',
					classes : 'filemanager',
					width : 960,
					height : 550,
					inline : 1
				});
	}
	function showVideoCommentDialog() {
		editor.windowManager.open({
					title : 'Image Comment',
					file : tinyMCE.baseURL
							+ '/plugins/idea_comment/video_dialog.php?editor='
							+ editor.id,
					filetype : 'all',
					classes : 'filemanager',
					width : 960,
					height : 550,
					inline : 1
				});
	}

	commentDialog.callback = function() {

	}

	pmenu.callback = function(type) {
		switch (type) {
			case "text" :
				console.log("Text on text");
				pmenu.hide();
				commentDialog.show(pmenu.getCenter());
				break;
			case "audio" :
				break;
			case "smile" :
				break;
			case "cry" :
				break;
			case "question" :
				break;
			default :
				break;
		}
	}

	// 监控mouseup事件，根据不同情况判断是否显示菜单，显示什么菜单
	editor.on("mouseup", function(e) {
				var selection = editor.selection;
				var curSelNode = selection.getNode();
				console.log("Mouse UP:");
				console.log(e);
				var center = {
					top : e.pageY,
					left : e.pageX
				};
				e.preventDefault();
				if (!editor.settings.commentable) {
					// 如果设置为不允许comment，不显示任何菜单，直接退出
					return;
				}
				if (selection.getContent({
							format : "text"
						}).trim() != "") {
					pmenu.show(center);
					console.log("text comment now");
				} else {
					pmenu.hide();
				}
			});

});