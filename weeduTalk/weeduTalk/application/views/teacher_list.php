<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head lang="en">
    <title>学习排名</title>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?= base_url() ?>media/css/less/teacher-list.css"/>
</head>
<body>
<section class="teacher-list-container">
    <!--排序搜索 start-->
    <div class="tlc-handle-group">
        <div class="tlc-tabs">
            <ul id="menuList">
                <li class="active" data-type="studytime"><a href="javascript:;" class="txt">按学习时间排序</a></li>
                <li  data-type="studyscore"><a href="javascript:;" class="txt">按学习得分排序</a></li>
                <li  data-type="studyday"><a href="javascript:;" class="txt">按学习天数排序</a></li>
            </ul>
        </div>
        <div class="search-group">
                <input type="text" id="key" class="form-control" placeholder="请输入姓名查找">
                <button class="btn-search" id="searchButton">搜索</button>
        </div>
    </div>
    <!--排序搜索 end-->
    <!--成员列表 start-->
    <div class="tlc-members">
        <ul id="userList">
        </ul>
    </div>
    <!--成员列表 end-->
</section>
<div id="setHomeTimeTemplate" type="text/x-jquery-tmpl" style="display:none">
    {{each(j,user) users}}
    <li>
        <div class="tlc-members_inner">
            <div class="index">
                <span class="txt">${j+1}</span>
            </div>
            <div class="img-group">
                <a href="javascript:;" class="link-avatar">
                    <img src="${avatar_url}" alt="" class="avatar">
                </a>
            </div>
            <div class="txt-group">
                <p class="title">${name}</p>
                <div class="total">
                    <span class="txt-time {{if typesort == 'studytime'}} active {{/if}}" data-before="学习时间" data-after="H">${studyTime}</span>
                    <span class="txt-score {{if typesort == 'studyscore'}} active {{/if}}" data-before="学习得分" data-after="分">${totalScore}</span>
                    <span class="txt-days {{if typesort == 'studyday'}} active {{/if}}" data-before="学习天数" data-after="天">${totalDay}</span>
                </div>
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
                    console.log(sort);
                    $("#userList").hideLoading();
                    $("#userList").empty();
                    $("#setHomeTimeTemplate").tmpl({users:data,typesort:sort}).appendTo('#userList');
                }
            });
        }
        getUserRankList();
        $("#searchButton").click(function(){
            getUserRankList();
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