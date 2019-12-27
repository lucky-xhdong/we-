
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
var TeachingAchievementItem = [
    {
        title:'报告名称',
        name:'name',
        width:'',
        align: 'center',
        lockWidth: true,
        lockDisplay: true
    },

    {
        title:'成果类型',
        width:'',
        name:'type',
        align: 'center',
        renderer:function(val,item){
           if(val == 0) return "运营";
            else if(val == 1) return "教学";
           else if(val == 2) return "商务";
        }
    },
    {
        title:'发布范围',
        name:'school_id',
        width:'',
        align: 'center',
        renderer:function(val,item){
            if(val == 0) return "区域";
            else if(val == 1) return "学校";
        }
    },
    {
        title:'上传人',
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
        width: 150,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val,item) {
            return "";
        }
    }

];

var mmgTeachingAchievementDocument = null;

function getTeachingAchievementmmgDocument(){
    mmgTeachingAchievementDocument = $('#region_teaching_achievement').mmGrid({
        indexCol: true,
        indexColWidth: 30,
        checkCol: true,
        multiSelect: false,
        sortName: 'id',
        sortStatus: 'asc',
        height: 'auto',
        cols: TeachingAchievementItem,
        url: base_url+'/regions/getTeachingAchievementList/'+region_id,
        method: 'get',
        params:{

        },
        root: 'items',
        fullWidthRows:true,
        nowrap: true,
        plugins : [
            $('#paginator_region_teaching_achievement').mmPaginator({limitList: [10,20,30,50]})
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
        }else if($(e.target).is('.business')){
            console.log($(e.target));
            e.stopPropagation(); //阻止事件冒泡
            userItem = item;
            window.location.href = base_url+'/regions/business/'+item.id

        }

    }).on('cellSelectedCheck', function(e, item, rowIndex, colIndex,check){

    });

}






