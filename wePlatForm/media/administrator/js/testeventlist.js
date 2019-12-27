
//保留两位小数
var fixed2 = function(val) {
    return val.toFixed(2);
}

//加百分号
var fixed2percentage = function(val) {
    return fixed2(val) + '%';
}
//高亮
var highliht = function(val) {
    if (val > 0) {
        return '<span style="color: #b00">' + fixed2(val) + '</span>';
    } else if (val < 0) {
        return '<span style="color: #0b0">' + fixed2(val) + '</span>';
    }
    return fixed2(val);
};
var tItemEvent = [
    //{
    //    title:'封面图片',
    //    name:'picture_list',
    //    width:'',
    //    align: 'center',
    //    renderer:function(val,item){
    //        if(item.picture_list.length > 0){
    //            return '<img src="'+item.picture_list[0].originurl+'" height="70px"/>'
    //        }else{
    //            return '<img src="'+item.media_default_url+'" height="70px"/>'
    //        }
    //    }
    //},
    {
        title:'事件内容',
        name:'text',
        width:'',

        align: 'center',
    },

    {
        title:'timeRange',
        name:'timeRange',
        width:200,
        align: 'center',
        renderer: function (val,item) {
           return '<input type="text" class="timerange" value="'+val+'" > <button  class="btn btn-success">保存</button>';
        }
    },
    {
        title: '操作', name: '',
        width: 300,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val,item) {
            if(item.media_list.length > 0 && item.media_list[0].type == "audio" ){
                return '<div class="media_box"><div class="media_play" data-timerange="'+item.timeRange+'"><audio src="'+item.media_list[0].originurl+'"/></div><div class="media_progress"><span class="media_bar"></span> <div class="media_control"></div></div></div>'
            }else{
            }
            return "";
        }
    }

];

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

var eventItem = null;
var eventList = null;
function gettestEventList(){
    if(eventList != null) {
        eventList.load({"part_id":part_id});
    }
     eventList = $('#eventList').mmGrid({
        indexCol: true,
        indexColWidth: 25,
        checkCol: true,
        multiSelect: false,
        sortName: 'id',
        sortStatus: 'asc',
        height: 'auto',
        cols: tItemEvent,
        url: base_url+'/parts/getEventLists/'+part_id,
        method: 'get',
        params:{

        },
        root: 'items',
        fullWidthRows:true,
        nowrap: true,
        plugins : [
            $('#paginatorEventList').mmPaginator({limitList: [10,20, 30, 40, 50]})
        ]
    }).on('loadSuccess', function(e, data){
         $(".media_play").unbind("click").bind("click",function(){
             var audio = $(this).find("audio")[0];
             var timeRange = $(this).parents("tr").find(".timerange").val();
             var timeRangearray = timeRange.split("-");
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

    }).on('cellSelected', function(e, item, rowIndex, colIndex,check){
        console.log(check); console.log(rowIndex); console.log(colIndex); console.log(e);
        if($(e.target).is('.btn-info, .btnPrice')){
            e.stopPropagation();  //阻止事件冒泡
            //  alert(JSON.stringify(item));
          //  window.location.href = base_url+"/parts/getEventDetail/"+item.id;
        }else if($(e.target).is('.btn-danger') && confirm('你确定要删除该行记录吗?')){
            e.stopPropagation(); //阻止事件冒泡
            //$.ajax({
            //    type : "GET",  //提交方式
            //    url : base_url+'/fileupload/removeFile/'+item.id,//路径
            //    dataType:"json",
            //    success:function(result) {//返回数据根据结果进行相应的处理
            //        fileList.removeRow(rowIndex);
            //    }
            //});
        }else if($(e.target).is('.btn-success')){
            e.stopPropagation();  //阻止事件冒泡
           // console.log($(e.target));
            var timeRange = $(e.target).parents("tr").find(".timerange").val();
            $.ajax({
                type : "POST",  //提交方式
                url : base_url+'/parts/updateTimeRange/'+item.id,//路径
                data:{
                    "timeRange":timeRange
                },
                dataType:"json",
                beforeSend:function(){
                    $(e.target).showLoading();
                },
                success: function (data){
                    $(e.target).hideLoading();
                    retisterLimitTip("保存成功");
                }
            });

            //  alert(JSON.stringify(item));
            //更新图片
            //$("#selectImage").click();
            //eventItem = item;
            //保存当前数据
        }
        //if(check == 0) {
        //    $("#Download").attr("disabled","disabled");
        //    $("#exportPdf").attr("disabled","disabled");
        //}
        //else{
        //    $("#Download").removeAttr("disabled");
        //    $("#exportPdf").removeAttr("disabled");
        //}
    }).on('cellSelectedCheck', function(e, item, rowIndex, colIndex,check){
        //if(check == 0) {
        //    $("#Download").attr("disabled","disabled");
        //    $("#exportPdf").attr("disabled","disabled");
        //} else{
        //    $("#Download").removeAttr("disabled");
        //    $("#exportPdf").removeAttr("disabled");
        //}
    });

}






