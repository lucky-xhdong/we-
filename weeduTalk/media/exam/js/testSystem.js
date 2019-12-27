$(function(){
		function countDown(cTime){  //倒计时
			var surTimti = $('.surplus-time').find('i');
			var oCTime =Math.floor(cTime*60);
			var timer = setInterval(function(){
				
				var m = Math.floor(oCTime/60%60),
					s = Math.floor(oCTime%60);
					oCTime --;
					if(oCTime>=0){
						m = m>=10?m:"0"+m;
						s = s>=10?s:"0"+s;
					}else{
						m = "00";
						s = "00";
						clearInterval(timer);
					}
				surTimti.empty().html(m+":"+s);

			},1000);
		}
		countDown(25);
		function chooseItem(){  //复选框与单选框选中时添加的状态
				$(".choose-type .choose-num-item").each(function(ind){
					var eleInput = $(this).find('input'),
						eleSp = $(this).find('span');
					$(eleInput).click(function(e){
						var eletype = $(this).attr('type');
						var eleSpan = $(this).parent('label').next('span');
						if(eletype === 'radio'){
							eleSp.removeClass('on');
							eleSpan.addClass('on');
						}else if(eletype === 'checkbox'){
							if($(this).is(':checked')){
								eleSpan.addClass('on');
							}else{
								eleSpan.removeClass('on');
								
							}
						}
					})
				});
			}
			chooseItem();
			function navBox(){ //页面最右侧的导航
				var $navs = $('.nav-box li'),          // 导航
				    $sections = $('.src-ele'),       // 模块
				    $window = $(window),
				    navLength = $navs.length - 1;
				   
				$window.on('scroll', function() {
				    var scrollTop = $window.scrollTop()+80,
				        len = navLength;
					for (; len > -1; len--) {
						var that = $sections.eq(len);
					    if (scrollTop >= that.offset().top) {
					       $navs.removeClass('current').eq(len).addClass('current');
					       break;
					    }
					  }
				});
				$navs.on('click', function(e) {
				    e.preventDefault();
					e.stopPropagation();
				    $('html, body').animate({
				        'scrollTop': $($(this).attr('href')).offset().top-80
				    }, 400);
				});
			}
			navBox();
			
			function scantronBox(){ //答题卡
				var oSBox ,oSCon ,
					oSBtn = $('.scantron-btn');
				oSBtn.click(function(){
					oSBox = $(this).parent('.scantron-box');
					oSCon = oSBox.find('.scantron-con');
					if(oSBox.hasClass('on')){
						oSBox.removeClass('on');
						oSBox.stop(true).animate({
							'left':-330
						},600)
					}else{
						oSBox.addClass('on');
						oSBox.stop(true).animate({
							'left':0
						},600)
					}
				})
			}
			scantronBox();

	})