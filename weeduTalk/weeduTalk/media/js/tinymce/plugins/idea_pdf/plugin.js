/**
 * plugin.js
 * 
 * Copyright, Moxiecode Systems AB Released under LGPL License.
 * 
 * License: http://www.tinymce.com/license Contributing:
 * http://www.tinymce.com/contributing
 */

/* global tinymce:true */

tinymce.PluginManager.add('idea_pdf', function(editor) {
			var DomUtils = tinymce.ui.DomUtils;
			var pdfViewer = tinyMCE.baseURL + "/plugins/idea_pdf/pdf-viewer/viewer.html";

			editor.on("LoadContent", function() {
//				return;
						var $pdfViewers = $(editor.bodyElement)
								.find("iframe[class='pdf-viewer']");
						$pdfViewers.each(function(index, iframe) {
									$(iframe).css({
												height : 600,
												width : "100%"
											});
//									var pdfUrl = $(iframe).data("file-url");
									iframe.src = pdfViewer;
								});
					});

		});