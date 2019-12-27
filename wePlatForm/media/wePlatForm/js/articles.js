
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
        title:'封面图',
        name:'picture_url',
        width:'',
        align: 'center',
        renderer:function(val) {
            if (val != "") {
                return '<img src="' + val + '" width="120" />';
            }
            else {
                return "";
            }
        }
    },
    {
        title:'文章标题',
        name:'title',
        width:200,
        align: 'center',
        renderer:function(val){
            return val;
        }
    },
    {
        title:'文章类型',
        name:'category',
        width:'',
        align: 'center',
        renderer:function(val){
            return val.name;
        }
    },
    {
        title:'状态',
        name:'status',
        width:'',
        align: 'center',
        renderer: function (val,item) {
        if(val == 0){
            return "未发布";
        }else{
            return "已发布";
        }
    }
    },
    {
        title:'发布范围',
        name:'user_id',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return val
        }
    },
    {
        title:'发布时间',
        name:'create_time',
        width:150,
        align: 'center',
        renderer:function(val,item){
            return val
        }
    },
    {
        title:'发布人',
        name:'userInfo',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return val.name;
        }
    },
    {
        title: '操作', name: '',
        width: 300,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val,item) {
            if(item.status == 0){
                return '<a href="javascript:;" class="btn-normal btn-view view">预览</a> <a href="javascript:;" class="btn-normal btn-publish publish">发布</a> <a href="javascript:;" class="btn-normal btn-edit edit">编辑</a>';
            }else{
                return '<a href="javascript:;" class="btn-normal btn-view view">预览</a> <a href="javascript:;" class="btn-normal btn-publish publish">下架</a> <a href="javascript:;" class="btn-normal btn-edit edit">编辑</a>';
            }
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
    url: base_url+'/contents/getArticleList',
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
    }else if($(e.target).is('.view')){
        console.log($(e.target));
        e.stopPropagation(); //阻止事件冒泡
        contentItem = item;
        $("#preview_article").click();
    }else if($(e.target).is('.publish')){
        e.stopPropagation();
        $.ajax({
            type: "POST",
            async: false,
            url:  base_url+'/contents/save/',
            data: {
                status: item.status == 0?1:0,
                id:item.id
            },
            success: function (msg) {
                retisterLimitTip("设置成功");
                mmg.load();
            }
        });
    }else if($(e.target).is('.edit')){
        console.log($(e.target));
        e.stopPropagation(); //阻止事件冒泡
        contentItem = item;
        window.location.href =base_url+'/contents/add/'+item.id;
    }



}).on('cellSelectedCheck', function(e, item, rowIndex, colIndex,check){

});







