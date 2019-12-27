
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
        title:'封面图片',
        name:'picture_url',
        width:100,
        align: 'center',
        renderer:function(val){
            return '<img src="'+val+'" height="70px"/>'
        }
    },
    {
        title:'单元二维码',
        name:'qrcode_url',
        width:100,
        align: 'center',
        renderer:function(val){
            if(val != "") return '<img src="'+val+'" height="70px"/>'
        }
    },
    {
        title:'单元名称',
        name:'name',
        width:200,
        align: 'center',
        renderer:function(val,item){
            var string = "<input class='unitname' value='"+val+"' name='name' style='width: 100px;'>";
            return string + '   <button  class="btn btn-primary">保存</button>';
        }
    },
    {
        title:'单元描述',
        name:'description',
        width: 100,
        align: 'center',
    },
    {
        title:'单元标题',
        name:'title',
        width:'',
        align: 'center',
    },
    {
        title:'排序',
        name:'scores',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return '<a href="javascript:;" data-id="'+item.id+'" class="fa fa-sort btn-switch-first" title="排序"></a>'
        }
    },
    {
        title: '操作', name: '',
        width: 200,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val) {
            return '<button  class="btn btn-danger">删除</button>'
        }
    }
];
function sortEventList(){
    $("#mmGrid tbody").sortable({
        handle:'.fa-sort',
        scroll: true,
        scrollSpeed: 100,
        axis:'y',
        opacity: 0.6,//设置拖动时候的透明度
        revert: true,//缓冲效果
        cursor: 'move',//拖动的时候鼠标样式
        update: function() {
            var sortvalue = new Array;
            $(this).find("td .fa-sort").each(function(index,element){
                sortvalue[index] = {id:$(element).data('id'),sign:parseInt(index)+1};
            });
            $.ajax({
                url: base_url+'/publishing_houses/updateUnitSorts/'+course_id,
                type : "post",
                data :{
                    'requestvalue':JSON.stringify(sortvalue)
                },
                beforeSend: function(){

                },
                success:function(data){
                    mmg.load({});
                }
            });
        }
    });

}
var mmg = $('#mmGrid').mmGrid({
    indexCol: true,
    indexColWidth: 25,
    checkCol: true,
    multiSelect: false,
    sortName: 'id',
    sortStatus: 'asc',
    height: 'auto',
    cols: tItem,
    url: base_url+'/publishing_houses/getCourseUnitList/'+course_id+'/'+level_id,
    method: 'get',
    params:{

    },
    root: 'items',
    fullWidthRows:true,
    nowrap: true,
    plugins : [
        $('#paginator').mmPaginator()
    ]
}).on('loadSuccess', function(e, data){
    sortEventList();
}).on('cellSelected', function(e, item, rowIndex, colIndex,check){
    console.log(check); console.log(rowIndex); console.log(colIndex); console.log(e);
    console.log(check); console.log(rowIndex); console.log(colIndex); console.log(e);
    if($(e.target).is('.btn-info, .btnPrice')){
        e.stopPropagation();  //阻止事件冒泡
        //  alert(JSON.stringify(item));
        // window.location.href = base_url+"/parts/getEventDetail/"+item.id;
        UnitItem = item;
        $("#selectItem").click();

    }else if($(e.target).is('.btn-primary')){
        var name = $(e.target).parents("tr").find(".unitname").val();
        $.ajax({
            type : "POST",  //提交方式
            url : base_url+'/publishing_houses/updateUnitName/'+item.publishing_house_course_unit_id,//路径
            data:{
                "name":name
            },
            dataType:"json",
            beforeSend:function(){
                $(e.target).showLoading();
            },
            success: function (data){
                $(e.target).hideLoading();
                retisterLimitTip("保存成功");
                mmg.load();
            }
        });
    }else if($(e.target).is('.btn-danger') && confirm('你确定要删除该行记录吗?')){
        e.stopPropagation(); //阻止事件冒泡
        var _this = $(e.target);
        $.ajax({
            type : "POST",  //提交方式
            url : base_url+'/publishing_houses/deleteUnit/'+item.publishing_house_course_unit_id,//路径
            dataType:"json",
            beforeSend:function(){
                $(e.target).showLoading();
            },
            success: function (data){
                $(e.target).hideLoading();
                retisterLimitTip("删除成功");
                mmg.load();
            }
        });
    }
    //if(check == 0) {
    //    $("#Download").attr("disabled","disabled");
    //    $("#exportPdf").attr("disabled","disabled");
    //}
    //else{
    //    $("#Download").removeAttr("disabled");
    //    $("#exportPdf").removeAttr("disabled");
    //}
}).on('cellSelectedCheck', function(e, item, rowIndex, colIndex,check){
    //if(check == 0) {
    //    $("#Download").attr("disabled","disabled");
    //    $("#exportPdf").attr("disabled","disabled");
    //} else{
    //    $("#Download").removeAttr("disabled");
    //    $("#exportPdf").removeAttr("disabled");
    //}
});







