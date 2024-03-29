<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="UTF-8">
	<title></title>
    <?=$this->load->view("exam/tmpl/meta")?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/exam/css/testSystemTeacher.css">
</head>
<body>
	<div class="header clear">
		<span>LOGO</span>
		<div class="fn-r">
			<span class="login-username ">早上好，王小二老师！</span>
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" 
						data-toggle="dropdown">
					更多操作 <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><a href="#">阅卷</a></li>
					<li><a href="#">学生页面</a></li>
					<li><a href="#">退出登录</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="wrapper">
		<div class="part-item-con clear">
			<div class="sidebar test-library fn-l data-bg-de6 directions-type bg-ed" data-type="考卷库">
				<div class="test-library-header">
					<div class="tl-header-show">
						<select>
							<option>选择难度</option>
							<option>选择难度1</option>
						</select>
						<a href="javascript:;" class="more-btn on">更多</a>
					</div>
				</div>
				<div class="test-library-con sidebar-con">
					<div class="tl-con-item">
						<dl class="tl-item-dl">
							<dt>四级模拟考试</dt>
							<dd>
								<span>考试难度</span>
								<span>大学一年级</span>	
							</dd>
							<dd>
								<span>考试时间</span>
								<span>130分钟</span>	
							</dd>
							<dd>
								<span>考试分数</span>
								<span>710分</span>	
							</dd>
						</dl>
						<h6 class="tj-item-descri">应用试题</h6>
					</div>
					<div class="tl-con-item">
						<dl class="tl-item-dl">
							<dt>四级模拟考试</dt>
							<dd>
								<span>考试难度</span>
								<span>大学一年级</span>	
							</dd>
							<dd>
								<span>考试时间</span>
								<span>130分钟</span>	
							</dd>
							<dd>
								<span>考试分数</span>
								<span>710分</span>	
							</dd>
						</dl>
						<h6 class="tj-item-descri">应用试题</h6>
					</div>
					<div class="tl-con-item">
						<dl class="tl-item-dl">
							<dt>四级模拟考试</dt>
							<dd>
								<span>考试难度</span>
								<span>大学一年级</span>	
							</dd>
							<dd>
								<span>考试时间</span>
								<span>130分钟</span>	
							</dd>
							<dd>
								<span>考试分数</span>
								<span>710分</span>	
							</dd>
						</dl>
						<h6 class="tj-item-descri">应用试题</h6>
					</div>
					
				</div>
			</div>
			<div class="test-plan data-bg-de6 directions-type fn-l bg-ed" data-type="考试安排">
				<div class="test-plan-header">
					<div class="tp-header-show">
						<div class="tp-header-checkbox">
							<label><input type="checkbox"><i></i>所有开始</label>
							<label><input type="checkbox" checked="checked"><i></i>未开始</label>
							<label><input type="checkbox" checked="checked"><i></i>开始中</label>
							<label><input type="checkbox"><i></i>待批阅</label>
							<label><input type="checkbox"><i></i>历史考试</label>
						</div>
						<a href="javascript:;" class="show-hide-btn">展开</a>
					</div>
					<div class="tp-header-hide header-hide">
						<ul class="tp-hide-select clear">
							<li>
								<select>
									<option>选择难度</option>
									<option>一般</option>
								</select>
							</li>
							<li>
								<select>
									<option>考试用时</option>
									<option>130分钟</option>
								</select>
							</li>
							<li>
								<input size="16" type="text" value="" readonly class="form_datetime" id="selectDate" placeholder="请选择日期">
							</li>
							<li>
								<select>
									<option>满分分值</option>
									<option>130分钟</option>
								</select>
							</li>
						</ul>
					</div>
				</div>
				<div class="test-plan-con">
					<div class="tp-con-item bg-bb4">
						<div class="tp-con-item-l" >
							<h1>考试中</h1>
							<p>2月23日&nbsp;&nbsp;10:00</p>	
						</div>
						<div class="tp-con-item-r">
							<h1 class="tp-item-r-tit">四级模拟考试</h1>
							<dl class="tp-item-r-dl">
								<dt>
									<span>考试时间：160分钟</span>	
									<span>考试分数：710分</span>	
									<span>难&nbsp;&nbsp;度：大学一年级</span>	
								</dt>
								<dd>
									<span>一年级二班</span>
									<em>3人未开始、2人交卷</em>
									<button class="bg-bb4" data-toggle="modal" data-target=".invi-btn-con">监考</button>	
								</dd>
								<dd>
									<span>一年级三班</span>
									<em>已全部开始、1人交卷</em>
									<button class="bg-bb4">监考</button>
								</dd>
								<dd>
									<span>一年级四班</span>
									<em>已全部开始、0人交卷</em>
									<button class="bg-bb4">监考</button>
								</dd>
							</dl>
						</div>
					</div>
					<div class="tp-con-item bg-e7b">
						<div class="tp-con-item-l" >
							<h1>59分钟后开始</h1>
							<p>2月23日&nbsp;&nbsp;11:00</p>	
						</div>
						<div class="tp-con-item-r">
							<h1 class="tp-item-r-tit">四级模拟考试</h1>
							<dl class="tp-item-r-dl">
								<dt>
									<span>考试时间：160分钟</span>	
									<span>考试分数：710分</span>	
									<span>难&nbsp;&nbsp;度：大学一年级</span>	
								</dt>
								<dd>
									<span>一年级二班</span>
								</dd>
							</dl>
						</div>
					</div>
					<div class="tp-con-item bg-589">
						<div class="tp-con-item-l" >
							<h1>待批阅</h1>
							<p>2月23日&nbsp;&nbsp;10:00</p>	
						</div>
						<div class="tp-con-item-r">
							<h1 class="tp-item-r-tit">四级模拟考试</h1>
							<dl class="tp-item-r-dl">
								<dt>
									<span>考试时间：160分钟</span>	
									<span>考试分数：710分</span>	
									<span>难&nbsp;&nbsp;度：大学一年级</span>	
								</dt>
								<dd>
									<span>一年级二班</span>
									<em>3人未开始、2人交卷</em>
									<button class="bg-589">阅卷</button>	
								</dd>
								<dd>
									<span>一年级三班</span>
									<em>已全部开始、1人交卷</em>
									<button class="bg-589">阅卷</button>
								</dd>
								<dd>
									<span>一年级四班</span>
									<em>已全部开始、0人交卷</em>
									<button class="bg-589">阅卷</button>
								</dd>
							</dl>
						</div>
					</div>
					<div class="tp-con-item bg-4ba">
						<div class="tp-con-item-l" >
							<h1>已完成</h1>
							<p>2月23日&nbsp;&nbsp;10:00</p>	
						</div>
						<div class="tp-con-item-r">
							<h1 class="tp-item-r-tit">四级模拟考试</h1>
							<dl class="tp-item-r-dl">
								<dt>
									<span>考试时间：160分钟</span>	
									<span>考试分数：710分</span>	
									<span>难&nbsp;&nbsp;度：大学一年级</span>	
								</dt>
								<dd>
									<span>一年级二班</span>
									<em></em>	
									<button class="bg-4ba">查看成绩</button>	
								</dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- 模态框 -->
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
							<div class="invi-main-header">
								应用范围
								<select>
									<option>一年级</option>
									<option>二年级</option>
								</select>
								<select>
									<option>一班</option>
									<option>三班</option>
								</select>
							</div>
							<div class="invi-main-con">
								<div class="invi-main-checkbox checkbox-style">
									<div class="clear invi-checkbox-h">
										<label><input type="checkbox"><i></i>全部成员</label>
										<a href="javascript:;" class="show-hide-btn">展开</a>
									</div>
									<div class="invi-checkbox-c header-hide ">
										<label><input type="checkbox"><i></i>李四</label>
										<label><input type="checkbox"><i></i>战三</label>
										<label><input type="checkbox"><i></i>李四0</label>
										<label><input type="checkbox"><i></i>绕绕</label>
										<label><input type="checkbox"><i></i>战三1</label>
										<label><input type="checkbox"><i></i>李四1</label>
										<label><input type="checkbox"><i></i>绕绕1</label>
									</div>
								</div>
								<a href="javascript:;" class="add-use-btn">添加新应用范围</a>
							</div>
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
						<button type="button" class="btn btn-primary">
							保存
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?=$this->load->view("exam/tmpl/foot")?>
</body>
</html>