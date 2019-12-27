
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
var tItem2 = [
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
    }

];
var mmgAuth = null;
function getPermissionAuthList(){
    mmgAuth = $('#permissionAuthList').mmGrid({
        indexCol: true,
        indexColWidth: 25,
        checkCol: true,
        multiSelect: true,
        sortName: 'id',
        sortStatus: 'asc',
        height: 'auto',
        cols: tItem2,
        url: base_url+'/role/getPermissionList/',
        method: 'get',
        params:{

        },
        root: 'items',
        fullWidthRows:true,
        nowrap: true,
        plugins : [
            $('#paginatorAuthPermission').mmPaginator()
        ]
    }).on('loadSuccess', function(e, data){
           // console.log(role.permissions);
            $(data.items).each(function(index,permission){
                console.log(permission);
                if(role != null){
                    for(var i=0;i< role.permissions.length;i++){
                        console.log(permission.id+"----"+ role.permissions[i].pid);
                        if(parseInt(permission.id) == parseInt(role.permissions[i].pid)){
                            console.log(permission.id+'seleccr');
                            mmgAuth.select(index);
                           break;
                        }else{
                            mmgAuth.deselect(index);
                        }
                    }
                }else{
                    mmgAuth.deselect(index);
                }
            });
    }).on('cellSelected', function(e, item, rowIndex, colIndex,check){
        console.log(check); console.log(rowIndex); console.log(colIndex); console.log(e);
        if($(e.target).is('.btn-info, .btnPrice')){
           // role_id = item.id;
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





