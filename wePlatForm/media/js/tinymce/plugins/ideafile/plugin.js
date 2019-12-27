/**
 * plugin.js
 * 
 * Copyright, Moxiecode Systems AB Released under LGPL License.
 * 
 * License: http://www.tinymce.com/license Contributing:
 * http://www.tinymce.com/contributing
 */

/* global tinymce:true */

tinymce.PluginManager
    .add(
        'ideafile',
        function(editor) {
          var folderId = null;
          var url = editor.settings.uploadUrl;

          function s4() {
            return Math.floor((1 + Math.random()) * 0x10000).toString(16)
                .substring(1);
          }

          function guid() {
            return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-'
                + s4() + s4() + s4();
          }

          function generateId() {
            id = s4();
            return id;
            // TODO 需要修改为更复杂的算法,防止重复
          }

          editor.on("change", function(e) {
            var importedImgs = $(editor.dom.doc).find("img").each(
                function(index, item) {
                  if (!$(item).data("media-id")) {
                    $(item).attr("data-media-id", guid());
                  }
                });
          });

          function generatePlaceHolder() {
            var $placeHolder = $("Uploading");
            return $placeHolder;
          }

          function uploadToPolyv(accept, callback) {
            var $percentage = null;
            var $file = $("<input name=\"file\" type=\"file\" accept=\""
                + accept + "\"/>");
            $file.fileupload(
                    {
                      formData : {
                      },
                      url : url,
                      dataType : 'json',
                      start : function() {					
                        var id = generateId();
                        console.log("start upload");
                        // TODO place the place holder
                        editor.insertContent('<div id="' + id + '"></div>');
                        $percentage = $(editor.dom.doc).find("#" + id);
                      },
                      done : function(e, data) {
                        data = data.result;
                          var coverImg = baseUrl +'media/images/video.jpg';
                          var html = "<div class=\"div_p_r video_box mceNonEditable\">"
                              + "<a href=\"#\" data-media-id=\""
                              + guid()
                              + "\" data-action=\"view-video\" class=\"display_block\" data-vid=\""
                              + data.Url
                              + "\" >"
                              + "<img class=\"img_video\" src=\""
                              + coverImg + "\"/>" + "</a>" + "</div><p></p>";
                          console.log(html);
                          $(html).insertAfter($percentage);
                           $percentage.remove();
                      },
                      progressall : function(e, data) {
                        console.log(1);
                        var progress = parseInt(data.loaded / data.total * 100,
                            10);
                        console.log(progress);
                        $percentage.html(progress + '%');
                      }
                    }).prop('disabled', !$.support.fileInput).parent()
                .addClass($.support.fileInput ? undefined : 'disabled');
            $file.click();
          }
		 function filealert(){
		 	bootbox.dialog({
				  message: "图片大小不能超过4M，请将图片处理后再上传！",
				  title: "上传提示",
				  buttons: {
					cancel: {
					  label: "取消",
					  className: "btn-danger",
					  callback: function() {
					  }
					},
					confirm: {
					  label: "确定",
					  className: "btn-success",
					  callback: function() {
					  }
					}
				  }
				});
		 }
          function uploadFileImage(accept, callback) {
            var $file = $("<input type='file' id='fileuploade'/>");
            $file.attr("accept", accept);
            var $percentage = null;
            console.log("folderId", folderId);
            $file.fileupload({
              url : url,
              dataType : 'json',
              paramName : 'file',
              formData : {
                module : "file.fileApi",
                action : "upload",
                paramEncode : "json",
                params : JSON.stringify({
                  submitted : editor.settings.activitySubmited,
                  folderId : folderId
                })
              },
			  autoUpload:false,
			  add: function (e, data) {
				 var  browserCfg = {};
				var ua = window.navigator.userAgent;
				if (ua.indexOf("MSIE")>=1){
				   var filesize =  $file[0].fileSize;	
				}else{
				   var filesize =  $file[0].files[0].size;
				}
				  var maxsize = 4*1024*1024;
				  if(filesize >maxsize){
				  	filealert();
				  }else{
	        		data.submit();
				  }
	   		 },
              start : function(data) {
                var id = generateId();
                console.log("start upload");
                // TODO place the place holder
                editor.insertContent('<div id="' + id + '"></div>');
                $percentage = $(editor.dom.doc).find("#" + id);
              },
              done : function(e, data) {
                console.log("Done");
                $percentage.html("Finish");
                var result = data.result;
                if (result.ReturnCode == 200) {
                  folderId = data.result.folder;
                  editor.settings.fileReferId = folderId;
                  console.log("Callback");
                  console.log(data.result);
                  console.log(editor.settings.fileReferId);
                  callback(data.result, $percentage);
                } else {
                  // TODO show error message?
                }
                $percentage.remove();
                // TODO replace the place holder with
                // the image
              },
              progressall : function(e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $percentage.html(progress + '%');
              }
            }).prop('disabled', !$.support.fileInput).parent().addClass(
                $.support.fileInput ? undefined : 'disabled');
            $file.click();
          }
		  
		   function uploadFile(accept, callback) {
            var $file = $("<input type='file' id='fileuploade'/>");
            $file.attr("accept", accept);
            var $percentage = null;
            $file.fileupload({
              url : url,
              dataType : 'json',
              paramName : 'file',
              formData : {
                module : "file.fileApi",
                action : "upload",
                paramEncode : "json",
                params : JSON.stringify({
                  submitted : editor.settings.activitySubmited,
                  folderId : folderId
                })
              },
              start : function(data) {
                var id = generateId();
                console.log("start upload");
                // TODO place the place holder
                editor.insertContent('<div id="' + id + '"></div>');
                $percentage = $(editor.dom.doc).find("#" + id);
              },
              done : function(e, data) {
                console.log("Done");
                $percentage.html("Finish");
                var result = data.result;
                if (result.ReturnCode == 200) {
                  folderId = data.result.folder;
                  editor.settings.fileReferId = folderId;
                  console.log("Callback");
                  console.log(data.result);
                  console.log(editor.settings.fileReferId);
                  callback(data.result, $percentage);
                } else {
                  // TODO show error message?
                }
                $percentage.remove();
                // TODO replace the place holder with
                // the image
              },
              progressall : function(e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $percentage.html(progress + '%');
              }
            }).prop('disabled', !$.support.fileInput).parent().addClass(
                $.support.fileInput ? undefined : 'disabled');
            $file.click();
          }

          function insertPdf() {
            // TODO 客户端没有，需要去掉
            uploadFile("application/pdf", function(result, $percentage) {
              var file = result.file;
              var fileId = file.id;
              var data = {
                "data-media-id" : guid(),
                "data-file-id" : fileId,
                "class" : "pdf-viewer",
                "src" : "about:blank"
              };
              var iframe = editor.dom.createHTML('iframe', data);
              // editor.insertContent(iframe);
              // TODO change iframe to place holder here
              $(iframe).insertAfter($percentage);
            });
          }

          function insertImage() {
            uploadFileImage("image/*", function(result, $percentage) {


              var fileId = result.id;
			
              var data = {
                "data-media-id" : guid(),
                "data-file-id" : fileId,
                "src" :result.Url
              };
              var img = editor.dom.createHTML('img', data);

              $(img).insertAfter($percentage);
            });
          }

          function insertVideo() {
            // TODO 如果是web，还需要支持flv
              var accept = "video/*";

                   accept += ",flv-application/octet-stream,video/x-flv,video/mp4,video/x-m4v,video/*";// ,video/x-flv,flv-application/octet-stream";


              console.log(accept);
            uploadToPolyv(accept, function(result, $percentage) {
              // var file = result.file;
              // folderId = result.folder;
              // var fileId = file.id;
              //
              // var $img = $("<audio />");
              // $img.data("media-id", guid());
              // $img.data("file-id", fileId);
              // $img.attr("src", editor.settings.filePrefix
              // + "?id=" + fileId);
              // $img.insertAfter($percentage);
            });

          }
          function insertAudio() {
            uploadFile("audio/*", function(result, $percentage) {
              //var file = result.file;
              //var fileId = file.id;
              var url = result.Url;
              var $audio = $("<audio />");
              $audio.data("media-id", guid());
              $audio.data("file-id", result.folderId);
              $audio.attr("controls", "controls");
            //  $audio.attr("src", editor.settings.filePrefix + "?id=" + fileId);
              $audio.attr("src", url);
              $audio.insertAfter($percentage);
            });

          }
          function viewable(type) {
            var supported = [ "pdf", "html", "doc", "docx", "ppt", "pptx",
                "xls", "xlsx", "jpg", "jpeg", "png", "bmp", "gif" ];
            var i = 0;
            while (supported[i]) {
              console.log(supported[i]);
              if (supported[i++] == type) {
                return true;
              }
            }
            return false;
          }

          function insertAttachment() {
            uploadFile(
                "*/*",
                function(result, $percentage) {
                  var file = result.file;
                  var fileId = result.id;

                  function getAttachmentBlock(fileInfo) {
                    var html = "<div class=\"mceNonEditable attachment-box\" data-attachment-id=\""
                        + fileId
                        + "\" data-mce-contenteditable=\"false\">"
                        + "<span class=\"attachment-icon attachment-icon-"
                        + fileInfo.mime.replace("/", "-").replace(".", "-")
                        + "\">附件图标</span>"
                        + "<div class=\"attachment-right\">"
                        + "<div><span class=\"attachment-info\">"
                        + fileInfo.filename
                        + "</span></div>"
                        + "<div><span class=\"clear\"></span>"
                        + "<span><a data-action=\"download\" href=\""
                        + result.DownLoadUrl
                        + "?action=download\" class=\"attachment-link btn-link\">下载</a>";
                    console.log(fileInfo);
                    //if (viewable(fileInfo.ext_name)) {
                    //  html += "&nbsp;&nbsp;&nbsp;<a href=\""
                    //      + editor.settings.filePrefix
                    //      + "?action=preview&id="
                    //      + fileId
                    //      + "\" data-action=\"view\" data-viewer=\""
                    //      + fileInfo.ext_name
                    //      + "\" class=\"attachment-link btn-link\" target=\"_blank\">查看</a>";
                    //}
                    html += "</span></div>" + "</div>" + "</div><br/><p></p>";
                    return html;
                  }

                  // var editor = tinymce.activeEditor;
                  var html = getAttachmentBlock(result);
                  // editor.insertContent(html);
                  $(html).insertAfter($percentage);

                  // TODO 替换成附件样式
                  // var $img = $("<img />");
                  // $img.data("media-id", guid());
                  // $img.data("file-id", fileId);
                  // $img.attr("src",
                  // editor.settings.filePrefix
                  // + "?id=" + fileId);
                  // console.log("Insert Now");
                  // 
                });
          }

            function insertScratch() {
                uploadFile("*.sb",
                    function(result, $percentage) {
                        var file = result.file;
                        var fileId = file.id;
                        function getAttachmentBlock(fileInfo) {
                              var html = '<object data-attachment-id ="'+fileId+'" width="500" height="600" data="'+baseUrl+'Scratch.swf" type="application/x-shockwave-flash">'
                                   + '<param value="always" name="allowScriptAccess">'
                                   + '<param value="true" name="allowFullScreen">'
                                   + '<param value="project='+editor.settings.filePrefix+'?id='+fileId+'" name="flashvars">'
                                   + '</object>';
                            return html;
                        }

                        // var editor = tinymce.activeEditor;
                        var html = getAttachmentBlock(result.file);
                        // editor.insertContent(html);
                        $(html).insertAfter($percentage);

                        // TODO 替换成附件样式
                        // var $img = $("<img />");
                        // $img.data("media-id", guid());
                        // $img.data("file-id", fileId);
                        // $img.attr("src",
                        // editor.settings.filePrefix
                        // + "?id=" + fileId);
                        // console.log("Insert Now");
                        //
                    });
            }

          editor.addButton('ideaimage', {
            tooltip : 'Insert Image',
            icon : 'image',
            onClick : insertImage
          });
          editor.addButton('ideapdf', {
            tooltip : 'Insert PDF',
            icon : 'pdf',
            onClick : insertPdf
          });
          editor.addButton('ideavideo', {
            tooltip : 'Insert Video',
            icon : 'video',
            onClick : insertVideo
          });
          editor.addButton('ideaaudio', {
            tooltip : 'Insert Audio',
            icon : 'audio',
            onClick : insertAudio
          });
            editor.addButton('ideascratch', {
                tooltip : 'Insert scratch',
                text : 'scratch',
                onClick : insertScratch
            });

            editor.addButton('ideaattachment', {
              tooltip : 'Insert Attachment',
              icon : 'attachment',
              onClick : insertAttachment
            });


        });