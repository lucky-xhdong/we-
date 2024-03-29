
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
var ServicePlanItem = [
    {
        title:'计划内容',
        name:'body',
        width:200,
        align: 'center',
        lockWidth: true,
        lockDisplay: true
    },

    {
        title:'开始时间',
        width:'',
        name:'start_date',
        align: 'center',
    },
    {
        title:'结束时间',
        name:'end_date',
        width:'',
        align: 'center',
    },
    {
        title:'编写人',
        name:'userInfo',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return val.name;
        }
    },
    {
        title:'上传时间',
        name:'created_time',
        width:150,
        align: 'center',
    },
    {
        title: '操作', name: '',
        width: 150,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val,item) {
            //return '<a href="javascript:;" class="btn-normal  btn-edit edit">编辑</a>';
        }
    }

];

 var plan_detail =  $('#region_service_plan').mmGrid({
        indexCol: true,
        indexColWidth: 30,
        checkCol: true,
        multiSelect: false,
        sortName: 'id',
        sortStatus: 'asc',
        height: 'auto',
        cols: ServicePlanItem,
        url: base_url+'/serviceaudit/getRegionBusinessServicePlanList/'+plan_id,
        method: 'get',
        params:{

        },
        root: 'items',
        fullWidthRows:true,
        nowrap: true,
        plugins : [
            $('#paginator_region_service_plan').mmPaginator({limitList: [10,20,30,50]})
        ]
    }).on('loadSuccess', function(e, data){

    }).on('cellSelected', function(e, item, rowIndex, colIndex,check){
        console.log($(e.target));
        if($(e.target).is('.btn-info, .btnPrice')){
            e.stopPropagation();  //阻止事件冒泡
            userItem = item;
            $("#region_settings").click();


        }else if($(e.target).is('.btn-danger')){
            e.stopPropagation(); //阻止事件冒泡
            //弹出框提示输入拒绝理由
            plan_item = item;
            $("#audie_modal").modal("show");
        }else if($(e.target).is('.audit') && confirm('你确定要执行此操作吗')){
            e.stopPropagation(); //阻止事件冒泡
            $.ajax({
                type: "POST",
                async:false,
                url: base_url+'/regions/addRegionServicePlan',
                data: {
                    id:item.id,
                    status:item.status==1?0:1,
                },
                success: function (msg){
                    retisterLimitTip("提交成功");
                    plan_detail.load();
                }
            });
        }else if($(e.target).is('.agree') && confirm('你确定要执行此操作吗')){
            e.stopPropagation(); //阻止事件冒泡
            $.ajax({
                type: "POST",
                async:false,
                url: base_url+'/regions/addRegionServicePlan',
                data: {
                    id:item.id,
                    status:2,
                },
                success: function (msg){
                    retisterLimitTip("提交成功");
                    plan_detail.load();
                }
            });
        }else if($(e.target).is('.edit')){
            console.log($(e.target));
            e.stopPropagation(); //阻止事件冒泡
            service_plan_Item = item;
            $("#region_service_plan_modal").modal("show");
        }

    }).on('cellSelectedCheck', function(e, item, rowIndex, colIndex,check){

    });







