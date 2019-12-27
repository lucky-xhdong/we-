<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php $this->load->view('wePlatForm/tmpl/title'); ?>
  <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
  <?php $this->load->view('wePlatForm/meta'); ?>
  <?php $this->load->view('tmpl/mmgrid');?>
  <?php $this->load->view('tmpl/fileupload');?>
  <?php $this->load->view('tmpl/jqueryvalidate');?>
</head>
<body>
<div class="container-fluid BusinessArchives">
  <div class="row">
    <!-- 左侧菜单 start -->
    <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
    <!-- 左侧菜单 end -->
    <div class="col-md-9 ba--main-wrapper">
      <!--菜单切换 start-->
      <?=$this->load->view("wePlatForm/tmpl/headernav")?>
      <!--菜单切换 end-->
      <!--面包屑 start-->
      <nav class="common-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
          <li class="breadcrumb-item"><a href="<?=anchorurl("regions")?>">区域档案</a></li>
          <li class="breadcrumb-item active" aria-current="page">商务</li>
        </ol>
      </nav>
      <!--面包屑 end-->
      <!--主体内容 start-->
      <div class="ba--main__content">
        <div id="accordion">
          <!--区域基本信息 start-->
          <div class="card ba--main__basic">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  区域基本信息
                  <i class="icon icon-expand"></i>
                </button>
              </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                <form>
                  <div class="form-row">
                    <div class="form-group _input-group col-md-11" data-before="区域姓名：">
                      <input type="text" class="form-control form-control-sm" value="<?php if(isset($region->id)) echo $region->name;?>" placeholder="区域姓名"/>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group select-group col-md-4" data-before="所属省份：">
                      <select class="form-control form-control-sm" placeholder="省份" name="province_id" id="province_new1">
                        <option value="0">--省份--</option>
                        <?php foreach($provinces as $province):?>
                          <?php if(isset($region->id) && $region->province_id ==$province->province_id):?>
                            <option value="<?=$province->province_id?>" selected><?=$province->name?></option>
                          <?php else:?>
                            <option value="<?=$province->province_id?>"><?=$province->name?></option>
                          <?php endif;?>
                        <?php endforeach;?>
                      </select>
                    </div>
                    <div class="form-group select-group col-md-4" data-before="城市：">
                      <select class="form-control form-control-sm" placeholder="城市" name="city_id" id="city_new1">
                        <option value="0">--城市--</option>
                        <?php foreach($citys as $city):?>
                          <?php if(isset($region->id) && $region->city_id ==$city->city_id):?>
                            <option value="<?=$city->city_id?>" selected><?=$city->name?></option>
                          <?php else:?>
                            <option value="<?=$city->city_id?>"><?=$city->name?></option>
                          <?php endif;?>

                        <?php endforeach;?>
                      </select>
                    </div>
                    <div class="form-group select-group col-md-4" data-before="地区：">
                      <select class="form-control form-control-sm" placeholder="地区" name="district_id" id="district_new1">
                        <option value="0">--地区--</option>
                        <?php foreach($districts as $district):?>
                          <?php if(isset($region->id) && $region->district_id ==$district->district_id):?>
                            <option value="<?=$district->district_id?>" selected><?=$district->name?></option>
                          <?php else:?>
                            <option value="<?=$district->district_id?>"><?=$district->name?></option>
                          <?php endif;?>
                        <?php endforeach;?>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group _input-group col-md-11" data-before="区域标题：">
                      <input type="text" class="form-control form-control-sm" placeholder="区域标题"/>
                    </div>
                  </div>
                  <!--                    <div class="form-row">-->
                  <!--                      <div class="tags-group">-->
                  <!--                        <ul data-before="区域特征">-->
                  <!--                          <li><span class="tags-group__span">标签1<a href="javascript:;" class="tags-group__delete">&times;</a></span></li>-->
                  <!--                          <li><span class="tags-group__span">标签1<a href="javascript:;" class="tags-group__delete">&times;</a></span></li>-->
                  <!--                          <li><span class="tags-group__span">标签1<a href="javascript:;" class="tags-group__delete">&times;</a></span></li>-->
                  <!--                          <li><span class="tags-group__span">标签1<a href="javascript:;" class="tags-group__delete">&times;</a></span></li>-->
                  <!--                          <li>-->
                  <!--                            <button type="button" class="tags-group__new">添加</button>-->
                  <!--                            <input type="text" class="tags-group__input">-->
                  <!--                          </li>-->
                  <!--                        </ul>-->
                  <!--                        <ul data-before="扩展特征">-->
                  <!--                          <li><span class="tags-group__span">标签1<a href="javascript:;" class="tags-group__delete">&times;</a></span></li>-->
                  <!--                          <li><span class="tags-group__span">标签1<a href="javascript:;" class="tags-group__delete">&times;</a></span></li>-->
                  <!--                          <li><span class="tags-group__span">标签1<a href="javascript:;" class="tags-group__delete">&times;</a></span></li>-->
                  <!--                          <li><span class="tags-group__span">标签1<a href="javascript:;" class="tags-group__delete">&times;</a></span></li>-->
                  <!--                          <li>-->
                  <!--                            <button type="button" class="tags-group__new">添加</button>-->
                  <!--                            <input type="text" class="tags-group__input">-->
                  <!--                          </li>-->
                  <!--                        </ul>-->
                  <!--                      </div>-->
                  <!--                    </div>-->
                  <!--                    <div class="form-row">-->
                  <!--                      <div class="form-group col-md-12">-->
                  <!--                        <textarea class="form-control form-control-sm" name=description" placeholder="区域介绍">--><?php //if(isset($region->id)) echo $region->description;?><!--</textarea>-->
                  <!--                      </div>-->
                  <!--                    </div>-->
<!--                  <div class="btn-group">-->
<!--                    <button type="submit" class="btn btn-light btn-cancel">取消</button>-->
<!--                    <button type="submit" class="btn btn-light btn-save">保存</button>-->
<!--                  </div>-->
                </form>
              </div>
            </div>
          </div>
          <!--区域基本信息 end-->
          <!--区域档案信息 start-->
          <?php if($type == "business"):?>
          <div class="card ba--main__archives">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  区域档案信息
                  <i class="icon icon-expand"></i>
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                <ul class="nav nav-tabs ba--main__tabs" id="nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="regional-tab" data-toggle="tab" href="#regional" role="tab" aria-controls="资料文档" aria-selected="true">资料文档</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="regional-extend-tab" data-toggle="tab" href="#regional-extend" role="tab" aria-controls="解决方案" aria-selected="false">解决方案</a>
                  </li>
                </ul>
                <div class="tab-content ba--main__cons" id="tab-content">
                  <div class="tab-pane fade show active" id="regional" role="tabpanel" aria-labelledby="regional-tab">
                    <div class="common-table">
                      <div id="region_document"></div>
                      <div class="btn-group-upload">
                        <a href="javascript:;" class="btn btn-outline-primary btn-sm btn-add">
                          <i class="icon-add">
                            <i class="path1"></i>
                            <i class="path2 progress-per_1"></i>
                          </i>上传文档
                          <input type="file" class="upload-file" data-class="progress-per_1" name="file" data-url="<?=anchorurl("fileupload/addTypeFile/".$region->id.'/0/region_document')?>" multiple>
                        </a>
                      </div>
                      <div id="paginator_region_document"></div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="regional-extend" role="tabpanel" aria-labelledby="regional-extend-tab">
                    <div class="common-table">
                      <div id="region_solution"></div>
                      <div class="btn-group-upload">
                        <a href="javascript:;" class="btn btn-outline-primary btn-sm btn-add">
                          <i class="icon-add">
                            <i class="path1"></i>
                            <i class="path2 progress-per_2"></i>
                          </i>上传文档
                          <input type="file" class="upload-file" data-class="progress-per_2" name="file" data-url="<?=anchorurl("fileupload/addTypeFile/".$region->id.'/0/region_solution')?>" multiple>
                        </a>
                      </div>
                      <div id="paginator_region_solution"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endif;?>
          <!--区域档案信息 end-->
          <!--区域教学服务 start-->
          <div class="card ba--main__teachingservice">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  区域商务计划
                  <i class="icon icon-expand"></i>
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
              </div>
              <div class="common-table">
                <div id="region_service_plan"></div>
                <?php if($type == "business"):?>
                <div class="btn-group-upload">
                  <a href="javascript:;"  data-toggle="modal" data-target="#region_service_plan_modal" class="btn btn-outline-primary btn-sm btn-add">
                    <i class="icon-add">
                      <i class="path1"></i>
                      <i class="path2"></i>
                    </i>添加计划
                  </a>
                </div>
                <?php endif;?>
                <div id="paginator_region_service_plan"></div>
              </div>
            </div>
          </div>
          <!--区域教学服务 end-->
          <!--区域商务信息 start-->
          <?php if($type == "business"):?>
          <div class="card ba--main__business">
            <div class="card-header" id="headingFour">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  区域商务信息
                  <i class="icon icon-expand"></i>
                </button>
              </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
              <div class="card-body row">
                <!--                  <div class="col-6 ba--main__business_item" data-before="签约状态：">未签约</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="签 约 人：">王小二</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="有 效 期：">2016-03-23至2018-03-23</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="合同金额：">2323232323.00元</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="合同页码：">23页</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="查看合同：">点击查看合同</div>-->
              </div>
              <div class="common-table">
                <div id="region_business"></div>
                <div class="btn-group-upload">
                  <a href="javascript:;"  data-toggle="modal" data-target="#business_modal" class="btn btn-outline-primary btn-sm btn-add">
                    <i class="icon-add">
                      <i class="path1"></i>
                      <i class="path2"></i>
                    </i>上传商务信息
                  </a>
                </div>
                <div id="paginator_region_business"></div>
              </div>
            </div>
          </div>
          <?php endif;?>
          <!--区域商务信息 end-->
          <!--区域商务信息 start-->
          <div class="card ba--main__business">
            <div class="card-header" id="headingFive">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  区域服务报告
                  <i class="icon icon-expand"></i>
                </button>
              </h5>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
              <div class="card-body row">
                <!--                  <div class="col-6 ba--main__business_item" data-before="签约状态：">未签约</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="签 约 人：">王小二</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="有 效 期：">2016-03-23至2018-03-23</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="合同金额：">2323232323.00元</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="合同页码：">23页</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="查看合同：">点击查看合同</div>-->
              </div>
              <div class="common-table">
                <div id="region_service_report"></div>
                <?php if($type == "business" || $type == "education"):?>
                <div class="btn-group-upload">
                  <a href="javascript:;"  data-toggle="modal" data-target="#service_report_modal" class="btn btn-outline-primary btn-sm btn-add">
                    <i class="icon-add">
                      <i class="path1"></i>
                      <i class="path2"></i>
                    </i>添加报告
                  </a>
                </div>
                <?php endif;?>
                <div id="paginator_region_service_report"></div>
              </div>
            </div>
          </div>
          <!--区域商务信息 end-->

          <!--教学计划 start-->
          <div class="card ba--main__business">
            <div class="card-header" id="headingSeven">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseFive">
                  教学计划
                  <i class="icon icon-expand"></i>
                </button>
              </h5>
            </div>
            <div id="collapseSeven" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
              <div class="card-body row">
                <!--                  <div class="col-6 ba--main__business_item" data-before="签约状态：">未签约</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="签 约 人：">王小二</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="有 效 期：">2016-03-23至2018-03-23</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="合同金额：">2323232323.00元</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="合同页码：">23页</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="查看合同：">点击查看合同</div>-->
              </div>
              <div class="common-table">
                <div id="region_education_plan"></div>
                <?php if($type != "business" && $type != "operate"):?>
                <div class="btn-group-upload">
                  <a href="javascript:;"  data-toggle="modal" data-target="#region_education_plan_modal " class="btn btn-outline-primary btn-sm btn-add">
                    <i class="icon-add">
                      <i class="path1"></i>
                      <i class="path2"></i>
                    </i>添加教学计划
                  </a>
                </div>
                <?php endif;?>
                <div id="paginator_region_education_plan"></div>
              </div>
            </div>
          </div>
          <!--教学计划 end-->

          <!--运营计划 start-->
          <div class="card ba--main__business">
            <div class="card-header" id="headingEight">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseFive">
                  运营计划
                  <i class="icon icon-expand"></i>
                </button>
              </h5>
            </div>
            <div id="collapseEight" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
              <div class="card-body row">
                <!--                  <div class="col-6 ba--main__business_item" data-before="签约状态：">未签约</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="签 约 人：">王小二</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="有 效 期：">2016-03-23至2018-03-23</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="合同金额：">2323232323.00元</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="合同页码：">23页</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="查看合同：">点击查看合同</div>-->
              </div>
              <div class="common-table">
                <div id="region_operate_plan"></div>
                <?php if($type != "business" && $type != "education"):?>
                <div class="btn-group-upload">
                  <a href="javascript:;"  data-toggle="modal" data-target="#region_operate_plan_modal " class="btn btn-outline-primary btn-sm btn-add">
                    <i class="icon-add">
                      <i class="path1"></i>
                      <i class="path2"></i>
                    </i>添加运营计划
                  </a>
                </div>
                <?php endif;?>
                <div id="paginator_region_operate_plan"></div>
              </div>
            </div>
          </div>
          <!--运营计划 end-->

          <!--区域学校 start-->
          <div class="card ba--main__business">
            <div class="card-header" id="headingNine">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseFive">
                  区域学校
                  <i class="icon icon-expand"></i>
                </button>
              </h5>
            </div>
            <div id="collapseNine" class="collapse show" aria-labelledby="headingNine" data-parent="#accordion">
              <div class="card-body row">
                <!--                  <div class="col-6 ba--main__business_item" data-before="签约状态：">未签约</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="签 约 人：">王小二</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="有 效 期：">2016-03-23至2018-03-23</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="合同金额：">2323232323.00元</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="合同页码：">23页</div>-->
                <!--                  <div class="col-6 ba--main__business_item" data-before="查看合同：">点击查看合同</div>-->
              </div>
              <div class="common-table">
                <div id="region_schools"></div>
                <div id="paginator_schools"></div>
              </div>
            </div>
          </div>
          <!--区域学校 end-->

        </div>
      </div>
      <!--主体内容 end-->
    </div>
  </div>
  <div class="modal fade commonModal" id="business_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">区域商务信息</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?=anchorurl('regions/addRegionBusiness/'.$region->id)?>" id="region_business_form" class="form-group needs-validation" novalidate method="post">
          <div class="modal-body" id="regionBusinessBody">

          </div>
          <div class="modal-footer">
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
              <button type="button" class="btn btn-primary btn-save" id="saveRegionBusiness">保存</button>
<!--              <button type="button" class="btn btn-primary btn-submit">提交审核</button>-->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

   <!--区域商务计划-->
  <div class="modal fade commonModal" id="region_service_plan_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">区域商务计划</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?=anchorurl('regions/addRegionServicePlan/'.$region->id)?>" id="region_service_plan_form" class="form-group needs-validation" novalidate method="post">
          <div class="modal-body" id="RegionServicePlanBody">
            <div class="_input-group">
              <div class="form-row" data-before="计划名称：">
                <div class="form-group col-md-8">
                  <input type="text" class="form-control form-control-sm" placeholder="计划名称" name="name" required>
                </div>
              </div>
            </div>
            <div class="_input-group">
              <div class="form-row" data-before="计划介绍：">
                <div class="form-group col-md-8">
                  <textarea type="text" class="form-control form-control-sm" placeholder="计划介绍" name="description"></textarea>
                </div>
              </div>
            </div>
            <div class="_input-group">
              <div class="form-row" data-before="计划属性：">
                <div class="form-group col-md-2">
                  <select class="form-control form-control-sm" placeholder="发布范围" name="plan_range">
                    <option value="<?=$region->id?>"><?=$region->name?></option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <select class="form-control form-control-sm" placeholder="学校" name="school_id">
                    <option value="0">请选择学校</option>
                    <?php foreach($schools as $school):?>
                      <option value="<?=$school->id?>"><?=$school->name?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
            </div>
            <div class="_input-group _input-date-group">
              <div class="form-row" data-before="计划周期：">
                <div class="form-group col-md-4">
                  <input type="text" class="form-control form-control-sm datepicker" placeholder="开始日期" name="start_date">
                </div>至
                <div class="form-group col-md-4">
                  <input type="text" class="form-control form-control-sm datepicker" placeholder="结束日期" name="end_date">
                </div>
              </div>
            </div>
            <div class="_input-group">
              <div class="form-row" data-before="计划内容：">
                <div class="form-group col-md-8">
                  <textarea type="text" class="form-control form-control-sm" placeholder="计划内容" name="body"></textarea>
                </div>
              </div>
            </div>
            <div class="_input-group">
              <div class="form-row" data-before="附件：">
                <div class="custom-file-control">
                  <input type="file" name="file">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
              <button type="button" class="btn btn-primary btn-save" id="saveRegionServicePlan">保存</button>
               <button type="button" class="btn btn-primary btn-save" id="auditRegionServicePlan">提交审核</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--区域运营计划-->
  <div class="modal fade commonModal" id="region_operate_plan_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">区域运营计划</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?=anchorurl('regions/addRegionOperatePlan/'.$region->id)?>" id="region_operate_plan_form" class="form-group needs-validation" novalidate method="post">
          <div class="modal-body" id="RegionOperatePlanBody">
            <div class="_input-group">
              <div class="form-row" data-before="计划名称：">
                <div class="form-group col-md-8">
                  <input type="text" class="form-control form-control-sm" placeholder="计划名称" name="name" required>
                </div>
              </div>
            </div>
            <div class="_input-group">
              <div class="form-row" data-before="计划介绍：">
                <div class="form-group col-md-8">
                  <textarea type="text" class="form-control form-control-sm" placeholder="计划介绍" name="description"></textarea>
                </div>
              </div>
            </div>
            <div class="_input-group">
              <div class="form-row" data-before="计划属性：">
                <div class="form-group col-md-3">
                  <select class="form-control form-control-sm" placeholder="属性" name="plan_type">
                    <option value="0">运营</option>
                    <option value="1">教学</option>
                    <option value="2">商务</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <select class="form-control form-control-sm" placeholder="发布范围" name="plan_range">
                    <option value="0">区域</option>
                    <option value="1">学校</option>

                  </select>
                </div>
                <div class="form-group col-md-3">
                  <select class="form-control form-control-sm" placeholder="学校" name="school_id">
                    <option value="0">请选择</option>
                    <?php foreach($schools as $school):?>
                      <option value="<?=$school->id?>"><?=$school->name?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
            </div>
            <div class="_input-group _input-date-group">
              <div class="form-row" data-before="计划周期：">
                <div class="form-group col-md-4">
                  <input type="text" class="form-control form-control-sm datepicker" placeholder="开始日期" name="start_date">
                </div>至
                <div class="form-group col-md-4">
                  <input type="text" class="form-control form-control-sm datepicker" placeholder="结束日期" name="end_date">
                </div>
              </div>
            </div>
            <div class="_input-group">
              <div class="form-row" data-before="计划内容：">
                <div class="form-group col-md-8">
                  <textarea type="text" class="form-control form-control-sm" placeholder="计划内容" name="body"></textarea>
                </div>
              </div>
            </div>
            <div class="_input-group">
              <div class="form-row" data-before="附件：">
                <div class="custom-file-control">
                  <input type="file" name="file">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
              <button type="button" class="btn btn-primary btn-save"    id="saveRegionOperatePlan">保存</button>
              <button type="button" class="btn btn-primary btn-save"  id="verifyRegionOperatePlan">提交审核</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--区域服务报告-->
  <div class="modal fade commonModal" id="service_report_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">区域服务报告</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?=anchorurl('regions/addRegionServiceReport/'.$region->id)?>" id="region_service_report_form" class="form-group needs-validation" novalidate method="post">
          <div class="modal-body" id="regionServiceBody">
          </div>
          <div class="modal-footer">
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
              <button type="button" class="btn btn-primary btn-save" id="saveRegionServiceReport">保存</button>
              <!--              <button type="button" class="btn btn-primary btn-submit">提交审核</button>-->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!--教学成果-->
  <div class="modal fade commonModal" id="teaching_achievement_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">教学成果</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?=anchorurl('regions/addTeachingAchievement/'.$region->id)?>" id="region_teaching_achievement_form" class="form-group needs-validation" novalidate method="post">
          <div class="modal-body">
            <div class="_input-group">
              <div class="form-row" data-before="成果名称：">
                <div class="form-group col-md-8">
                  <input type="text" class="form-control form-control-sm" placeholder="成果名称" name="name" required>
                </div>
              </div>
            </div>
            <?php
               $TeachingAchievementtypes = array(
                   0=>"优秀教案",
                   1=>"课程反思",
                   2=>"Demo课",
                   3=>"科研论文"
               );

            ?>
            <div class="_input-group">
              <div class="form-row" data-before="成果类型：">
                <div class="form-group col-md-8">
                  <select class="form-control form-control-sm" placeholder="成果类型" name="type">
                    <option value="0">请选择</option>
                    <?php foreach($TeachingAchievementtypes as $key=> $TeachingAchievementtype):?>
                      <option value="<?=$key?>"><?=$TeachingAchievementtype?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
            </div>
            <div class="_input-group">
              <div class="form-row" data-before="发布范围：">
                <div class="form-group col-md-4">
                  <select class="form-control form-control-sm" placeholder="学校" name="school_id">
                    <option value="0">请选择</option>
                    <?php foreach($schools as $school):?>
                      <option value="<?=$school->id?>"><?=$school->name?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <select class="form-control form-control-sm" placeholder="教师" name="teacher_id">
                    <option value="0">1</option>
                    <option value="1">2</option>

                  </select>
                </div>
              </div>
            </div>
            <div class="radio-group">
              <div class="form-row" data-before="文档上传：">
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio"  value="0" name="post_type" class="custom-control-input" checked>
                  <label class="custom-control-label" for="useTeaching">直接上传</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" value="1" name="post_type" class="custom-control-input">
                  <label class="custom-control-label" for="unUseTeaching">资源库资源</label>
                </div>
              </div>
            </div>

            <div class="_input-group">
              <div class="form-row" data-before="附件：">
                <div class="custom-file-control">
                  <input type="file" name="file">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
              <button type="button" class="btn btn-primary btn-save" id="saveTeachingAchievement">保存</button>
              <!--              <button type="button" class="btn btn-primary btn-submit">提交审核</button>-->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--教学计划-->
  <div class="modal fade commonModal" id="region_education_plan_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">教学计划</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?=anchorurl('regions/addRegionEducationPlan/'.$region->id)?>" id="region_education_plan_form" class="form-group needs-validation" novalidate method="post">
          <div class="modal-body" id="RegionEducationPlanBody">
            <div class="_input-group">
              <div class="form-row" data-before="计划名称：">
                <div class="form-group col-md-8">
                  <input type="text" class="form-control form-control-sm" placeholder="计划名称" name="name" required>
                </div>
              </div>
            </div>
            <div class="_input-group">
              <div class="form-row" data-before="计划介绍：">
                <div class="form-group col-md-8">
                  <textarea type="text" class="form-control form-control-sm" placeholder="计划介绍" name="description"></textarea>
                </div>
              </div>
            </div>
            <div class="_input-group">
              <div class="form-row" data-before="计划属性：">
                <div class="form-group col-md-3">
                  <select class="form-control form-control-sm" placeholder="属性" name="plan_type">
                    <option value="0">运营</option>
                    <option value="1">教学</option>
                    <option value="2">商务</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <select class="form-control form-control-sm" placeholder="发布范围" name="plan_range">
                    <option value="0">区域</option>
                    <option value="1">学校</option>

                  </select>
                </div>
                <div class="form-group col-md-3">
                  <select class="form-control form-control-sm" placeholder="学校" name="school_id">
                    <option value="0">请选择</option>
                    <?php foreach($schools as $school):?>
                      <option value="<?=$school->id?>"><?=$school->name?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
            </div>
            <div class="_input-group _input-date-group">
              <div class="form-row" data-before="计划周期：">
                <div class="form-group col-md-4">
                  <input type="text" class="form-control form-control-sm datepicker" placeholder="开始日期" name="start_date">
                </div>至
                <div class="form-group col-md-4">
                  <input type="text" class="form-control form-control-sm datepicker" placeholder="结束日期" name="end_date">
                </div>
              </div>
            </div>
            <div class="_input-group">
              <div class="form-row" data-before="计划内容：">
                <div class="form-group col-md-8">
                  <textarea type="text" class="form-control form-control-sm" placeholder="计划内容" name="body"></textarea>
                </div>
              </div>
            </div>
            <div class="_input-group">
              <div class="form-row" data-before="附件：">
                <div class="custom-file-control">
                  <input type="file" name="file">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
              <button type="button" class="btn btn-primary btn-save" id="saveRegionEducationPlan">保存</button>
                            <button type="button" class="btn btn-primary btn-save" id="aduitRegionEducationPlan">提交审核</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  var userItem = null;
  var amoeba_id = 0;
  var province_id = 0;
  var city_id  = 0;
  var district_id = 0;
  var region_id = <?=$region->id?>;
  var service_plan_Item = null;
  var education_plan_Item = null;
  var operate_plan_Item = null;
  var business_info = null;
  var  service_report_info = null;
  $(function() {

    $("#updateSchool").click(function(){
      $("#region-edit-form").validate();
      if (!$("#region-edit-form").valid()) {
        return;
      }
      $("#region-edit-form").showLoading();
      $("#region-edit-form").ajaxForm({
        dataType: 'json',
        success: function (data) {
          $("#region-edit-form").hideLoading();
          $(".setting-icon-box").modal('hide');
          getNewData();
        }
      }).submit();
    });



    $("#province_new1").change(function(){
      var string = '';
      var _this = $(this);
      province_id = $(this).val();
      $.ajax({
        url: "<?=anchorurl('categorys/getCity')?>/"+$(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
          var string = '';
          $(data.citys).each(function(index,element){
            string += '<option value="'+element.city_id+'">'+element.name+'</option>';
          });
          $("#city_new1").html(string);
          var districts = "";
          $(data.districts).each(function(index,element){
            districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
          });
          $("#district_new1").html(districts);
        }
      });
      getNewData();
    });

    $("#city_new1").change(function(){
      city_id = $(this).val();
      $.ajax({
        url: "<?=anchorurl('categorys/getArea')?>/"+$(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
          var districts = "";
          $(data).each(function(index,element){
            districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
          });
          $("#district_new1").html(districts);
        }
      });
      getNewData();
    });

    $("#district_new1").change(function(){
      district_id = $(this).val();
      getNewData();
    });

    function getNewData(){

      mmg.load({key: $("#searchName").val(),province_id:province_id,city_id:city_id,district_id:district_id});

//      $("#jsGrid").jsGrid("loadData", {key: $("#searchName").val(),amoeba_id:amoeba_id,province_id:province_id,city_id:city_id,district_id:district_id}).done(function () {
//
//      });
    }

    $(document).keypress(function(e) {
      // 回车键事件
      if(e.which == 13) {
        getNewData();
      }
    });

    $("#province_new").change(function(){
      var string = '';
      var _this = $(this);
      $.ajax({
        url: "<?=anchorurl('categorys/getCity')?>/"+$(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
          var string = '';
          $(data.citys).each(function(index,element){
            string += '<option value="'+element.city_id+'">'+element.name+'</option>';
          });
          $("#city_new").html(string);
          var districts = "";
          $(data.districts).each(function(index,element){
            districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
          });
          $("#district_new").html(districts);
        }
      });
    });

    $("#city_new").change(function(){
      $.ajax({
        url: "<?=anchorurl('categorys/getArea')?>/"+$(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
          var districts = "";
          $(data).each(function(index,element){
            districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
          });
          $("#district_new").html(districts);
        }
      });
    });

    $("body").undelegate('#province_edit', 'change').delegate('#province_edit', 'change', function () {
      var string = '';
      var _this = $(this);
      $.ajax({
        url: "<?=anchorurl('categorys/getCity')?>/"+$(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
          var string = '';
          $(data.citys).each(function(index,element){
            string += '<option value="'+element.city_id+'">'+element.name+'</option>';
          });
          $("#city_edit").html(string);
          var districts = "";
          $(data.districts).each(function(index,element){
            districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
          });
          $("#district_edit").html(districts);
        }
      });
    });

    $("body").undelegate('#city_edit', 'change').delegate('#city_edit', 'change', function () {
      $.ajax({
        url: "<?=anchorurl('categorys/getArea')?>/"+$(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
          var districts = "";
          $(data).each(function(index,element){
            districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
          });
          $("#district_edit").html(districts);
        }
      });
    });



    $("#createRegion").click(function(){
      $("#region-form").validate();
      if (!$("#region-form").valid()) {
        return;
      }
      $("#region-form").showLoading();
      $("#region-form").ajaxForm({
        dataType: 'json',
        success: function (data) {
          $("#region-form").hideLoading();
          $(".new-icon-box").modal('hide');
          mmg.load();
        }
      }).submit();
    });



    $('.input-daterange').datepicker({
      format: 'yyyy-mm-dd'
    });
//    基本信息修改

    $('.change-btn,.btn-cancel').click(function(){
      var oParents = $(this).closest('div.modal'),
          _this = $(this).attr('data-type');
      oPFun(oParents,_this);
    });
    function oPFun(config,_this){
      var  oHide = config.find('.type-hide'),
          oShow = config.find('.type-show');
      if( _this == 'show'){
        oShow.fadeOut();
        oHide.fadeIn();
      }else if(_this =='hide'){
        oShow.fadeIn();
        oHide.fadeOut();
      }
    }
    $('.source-sel span').click(function(){
      var oClass = $(this).attr('class');
      if(oClass == 'on'){
        $(this).removeClass('on');
      }else{
        $(this).addClass('on');
      }
    });



    //添加学生时选择课程
    $("#courseList span").click(function(){
      if($(this).hasClass("on")){
        $(this).removeClass("on");
      }else{
        $(this).addClass("on");
      }
      addnewStudentCourseIds();
    });


    $("#school-info-body").undelegate('#courseListEdit span', 'click').delegate('#courseListEdit span', 'click', function () {
      if($(this).hasClass("on")){
        $(this).removeClass("on");
      }else{
        $(this).addClass("on");
      }
      addEditStudentCourseIds();
    });

    function addEditStudentCourseIds(){
      var course_id_array = new Array();
      $("#school-info-body #courseListEdit span").each(function(index,element){
        if($(element).hasClass("on")){
          course_id_array.push($(element).data("id"));
        }
      });
      if(course_id_array.length >0){
        $("#course_ids_edit").val(course_id_array.join(","));
      }else{
        $("#course_ids_edit").val("");
      }
    }

    function addnewStudentCourseIds(){
      var course_id_array = new Array();
      $("#courseList span").each(function(index,element){
        if($(element).hasClass("on")){
          course_id_array.push($(element).data("id"));
        }
      });
      if(course_id_array.length >0){
        $("#course_ids_new").val(course_id_array.join(","));
      }else{
        $("#course_ids_new").val("");
      }
    }

    $('.upload-file').fileupload({
      dataType: 'json',
      progressall: function (e, data) {
        var class_name = $(this).data("class");
        var progress = parseInt(data.loaded / data.total * 100, 10);
//        if(progress == 0 || progress == 100){
//          $("#progress").hide();
//        }else{
//          $("#progress").show();
//        }

//        $('.'+class_name).css(
//            'width',
//            progress + '%'
//        );
        $('.'+class_name).html( progress + '%');
      },
      done: function (e, data) {
//              $.each(data.result.files, function (index, file) {
//                  $('<p/>').text(file.name).appendTo(document.body);
//              });
        var class_name = $(this).data("class");
        $('.'+class_name).hide();
        console.log(class_name);
        if(class_name == "progress-per_1"){
          console.log(1);
          if(mmgDocument == null){
            getmmgDocument();
          }else{
            mmgDocument.load();
          }
        }else{
          if(mmgregion_solution == null){
            getmmgregion_solution();
          }else{
            mmgregion_solution.load();
          }
        }
      }
    });

    $('#collapseTwo').on('shown.bs.collapse', function () {
      if(mmgDocument == null){
        getmmgDocument();
      }else{
        mmgDocument.load();
      }
    });

    $('#collapseFour').on('shown.bs.collapse', function () {
      if(mmgbusinessDocument == null){
        getBusinessmmgDocument();
      }else{
        mmgbusinessDocument.load();
      }
    });


    $('#collapseFive').on('shown.bs.collapse', function () {
      if(mmgserviceReportDocument == null){
        getServiceReportmmgDocument();
      }else{
        mmgserviceReportDocument.load();
      }
    });


    $('#collapseSix').on('shown.bs.collapse', function () {
      if(mmgTeachingAchievementDocument == null){
        getTeachingAchievementmmgDocument();
      }else{
        mmgTeachingAchievementDocument.load();
      }
    });

    $('#collapseSeven').on('shown.bs.collapse', function () {
      if(mmgEducationPlanDocument == null){
        getEducationPlanmmgDocument(0);
      }else{
        mmgEducationPlanDocument.load();
      }
    });

    $('#collapseThree').on('shown.bs.collapse', function () {
      if(mmgservicepLANDocument == null){
        getServicePlanmmgDocument(0);
      }else{
        mmgservicepLANDocument.load();
      }
    });

    $('#collapseEight').on('shown.bs.collapse', function () {
      if(mmgOperateDocument == null){
        getOperatePlanmmgDocument(0);
      }else{
        mmgOperateDocument.load();
      }
    });

    $('#regional-extend-tab').on('shown.bs.tab', function () {
      console.log(1);
      if(mmgregion_solution == null){
        getmmgregion_solution();
      }else{
        mmgregion_solution.load();
      }
    });

    $(".datepicker").datepicker({
      format: 'yyyy-mm-dd'
    });

    $("#saveRegionBusiness").on("click", function(){
      if( $("#region_business_form").valid()){
        $("#saveRegionBusiness").showLoading();
        $("#region_business_form").ajaxForm({
          dataType: 'json',
          success: function (data) {
            console.log(data);
            $("#saveRegionBusiness").hideLoading();
            $("#business_modal").modal("hide");
              $("#region_business_form")[0].reset();
            mmgbusinessDocument.load();
          }
        }).submit();
      }
    });

    $('#business_modal').on('shown.bs.modal', function () {
      $("#region_business_form")[0].reset();
    });





    $('#region_service_plan_modal').on('shown.bs.modal', function () {
        service_plan_id = 0;
        if(service_plan_Item != null){
          service_plan_id = service_plan_Item.id;
        }
        $.ajax({
          type: "GET",
          url: '<?=anchorurl('regions/getRegionServicePlanInfo')?>/'+service_plan_id+'/<?=$region->id?>',
          beforeSend:function(){
            $("#region_business_form").showLoading();
          },
          success: function (data){
            $("#RegionServicePlanBody").html(data);
            $("#region_business_form").hideLoading();
            $(".datepicker").datepicker({
              format: 'yyyy-mm-dd'
            });
          }
        });
    });

    $('#region_service_plan_modal').on('hide.bs.modal', function () {
      service_plan_Item = null;
    });



    $("#saveRegionServicePlan").on("click", function(){
      if( $("#region_business_form").valid()){
        $("#saveRegionServicePlan").showLoading();
        $("#region_service_plan_form").ajaxForm({
          dataType: 'json',
          success: function (data) {
            console.log(data);
            $("#saveRegionServicePlan").hideLoading();
            $("#region_service_plan_modal").modal("hide");
            if(data.errcode == 0){
              $("#region_service_plan_form")[0].reset();
            }
            mmgservicepLANDocument.load();
          }
        }).submit();
      }
    });

    $("#auditRegionServicePlan").on("click", function(){
      if( $("#region_business_form").valid()){
        $("#auditRegionServicePlan").showLoading();
        $("#region_service_plan_form").ajaxForm({
          dataType: 'json',
          data:{
              "status":1
          },
          success: function (data) {
            console.log(data);
            $("#auditRegionServicePlan").hideLoading();
            $("#region_service_plan_modal").modal("hide");
            if(data.errcode == 0){
              $("#region_service_plan_form")[0].reset();
            }
            mmgservicepLANDocument.load();
          }
        }).submit();
      }
    });


    $("#saveRegionServiceReport").on("click", function(){
      if( $("#region_service_report_form").valid()){
        $("#saveRegionServiceReport").showLoading();
        $("#region_service_report_form").ajaxForm({
          dataType: 'json',
          success: function (data) {
            console.log(data);
            $("#saveRegionServiceReport").hideLoading();
            $("#service_report_modal").modal("hide");
            if(data.errcode == 0){
              $("#region_service_report_form")[0].reset();
            }
            mmgserviceReportDocument.load();
          }
        }).submit();
      }
    });


    $("#saveTeachingAchievement").on("click", function(){
      if( $("#region_teaching_achievement_form").valid()){
        $("#saveTeachingAchievement").showLoading();
        $("#region_teaching_achievement_form").ajaxForm({
          dataType: 'json',
          success: function (data) {
            console.log(data);
            $("#saveTeachingAchievement").hideLoading();
            $("#teaching_achievement_modal").modal("hide");
            if(data.errcode == 0){
              $("#region_teaching_achievement_form")[0].reset();
            }
            mmgTeachingAchievementDocument.load();
          }
        }).submit();
      }
    });


    $('#region_education_plan_modal').on('shown.bs.modal', function () {
      var  service_plan_id = 0;
      if(education_plan_Item != null){
        service_plan_id = education_plan_Item.id;
      }
      $.ajax({
        type: "GET",
        url: '<?=anchorurl('regions/getRegionEducationPlanInfo')?>/'+service_plan_id+'/<?=$region->id?>',
        beforeSend:function(){
          $("#region_education_plan_form").showLoading();
        },
        success: function (data){
          $("#RegionEducationPlanBody").html(data);
          $("#region_education_plan_form").hideLoading();
          $(".datepicker").datepicker({
            format: 'yyyy-mm-dd'
          });
        }
      });
    });

    $('#region_education_plan_modal').on('hide.bs.modal', function () {
      education_plan_Item = null;
    });


    $('#business_modal').on('shown.bs.modal', function () {
      var  service_plan_id = 0;
      if(business_info != null){
        service_plan_id = business_info.id;
      }
      $.ajax({
        type: "GET",
        url: '<?=anchorurl('regions/getRegionBusinessInfo')?>/'+service_plan_id,
        beforeSend:function(){
          $("#region_business_form").showLoading();
        },
        success: function (data){
          $("#regionBusinessBody").html(data);
          $("#region_business_form").hideLoading();
          $(".datepicker").datepicker({
            format: 'yyyy-mm-dd'
          });
        }
      });
    });

    $('#business_modal').on('hide.bs.modal', function () {
      business_info = null;
    });


    $('#service_report_modal').on('shown.bs.modal', function () {
      var  service_plan_id = 0;
      if(service_report_info != null){
        service_plan_id = service_report_info.id;
      }
      $.ajax({
        type: "GET",
        url: '<?=anchorurl('regions/getRegionServiceInfo')?>/'+service_plan_id+'/<?=$region->id?>',
        beforeSend:function(){
          $("#region_service_report_form").showLoading();
        },
        success: function (data){
          $("#regionServiceBody").html(data);
          $("#region_service_report_form").hideLoading();
          $(".datepicker").datepicker({
            format: 'yyyy-mm-dd'
          });
        }
      });
    });

    $('#service_report_modal').on('hide.bs.modal', function () {
      service_report_info = null;
    });







    $("#aduitRegionEducationPlan").on("click", function(){
      if( $("#region_education_plan_form").valid()){
        $("#aduitRegionEducationPlan").showLoading();
        $("#region_education_plan_form").ajaxForm({
          dataType: 'json',
          data:{
            "status":1
          },
          success: function (data) {
            console.log(data);
            $("#aduitRegionEducationPlan").hideLoading();
            $("#region_education_plan_modal").modal("hide");
            if(data.errcode == 0){
              $("#region_education_plan_form")[0].reset();
            }
            mmgEducationPlanDocument.load();
          }
        }).submit();
      }
    });


    $("#saveRegionEducationPlan").on("click", function(){
      if( $("#region_education_plan_form").valid()){
        $("#saveRegionEducationPlan").showLoading();
        $("#region_education_plan_form").ajaxForm({
          dataType: 'json',
          success: function (data) {
            console.log(data);
            $("#saveRegionEducationPlan").hideLoading();
            $("#region_education_plan_modal").modal("hide");
            if(data.errcode == 0){
              $("#region_education_plan_form")[0].reset();
            }
            mmgEducationPlanDocument.load();
          }
        }).submit();
      }
    });

    $('#region_operate_plan_modal').on('shown.bs.modal', function () {
      var  service_plan_id = 0;
      if(operate_plan_Item != null){
        service_plan_id = operate_plan_Item.id;
      }
      $.ajax({
        type: "GET",
        url: '<?=anchorurl('regions/getRegionOperatePlanInfo')?>/'+service_plan_id+'/<?=$region->id?>',
        beforeSend:function(){
          $("#region_operate_plan_form").showLoading();
        },
        success: function (data){
          $("#RegionOperatePlanBody").html(data);
          $("#region_operate_plan_form").hideLoading();
          $(".datepicker").datepicker({
            format: 'yyyy-mm-dd'
          });
        }
      });
    });

    $('#region_operate_plan_modal').on('hide.bs.modal', function () {
      operate_plan_Item = null;
    });

    $("#saveRegionOperatePlan").on("click", function(){
      if( $("#region_operate_plan_form").valid()){
        $("#saveRegionOperatePlan").showLoading();
        $("#region_operate_plan_form").ajaxForm({
          dataType: 'json',
          success: function (data) {
            console.log(data);
            $("#saveRegionOperatePlan").hideLoading();
            $("#region_operate_plan_modal").modal("hide");
            if(data.errcode == 0){
              $("#region_operate_plan_form")[0].reset();
            }
            mmgOperateDocument.load();
          }
        }).submit();
      }
    });

    $("#verifyRegionOperatePlan").on("click", function(){
      if( $("#region_operate_plan_form").valid()){
        $("#saveRegionOperatePlan").showLoading();
        $("#region_operate_plan_form").ajaxForm({
          dataType: 'json',
          data:{
             status:1
          },
          success: function (data) {
            console.log(data);
            $("#saveRegionOperatePlan").hideLoading();
            $("#region_operate_plan_modal").modal("hide");
            if(data.errcode == 0){
              $("#region_operate_plan_form")[0].reset();
            }
            mmgOperateDocument.load();
          }
        }).submit();
      }
    });

  });
</script>
  <script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/region_doucment.js"></script>
  <script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/region_solution.js"></script>
  <script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/region_business.js"></script>
  <script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/region_service_plan_detail.js"></script>
  <script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/region_service_report.js"></script>
  <script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/region_teaching_achievement.js"></script>
  <script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/region_education_plan_detail.js"></script>
  <script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/region_operate_plan_detail.js"></script>
  <script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/school_regions.js"></script>

</body>
</html>
