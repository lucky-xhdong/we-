
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
var tItem1 = [
    {
        title:'名称',
        name:'name',
        width:'',
        align: 'left'
    },
    {
        title:'URL',
        name:'url',
        width:'',
        align: 'left',
    },
    {
        title: '操作', name: '',
        width: 230,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val) {
            return '<button  class="btn btn-info">编辑</button> <button  class="btn btn-danger">删除</button>'
        }
    }

];
var mmg = null;
function getPermissionList(){
     mmg = $('#permissionList').mmGrid({
        indexCol: true,
        indexColWidth: 25,
        checkCol: true,
        multiSelect: false,
        sortName: 'id',
        sortStatus: 'asc',
        height: 'auto',
        cols: tItem1,
        url: base_url+'/role/getPermissionList/',
        method: 'get',
        params:{

        },
        root: 'items',
        fullWidthRows:true,
        nowrap: true,
        plugins : [
            $('#paginatorPermission').mmPaginator()
        ]
    }).on('loadSuccess', function(e, data){

    }).on('cellSelected', function(e, item, rowIndex, colIndex,check){
        console.log(check); console.log(rowIndex); console.log(colIndex); console.log(e);
        if($(e.target).is('.btn-info, .btnPrice')){
            $("#permission_name").val(item.name);
            $("#permission_url").val(item.url);
            $("#category").val(item.category);
            permission_id = item.id;
        }else if($(e.target).is('.btn-danger') && confirm('你确定要删除该行记录吗?')){
            e.stopPropagation(); //阻止事件冒泡
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


}





