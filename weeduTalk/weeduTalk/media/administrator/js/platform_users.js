
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
        title:'头像',
        name:'avatar_url',
        width:'',
        align: 'center',
        renderer:function(val){
            return "<img src='"+val+"' width='80px'>";
        }
    },
    {
        title:'姓名',
        name:'name',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return val
        }
    },
    {
        title:'账号',
        name:'username',
        width:'',
        align: 'center',
        type: 'number',
        sortable: true,
        renderer:function(val){
            return val;
        }
    },
    {
        title:'角色',
        name:'roleName',
        width:'',
        align: 'center',
        sortable: true
    },
    {
        title:'授权课程数',
        name:'course_count',
        width:200,
        align: 'center'
    },
    {
        title:'状态',
        name:'status',
        width:'',
        align: 'center',
        renderer:function(val){
            if(val == 1){
                return "<span class='state-progress'>正常</span>";
            }
            return "<span class='state-type'>已停用</span>";
        }
    },
    {
        title: '操作', name: '',
        width: 400,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val) {
            return '<button  class="btn btn-info">编辑</button> <button  class="btn btn-danger">删除</button>'
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
    url: base_url+'/platform_account/getPlatformAccountList/',
    method: 'get',
    cache:true,
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
        $("#user-info-edit").click();

    }else if($(e.target).is('.btn-danger') && confirm('你确定要删除该行记录吗?')){
        e.stopPropagation(); //阻止事件冒泡

        $.ajax({
                type: "POST",
                async: false,
                url: base_url+'/AccountManage/DeleteUserSchoolRelationShip/',
                 data: {
                userid: userItem.id,
                school_id: school_id,
            },
            success: function (msg) {
                retisterLimitTip("设置成功");
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







