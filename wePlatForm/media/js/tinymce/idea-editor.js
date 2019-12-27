
var isIOS = false;
function isIOS(){
    return false;
}
function progressBar(percent, $element) {
  var progressBarWidth = percent * $element.width() / 100;
  $element.find('div').animate({
    width : progressBarWidth
  }, 500).html(percent + "%&nbsp;");
}

(function addXhrProgressEvent($) {
  var originalXhr = $.ajaxSettings.xhr;
  $
      .ajaxSetup({
        xhr : function() {
          var req = originalXhr(), that = this;
          if (req) {
            if (typeof req.addEventListener == "function"
                && that.progress !== undefined) {
              req.addEventListener("progress", function(evt) {
                that.progress(evt);
              }, false);
            }
            if (typeof req.upload == "object"
                && that.progressUpload !== undefined) {
              req.upload.addEventListener("progress", function(evt) {
                that.progressUpload(evt);
              }, false);
            }
          }
          return req;
        }
      });
})(jQuery);

var $progressbar = $("<div class=\"overlay\"><div id=\"progressBar\" class=\"default\"></div></div>");
$progressbar.appendTo(document.body);

var showProgress = function(percent) {
  var $modalDiv = $("#modal-div");
  if ($modalDiv.length == 0) {
    $(document.body).append("<div id=\"modal-div\"></div>");
    $modalDiv = $("#modal-div");
  }
  $modalDiv.css({
    position : "absolute",
    top : 0,
    left : 0,
    height : "100%",
    background : "gray",
    width : "100%",
    "z-index" : 30000
  });
  $modalDiv.show();
  $modalDiv.append("<span>" + percent + "%</span><br/>");
};
var IdeatreeEditor = (function() {
  var urlPrefix = "";
  // 生成唯一的id给每个多媒体文件,如图片,视频等
  function generateUUID() {
    return (new Date()).valueOf();
  }

  /**
   * @param acceptedFileTypes
   *          支持的文件类型
   * @param callback(url)
   *          完成文件处理后的回调函数
   * @param useBase64
   *          是否返回data-uri，true时候不调用upload，直接读取base64的内容内容
   */
  function chooseAndUploadFile(acceptedFileTypes, callback, useBase64) {
    var $fileInput = $("<input type=\"file\" />");
    $fileInput.attr("accept", acceptedFileTypes.join());
    $fileInput.change(function(event) {
      uploadFile(this.files[0], callback);
    });
    $fileInput.click();
  }

  function uploadFile(file, callback, returnWholeResponse) {
    var formData = new FormData();
    formData.append("file", file);
    formData.append("action", "UploadFile");
    if (self.remoteFolder) {
      formData.append("folder", self.remoteFolder);
    }
    // TODO judge the file size
    // TODO mask the view
    $progressbar.show();
    $.ajax({
      url : urlPrefix + "/api/index.php",
      method : "post",
      data : formData,
      contentType : false,
      processData : false,
      dataType : "json",
      success : function(response) {
        // $("#modal-div").hide();
        $progressbar.hide();
        var url = response.Url;
        var folder = response.Folder;
        if (!url || url == "") {
          // TODO alert some message here
        } else {
          self.remoteFolder = folder;
          if (callback) {
            if (returnWholeResponse)
              url = response;
            callback(url);
          }
        }
      },
      xhr : function() {
        myXhr = $.ajaxSettings.xhr();
        if (myXhr.upload) {
          myXhr.upload.addEventListener('progress', function(e) {
            if (e.lengthComputable) {
              $progressbar.html("Uploading:"
                  + parseInt((e.loaded / e.total * 100), 10) + "%");
              // progressBar(e.loaded / e.total,
              // $('#progressBar'));
            }
          }, false);
        }
        return myXhr;
      }
    });

  }

  var coverUrl = "";

  function chooseAndReadFile(acceptedFileTypes, callback) {
    // TODO 是否只需要支持文本类型?
    var $fileInput = $("<input type=\"file\" />");
    $fileInput.attr("accept", acceptedFileTypes.join());
    $fileInput.change(function(event) {
      var file = this.files[0];
      // TODO judge the file size
      // TODO mask the view
      if (file.type == "application/pdf") {
        uploadFile(file, function(url) {
          var editor = tinymce.activeEditor;
          var dom = editor.dom;
          var data = {
            "data-media-id" : generateUUID(),
            "data-file-url" : url,
            "class" : "pdf-viewer",
            src : "about:blank"
          };
          var pdfViewer = dom.createHTML('iframe', data);
          editor.insertContent(pdfViewer);
        });
      } else if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
          var contents = e.target.result;
          callback(contents);
        };
        reader.readAsText(file);
      } else {
        callback(false);
      }
    });
    $fileInput.click();
  }

  IdeatreeEditor.prototype = {
    // 插入文本文件，包括text，html等
    insertTextFile : function(file) {
      function insertHtml(htmlContent) {
        var editor = tinymce.activeEditor;
        editor.insertContent(htmlContent);
      }

      var acceptedTypes = [ "application/pdf", "text/html", "text/plain" ];

      if (window.File && window.FileReader && window.FileList && window.Blob) {
        chooseAndReadFile(acceptedTypes, function(contents) {
          insertHtml(contents);
        });
        return;
      }

      chooseAndUploadFile(acceptedTypes, function(url) {
        // TODO implement later
        // TODO 直接返回html内容，还是返回url后再次读取？
      });
    },
    insertLinkAtt : function(url, cover, size) {
      function getAttachmentBlock(url) {
        var cls = "attachment-box";
        if (size == "big") {
          cls += "-big";
        }
        var html = "<div class=\"mceNonEditable attachment-box\">"
            + "<span class=\"link-attachment\"><img style=\"width:30px;height:30px;\" src=\""
            + cover + "\"></span>" + "<div class=\"attachment-right\">"
            + "<div><span class=\"attachment-info\">" + url + "</span></div>"
            + "<div><span class=\"clear\"></span>" + "<span><a href=\"" + url
            + " \" class=\"attachment-link btn-link\">打开</a>";
        html += "</span></div>" + "</div>" + "</div><p></p>";
        return html;
      }

      var editor = tinymce.activeEditor;
      var html = getAttachmentBlock(url, cover);
      editor.insertContent(html);
    },
    uploadAndInsertAttachment : function(file, callback) {
      if (!file) {
        return;
      } else {
        function viewable(type) {
          var supported = [ "application/pdf", "text/html" ];
          var i = 0;
          while (supported[i++]) {
            if (supported[i] == type) {
              return true;
            }
          }
          return false;
        }

        function getAttachmentBlock(fileInfo) {
          var html = "<div class=\"mceNonEditable attachment-box\">"
              + "<span class=\"attachment-icon attachment-icon-"
              + fileInfo.type.replace("/", "-").replace(".", "-")
              + "\">filetype</span>" + "<div class=\"attachment-right\">"
              + "<div><span class=\"attachment-info\">" + fileInfo.FileName
              + "</span></div>" + "<div><span class=\"clear\"></span>"
              + "<span><a data-action=\"download\" target=\"_blank\" href=\""
              + fileInfo.Url + " \" class=\"attachment-link btn-link\">下载</a>";
          if (viewable(fileInfo.type)) {
            html += "<a href=\"" + fileInfo.Url
                + " \" data-action=\"view\" data-viewer=\"" + fileInfo.type
                + "\" class=\"attachment-link btn-link\">查看</a>";
          }
          html += "</span></div>" + "</div>" + "</div><p></p>";
          return html;
        }

        uploadFile(file, function(fileinfo) {
          var editor = tinymce.activeEditor;
          var html = getAttachmentBlock(fileinfo);
          editor.insertContent(html);
          if (callback) {
            callback();
          }
        }, true);
      }

    },
    uploadAndInsertFile : function(file, callback) {
      if (file.type == "application/pdf") {
        uploadFile(file, function(url) {
          var editor = tinymce.activeEditor;
          var dom = editor.dom;
          var data = {
            "data-media-id" : generateUUID(),
            "data-file-url" : url,
            "class" : "pdf-viewer",
            src : "about:blank"
          };
          var pdfViewer = dom.createHTML('iframe', data);
          if (callback) {
            callback();
          }
          editor.insertContent(pdfViewer);
        });
      } else if (file) {
        var _this = this;
        var reader = new FileReader();
        reader.onload = function(e) {
          var contents = e.target.result;
          _this.insertHtml(contents);
          if (callback) {
            callback();
          }
        };
        reader.readAsText(file);
      }
    },
    // 插入图片文件
    insertImageFile : function(file) {
      var acceptedTypes = [ "image/jpeg", "image/gif", "image/png" ];
      chooseAndUploadFile(acceptedTypes, function(url) {
        var editor = tinymce.activeEditor;
        var dom = editor.dom;
        var data = {
          width : 480,
          "data-media-id" : generateUUID(),
          src : url
        };
        editor.insertContent(dom.createHTML('img', data));
      });
    },
    // 选择并插入音频文件
    insertAudioFile : function(file) {
      var _this = this;
      if (isIOS()) {
        alertify.set({
          labels : {
            ok : "确定",
            cancel : "取消"
          }
        });
        alertify
            .confirm(
                "由于设备限制，我们需要通过摄像的方式来录音",
                function(e, str) {
                  if (e) {
                    var url = "http://v.polyv.net/uc/services/rest?method=uploadfile";
                    var JSONRPC = {
                      writetoken : 'bEcbFGGo3jJi4XJ-s3ZiSdsEm18pvPTy',
                      describ : '',
                      tag : '',
                      'Filedata.filename' : "test.mp4"
                    };
                    var $file = $("<input name=\"Filedata\" type=\"file\" accept=\"video/*\"/>");
                    $file.fileupload(
                        {
                          formData : {
                            JSONRPC : JSON.stringify(JSONRPC)
                          },
                          url : url,
                          dataType : 'json',
                          done : function(e, data) {
                            $progressbar.hide();
                            data = data.result;
                            if (data.error > 0) {
                              alert("上传失败!");
                            } else {
                              data = data.data[0];
                              _this.insertAudio(data.mp4);
                            }
                          },
                          progressall : function(e, data) {
                            var progress = parseInt(data.loaded / data.total
                                * 100, 10);
                            $progressbar.html("Uploading:" + progress + "%");
                          },
                          start : function() {
                            $progressbar.show();
                          }
                        }).prop('disabled', !$.support.fileInput).parent()
                        .addClass($.support.fileInput ? undefined : 'disabled');
                    $file.click();
                  } else {

                  }
                });
      } else {
        var acceptedTypes = [ "audio/3gpp", "audio/ac3", "audio/mpeg",
            "audio/mpeg", "audio/mp4", "audio/ogg" ];
        chooseAndUploadFile(acceptedTypes, this.insertAudio);
      }
    },
    // 选择并插入视频文件
    insertVideoFile : function(file) {
      var acceptedTypes = [ "video/3gpp", "video/mpeg", "video/mp4",
          "video/quicktime" ];
      chooseAndUploadFile(acceptedTypes, this.insertVideo);
    },

    getImageUrls : function() {
      var $imgs = $(tinymce.activeEditor.dom.doc).find("img");
      var urls = [];
      if ($imgs.length > 0) {
        $imgs.each(function(index, img) {
          var url = $(img).attr("src");
          urls.push(url);
        });
      }
      return urls;
    },
    // 供IOS，android调用，由于token等原因，这里不方便直接upload，由native code
    // upload后直接使用url或者text
    // 将html插入到文档对应位置
    insertHtml : function(html, cssFile, jsFile) {
      var editor = tinymce.activeEditor;
      editor.insertContent(html);
    },
    // 根据url直接插入图片
    insertImage : function(url, description) {
      var data = {
        style : "max-width:480px",
        "data-media-id" : generateUUID(),
        src : url
      };
      tinymce.activeEditor.insertContent(tinymce.activeEditor.dom.createHTML(
          'img', data));
    },
    // 根据url直接插入音频
    insertAudio : function(url, description) {
      var editor = tinymce.activeEditor;
      var data = {
        "data-media-id" : generateUUID(),
        src : url,
        controls : true
      };
      editor.insertContent(editor.dom.createHTML('audio', data));
    },
    // 根据url直接插入视频
    // insertVideo : function(url) {
    // // if(urls.constructor != Array )
    // // {
    // // urls = [urls];
    // // }
    // var editor = tinymce.activeEditor;
    // var html = "<video width=\"400\" height=\"300\" src=\"" + url
    // + "\" data-media-id=\"" + generateUUID()
    // + "\" controls></vedio>";
    // editor.insertContent(html);
    // },
    insertVideo : function(coverImg, vid) {
      // <div class="" ><img src=""/></div>
      var editor = tinymce.activeEditor;
      var html = "<div class=\"div_p_r video_box mceNonEditable\">"
          + "<a href=\"#\" data-media-id=\"" + generateUUID()
          + "\" data-action=\"view-video\" class=\"display_block\" data-vid=\""
          + vid + "\" >" + "<img class=\"img_video\" src=\"" + coverImg
          + "\"/>"// + "<span
          // class=\"video_play\">jjj</span>"
          + "</a>" + "</div><p></p>";

      editor.insertContent(html);
    },
    insertPdf : function(url) {
      var editor = tinymce.activeEditor;
      var dom = editor.dom;
      var data = {
        "data-media-id" : generateUUID(),
        "data-file-url" : url,
        "class" : "pdf-viewer",
        src : "about:blank"
      };
      var pdfViewer = dom.createHTML('iframe', data);
      editor.insertContent(pdfViewer);
    },

    insertLink : function(url, description) {
      $.post("media/com_ideacontent/get-html.php", {
        url : url
      }, function(result) {
        var editor = tinymce.activeEditor;
        editor.insertContent(result);
      });
    },

    // 加载html文件到编辑器中
    loadHtml : function(html, cssFiles, jsFiles) {

    },
    // 清空内容
    clear : function() {
      self.editor.setContent("");
    },

    // 根据需要，可能需要增加js引用
    addJsFile : function() {

    },
    // 根据需要，可能需要增加css引用
    addCssFile : function() {

    },
    // 直接创建图片内容
    createContentFromImage : function(url) {

    },
    // 获取idea content, 返回json object
    // 由于可能需要显示dialog选择封面图片，所以需要callback回调传回内容
    handleContent : function(callback) {
      var contentObj = {
        contentId : "",
        coverUrl : "",
        content : ""
      };
      if (self.contentId) {
        contentObj.id = self.contentId;
      }

      var editor = tinymce.activeEditor;
      var content = editor.getContent();

      contentObj.coverUrl = coverUrl;
      contentObj.content = content;
      callback(contentObj);
      return;
      if (!coverUrl || coverUrl == "") {
        // TODO show dialog for user to pick a cover image
        var $imgs = $(tinymce.activeEditor.dom.doc).find("img");
        var coverSelectionUI = "";
        var now = new Date();
        var tempRadioName = "id" + now.getTime();
        if ($imgs.length > 1) {
          $imgs
              .each(function(index, img) {
                var url = $(img).attr("src");
                coverSelectionUI += "<img style=\"width:100px;height:100px;\" src=\""
                    + url
                    + "\"/><input type=\"radio\" name=\""
                    + tempRadioName
                    + "\" value=\"" + url + "\" />";
              });

          var tmpl = [
              // tabindex is required for focus
              '<div class="modal hide fade" tabindex="-1">',
              '<div class="modal-header">',
              '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>',
              '<h3>Modal header</h3>',
              '</div>',
              '<div class="modal-body">',
              coverSelectionUI,
              '</div>',
              '<div class="modal-footer">',
              '<a href="#" data-dismiss="modal" class="btn">Close</a>',
              '<a href="#" data-action="choose" class="btn btn-primary">Choose</a>',
              '</div>', '</div>' ].join('');
          $modal = $(tmpl);
          $modal.find("a").click(
              function() {
                var action = $(this).data("action");
                if (action == "choose") {
                  coverUrl = $modal.find(
                      'input[name=' + tempRadioName + ']:checked').val();
                  $modal.modal("hide");
                  contentObj.coverUrl = coverUrl;
                  contentObj.content = content;
                  callback(contentObj);
                }
              });
          $modal.modal();
        } else {
          contentObj.coverUrl = $imgs.attr("src");
          contentObj.content = content;
          callback(contentObj);
        }
      } else {
        contentObj.coverUrl = coverUrl;
        contentObj.content = content;
        callback(contentObj);
      }
    },
    // 设置content id，用于保存后再保存
    setContentId : function(id) {
      self.contentId = id;
    }
  };

  // constructor
  function IdeatreeEditor(config) {
    // Init settings

    var defaultSettings = {
      renderTo : "",
      editable : true,
      pdf : false,
      showToolbar : true,
      showMenu : true,
      plugins : [],
      showToolbar : false,
      showStatusBar : false,
      showMenu : false,
      // uploadUrl : "/editor/upload.php",
      downloadUrl : ""
    };
    if (config) {
      self.settings = $.extend(defaultSettings, config);
    }
    urlPrefix = self.settings.urlPrefix;
    // Init tinyMCE editor
    initEditor(self.settings.renderTo);
  }

  function applyListFormat(editor, listName, styleValue) {
    var list, dom = editor.dom, sel = editor.selection;

    // Check for existing list element
    list = dom.getParent(sel.getNode(), 'ol,ul');

    // Switch/add list type if needed
    if (!list || list.nodeName != listName) {
      editor.execCommand(listName == "UL" ? 'InsertUnorderedList'
          : 'InsertOrderedList');
    }

    // Set style
    // styleValue = styleValue === false ? lastStyles[listName] :
    // styleValue;
    // lastStyles[listName] = styleValue;
    //
    // list = dom.getParent(sel.getNode(), 'ol,ul');
    // if (list) {
    // dom.setStyle(list, 'listStyleType', styleValue);
    // list.removeAttribute('data-mce-style');
    // }

    editor.focus();
  }

  function initEditor(elementId) {
    var editorConfig = {
      relative_urls : false,
      urlPrefix : self.settings.urlPrefix,
      commentUrl : self.settings.commentUrl,
      // uploadUrl : self.settings.uploadUrl,
      pid : self.settings.pid,
      statusbar : false,
      skin : "idea",
      menubar : false,
      language : "zh_CN",
      theme : "idea_theme",
      toolbar : "fontselect | fontsizeselect | forecolor bold italic underline | indent outdent idea_alignment | bullist numlist | ideaimage ideaaudio ideavideo ideaattachment | idea_checkbox | table link ",
      // fixed_toolbar_container : self.settings.toolbar,
      content_css : baseUrl + "/media/css/editor.css",
      selector : elementId,
      localUploadUrl : baseUrl + "/api/index.php",
      // inline : true,
      fixed_toolbar_container : "#editor_toolbar",
      uploadUrl : baseUrl + "index.php/api_new/uploadFile/",
      filePrefix : baseUrl + "api_new/file.php"
    };
    var plugins = [ "noneditable", "ideafile", "image", "link", "autolink",
        "textcolor", "idea_alignment", "table", "idea_checkbox", "media" ];
    editorConfig.setup = function(ed) {
      // ed.on("submit", function(e) {
      // console.log("ReferId:",ed.settings.fileReferId);
      // console.log(e);
      // e.preventDefault();
      // });
      ed.on("click", function(e) {
        console.log("Editor Click Event", e);
        var toElement = null;
        if (typeof (e.toElement) == "undefined") {
          toElement = e.target;
        } else {
          toElement = e.toElement;
        }
        if (toElement.tagName == "A"
            && $(toElement).parent().parent().hasClass(
                "mceNonEditable attachment-box")) {
          var url = toElement.href;

          if ($(this).data("action") == "view") {
            e.preventDefault();
            var viwer = $(this).data("file-viewer");
            if (viwer == "pdf") {

            } else if (viwer == "video") {

            }
          } else if ($(this).data("action") == "download") {
          }
        } else if (toElement.tagName == "IMG"
            && $(toElement).parent().parent().hasClass("mceNonEditable")) {
          var action = $(toElement).parent().data("action");
          if (action == "view-video") {
            // TODO view video here
          }
        }
      });
    };

    editorConfig.plugins = plugins.join(" ");
    console.log(editorConfig);
    tinymce.init(editorConfig);
  }

  return IdeatreeEditor;
})();
