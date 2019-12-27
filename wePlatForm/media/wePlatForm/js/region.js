
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
        renderer:function(val){
            return val;
        }
    },
    {
        title:'所属省市',
        name:'province',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return item.province.name+'.'+item.city.name;
        }
    },
    {
        title:'签约状态',
        name:'signed_status',
        width:'',
        align: 'center',
        renderer:function(val,item){
            if(val == 0){
                return "未签约";
            }
            return "已签约";
        }
    },
    {
        title:'学校总数',
        name:'school_count',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return val
        }
    },
    {
        title:'签约学校数',
        name:'signed_school_count',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return val
        }
    },
    {
        title:'签约时间',
        name:'signed_time',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return val
        }
    },
    {
        title:'状态',
        name:'blockString',
        width:'',
        align: 'center'
    },
    {
        title: '操作', name: '',
        width: 330,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val,item) {
            return item.operationButton;
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
    url: base_url+'/regions/getRegionList',
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
    }else if($(e.target).is('.freeze') && confirm('你确定要执行此操作吗')){
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
        window.location.href = base_url+'/regions/detail/'+item.id+'/business'

    }else if($(e.target).is('.education')){
        console.log($(e.target));
        e.stopPropagation(); //阻止事件冒泡
        userItem = item;
        window.location.href = base_url+'/regions/detail/'+item.id+'/education'

    }else if($(e.target).is('.view')){
        console.log($(e.target));
        e.stopPropagation(); //阻止事件冒泡
        userItem = item;
        window.location.href = base_url+'/regions/detail/'+item.id+'/view'

    }else if($(e.target).is('.operate')){
        console.log($(e.target));
        e.stopPropagation(); //阻止事件冒泡
        userItem = item;
        window.location.href = base_url+'/regions/detail/'+item.id+'/operate'

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







