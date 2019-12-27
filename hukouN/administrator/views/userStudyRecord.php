<?php $this->load->view('topheader'); ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/course.css">
<script src="<?= base_url() ?>media/js/jquery.tmpl.js"></script>
<!--body start-->
<?php
$controller = $this->uri->segment(1);
$action = $this->uri->segment(2);
?>
<section class="org-wrapper org-courseoutline-wrapper">
    <?php $this->load->view('aside'); ?>
    <main class="main-carema-list">
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="<?= anchorurl('users/index') ?>">用户列表</a>
                </li>
                <li>
                    <a class="active" href="javascript:;"><?= $user->user_name ?>的学习记录</a>
                </li>
            </ul>
        </div>
        <div class="setrow setting-right-bg bg-color-fff">
            <div class="org-courseoutline-main">

                <div class="org-courseoutline-first">
                    <ul id="course-outline-first-dir" class="courseoutline-firstdir">
                    </ul>
                </div>
                <div class="clear-20"></div>
                <div class="courseoutline-addnewdir" id="course-outline-add-new-dir">
                </div>
                <div class="courseoutline-activitylists">
                    <ul id="course-outline-activity-lists">

                    </ul>
                </div>
                <div id="course-outline-new-activity" class="courseoutline-newactivity">
                </div>
            </div>
        </div>
    </main>
</section>
<!--body end-->


<!--一级目录模板-->
<div id="course-outline-first-dirtmpl" type="text/x-jquery-tmpl" style="display:none">
    <li>
        <div class="courseoutline-first-dirlist" data-id="${id}">
            <div class="org-outline-caption">
                <a class="course-outline-collapsed" href="javascript:;">${sign}.${name}</a>
            </div>
        </div>
        <ul id="coursedownunits${id}" class="courseoutline-seconddir">

        </ul>
    </li>
</div>
<!--二级目录模板-->
<div id="course-outline-second-dirtmpl" type="text/x-jquery-tmpl" style="display:none">
    <li>
        <div class="courseoutline-second-dirlist" data-id="${id}">
            <div class="org-outline-caption">
                <a href="javascript:;" title="${name}">${psign}.${sign}&nbsp;${name}</a>
            </div>
        </div>
        {{if contents.length}}
        <ul>
            {{each(j,content) contents}}
                <li>
                    <div class="org-outline-subcaption">
                        <a href="javascript:;" title="${title}">${title}</a>
                        {{if time}}
                             <span data-before="${time}">${time}</span>
                        {{else}}

                        {{/if}}
                    </div>
                </li>
            {{/each}}
        </ul>
        {{/if}}
    </li>
</div>

<!--添加一级目录模板-->
<div id="course-outline-add-new-dirtmpl" type="text/x-jquery-tmpl" style="display:none">
    <div class="dis-table course-outline-add-new-dir-panel">
        <div class="dis-table-cell ver-align-top course-outline-dir-icon">
            <a href="javascript:;">
                <i class="list-icon-1abc9c"></i>
            </a>
        </div>
        <div class="dis-table-cell ver-align-top course-outline-dir-sign">
            <a href="javascript:;" style="color: #4b4b4b">
                {{if second}}
                ${first}.${second}
                {{else}}
                ${first}.
                {{/if}}
            </a>
        </div>
        <div class="dis-table-cell course-outline-new-dir-options">
            <form action="">
                <div class="input-group">
                    <span class="input-group-addon course-name">栏目名称：</span>
                    <input type="text" placeholder="栏目名称" value="${name}" name="name"
                           class="form-control input-course-name color-f9c600" id="input-course-name">
                    <input type="text" style="display: none">
                </div>
                <!--                <div class="input-group">-->
                <!--                    <span class="input-group-addon teaching-aims">教学目标：</span>-->
                <!--                    <textarea placeholder="教学目标" name="teaching_goals" class="form-control input-teaching-aims color-f9c600"-->
                <!--                              id="input-teaching-aims">${teaching_goals}</textarea>-->
                <!--                </div>-->
                <!--                <div class="clear-20"></div>-->
                <div class="btn-course-group">
                    <button class="btn btn-success float-left fangcaodi-btn-style" type="button" id="save-first-dir">
                        确定
                    </button>
                    <button class="btn btn-default float-left" type="button" id="cancel-add-dir">取消</button>
                </div>
            </form>
        </div>
    </div>
    <!--<div class="btn-save-course-outline-add-new-dir">
        <button class="btn btn-success">保存</button>
    </div>-->
</div>

<!--发活动模板-->

<div id="course-outline-new-activitytmpl" type="text/x-jquery-tmpl" style="display:none">

</div>
<div id="course-outline-new-storytmpl" type="text/x-jquery-tmpl" style="display:none">
    <li>
        <div class="dis-table course-outline-activity-item">
            <div class="dis-table-cell ver-align-middle">
                <a href="javascript:;">
                    <i class="fa fa-circle"></i>
                    <span>
                      {{if package == 'ideas'}}
                       (作品互评)
                      {{/if}}
                      {{if package == 'ideasubmits'}}
                       (作业提交)
                      {{/if}}
                      {{if package == 'ideaforms'}}
                       (表单提交)
                      {{/if}}
                       {{if package == 'ideacomments'}}
                       (内容推送)
                      {{/if}}
                        {{if package == 'ideagrades'}}
                       (互评活动)
                      {{/if}}
                        {{if package == 'itopics'}}
                       (话题讨论)
                      {{/if}}
                      {{if package == 'votes'}}
                       (投票活动)
                      {{/if}}
                      ${title}
                    </span>
                </a>
            </div>
            <div class="dis-table-cell ver-align-middle">
                <a href="javascript:;" class="activitymoveto" data-id="${id}" data-outlineid="${outlineid}">移动到...</a>
                <a href="javascript:;" class="movestory" data-id="${id}" data-outlineid="${outlineid}"><i
                        class="fa fa-sort"></i></a>
                <a href="javascript:;" class="deletestory" data-id="${id}" data-outlineid="${outlineid}"><i
                        class="fa fa-times"></i></a>
            </div>
        </div>
    </li>
</div>
<!--知识点标签-->
<div id="knowledge-point-labels-paneltmpl" type="text/x-jquery-tmpl" style="display:none">
    <a href="javascript:;">${name}<em>|</em><i class="fa fa-times delete-tags" data-id=${id}></i></a>
</div>

<script>
    var courseid = <?=$courseid?>;
    var courselevel = '';
    var units = new Array;
    var firstcourse = 0;
    var editid = 0;

    function removeframe() {
        $("#story-iframe").attr('src', 'about:blank');

        $("#story-iframe").removeClass("activity-iframe-with-height");
    }
    function registerShowActivityType() {
//	$(".activity-group").hover(function(){
//		$(this).children(".courseoutline-activitytype").slideDown();
//
//	},function(){
//		$(this).children(".courseoutline-activitytype").slideUp();
//	})

        $(".activity-group").undelegate(".ideastory", "click").delegate(".ideastory", "click", function () {
            $("#course-outline-add-new-dir").empty();
            $("#course-outline-activity-lists").empty();
//            document.getElementById('story-iframe').spin()
            $("#story-iframe").attr('src', $(this).data('url'));
            $("#story-iframe").addClass("activity-iframe-with-height");
            $("#story-iframe").load(function () {
//                document.getElementById('story-iframe').unspin();

            });

            //$("#story-iframe").reload();
        });

        $(".activity-group").undelegate(".courseoutline-newactivity", "click").delegate(".courseoutline-newactivity", "click", function () {
            var url = $(this).data('url');
            window.location.href = url;
            //$("#story-iframe").reload();
        });

    }
    $(document).ready(function (e) {
//        $("#course-outline-first-dir").orgcoursetree();

        function get_dir_sign(first, second, upid) {
            courselevel = {'first': first, 'second': second, 'upid': upid};
        }

        //添加一级/二级目录
        $(".org-courseoutline-main").undelegate(".add-dir", "click").delegate(".add-dir", "click", function () {
            console.log(111);
            editid = 0;
            removeframe();
            if ($(this).data('level') == 0) {
                get_dir_sign(firstcourse, 0, 0)
            } else {
                get_dir_sign($(this).data('sign'), units[$(this).data('id')] + 1, $(this).data('id'))
            }
            $("#course-outline-add-new-dir").empty();
            $("#course-outline-add-new-dirtmpl").tmpl(courselevel).appendTo("#course-outline-add-new-dir");
            $("#input-course-name").val('');
            $("#input-teaching-aims").val('');
            $("#course-outline-activity-lists").hide();
            requestSaveFirstDir();
        });

        //编辑一级/二级目录
        $(".org-courseoutline-main").undelegate(".editcourse", "click").delegate(".editcourse", "click", function () {
            editid = $(this).data('id');
            var psign = $(this).data('psign');
            var sign = $(this).data('sign');
            var upid = $(this).data('upid');
            $.ajax({
                url: '<?=anchorurl('course/getsyllabus')?>/' + editid,
                type: "post",
                dataType: "json",
                beforeSend: function () {
//                    document.getElementById('course-outline-first-dir').spin();
                },
                success: function (data) {
                    if (psign == 0) {
                        data.first = sign;
                        data.upid = 0;
                        data.second = 0;
                    } else {
                        data.first = psign;
                        data.upid = psign;
                        data.second = sign;
                    }
                    console.log(data);
                    $("#course-outline-add-new-dir").empty();
                    $("#course-outline-add-new-dirtmpl").tmpl(data).appendTo("#course-outline-add-new-dir");
                    requestSaveFirstDir();
//                    document.getElementById('course-outline-first-dir').unspin();
                }
            });
        });

        //上移一级/二级目录
        $(".org-courseoutline-main").undelegate(".moveup", "click").delegate(".moveup", "click", function () {
            //TODO
            $.ajax({
                url: '',
                type: "post",
                dataType: "json",
                data: {},
                success: function (data) {
                }
            });
        });

        //下移一级/二级目录
        $(".org-courseoutline-main").undelegate(".movedown", "click").delegate(".movedown", "click", function () {
            $.ajax({
                url: '',
                type: "post",
                dataType: "json",
                data: {},
                success: function (data) {
                }
            });
        });
        function geroutlinestory(id) {
            $.ajax({
                url: '',
                type: "post",
                dataType: "json",
                async: false,
                data: {
                    'action': "getcourseoutlinestory",
                    'id': id
                },
                beforeSend: function () {
//                    document.getElementById('course-outline-first-dir').spin();
                },
                success: function (data) {
                    $("#course-outline-activity-lists").empty();
                    $("#course-outline-new-storytmpl").tmpl(data).appendTo("#course-outline-activity-lists");
//                    document.getElementById('course-outline-first-dir').unspin();
                }
            });
        }

        // 获取大纲活动列表
        $(".org-courseoutline-main").undelegate(".course-open", "click").delegate(".course-open", "click", function () {
//            removeframe();
//            $("#course-outline-activity-lists").show();
//            $("#course-outline-add-new-dir").empty();
//            $(".course-outline-first-dir-list").removeClass('active');
//            $(".course-outline-second-dir-list").removeClass('active');
//            $(this).addClass('active');
//            var id = $(this).data('id');
//            geroutlinestory(id);
//            $("#course-outline-activity-lists").sortable({
//                handle: '.movestory',
//                scroll: true,
//                scrollSpeed: 100,
//                axis: 'y',
//                opacity: 0.6,//设置拖动时候的透明度
//                revert: true,//缓冲效果
//                cursor: 'move',//拖动的时候鼠标样式
//                update: function () {
//                    var sortvalue = new Array;
//                    $(this).find("li .movestory").each(function (index, element) {
//                        sortvalue[index] = {id: $(element).data('id'), sort: parseInt(index) + 1};
//                    });
//                    console.log(sortvalue);
//                    $.ajax({
//                        url: '',
//                        type: "post",
//                        dataType: "json",
//                        data: {
//                            'action': "contentsort",
//                            'requestvalue': JSON.stringify(sortvalue),
//                        },
//                        beforeSend: function () {
//                            document.getElementById('course-outline-first-dir').spin();
//                        },
//                        success: function (data) {
//                            geroutlinestory(id);
//                            document.getElementById('course-outline-first-dir').unspin();
//                        }
//                    });
//                }
//            });

        });
        // 删除某个活动
        $("#course-outline-activity-lists").undelegate(".deletestory", "click").delegate(".deletestory", "click", function () {

            var id = $(this).data('id');
            var outlineid = $(this).data('outlineid');
            bootbox.dialog({
                message: "确定要删除活动吗?",
                title: "删除活动",
                buttons: {
                    cancel: {
                        label: "取消",
                        className: "btn-danger",
                        callback: function () {
                        }
                    },
                    confirm: {
                        label: "确定",
                        className: "btn-success",
                        callback: function () {
                            $.ajax({
                                url: '',
                                type: "post",
                                dataType: "json",
                                data: {
                                    'action': "deletestory",
                                    'id': id,
                                    'outlineid': outlineid
                                },
                                beforeSend: function () {
//                                    document.getElementById('course-outline-first-dir').spin();
                                },
                                success: function (data) {
                                    $("#course-outline-activity-lists").empty();
                                    $("#course-outline-new-storytmpl").tmpl(data).appendTo("#course-outline-activity-lists");
//                                    document.getElementById('course-outline-first-dir').unspin();
                                }
                            });
                        }
                    }
                }
            });
        })
        //删除一级/二级目录
        $(".org-courseoutline-main").undelegate(".deletecourse", "click").delegate(".deletecourse", "click", function () {
            var id = $(this).data('id');
            bootbox.dialog({
                message: "确定要删除目录吗?",
                title: "删除目录",
                buttons: {
                    cancel: {
                        label: "取消",
                        className: "btn-danger",
                        callback: function () {
                        }
                    },
                    confirm: {
                        label: "确定",
                        className: "btn-success",
                        callback: function () {
                            $.ajax({
                                url: '<?=anchorurl('course/deletecourseoutline')?>/' + id,
                                type: "post",
                                dataType: "json",
                                data: {
                                    'id': id,
                                    'courseid': courseid
                                },
                                beforeSend: function () {
//                                    document.getElementById('course-outline-first-dir').spin();
                                },
                                success: function (data) {
                                    getcourseoutline();
                                    $("#course-outline-add-new-dir").empty();
//                                    document.getElementById('course-outline-first-dir').unspin();
                                }
                            });
                        }
                    }
                }
            });
        });
        // 获取当前课程大纲
        function getcourseoutline() {
            $.ajax({
                url: '<?=anchorurl('course/getcourseoutlineforUserId')?>/' + courseid+'/<?=$user->id?>',
                type: "get",
                dataType: "json",
                success: function (data) {
                    units.length = 0;
                    $("#course-outline-second-dir").empty();
                    $("#course-outline-first-dir").empty();
                    $(data).each(function (index, element) {
                        $("#course-outline-first-dirtmpl").tmpl(element).appendTo("#course-outline-first-dir");
                        $("#course-outline-second-dirtmpl").tmpl(element.units).appendTo("#coursedownunits" + element.id);
                        units[element.id] = $(element.units).length;
                        registerShowActivityType();
                    })
                    firstcourse = $(data).length + 1;
                    get_dir_sign(firstcourse, 0, 0);
                }
            });
        }

        getcourseoutline();
        function requestSaveFirstDir() {
            $(".course-outline-new-dir-options").undelegate("#save-first-dir", "click").delegate("#save-first-dir", "click", function () {
                if (editid == 0) {
                    if (courselevel.second == 0) {
                        var level = 1;
                        var sign = courselevel.first;
                    } else {
                        var level = 2;
                        var sign = courselevel.second;
                    }
                    var upid = courselevel.upid;
                    $.ajax({
                        url: '<?=anchorurl('course/savecourseoutline')?>/' + courseid,
                        type: "post",
                        dataType: "json",
                        data: {
                            'name': $("#input-course-name").val(),
                            'level': level,
                            'sign': sign,
                            'upid': upid,
                            'courseid': courseid
                        },
                        beforeSend: function () {
//                            document.getElementById('course-outline-first-dir').spin();
                        },
                        success: function (data) {
                            getcourseoutline();
                            $("#course-outline-add-new-dir").empty();
//                            document.getElementById('course-outline-first-dir').unspin();
                        }
                    });
                } else {
                    $.ajax({
                        url: '<?=anchorurl('course/editcourse')?>/' + courseid,
                        type: "post",
                        dataType: "json",
                        data: {
                            'name': $("#input-course-name").val(),
                            'id': editid
                        },
                        beforeSend: function () {
//                            document.getElementById('course-outline-first-dir').spin();
                        },
                        success: function (data) {
                            getcourseoutline();
                            $("#course-outline-add-new-dir").empty();
//                            document.getElementById('course-outline-first-dir').unspin();
                        }
                    });
                }

            })
        }

        $("#course-outline-add-new-dir").undelegate("#cancel-add-dir", "click").delegate("#cancel-add-dir", "click", function () {
            $("#course-outline-add-new-dir").empty();
        })

        $(".org-courseoutline-main").undelegate("#enter-to-add-label", "keypress").delegate("#enter-to-add-label", "keypress", function (e) {
            var key = e.which;
            var _this = $(this);
            if (key == 13) {
                if (!$(this).val().replace(/(^\s*)|(\s*$)/g, '')) {
                    $(this).css({"border-color": "#f00"});
                } else {
                    $.ajax({
                        url: '',
                        type: "post",
                        dataType: "json",
                        data: {
                            'action': "savetags",
                            'tagsname': $(this).val(),
                            'courseid': courseid
                        },
                        beforeSend: function () {
//                            document.getElementById('enter-to-add-label').spin();
                        },
                        success: function (data) {
                            _this.css({"border-color": "#ccc"});
                            $("#knowledge-point-labels-panel").empty();
                            $("#knowledge-point-labels-paneltmpl").tmpl(data).appendTo("#knowledge-point-labels-panel");
//                            document.getElementById('enter-to-add-label').unspin();
                            $("#enter-to-add-label").val('');
                        }
                    });
                }
            }
        })
        $(".org-courseoutline-main").undelegate(".delete-tags", "click").delegate(".delete-tags", "click", function (e) {
            var id = $(this).data("id");
            $.ajax({
                url: '',
                type: "post",
                dataType: "json",
                data: {
                    'action': "deletecoursetags",
                    'courseid': courseid,
                    'tagid': id
                },
                beforeSend: function () {
//                    document.getElementById('knowledge-point-labels-panel').spin();
                },
                success: function (data) {
                    $("#knowledge-point-labels-panel").empty();
                    $("#knowledge-point-labels-paneltmpl").tmpl(data).appendTo("#knowledge-point-labels-panel");
//                    document.getElementById('knowledge-point-labels-panel').unspin();
                }
            });
        })

    });
</script>
