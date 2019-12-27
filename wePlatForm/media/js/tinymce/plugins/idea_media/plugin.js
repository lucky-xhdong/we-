tinymce.PluginManager.add('idea_media', function(editor) {
    var DomUtils = tinymce.ui.DomUtils;
    var each = tinymce.util.Tools.each;

    var IMAGE_FILES = "image/*";
    var AUDIO_FILES = "audio/*";
    var VIDEO_FILES = "video/mp4,video/x-m4v,video/*";

    var REMOTE_SERVER = 0;
    var LOCAL_SERVER = 1;

    function generateUUID() {
        return (new Date()).valueOf();
    }

    function selectAndUploadFile($accept, callback, server) {

        var $file = $('<input type="file">');
        $file.attr("accept", $accept);
        var paramName = "file";
        // $file.on("change", function() {
        // });
        var url, JSONRPC, formData;
        if (server == REMOTE_SERVER) {
            paramName = "Filedata";
            url = "http://v.polyv.net/uc/services/rest?method=uploadfile";
            var JSONRPC = {
                writetoken : 'bEcbFGGo3jJi4XJ-s3ZiSdsEm18pvPTy',
                describ : '',
                tag : '',
                'Filedata.filename' : "test.mp4"
            };
            formData = {
                JSONRPC : JSON.stringify(JSONRPC)
            };
        } else {
            url = editor.settings.localUploadUrl;
            formData = {
                action : "UploadFile"
            };
        }

        $file.fileupload({
            formData : formData,
            url : url,
            paramName : paramName,
            dataType : 'json',
            done : function(e, data) {
                console.log(data.result);
                data = data.result;

                if (server == REMOTE_SERVER) {
                    if (data.error > 0) {
                        alert("上传失败!");
                    } else {
                        // console.log("InsertVideoNow");
                        data = data.data[0];
                        if ( typeof (callback) == "function") {
                            callback(data.vid, data.first_image);
                        }
                        // console.log(data.mp4);
                        // //editor.insertVideo(data.mp4);
                        // editor.insertVideo(data.first_image, data.vid);
                    }
                    //TODO dismiss progress bar
                    $progressbar.hide();
                } else {
                    if (data.Result != "True") {
                        alert("上传失败!");
                    } else {
                        var fileUrl = data.Url;
                        if ( typeof (callback) == "function") {
                            callback(fileUrl);
                        }
                    }

                }
            },
            progressall : function(e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                if (progress >= 100) {
                    //TODO shwo waiting message
                } else {
                    //TODO show percentage
                }
            },
            start : function() {
                //TODO show the progress bar
            }
        }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
        $file.click();
    }


    editor.addButton('idea_image', {
        icon : "image",
        fixedWidth : true,
        onclick : function() {
            selectAndUploadFile(IMAGE_FILES, function(url) {
                var data = {
                    width : 480,
                    "data-media-id" : generateUUID(),
                    src : url
                };
                editor.insertContent(editor.dom.createHTML('img', data));
            }, LOCAL_SERVER);
        }
    });

    editor.addButton('idea_audio', {
        icon : "audio",
        fixedWidth : true,
        onclick : function() {
            var acceptedFile = AUDIO_FILES;
            if (isIOS()) {
                acceptedFile = "video/*";
            } else {
                selectAndUploadFile(acceptedFile, function(url) {
                    var data = {
                        "data-media-id" : generateUUID(),
                        src : url,
                        controls : true
                    };
                    editor.insertContent(editor.dom.createHTML('audio', data));
                }, LOCAL_SERVER);
            }
        }
    });

    editor.addButton('idea_video', {
        icon : "video",
        fixedWidth : true,
        onclick : function() {
            var acceptedFile = VIDEO_FILES;
            //TODO 台式机上允许选择FLV文件
            // if (isIOS()) {
            // acceptedFile += "video/*";
            // }
            selectAndUploadFile(acceptedFile, function(vid, coverImg) {
                var html = "<div class=\"div_p_r video_box mceNonEditable\">" + "<a href=\"#\" data-media-id=\"" + generateUUID();
                html += "\" data-action=\"view-video\" class=\"display_block\" data-vid=\"" + vid + "\" >" + "<img class=\"img_video\" src=\"" + coverImg + "\"/>"// +                                                                             "<span
                + "</a>" + "</div><p></p>";
                editor.insertContent(html);
            }, REMOTE_SERVER);
        }
    });

});
