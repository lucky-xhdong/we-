
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
        title:'课程名称',
        name:'courseInfo',
        width:'',
        align: 'center',
        renderer:function(val){
            return val.name;
        }
    },
    {
        title:'主/副课',
        name:'is_major',
        width:'',
        align: 'center',
        renderer:function(val,item){
            if(val == 0){
                return "辅课";
            }
            return "主课";
        }
    },
    {
        title:'设置学习时间',
        name:'study_time',
        width:'',
        align: 'center',
        type: 'number',
        sortable: true,
        renderer:function(val){
            return val;
        }
    },
    {
        title:'完成率激活文字键',
        name:'abc',
        width:'',
        align: 'center',
        sortable: true
    },
    {
        title:'完成率激活翻译键',
        name:'eng',
        width:'',
        align: 'center'
    },
    {
        title: '操作', name: '',
        width: 400,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val) {
            return '<button  class="btn btn-info">课程设置</button> <button  class="btn btn-success">学习成绩达标要求</button>'
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
    url: base_url+'/AccountManage/getClassCourseJsonList',
    method: 'get',
    cache:true,
    params:{
         class_id:class_id,
    },
    root: 'items',
    fullWidthRows:true,
    nowrap: true,
    plugins : [
        $('#paginator').mmPaginator({limitList: [10,20,30,50]})
    ]
}).on('loadSuccess', function(e, data){

}).on('cellSelected', function(e, item, rowIndex, colIndex,check){
    console.log(check); console.log(rowIndex); console.log(colIndex); console.log(e);
    if($(e.target).is('.btn-info, .btnPrice')){
        e.stopPropagation();  //阻止事件冒泡
        userItem = item;
        $("#courseBasicSetting").modal("show");


    }else if($(e.target).is('.btn-danger') && confirm('你确定要删除该行记录吗?')){
        e.stopPropagation(); //阻止事件冒泡


    }else if($(e.target).is('.btn-success')){
        e.stopPropagation(); //阻止事件冒泡
        userItem = item;
       $("#courseSetting").modal("show");

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







