
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
        title:'进度名称',
        name:'name',
        width:'',
        align: 'center',
        renderer:function(val){
            return val;
        }
    },
    {
        title:'任务截止日期',
        name:'end_date',
        width:'',
        align: 'center',
    },
    {
        title:'发布时间',
        name:'created_time',
        width:'',
        align: 'center',
    },
    {
        title:'包含任务数',
        name:'school_count',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return val
        }
    },
    {
        title: '操作', name: '',
        width: 300,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val,item) {
            return '<a href="javascript:;" class="btn-normal edit">编辑</a>';

        }
    }

];

var mmg = $('#mmGrid').mmGrid({
    indexCol: true,
    indexColWidth: 30,
    checkCol: true,
    multiSelect: false,
    sortName: 'id',
    sortStatus: 'asc',
    height: 'auto',
    cols: tItem,
    url: base_url+'/teachingscheduletasks/getTeachingScheduleTaksList/'+teachingschedule_id,
    method: 'get',
    params:{

    },
    root: 'items',
    fullWidthRows:true,
    nowrap: true,
    plugins : [
        $('#paginator').mmPaginator({limitList: [10,20,30,50]})
    ]
}).on('loadSuccess', function(e, data){

}).on('cellSelected', function(e, item, rowIndex, colIndex,check){
    console.log($(e.target));
    if($(e.target).is('.btn-info, .btnPrice')){
        e.stopPropagation();  //阻止事件冒泡
        userItem = item;
        $("#region_settings").click();


    }else if($(e.target).is('.btn-danger') && confirm('你确定要删除该行记录吗?')){
        e.stopPropagation(); //阻止事件冒泡
        $.ajax({
                type: "POST",
                async: false,
                 url:  base_url+'/regions/DeleteRegion/',
                 data: {
                 region_id: item.id
        },
        success: function (msg) {
            retisterLimitTip("删除成功");
            mmg.load();
        }
    });
    }else if($(e.target).is('.btn-warning') && confirm('你确定要执行此操作吗')){
        e.stopPropagation(); //阻止事件冒泡
        $.ajax({
                type: "POST",
                async:false,
                 url: base_url+'/regions/setRegionBlock',
                 data: {
                     region_id:item.id,
                    status:item.status==1?0:1,
                 },
        success: function (msg){
            retisterLimitTip("设置成功");
            mmg.load();
        }
    });
    }else if($(e.target).is('.view')){
        console.log($(e.target));
        e.stopPropagation(); //阻止事件冒泡
        userItem = item;
       window.location.href = base_url+'/teachingscheduletask/index/'+item.id

    }
    else if($(e.target).is('.edit')){
        console.log($(e.target));
        e.stopPropagation(); //阻止事件冒泡
        userItem = item;
       $("#teachingschedule_settings").click();

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







