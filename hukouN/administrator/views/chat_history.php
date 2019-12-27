<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrapv3.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/font-awesome-4.0.3/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/font-awesome-4.0.3/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/common.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/itgenius.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/qunit-1.11.0.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/shadowbox.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/showLoading.css">
<script src="<?=base_url()?>media/js/jquery-1.10.2.min.js"></script>
<script src="<?=base_url()?>media/js/jquery.showLoading.js"></script>
<script src="<?=base_url()?>media/js/bootstrap.js"></script>
<script src="<?=base_url()?>media/js/shadowbox.js"></script>
<script src="<?=base_url()?>media/js/bootbox.js"></script>
<script src="<?=base_url()?>media/js/jquery.tmpl.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/jquery.form.js"></script>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible"content="IE=9; IE=8; IE=7; IE=EDGE">
<!--<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />-->
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>无忧产检</title>
</head>
<body>
<!--navbar start-->
<div class="navbar navbar-inverse itnavbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-collapse">
        <div class="btn-group">
        	<?php if($this->session->userdata('type') == "administrator"):?>
            
            <?=anchor('heredity_disease/index','遗传病库','class="btn btn-default"')?>
            <?=anchor('ipregnant_content/index','资料库','class="btn btn-default"')?>
            <?=anchor('inspect/index','我的产检','class="btn btn-default"')?>
            <?=anchor('chat/customer_service','客服平台','class="btn btn-default current-a"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default"')?>
            <?=anchor('users/index','用户管理','class="btn btn-default"')?>
            <?=anchor('users/userfeedback','用户反馈','class="btn btn-default"')?>
             <?=anchor('userbasicsetting/index','基本设置','class="btn btn-default"')?>
            <?php elseif($this->session->userdata('type') == "editor"):?>
            
            <?=anchor('heredity_disease/index','遗传病库','class="btn btn-default current-a"')?>
            <?=anchor('ipregnant_content/index','资料库','class="btn btn-default"')?>
            <?=anchor('inspect/index','我的产检','class="btn btn-default"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default"')?>
            <?php elseif($this->session->userdata('type') == "service"):?>
            
            <?=anchor('chat/customer_service','客服平台','class="btn btn-default current-a"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default"')?>
            
            <?php endif;?>
            <?=anchor('accountsettings/index','账号设置','class="btn btn-default"')?>
            <?=anchor('users/logout','退出','class="btn btn-default"')?>
        </div>
    </div>
  </div>
</div>
<!--navbar end-->
<div class="bg-color-h dis-d container">
  <div class="row"> 
    <!--左厕菜单 start-->
    <div class="col-sm-6 col-md-12 offsetmenu">
      <div class="h-o li-com-fl bg-color-a li-block li-ul-pad li-text-b li-height li-menu">
        <ul>
          <li <?php if(isset($sessions) && $sessions === 1) echo 'class="current-b"';?>>
            <?=anchor('chat/customer_service/','当前咨询')?>
          </li>
          <li <?php if(isset($sessions) && $sessions === 0) echo 'class="current-b"';?>>
            <?=anchor('chat/history','历史咨询')?>
          </li>
        </ul>
      </div>
    </div>
    <!--左厕菜单 end-->
    <div class="clear-13"></div> 
    <!--右厕内容 start-->
    <div class="col-sm-12 col-md-12 h-o">
        <div class="col-sm-12 col-md-6">
            <div class="row">
                <div class="fl bg-color-e pad-h-m  li-ul-pad li-ul-mar li-col-12">
                    <ul id="user_ul">
					<?php foreach($questions as $question):?>
                        <li data-id='<?=$question->question_id?>' data-src='<?=$question->user_id?>' data-name='<?=$question->user_name?>'>
                            <div class="dis-d pad-e chat-first-menu">
                                <a class="d-table-cell fl pad-r-a pt-re chat-sm-img">
                                	<img src="<?=pictureurlsize('',$question->header_picture_url)?>"> 
                                </a>
                                <div class="d-table-cell ver-a-b chat-person-info">
                                    <a class="color-c font-size-12 w-t-o fl chat-person-name" href="javascript:void(0)">
                                    	<span class="badge dis-f pull-right" id="unread_<?=$question->question_id?>"></span>
                                    	<?=$question->user_name?>
                                    </a>
                                </div>
                                <div class="d-table-cell ver-a-b consult-time">
                                	<span>咨询日期：<?=$question->create_time?></span>
                                    <div class="cf-a"></div>
                                    <span>客服：<?=$question->servicename?></span>
                                </div>
                            </div>
                            <div class="cf-d"></div>
                        </li> 
                    <?php endforeach;?>  
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="row">
                <div class="h-o peoplechat" id="chatSection">
                    <div class="pad-h-m text-b"><span class="font-s-lg" id="chatname"></span></div>
                    <div class="cf-d"></div>
                    <div class="dis-d pad-h-m it-q-title" id="questionbody"> 
                    
                    </div>
                    <div class="cf-d"></div>
                    <div class="pad-h-m li-ul-pad li-ul-mar chatsection">
                        <ul id="user_message">
                        </ul>
                    </div>
                    <div class="clear-13"></div>
                </div>
            </div>
        </div>
    </div>
    <!--右侧内容 end--> 
    <div class="clear-13"></div> 
    <div class="text-b li-com-pad li-com-fl">
       <?php echo $this->pagination->create_links(); ?> 
      </div>
  </div>
</div>    
<div id="sendChatTemplate" type="text/x-jquery-tmpl" style="display:none">
     <li>
          <div class="sent">
            <div class="clear-13"></div>
            <div class="text-b"><span class="dis-a color-d font-size-12 bg-color-g last-time">${time}</span></div>
            <div class="clear-13"></div>
            <div class="dis-d pt-re fr my-chat">
              <div class="pt-re pad-r-a d-table-cell ver-a-b my-news-list">
                <div class="pt-re w-b-w my-news">
                	<span class="dis-a bg-color-e color-c my-comment">
                    	{{if type == 'picture'}}
                    	<a class="mustang-gallery " href="${msgorigin}" rel="shadowbox">
                        	<img src="${msg}">
                        </a>
                        {{else}} 
                        ${msg}
                        {{/if}}
                	</span>
                </div>
              </div>
              <div class="text-b pad-l-b d-table-cell ver-a-b"> <a href="javascript:;" class="chat-md-img"><img src="${header_picture_url}"></a>
                <div class="cf-a"></div>
                <span class="dis-a my-name">${user_name}</span> </div>
            </div>
          </div>
        </li> 
    </div>  
    <div id="receiveChatTemplate" type="text/x-jquery-tmpl" style="display:none">
  <li>
      <div class="sent">
        <div class="clear-13"></div>
        <div class="pt-re dis-d crowd-chat">
          <div class="text-b pad-r-b d-table-cell ver-a-b"> <a href="javascript:void(0)" class="chat-md-img"> <img src="${header_picture_url}"> </a>
            <div class="cf-a"></div>
            <span class="dis-a crowd-name">${user_name}</span> </div>
          <div class="dis-table-cell pad-l-a ver-a-b pt-re crowd-news-list">
            <div class="pt-re w-b-w crowd-news">
            	<span class="bg-color-d dis-a color-d crowd-comment">
                	{{if type == 'picture'}}
                    <a class="mustang-gallery" href="${msgorigin}" rel="shadowbox">
                	<img src="${msg}">
                    </a>
                    {{else}} 
                    ${msg}
                    {{/if}}
                </span>
            </div>
          </div>
          <a class="delete-chat display-block pt-ab" href="javascript:void(0)"></a> </div>
      </div>
    </li>
 </div>  
 <div id="questionbodytmpl" type="text/x-jquery-tmpl" style="display:none">    
     <div class="dis-table-cell pad-r-a">
            	<span class="dis-a mar-t-a color-d pad-h-a bg-color-d">问</span>
            </div>
            <div class="dis-table-cell ver-a-a w-b-w consult-question">
                <p class="mar-a text-ai line-h-d">
                	<span id="picturegroup">
                      <?php /*?><img src="<?=base_url()?>media/images/3372b4c58ed85b92441bc96f70f3f96a.jpg"><?php */?>
                    ${content}
                    </span>
                </p>
            </div>  
   </div>                               
<script>
	var question_id = 0;
	var src_user_id = 0;
	var uid = <?=$uid?>;
	var header_picture_url = '<?=$header_picture_url?>';
	var nowquestionid = 0;
	var last_msgid = 0;
	<?php if($this->session->userdata('type') == 'administrator'):?>
		var admin = true;
	<?php else:?>
		var admin = false;
	<?php endif;?>
	  function dateFormat(date, format) {
            /*
             * eg:format="yyyy-MM-dd hh:mm:ss";
             */
            var o = {
                "M+": date.getMonth() + 1, // month
                "d+": date.getDate(), // day
                "h+": date.getHours(), // hour
                "m+": date.getMinutes(), // minute
                "s+": date.getSeconds(), // second
                "q+": Math.floor((date.getMonth() + 3) / 3), // quarter
                "S": date.getMilliseconds()
                // millisecond
            };

            if (/(y+)/.test(format)) {
                format = format.replace(RegExp.$1, (date.getFullYear() + "").substr(4
                    - RegExp.$1.length));
            }

            for (var k in o) {
                if (new RegExp("(" + k + ")").test(format)) {
                    format = format.replace(RegExp.$1, RegExp.$1.length == 1
                        ? o[k]
                        : ("00" + o[k]).substr(("" + o[k]).length));
                }
            }
            return format;
        };
	$(document).ready(function(e) {
        $("#user_ul").undelegate('li','click').delegate('li','click',clickquestion);
		function clickquestion(){
			
			 $("#user_ul li").removeClass('bg-color-h');
			question_id = $(this).data('id');
			$("#unread_"+question_id).addClass("dis-f");
			src_user_id = $(this).data('src');
			$("#chatname").html($(this).data('name'));
			$(this).addClass('bg-color-h');
			$('#user_message').empty();
			$.ajax({
			  type :'GET',
			  url :'<?=anchorurl('chat/get_user_message')?>'+'/'+question_id,
			  dataType:"json",
			  async:false,
			  beforeSend: function(){
				$('#chatSection').showLoading();
			  },
			  success: function(data){
				 $(data.msg).each(function(index, element) {
                        var currentMsgTime = dateFormat(new Date((element.create_time)*1000), 'yyyy年MM月dd日 hh:mm');
                        element.time = currentMsgTime; 
				   if(admin){
				   	 	if(element.src_user_id == element.serviceid){
							element.header_picture_url = element.serviceurl;
							element.user_name = element.servicename;
						
							$('#sendChatTemplate').tmpl(element).appendTo('#user_message');
						}else{
								$('#receiveChatTemplate').tmpl(element).appendTo('#user_message');
						}
				   }else{		
						if(element.src_user_id == uid){
							element.header_picture_url = header_picture_url;
							$('#sendChatTemplate').tmpl(element).appendTo('#user_message');
						}else{
							$('#receiveChatTemplate').tmpl(element).appendTo('#user_message');
						}
				   }
					last_msgid = element.msg_id;
                });
				$("#questionbody").empty();
				$("#questionbodytmpl").tmpl(data.question).appendTo('#questionbody');
				var img= ' ';
				$(data.question.pictures).each(function(index, element) {
				
                    img += '<a href="'+element.origin+'" rel="shadowbox[picture]"><img src="'+element.square+'"></a>';
                });
				if(img != ' '){
				 $("#picturegroup").html(img+data.question.content);
				}else{
					 $("#picturegroup").html(data.question.content);
				}
				
				$(".chatsection").scrollTop($(".chatsection").height()+$(".chatsection")[0].scrollHeight);
				Shadowbox.init( ); 
			    Shadowbox.clearCache(); 
			    Shadowbox.setup();  
			    $('#chatSection').hideLoading();
				
			  }
			});
		}
    });
	
</script>
</body>
</html>
