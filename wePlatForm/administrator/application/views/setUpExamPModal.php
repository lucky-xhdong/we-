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
              考卷>考卷详情
            </div>
          </div>
          <!-- / main header -->
          <div class="wrapper-md">
            <div class="panel panel-default">
              <a href="javascript:;" class="btn btn-info new-icon" data-toggle="modal" data-target=".new-exp-box">
                预览考题
              </a>
              <div class="wrap-tit examp-cont-tit">
                考卷详情
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


  <!--        模态框-->
  <div class="new-exp-box modal fade " role="dialog">
    <div class="modal-dialog modal-lg modal-nor">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">题目详情</h4>
        </div>
        <div class="modal-body" style="padding:0;">
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
</div>
</body>
</html>