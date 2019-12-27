$(function(){
	$('#selectDate').datetimepicker({
		format: 'yyyy-mm-dd',
		language : 'zh-CN',  
	    weekStart : 1,  
	    todayBtn : 1,  
	    autoclose : 1,  
	    todayHighlight : 1,  
	    startView : 2,
	    minView: "month" ,
	    forceParse : 0  
	});
	

	$('.show-hide-btn').click(function(){ //展开收起
		var eleParent = $(this).parent('div'),
			eleParentSib = eleParent.siblings('.header-hide');
		if($(this).hasClass('on')){
			$(this).removeClass('on');
			$(this).text("展开");
			eleParentSib.slideUp();
		}else{
			$(this).addClass('on');
			$(this).text("收起");
			
			eleParentSib.slideDown();
		}
	});
	$("#starttime").datetimepicker({ //开始日期
	    language : 'zh-CN',  
	    weekStart : 1,  
	    todayBtn : 1,  
	    autoclose : 1,  
	    todayHighlight : 1,  
	    startView : 2,  
	    // minView: "month",  
	    format: 'yyyy-mm-dd hh:ii',  
	    forceParse : 0  
	}).on('hide', function(event) {  
	    event.preventDefault();  
	    event.stopPropagation();  
	    var startTime = event.date;  
	    $("#endtime").datetimepicker('setStartDate',startTime);  
	    $("#endtime").val("");  
	        });

    $("#endtime").datetimepicker({  //结束日期
	    language : 'zh-CN',  
	    weekStart : 1,  
	    todayBtn : 1,  
	    autoclose : 1,  
	    todayHighlight : 1,  
	    startView : 2,  
	    // minView: "month",  
	    format: 'yyyy-mm-dd hh:ii',  
	    forceParse : 0  
	}).on('hide', function(event) {  
	    event.preventDefault();  
	    event.stopPropagation();  
	    var endTime = event.date; 

	    $("#starttime").datetimepicker('setEndDate',endTime);  
 	});
	function selectallNot(){  //全选否
		var checkBox = $(".invi-main-checkbox"),
			allBtn = checkBox.find(".invi-checkbox-h input");
			allBtn.click(function(){
				var checkEle = $(this).parents(checkBox).find('.invi-checkbox-c input:checkbox');
				if(this.checked){
					checkEle.prop("checked", true); 
				}else{
					checkEle.prop("checked",false);
				}
			});
	}
	selectallNot();

})