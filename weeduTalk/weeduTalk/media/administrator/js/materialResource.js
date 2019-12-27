
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
            return ' <button class="btn-check">' + val + '</button>';;
        }
    },
    {
        title:'类型',
        name:'resource_type_name',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return val
        }
    },
    {
        title:'所属区域',
        name:'region_name',
        width:'',
        align: 'center',
        renderer:function(val){
            return val;
        }
    },
    {
        title:'所属学校',
        name:'school_name',
        width:'',
        align: 'center',
        renderer:function(val){
            return val;
        }
    },
    {
        title:'上传时间',
        name:'created_time',
        width:'',
        align: 'center',
        renderer:function(val){
            return val;
        }
    },
    {
        title:'上传人',
        name:'user_name',
        width:'',
        align: 'center',
        renderer:function(val){
            return val;
        }
    },
    {
        title: '操作', name: '',
        width: 300,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val) {
            return ' <button  class="btn btn-info">查看</button> <button  class="btn btn-danger">删除</button>'
        }
    }

];

var mmg = $('#mmGrid').mmGrid({
    indexCol: true,
    indexColWidth: 25,
    checkCol: false,
    multiSelect: false,
    sortName: 'id',
    sortStatus: 'asc',
    height: 'auto',
    cols: tItem,
    url: base_url+'/materialResources/getResourceList',
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
    console.log(check); console.log(rowIndex); console.log(colIndex); console.log(e);
    if($(e.target).is('.btn-info, .btnPrice')){
        e.stopPropagation();  //阻止事件冒泡
        userItem = item;
        $("#resource_settings").click();


    } else if($(e.target).is('.btn-check')){
        e.stopPropagation();  //阻止事件冒泡
        userItem = item;
        $("#resource_file_check").click();
    }else if($(e.target).is('.btn-danger') && confirm('你确定要删除该行记录吗?')){
        e.stopPropagation(); //阻止事件冒泡
        $.ajax({
                type: "POST",
                async: false,
                 url:  base_url+'/materialResources/deleteResource/',
                 data: {
                 resourcde_id: item.id
        },
        success: function (msg) {
            retisterLimitTip("删除成功");
            mmg.load();
        }
    });
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







