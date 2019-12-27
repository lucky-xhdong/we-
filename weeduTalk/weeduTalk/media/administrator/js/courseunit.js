
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
        width:80,
        align: 'center',
        renderer:function(val,item){
            return '<a href="'+base_url+'/courses/getUnitLessons/'+item.id+'">'+val+'</a>'
        }
    },
    {
        title:'状态',
        name:'status',
        width:80,
        align: 'center',
        renderer:function(val,item){
            if (val == 0) {
                return '<span style="color: #b00">未发布</span>';
            } else if (val == 1) {
                return '<span style="color: #0b0">已发布</span>';
            }
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
        width: 430,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val) {
            return '<button  class="btn btn-success">生成二维码</button>  <button  class="btn btn-primary">套用单元结构</button> <button  class="btn btn-warning">复制单元</button> <button  class="btn btn-info">编辑</button> <button  class="btn btn-danger">删除</button>'
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
                url: base_url+'/parts/updateUnitSorts/',
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
    url: base_url+'/courses/getCourseUnitList/'+course_id+'/'+level_id,
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

    }else if($(e.target).is('.btn-danger') && confirm('你确定要删除该行记录吗?')){
        e.stopPropagation(); //阻止事件冒泡
        var _this = $(e.target);
        $.ajax({
            type : "POST",  //提交方式
            url : base_url+'/parts/removeUnit/'+item.id,//路径
            dataType:"json",
            beforeSend:function(){
                _this.showLoading();
            },
            success: function (data){
                _this.hideLoading();
                retisterLimitTip("删除成功");
                mmg.load({});
            }
        });
    }else if($(e.target).is('.btn-primary') && confirm('您确定要执行吗?此操作将导致该单元下之前的所有内容被删除,确认?')){
        e.stopPropagation(); //阻止事件冒泡
        var _this = $(e.target);
        console.log(_this);
        $.ajax({
            type : "GET",  //提交方式
            url : base_url+'/courses/syncUnitTemplate/'+item.id,//路径
            dataType:"json",
            beforeSend:function(){
                _this.showLoading();
            },
            success: function (data){
                _this.hideLoading();
                retisterLimitTip("以按照单元结构生成了所有内容!");
                mmg.load({});
            }
        });
    }else if($(e.target).is('.btn-warning') && confirm('您确定要执行吗?此操作将复制这个单元的所有内容,确认?')){
        e.stopPropagation(); //阻止事件冒泡
        var _this = $(e.target);
        console.log(_this);
        $.ajax({
            type : "GET",  //提交方式
            url : base_url+'/courses/syncUnitALLTemplateContent/'+item.id,//路径
            dataType:"json",
            beforeSend:function(){
                _this.showLoading();
            },
            success: function (data){
                _this.hideLoading();
                retisterLimitTip("以按照要求复制生成了所有内容!");
                mmg.load({});
            }
        });
    }else if($(e.target).is('.btn-success')){
        e.stopPropagation(); //阻止事件冒泡
        var _this = $(e.target);
        console.log(_this);
        $.ajax({
            type : "GET",  //提交方式
            url : base_url+'/courses/createQrcode/'+item.id,//路径
            dataType:"json",
            beforeSend:function(){
                _this.showLoading();
            },
            success: function (data){
                _this.hideLoading();
                retisterLimitTip("二维码生成成功!");
                mmg.load({});
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







