<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('meta');?>

  <style>
    .jqx-chart-legend-text{
      opacity: 0 !important;
    }
  </style>
</head>
<body>
<div class="app app-header-fixed">
  <!-- header -->
  <?php $this->load->view('header');?>
  <!-- / header -->

  <!-- aside -->
  <?php $this->load->view('aside');?>
  <!-- / aside -->
  <!-- content-->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body ">
      <div class="hbox hbox-auto-xs hbox-auto-sm" >
        <div class="col">
          <!-- main header -->
          <div class="bg-light lter b-b wrapper-md" style="height: auto">
            <div class="col-sm-5">
              考卷>创建考卷
            </div>
          </div>
          <!-- / main header -->
          <div class="text-center setting-exap-time">
            <span>目前设置的考试时间为：<i>342</i>分钟 </span>
            <span>考试分数 <i>231</i>分 </span>
          </div>
<!--          模态框-->

          <div class="wrapper-md">
            <div class="panel panel-default">
              <a href="javascript:;" class="btn btn-info new-icon" data-toggle="modal" data-target="#choose-exam-box">
                选择考题_考题详情
              </a>
              <div class="wrap-tit examp-cont-tit">
                设置考题内容
              </div>
              <div class="examp-cont-box pag-15 lineH-26">
                <div class="pag-15 bg-ed mgb-10">
                  <div >
                    <div class="clearfix mgb-10 pagh-5 ">
                      <div class="col-sm-1 text-right">模块名称:</div>
                      <div class="col-sm-1">PART 1</div>
                    </div>
                    <div class="clearfix mgb-10 pagh-5">
                      <div class="col-sm-1 text-right">考查类型:</div>
                      <div class="col-sm-1">写作 1</div>
                    </div>
                    <div class="clearfix mgb-10 pagh-5">
                      <div class="col-sm-1 text-right">考试时间:</div>
                      <div class="col-sm-1">15分钟</div>
                    </div>
                  </div>
                  <div class="bg-f8fdf8 pag-15">
                    <div class="clearfix mgb-10 pagh-5 ">
                      <div class="col-sm-1 text-right">小节名称:</div>
                      <div class="col-sm-1">无</div>
                    </div>
                    <div class="clearfix mgb-10 pagh-5 ">
                      <div class="col-sm-1 text-right">答题指南:</div>
                      <div class="col-sm-11">
                        For this part, you are allowed 30 minutes to write a short essay based on the picture below. You should start your essay with a brief description of the picture and express your views on the reason of "China fever". You should write at least 120 words but no more than 180 words.
                      </div>
                    </div>
                    <div class="bor-ccc pag-15">
                      <div class="clearfix mgb-10 pagh-5">
                        <div class="col-sm-1 text-center">考题1</div>
                      </div>
                      <div class="clearfix mgb-10 pagh-5 ">
                        <div class="col-sm-1 text-right">答题类型:</div>
                        <div class="col-sm-1">按需求写作</div>
                      </div>
                      <div class="clearfix mgb-10 pagh-5 ">
                        <div class="col-sm-1 text-right">考<span style="display: inline-block;width:35%;"></span>题:</div>
                        <div class="col-sm-6">
                          <div>三选一随机</div>
                          <ul class="theme-list">
                            <li>主题：城市发展 <span class="theme-type">（新问题、编号：89757）</span><a href="javascript:;" class="text-info">预览</a></li>
                            <li>主题：城市发展 <span class="theme-type">（新问题、编号：89757）</span><a href="javascript:;" class="text-info">预览</a></li>
                            <li>主题：城市发展 <span class="theme-type">（新问题、编号：89757）</span><a href="javascript:;" class="text-info">预览</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="clearfix mgb-10 pagh-5 ">
                        <div class="col-sm-1 text-right">答题时间:</div>
                        <div class="col-sm-1">15分钟</div>
                      </div>
                      <div class="clearfix mgb-10 pagh-5 ">
                        <div class="col-sm-1 text-right">考题分数:</div>
                        <div class="col-sm-1">60分</div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button class="exam-change-btn">修改</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /content-->
  <!-- footer-->
  <footer id="footer" class="app-footer" role="footer">
    <div class="wrapper b-t bg-light">
        <span class="pull-right">1.0.0 <a href="" ui-scroll="app" class="m-l-sm text-muted">
            <i class="fa fa-long-arrow-up"></i></a></span>
      北京唯佳未来教育科技有限公司 © 2016 Copyright.
    </div>
  </footer>
  <!-- / footer-->

  <!-- 模态框（Modal） -->
<div class="modal fade  "  id="choose-exam-box" tabindex="-1" role="dialog"  >
    <div class="modal-dialog modal-nor choose-exam-dialog">
      <div class="modal-content">
        <div class="modal-header pag-15 borb-e5">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">题库</h4>
        </div>
        <div class="modal-body pag-15">
          <div class="clearfix chooseExam-header">
            <ul class="col-sm-9">
              <li class="col-sm-4">
                <select name="" id="">
                  <option value="">学校</option>
                </select>
              </li>
              <li class="col-sm-4">
                <select name="" id="">
                  <option value="">题目类型</option>
                </select>
              </li>
              <li class="col-sm-4">
                <select name="" id="">
                  <option value="">题目难度</option>
                </select>
              </li>
            </ul>
            <div class="col-sm-3 search-keyword">
              <input type="text" placeholder="输入编号、关键字">
              <i class="fa fa-search" aria-hidden="true"></i>
            </div>
          </div>
          <div class="chooseExam-cont">
            <div class="chooseExam-cont-option-one">
              <div class="chooseExam-item">
                <div class="chooseExam-item-info">
                  <span class="chooseExam-item-num">10234</span>
                  <span>新闻类</span>
                  <span>选词填空</span>
                  <span>春节回家</span>
                </div>
                <div class="chooseExam-item-con">
                  <label for=""><input type="checkbox"><i></i></label>
                  <div>
                    <p>
                      For this part, you are allowed 30 minutes to write a short essay based on the picture below. You should start your essay with a brief description of the picture and express your views on the reason of "China fever". You should write at least 120 words but no more  words..
                    </p>
                  </div>
                </div>
                <a href="javascript:;" class="chooseExam-more">查看全部</a>
              </div>
              <div class="chooseExam-item">
                <div class="chooseExam-item-info">
                  <span class="chooseExam-item-num">10235</span>
                  <span>新闻类</span>
                  <span>翻译</span>
                  <span>北京雾霾</span>
                </div>
                <div class="chooseExam-item-con">
                  <label for=""><input type="checkbox"><i></i></label>
                  <div>
                    <p>
                      虽然一般认为污染排放是导致雾霾的罪魁祸首，但天气因素的影响同样不容忽视。北京冬季雾霾天气发生时，地表北风和对流层中层西北风减弱、并伴随着低层大气层结稳定性增加，这导致天气条件非常不利于雾霾迅速扩散，使其累积进一步发展成重度雾霾。
                    </p>
                  </div>
                </div>
                <a href="javascript:;" class="chooseExam-more">查看全部</a>
              </div>
              <div class="chooseExam-item">
                <div class="chooseExam-item-info">
                  <span class="chooseExam-item-num">10234</span>
                  <span>新闻类</span>
                  <span>听语音听问题选择问题</span>
                  <span>摇号买车</span>
                </div>
                <div class="chooseExam-item-con">
                  <label for=""><input type="checkbox"><i></i></label>
                  <div class="clearfix">
                    <span >听力原文</span>
                    <div class="chooseExam-audio">
                      tingli.mp3 <em>(15分钟)</em>
                      <span>试听</span>
                    </div>
                  </div>
                </div>
                <a href="javascript:;" class="chooseExam-more">查看全部</a>
              </div>
            </div>
            <div>
              <h1 class="chooseExam-selected">已选</h1>
              <div class="chooseExam-item">
                <div class="chooseExam-item-info">
                  <span class="chooseExam-item-num">10229</span>
                  <span>新闻类</span>
                  <span>段落匹配</span>
                  <span>春节回家</span>
                </div>
                <div class="chooseExam-item-con">
                  <label for=""><input type="checkbox" checked><i></i></label>
                  <div>
                    <p>
                      a  Are Bad Times Healthy? Most people are worried about the health of the 	   economy. But does the economy also affect your health? It 'does, but not always.
                    </p>
                    <p>
                      b  Are Bad Times Healthy? Most people are worried about the
                    </p>
                  </div>
                </div>
                <a href="javascript:;" class="chooseExam-more">查看全部</a>
              </div>
              <div class="chooseExam-item">
                <div class="chooseExam-item-info">
                  <span class="chooseExam-item-num">10230</span>
                  <span>新闻类</span>
                  <span>段落匹配</span>
                  <span>春节回家</span>
                </div>
                <div class="chooseExam-item-con">
                  <label for=""><input type="checkbox" checked><i></i></label>
                  <div>
                    <p>
                      For this part, you are allowed 30 minutes to write a short essay based on the picture below. You should start your essay with a brief description of the picture and express your views on the reason of "China fever". You should write at least 120 words but no more  words..
                    </p>
                  </div>
                </div>
                <a href="javascript:;" class="chooseExam-more">查看全部</a>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer text-center modal-footer-btn">
          <button type="button" class="btn prev-step" >上一步</button>
          <button type="button" class="btn chooseExam-save modal-btn-save">保存</button>
        </div>
      </div>
    </div>
  </div>

</div>
</body>
</html>