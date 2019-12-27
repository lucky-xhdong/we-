
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
        name:'picture_list',
        width:'',
        align: 'center',
        renderer:function(val,item){
            if(item.picture_list.length > 0){
                return '<img src="'+item.picture_list[0].originurl+'" height="70px"/>'
            }else{
                return '<img src="'+item.media_default_url+'" height="70px"/>'
            }
        }
    },
    {
        title:'事件内容',
        name:'text',
        width:'',
        align: 'center',
    },
    {
        title:'事件类型',
        name:'type',
        width:'',
        align: 'center',

    },
    {
        title:'timeRange',
        name:'timeRange',
        width:'',
        align: 'center',
    },
    {
        title:'scores',
        name:'scores',
        width:'',
        align: 'center',
    },
    {
        title:'创建人',
        name:'userInfo',
        width:'',
        align: 'center',
        renderer:function(val,item){
            if(val.id != 0) return val.name;
        }
    },
    {
        title:'创建时间',
        name:'create_time',
        width:'',
        align: 'center',
    },
    {
        title:'最后修改人',
        name:'modifyUserInfo',
        width:'',
        align: 'center',
        renderer:function(val,item){
            if(val.id != 0) return val.name;
        }

    },
    {
        title:'最后修改时间',
        name:'modify_time',
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
        width: 300,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val) {
            return ' <button  class="btn btn-success">更换图片</button>  <button  class="btn btn-info">编辑</button> <button  class="btn btn-danger">删除</button> <button  class="btn btn-primary">复制</button>'
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
          url: base_url+'/parts/updateEventSorts/',
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


var eventItem = null;
var mmg = $('#mmGrid').mmGrid({
    indexCol: true,
    indexColWidth: 25,
    checkCol: true,
    multiSelect: false,
    sortName: 'id',
    sortStatus: 'asc',
    height: 'auto',
    cols: tItem,
    url: base_url+'/parts/getEventLists/'+part_id,
    method: 'get',
    params:{

    },
    root: 'items',
    fullWidthRows:true,
    nowrap: true,
    plugins : [
        $('#paginator').mmPaginator({limitList: [150]})
    ]
}).on('loadSuccess', function(e, data){
    sortEventList();
}).on('cellSelected', function(e, item, rowIndex, colIndex,check){
    console.log(item); console.log(rowIndex); console.log(colIndex); console.log(e);
    if($(e.target).is('.btn-info, .btnPrice')){
        e.stopPropagation();  //阻止事件冒泡
        //  alert(JSON.stringify(item));
        window.location.href = base_url+"/parts/getEventDetail/"+item.id;
    }else if($(e.target).is('.btn-danger') && confirm('你确定要删除该行记录吗?')){
        e.stopPropagation(); //阻止事件冒泡
        $.ajax({
            type : "GET",  //提交方式
            url : base_url+'/parts/removeEvent/'+item.id,//路径
            dataType:"json",
            success:function(result) {//返回数据根据结果进行相应的处理
                mmg.removeRow(rowIndex);
            }
        });
    }else if($(e.target).is('.btn-success')){
        e.stopPropagation();  //阻止事件冒泡
        //  alert(JSON.stringify(item));
        //更新图片
        $("#selectImage").click();
        eventItem = item;
    }else if($(e.target).is('.btn-primary') && confirm('你确定要复制该行记录吗?')){
        e.stopPropagation();  //阻止事件冒泡
        var _this = $(e.target);
        $.ajax({
            type: "GET",
            async: false,
            url : base_url+'/parts/syncEventItem/'+item.id,//路径
            beforeSend:function(){
                _this.showLoading();
            },
            success: function (data){
                _this.hideLoading();
                retisterLimitTip("复制成功");
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







