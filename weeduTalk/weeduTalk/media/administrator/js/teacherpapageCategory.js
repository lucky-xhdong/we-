
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
var tItem = [

    {
        title:'名称',
        name:'name',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return '<a href="'+base_url+'/teacherexam/getTeacherPaperparts/'+item.id+'">'+val+'</a>'
        }
    },
    {
        title:'状态',
        name:'status',
        width:80,
        align: 'center',
        renderer:function(val,item){
            if (val == 0) {
                return '<span style="color: #b00">未发布</span>';
            } else if (val == 1) {
                return '<span style="color: #0b0">已发布</span>';
            }
        }
    },

    {
        title:'更新时间',
        name:'update_time',
        width:'',
        align: 'center',
    },
    {
        title:'多媒体',
        name:'type',
        width:350,
        align: 'center',
        renderer:function(val,item){
            if(item.media_files.length > 0){
                var audio = item.media_files[0];
                if(audio.type == "audio"){
                    return '<audio src="'+audio.originurl+'" controls preload/> <button  class="btn btn-warning">取消</button>'
                }else if(audio.type == "video"){
                    return '<video src="'+audio.originurl+'" height="100" controls preload /> <button  class="btn btn-warning">取消</button>'
                }

            }
            return "";

        }
    },
    {
        title:'类型',
        name:'type',
        width:'',
        align: 'center',
    },
    {
        title:'排序',
        name:'scores',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return '<a href="javascript:;" data-id="'+item.id+'" class="fa fa-sort btn-switch-first" title="排序"></a>'
        }
    },
    {
        title: '操作', name: '',
        width: 400,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val,item) {

            if(item.permission){
                return ' <button  class="btn btn-success">更换多媒体文件</button> <button  class="btn btn-info">编辑</button> <button  class="btn btn-danger">删除</button>'
            }else{
                return ' <button  class="btn btn-info">编辑</button> <button  class="btn btn-success">更换多媒体文件</button> <button  class="btn btn-danger">删除</button>'
            }
        }
    }

];

function sortEventList(){
    $("#mmGrid tbody").sortable({
        handle:'.fa-sort',
        scroll: true,
        scrollSpeed: 100,
        axis:'y',
        opacity: 0.6,//设置拖动时候的透明度
        revert: true,//缓冲效果
        cursor: 'move',//拖动的时候鼠标样式
        update: function() {
            var sortvalue = new Array;
            $(this).find("td .fa-sort").each(function(index,element){
                sortvalue[index] = {id:$(element).data('id'),sign:parseInt(index)+1};
            });
            $.ajax({
                url: base_url+'/parts/updateLessonSorts/',
                type : "post",
                data :{
                    'requestvalue':JSON.stringify(sortvalue)
                },
                beforeSend: function(){

                },
                success:function(data){
                    mmg.load({});
                }
            });
        }
    });

}
var eventItem = null;
var eventItem2 = null;
var mmg = $('#mmGrid').mmGrid({
    indexCol: true,
    indexColWidth: 25,
    checkCol: true,
    multiSelect: false,
    sortName: 'id',
    sortStatus: 'asc',
    height: 'auto',
    cols: tItem,
    url: base_url+'/teacherexamcategory/getTeacherPaperCategoryList/'+paper_id,
    method: 'get',
    params:{

    },
    root: 'items',
    fullWidthRows:true,
    nowrap: true,
    plugins : [
        $('#paginator').mmPaginator()
    ]
}).on('loadSuccess', function(e, data){
    sortEventList();
}).on('cellSelected', function(e, item, rowIndex, colIndex,check){
    console.log(check); console.log(rowIndex); console.log(colIndex); console.log(e);
    if($(e.target).is('.btn-info, .btnPrice')){
        e.stopPropagation();  //阻止事件冒泡
        //  alert(JSON.stringify(item));
        // window.location.href = base_url+"/parts/getEventDetail/"+item.id;
        LessonItem = item;
        $("#selectItem").click();
    }else if($(e.target).is('.btn-danger') && confirm('你确定要删除该行记录吗?')){
        e.stopPropagation(); //阻止事件冒泡
        var _this = $(e.target);
        $.ajax({
            type : "POST",  //提交方式
            url : base_url+'/teacherexamcategory/removeTeacherPaper/'+item.id,//路径
            dataType:"json",
            beforeSend:function(){
                _this.showLoading();
            },
            success: function (data){
                _this.hideLoading();
                retisterLimitTip("删除成功");
                mmg.load({});
            }
        });

    }else if($(e.target).is('.btn-success')){
        e.stopPropagation();  //阻止事件冒泡
        $("#selectImage").click();
        eventItem = item;
        isShowSubmtButton = true;

    }

}).on('cellSelectedCheck', function(e, item, rowIndex, colIndex,check){
    //if(check == 0) {
    //    $("#Download").attr("disabled","disabled");
    //    $("#exportPdf").attr("disabled","disabled");
    //} else{
    //    $("#Download").removeAttr("disabled");
    //    $("#exportPdf").removeAttr("disabled");
    //}
});







