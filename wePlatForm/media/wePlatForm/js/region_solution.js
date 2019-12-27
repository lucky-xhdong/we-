
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
        title:'资料名称',
        name:'orig_name',
        width: 300,
        align: 'center',
        lockWidth: true,
        lockDisplay: true
    },
    {
        title:'文档类型',
        name:'filetype',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return val;
        }
    },
    {
        title:'上传时间',
        name:'created_time',
        width: 200,
        align: 'center',
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

var mmgregion_solution = null;

function getmmgregion_solution(){
     mmgregion_solution = $('#region_solution').mmGrid({
        indexCol: true,
        indexColWidth: 30,
        checkCol: true,
        multiSelect: false,
        sortName: 'id',
        sortStatus: 'asc',
        height: 'auto',
        cols: tItem,
        url: base_url+'/regions/getfilelist/'+region_id+'/region_solution',
        method: 'get',
        params:{

        },
        root: 'items',
        fullWidthRows:true,
        nowrap: true,
        plugins : [
            $('#paginator_region_solution').mmPaginator({limitList: [10,20,30,50]})
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






