<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>申请</title>
    <?=$this->load->view("tmpl/meta")?>
</head>
<body>
<?=$this->load->view("tmpl/header")?>
<div class="wrapper ">
    <div class="container bg-f5 pagb-30">
        <div class="mgb-30">
            <div class="wrp-con apply-box">
                <div class="crumb-nav">
                    <a href="javascript:;" class="index-icon">返回&nbsp;&gt&nbsp;</a>
                    我要申请
                </div>
                <div class="apply-form-box pagv-20">
                    <div class="form-group">
                        <label for="">申请学校</label>
                        <input type="text" placeholder="请输入学校名称">
                    </div>
                    <div class="form-group">
                        <label for="">地址</label>
                        <input type="text" placeholder="请输入地址">
                    </div>
                    <div class="form-group">
                        <label for="">申请人</label>
                        <input type="text" placeholder="请输入申请人">
                    </div>
                    <div class="form-group">
                        <label for="">联系方式</label>
                        <input type="text" placeholder="请输入联系方式">
                    </div>
                    <div class="form-group">
                        <label for="">名片上传</label>
                        <textarea rows="6" ></textarea>
                    </div>
                    <div class="form-group">
                        <button class="form-btn">我要申请</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view("tmpl/foot")?>
<script>
    $(function(){
        tabBox({});
    })
</script>
</body>
</html>