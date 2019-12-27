<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('meta');?>
  <?php $this->load->view('tmpl/jqueryvalidate'); ?>
  <style>
    .jqx-chart-legend-text{
      opacity: 0 !important;
    }
  </style>
</head>
<body>
<input type="hidden" id="paperId" value="<?=$paperId?>">
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
              <a href="<?=site_url('home/examinationPaper')?>">考卷</a>>考卷详情
            </div>
          </div>
          <!-- / main header -->
          <div class="wrapper-md">
            <div class="panel panel-default">
              <div class="wrap-tit examp-cont-tit">
                考卷详情
              </div>
              <div class="examp-cont-box pag-15 lineH-26">
                <div>
                  <div class="clearfix mgb-10 pagh-5 ">
                    <div class="col-sm-1 text-right">考卷名称:</div>
                    <div class="col-sm-1"><?=$paperDetail[0]['paper_name']?></div>
                  </div>
                  <div class="clearfix mgb-10 pagh-5 ">
                    <div class="col-sm-1 text-right">使用范围:</div>
                    <div class="col-sm-5"><?=$paperDetail[0]['school']?></div>
                  </div>
                  <div class="clearfix mgb-10 pagh-5 ">
                    <div class="col-sm-1 text-right">考试难度:</div>
                    <div class="col-sm-1"><?=$paperDetail[0]['paper_diff']?></div>
                  </div>
                  <div class="clearfix mgb-10 pagh-5 ">
                    <div class="col-sm-1 text-right">考试时间:</div>
                    <div class="col-sm-1"><?=$paperDetail[0]['countTime']?>分钟</div>
                  </div>
                  <div class="clearfix mgb-10 pagh-5 ">
                    <div class="col-sm-1 text-right">满分分值:</div>
                    <div class="col-sm-1"><?=$paperDetail[0]['full_marks']?>分</div>
                  </div>
                </div>
<!--       模块           -->
                  <?php foreach($paperDetailModel['paperModel'] as $key=>$value):?>
                <div class="pag-15 bg-ed mgb-10 del-model-name">
                  <div >
                    <div class="clearfix mgb-10 pagh-5 ">
                      <div class="col-sm-1 text-right">模块名称:</div>
                      <div class="col-sm-1"><?=$value->title?></div>
                    </div>
                    <div class="clearfix mgb-10 pagh-5">
                      <div class="col-sm-1 text-right">考查类型:</div>
                      <div class="col-sm-1"><?=$value->name?></div>
                    </div>
                    <div class="clearfix mgb-10 pagh-5">
                      <div class="col-sm-1 text-right">考试时间:</div>
                      <div class="col-sm-1"><?=$value->model_time?>分钟</div>
                    </div>
                  </div>
                  <div class="bg-f8fdf8 pag-15">
                    <div class="clearfix mgb-10 pagh-5 ">
                      <div class="col-sm-1 text-right">小节名称:</div>
                      <div class="col-sm-1"><?=$value->section_name?></div>
                    </div>
                    <div class="clearfix mgb-10 pagh-5 ">
                      <div class="col-sm-1 text-right">答题指南:</div>
                      <div class="col-sm-11">
                          <?=$value->answer_guide?>
                      </div>
                    </div>
<!--                  循环问题    -->
                      <?php foreach($value->modelQues as $key2=>$value2):?>
                    <div class="bor-ccc pag-15">
                      <div class="clearfix mgb-10 pagh-5">
                        <div class="col-sm-1 text-center">考题1</div>
                      </div>
<!--                      <div class="clearfix mgb-10 pagh-5 ">-->
<!--                        <div class="col-sm-1 text-right">答题类型:</div>-->
<!--                        <div class="col-sm-1">--><?//=$value2->type?><!--</div>-->
<!--                      </div>-->
                      <div class="clearfix mgb-10 pagh-5 ">
                        <div class="col-sm-1 text-right">考<span style="display: inline-block;width:35%;"></span>题:</div>
                        <div class="col-sm-6">
                          <div>三选一随机<a href="javascript:;" class="text-info preview" data-quesid="<?=$value2->question_id?>" data-toggle='modal' data-target='.new-exp-box'>&nbsp;&nbsp;&nbsp;预览</a></div>
                          <ul class="theme-list">
                            <li>主题：<?=$value2->question_item?> <span class="theme-type">（编号：<?=$value2->question_id?>）</span></li>
                          </ul>
                        </div>
                      </div>
                      <div class="clearfix mgb-10 pagh-5 ">
                        <div class="col-sm-1 text-right">答题时间:</div>
                        <div class="col-sm-1"><?=$value2->question_time?>分钟</div>
                      </div>
                      <div class="clearfix mgb-10 pagh-5 ">
                        <div class="col-sm-1 text-right">考题分数:</div>
                        <div class="col-sm-1"><?=$value2->scores?>分</div>
                      </div>
                    </div>
                      <? endforeach;?>
                  </div>
                    <div class="clearfix text-center">
                        <button class="btn-success exam-change-btn" data-id = "<?=$value->id?>">修改</button>
                    </div>
                </div>
                  <? endforeach;?>

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
</div>
<!--   预览考题模块  -->
<div class="new-exp-box modal fade " role="dialog">
    <div class="modal-dialog modal-lg modal-nor">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">题目详情</h4>
            </div>
            <div class="modal-body preview-question" style="padding:0;">
                <!-- 段落匹配 -->
                <div>
                    <div class="exam-detail-tit clearfix">
                        <div class="exam-tit-table">
                            <table>
                                <thead>
                                <tr>
                                    <td>题目编号</td>
                                    <td>考查技能</td>
                                    <td>答题类型</td>
                                    <td>内容类型</td>
                                    <td>题目难度</td>
                                    <td>创建时间</td>
                                    <td>创建人</td>
                                    <td>主题</td>
                                    <td>所属学校</td>
                                    <td>正确率</td>
                                    <td>使用次数</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>122</td>
                                    <td>阅读</td>
                                    <td>选词填空</td>
                                    <td>对话</td>
                                    <td>高中v.1</td>
                                    <td>————</td>
                                    <td>万老师</td>
                                    <td>家庭聚会</td>
                                    <td>WE公用题库</td>
                                    <td>————</td>
                                    <td>————</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="pag-15 exam-detail-cont ">
                        <div class="mgb-10 pagb-15">
                            <div class="clearfix mgb-10">
                                <div class="pull-left per-5 text-center"  >
                                    a
                                </div>
                                <div class="pull-left per-95 text-justify">
                                    Are Bad Times Healthy? Most people are worried about the health of the economy. But does the economy also affect your health? It 'does, but not always in
                                    ways you might expect. The data on how an economic downturn influencesan individual's health are surprisingly mixed. It's clear that long-term economic gains
                                    lead to improvements in a population's overall health, in developing and industrialised societies alike.
                                </div>
                            </div>
                            <div class="clearfix mgb-10">
                                <div class="pull-left per-5 text-center"  >
                                    b
                                </div>
                                <div class="pull-left per-95 text-justify">
                                    Are Bad Times Healthy? Most people are worried about the health of the economy. But does the economy also affect your health? It 'does, but not always in
                                    ways you might expect. The data on how an economic downturn influencesan individual's health are surprisingly mixed. It's clear that long-term economic gains
                                    lead to improvements in a population's overall health, in developing and industrialised societies alike.
                                </div>
                            </div>
                            <div class="clearfix mgb-10">
                                <div class="pull-left per-5 text-center"  >
                                    c
                                </div>
                                <div class="pull-left per-95 text-justify">
                                    Are Bad Times Healthy? Most people are worried about the health of the economy. But does the economy also affect your health? It 'does, but not always in
                                    ways you might expect. The data on how an economic downturn influencesan individual's health are surprisingly mixed. It's clear that long-term economic gains
                                    lead to improvements in a population's overall health, in developing and industrialised societies alike.
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="clearfix pagh-5 mgb-10">
                                <div class="col-sm-2">
                                    <select name="" id="" class="sel-h26">
                                        <option value="">请选择</option>
                                    </select>
                                </div>
                                <div class="col-sm-10">
                                    Are Bad Times Healthy? Most people are worried about the health of the economy. But does the economy also affect your health?
                                </div>
                            </div>
                            <div class="clearfix pagh-5 mgb-10">
                                <div class="col-sm-2">
                                    <select name="" id="" class="sel-h26">
                                        <option value="">请选择</option>
                                    </select>
                                </div>
                                <div class="col-sm-10">
                                    Are Bad Times Healthy? Most people are worried about the health of the economy. But does the economy also affect your health?
                                </div>
                            </div>
                            <div class="clearfix pagh-5 mgb-10">
                                <div class="col-sm-2">
                                    <select name="" id="" class="sel-h26">
                                        <option value="">请选择</option>
                                    </select>
                                </div>
                                <div class="col-sm-10">
                                    Are Bad Times Healthy? Most people are worried about the health of the economy. But does the economy also affect your health?
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-ed exam-detail-notes pag-15">
                        <div>建议考试时间 <i>20分钟</i></div>
                        <div>建议每题分数 <i>5分</i></div>
                        <div>考题数量 <i>3</i></div>
                    </div>
                </div>
                <!-- 翻译预览 -->
                <div>
                    <div class="exam-detail-tit clearfix">
                        <div class="exam-tit-table">
                            <table>
                                <thead>
                                <tr>
                                    <td>题目编号</td>
                                    <td>考查技能</td>
                                    <td>答题类型</td>
                                    <td>内容类型</td>
                                    <td>题目难度</td>
                                    <td>创建时间</td>
                                    <td>创建人</td>
                                    <td>主题</td>
                                    <td>所属学校</td>
                                    <td>正确率</td>
                                    <td>使用次数</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>122</td>
                                    <td>阅读</td>
                                    <td>选词填空</td>
                                    <td>对话</td>
                                    <td>高中v.1</td>
                                    <td>————</td>
                                    <td>万老师</td>
                                    <td>家庭聚会</td>
                                    <td>WE公用题库</td>
                                    <td>————</td>
                                    <td>————</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="pag-15 exam-detail-cont ">
                        <div class="pag-15">
                            <p class="mgb-10">
                                中国是图书产量最多(the most prolific)的国家之一，但国人的阅读量却相对偏低。近几十年，书籍供应量大大增加，但人们对书籍的兴趣却未同步增长。调查显示，国人年平均读书量仅为4．39本，与发达国家有很大差距。如美国人年均读书7本，法国人8．4本。调查数据还显示，只有1.3%的国人认为自己的阅读量多，53.1%的国人则认为自己的阅读量很少。
                            </p>
                            <p class="mgb-10">
                                中国是图书产量最多(the most prolific)的国家之一，但国人的阅读量却相对偏低。近几十年，书籍供应量大大增加，但人们对书籍的兴趣却未同步增长。调查显示，国人年平均读书量仅为4．39本，与发达国家有很大差距。如美国人年均读书7本，法国人8．4本。调查数据还显示，只有1.3%的国人认为自己的阅读量多，53.1%的国人则认为自己的阅读量很少。
                            </p>
                        </div>
                    </div>
                    <div class="bg-ed exam-detail-notes pag-15">
                        <div>建议考试时间 <i>20分钟</i></div>
                        <div>建议每题分数 <i>5分</i></div>
                        <div>考题数量 <i>3</i></div>
                    </div>
                </div>
                <!-- 听段落看问题选择答案 -->
                <div>
                    <div class="exam-detail-tit clearfix">
                        <div class="exam-tit-table">
                            <table>
                                <thead>
                                <tr>
                                    <td>题目编号</td>
                                    <td>考查技能</td>
                                    <td>答题类型</td>
                                    <td>内容类型</td>
                                    <td>题目难度</td>
                                    <td>创建时间</td>
                                    <td>创建人</td>
                                    <td>主题</td>
                                    <td>所属学校</td>
                                    <td>正确率</td>
                                    <td>使用次数</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>122</td>
                                    <td>阅读</td>
                                    <td>选词填空</td>
                                    <td>对话</td>
                                    <td>高中v.1</td>
                                    <td>————</td>
                                    <td>万老师</td>
                                    <td>家庭聚会</td>
                                    <td>WE公用题库</td>
                                    <td>————</td>
                                    <td>————</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pag-15 exam-detail-cont ">
                        <div class="pag-15">
                            <div style="margin-bottom:30px;">
                                <div class="clearfix listen-title " >
                                    <span>听力原文</span>
                                    <span>xx.mp3 <i>(15分钟)</i></span>
                                    <div class="audition-btn pull-left">
                                        <button class="btn btn-success">试听</button>
                                        <audio src="" controls="" class="audition-target"></audio>
                                    </div>
                                </div>
                            </div>
                            <ul>
                                <li class="pagb-15 mgb-10">
                                    <div class="clearfix pagh-5 pagb-15">
                                        <div class="col-sm-1 ">问题1</div>
                                        <div class="col-sm-11">Unskilled workers may choose to retire early. ? </div>
                                    </div>
                                    <ul>
                                        <li class="clearfix">
                                            <div class="per-5 pull-left text-center"><input type="checkbox"></div>
                                            <div class="per-95 pull-left text-justify">Unskilled workers may choose to retire early.  </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="per-5 pull-left text-center"><input type="checkbox"></div>
                                            <div class="per-95 pull-left text-justify">more people have to receive in-service training. </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="per-5 pull-left text-center"><input type="checkbox"></div>
                                            <div class="per-95 pull-left text-justify">Even wealthy people must work longer to live comfortably in retirement. </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pagb-15 mgb-10">
                                    <div class="clearfix pagh-5 pagb-15">
                                        <div class="col-sm-1">问题1</div>
                                        <div class="col-sm-11">Unskilled workers may choose to retire early. ? </div>
                                    </div>
                                    <ul>
                                        <li class="clearfix">
                                            <div class="per-5 pull-left text-center"><input type="checkbox"></div>
                                            <div class="per-95 pull-left text-justify">Unskilled workers may choose to retire early.  </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="per-5 pull-left text-center"><input type="checkbox"></div>
                                            <div class="per-95 pull-left text-justify">more people have to receive in-service training. </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="per-5 pull-left text-center"><input type="checkbox"></div>
                                            <div class="per-95 pull-left text-justify">Even wealthy people must work longer to live comfortably in retirement. </div>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="bg-ed exam-detail-notes pag-15">
                        <div>建议考试时间 <i>20分钟</i></div>
                        <div>建议每题分数 <i>5分</i></div>
                        <div>考题数量 <i>3</i></div>
                    </div>
                </div>
                <!--听段落听问题选择答案的结构-->
                <div>
                    <div class="exam-detail-tit clearfix">
                        <div class="exam-tit-table">
                            <table>
                                <thead>
                                <tr>
                                    <td>题目编号</td>
                                    <td>考查技能</td>
                                    <td>答题类型</td>
                                    <td>内容类型</td>
                                    <td>题目难度</td>
                                    <td>创建时间</td>
                                    <td>创建人</td>
                                    <td>主题</td>
                                    <td>所属学校</td>
                                    <td>正确率</td>
                                    <td>使用次数</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>122</td>
                                    <td>阅读</td>
                                    <td>选词填空</td>
                                    <td>对话</td>
                                    <td>高中v.1</td>
                                    <td>————</td>
                                    <td>万老师</td>
                                    <td>家庭聚会</td>
                                    <td>WE公用题库</td>
                                    <td>————</td>
                                    <td>————</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pag-15 exam-detail-cont ">
                        <div class="pag-15">
                            <div style="margin-bottom:30px;">
                                <div class="clearfix listen-title " >
                                    <span>听力原文</span>
                                    <span>xx.mp3 <i>(15分钟)</i></span>
                                    <div class="audition-btn pull-left">
                                        <button class="btn btn-success">试听</button>
                                        <audio src="" controls="" class="audition-target"></audio>
                                    </div>
                                </div>
                            </div>
                            <ul>
                                <li class="pagb-15 mgb-10">
                                    <div class="clearfix pagh-5 pagb-15">
                                        <div class="clearfix listen-title pagh-5">
                                            <div class="col-sm-1">
                                                问题3
                                            </div>
                                            <div class="col-sm-11">
                                                <span>xx.mp3 <i>(15分钟)</i></span>
                                                <div class="audition-btn pull-left">
                                                    <button class="btn btn-success">试听</button>
                                                    <audio src="" controls="" class="audition-target"></audio>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul>
                                        <li class="clearfix">
                                            <div class="per-5 pull-left text-center"><input type="checkbox"></div>
                                            <div class="per-95 pull-left text-justify">Unskilled workers may choose to retire early.  </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="per-5 pull-left text-center"><input type="checkbox"></div>
                                            <div class="per-95 pull-left text-justify">more people have to receive in-service training. </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="per-5 pull-left text-center"><input type="checkbox"></div>
                                            <div class="per-95 pull-left text-justify">Even wealthy people must work longer to live comfortably in retirement. </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pagb-15 mgb-10">
                                    <div class="clearfix pagh-5 pagb-15">
                                        <div class="clearfix listen-title pagh-5">
                                            <div class="col-sm-1">
                                                问题4
                                            </div>
                                            <div class="col-sm-11">
                                                <span>xx.mp3 <i>(15分钟)</i></span>
                                                <div class="audition-btn pull-left">
                                                    <button class="btn btn-success">试听</button>
                                                    <audio src="" controls="" class="audition-target"></audio>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul>
                                        <li class="clearfix">
                                            <div class="per-5 pull-left text-center"><input type="checkbox"></div>
                                            <div class="per-95 pull-left text-justify">Unskilled workers may choose to retire early.  </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="per-5 pull-left text-center"><input type="checkbox"></div>
                                            <div class="per-95 pull-left text-justify">more people have to receive in-service training. </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="per-5 pull-left text-center"><input type="checkbox"></div>
                                            <div class="per-95 pull-left text-justify">Even wealthy people must work longer to live comfortably in retirement. </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-ed exam-detail-notes pag-15">
                        <div>建议考试时间 <i>20分钟</i></div>
                        <div>建议每题分数 <i>5分</i></div>
                        <div>考题数量 <i>3</i></div>
                    </div>
                </div>
                <!--写作预览-->
                <div>
                    <div class="exam-detail-tit clearfix">
                        <div class="exam-tit-table">
                            <table>
                                <thead>
                                <tr>
                                    <td>题目编号</td>
                                    <td>考查技能</td>
                                    <td>答题类型</td>
                                    <td>内容类型</td>
                                    <td>题目难度</td>
                                    <td>创建时间</td>
                                    <td>创建人</td>
                                    <td>主题</td>
                                    <td>所属学校</td>
                                    <td>正确率</td>
                                    <td>使用次数</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>122</td>
                                    <td>阅读</td>
                                    <td>选词填空</td>
                                    <td>对话</td>
                                    <td>高中v.1</td>
                                    <td>————</td>
                                    <td>万老师</td>
                                    <td>家庭聚会</td>
                                    <td>WE公用题库</td>
                                    <td>————</td>
                                    <td>————</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pag-15 exam-detail-cont ">
                        <div class="pag-15">
                            <p>
                                For this part, you are allowed 30 minutes to write a short essay on the following question. You should write at least 120 words but no more than 180 words.
                            </p>
                            <P>
                                Suppose you could change one important thing about your campus, what would you change and why?
                            </P>

                        </div>
                    </div>
                    <div class="bg-ed exam-detail-notes pag-15">
                        <div>建议考试时间 <i>20分钟</i></div>
                        <div>建议每题分数 <i>40分</i></div>
                        <div>考题数量 <i>1</i></div>
                    </div>
                </div>
                <!--选词填空预览-->
                <div>
                    <div class="exam-detail-tit clearfix">
                        <div class="exam-tit-table">
                            <table>
                                <thead>
                                <tr>
                                    <td>题目编号</td>
                                    <td>考查技能</td>
                                    <td>答题类型</td>
                                    <td>内容类型</td>
                                    <td>题目难度</td>
                                    <td>创建时间</td>
                                    <td>创建人</td>
                                    <td>主题</td>
                                    <td>所属学校</td>
                                    <td>正确率</td>
                                    <td>使用次数</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>122</td>
                                    <td>阅读</td>
                                    <td>选词填空</td>
                                    <td>对话</td>
                                    <td>高中v.1</td>
                                    <td>————</td>
                                    <td>万老师</td>
                                    <td>家庭聚会</td>
                                    <td>WE公用题库</td>
                                    <td>————</td>
                                    <td>————</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pag-15 exam-detail-cont ">
                        <div class="pag-15 ">
                            <div class="pag-15 bg-f8fdf8 banked-selected">
                                <p>
                                    It‘s our guilty pleasure: Watching TV is the most common everyday activity,after work and sleep, in many parts of the world. Americans view five hours of TV each day, and while we know that spending so much time sitting <span></span> can lead to obesity(肥胖症) and other diseases, researchers have now quantified just how being a couch potato can be. 
                                </p>
                                <p>
                                    In an analysis of data from eight large <span></span>  published studies, a Harvardled group reported in the Journal of the American Medical Association that for everytwo hours per day spent channel <span></span>,the risk of developing Type 2 diabetes(糖尿病)rose 20% over 8.5 years, the risk of heart disease increased 15% over a  <span></span> ,and the odds of dying permaturely <span></span> 13% during a seven-year follow-up. All of these <span></span> are linked to a lack of physical exercise.But compared with other sedentary(久的)activities,like knitting,viewing TV may be especially <span></span> at promoting unhealthy habits .For one,the sheemumber of hours we pass watching TV dwarfs the time we spend on anyting else.And other studies have found that watching ads for beer and popcon may make you more likely to <span></span> them.
                                </p>
                                <p>
                                    Even so , the authors admit that they did not conpare different sedentary activities to <span></span> whether TV watching was linked to a greater risk of diabetes,heart disease or clearly death compared with,say,reading.
                                </p>
                            </div>
                            <div class="banked-selected-word">
                                <ul class="clearfix">
                                    <li>conseme</li>
                                    <li>decade</li>
                                    <li>determine</li>
                                    <li>harmful</li>
                                    <li>effective</li>
                                    <li>outcomes</li>
                                    <li>passively</li>
                                    <li>previsously</li>
                                    <li>suffered</li>
                                    <li>consome</li>
                                    <li>previously</li>
                                    <li>determine</li>
                                    <li>harmful</li>
                                    <li>effective</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="bg-ed exam-detail-notes pag-15">
                        <div>建议考试时间 <i>20分钟</i></div>
                        <div>建议每题分数 <i>5分</i></div>
                        <div>考题数量 <i>4</i></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="exam-change-btn">修改</button>
            </div>
        </div>
    </div>
</div>
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
                            <select name="model_school">
                                <option value="0">--请选择--</option>
                                <?php
                                foreach($school as $key=>$value):
                                    ?>
                                    <option value="<?=$value->id?>"><?=$value->name?></option>
                                <? endforeach;?>
                            </select>
                        </li>
                        <li class="col-sm-4">
                            <select name="model_skill">
                                <option value="0">--请选择--</option>
                                <?php
                                foreach($skill as $key=>$value):
                                    ?>
                                    <option value="<?=$value->id?>"><?=$value->skill_name?></option>
                                <? endforeach;?>
                            </select>
                        </li>
                        <li class="col-sm-4">
                            <select name="model_diffculty">
                                <option value="0">--请选择--</option>
                                <?php
                                foreach($diffculty as $key=>$value):
                                    ?>
                                    <option value="<?=$value->id?>"><?=$value->difficulty_name?></option>
                                <? endforeach;?>
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

                    </div>
                    <!--                        <div>-->
                    <!--                            <h1 class="chooseExam-selected">已选</h1>-->
                    <!--                            <div class="chooseExam-item">-->
                    <!--                                <div class="chooseExam-item-info">-->
                    <!--                                    <span class="chooseExam-item-num">10229</span>-->
                    <!--                                    <span>新闻类</span>-->
                    <!--                                    <span>段落匹配</span>-->
                    <!--                                    <span>春节回家</span>-->
                    <!--                                </div>-->
                    <!--                                <div class="chooseExam-item-con">-->
                    <!--                                    <label for=""><input type="checkbox" checked><i></i></label>-->
                    <!--                                    <div>-->
                    <!--                                        <p>-->
                    <!--                                            a  Are Bad Times Healthy? Most people are worried about the health of the 	   economy. But does the economy also affect your health? It 'does, but not always.-->
                    <!--                                        </p>-->
                    <!--                                        <p>-->
                    <!--                                            b  Are Bad Times Healthy? Most people are worried about the-->
                    <!--                                        </p>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                                <a href="javascript:;" class="chooseExam-more">查看全部</a>-->
                    <!--                            </div>-->
                    <!--                            <div class="chooseExam-item">-->
                    <!--                                <div class="chooseExam-item-info">-->
                    <!--                                    <span class="chooseExam-item-num">10230</span>-->
                    <!--                                    <span>新闻类</span>-->
                    <!--                                    <span>段落匹配</span>-->
                    <!--                                    <span>春节回家</span>-->
                    <!--                                </div>-->
                    <!--                                <div class="chooseExam-item-con">-->
                    <!--                                    <label for=""><input type="checkbox" checked><i></i></label>-->
                    <!--                                    <div>-->
                    <!--                                        <p>-->
                    <!--                                            For this part, you are allowed 30 minutes to write a short essay based on the picture below. You should start your essay with a brief description of the picture and express your views on the reason of "China fever". You should write at least 120 words but no more  words..-->
                    <!--                                        </p>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                                <a href="javascript:;" class="chooseExam-more">查看全部</a>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                </div>
            </div>
            <div class="modal-footer text-center modal-footer-btn">
                <button type="button" class="btn prev-step" >上一步</button>
                <button type="button" class="btn chooseExam-save modal-btn-save">保存</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#choose-exam-box').on('shown.bs.modal', function () {
            getNewData();
        });
        var school_id = 0;
        var skill_id  = 0;
        var diffculty_id = 0;
        //选择试题
        $("select[name='model_school']").change(function(){
            var string = '';
            var _this = $(this);
            school_id = _this.val();
            getNewData();
        });
        $("select[name='model_skill']").change(function(){
            var string = '';
            var _this = $(this);
            skill_id = _this.val();
            getNewData();
        });
        $("select[name='model_diffculty']").change(function(){
            var string = '';
            var _this = $(this);
            diffculty_id = _this.val();
            getNewData();
        });

        function getNewData(){
            ajaxQuesList({school_id:school_id,skill_id:skill_id,diffculty_id:diffculty_id,pageIndex: 1, pageSize: 30 })
        }

        function ajaxQuesList($obj){
            $(".modal-content").showLoading();
            console.log($obj);
            var choose_ques = $(".chooseExam-cont-option-one");

            $.ajax({
                type: "GET",
                url: "<?=anchorurl('questions/getQuestionList')?>",
                dataType:"json",
                data: $obj,
                success:function (msg) {
                    $(".modal-content").hideLoading();
                    console.log(msg.data);
                    if(msg.data.length==0){
                        choose_ques.empty();
                        choose_ques.append("<span>暂无数据</span>");
                    }else{
                        var choose_ques_item = "";
                        var item_con = "";
                        $(msg.data).each(function(index,element){
                            if(element.skill_id==1){
                                item_con="<div class='chooseExam-item-con'>"
                                    +"<label for=''><input type='checkbox' name='checkbox' value="+element.subject_num+"><i></i></label>"
                                    +"<div>"
                                    +"<span >阅读理解</span>"
                                    +"<p>"+element.content+"</p>"
                                    +"</div></div>"
                            }else if(element.skill_id==2){
                                item_con="<div class='chooseExam-item-con'>"
                                    +"<label for=''><input type='checkbox' name='checkbox' value="+element.subject_num+"><i></i></label>"
                                    +"<div>"
                                    +"<span >段落匹配原文</span>"
                                    +"<p>"+element.content+"</p>"
                                    +"</div></div>"
                            }else if(element.skill_id==3){
                                item_con="<div class='chooseExam-item-con'>"
                                    +"<label for=''><input type='checkbox' name='checkbox' value="+element.subject_num+"><i></i></label>"
                                    +"<div>"
                                    +"<span >翻译原文</span>"
                                    +"<p>"+element.content+"</p>"
                                    +"</div></div>"
                            }else if(element.skill_id==4||element.skill_id==5){
                                item_con="<div class='chooseExam-item-con'>"
                                    +"<label for=''><input type='checkbox' name='checkbox' value="+element.subject_num+"><i></i></label>"
                                    +"<div class='clearfix'>"
                                    +"<span >听力原文</span>"
                                    +"<div class='chooseExam-audio'>"+element.content+"<em>(15分钟)</em>"
                                    +"<span>试听</span>"
                                    +"</div>"
                                    +"</div>"
                                    +"</div>"
                            }else if(element.skill_id==6){
                                item_con="<div class='chooseExam-item-con'>"
                                    +"<label for=''><input type='checkbox' name='checkbox' value="+element.subject_num+"><i></i></label>"
                                    +"<div>"
                                    +"<span >写作要求</span>"
                                    +"<p>"+element.content+"</p>"
                                    +"</div></div>"
                            }else if(element.skill_id==7){
                                item_con="<div class='chooseExam-item-con'>"
                                    +"<label for=''><input type='checkbox' name='checkbox' value="+element.subject_num+"><i></i></label>"
                                    +"<div>"
                                    +"<span >选词填空</span>"
                                    +"<p>"+element.content+"</p>"
                                    +"</div></div>"
                            }

                            choose_ques_item +=
                                "<div class='chooseExam-item'>"
                                +"<div class='chooseExam-item-info'>"
                                +"<span class='chooseExam-item-num'>"+element.subject_num+"</span>"
                                +"<span>"+element.content_type+"</span>"
                                +"<span>"+element.exa_skill+"</span>"
                                +"<span>"+element.theme+"</span>"
                                +"</div>"
                                + item_con
                                +"<a href='javascript:;' class='chooseExam-more'>查看全部</a>"
                                +"</div>";
                        });
                        choose_ques.empty();
                        choose_ques.append(choose_ques_item);
                    }
                }
            });
        }


        $("body").delegate('.btn-change-exam','click',function () {
            if($(this).text()=='重新选择'){
                $(this).parents('.del-ques-name').find('.ques_them').text("");
                $(this).parents('.del-ques-name').find('.ques_id').text("");
                $(this).text("选择")
            }
        })

        $("body").delegate('.modal-btn-save','click',function () {
            //保存所选题型
            $("#choose-exam-box").modal('hide');
            $(".ques_them").each(function (index) {
                if($(this).text()==''){
                    $(this).text($("input[name='checkbox']:checked").val());
                }
            });
            $(".ques_id").each(function (index) {
                if($(this).text()==''){
                    $(this).text($("input[name='checkbox']:checked").val());
                }
            });
            $(".btn-change-exam").each(function (index) {
                if($(this).text()=='选择'){
                    $(this).text('重新选择');
                }
            });


        });

        $('body').delegate("input[name='checkbox']",'click',function () {
            $(this).attr('checked','checked').parents('.chooseExam-item').siblings().find("input[name='checkbox']").removeAttr('checked');
        });
        //修改模块
        $('body').delegate('.exam-change-btn','click',function () {
            $('.new-exp-box').showLoading();
            var _this = $(this);
            var modelId = $(this).data('id');
            console.log(modelId);
//            发送异步请求传输问题
            $.ajax({
                url: '<?=anchorurl('papers/updataModel')?>',
                type: "POST",
                async: false,
                data: {
                    modelId: modelId,
                },
                success: function (msg) {
                    $('.new-exp-box').hideLoading();
                    var jsonarray= $.parseJSON(msg);
                    console.log(jsonarray);
                    var question = ""
                    var select = "<select name='skill'>";
                    <?php foreach($skill as $key=>$value): ?>
                    select+="<option value='<?=$value->id?>'><?=$value->skill_name?></option>"
                    <? endforeach;?>
                    select+="</select>"

                    $(jsonarray.modeSection).each(function (i,ele) {
                        question += "<div class='bg-f8fdf8 pag-15 new-section' style='margin-bottom: 10px'>"
                            +"<div class='clearfix mgb-10 pagh-5 '>"
                            +"<div class='col-sm-1 text-right'>小节名称:</div>"
                            +"<div class='col-sm-2'>"
                            +"<input type='hidden' name='section_id' value='"+ele.id+"'>"
                            +"<input type='text' name='section_name' value='"+ele.section_name+"' class='input-h26'>"
                            +"</div>"
                            +"<div class='col-sm-1'>"
                            +"<a href='javascript:;' class='text-danger del-p del-p-pagr10 del-new-section'>删除小节</a>"
                            +"</div>"
                            +"</div>"
                            +"<div class='clearfix mgb-10 pagh-5 '>"
                            +"<div class='col-sm-1 text-right'>答题指南:</div>"
                            +"<div class='col-sm-11'>"
                            +"<div class='bor-all-999'><input style='width: 100%;' value='"+ele.answer_guide+"' name='answer' placeholder='输入内容区域'/></div>"
                            +"</div>"
                            +"</div>"
                            +"<div class='bor-ccc pag-15'>"
                            +"<div class='ques-item'>"
                        $(jsonarray.modeQuesData).each(function(index,element){
                            if(ele.id==element.section_id){
                                question +=
                                    "<div class='bort-dashed-col999 pag-15 del-ques-name' >"
                                    +"<div class='clearfix mgb-10 pagh-5'>"
                                    +"<div class='col-sm-1 text-center'>考题<span class='model_ques_id'>"+element.id+"</span></div>"
                                    +"<a href='javascript:;' class='text-danger del-p del-p-pagr10 del-ques'>删除考题</a>"
                                    +"</div>"
                                    +"<div class='clearfix mgb-10 pagh-5'>"
                                    +"<div class='col-sm-1 text-right'>答题类型</div>"
                                    +"<div class='col-sm-2'>"
                                    + select
                                    +"</div>"
                                    +"</div>"
                                    +"<div class='clearfix mgb-10 pagh-5'>"
                                    +"<div class='col-sm-1 text-right'>考题数量</div>"
                                    +"<div class='col-sm-2'>"
                                    +"<input name='ques_num' class='input-h26' type='text' placeholder='请输入考题数量'>"
                                    +"</div>"
                                    +"</div>"
                                    +"<div class='clearfix mgb-10 pagh-5'>"
                                    +"<div class='col-sm-1 text-right'>考<span style='display: inline-block;width:35%;'></span>题</div>"
                                    +"<div class='col-sm-6'>"
                                    +"<ul class='theme-list'>"
                                    +"<li>主题：<span class='ques_them'>"+element.question_item+"</span> <span class='theme-type'>编号：<span class='ques_id'>"+element.question_id+"</span></span></li>"
                                    +"</ul>"
                                    +"<div class='col-sm-4' style='padding-left:0;'><button class='btn-success sel-h26 text-center btn-change-exam' data-toggle='modal' data-target='#choose-exam-box'>重新选择</button></div>"
                                    +"</div>"
                                    +"</div>"
                                    +"<div class='clearfix mgb-10 pagh-5'>"
                                    +"<div class='col-sm-1 text-right'>考试时间</div>"
                                    +"<div class='col-sm-2 exam-cont-time' data-name='分钟'>"
                                    +"<input type='text' value='"+element.question_time+"' name='ques_time' class='input-h26' >"
                                    +"</div>"
                                    +"</div>"
                                    +"<div class='clearfix mgb-10 pagh-5'>"
                                    +"<div class='col-sm-1 text-right'>每题分数</div>"
                                    +"<div class='col-sm-2 exam-cont-time' data-name='分'>"
                                    +"<input value='"+element.scores+"' class='input-h26' name='ques_score' type='text'>"
                                    +"</div>"
                                    +"<div class='col-sm-1 col-999'>(共十分)</div>"
                                    +"</div>"
                                    +"</div>";
                            }
                        });
                    })
                    question +="</div>"
                    var Model = _this.parents('.del-model-name');
                    var saveModel=
                        "<div>"
                        +"<div class='clearfix mgb-10 pagh-5'>"
                        +"<div class='col-sm-1 text-right'>模块名称</div>"
                        +"<div class='col-sm-2'>"
                        +"<input type='text' value='"+jsonarray.modeData.title+"' name='model_name' class='input-h26'>"
                        +"</div>"
                        +"<div class='col-sm-1'>"
                        +"<a href='javascript:;' class='text-danger del-p del-p-pagr10 del-model'>删除模块</a>"
                        +"</div>"
                        +"</div>"
                        +"<div class='clearfix mgb-10 pagh-5'>"
                        +"<div class='col-sm-1 text-right'>考查类型</div>"
                        +"<div class='col-sm-2'>"
                        + select
                        +"</div>"
                        +"</div>"
                        +"<div class='clearfix mgb-10 pagh-5' >"
                        +"<div class='col-sm-1 text-right'>考试时间</div>"
                        +"<div class='col-sm-2 exam-cont-time' data-name='分钟'>"
                        +"<input type='text' value='"+jsonarray.modeData.model_time+"' name='model_time'  class='exam-cont-time input-h26' >"
                        +"</div>"
                        +"</div>"
                        +"</div>"
                        + question
                        +"<div class='clearfix pagh-5 one-item'>"
                        +"<div class='col-sm-1 text-right'>"
                        +"<a href='javascript:;' class='text-info add-new-ques-item'>添加考题</a>"
                        +"</div>"
                        +"</div>"
                        +"</div>"
                        +"</div>"
                        +"<div class='clearfix text-center'>"
                        +"<button class=' btn-info exam-save-btn' data-modelid='"+jsonarray.modeData.id+"'>确认修改</button>"
                        +"</div>";
                    Model.empty();
                    Model.append(saveModel);
                }
            });
        });
        //保存模块
        $('body').delegate('.exam-save-btn','click',function () {
            var json = new Object();
            var par = $(this).parents(".del-model-name");

            var section = $(this).parents(".section_con");
            var _this = $(this);
            var modelid = $(this).data('modelid');
            console.log(modelid);
            json.paperId = $("#paperId").val();//试卷id
            json.modelName = par.find("input[name='model_name']").val();//模块名称
            json.skill = par.find("select[name='skill']").val();
            json.model_time = par.find("input[name='model_time']").val();//答题时间
            json.section_name = par.find("input[name='section_name']").val();//小节名称
            json.answer = par.find("input[name='answer']").val();//答题指南

            var sections = new Array();
            //循环小节
            $(this).parents('.del-model-name').find(".new-section").each(function () {
                //循环小节下的问题
                var section_obj = new Object();
                section_obj.section_name = $(this).find("input[name='section_name']").val();
                section_obj.answer = $(this).find("input[name='answer']").val();
                section_obj.section_id = $(this).find("input[name='section_id']").val();
                section_obj.section =  new Array();
                $(this).find(".del-ques-name").each(function () {
                    var quesItem = {
                        type: $(this).find("select[name='type']").val(),
                        model_ques_id:$(this).find(".model_ques_id").text(),
                        ques_id:$(this).find(".ques_id").text(),
                        ques_them:$(this).find(".ques_them").text(),
                        ques_time:$(this).find("input[name='ques_time']").val(),
                        ques_score:$(this).find("input[name='ques_score']").val()
                    };
                    section_obj.section.push(quesItem);
                });
                sections.push(section_obj);
            });
            var arr = sections;
            json.per =arr;
            console.log(JSON.stringify(json));
            var data = JSON.stringify(json);
            var url = "";
            if(modelid == ''){
                url = "<?=anchorurl('papers/saveModel')?>";
            }else{
                url = "<?=anchorurl('papers/updateModelData')?>";
            }
//            发送异步请求传输问题
            $.ajax({
                url: url,
                type: "POST",
                async: false,
                data: {
                    paper: data,
                    'modelid':modelid
                },
                beforeSend: function(){
                    $('.new-exp-box').showLoading();
                },
                success: function (msg) {
                    $('.new-exp-box').hideLoading();
                    var jsonarray= $.parseJSON(msg);
                    console.log(jsonarray);
                    var question = ""
                    $(jsonarray.modeSection).each(function (i,ele) {
                        question +="<div class='bg-f8fdf8 pag-15 new-section' style='margin-bottom: 10px;'>"
                            +"<div class='clearfix mgb-10 pagh-5 '>"
                            +"<div class='col-sm-1 text-right'>小节名称:</div>"
                            +"<div class='col-sm-1'>"+ele.section_name+"</div>"
                            +"</div>"
                            +"<div class='clearfix mgb-10 pagh-5 '>"
                            +"<div class='col-sm-1 text-right'>答题指南:</div>"
                            +"<div class='col-sm-11'>"+ele.answer_guide+"</div>"
                            +"</div>"
                        $(jsonarray.modeQuesData).each(function(index,element){
                            if(ele.id==element.section_id){
                                question +=
                                    "<div class='bor-ccc pag-15'>"
                                    +"<div class='clearfix mgb-10 pagh-5'>"
                                    +"<div class='col-sm-1 text-center'>考题<span class='model_ques_id'>"+element.id+"</span></div>"
                                    +"</div>"
                                    +"<div class='clearfix mgb-10 pagh-5 '>"
                                    +"<div class='col-sm-1 text-right'>答题类型:</div>"
                                    +"<div class='col-sm-1'>按需求写作</div>"
                                    +"</div>"
                                    +"<div class='clearfix mgb-10 pagh-5 '>"
                                    +"<div class='col-sm-1 text-right'>考<span style='display: inline-block;width:35%;'></span>题:</div>"
                                    +"<div class='col-sm-6'>"
                                    +"<div>随机</div>"
                                    +"<ul class='theme-list'>"
                                    +"<li>主题："+element.question_id+" <span class='theme-type'>（编号："+element.question_id+"）</span><a href='javascript:;' data-quesid='"+element.question_id+"' class='text-info preview' data-toggle='modal' data-target='.new-exp-box'>预览</a></li>"
                                    +"</ul>"
                                    +"</div>"
                                    +"</div>"
                                    +"<div class='clearfix mgb-10 pagh-5 '>"
                                    +"<div class='col-sm-1 text-right'>答题时间:</div>"
                                    +"<div class='col-sm-1'>"+element.question_time+"分钟</div>"
                                    +"</div>"
                                    +"<div class='clearfix mgb-10 pagh-5 '>"
                                    +"<div class='col-sm-1 text-right'>考题分数:</div>"
                                    +"<div class='col-sm-1'>"+element.scores+"分</div>"
                                    +"</div></div>";
                            }
                        });
                        question += "</div>";
                    });

                    var Model = _this.parents('.del-model-name');
                    var saveModel=
                        "<div>"
                        +"<div class='clearfix mgb-10 pagh-5 '>"
                        +"<div class='col-sm-1 text-right'>模块名称:</div>"
                        +"<div class='col-sm-1'>"+jsonarray.modeData.title+"</div>"
                        +"</div>"
                        +"<div class='clearfix mgb-10 pagh-5'>"
                        +"<div class='col-sm-1 text-right'>考查类型:</div>"
                        +"<div class='col-sm-1'>"+jsonarray.modeData.type+"</div>"
                        +"</div>"
                        +"<div class='clearfix mgb-10 pagh-5'>"
                        +"<div class='col-sm-1 text-right'>考试时间:</div>"
                        +"<div class='col-sm-1'>"+jsonarray.modeData.model_time+"分钟</div>"
                        +"</div>"
                        +"</div>"
                        + question
                        +"<div class='text-center'>"
                        +"<button class='exam-change-btn' data-id = '"+jsonarray.modeData.id+"'>修改</button>"
                        +"</div>";
                    Model.empty();
                    Model.append(saveModel);
                }
            });
        });

        //预览考题
        $('body').delegate('.preview','click',function () {
            $(".modal-content").showLoading();
            var quesId = $(this).data("quesid");
            console.log(quesId);
            var questionDeatil = $(".preview-question");
            $.ajax({
                type: "POST",
                url: "<?=anchorurl('questions/getQuestionById')?>",
                dataType:"json",
                data: {
                    quesId:quesId
                },
                success:function (msg) {
                    $(".modal-content").hideLoading();
                    console.log(msg);
                    var ques_item="";
                    if(msg.quesitem.question.length>0){
                        $(msg.quesitem.question).each(function(index,element){
                            var ques_item_option = ""
                            if(msg.quesitem.question[index].ques_item.length > 0){
                                $(msg.quesitem.question[index].ques_item).each(function(i,ele){
                                    ques_item_option +=
                                        "<li class='clearfix'>"
                                        +"<div class='per-5 pull-left text-center'><input type='checkbox'></div>"
                                        +"<div class='per-95 pull-left text-justify'>"+ele.title+"</div>"
                                        +"</li>"
                                });
                            }
                            ques_item +=
                                "<li class='pagb-15 mgb-10'>"
                                +"<div class='clearfix pagh-5 pagb-15'>"
                                +"<div class='col-sm-1'>问题:"+index+"</div>"
                                +"<div class='col-sm-11'>"+element.title+"</div>"
                                +"</div>"
                                +"<ul>"
                                + ques_item_option
                                +"</ul>"
                                +"</li>";
                        });
                    }
                    var yltitle='';
                    if(msg.data[0].skill_id==1){
                        //阅读理解
                        yltitle="<div style='margin-bottom:30px;'>"
                            +"<div class='clearfix listen-title' style='height: 200px;overflow: hidden;'>"
                            + "<span>"+msg.data[0].content+"</span>"
                            +"<div class='audition-btn pull-left'>"
                            +"</div>"
                            +"</div>"
                            +"</div>";
                    }else if(msg.data[0].skill_id==2){
                        //段落匹配
                        yltitle="<div class='clearfix mgb-10'><div class='pull-left per-5 text-center'>"+msg.data[0].content+"</div><div class='pull-left per-95 text-justify'>"+msg.data[0].content+"</div></div>"
                    }else if(msg.data[0].skill_id==3){
                        //翻译
                        yltitle="<div class='pag-15'> <p class='mgb-10'>"+msg.data[0].content+"</p></div>"
                    }else if(msg.data[0].skill_id==4||msg.data[0].skill_id==5){
                        //听音频
                        yltitle="<div style='margin-bottom:30px;'>"
                            +"<div class='clearfix listen-title'>"
                            + "<span>"+msg.data[0].content+"</span>"
                            +"<div class='audition-btn pull-left'>"
                            +"<button class='btn btn-success'>试听</button>"
                            +"<audio src='' controls='' class='audition-target'></audio>"
                            +"</div>"
                            +"</div>"
                            +"</div>";
                    }else if(msg.data[0].skill_id==6){
                        //写作
                        yltitle="<div class='pag-15'> <p class='mgb-10'>"+msg.data[0].content+"</p></div>"
                    }else if(msg.data[0].skill_id==7){
                        //选词填空
                        yltitle="<div class='pag-15 bg-f8fdf8 banked-selected'><p>"+msg.data[0].content+"</p></div>"
                    }

                    var ques_detail=
                        "<div>"
                        +"<div class='exam-detail-tit clearfix'>"
                        +"<div class='exam-tit-table'>"
                        +"<table>"
                        +"<thead>"
                        +"<tr><td>题目编号</td><td>考查技能</td><td>答题类型</td><td>内容类型</td><td>题目难度</td><td>创建时间</td>"
                        +"<td>创建人</td><td>主题</td><td>所属学校</td><td>正确率</td><td>使用次数</td></tr>"
                        +"</thead>"
                        +"<tbody>"
                        +"<tr><td>"+msg.data[0].subject_num+"</td><td>"+msg.data[0].exa_skill+"</td><td>"+msg.data[0].answer_type+"</td><td>"+msg.data[0].content_type+"</td><td>"+msg.data[0].subject_diff+"</td><td>"+msg.data[0].build_time+"</td><td>"+msg.data[0].build_user+"</td>"
                        +"<td>"+msg.data[0].theme+"</td><td>"+msg.data[0].school+"</td><td>"+msg.data[0].accuracy+"</td><td>"+msg.data[0].use_count+"</td></tr>"
                        +"</tbody>"
                        +"</table>"
                        +"</div></div>"
                        + yltitle
                        +"<div class='pag-15 exam-detail-cont'>"
                        +"<div class='pag-15'>"
                        +"<ul>"
                        + ques_item
                        +"</ul>"
                        +"</div>"
                        +"</div>"
                        +"<div class='bg-ed exam-detail-notes pag-15'>"
                        +"<div>建议考试时间 <i>20分钟</i></div>"
                        +"<div>建议每题分数 <i>5分</i></div>"
                        +"<div>考题数量 <i>3</i></div>"
                        +"</div>"
                        +"</div>";
                    questionDeatil.empty();
                    questionDeatil.append(ques_detail);
                }
            });
        });
        //预览考题
        $('body').delegate('.preview','click',function () {
            var quesId = $(this).data("quesid");
            console.log(quesId);
            var questionDeatil = $(".preview-question");
            $.ajax({
                type: "POST",
                url: "<?=anchorurl('questions/getQuestionById')?>",
                dataType:"json",
                data: {
                    quesId:quesId
                },
                success:function (msg) {
                    console.log(msg);
                    var ques_item="";
                    if(msg.quesitem.question.length>0){
                        $(msg.quesitem.question).each(function(index,element){
                            var ques_item_option = ""
                            if(msg.quesitem.question[index].ques_item.length > 0){
                                $(msg.quesitem.question[index].ques_item).each(function(i,ele){
                                    ques_item_option +=
                                        "<li class='clearfix'>"
                                        +"<div class='per-5 pull-left text-center'><input type='checkbox'></div>"
                                        +"<div class='per-95 pull-left text-justify'>"+ele.title+"</div>"
                                        +"</li>"
                                });
                            }
                            ques_item +=
                                "<li class='pagb-15 mgb-10'>"
                                +"<div class='clearfix pagh-5 pagb-15'>"
                                +"<div class='col-sm-1'>问题:"+index+"</div>"
                                +"<div class='col-sm-11'>"+element.title+"</div>"
                                +"</div>"
                                +"<ul>"
                                + ques_item_option
                                +"</ul>"
                                +"</li>";
                        });
                    }
                    var yltitle='';
                    if(msg.data[0].skill_id==1){
                        //阅读理解
                        yltitle="<div style='margin-bottom:30px;'>"
                            +"<div class='clearfix listen-title' style='height: 200px;overflow: hidden;'>"
                            + "<span>"+msg.data[0].content+"</span>"
                            +"<div class='audition-btn pull-left'>"
                            +"</div>"
                            +"</div>"
                            +"</div>";
                    }else if(msg.data[0].skill_id==2){
                        //段落匹配
                        yltitle="<div class='clearfix mgb-10'><div class='pull-left per-5 text-center'>"+msg.data[0].content+"</div><div class='pull-left per-95 text-justify'>"+msg.data[0].content+"</div></div>"
                    }else if(msg.data[0].skill_id==3){
                        //翻译
                        yltitle="<div class='pag-15'> <p class='mgb-10'>"+msg.data[0].content+"</p></div>"
                    }else if(msg.data[0].skill_id==4||msg.data[0].skill_id==5){
                        //听音频
                        yltitle="<div style='margin-bottom:30px;'>"
                            +"<div class='clearfix listen-title'>"
                            + "<span>"+msg.data[0].content+"</span>"
                            +"<div class='audition-btn pull-left'>"
                            +"<button class='btn btn-success'>试听</button>"
                            +"<audio src='' controls='' class='audition-target'></audio>"
                            +"</div>"
                            +"</div>"
                            +"</div>";
                    }else if(msg.data[0].skill_id==6){
                        //写作
                        yltitle="<div class='pag-15'> <p class='mgb-10'>"+msg.data[0].content+"</p></div>"
                    }else if(msg.data[0].skill_id==7){
                        //选词填空
                        yltitle="<div class='pag-15 bg-f8fdf8 banked-selected'><p>"+msg.data[0].content+"</p></div>"
                    }
                    var ques_detail=
                        "<div>"
                        +"<div class='exam-detail-tit clearfix'>"
                        +"<div class='exam-tit-table'>"
                        +"<table>"
                        +"<thead>"
                        +"<tr><td>题目编号</td><td>考查技能</td><td>答题类型</td><td>内容类型</td><td>题目难度</td><td>创建时间</td>"
                        +"<td>创建人</td><td>主题</td><td>所属学校</td><td>正确率</td><td>使用次数</td></tr>"
                        +"</thead>"
                        +"<tbody>"
                        +"<tr><td>"+msg.data[0].subject_num+"</td><td>"+msg.data[0].exa_skill+"</td><td>"+msg.data[0].answer_type+"</td><td>"+msg.data[0].content_type+"</td><td>"+msg.data[0].subject_diff+"</td><td>"+msg.data[0].build_time+"</td><td>"+msg.data[0].build_user+"</td>"
                        +"<td>"+msg.data[0].theme+"</td><td>"+msg.data[0].school+"</td><td>"+msg.data[0].accuracy+"</td><td>"+msg.data[0].use_count+"</td></tr>"
                        +"</tbody>"
                        +"</table>"
                        +"</div></div>"
                        + yltitle
                        +"<div class='pag-15 exam-detail-cont'>"
                        +"<div class='pag-15'>"
                        +"<ul>"
                        + ques_item
                        +"</ul>"
                        +"</div>"
                        +"</div>"
                        +"<div class='bg-ed exam-detail-notes pag-15'>"
                        +"<div>建议考试时间 <i>20分钟</i></div>"
                        +"<div>建议每题分数 <i>5分</i></div>"
                        +"<div>考题数量 <i>3</i></div>"
                        +"</div>"
                        +"</div>";
                    questionDeatil.empty();
                    questionDeatil.append(ques_detail);
                }
            });
        });
    });
</script>
</body>
</html>