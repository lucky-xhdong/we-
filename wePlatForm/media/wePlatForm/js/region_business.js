
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
var businessItem = [
    {
        title:'合同页码',
        name:'contract_pages',
        width: 300,
        align: 'center',
        lockWidth: true,
        lockDisplay: true
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
        title:'签约人',
        name:'businessUserInfo',
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
            return '<a href="javascript:;" class="btn-normal btn-edit  edit">编辑</a>';
        }
    }

];

var mmgbusinessDocument = null;

function getBusinessmmgDocument(){
     mmgbusinessDocument = $('#region_business').mmGrid({
        indexCol: true,
        indexColWidth: 30,
        checkCol: true,
        multiSelect: false,
        sortName: 'id',
        sortStatus: 'asc',
        height: 'auto',
        cols: businessItem,
        url: base_url+'/regions/getRegionBusinessList/'+region_id,
        method: 'get',
        params:{

        },
        root: 'items',
        fullWidthRows:true,
        nowrap: true,
        plugins : [
            $('#paginator_region_business').mmPaginator({limitList: [10,20,30,50]})
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
        }else if($(e.target).is('.edit')){
            console.log($(e.target));
            e.stopPropagation(); //阻止事件冒泡
            business_info = item;
           $("#business_modal").modal("show");

        }


    }).on('cellSelectedCheck', function(e, item, rowIndex, colIndex,check){

    });

}






