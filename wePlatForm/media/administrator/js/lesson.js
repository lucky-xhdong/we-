
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
        title:'封面图片',
        name:'picture_url',
        width:'',
        align: 'center',
        renderer:function(val){
            return '<img src="'+val+'" height="70px"/>'
        }
    },
    {
        title:'名称',
        name:'name',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return '<a href="'+base_url+'/courses/getLessonparts/'+item.id+'">'+val+'</a>'
        }
    },
    {
        title:'描述',
        name:'description',
        width:'',
        align: 'center',
    },
    {
        title:'更新时间',
        name:'update_time',
        width:'',
        align: 'center',
    },
    {
        title:'类型',
        name:'type',
        width:'',
        align: 'center',
    },
    {
        title: '操作', name: '',
        width: 230,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val) {
            return '<button  class="btn btn-success createZip">发布到前端</button> <button  class="btn btn-info">编辑</button> <button  class="btn btn-danger">删除</button>'
        }
    }

];
var mmg = $('#mmGrid').mmGrid({
    indexCol: true,
    indexColWidth: 25,
    checkCol: true,
    multiSelect: false,
    sortName: 'id',
    sortStatus: 'asc',
    height: 'auto',
    cols: tItem,
    url: base_url+'/courses/getUnitLessonsList/'+unit_id,
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
    }else if($(e.target).is('.btn-success')){
        e.stopPropagation();  //阻止事件冒泡
        var _this = $(e.target);
        console.log(_this);
        $.ajax({
            type : "GET",  //提交方式
            url : base_url+'/courses/createZip/'+item.id,//路径
            dataType:"json",
            beforeSend:function(){
                _this.showLoading();
            },
            success: function (data){
                _this.hideLoading();
                retisterLimitTip("脚本生成成功");
                mmg.load({});
            }
        });

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







