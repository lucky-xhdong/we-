
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
        title:'类型',
        name:'resourceInfo',
        width:'',
        align: 'center',
        renderer:function(val,item){
            if(val.type == "image"){
                return '<img src="'+val.url+'" width="60;" />';
            }else if(val.type == "audio"){
                return '<div class="icon-wrapper"><i class="icon icon-audio"></i></div>';
            }else if(val.type == "video"){
                return '<div class="icon-wrapper"><i class="icon icon-video"></i></div>';
            }else if(val.type == "zip"){
                return '<div class="icon-wrapper"><i class="icon icon-zip"></i></div>';
            }else if(val.type == "word"){
                return '<div class="icon-wrapper"><i class="icon icon-word"></i></div>';
            }else if(val.type == "ppt"){
                return '<div class="icon-wrapper"><i class="icon icon-ppt"></i></div>';
            }else if(val.type == "excel"){
                return '<div class="icon-wrapper"><i class="icon icon-excel"></i></div>';
            }else if(val.type == "file"){
                return '<div class="icon-wrapper"><i class="icon icon-file"></i></div>';
            }
        }

    },
    {
        title:'名称',
        name:'name',
        width:'',
        align: 'center',
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

];

var mmGridSelectResource = null;
function getmmGridSelectResource(){
     mmGridSelectResource = $('#mmGridSelectResource').mmGrid({
        indexCol: true,
        indexColWidth: 25,
        checkCol: true,
        multiSelect: true,
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
            $('#paginatorSelectResource').mmPaginator({limitList: [5,10,20,30,50]})
        ]
    }).on('loadSuccess', function(e, data){

    }).on('cellSelected', function(e, item, rowIndex, colIndex,check){
        console.log(check); console.log(rowIndex); console.log(colIndex); console.log(e);
        if($(e.target).is('.btn-view, .btnPrice')){
            e.stopPropagation();  //阻止事件冒泡
            userItem = item;
            $("#resource_settings").click();


        } else if($(e.target).is('.btn-preview')){
            e.stopPropagation();  //阻止事件冒泡
            userItem = item;
            $("#resource_file_check").click();
        }else if($(e.target).is('.btn-delete') && confirm('你确定要删除该行记录吗?')){
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

}







