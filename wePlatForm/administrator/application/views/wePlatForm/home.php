<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="utf-8" />
    <?php $this->load->view('wePlatForm/tmpl/title'); ?>
    <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
    <?php $this->load->view('wePlatForm/meta'); ?>
</head>
<body>
<div class="container-fluid FeatureManage">
    <div class="row">
          <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
        <!-- 左侧菜单 end -->
        <div class="col-md-9">
            <div class="fm--main-wrapper">
                <!--菜单切换 start-->
                <?=$this->load->view("wePlatForm/tmpl/headernav")?>
                <!--菜单切换 end-->
                <!--面包屑 start-->
                <nav class="common-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
                        <li class="breadcrumb-item"><a href="javascript:;">学校管理</a></li>
                        <li class="breadcrumb-item"><a href="javascript:;">学校管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">教研员</li>
                    </ol>
                </nav>
                <!--面包屑 end-->
                <!--主体内容 start-->
                <div class="fm--main__content">
                    <!--选项卡标签 start-->
                    <ul class="nav nav-tabs fm--main__tabs" id="nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="regional-tab" data-toggle="tab" href="#regional" role="tab" aria-controls="区域特征" aria-selected="true">区域特征</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="regional-extend-tab" data-toggle="tab" href="#regional-extend" role="tab" aria-controls="区域扩展特征" aria-selected="false">区域扩展特征</a>
                        </li>
                    </ul>
                    <!--选项卡标签 end-->
                    <!--选项卡内容 start-->
                    <div class="tab-content fm--main__cons" id="tab-content">
                        <div class="tab-pane fade show active" id="regional" role="tabpanel" aria-labelledby="regional-tab">
                            <div class="form-check-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" checked id="all" name="feature" class="custom-control-input">
                                    <label class="custom-control-label" for="all">全部</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="teacher" name="feature" class="custom-control-input">
                                    <label class="custom-control-label" for="teacher">教研员特征</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="leader" name="feature" class="custom-control-input">
                                    <label class="custom-control-label" for="leader">领导特征</label>
                                </div>
                            </div>
                            <div class="common-table">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">领导特征</th>
                                        <th scope="col">创建人</th>
                                        <th scope="col">创建时间</th>
                                        <th scope="col">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>校长</th>
                                        <td>文武贝</td>
                                        <td>2018-2-3</td>
                                        <td>
                                            <a href="#/feature_manage" class="btn-normal">
                                                <i class="icon-view"><i class="path1"></i> <i class="path2"></i> <i class="path3"></i></i>查看
                                            </a>
                                            <a href="#/feature_manage" class="btn-normal"><i class="icon-lock"></i>冻结</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>校长</th>
                                        <td>文武贝</td>
                                        <td>2018-2-3</td>
                                        <td>
                                            <a href="#/feature_manage" class="btn-normal">
                                                <i class="icon-view"><i class="path1"></i> <i class="path2"></i> <i class="path3"></i></i>查看
                                            </a>
                                            <a href="#/feature_manage" class="btn-normal"><i class="icon-lock"></i>冻结</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>校长</th>
                                        <td>文武贝</td>
                                        <td>2018-2-3</td>
                                        <td>
                                            <a href="#/feature_manage" class="btn-normal">
                                                <i class="icon-view"><i class="path1"></i> <i class="path2"></i> <i class="path3"></i></i>查看
                                            </a>
                                            <a href="#/feature_manage" class="btn-normal"><i class="icon-lock"></i>冻结</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>校长</th>
                                        <td>文武贝</td>
                                        <td>2018-2-3</td>
                                        <td>
                                            <a href="#/feature_manage" class="btn-normal">
                                                <i class="icon-view"><i class="path1"></i> <i class="path2"></i> <i class="path3"></i></i>查看
                                            </a>
                                            <a href="#/feature_manage" class="btn-normal"><i class="icon-lock"></i>冻结</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="btn-group">
                                    <button size="small" class="btn btn-outline-primary btn-sm btn-add"><i class="icon-add"><i class="path1"></i><i
                                                class="path2"></i></i>添加新特征
                                    </button>
                                </div>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="javascript:;">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:;">1</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:;">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="regional-extend" role="tabpanel" aria-labelledby="regional-extend-tab">
                            <div class="form-check-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" checked id="all-extend" name="feature" class="custom-control-input">
                                    <label class="custom-control-label" for="all-extend">全部</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="teacher-extend" name="feature" class="custom-control-input">
                                    <label class="custom-control-label" for="teacher-extend">教研员特征</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="leader-extend" name="feature" class="custom-control-input">
                                    <label class="custom-control-label" for="leader-extend">领导特征</label>
                                </div>
                            </div>
                            <div class="common-table">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">领导特征</th>
                                        <th scope="col">创建人</th>
                                        <th scope="col">创建时间</th>
                                        <th scope="col">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>校长</th>
                                        <td>文武贝</td>
                                        <td>2018-2-3</td>
                                        <td>
                                            <a href="#/feature_manage" class="btn-normal">
                                                <i class="icon-view"><i class="path1"></i> <i class="path2"></i> <i class="path3"></i></i>查看
                                            </a>
                                            <a href="#/feature_manage" class="btn-normal"><i class="icon-lock"></i>冻结</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>校长</th>
                                        <td>文武贝</td>
                                        <td>2018-2-3</td>
                                        <td>
                                            <a href="#/feature_manage" class="btn-normal">
                                                <i class="icon-view"><i class="path1"></i> <i class="path2"></i> <i class="path3"></i></i>查看
                                            </a>
                                            <a href="#/feature_manage" class="btn-normal"><i class="icon-lock"></i>冻结</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>校长</th>
                                        <td>文武贝</td>
                                        <td>2018-2-3</td>
                                        <td>
                                            <a href="#/feature_manage" class="btn-normal">
                                                <i class="icon-view"><i class="path1"></i> <i class="path2"></i> <i class="path3"></i></i>查看
                                            </a>
                                            <a href="#/feature_manage" class="btn-normal"><i class="icon-lock"></i>冻结</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>校长</th>
                                        <td>文武贝</td>
                                        <td>2018-2-3</td>
                                        <td>
                                            <a href="#/feature_manage" class="btn-normal">
                                                <i class="icon-view"><i class="path1"></i> <i class="path2"></i> <i class="path3"></i></i>查看
                                            </a>
                                            <a href="#/feature_manage" class="btn-normal"><i class="icon-lock"></i>冻结</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="btn-group">
                                    <button size="small" class="btn btn-outline-primary btn-sm btn-add"><i class="icon-add"><i class="path1"></i><i
                                                class="path2"></i></i>添加新特征
                                    </button>
                                </div>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="javascript:;">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:;">1</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:;">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--选项卡内容 end-->
                </div>
                <!--主体内容 end-->
            </div>
        </div>
    </div>
</div>

</body>
</html>
