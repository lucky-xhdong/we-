<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="UTF-8">
	<title>首页--教师</title>
	<?=$this->load->view("exam/tmpl/meta")?>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/exam/css/testSystemTeacher.css">

</head>
<body>
<?=$this->load->view("exam/tmpl/header")?>
<input type="hidden" id="school_id" value="<?=$school_id?>">
	<div class="wrapper">
		<div class="part-item-con clear">
			<div class="sidebar test-library fn-l data-bg-de6 directions-type bg-ed" data-type="考卷库">
				<div class="test-library-header">
					<div class="tl-header-show">
                        <select name="diffculty" id="diffculty">
                            <option value="0">---请选择---</option>
                            <?php
                            foreach($diffculty as $key=>$value):
                                ?>
                                <option value="<?=$value->id?>"><?=$value->difficulty_name?></option>
                            <? endforeach;?>
                        </select>
						<a href="javascript:;" class="more-btn on">更多</a>
					</div>
				</div>
				<div class="test-library-con sidebar-con">
                    <?php foreach($paperList as $key=>$value):?>
					<div class="tl-con-item">
						<dl class="tl-item-dl">
							<dt><?=$value['paper_name_title']?></dt>
							<dd>
								<span>考试难度</span>
								<span><?=$value['paper_diff']?></span>
							</dd>
							<dd>
								<span>考试时间</span>
								<span><?=$value['countTime']?></span>
							</dd>
							<dd>
								<span>考试分数</span>
								<span><?=$value['full_marks']?>分</span>
							</dd>
						</dl>
						<h6 class="tj-item-descri use-paper" data-toggle="modal" data-target=".invi-btn-con"  data-paperid="<?=$value['subject_num']?>">应用试题</h6>
					</div>
                    <?php endforeach; ?>
				</div>
			</div>
			<div class="test-plan data-bg-de6 directions-type fn-l bg-ed" data-type="考试安排">
				<div class="test-plan-header">
					<div class="tp-header-show">
						<div class="tp-header-checkbox">
							<label><input type="checkbox" checked="checked"><i></i>所有考试</label>
<!--							<label><input type="checkbox" checked="checked"><i></i>未开始</label>-->
<!--							<label><input type="checkbox" checked="checked"><i></i>开始中</label>-->
<!--							<label><input type="checkbox"><i></i>待批阅</label>-->
<!--							<label><input type="checkbox"><i></i>历史考试</label>-->
						</div>
<!--						<a href="javascript:;" class="show-hide-btn">展开</a>-->
					</div>
					<div class="tp-header-hide header-hide">
<!--						<ul class="tp-hide-select clear">-->
<!--							<li>-->
<!--								<select>-->
<!--                                    <option value="0">---选择难度---</option>-->
<!--                                    --><?php //foreach($usePaperList as $usePaper):?>
<!--                                        <option value="--><?//=$usePaper['id']?><!--">--><?//=$usePaper['exam_paper_diffculty']?><!--</option>-->
<!--                                    --><?// endforeach;?>
<!--								</select>-->
<!--							</li>-->
<!--							<li>-->
<!--								<select>-->
<!--									<option>--考试用时--</option>-->
<!--                                    --><?php //foreach($usePaperList as $usePaper):?>
<!--                                        <option value="">--><?//=$usePaper['exam_paper_time']?><!--分钟</option>-->
<!--                                    --><?// endforeach;?>
<!--								</select>-->
<!--							</li>-->
<!--							<li>-->
<!--								<input size="16" type="text" value="" readonly class="form_datetime" id="selectDate" placeholder="请选择日期">-->
<!--							</li>-->
<!--							<li>-->
<!--								<select>-->
<!--									<option>满分分值</option>-->
<!--                                    --><?php //foreach($usePaperList as $usePaper):?>
<!--                                        <option value="">--><?//=$usePaper['exam_paper_score']?><!--分钟</option>-->
<!--                                    --><?// endforeach;?>
<!--								</select>-->
<!--							</li>-->
<!--						</ul>-->
					</div>
				</div>
				<div class="test-plan-con">
                    <?php foreach($usePaperList as $usePaper):?>
                        <?php if($usePaper['exam_state']=='待批阅'){ ?>
                                <div class="tp-con-item bg-589">
                                    <div class="tp-con-item-l" >
                                        <h1>待批阅</h1>
                                        <p>考试时间：<?= $usePaper['data_time']?></p>
                                    </div>
                        <?php }else if($usePaper['exam_state']=='正在进行'){?>
                            <div class="tp-con-item bg-bb4">
                                <div class="tp-con-item-l" >
                                    <h1>考试中</h1>
                                    <p>开始时间：<?= $usePaper['data_time']?></p>
                                </div>
                        <?php }else if($usePaper['exam_state']=='未开始'){?>
                            <div class="tp-con-item bg-e7b">
                                <div class="tp-con-item-l" >
                                    <h1><?= $usePaper['dis_data_time']?>后开始</h1>
                                    <p>开始时间：<?= $usePaper['data_time']?></p>
                                </div>
                        <?php }else{?>
                                <div class="tp-con-item bg-4ba">
                                    <div class="tp-con-item-l" >
                                        <h1>已完成</h1>
                                        <p>完成时间：<?= $usePaper['end_data_time']?></p>
                                    </div>
                        <?php }?>

                                <div class="tp-con-item-r">
                                    <h1 class="tp-item-r-tit"><?= $usePaper['exam_paper_name']?></h1>
                                    <dl class="tp-item-r-dl">
                                        <dt>
                                            <span>考试时间：<?= $usePaper['exam_paper_time']?>分钟</span>
                                            <span>考试分数：<?= $usePaper['exam_paper_score']?>分</span>
                                            <span>难&nbsp;&nbsp;度：<?= $usePaper['exam_paper_diffculty']?></span>
                                        </dt>
                                        <?php foreach ($usePaper['exam_classes'] as $class): ?>
                                        <?php if($usePaper['exam_state']=='待批阅'){ ?>
                                                <dd>
                                                    <span><?=$class['grade']['name']?><?=$class['class']['name']?></span>
                                                    <em><?= $usePaper['exam_students_not_started_count']?>人未开始、<?= $usePaper['exam_students_finish_count']?>人交卷</em>
                                                    <button class="bg-589 marking" data-paper_id="<?= $usePaper['exam_paper_id']?>" data-group_id="<?= $usePaper['group_id']?>">阅卷</button>
                                                </dd>
                                        <?php }else if($usePaper['exam_state']=='正在进行'){?>
                                            <dd>
                                                <span><?=$class['grade']['name']?><?=$class['class']['name']?></span>
                                                <em><?= $usePaper['exam_students_not_started_count']?>人未开始、<?= $usePaper['exam_students_finish_count']?>人交卷</em>
                                                <button class="bg-bb4 invigilator" data-groupId ="<?= $usePaper['group_id']?>" data-classId ="<?=$class['class_id']?>">监考</button>
                                            </dd>
                                        <?php }else if($usePaper['exam_state']=='未开始'){?>
                                            <dd>
                                                <span><?=$class['grade']['name']?><?=$class['class']['name']?></span>
                                            </dd>
                                        <?php }else{?>
                                                <dd>
                                                    <span><?=$class['grade']['name']?><?=$class['class']['name']?></span>
                                                    <em></em>
                                                    <button class="bg-4ba view_results" data-paper_id="<?= $usePaper['exam_paper_id']?>" data-group_id="<?= $usePaper['group_id']?>">查看成绩</button>
                                                </dd>
                                        <?php }?>
                                        <?php endforeach; ?>
                                    </dl>
                                </div>
                            </div>

                    <?php endforeach; ?>
				</div>
			</div>
		                 </div>
                    <div class="pager-block">
                        <div class="pager-con text-center">
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
	        </div>
<!-- 应用试题模块 -->
<div class="modal fade invi-btn-con "  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    应用试卷
                </h4>
            </div>
            <div class="modal-body">
                <div class="invi-btn-main">
                    <div class="student_range_parent">
                        <div class="student_range">
                            <div class="invi-main-header">
                                应用范围
                                <select name="grade">
                                    <option value="0">---请选择---</option>
                                    <?php
                                    foreach($gardeList as $key=>$value):
                                        ?>
                                        <option value="<?=$value->id?>"><?=$value->name?></option>
                                    <? endforeach;?>
                                </select>
                                <select name="classes">

                                </select>
                            </div>
                            <div class="invi-main-con">
                                <div class="invi-main-checkbox checkbox-style">
                                    <div class="clear invi-checkbox-h">
                                        <label><input type="checkbox" name="whole"><i></i>全部成员</label>
                                        <a href="javascript:;" class="show-hide-btn">展开</a>
                                    </div>
                                    <div class="invi-checkbox-c header-hide studet_list">
<!--                                        <label><input type="checkbox"><i></i>李四</label>-->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:;" class="add-use-btn">添加新应用范围</a>
                    <div class="invi-main-foot mgt-20">
                        <div class="clear">
                            <div class="col-sm-2">考试时间</div>
                            <div class="col-sm-5 ">
                                <input size="16" type="text" value=" " readonly class="form_datetime col-sm-12" id="starttime">
                            </div>
                        </div>
                        <div class="clear">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-5">
                                <input size="16" type="text" value="" readonly class="form_datetime col-sm-12" id="endtime">
                            </div>
                            <div class="col-sm-5 input-friend-rem">截止时间无，表示准时在开始时间开始</div>
                        </div>
                        <div class="clear">
                            <div class="col-sm-2">考题随机</div>
                            <div class="col-sm-5">
                                <select class="col-sm-12">
                                    <option>是</option>
                                    <option>否</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center modal-footer-custom">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消
                </button>
                <button type="button" class="btn btn-primary save_paper">
                    保存
                </button>
            </div>
        </div>
    </div>
</div>
 <?=$this->load->view("exam/tmpl/foot")?>
<script>
    $(function () {
    var difficulty_id = "",
        grade_id="",
        class_id="",
        school_id = $("#school_id").val(),
        paper_id="";
        $("body").delegate(".invigilator",'click',function () {
            var groupId = $(this).data("groupid");
            var classId = $(this).data("classid");
            window.location.href="<?=anchorurl('teacher/invigilator')?>/"+groupId+"/"+classId;
        })
        $("body").delegate(".view_results",'click',function () {
            var exam_paper_id = $(this).data("paper_id");
            var group_id = $(this).data("group_id");
            window.location.href="<?=anchorurl('teacher/view_results')?>/"+exam_paper_id+"/"+group_id;
        })
        $("body").delegate(".marking",'click',function () {
            var exam_paper_id = $(this).data("paper_id");
            var group_id = $(this).data("group_id");
            window.location.href="<?=anchorurl('teacher/marking')?>/"+exam_paper_id+"/"+group_id;
        });


    $("select[name='diffculty']").change(function(){
        var _this = $(this);
        difficulty_id = _this.val();
        ajaxQuesList({difficulty_id:difficulty_id,pageIndex: 1, pageSize: 30 })
    });
        ajaxQuesList({difficulty_id:0,pageIndex: 1, pageSize: 30 });
    //年级选择
        $("body").delegate("select[name='grade']",'change',function () {
        var string = '';
        var _this = $(this);
        grade_id = $(this).val();
        $.ajax({
            url: "<?=anchorurl('home/getClassInfoList')?>/"+school_id+"/"+$(this).val(),
            type: "get",
            dataType: 'json',
            async: false,
            success: function (data) {
                console.log(data);
                var classes = "";
                if(data.data.length>0) {
                    $(data.data).each(function (index, element) {
                        classes += '<option value="' + element.id + '">' + element.name + '</option>';
                    });
                }else {
                    classes += '<option value="0">--暂无数据--</option>';
                }
                _this.next().html(classes);
            }
        });
    });
    //班级选择
        $("body").delegate("select[name='classes']",'change',function () {
            var _this = $(this);
            class_id = $(this).val();
            ajaxQuesStudentList(_this,{school_id:school_id,garde_id: grade_id, class_id: class_id });
        });
    //学生信息
        function ajaxQuesStudentList(_this,$obj){
            console.log($obj);
            var _this = _this;
            var studet_list = _this.parents('.student_range').find('.studet_list');
            $.ajax({
                type: "GET",
                url: "<?=anchorurl('home/getStudentInfoList')?>",
                dataType:"json",
                data: $obj,
                success:function (msg) {
                    console.log(msg);
                    if (msg.data.length == 0) {
                        studet_list.empty();
                        studet_list.append("<label>--该班级暂无学生数据--</label>");
                    } else {
                        var student_item = "";
                        $(msg.data).each(function (index, element) {
                            student_item +=
                                "<label><input name='ids' type='checkbox' value='"+element.id+"'><i></i>"+element.name+"</label>";
                        });
                        studet_list.empty();
                        studet_list.append(student_item);
                    }
                }
            });
        }
    //试卷list
    function ajaxQuesList($obj){
        console.log($obj);
        var sidebar = $(".sidebar-con");
        $.ajax({
            type: "GET",
            url: "<?=anchorurl('home/getParperList')?>",
            dataType:"json",
            data: $obj,
            success:function (msg) {
                console.log(msg);
                if (msg.data.length == 0) {
                    sidebar.empty();
                    sidebar.append("<span>暂无数据</span>");
                } else {
                    var sidebar_item = "";
                    $(msg.data).each(function (index, element) {
                        sidebar_item +=
                            "<div class='tl-con-item'>"
                            + "<dl class='tl-item-dl'>"
                            + "<dt>" + element.paper_name_title + "</dt>"
                            + "<dd>"
                            + "<span>考试难度</span>"
                            + "<span>" + element.paper_diff + "</span>"
                            + "</dd>"
                            + "<dd>"
                            + "<span>考试时间</span>"
                            + "<span>" + element.countTime + "</span>"
                            + "</dd>"
                            + "<dd>"
                            + "<span>考试分数</span>"
                            + "<span>" + element.full_marks + "分钟</span>"
                            + "</dd>"
                            + "</dl>"
                            + "<h6 class='tj-item-descri use-paper' data-toggle='modal' data-target='.invi-btn-con'  data-paperid='" + element.subject_num + "'>应用试题</h6>"
                            + "</div>";
                    });
                    sidebar.empty();
                    sidebar.append(sidebar_item);
                }
            }
        });
    }

    //应用试题
    $('body').delegate('.use-paper','click',function () {
        paper_id = $(this).data('paperid')
    });

    //添加范围
        $('.add-use-btn').on('click',function () {
            var option = "",range = "",student_range=$(".student_range_parent");
            <?php
            foreach($gardeList as $key=>$value):
            ?>
            option +="<option value='<?=$value->id?>''><?=$value->name?></option>";
            <? endforeach;?>
            range = "<div class='student_range'>"
            +"<div class='invi-main-header'>应用范围"
            +"<select name='grade'>"
            +"<option value='0'>---请选择---</option>"
            + option
            +"</select>"
            +"<select name='classes'>"
            +"</select>"
            +"<a href='javascript:;' class='text-danger del-p pull-right del-use-btn'>删除范围</a>"
            +"</div>"
            +"<div class='invi-main-con'>"
            +"<div class='invi-main-checkbox checkbox-style'>"
            +"<div class='clear invi-checkbox-h'>"
            +"<label><input type='checkbox' name='whole'><i></i>全部成员</label>"
            +"<a href='javascript:;' class='show-hide-btn show-toggle'>展开</a>"
            +"</div>"
            +"<div class='invi-checkbox-c header-hide studet_list'>"
            +"<label>--暂无数据--</label>"
            +"</div>"
            +"</div>"
            +"</div></div>"
            student_range.append(range);
        });

        $('body').delegate('.del-use-btn','click',function () {
            $(this).parents('.student_range').remove();
        });

        //展开收缩学生信息
        $('body').delegate('.show-toggle','click',function () {
            if($(this).text()=='展开'){
                $(this).text('收起')
            }else if($(this).text()=='收起'){
                $(this).text('展开')
            }

            $(this).parents('.invi-checkbox-h').next().toggle();
        });
        //全选事件
        $('body').delegate("input[name='whole']",'click',function () {
            var checkEle = $(this).parents('.student_range').find('.invi-checkbox-c input:checkbox');
            if (this.checked) {
                checkEle.prop("checked", true);
            } else {
                checkEle.prop("checked", false);
            }
        })

        //发布试卷
        $(".save_paper").on('click',function () {
            var student_ids = "";
            $("input[name='ids']:checkbox:checked").each(function(){
                student_ids+=$(this).val()+','
            });
            var classes_ids = "";
            $("select[name='classes']").each(function(){
                classes_ids+=$(this).val()+','
            });
            student_ids = student_ids.substr(0, student_ids.length - 1);
            classes_ids = classes_ids.substr(0, classes_ids.length - 1);
            var starttime = $("#starttime").val();
            if(starttime==''||student_ids==''||classes_ids==''||paper_id==''){
                alert('请补全信息后提交')
            }else {
            var json = new Object();
            json.school_id = school_id;
            json.starttime = starttime;
            json.student_ids = student_ids;
            json.classes_ids =classes_ids;
            json.paper_id =paper_id;
            var key = "",arr="";
            $("input[name='ids']:checkbox:checked").each(function () {
                key += "{grade:" +"\""+ $(this).parents('.student_range').find('select[name="grade"]').val()+"\""+",";
                key += "classes:"+"\"" + $(this).parents('.student_range').find('select[name="classes"]').val()+"\""+ ",";
                key += "student:"+"\"" + $(this).val()+"\""+ "}";
                key += ','
            });
            key = key.substr(0, key.length - 1);
            arr= eval('([' + key + '])');
            json.relationship =arr;
            console.log(JSON.stringify(json));
            var data = JSON.stringify(json);
            //发送异步请求传输问题
            $.ajax({
                url: '<?=anchorurl('teacher/use_paper')?>',
                type: "POST",
                async: false,
                data: {
                    relationship:data
                },
                success: function (msg) {
                    console.log(msg);
                    if(msg!=''){
                       // alert('应用试卷成功');
                        window.location.reload();
                        $(".invi-btn-con").modal('hide');
                    }
                }
            });
            }
        });
    })


</script>

</body>
</html>