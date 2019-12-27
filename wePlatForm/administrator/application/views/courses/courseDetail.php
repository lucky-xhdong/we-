<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('meta');?>
  <?php $this->load->view('tmpl/mmgrid');?>

    <?php $this->load->view('tmpl/fileupload');?>
    <?php $this->load->view('tmpl/jqueryvalidate'); ?>
    <link rel="stylesheet" href="<?=base_url()?>media/administrator/css/audio.css" type="text/css" />


</head>
<style>
  .jqx-chart-legend-text{
    opacity: 0 !important;
  }
</style>
<body>
<?php

$childTypes = array("0"=>"--select--","replay"=>"replay","record"=>"record","sr"=>"sr","score"=>"score","repeat"=>"repeat","audio"=>"audio","mouth"=>"mouth","video"=>"video","all_right"=>"all_right");
?>
<div class="app app-header-fixed ">
  <!-- header -->
  <?php $this->load->view('header');?>
  <!-- / header -->

  <!-- aside -->
  <?php $this->load->view('aside');?>
  <!-- / aside -->

  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <?php if(isset($event->id)):?>
            <?php
                $eventInfo = $event->getEventInfo();
             ?>
        <?php endif;?>

      <div class="hbox hbox-auto-xs hbox-auto-sm" ng-init=" app.settings.asideFolded = false;  app.settings.asideDock = false;">
        <!-- main -->
        <div class="col">
            <div class="bg-light lter b-b wrapper-md" style="height: auto">
                <div class="col-md-8">
                    <!--        <select name="" id="">-->
                    <!--          <option value="">西部吧</option>-->
                    <!--        </select>-->
                    <!--        <select name="" id="">-->
                    <!--          <option value="">甘肃省</option>-->
                    <!--        </select>-->
                    <!--        <select name="" id="">-->
                    <!--          <option value="">兰州市</option>-->
                    <!--        </select>-->
                    <!--        <select name="" id="">-->
                    <!--          <option value="">某某区</option>-->
                    <!--        </select>-->
                    <p>
                        <a href="<?=anchorurl('courses')?>">课程管理</a><span>&nbsp;&gt;&nbsp;</span>
                        <a href="<?=anchorurl('courses/getCourseUnit/'.$course->id)?>"><?=$course->name?></a><span>&nbsp;&gt;&nbsp;</span>
                        <a href="<?=anchorurl('courses/getUnitLessons/'.$unit->id)?>"><?=$unit->name?></a><span>&nbsp;&gt;&nbsp;</span>
                        <a href="<?=anchorurl('courses/getLessonparts/'.$lesson->id)?>"><?=$lesson->name?></a><span>&nbsp;&gt;&nbsp;</span>
                        <a href="<?=anchorurl('parts/getEventList/'.$part->id)?>"><?=$part->name?></a><span>&nbsp;&gt;&nbsp;</span>
                        <a href="javascript:;">Event Item</a>
                    </p>
                </div>

                <!-- 模态框（Modal） -->
            </div>
          <!-- main header -->
          <!-- / main header -->
          <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
            <!-- 图标区域 结束 -->
            <!-- tasks -->

            <div class="row">
              <div class="col-md-12">
                <div class="app-content" role="main" style="margin-left: 0">
                  <div class="app-content-body ">
                    <div class="panel panel-default">
                      <div class="table-tit-box">
                        <div class="col-md-6">
                          <h1 class="table-tit">详情信息</h1>
                        </div>
                          <div class="col-md-6">
                              <a href="javascript:;" class="btn  btn-success btn-success-define pull-right" id="submitEventTwo">保存</a>
                          </div>
                      </div>
                      <div class="courseDetail-box clear">
                          <div class="col-sm-12  courseDetail-con">
                              <!--type-->
                            <div class="clear courseDetail-item">
                                <div class="col-sm-3">type:</div>
                                <div class="col-sm-9">
                                    <select name="type" id="type" class="col-sm-4">
                                        <?php foreach($eventTypes as $eventType):?>
                                            <?php if(isset($event->id) && $event->type == $eventType->event_type):?>
                                                <option value="<?=$eventType->event_type?>" selected><?=$eventType->name?></option>
                                            <?php else:?>
                                            <option value="<?=$eventType->event_type?>"><?=$eventType->name?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div id="speech_content" <?php if((isset($event->id) && $event->type != "speech") || !isset($event->id)) echo 'style="display: none"';?>>
                                <div class="clear courseDetail-item">
                                    <div class="col-sm-3">content ZH:</div>
                                    <div class="col-sm-9">
                                        <textarea name="text"  id="content_zh" class="col-sm-8"><?php if(isset($event->id)) echo $event->content_zh;?></textarea>
                                    </div>
                                </div>
                                <div class="clear courseDetail-item">
                                    <div class="col-sm-3">content En:</div>
                                    <div class="col-sm-9">
                                        <textarea name="text"  id="content_en" class="col-sm-8"><?php if(isset($event->id)) echo $event->content_en;?></textarea>
                                    </div>
                                </div>

                                <div class="clear courseDetail-item">
                                    <div class="col-sm-3">speech keywords:</div>
                                    <div class="col-sm-9">
                                        <textarea name="text"  id="speech_keywords" class="col-sm-8"><?php if(isset($event->id)) echo $event->speech_keywords;?></textarea>
                                    </div>
                                </div>

                            </div>

                              <!--timeRange-->
                              <div class="clear courseDetail-item timeRange">
                                  <div class="col-sm-3">timeRange:</div>
                                  <div class="col-sm-9">
                                      <input type="text" id="timeRange" value="<?php if(isset($event->id)) echo $event->timeRange;?>" class="col-sm-4" name="timeRange">
                                  </div>
                              </div>

                              <!--media_filename-->
                              <div class="clear courseDetail-item audiobody">
                                  <div class="col-sm-3 mediafile-name">media_filename:</div>
                                  <div class="col-sm-9">
                                      <div class="mediafile-icon media_file media_filename_video">
                                          <?php if(isset($event->id)):?>
                                              <?php if(count($eventInfo['media_list']) >0):?>
                                                  <?php
                                                  $mediaPartInfo = $eventInfo['media_list'][0];
                                                  ?>
                                                  <?php if($mediaPartInfo['type'] == "audio"):?>
                                                      <div class="media_box">
                                                          <div class="media_play">
                                                              <audio src="<?=$mediaPartInfo['originurl']?>"></audio>
                                                          </div>
                                                          <div class="media_progress">
                                                              <span class="media_bar"></span>
                                                              <div class="media_control"></div>
                                                          </div>
                                                      </div>
                                                  <?php elseif($mediaPartInfo['type'] == "video"):?>
                                                      <style>
                                                          .media_filename_video{
                                                              height: 220px!important;
                                                          }
                                                      </style>
                                                      <div class="video_box">
                                                          <a href="javascript:;" class="video-icon video_play">
                                                              <video src="<?=$mediaPartInfo['originurl']?>" style="height:200px!important;"></video>
                                                          </a>
                                                      </div>
                                                  <?php endif;?>
                                              <?php endif;?>
                                          <?php endif;?>

                                      </div>
                                      <input type="hidden" id="media_file_ids" value="<?php if(isset($event->id)) echo $event->media_file_ids;?>" name="media_file_ids">
                                      <button class="btn btn-info" data-toggle="modal" data-trigger="media_model" data-name="media_file_ids" data-type="media" data-target=".update-icon-box">选取文件</button>
                                      <?php if(isset($event->id) && !empty($event->media_file_ids)):?>
                                          <button class="btn btn-danger removeMedia">删除</button>
                                      <?php endif;?>
                                  </div>
                              </div>
                              <!--picture-->
                              <div class="clear courseDetail-item">
                                  <div class="col-sm-3">picture:</div>
                                  <div class="col-sm-9 media_file">
                                      <input type="hidden" id="picture_file_ids" value="<?php if(isset($event->id)) echo $event->picture_file_ids;?>" name="picture_file_ids">
                                      <button class="btn btn-info"  data-toggle="modal" data-trigger="media_picture" data-name="picture_file_ids" data-type="image" data-target=".update-icon-box">选取图片</button>
                                      <ul class="clear courseDetail-imgs picture_file_ids">
                                          <?php if(isset($event->id)):?>
                                              <?php foreach($eventInfo['picture_list'] as $piciture):?>
                                                  <li> <img src="<?=$piciture['originurl']?>" alt=""> <i class="fa fa-close removePicture" aria-hidden="true" data-id="<?=$piciture['id']?>"></i> </li>
                                              <?php endforeach;?>
                                          <?php endif;?>
                                      </ul>
                                  </div>
                              </div>

                             <div id="common_content" <?php if(isset($event->id) && $event->type == "speech") echo 'style="display: none"';?>>
                                 <!--text-->
                                 <div class="clear courseDetail-item">
                                     <div class="col-sm-3">text:</div>
                                     <div class="col-sm-9">
                                         <textarea name="text"  id="text" class="col-sm-8"><?php if(isset($event->id)) echo $event->text;?></textarea>
                                     </div>
                                 </div>
                                 <!--text-->
                                 <!--answer-->
                                 <div class="clear courseDetail-item">
                                     <div class="col-sm-3">answer:</div>
                                     <div class="col-sm-9">
                                         <textarea name="answer"  id="answer" class="col-sm-8"><?php if(isset($event->id)) echo $event->answer;?></textarea>
                                     </div>
                                 </div>

                                 <div class="clear courseDetail-item">
                                     <div class="col-sm-3">answers:</div>
                                     <div class="col-sm-9">
                                         <div>
                                              <span style="color: red;">
                                                  仅限于多个语音识别答案(录入如:It is a bag.,It's a bag.,It's bag.)
                                                  目前支持事件类型为(question_and_answer_sr,look_and_speak_answer)
                                              </span>
                                         </div>
                                         <div>
                                             <textarea name="answers"  id="answers" class="col-sm-8"><?php if(isset($event->id)) echo $event->answers;?></textarea>
                                         </div>
                                     </div>
                                 </div>


                                 <!--answer-->
                                 <!--answer-->
                                 <div class="clear courseDetail-item">
                                     <div class="col-sm-3">cloze answer:</div>
                                     <div class="col-sm-9">
                                         <textarea name="cloze_answer" id="cloze_answer" class="col-sm-8"><?php if(isset($event->id)) echo $event->cloze_answer;?></textarea>
                                     </div>
                                 </div>
                                 
                                 <!-- answer-->
                                 <div class="clear courseDetail-item timeRange">
                                     <div class="col-sm-3">scores:</div>
                                     <div class="col-sm-9">
                                         <input type="text" id="scores" value="<?php if(isset($event->id)) echo $event->scores;?>" class="col-sm-4" name="scores">
                                     </div>
                                 </div>

                                 <!--timeRange-->
                                 <div class="clear courseDetail-item timeRange">
                                     <div class="col-sm-3">items生成:</div>
                                     <div class="col-sm-9">
                                         <input type="text" id="itemsOrigin" value="" class="col-sm-4">
                                     </div>
                                 </div>


                                 <div class="clear courseDetail-item timeRange">
                                     <div class="col-sm-3">system_key:</div>
                                     <div class="col-sm-9">
                                         <input type="text" name="system_key" id="system_key" value="<?php if(isset($event->id)) echo $event->system_key;?>"  class="col-sm-4">
                                     </div>
                                 </div>




                                 <!--timeRange-->
                                 <div class="clear courseDetail-item">
                                     <div class="col-sm-3">displayKewords:</div>
                                     <div class="col-sm-9">
                                         <input type="text" id="displayKewords" value="<?php if(isset($event->id)) echo $event->displayKewords;?>" class="col-sm-4" name="displayKewords">
                                     </div>
                                 </div>

                                 <!--timeRange-->
                                 <div class="clear courseDetail-item">
                                     <div class="col-sm-3">  all right:</div>
                                     <div class="col-sm-9">
                                         <input type="text" id="all_right" value="<?php if(isset($event->id)) echo $event->all_right;?>" class="col-sm-4" name="all_right">
                                     </div>
                                 </div>

                                 <!--Name 如果有角色,这些NAME-->
                                 <div class="clear courseDetail-item timeRange">
                                     <div class="col-sm-3">Name(角色名称):</div>
                                     <div class="col-sm-9">
                                         <input type="text" placeholder="如果有角色,这写NAME" id="name" value="<?php if(isset($event->id)) echo $event->name;?>" class="col-sm-4" name="name">
                                     </div>
                                 </div>

                                 <!--picture-->
                                 <div class="clear courseDetail-item">
                                     <div class="col-sm-3">角色头像:</div>
                                     <div class="col-sm-9 media_file">
                                         <input type="hidden" id="avatar_id" value="<?php if(isset($event->id)) echo $event->avatar_id;?>" name="avatar_id">
                                         <button class="btn btn-info"  data-toggle="modal" data-trigger="media_model" data-name="avatar_id" data-type="image" data-target=".update-icon-box">选取图片</button>
                                         <ul class="clear courseDetail-imgs avatar_id">
                                             <?php if(isset($event->id)):?>
                                                 <?php foreach($eventInfo['avatar_picture_list'] as $piciture):?>
                                                     <li> <img src="<?=$piciture['originurl']?>" alt=""> <i class="fa fa-close removePicture" aria-hidden="true" data-id="<?=$piciture['id']?>"></i> </li>
                                                 <?php endforeach;?>
                                             <?php endif;?>
                                         </ul>
                                     </div>
                                 </div>


                                 <?php
                                 $choiceListArray = array("multipleChoices",
                                     "middle_multipleChoices",
                                     "review_multipleChoices_click",
                                     "MTmultipleChoice",
                                     "MTmultipleChoices",
                                     "SRmultipleChoice",
                                     "review_multipleChoices_speak","primary_review_multipleChoices_speak");
                                 ?>
                                  <!--items-->
                                  <div class="clear courseDetail-item multipleChoicesListItem" <?php if((isset($event->id) && !in_array( $event->type,$choiceListArray)) || !isset($event->id)) echo 'style="display: none"';?>>
                                      <div class="col-sm-3">multipleChoices:</div>
                                      <div class="col-sm-9 border-e5">
                                              <div id="multipleChoicesList">
                                                  <?php if(isset($event->id) && (in_array( $event->type,$choiceListArray) )):?>
                                                    <?php foreach($eventInfo['multipleChoices'] as $multipleChoice):?>
                                                 <div class="courseDetail-item-level multipleChoices" data-id="<?=$multipleChoice->id?>">
                                              <div class="clear mgb-10 timeRange">
                                                  <div class="col-sm-3">timeRange:</div>
                                                  <div class="col-sm-9">
                                                      <input type="text" name="timeRange" value="<?=$multipleChoice->timeRange?>" class="col-sm-4 timeRange">
                                                  </div>
                                              </div>
                                              <div class="clear mgb-10">
                                                  <div class="col-sm-3">text:</div>
                                                  <div class="col-sm-9">
                                                     <textarea name="text" class="col-sm-8 text"><?=$multipleChoice->text?></textarea>
                                                  </div>
                                              </div>
                                              <div class="clear mgb-10 audiobody">
                                                  <div class="col-sm-3 mediafile-name">media_filename:</div>
                                                  <div class="col-sm-9">
                                                      <div class="mediafile-icon media_file">
                                                          <?php if(count($multipleChoice->media_list) >0):?>
                                                                  <?php
                                                                  $mediaPartInfo = $multipleChoice->media_list[0];
                                                                  ?>
                                                              <?php if($mediaPartInfo['type'] == "audio"):?>
                                                                  <div class="media_box">
                                                                      <div class="media_play">
                                                                          <audio src="<?=$mediaPartInfo['originurl']?>"></audio>
                                                                      </div>
                                                                      <div class="media_progress">
                                                                          <span class="media_bar"></span>
                                                                          <div class="media_control"></div>
                                                                      </div>
                                                                  </div>
                                                                  <input type="hidden"  value="<?= $multipleChoice->file_id;?>" name="file_id">
                                                              <?php endif;?>
                                                          <?php endif;?>
                                                      </div>
                                                      <button class="btn btn-info" data-trigger="media_file" data-type="media" data-toggle="modal"  data-target=".update-icon-box">选取文件</button>
                                                  </div>
                                              </div>
    <!--                                          <div class="clear mgb-10">-->
    <!--                                              <div class="col-sm-3">picture:</div>-->
    <!--                                              <div class="col-sm-9">-->
    <!--                                                  <button class="btn btn-info">选取图片</button>-->
    <!--                                                  <ul class="clear courseDetail-imgs">-->
    <!--                                                      <li>-->
    <!--                                                          <img src="https://wonderenglish.weedu.net.cn/media/assets/parts/listening.png" alt="">-->
    <!--                                                          <i class="fa fa-close" aria-hidden="true"></i>-->
    <!--                                                      </li>-->
    <!--                                                      <li>-->
    <!--                                                          <img src="https://wonderenglish.weedu.net.cn/media/assets/parts/listening.png" alt="">-->
    <!--                                                          <i class="fa fa-close" aria-hidden="true"></i>-->
    <!--                                                      </li>-->
    <!--                                                  </ul>-->
    <!--                                              </div>-->
    <!--                                          </div>-->

                                                <div class="clear mgb-10">
                                                    <div class="col-sm-3">选项:</div>
                                                    <div class="col-sm-9">
                                                        <ul class="clear mgb-10 items courseDetail-optionLists">
                                                            <?php foreach($multipleChoice->items as $key=> $item):?>
                                                            <li>
                                                                <div class="col-sm-6">
                                                                    <input type="text"  data-id="<?=$item->id?>" name="item" value="<?=$item->item?>">
                                                                    <input type="checkbox" name="isCorrect" <?php if($item->isCorrect) echo 'checked';?>>
                                                                    <?php if($key > 1):?>
                                                                    <i class="fa fa-close pull-right remove_option" aria-hidden="true"></i>
                                                                    <?php endif;?>
                                                                </div>
                                                            </li>
                                                            <?php endforeach;?>
                                                        </ul>
                                                        <a href="javascript:;" class="add-option-btn btn btn-success col-sm-offset-1">ADD</a>
                                                    </div>
                                                </div>
                                                <div class="clear mgb-10">
                                                    <div class="clear courseDetail-item">
                                                        <div class="col-sm-3">selectEvents:</div>
                                                        <div class="col-sm-9 border-e5">
                                                            <div class="col-sm-12 el-clickEvents">
                                                                <div class="col-sm-3 el-clickEvents-l">YES</div>
                                                                <?php foreach($multipleChoice->selectEvents as $key=>$selectEvent):?>
                                                                <?php if($key == "Yes"):?>
                                                                <div class="col-sm-9 el-clickEvents-r selectEventsyes" data-id="<?=$selectEvent->id?>">
                                                                    <div class="clear mgb-10 timeRange">
                                                                        <div class="col-sm-3">timeRange:</div>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="col-sm-4" value="<?=$selectEvent->timeRange?>" name="timeRange">
                                                                        </div>
                                                                    </div>
                                                                    <div class="clear mgb-10">
                                                                        <div class="col-sm-3">text:</div>
                                                                        <div class="col-sm-9">
                                                                             <textarea name="text" id="" class="col-sm-8"><?=$selectEvent->text?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clear mgb-10 audiobody">
                                                                        <div class="col-sm-3 mediafile-name">media_filename:</div>
                                                                        <div class="col-sm-9">
                                                                            <div class="mediafile-icon media_file">
                                                                                <?php if(count($selectEvent->media_list) >0):?>
                                                                                    <?php
                                                                                        $mediaPartInfo = $selectEvent->media_list[0];
                                                                                    ?>
                                                                                    <?php if($mediaPartInfo['type'] == "audio"):?>
                                                                                        <div class="media_box">
                                                                                            <div class="media_play">
                                                                                                <audio src="<?=$mediaPartInfo['originurl']?>"></audio>
                                                                                            </div>
                                                                                            <div class="media_progress">
                                                                                                <span class="media_bar"></span>
                                                                                                <div class="media_control"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <input type="hidden"  value="<?=$selectEvent->file_id;?>" name="file_id">
                                                                                    <?php endif;?>
                                                                                <?php endif;?>
                                                                            </div>
                                                                            <button class="btn btn-info"  data-trigger="media_file" data-toggle="modal" data-target=".update-icon-box">选取文件</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php endif;?>
                                                                <?php endforeach;?>
                                                            </div>
                                                            <div class="col-sm-12 el-clickEvents">
                                                                <div class="col-sm-3 el-clickEvents-l">NO</div>
                                                                <?php foreach($multipleChoice->selectEvents as $key=>$selectEvent):?>
                                                                    <?php if($key == "No"):?>
                                                                        <div class="col-sm-9 el-clickEvents-r selectEventsno" data-id="<?=$selectEvent->id?>">
                                                                            <div class="clear mgb-10 timeRange">
                                                                                <div class="col-sm-3">timeRange:</div>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="col-sm-4" value="<?=$selectEvent->timeRange?>" name="timeRange">
                                                                                </div>
                                                                            </div>
                                                                            <div class="clear mgb-10">
                                                                                <div class="col-sm-3">text:</div>
                                                                                <div class="col-sm-9">
                                                                                    <textarea name="text" id="" class="col-sm-8"><?=$selectEvent->text?></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="clear mgb-10 audiobody">
                                                                                <div class="col-sm-3 mediafile-name">media_filename:</div>
                                                                                <div class="col-sm-9">
                                                                                    <div class="mediafile-icon media_file">
                                                                                        <?php if(count($selectEvent->media_list) >0):?>
                                                                                            <?php
                                                                                            $mediaPartInfo = $selectEvent->media_list[0];
                                                                                            ?>
                                                                                            <?php if($mediaPartInfo['type'] == "audio"):?>
                                                                                                <div class="media_box">
                                                                                                    <div class="media_play">
                                                                                                        <audio src="<?=$mediaPartInfo['originurl']?>"></audio>
                                                                                                    </div>
                                                                                                    <div class="media_progress">
                                                                                                        <span class="media_bar"></span>
                                                                                                        <div class="media_control"></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <input type="hidden"  value="<?= $selectEvent->file_id;?>" name="file_id">
                                                                                            <?php endif;?>
                                                                                        <?php endif;?>
                                                                                    </div>
                                                                                    <button class="btn btn-info" data-type="media" data-trigger="media_file" data-toggle="modal" data-target=".update-icon-box">选取文件</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif;?>
                                                                <?php endforeach;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <i class="fa fa-close pull-right removeChoice" aria-hidden="true"></i>
                                             </div>
                                                    <?php endforeach;?>
                                                  <?php endif;?>
                                              </div>
                                          <a href="javascript:;" class="add-item-btn btn btn-success col-sm-offset-3">ADD</a>
                                      </div>
                                  </div>
                                  <div class="clear courseDetail-item itemsList" <?php if((isset($event->id) && !isset($event->content->items) || !isset($event->id))) echo 'style="display: none"';?>>
                                      <div class="col-sm-3">Items:</div>
                                      <div class="col-sm-9 border-e5">
                                          <div class="col-sm-12  questionItems" data-id="<?php if(isset($event->id) && isset($event->content->id)) echo $event->content->id; else 0;?>">
                                              <?php if(isset($event->id) && isset($event->content->id) && isset($event->content->items)):?>
                                                <?php foreach($event->content->items as $questionitem):?>
                                                      <div class="col-sm-12 el-clickEvents-r pull-clickEvents-r questionItem" data-id="<?=$questionitem->id?>">
                                                          <div class="clear mgb-10 timeRange">
                                                              <div class="col-sm-3">timeRange:</div>
                                                              <div class="col-sm-9">
                                                                  <input type="text" class="col-sm-4" value="<?=$questionitem->timeRange?>" name="timeRange">
                                                              </div>
                                                          </div>
                                                          <div class="clear mgb-10">
                                                              <div class="col-sm-3">text:</div>
                                                              <div class="col-sm-9">
                                                                  <textarea name="text" id="" class="col-sm-8"><?=$questionitem->text?></textarea>
                                                              </div>
                                                          </div>

                                                          <div class="clear mgb-10">
                                                              <div class="col-sm-3">isCorrect:</div>
                                                              <div class="col-sm-9">
                                                                  <input type="checkbox" name="isCorrect" <?php if($questionitem->isCorrect) echo 'checked';?>>
                                                              </div>
                                                          </div>

                                                          <div class="clear mgb-10 audiobody">
                                                              <div class="col-sm-3 mediafile-name">media_filename:</div>
                                                              <div class="col-sm-9">
                                                                  <div class="mediafile-icon media_file">
                                                                      <?php if(isset($questionitem->media_list) && count($questionitem->media_list) >0):?>
                                                                          <?php
                                                                          $mediaPartInfo = $questionitem->media_list[0];
                                                                          ?>
                                                                          <?php if($mediaPartInfo['type'] == "audio"):?>
                                                                              <div class="media_box">
                                                                                  <div class="media_play">
                                                                                      <audio src="<?=$mediaPartInfo['originurl']?>"></audio>
                                                                                  </div>
                                                                                  <div class="media_progress">
                                                                                      <span class="media_bar"></span>
                                                                                      <div class="media_control"></div>
                                                                                  </div>
                                                                              </div>
                                                                              <input type="hidden"  value="<?= $questionitem->file_id;?>" name="file_id">
                                                                          <?php endif;?>
                                                                      <?php endif;?>
                                                                  </div>
                                                                  <button class="btn btn-info" data-type="media" data-trigger="media_file" data-toggle="modal" data-target=".update-icon-box">选取文件</button>
                                                              </div>
                                                          </div>
                                                          <div class="clear courseDetail-item">
                                                              <div class="col-sm-3">picture:</div>
                                                              <div class="col-sm-9 media_file">
                                                                  <input type="hidden"  value="<?=$questionitem->picture_file_ids?>" name="picture_file_ids">
                                                                  <button class="btn btn-info"  data-toggle="modal" data-trigger="media_picture"  data-type="image" data-target=".update-icon-box">选取图片</button>
                                                                  <ul class="clear courseDetail-imgs picture_file_ids">
                                                                      <?php if(isset($questionitem->picture_list) && count($questionitem->picture_list) >0):?>
                                                                          <?php foreach($questionitem->picture_list as $piciture):?>
                                                                              <li> <img src="<?=$piciture['originurl']?>" alt=""> <i class="fa fa-close removePicture" aria-hidden="true" data-id="<?=$piciture['id']?>"></i> </li>
                                                                          <?php endforeach;?>
                                                                      <?php endif;?>
                                                                  </ul>
                                                              </div>
                                                          </div>

                                                          <div class="clear courseDetail-item">
                                                              <div class="col-sm-3">picture origin:</div>
                                                              <div class="col-sm-9 media_file">
                                                                  <input type="hidden"  value="<?=$questionitem->picture_origin_ids?>" name="picture_origin_ids">
                                                                  <button class="btn btn-info"  data-toggle="modal" data-trigger="media_picture"  data-type="image" data-target=".update-icon-box">选取图片</button>
                                                                  <ul class="clear courseDetail-imgs picture_origin_ids">
                                                                      <?php if(isset($questionitem->picture_origin_list) && count($questionitem->picture_origin_list) >0):?>
                                                                          <?php foreach($questionitem->picture_origin_list as $piciture):?>
                                                                              <li> <img src="<?=$piciture['originurl']?>" alt=""> <i class="fa fa-close removePicture" aria-hidden="true" data-id="<?=$piciture['id']?>"></i> </li>
                                                                          <?php endforeach;?>
                                                                      <?php endif;?>
                                                                  </ul>
                                                              </div>
                                                          </div>

                                                          <i class="fa fa-close pull-right questionItemDelete" aria-hidden="true"></i>
                                                      </div>
                                                <?php endforeach;?>
                                              <?php endif;?>
                                          </div>
                                          <div class="col-sm-12 mgv-10">
                                              <a href="javascript:;" class="add-item-option-btn btn btn-success col-sm-offset-3">ADD</a>
                                          </div>
                                      </div>

                                  </div>

                                  <div class="clear courseDetail-item selectEventsList" data-id="<?php if(isset($event->id) && isset($event->content->id)) echo $event->content->id;else echo 0;?>">
                                      <div class="col-sm-3">selectEvents:</div>
                                      <div class="col-sm-9 border-e5">
                                              <div class="col-sm-12 el-clickEvents">
                                                  <div class="col-sm-3 el-clickEvents-l">YES</div>
                                                  <div class="col-sm-9 el-clickEvents-r selectEventsyes" data-id="<?php if(isset($event->id) && isset($event->content->selectEvents['Yes'])) echo $event->content->selectEvents['Yes']->id;else echo 0;?>">
                                                      <div class="clear mgb-10 timeRange">
                                                          <div class="col-sm-3">timeRange:</div>
                                                          <div class="col-sm-9">
                                                              <input type="text" class="col-sm-4" value="<?php if(isset($event->id) && isset($event->content->selectEvents['Yes'])) echo $event->content->selectEvents['Yes']->timeRange?>" name="timeRange">
                                                          </div>
                                                      </div>
                                                      <div class="clear mgb-10">
                                                          <div class="col-sm-3">text:</div>
                                                          <div class="col-sm-9">
                                                              <textarea name="text"  class="col-sm-8"><?php if(isset($event->id) && isset($event->content->selectEvents['Yes'])) echo $event->content->selectEvents['Yes']->text?></textarea>
                                                          </div>
                                                      </div>
                                                      <div class="clear mgb-10 audiobody">
                                                          <div class="col-sm-3 mediafile-name">media_filename:</div>
                                                          <div class="col-sm-9">
                                                              <div class="mediafile-icon media_file">
                                                                  <?php if(isset($event->id) && isset($event->content->selectEvents['Yes'])):?>
                                                                  <?php if(isset($event->content->selectEvents['Yes']->media_list) && count($event->content->selectEvents['Yes']->media_list) >0):?>
                                                                      <?php
                                                                      $mediaPartInfo = $event->content->selectEvents['Yes']->media_list[0];
                                                                      ?>
                                                                      <?php if($mediaPartInfo['type'] == "audio"):?>
                                                                          <div class="media_box">
                                                                              <div class="media_play">
                                                                                  <audio src="<?=$mediaPartInfo['originurl']?>"></audio>
                                                                              </div>
                                                                              <div class="media_progress">
                                                                                  <span class="media_bar"></span>
                                                                                  <div class="media_control"></div>
                                                                              </div>
                                                                          </div>
                                                                          <input type="hidden"  value="<?=$event->content->selectEvents['Yes']->file_id;?>" name="file_id">
                                                                      <?php endif;?>
                                                                  <?php endif;?>
                                                                  <?php endif;?>
                                                              </div>
                                                              <button class="btn btn-info"  data-trigger="media_file" data-toggle="modal" data-target=".update-icon-box">选取文件</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-sm-12 el-clickEvents">
                                                  <div class="col-sm-3 el-clickEvents-l">NO</div>
                                                  <div class="col-sm-9 el-clickEvents-r selectEventsno" data-id="<?php if(isset($event->id) && isset($event->content->selectEvents['No'])) echo $event->content->selectEvents['No']->id;else echo 0?>">
                                                              <div class="clear mgb-10 timeRange">
                                                                  <div class="col-sm-3">timeRange:</div>
                                                                  <div class="col-sm-9">
                                                                      <input type="text" class="col-sm-4" value="<?php if(isset($event->id) && isset($event->content->selectEvents['No'])) echo $event->content->selectEvents['No']->timeRange?>" name="timeRange">
                                                                  </div>
                                                              </div>
                                                              <div class="clear mgb-10">
                                                                  <div class="col-sm-3">text:</div>
                                                                  <div class="col-sm-9">
                                                                      <textarea name="text" id="" class="col-sm-8"><?php if(isset($event->id) && isset($event->content->selectEvents['No'])) echo $event->content->selectEvents['No']->text?></textarea>
                                                                  </div>
                                                              </div>
                                                              <div class="clear mgb-10 audiobody">
                                                                  <div class="col-sm-3 mediafile-name">media_filename:</div>
                                                                  <div class="col-sm-9">
                                                                      <div class="mediafile-icon media_file">
                                                                          <?php if(isset($event->id) && isset($event->content->selectEvents['No'])):?>
                                                                              <?php if(isset($event->content->selectEvents['No']->media_list) && count($event->content->selectEvents['No']->media_list) >0):?>
                                                                                  <?php
                                                                                  $mediaPartInfo = $event->content->selectEvents['No']->media_list[0];
                                                                                  ?>
                                                                                  <?php if($mediaPartInfo['type'] == "audio"):?>
                                                                                      <div class="media_box">
                                                                                          <div class="media_play">
                                                                                              <audio src="<?=$mediaPartInfo['originurl']?>"></audio>
                                                                                          </div>
                                                                                          <div class="media_progress">
                                                                                              <span class="media_bar"></span>
                                                                                              <div class="media_control"></div>
                                                                                          </div>
                                                                                      </div>
                                                                                      <input type="hidden"  value="<?=$event->content->selectEvents['Yes']->file_id;?>" name="file_id">
                                                                                  <?php endif;?>
                                                                              <?php endif;?>
                                                                          <?php endif;?>
                                                                      </div>
                                                                      <button class="btn btn-info" data-type="media" data-trigger="media_file" data-toggle="modal" data-target=".update-icon-box">选取文件</button>
                                                                  </div>
                                                              </div>
                                                          </div>

                                              </div>
                                      </div>
                                  </div>

                                  <?php if($course->type != "high_school"):?>
                                  <!--clickEvents-->
                                  <div class="clear courseDetail-item clickEventsList" data-id="<?php if(isset($event->id) && isset($event->content->id)) echo $event->content->id;else echo 0;?>">
                                      <div class="col-sm-3">clickEvents:</div>
                                      <div class="col-sm-9 border-e5">
                                         <div class="col-sm-12 el-clickEvents">
                                             <div class="col-sm-3 el-clickEvents-l">Click 1</div>
                                             <div class="col-sm-9 el-clickEvents-r clickEvent_1" data-id="<?php if(isset($event->id) && isset($event->content->clickEvents['click_1'])) echo $event->content->clickEvents['click_1']->id;else echo 0;?>">
                                                 <div class="clear mgb-10">
                                                     <div class="col-sm-3">type:</div>
                                                     <div class="col-sm-9">
                                                         <select name="type"  class="col-sm-4">
                                                             <?php foreach($childTypes as $key=>$childType):?>
                                                                 <?php if(isset($event->content->clickEvents['click_1']->type) && $event->content->clickEvents['click_1']->type == $key):?>
                                                                     <option value="<?=$key?>" selected><?=$childType?></option>
                                                                 <?php else:?>
                                                                     <option value="<?=$key?>"><?=$childType?></option>
                                                                 <?php endif;?>
                                                             <?php endforeach;?>
                                                         </select>
                                                     </div>
                                                 </div>
                                                 <div class="clear mgb-10">
                                                     <div class="col-sm-3">score:</div>
                                                     <div class="col-sm-9">
                                                         <input type="text" class="col-sm-4" name="score" value="<?php if(isset($event->id) && isset($event->content->clickEvents['click_1']) && !empty($event->content->clickEvents['click_1']->score)) echo $event->content->clickEvents['click_1']->score?>">
                                                     </div>
                                                 </div>

                                                 <div class="clear mgb-10 timeRange">
                                                     <div class="col-sm-3">timeRange:</div>
                                                     <div class="col-sm-9">
                                                         <input type="text" class="col-sm-4" value="<?php if(isset($event->id) && isset($event->content->clickEvents['click_1'])) echo $event->content->clickEvents['click_1']->timeRange?>" name="timeRange">
                                                     </div>
                                                 </div>
                                                 <div class="clear mgb-10">
                                                     <div class="col-sm-3">text:</div>
                                                     <div class="col-sm-9">
                                                         <textarea name="text"  class="col-sm-8"><?php if(isset($event->id) && isset($event->content->clickEvents['click_1'])) echo $event->content->clickEvents['click_1']->text?></textarea>
                                                     </div>
                                                 </div>
                                                 <div class="clear mgb-10 audiobody">
                                                     <div class="col-sm-3 mediafile-name">media_filename:</div>
                                                     <div class="col-sm-9">
                                                         <div class="mediafile-icon media_file media_filename_video">
                                                             <?php if(isset($event->id) && isset($event->content->clickEvents['click_1'])):?>
                                                                 <?php if(isset($event->content->clickEvents['click_1']->media_list) &&  count($event->content->clickEvents['click_1']->media_list) >0):?>
                                                                     <?php
                                                                     $mediaPartInfo = $event->content->clickEvents['click_1']->media_list[0];
                                                                     ?>
                                                                     <?php if($mediaPartInfo['type'] == "audio"):?>
                                                                         <div class="media_box">
                                                                             <div class="media_play">
                                                                                 <audio src="<?=$mediaPartInfo['originurl']?>"></audio>
                                                                             </div>
                                                                             <div class="media_progress">
                                                                                 <span class="media_bar"></span>
                                                                                 <div class="media_control"></div>
                                                                             </div>
                                                                         </div>
                                                                         <input type="hidden"  value="<?=$event->content->clickEvents['click_1']->file_id;?>" name="file_id">

                                                                     <?php elseif($mediaPartInfo['type'] == "video"):?>
                                                                         <style>
                                                                             .media_filename_video{
                                                                                 height: 220px!important;
                                                                             }
                                                                         </style>
                                                                         <div class="video_box">
                                                                             <a href="javascript:;" class="video-icon video_play">
                                                                                 <video src="<?=$mediaPartInfo['originurl']?>" style="height:200px!important;"></video>
                                                                             </a>
                                                                         </div>
                                                                         <input type="hidden"  value="<?=$event->content->clickEvents['click_1']->file_id;?>" name="file_id">
                                                                     <?php endif;?>
                                                                 <?php endif;?>
                                                             <?php endif;?>
                                                         </div>
                                                         <button class="btn btn-info"  data-trigger="media_file" data-toggle="modal" data-target=".update-icon-box">选取文件</button>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                          <div class="col-sm-12 el-clickEvents">
                                              <div class="col-sm-3 el-clickEvents-l">Click 2</div>
                                              <div class="col-sm-9 el-clickEvents-r clickEvent_2" data-id="<?php if(isset($event->id) && isset($event->content->clickEvents['click_2'])) echo $event->content->clickEvents['click_2']->id;else echo 0;?>">
                                                  <div class="clear mgb-10">
                                                      <div class="col-sm-3">type:</div>
                                                      <div class="col-sm-9">
                                                          <select name="type"  class="col-sm-4">
                                                              <?php foreach($childTypes as $key=>$childType):?>
                                                                  <?php if(isset($event->content->clickEvents['click_2']->type) && $event->content->clickEvents['click_2']->type == $key):?>
                                                                      <option value="<?=$key?>" selected><?=$childType?></option>
                                                                  <?php else:?>
                                                                      <option value="<?=$key?>"><?=$childType?></option>
                                                                  <?php endif;?>
                                                              <?php endforeach;?>
                                                          </select>
                                                      </div>
                                                  </div>
                                                  <div class="clear mgb-10">
                                                      <div class="col-sm-3">score:</div>
                                                      <div class="col-sm-9">
                                                          <input type="text" class="col-sm-4" name="score" value="<?php if(isset($event->id)  && isset($event->content->clickEvents['click_2']) && !empty($event->content->clickEvents['click_2']->score)) echo $event->content->clickEvents['click_2']->score?>">
                                                      </div>
                                                  </div>
                                                  <div class="clear mgb-10 timeRange">
                                                      <div class="col-sm-3">timeRange:</div>
                                                      <div class="col-sm-9">
                                                          <input type="text" class="col-sm-4" value="<?php if(isset($event->id) && isset($event->content->clickEvents['click_2'])) echo $event->content->clickEvents['click_2']->timeRange?>" name="timeRange">
                                                      </div>
                                                  </div>
                                                  <div class="clear mgb-10">
                                                      <div class="col-sm-3">text:</div>
                                                      <div class="col-sm-9">
                                                          <textarea name="text"  class="col-sm-8"><?php if(isset($event->id) && isset($event->content->clickEvents['click_2'])) echo $event->content->clickEvents['click_2']->text?></textarea>
                                                      </div>
                                                  </div>
                                                  <div class="clear mgb-10 audiobody">
                                                      <div class="col-sm-3 mediafile-name">media_filename:</div>
                                                      <div class="col-sm-9">
                                                          <div class="mediafile-icon media_file media_filename_video">
                                                              <?php if(isset($event->id) && isset($event->content->clickEvents['click_2'])):?>
                                                                  <?php if(isset($event->content->clickEvents['click_2']->media_list) && count($event->content->clickEvents['click_2']->media_list) >0):?>
                                                                      <?php
                                                                      $mediaPartInfo = $event->content->clickEvents['click_2']->media_list[0];
                                                                      ?>
                                                                      <?php if($mediaPartInfo['type'] == "audio"):?>
                                                                          <div class="media_box">
                                                                              <div class="media_play">
                                                                                  <audio src="<?=$mediaPartInfo['originurl']?>"></audio>
                                                                              </div>
                                                                              <div class="media_progress">
                                                                                  <span class="media_bar"></span>
                                                                                  <div class="media_control"></div>
                                                                              </div>
                                                                          </div>
                                                                          <input type="hidden"  value="<?=$event->content->clickEvents['click_2']->file_id;?>" name="file_id">
                                                                      <?php elseif($mediaPartInfo['type'] == "video"):?>
                                                                          <style>
                                                                              .media_filename_video{
                                                                                  height: 220px!important;
                                                                              }
                                                                          </style>
                                                                          <div class="video_box">
                                                                              <a href="javascript:;" class="video-icon video_play">
                                                                                  <video src="<?=$mediaPartInfo['originurl']?>" style="height:200px!important;"></video>
                                                                              </a>
                                                                          </div>
                                                                          <input type="hidden"  value="<?=$event->content->clickEvents['click_2']->file_id;?>" name="file_id">
                                                                      <?php endif;?>
                                                                  <?php endif;?>
                                                              <?php endif;?>
                                                          </div>
                                                          <button class="btn btn-info"  data-trigger="media_file" data-toggle="modal" data-target=".update-icon-box">选取文件</button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

                                      </div>

                                  </div>

                                  <!--childrenEvent-->
                                      <div class="clear courseDetail-item">
                                          <div class="col-sm-3">childrenEvents:</div>
                                          <div class="col-sm-9 border-e5">
                                                  <div class="col-sm-12 " id="childrenEventList" data-id="<?php if(isset($event->id) && isset($event->content->id)) echo $event->content->id;else echo 0;?>">
                                                      <?php if(isset($event->content->childrenEvents)):?>
                                                          <?php foreach($event->content->childrenEvents as $childrenEvent):?>
                                                              <div class="col-sm-12 el-clickEvents-r pull-clickEvents-r childrenItem" data-id="<?=$childrenEvent->id?>">
                                                                  <div class="clear mgb-10">
                                                                      <div class="col-sm-3">type:</div>
                                                                      <div class="col-sm-9">
                                                                          <select name="type" class="col-sm-4">
                                                                              <?php foreach($childTypes as $key=>$childType):?>
                                                                                  <?php if(isset($childrenEvent->type) && $childrenEvent->type == $key):?>
                                                                                      <option value="<?=$key?>" selected><?=$childType?></option>
                                                                                  <?php else:?>
                                                                                      <option value="<?=$key?>"><?=$childType?></option>
                                                                                  <?php endif;?>
                                                                              <?php endforeach;?>
                                                                          </select>
                                                                      </div>
                                                                  </div>
                                                                  <div class="clear mgb-10">
                                                                      <div class="col-sm-3">score:</div>
                                                                      <div class="col-sm-9">
                                                                          <input type="text" class="col-sm-4" name="score" value="<?php if(isset($childrenEvent->score) && !empty($childrenEvent->score)) echo $childrenEvent->score?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="clear mgb-10">
                                                                      <div class="col-sm-3">timeRange:</div>
                                                                      <div class="col-sm-9">
                                                                          <input type="text" class="col-sm-4" name="timeRange" value="<?php if(isset($childrenEvent->timeRange)) echo $childrenEvent->timeRange?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="clear mgb-10">
                                                                      <div class="col-sm-3">text:</div>
                                                                      <div class="col-sm-9">
                                                                          <textarea name="text" id="" class="col-sm-8"><?php if(isset($childrenEvent->text)) echo $childrenEvent->text?></textarea>
                                                                      </div>
                                                                  </div>
                                                                  <div class="clear mgb-10 audiobody">
                                                                      <div class="col-sm-3 mediafile-name">media_filename:</div>
                                                                      <div class="col-sm-9">
                                                                          <div class="mediafile-icon media_file">
                                                                              <?php if(isset($childrenEvent->media_list) && count($childrenEvent->media_list) >0):?>
                                                                                  <?php
                                                                                  $mediaPartInfo = $childrenEvent->media_list[0];
                                                                                  ?>
                                                                                  <?php if($mediaPartInfo['type'] == "audio"):?>
                                                                                      <div class="media_box">
                                                                                          <div class="media_play">
                                                                                              <audio src="<?=$mediaPartInfo['originurl']?>"></audio>
                                                                                          </div>
                                                                                          <div class="media_progress">
                                                                                              <span class="media_bar"></span>
                                                                                              <div class="media_control"></div>
                                                                                          </div>
                                                                                      </div>
                                                                                      <input type="hidden"  value="<?=$childrenEvent->file_id;?>" name="file_id">
                                                                                  <?php endif;?>
                                                                              <?php endif;?>
                                                                          </div>
                                                                          <button class="btn btn-info"  data-trigger="media_file" data-toggle="modal" data-target=".update-icon-box">选取文件</button>
                                                                      </div>
                                                                  </div>
                                                                  <i class="fa fa-close pull-right removeChildEvent" aria-hidden="true"></i>
                                                              </div>
                                                          <?php endforeach;?>
                                                      <?php endif;?>
                                                  </div>
                                              <div class="col-sm-12 mgv-10">
                                                  <a href="javascript:;" class="add-children-option-btn btn btn-success col-sm-offset-3">ADD</a>
                                              </div>
                                          </div>
                                      </div>
                                  <?php endif;?>
                              <div>
                          </div>
                      </div>
                      <div class="courseDetail-btns text-center">
                          <a href="javascript:;" class="btn  btn-success btn-success-define" id="submitEvent">保存</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / tasks -->
          </div>
        </div>
        <!-- / main -->
        <!-- right col -->
        <!-- / right col -->
      </div>

    </div>
  </div>
  <!-- /content -->

  <!-- footer -->
  <?php $this->load->view('tmpl/foot')?>
</div>
<div id="mediaTemplate" type="text/x-jquery-tmpl" style="display:none">
    {{if type == "audio"}}

        <div class="media_box">
            <div class="media_play">
                <audio src="${originurl}"></audio>
            </div>
            <div class="media_progress">
                <span class="media_bar"></span>
                <div class="media_control"></div>
            </div>
        </div>
    {{else}}
        <div class="video_box">
            <a href="javascript:;" class="video-icon video_play">
                <video src="${originurl}" style="height:200px!important;"></video>
            </a>
        </div>
    {{/if}}
    <input type="hidden"  value="${id}" name="file_id">
</div>

<div id="multipleChoiceOptionTemplate" type="text/x-jquery-tmpl" style="display:none">
    <li>
        <div class="col-sm-6">
            <input type="text"  data-id="0" name="item" value="">
            <input type="checkbox" name="isCorrect" >
            <i class="fa fa-close pull-right remove_option" aria-hidden="true"></i>
        </div>
    </li>
</div>

<div id="multipleChoiceTemplate" type="text/x-jquery-tmpl" style="display:none">
    <div class="courseDetail-item-level multipleChoices" data-id="0">
        <div class="clear mgb-10 timeRange">
            <div class="col-sm-3">timeRange:</div>
            <div class="col-sm-9">
                <input type="text" name="timeRange" value="" class="col-sm-4 timeRange">
            </div>
        </div>
        <div class="clear mgb-10">
            <div class="col-sm-3">text:</div>
            <div class="col-sm-9">
                <textarea name="text" class="col-sm-8 text"></textarea>
            </div>
        </div>
        <div class="clear mgb-10 audiobody">
            <div class="col-sm-3 mediafile-name">media_filename:</div>
            <div class="col-sm-9">
                <div class="mediafile-icon media_file">

                </div>
                <button class="btn btn-info" data-trigger="media_file" data-type="media" data-toggle="modal"  data-target=".update-icon-box">选取文件</button>
            </div>
        </div>

        <div class="clear mgb-10">
            <div class="col-sm-3">选项:</div>
            <div class="col-sm-9">
                <ul class="clear mgb-10 items courseDetail-optionLists">
                        <li>
                            <div class="col-sm-6">
                                <input type="text"  data-id="0" name="item" value="">
                                <input type="checkbox" name="isCorrect">

                            </div>
                        </li>
                        <li>
                            <div class="col-sm-6">
                                <input type="text"  data-id="0>" name="item" value="">
                                <input type="checkbox" name="isCorrect">

                            </div>
                        </li>
                </ul>
                <a href="javascript:;" class="add-option-btn btn btn-success col-sm-offset-1">ADD</a>
            </div>
        </div>
        <div class="clear mgb-10">
            <div class="clear courseDetail-item">
                <div class="col-sm-3">selectEvents:</div>
                <div class="col-sm-9 border-e5">
                    <div class="col-sm-12 el-clickEvents">
                        <div class="col-sm-3 el-clickEvents-l">YES</div>
                                <div class="col-sm-9 el-clickEvents-r selectEventsyes" data-id="0">
                                    <div class="clear mgb-10 timeRange">
                                        <div class="col-sm-3">timeRange:</div>
                                        <div class="col-sm-9">
                                            <input type="text" class="col-sm-4" value="" name="timeRange">
                                        </div>
                                    </div>
                                    <div class="clear mgb-10">
                                        <div class="col-sm-3">text:</div>
                                        <div class="col-sm-9">
                                            <textarea name="text" id="" class="col-sm-8"></textarea>
                                        </div>
                                    </div>
                                    <div class="clear mgb-10 audiobody">
                                        <div class="col-sm-3 mediafile-name">media_filename:</div>
                                        <div class="col-sm-9">
                                            <div class="mediafile-icon media_file">
                                            </div>
                                            <button class="btn btn-info"  data-trigger="media_file" data-toggle="modal" data-target=".update-icon-box">选取文件</button>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div class="col-sm-12 el-clickEvents">
                        <div class="col-sm-3 el-clickEvents-l">NO</div>
                                <div class="col-sm-9 el-clickEvents-r selectEventsno" data-id="0">
                                    <div class="clear mgb-10 timeRange">
                                        <div class="col-sm-3">timeRange:</div>
                                        <div class="col-sm-9">
                                            <input type="text" class="col-sm-4" value="" name="timeRange">
                                        </div>
                                    </div>
                                    <div class="clear mgb-10">
                                        <div class="col-sm-3">text:</div>
                                        <div class="col-sm-9">
                                            <textarea name="text" id="" class="col-sm-8"></textarea>
                                        </div>
                                    </div>
                                    <div class="clear mgb-10 audiobody">
                                        <div class="col-sm-3 mediafile-name">media_filename:</div>
                                        <div class="col-sm-9">
                                            <div class="mediafile-icon media_file">
                                            </div>
                                            <button class="btn btn-info" data-type="media" data-trigger="media_file" data-toggle="modal" data-target=".update-icon-box">选取文件</button>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
        <i class="fa fa-close pull-right removeChoice" aria-hidden="true" data-id="0"></i>
    </div>
</div>


<div id="questionItemTemplate" type="text/x-jquery-tmpl" style="display:none">
        <div class="col-sm-12 el-clickEvents-r pull-clickEvents-r  questionItem" data-id="0">
            <div class="clear mgb-10 timeRange">
                <div class="col-sm-3">timeRange:</div>
                <div class="col-sm-9">
                    <input type="text" class="col-sm-4" value="" name="timeRange">
                </div>
            </div>
            <div class="clear mgb-10">
                <div class="col-sm-3">text:</div>
                <div class="col-sm-9">
                    <textarea name="text" id="" class="col-sm-8">${text}</textarea>
                </div>
            </div>
            <div class="clear mgb-10">
                <div class="col-sm-3">isCorrect:</div>
                <div class="col-sm-9">
                    <input type="checkbox" name="isCorrect" >
                </div>
            </div>
            <div class="clear mgb-10 audiobody">
                <div class="col-sm-3 mediafile-name">media_filename:</div>
                <div class="col-sm-9">
                    <div class="mediafile-icon media_file">

                    </div>
                    <button class="btn btn-info" data-type="media" data-trigger="media_file" data-toggle="modal" data-target=".update-icon-box">选取文件</button>
                </div>
            </div>
            <div class="clear courseDetail-item">
                <div class="col-sm-3">picture:</div>
                <div class="col-sm-9 media_file">
                    <input type="hidden"  value="" name="picture_file_ids">
                    <button class="btn btn-info"  data-toggle="modal" data-trigger="media_picture"  data-type="image" data-target=".update-icon-box">选取图片</button>
                    <ul class="clear courseDetail-imgs picture_file_ids">

                    </ul>
                </div>
            </div>


            <div class="clear courseDetail-item">
                <div class="col-sm-3">picture origin:</div>
                <div class="col-sm-9 media_file">
                    <input type="hidden"  value="" name="picture_origin_ids">
                    <button class="btn btn-info"  data-toggle="modal" data-trigger="media_picture"  data-type="image" data-target=".update-icon-box">选取图片</button>
                    <ul class="clear courseDetail-imgs picture_origin_ids">

                    </ul>
                </div>
            </div>

            <i class="fa fa-close pull-right questionItemDelete" aria-hidden="true"></i>
        </div>
</div>



<div id="ChildEventsTemplate" type="text/x-jquery-tmpl" style="display:none">
     <div class="col-sm-12 el-clickEvents-r pull-clickEvents-r childrenItem" data-id="0">
            <div class="clear mgb-10">
                <div class="col-sm-3">type:</div>
                <div class="col-sm-9">
                    <select name="type"  class="col-sm-4">
                        <?php foreach($childTypes as $key=>$childType):?>
                            <option value="<?=$key?>"><?=$childType?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
         <div class="clear mgb-10">
             <div class="col-sm-3">score:</div>
             <div class="col-sm-9">
                 <input type="text" class="col-sm-4" name="score" value="">
             </div>
         </div>
            <div class="clear mgb-10">
                <div class="col-sm-3">timeRange:</div>
                <div class="col-sm-9">
                    <input type="text" class="col-sm-4" name="timeRange" value="">
                </div>
            </div>
            <div class="clear mgb-10">
                <div class="col-sm-3">text:</div>
                <div class="col-sm-9">
                    <textarea name="text" id="" class="col-sm-8"></textarea>
                </div>
            </div>
            <div class="clear mgb-10 audiobody">
                <div class="col-sm-3 mediafile-name">media_filename:</div>
                <div class="col-sm-9">
                    <div class="mediafile-icon media_file">
                    </div>
                    <button class="btn btn-info"  data-trigger="media_file" data-toggle="modal" data-target=".update-icon-box">选取文件</button>
                </div>
            </div>
            <i class="fa fa-close pull-right removeChildEvent" aria-hidden="true"></i>
        </div>
</div>

<div class="modal fade update-icon-box"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:800px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>

            </div>
            <div class="modal-body">
                <h4 class="modal-title" id="myModalLabel">
                    多媒体文件管理
                </h4>
                <div class="update-body">
                    <div class="clear">
                        <div id="progress" class="progress-set">
                            <div class="progress-bg">
                                <div class="bar" style="width: 0%;"></div>
                            </div>
                            <span class="progress-per" id="progress-per"></span>
                        </div>
                        <form class="navbar-form navbar-form-sm navbar-left shift" action="" onkeydown="if(event.keyCode==13){return false;}">
                            <div class="form-group">
                                <div class="input-group ">
                                    <input type="text"  id="filekey" class="form-control input-sm bg-light no-border rounded padder" placeholder="输入要查找到的信息">
                                            <span class="input-group-btn">
                                            <a type="button" class="btn btn-sm bg-light rounded" id="searchFiles">
                                                <i class="fa fa-search"></i>
                                            </a>
                                         </span>
                                </div>
                            </div>
                        </form>
                        <div class="update-file">
                            <a href="javascript:;" class="btn-update-file btn btn-info">上传文件</a>
                            <input id="fileupload" type="file" name="file" data-url="<?=anchorurl("fileupload/addFile/".$lesson->id)?>" multiple class="input-file">
                        </div>

                    </div>
                    <div class="updated-list" id="fileList">
                    </div>
                    <div id="paginatorFile"></div>
                </div>
            </div>
            <div class="modal-footer mg-5">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
                                      <button type="button" class="btn btn-success" id="saveFiles">
                                          确定
                                      </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
      <input id="fileeditupload" type="file" name="file" class="input-file">


      <script type="text/javascript" src="<?=base_url()?>media/administrator/js/filelist.js"></script>
  <!-- / footer -->
    <script>
        var lesson_id = <?=$lesson->id?>;
        var file = null;
    </script>
      <script>
          $(".removeMedia").click(function(){
              $(this).parents(".audiobody").find(".media_file").html("");
              $(this).parents(".audiobody").find("#media_file_ids").val("");
          });
      </script>
    <script>
        var media_type = "";
        var name = "";
        var _this = "";
        $(function() {
            //
            $("button[data-trigger='media_model']").click(function(){
                console.log($(this));
                  media_type =  $(this).data('type');
                  name = $(this).data('name');

            });

            $("body").undelegate("button[data-trigger='media_file']", 'click').delegate("button[data-trigger='media_file']", 'click', function () {
                console.log($(this).siblings(".media_file"));
                media_type =  $(this).data('type');
                name = "";
                _this = $(this).siblings(".media_file");
            });

            $("body").undelegate("button[data-trigger='media_picture']", 'click').delegate("button[data-trigger='media_picture']", 'click', function () {

                media_type =  $(this).data('type');
                name = "";
                _this = $(this).parents(".media_file");
            });

            $("body").undelegate(".removePicture", 'click').delegate(".removePicture", 'click', function () {
                var id = $(this).data("id");
                if(confirm('你确定要删除该吗?')){
                    var picture_file_ids =  $(this).parents(".media_file").find("input[name='picture_file_ids']").val();
                    if(picture_file_ids){
                        var picture_array = picture_file_ids.split(",");
                        for(var m=0;m<picture_array.length;m++){
                            if(picture_array[m] == id){
                                picture_array.splice(m,1);
                            }

                        }
                        if(picture_array.length >0){
                            $(this).parents(".media_file").find("input[name='picture_file_ids']").val(picture_array.join(","));
                        }else{
                            $(this).parents(".media_file").find("input[name='picture_file_ids']").val("");
                        }
                        $(this).parent("li").remove();
                    }


                    var picture_origin_ids =  $(this).parents(".media_file").find("input[name='picture_origin_ids']").val();
                    if(picture_origin_ids){
                        var picture_array = picture_origin_ids.split(",");
                        for(var m=0;m<picture_array.length;m++){
                            if(picture_array[m] == id){
                                picture_array.splice(m,1);
                            }

                        }
                        if(picture_array.length >0){
                            $(this).parents(".media_file").find("input[name='picture_origin_ids']").val(picture_array.join(","));
                        }else{
                            $(this).parents(".media_file").find("input[name='picture_origin_ids']").val("");
                        }
                        $(this).parent("li").remove();
                    }
                }
            });




            function isTempleteEmpty(){

                if($(".questionItems").html().replace(/^\s+|\s+$/g, '') =="")$("#questionItemTemplate").tmpl({"text":" "}).appendTo(".questionItems");
                <?php if($course->type != "high_school"):?>
                if($("#childrenEventList").html().replace(/^\s+|\s+$/g, '') =="") $("#ChildEventsTemplate").tmpl({}).appendTo("#childrenEventList");
                <?php endif;?>

            }
            isTempleteEmpty();

            //childrenEventList
            $("body").undelegate('.add-children-option-btn', 'click').delegate('.add-children-option-btn', 'click', function () {
                console.log(1);
                $("#ChildEventsTemplate").tmpl({}).appendTo("#childrenEventList");
            });

            //items
            $("body").undelegate('.add-item-option-btn', 'click').delegate('.add-item-option-btn', 'click', function () {
                console.log(1);
                $("#questionItemTemplate").tmpl({"text":" "}).appendTo(".questionItems");
            });

            $("#itemsOrigin").blur(function(){
                var items = $(this).val().split(",");
                $(".questionItems").empty();
                for(var k=0;k<items.length;k++){
                    $("#questionItemTemplate").tmpl({"text":items[k]}).appendTo(".questionItems");
                }
            });

            $("body").undelegate('.add-option-btn', 'click').delegate('.add-option-btn', 'click', function () {
                $("#multipleChoiceOptionTemplate").tmpl({}).appendTo($(this).siblings("ul"));
            });

            $("body").undelegate('.add-item-btn', 'click').delegate('.add-item-btn', 'click', function () {
                $("#multipleChoiceTemplate").tmpl({}).appendTo("#multipleChoicesList");
            });
            var itemListarray = ["vocabulary_listening",
                                "vocabulary_quiz_sentence",
                                "primary_vocabulary_quiz_sentence",
                                "vocabulary_quiz_picture",
                                "vocabulary_quiz_sentence_sr",
                                "read_and_click_fill_in",
                                "read_and_click_sentence_formation",
                                "read_and_click_cloze",
                                "read_and_speak_fill_in_sr",
                                "read_and_speak_sentence_formation_sr",
                                "read_and_speak_cloze_sr",
                                "review_look_and_click",
                                "review_look_and_speak",
                                "dialogue_interaction_sr",
                                "sr_readings",
                                "fill_in",
                                "click_ordering",
                                "sr_conjunction_clause",
                                "sr_ordering",
                                "primary_task_writing_case",
                                "primary_task_school_bag",
                                "primary_color_to_trash",
                                "primary_garbage_bin_classification",
                                "primary_pet_shop",
                                "primary_feed_an_animal",
                                "primary_task_sort",
                                 "primary_listen_and_match",
                                "primary_select_school_bag"
                                ];

            var choiceListArray = ["multipleChoices",
                "middle_multipleChoices",
                "review_multipleChoices_click",
                "review_multipleChoices_speak",
                "primary_review_multipleChoices_speak",
                "multipleChoices",
                "MTmultipleChoice",
                "MTmultipleChoices",
                "SRmultipleChoice"
            ];

            $("body").undelegate('#type', 'change').delegate('#type', 'change', function () {
               // alert($(this).val());
                $(".itemsList").hide();
                $(".multipleChoicesListItem").hide();
                if($(this).val() == 'speech'){
                    $("#common_content").hide();
                    $("#speech_content").show();
                }else{
                    $("#common_content").show();
                    $("#speech_content").hide();
                    if($.inArray($(this).val(),choiceListArray) > -1){
                        $(".multipleChoicesListItem").show();
                        if($("#multipleChoicesList").html().replace(/^\s+|\s+$/g, '') =="")
                            $("#multipleChoiceTemplate").tmpl({}).appendTo("#multipleChoicesList");
                    }else if($.inArray($(this).val(),itemListarray) > -1){
                        $(".itemsList").show();
                        if($(".itemsList").find(".questionItems").html().replace(/^\s+|\s+$/g, '') ==""){
                            $("#questionItemTemplate").tmpl({"text":" "}).appendTo($(".itemsList").find(".questionItems"));
                        }
                    }
                }
            });

            $("body").undelegate('.removeChildEvent', 'click').delegate('.removeChildEvent', 'click', function () {
                var id = $(this).parents(".childrenItem").data("id");
                var _this = $(this);
                if(id != 0 ){
                    if(confirm('你确定要删除该吗?')){
                        $.ajax({
                            type: "POST",
                            async: false,
                            url: '<?=anchorurl('parts/removeChildEvent')?>',
                            data: {
                                id:id,
                            },
                            beforeSend:function(){
                                _this.showLoading();
                            },
                            success: function (data){
                                _this.hideLoading();
                                _this.parents(".childrenItem").remove();
                            }
                        });
                    }
                }else{
                    $(this).parents(".childrenItem").remove();
                }
            });

            $("body").undelegate('.questionItemDelete', 'click').delegate('.questionItemDelete', 'click', function () {
                var id = $(this).parents(".questionItem").data("id");
                var _this = $(this);
                if(id != 0 ){
                    if(confirm('你确定要删除该吗?')){
                        $.ajax({
                            type: "POST",
                            async: false,
                            url: '<?=anchorurl('parts/removeQuestionItem')?>',
                            data: {
                                id:id,
                            },
                            beforeSend:function(){
                                _this.showLoading();
                            },
                            success: function (data){
                                _this.hideLoading();
                                _this.parents(".questionItem").remove();
                            }
                        });
                    }
                }else{
                    $(this).parents(".questionItem").remove();
                }
            });


            $("body").find("#multipleChoicesList").undelegate('.removeChoice', 'click').delegate('.removeChoice', 'click', function () {
                var id = $(this).parents(".multipleChoices").data("id");
                var _this = $(this);
                if(id != 0 ){
                    if(confirm('你确定要删除该吗?')){
                        $.ajax({
                            type: "POST",
                            async: false,
                            url: '<?=anchorurl('parts/removeMultipleChoice')?>',
                            data: {
                                id:id,
                            },
                            beforeSend:function(){
                                _this.showLoading();
                            },
                            success: function (data){
                                _this.hideLoading();
                                _this.parents(".multipleChoices").remove();
                            }
                        });
                    }
                }else{
                    $(this).parents(".multipleChoices").remove();
                }
            });

            $("body").undelegate('.remove_option', 'click').delegate('.remove_option', 'click', function () {
                var id = $(this).parents("li").find("input[name='item']").data("id");
                var _this = $(this);
                if(id != 0 ){
                    if(confirm('你确定要删除该吗?')){
                        $.ajax({
                            type: "POST",
                            async: false,
                            url: '<?=anchorurl('parts/removeItem')?>',
                            data: {
                                id:id,
                            },
                            beforeSend:function(){
                                _this.showLoading();
                            },
                            success: function (data){
                                _this.hideLoading();
                                _this.parents("li").remove();
                            }
                        });
                    }
                }else{
                    $(this).parents("li").remove();
                }
            });




            $('.update-icon-box').on('shown.bs.modal', function() {
                // alert(1);
                getFileList(true);

                // fileList.load({page: 1});
            });

            $("#submitEvent").click(function(){
                var multipleChoices = new Array();
                $("#multipleChoicesList").find(".multipleChoices").each(function(index,element){

                    var items = new Array();
                    $(element).find(".items").find("li").each(function(index1,element1){
                        var item = {
                            item:$(element1).find("input[name='item']").val(),
                            id:$(element1).find("input[name='item']").data("id"),
                            isCorrect:$(element1).find("input[name='isCorrect']").is(':checked')?1:0
                        };
                        items.push(item);
                    });

                    var multipleChoice = {
                        id:$(element).data("id"),
                        timeRange: $(element).find("input[name='timeRange']").val(),
                        text: $(element).find("textarea[name='text']").val(),
                        file_id:$(element).find("input[name='file_id']").val()?$(element).find("input[name='file_id']").val():0,
                        selectEventsyes:{
                                id:$(element).find(".selectEventsyes").data("id"),
                                timeRange:$(element).find(".selectEventsyes").find("input[name='timeRange']").val(),
                                text:$(element).find(".selectEventsyes").find("textarea[name='text']").val(),
                                file_id:$(element).find(".selectEventsyes").find("input[name='file_id']").val()?$(element).find(".selectEventsyes").find("input[name='file_id']").val():0,
                        },
                        selectEventsno:{
                            id:$(element).find(".selectEventsno").data("id"),
                            timeRange:$(element).find(".selectEventsno").find("input[name='timeRange']").val(),
                            text:$(element).find(".selectEventsno").find("textarea[name='text']").val(),
                            file_id:$(element).find(".selectEventsno").find("input[name='file_id']").val()?$(element).find(".selectEventsno").find("input[name='file_id']").val():0,
                        },
                        items:items
                    };
                    multipleChoices.push(multipleChoice);
                });


                var  selectEventsyes = {
                    id:$(".selectEventsList").find(".selectEventsyes").data("id"),
                    timeRange:$(".selectEventsList").find(".selectEventsyes").find("input[name='timeRange']").val(),
                    text:$(".selectEventsList").find(".selectEventsyes").find("textarea[name='text']").val(),
                    file_id:$(".selectEventsList").find(".selectEventsyes").find("input[name='file_id']").val()?$(".selectEventsList").find(".selectEventsyes").find("input[name='file_id']").val():0,
                };

                var  selectEventsno = {
                    id:$(".selectEventsList").find(".selectEventsno").data("id"),
                    timeRange:$(".selectEventsList").find(".selectEventsno").find("input[name='timeRange']").val(),
                    text:$(".selectEventsList").find(".selectEventsno").find("textarea[name='text']").val(),
                    file_id:$(".selectEventsList").find(".selectEventsno").find("input[name='file_id']").val()?$(".selectEventsList").find(".selectEventsno").find("input[name='file_id']").val():0,
                };

                var selectContent = {
                        selectEventsyes:selectEventsyes,
                        selectEventsno:selectEventsno,
                        content_id:$(".selectEventsList").data("id")
                    };

                var  clickEvent_1 = {
                    id:$(".clickEventsList").find(".clickEvent_1").data("id"),
                    type:$(".clickEventsList").find(".clickEvent_1").find("select[name='type']").val(),
                    score:$(".clickEventsList").find(".clickEvent_1").find("input[name='score']").val()?$(".clickEventsList").find(".clickEvent_1").find("input[name='score']").val():0,
                    timeRange:$(".clickEventsList").find(".clickEvent_1").find("input[name='timeRange']").val(),
                    text:$(".clickEventsList").find(".clickEvent_1").find("textarea[name='text']").val(),
                    file_id:$(".clickEventsList").find(".clickEvent_1").find("input[name='file_id']").val()?$(".clickEventsList").find(".clickEvent_1").find("input[name='file_id']").val():0,
                };

                var  clickEvent_2 = {
                    id:$(".clickEventsList").find(".clickEvent_2").data("id"),
                    type:$(".clickEventsList").find(".clickEvent_2").find("select[name='type']").val(),
                    score:$(".clickEventsList").find(".clickEvent_2").find("input[name='score']").val()?$(".clickEventsList").find(".clickEvent_2").find("input[name='score']").val():0,
                    timeRange:$(".clickEventsList").find(".clickEvent_2").find("input[name='timeRange']").val(),
                    text:$(".clickEventsList").find(".clickEvent_2").find("textarea[name='text']").val(),
                    file_id:$(".clickEventsList").find(".clickEvent_2").find("input[name='file_id']").val()?$(".clickEventsList").find(".clickEvent_2").find("input[name='file_id']").val():0,
                };

                var clickContent = {
                    clickEvent_1:clickEvent_1,
                    clickEvent_2:clickEvent_2,
                    content_id:$(".clickEventsList").data("id")
               };

                var childrenEventList = new Array();
                $("#childrenEventList").find(".childrenItem").each(function(index3,element3){
                    var childrenItem = {
                        id:$(element3).data("id"),
                        type:$(element3).find("select[name='type']").val(),
                        timeRange:$(element3).find("input[name='timeRange']").val(),
                        score:$(element3).find("input[name='score']").val(),
                        text:$(element3).find("textarea[name='text']").val(),
                        file_id:$(element3).find("input[name='file_id']").val()?$(element3).find("input[name='file_id']").val():0,
                    };
                    childrenEventList.push(childrenItem);
                });

                var childrenEventList = {
                    childrenEventList:childrenEventList,
                    content_id:$("#childrenEventList").data("id")
                };

                var items = new Array();
                    $(".itemsList").find(".questionItem").each(function(indexItems,element4){
                        var item = {
                                id:$(element4).data("id"),
                                timeRange:$(element4).find("input[name='timeRange']").val(),
                                text:$(element4).find("textarea[name='text']").val(),
                                isCorrect:$(element4).find("input[name='isCorrect']").is(':checked')?1:0,
                                file_id:$(element4).find("input[name='file_id']").val()?$(element4).find("input[name='file_id']").val():0,
                                picture_file_ids:$(element4).find("input[name='picture_file_ids']").val()?$(element4).find("input[name='picture_file_ids']").val():0,
                            picture_origin_ids:$(element4).find("input[name='picture_origin_ids']").val()?$(element4).find("input[name='picture_origin_ids']").val():0,

                        };
                        items.push(item);
                    });
                if(items.length > 1){
                    var itemEntity = {
                        items:items,
                        content_id:$(".itemsList").find(".questionItem").data("id")
                    };
                }else{
                    var itemEntity = {
                        items:[],
                        content_id:$(".itemsList").find(".questionItem").data("id")
                    };
                }

                //multipleChoice遍历
                var data = {
                        "picture_file_ids":$("#picture_file_ids").val(),
                        "media_file_ids":$("#media_file_ids").val(),
                        "timeRange":$("#timeRange").val(),
                        "cloze_answer":$("#cloze_answer").val(),
                        "content_en":$("#content_en").val(),
                        "speech_keywords":$("#speech_keywords").val(),
                        "content_zh":$("#content_zh").val(),
                        "displayKewords":$("#displayKewords").val(),
                        "all_right":$("#all_right").val(),
                        "system_key":$("#system_key").val(),
                        "text":$("#text").val(),
                        "answer":$("#answer").val(),
                        "answers":$("#answers").val(),
                        "type":$("#type").val(),
                        "scores":$("#scores").val(),
                        "id":<?php if(isset($event->id)) echo $event->id; else echo 0;?>,
                        "multipleChoices":multipleChoices,
                        "part_id":<?=$part->id?>,
                        "lesson_id":<?=$lesson->id?>,
                        "unit_id":<?=$unit->id?>,
                        "selectContent":selectContent,
                        "clickContent":clickContent,
                        "childrenEventList":childrenEventList,
                        "itemEntity":itemEntity,
                        "name":$("#name").val(),
                        "avatar_id":$("#avatar_id").val(),
                };
                console.log(data);
                $.ajax({
                    type: "POST",
                    async: false,
                    url: '<?=anchorurl('parts/save')?>',
                    data: {
                        data:JSON.stringify(data),
                    },
                    beforeSend:function(){
                        $("#submitEvent").showLoading();
                    },
                    success: function (data){
                        $("#submitEvent").hideLoading();
                        retisterLimitTip("保存成功");
                       window.location.href = '<?=anchorurl("parts/getEventList/".$part->id)?>';
                    }
                });
            });

            $("#saveFiles").click(function(){
                var selectedRows =  fileList.selectedRows();
                var index_array = new Array();
                console.log(media_type);
                if(name !== "" &&  media_type !== ""){
                    console.log(name);
                    if(media_type == "image"){
                        $("."+name).empty();
                    }
                    for(var i=0;i<selectedRows.length;i++){
                        index_array.push(selectedRows[i].id);
                        if(media_type == "image"){
                            $("."+name).append(' <li> <img src="'+selectedRows[i].originurl+'" alt=""> <i class="fa fa-close removePicture" aria-hidden="true" data-id="'+selectedRows[i].id+'"></i> </li>');
                        }
                    }
                    if(index_array.length > 0){
                        $("input[name='"+name+"']").val(index_array.join(","));
                        if(media_type != "image") {
                            var media_File = $("input[name='"+name+"']").siblings('.media_file');
                            media_File.empty();
                            if(selectedRows[0].type == "audio"){
                                $(".media_filename_video").css({"height":"52px"});
                            }else{
                                $(".media_filename_video").css({"height":"220px"});
                            }
                            console.log(selectedRows[0]);
                            $("#mediaTemplate").tmpl(selectedRows[0]).appendTo(media_File);
                        }
                    }
                    else $("input[name='"+name+"']").val("");

                }else{

                    console.log(_this);
                    if(_this !== ""){
                        console.log(_this);
                        if(media_type == "image"){
                            for(var i=0;i<selectedRows.length;i++){
                                index_array.push(selectedRows[i].id);
                                if(media_type == "image"){
                                    _this.find("ul.picture_file_ids").append(' <li> <img src="'+selectedRows[i].originurl+'" alt=""> <i class="fa fa-close removePicture" aria-hidden="true" data-id="'+selectedRows[i].id+'"></i> </li>');
                                }
                            }
                            if(index_array.length > 0){
                                _this.find("input[name='picture_file_ids']").val(index_array.join(","))
                            }

                            var index_array = new Array();

                            for(var i=0;i<selectedRows.length;i++){
                                index_array.push(selectedRows[i].id);
                                if(media_type == "image"){
                                    _this.find("ul.picture_origin_ids").append(' <li> <img src="'+selectedRows[i].originurl+'" alt=""> <i class="fa fa-close removePicture" aria-hidden="true" data-id="'+selectedRows[i].id+'"></i> </li>');
                                }
                            }
                            if(index_array.length > 0){
                                _this.find("input[name='picture_origin_ids']").val(index_array.join(","))
                            }

                        }else{
                            _this.empty();
                            if(selectedRows[0].type == "audio"){
                                $(".media_filename_video").css({"height":"52px"});
                            }else{
                                $(".media_filename_video").css({"height":"220px"});
                            }
                            $("#mediaTemplate").tmpl(selectedRows[0]).appendTo(_this);
                        }
                       // _this.find("input[name='file_id']").val(index_array.join(","));
                    }
                }
                $(".update-icon-box").modal("hide");
            });


            $('#fileeditupload').fileupload({
                dataType: 'json',
                autoUpload: true,
                add: function (e, data) {
                    var url = '<?=anchorurl("fileupload/addFile/".$lesson->id)?>/'+file.id;
                    $(this).fileupload('option', 'url', url);
                    data.submit();
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    if(progress == 0 || progress == 100){
                        $("#progress").hide();
                    }else{
                        $("#progress").show();
                    }

                    $('#progress .bar').css(
                        'width',
                        progress + '%'
                    );
                    $("#progress-per").html( progress + '%');
                },
                done: function (e, data) {
//              $.each(data.result.files, function (index, file) {
//                  $('<p/>').text(file.name).appendTo(document.body);
//              });
                    $("#progress").hide();

                    fileList.load({page: 1});
                }
            });


            $('#fileupload').fileupload({
                dataType: 'json',
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    if(progress == 0 || progress == 100){
                        $("#progress").hide();
                    }else{
                        $("#progress").show();
                    }

                    $('#progress .bar').css(
                        'width',
                        progress + '%'
                    );
                    $("#progress-per").html( progress + '%');
                },
                done: function (e, data) {
//              $.each(data.result.files, function (index, file) {
//                  $('<p/>').text(file.name).appendTo(document.body);
//              });
                    $("#progress").hide();

                    fileList.load({page: 1});
                }
            });

            function getSecondFromTime(time) {
                var second = 0;
                var temp = time.split(":");
                if (temp.length >= 2) {
                    second += parseInt(temp[0])*60;
                    second += parseInt(temp[1]);
                    second = second*1000;
                    if (temp.length > 2) {
                        second += parseInt(temp[2]);
                    }
                }
                return second;
            }


            //录音播放控制

            $("body").undelegate('.media_play', 'click').delegate('.media_play', 'click', function () {
                var audio = $(this).find("audio")[0];
                audio.load();
                var timeRange = $(this).parents(".audiobody").siblings(".timeRange").find("input[name='timeRange']").val();
                var timeRangearray = timeRange.split("-");
                if(timeRangearray.length <=1){
                    retisterLimitTip("请确保 timeRange 正确 !");
                    return;
                }
                var start_time = getSecondFromTime(timeRangearray[0]);
                var end_time   = getSecondFromTime(timeRangearray[1]);
                var duration = (end_time-start_time)/1000;

                audio.currentTime = start_time/1000;
                console.log(1);
                if(audio.paused){
                    $(this).removeClass("media_play");
                    $(this).addClass("media_pause");
                    audio.play();
                }else{
                    $(this).removeClass("media_pause");
                    $(this).addClass("media_play");
                    audio.pause();
                }
                var _this = $(this);
                var box = $(this).parents(".media_box");
                var progress = $(this).parents(".media_box").find(".media_progress");
                var bar  = $(this).parents(".media_box").find(".media_progress").find(".media_bar");
                var control = $(this).parents(".media_box").find(".media_progress").find(".media_control");
                audio.addEventListener("timeupdate",function(){
                    //var scales=audio.currentTime/audio.duration;
                    //    console.log(audio.currentTime+"----"+audio.duration);

                    var time1 = parseInt(audio.currentTime*1000);
                    var comparetime = time1-start_time;
                    console.log(comparetime+'----'+duration);
                    var scales= comparetime/parseInt(duration*1000);
                    console.log(scales);
                    //  console.log(scales+'aaa'+audio.currentTime+'xxx'+(start_time/1000));
                    // console.log(audio.currentTime);
                    // console.log(audio.currentTime);
                    // console.log((audio.currentTime-start_time/1000)+"----"+duration);
                    if(scales >=1)  scales = 1;
                    bar.css("width",scales*100+"%");
                    control.css("left",progress[0].offsetWidth*scales+"px");
                    if(audio.currentTime >= (end_time/1000)){
                        console.log(111);
                        audio.pause();
                        _this.removeClass("media_pause");
                        _this.addClass("media_play");
                        bar.css("width","0%");
                        control.css("left","0px");
                    }
                },false)
            });


            //视频播放控制

            $("body").undelegate('.video_play', 'click').delegate('.video_play', 'click', function () {
                var video = $(this).find("video")[0];
                video.load();
                var timeRange = $(this).parents(".audiobody").siblings(".timeRange").find("input[name='timeRange']").val();
                var timeRangearray = timeRange.split("-");
                if(timeRangearray.length <=1){
                    retisterLimitTip("请确保 timeRange 正确 !");
                    return;
                }
                var start_time = getSecondFromTime(timeRangearray[0]);
                var end_time   = getSecondFromTime(timeRangearray[1]);
                var duration = (end_time-start_time)/1000;

                video.currentTime = start_time/1000;
                console.log(1);
                if(video.paused){
                    $(this).removeClass("video-icon");
                    video.play();
                }else{
                    video.pause();
                    $(this).addClass("video-icon");
                }
                var _this = $(this);
                video.addEventListener("timeupdate",function(){
                    if(video.currentTime >= (end_time/1000) || video.paused){
                        video.pause();
                        _this.addClass("video-icon");
                    }
                },false)
            });

            $(document).keyup(function(event){
                if(event.keyCode ==13){
                    fileList.load({key:$("#filekey").val()});
                }
            });
            $("#searchFiles").click(function(){
                fileList.load({key:$("#filekey").val()});
            });

            $("#submitEventTwo").click(function(){
                $("#submitEvent").click();
            });
        });
    </script>


</body>
</html>

