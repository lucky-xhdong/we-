<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head lang="en">
  <title>  </title>
<meta charset="UTF-8" >
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="stylesheet" href="<?= base_url() ?>media/css/less/unlock-lesson.css?a=<?=rand(1,99999999999)?>"/>
 <style>
     .limittip {  position: fixed;  text-align: center;  height: 64px;  white-space: nowrap;  padding: 0 20px;  top: 50%;  margin-left: -50px;  margin-top: -32px;  border-radius: 4px;  z-index: 10000;  }
     .limittip:before {  content: '';  position: absolute;  width: 100%;  height: 100%;  border-radius: 4px;  left: 0;  top: 0;  background-color: #000;  opacity: .8;  filter: alpha(opacity=80);  z-index: -1;  }
     .limittip span {  color: #fff;  font-size: 18px;  line-height: 64px;  }
 </style
 </head>
 <body>
    <section class="unlock-lesson-container">
        <!--成员列表-左 start-->
        <div class="ulc-members">
            <div class="handle-group" data-before="请先选择成员">
                <div class="checkbox-group">
                    <label class="label-checkall">
                        <input type="checkbox" class="checkbox" id="alluserSelected">
                        <span class="txt">全选</span>
                    </label>
                </div>
                <div class="search-group">
                    <input type="text" id="key" class="form-control" placeholder="请输入姓名查找">
                    <button class="btn-search" id="searchButton">搜索</button>
                </div>
            </div>
            <div class="ulc-members_list">
                <ul id="userList">
                </ul>
            </div>
        </div>
        <!--成员列表-左 end-->
        <!--课程列表-右 start-->
        <div class="ulc-lessons">
            <!--下拉列表 start-->
            <div class="form-group">
                <form action="">
                    <div class="select-group">
                        <select name="courses" id="courses" class="select">
                        </select>
                    </div>
                    <div class="select-group">
                        <select name="levels" id="levels" class="select">
                        </select>
                    </div>
                </form>
            </div>
            <!--下拉列表 end-->
            <!--课程列表 start-->
            <div class="ulc-lessons__list">
                <div class="ulc-lessons__list_left">
                    <ul id="unitList">
                    </ul>
                </div>
                <div class="ulc-lessons__list_right">
                    <ul id="lessonList">
                    </ul>
                    <div class="checkall">
                        <label><input type="checkbox" id="alllessonSelected" name="alllessonSelected">全选</label>
                    </div>
                    <!--按钮 start-->
                    <div class="btn-group">
                        <a href="javascript:;" class="btn btn-unlock" id="unchainlesson">解锁</a>
                        <a href="javascript:;" class="btn btn-lock" id="chainlesson">锁定</a>
                    </div>
                    <!--按钮 end-->
                </div>
            </div>
            <!--课程列表 end-->
            
        </div>
        <!--课程列表-右 end-->
    </section>
    <div id="setHomeTimeTemplate" type="text/x-jquery-tmpl" style="display:none">
        {{each(j,user) users}}
        <li data-after="${name}" data-id="${id}">
            <a href="javascript:;" class="link-avatar">
                <img src="${avatar_url}" alt="" class="avatar">
            </a>
        </li>
        {{/each}}
    </div>

    <div id="unitTimeTemplate" type="text/x-jquery-tmpl" style="display:none">
        {{each(j,unit) units}}
            <li data-id="${id}" class="{{if j == 0}} active {{/if}}">
                <a href="javascript:;" class="txt">${name}</a>
<!--                <input type="checkbox" class="checkbox">-->
            </li>
        {{/each}}
    </div>

    <div id="LessonTimeTemplate" type="text/x-jquery-tmpl" style="display:none">
        {{each(j,lesson) lessons}}
        <li data-id="${id}">
            <span class="txt">${name}</span>
            <input type="checkbox" name="lessons[]" value="${id}" class="lesson">
        </li>
        {{/each}}
    </div>
    <script type="text/javascript" src="<?=base_url()?>media/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>media/js/jquery.showLoading.js"></script>
    <link  href="<?=base_url()?>media/css/showloading.css" rel="stylesheet"/>
    <script src="<?=base_url()?>media/js/jquery.tmpl.js"></script>

    <script type="text/javascript">
        var sort = "studytime";
        var class_id = '<?=$class_id?>';
        var course_id = 0;
        var unit_id = 0;
        var is_class = false;
        var level_id = 0;
        var publishing_house_courses_id = 0;
        var courseData = null;
        function retisterLimitTip(str){
            var timer;
            var html = '';
            html += '<div class="limittip"><span>';
            html += str;
            html += '</span></div>';
            clearTimeout(timer);
            if($(".limittip").length == 0) {
                $(document.body).append(html);
                var width = $(".limittip").outerWidth();
                var left = ($(window).width() - $(".limittip").outerWidth()) / 2;
                $(".limittip").css({
                    width: width + 'px',
                    marginLeft: left + 'px'
                })
            }
            timer = setTimeout(function(){
                $(".limittip").remove();
            }, 1000)
        }
        $(function(){
            $("#menuList li").click(function(){
                $(this).addClass("active").siblings().removeClass("active");
                sort = $(this).data("type");
                getUserRankList();
            });
            function getUserRankList(){
                $.ajax({
                    type: "POST",
                    async: false,
                    url: '<?=anchorurl('components/users/getStudentRankingListJson/'.$class_id)?>',
                    data: {
                        sort:sort,
                        key: $("#key").val(),
                    },
                    dataType:'json',
                    beforeSend:function(){
                        $("#userList").showLoading();
                    },
                    success: function (data) {
                        $("#userList").hideLoading();
                        $("#userList").empty();
                        $("#setHomeTimeTemplate").tmpl({users:data,type:sort}).appendTo('#userList');
                    }
                });
            }

            getUserRankList();
            $("#searchButton").click(function(){
                getUserRankList();
            });
            function getClassCourseList(){
                $("#course-list-span").empty();
                $("#unit-list-span").empty();
                is_class = true;
                if(class_id != 0){
                    $.ajax({
                        type: "GET",
                        async: false,
                        url: '<?=anchorurl('components/users/getClassCourseList')?>/'+class_id,
                        dataType:'json',
                        success: function (data) {
                            var coursestring = "";
                            var unitstring = "";
                            var levelstring = "";
                            courseData = data;
                            $(data.courseDetail).each(function(index,course){
                                if(index == 0){
                                    course_id = course.id;
                                    coursestring += '<option value="'+course.id+'">'+course.name+'</option>';
                                    publishing_house_courses_id = course.publishing_house_courses_id;
                                    $(course.levels).each(function(index3,level){
                                        if(index3 == 0){
                                            level_id = level.id;
                                        }
                                        levelstring += '<option value="'+level.id+'">'+level.name+'</option>';
                                    });

                                    $("#unitList").empty();
                                    $("#unitTimeTemplate").tmpl({units:course.units}).appendTo('#unitList');

                                    $(course.units).each(function(index2,unit){
                                        if(index2 == 0){
                                            unit_id = unit.id;
                                        }
                                    });
                                }else{
                                    coursestring += '<option value="'+course.id+'">'+course.name+'</option>';
                                }
                            });
                            $("#courses").html(coursestring);
                            $("#levels").html(levelstring);
                            getLessonList();
                        }
                    });
                }
            }
            getClassCourseList();

            $("#courses").change(function(){
                var id= $(this).val();
                var levelstring = "";
                $(courseData.courseDetail).each(function(index,course){
                    if(course.id == id){
                        course_id = course.id;
                        publishing_house_courses_id = course.publishing_house_courses_id;
                        $(course.levels).each(function(index3,level){
                            if(index3 == 0){
                                level_id = level.id;
                            }
                            levelstring += '<option value="'+level.id+'">'+level.name+'</option>';
                        });

                        $(course.units).each(function(index2,unit){
                            if(index2 == 0){
                                unit_id = unit.id;
                            }
                        });
                        $("#unitList").empty();
                        $("#unitTimeTemplate").tmpl({units:course.units}).appendTo('#unitList');
                        $("#levels").html(levelstring);
                    }
                });
                getLessonList();

            });


            $("#levels").change(function(){
                level_id =  $(this).val();
                $.ajax({
                    type: "GET",
                    async: false,
                    url: '<?=anchorurl('components/users/getLevelCourseUnitList')?>/'+publishing_house_courses_id+'/'+level_id,
                    dataType:'json',
                    success: function (data) {
                        $("#unitList").empty();
                        $("#unitTimeTemplate").tmpl({units:data.units}).appendTo('#unitList');
                        $(data.units).each(function(index2,unit){
                            if(index2 == 0){
                                unit_id = unit.id;
                            }
                        });
                        getLessonList();
                    }
                });

            });

            function getLessonList(){
                $.ajax({
                    type: "POST",
                    async: false,
                    url: '<?=anchorurl('components/users/getUnitLessonList')?>/'+unit_id,
                    data: {
                        sort:sort,
                        key: $("#key").val(),
                    },
                    dataType:'json',
                    beforeSend:function(){
                        $("#lessonList").showLoading();
                    },
                    success: function (data) {
                        $("#lessonList").hideLoading();
                        $("#lessonList").empty();
                        $("#LessonTimeTemplate").tmpl({lessons:data.lessons,type:sort}).appendTo('#lessonList');
                    }
                });
            }

            $("body #unitList").undelegate('li', 'click').delegate('li', 'click', function () {
                unit_id = $(this).data("id");
                $(this).addClass("active").siblings().removeClass("active");
                getLessonList();
            });

            $("body #userList").undelegate('li', 'click').delegate('li', 'click', function () {
                if(!$(this).hasClass('active')) {
                    $(this).addClass("active");
                }else{
                    $(this).removeClass("active");
                }
            });

            $("#alluserSelected").click(function(){
                if($(this).is(":checked")) {
                    $("#userList li").addClass("active");
                }else{
                    $("#userList li").removeClass("active");
                }
            });

            $("#alllessonSelected").click(function(){
                if($(this).is(":checked")) {
                    $("#lessonList").find(".lesson").attr("checked","checked");
                }else{
                    $("#lessonList").find(".lesson").removeAttr("checked");
                }
            });

            $("#unchainlesson").click(function(){
                var user = new Array();
                $("#userList li").each(function(index,element){
                    if($(element).hasClass('active')) {
                        user.push($(element).data("id"));
                    }
                });
                var lesson = new Array();
                $("#lessonList").find(".lesson").each(function(index1,element1){
                    if($(element1).is(":checked")) {
                        lesson.push($(element1).val());
                    }
                });
                if(user.length > 0 && lesson.length > 0) {
                    $.ajax({
                        type: "POST",
                        async: false,
                        url: '<?=anchorurl('components/users/unchainlesson')?>/',
                        data: {
                            user_ids: user.join(","),
                            lesson_ids: lesson.join(","),
                        },
                        dataType: 'json',
                        beforeSend: function () {
                            $("#unchainlesson").showLoading();
                        },
                        success: function (data) {
                            $("#unchainlesson").hideLoading();
                            $("#userList li").removeClass('active');
                            $("#lessonList").find(".lesson").removeAttr("checked");
                            retisterLimitTip("解锁成功");
                            $("#alllessonSelected").removeAttr("checked");
                            $("#alluserSelected").removeAttr("checked");


                        }
                    });
                }else{
                    retisterLimitTip("请选择用户和要解锁的课程");
                }
            });

            $("#chainlesson").click(function(){
                var user = new Array();
                $("#userList li").each(function(index,element){
                    if($(element).hasClass('active')) {
                        user.push($(element).data("id"));
                    }
                });
                var lesson = new Array();
                $("#lessonList").find(".lesson").each(function(index1,element1){
                    if($(element1).is(":checked")) {
                        lesson.push($(element1).val());
                    }
                });
                if(user.length > 0 && lesson.length > 0){
                    if($("#lessonList").find(".lesson").length == lesson.length){
                        var type = "all";
                    }else{
                        var type = "notall";
                    }
                    $.ajax({
                        type: "POST",
                        async: false,
                        url: '<?=anchorurl('components/users/chainlesson')?>/',
                        data: {
                            user_ids:user.join(","),
                            lesson_ids:lesson.join(","),
                            type:type
                        },
                        dataType:'json',
                        beforeSend:function(){
                            $("#chainlesson").showLoading();
                        },
                        success: function (data) {
                            $("#chainlesson").hideLoading();
                            $("#userList li").removeClass('active');
                            $("#lessonList").find(".lesson").removeAttr("checked");
                            retisterLimitTip("锁定成功");
                            $("#alllessonSelected").removeAttr("checked");
                            $("#alluserSelected").removeAttr("checked");

                        }
                    });
                }else{
                    retisterLimitTip("请选择用户和要锁定的课程");
                }

            });

            $(document).keypress(function(e) {
                // 回车键事件
                if(e.which == 13) {
                    getUserRankList();
                }
            });

        })
    </script>
</body>
</html>