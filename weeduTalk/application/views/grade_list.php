<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head lang="en">
    <title>  </title>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?= base_url() ?>media/css/less/grade_list.css?a=<?=rand(1,9999999999)?>"/>
</head>
<body>
<section class="grade-list-container">
    <!--课程列表-左 start-->
    <div class="glc-left">
        <div class="select-group">
            <select name="courses" id="courses" class="select">
            </select>
        </div>
        <div class="glc-lessons">
            <ul id="levelList">
            </ul>
        </div>
    </div>
    <!--课程列表-左 end-->
    <!--单元列表-右 start-->
    <div class="glc-right">
        <ul id="mtscoreHistor">
        </ul>
    </div>
    <!--单元列表-右 end-->
</section>
<div id="LevelTimeTemplate" type="text/x-jquery-tmpl" style="display:none">
    {{each(j,level) levels}}
    <li class="{{if j == 0}} active {{/if}}" data-id="${id}"><a href="javascript:;" class="txt">${name}</a></li>
    {{/each}}
</div>

<div id="unitMtTemplate" type="text/x-jquery-tmpl" style="display:none">
    {{each(j,unit) units}}
    <li>
        <div class="glc-units">
            <div class="glc-units__left">
                <!--有分数 start-->
                <div class="glc-units-info hasScore" data-after="${date}">
                    <p class="name">${name}</p>
                    <p class="score {{if mt_score > 80}} high {{else mt_score > 59}} middle {{else}} low {{/if}}" data-after="分">${mt_score}</p>
                </div>
                <!--有分数 end-->
                <!--没有分数 start-->
<!--                <div class="glc-units-info noScore">-->
<!--                    <p class="name">Unit 1</p>-->
<!--                    <p class="tip">未测试</p>-->
<!--                </div>-->
                <!--没有分数 end-->
            </div>
            <div class="glc-units__right">
                <ul>
                    {{each(j,mt_score) mt_score_list}}
                    <li>
                        <span class="date">${mt_score.date}</span>
                        <span class="score {{if mt_score.scores > 80}} high {{else  mt_score.scores > 59}} middle {{else}} low {{/if}}" data-after="分">${ mt_score.scores}</span>
                    </li>
                    {{/each}}
                </ul>
            </div>
        </div>
    </li>
    {{/each}}
</div>
<script type="text/javascript" src="<?=base_url()?>media/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/jquery.showLoading.js"></script>
<link  href="<?=base_url()?>media/css/showloading.css" rel="stylesheet"/>
<script src="<?=base_url()?>media/js/jquery.tmpl.js"></script>

<script type="text/javascript">
    var sort = "studytime";
    var user_id = '<?=$user->id?>';
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
        function getClassCourseList(){
            $("#course-list-span").empty();
            $("#unit-list-span").empty();
            is_class = true;
            if(user_id != 0){
                $.ajax({
                    type: "GET",
                    async: false,
                    url: '<?=anchorurl('components/users/getuserMtCourseList')?>/'+user_id,
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
                                $("#levelList").empty();
                                $("#LevelTimeTemplate").tmpl({levels:course.levels}).appendTo('#levelList');
                                $("#mtscoreHistor").empty();
                                $("#unitMtTemplate").tmpl({units:course.units}).appendTo('#mtscoreHistor');

                            }else{
                                coursestring += '<option value="'+course.id+'">'+course.name+'</option>';
                            }
                        });
                        $("#courses").html(coursestring);
                    }
                });
            }
        }
        getClassCourseList();

        $("#courses").change(function(){
            var id= $(this).val();
            $(courseData.courseDetail).each(function(index,course){
               // console.log(course.id);
                if(course.id == id){
                    console.log(id);
                        course_id = course.id;
                        publishing_house_courses_id = course.publishing_house_courses_id;
                        $("#levelList").empty();
                        $("#LevelTimeTemplate").tmpl({levels:course.levels}).appendTo('#levelList');
                        $("#mtscoreHistor").empty();
                        $("#unitMtTemplate").tmpl({units:course.units}).appendTo('#mtscoreHistor');
                }
            });
        });

        $("body #levelList").undelegate('li', 'click').delegate('li', 'click', function () {
            $(this).addClass("active").siblings().removeClass("active");
            level_id =  $(this).data("id");
            $.ajax({
                type: "GET",
                async: false,
                url: '<?=anchorurl('components/users/getuserUnitMTList')?>/'+user_id+'/'+publishing_house_courses_id+'/'+level_id,
                dataType:'json',
                success: function (data) {
                    $("#mtscoreHistor").empty();
                    $("#unitMtTemplate").tmpl({units:data.units}).appendTo('#mtscoreHistor');
                }
            });

        });

    })
</script>
</body>
</html>