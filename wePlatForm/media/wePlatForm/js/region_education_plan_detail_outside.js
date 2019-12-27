
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
var EducationPlanItem = [
    {
        title:'计划名',
        name:'name',
        width:'',
        align: 'center',
        lockWidth: true,
        lockDisplay: true
    },

    {
        title:'区域',
        width:'',
        name:'regionInfo',
        align: 'center',
        renderer:function(val,item){
           return val.name;
        }
    },
    {
        title:'学校',
        name:'school_id',
        width:'',
        align: 'center',
        renderer:function(val,item){
            if(val != 0) return item.schoolInfo.name;
        }
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
        width:'',
        align: 'center',
    },
    
    {
        title: '操作', name: '',
        width: 300,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val,item) {
            return '<a href="javascript:;" class="btn-normal btn-view view">日程安排</a>';

        }
    }

];

var mmgEducationPlanDocument = null;

function getEducationPlanmmgDocument(){
    mmgEducationPlanDocument = $('#region_education_plan').mmGrid({
        indexCol: true,
        indexColWidth: 30,
        checkCol: true,
        multiSelect: false,
        sortName: 'id',
        sortStatus: 'asc',
        height: 'auto',
        cols: EducationPlanItem,
        url: base_url+'/service_plan/getRegionEducationPlanList/'+region_id,
        method: 'get',
        params:{

        },
        root: 'items',
        fullWidthRows:true,
        nowrap: true,
        plugins : [
            $('#paginator_region_education_plan').mmPaginator({limitList: [10,20,30,50]})
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
            window.location.href = base_url+'/service_plan/detail/'+item.id

        }else if($(e.target).is('.audit') && confirm('你确定要执行此操作吗')){
            e.stopPropagation(); //阻止事件冒泡
            $.ajax({
                type: "POST",
                async:false,
                url: base_url+'/regions/addRegionEducationPlan',
                data: {
                    id:item.id,
                    status:item.status==1?0:1,
                },
                success: function (msg){
                    retisterLimitTip("提交成功");
                    mmgEducationPlanDocument.load();
                }
            });
        }else if($(e.target).is('.edit')){
            console.log($(e.target));
            e.stopPropagation(); //阻止事件冒泡
            education_plan_Item = item;
            $("#region_education_plan_modal").modal("show");
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
                    mmgservicepLANDocument.load();
                }
            });
        }

    }).on('cellSelectedCheck', function(e, item, rowIndex, colIndex,check){

    });

}






