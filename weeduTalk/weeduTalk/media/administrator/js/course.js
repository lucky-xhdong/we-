
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
        title:'课程图片',
        name:'picture_url',
        width:'',
        align: 'center',
        renderer:function(val){
            return '<img src="'+val+'" height="100px"/>'
        }
    },
    {
        title:'课程名称',
        name:'name',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return '<a href="'+base_url+'/courses/getCourseUnit/'+item.id+'">'+val+'</a>'
        }
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
        title:'课程类型',
        name:'type',
        width:'',
        align: 'center',
        type: 'number',
        sortable: true,
        renderer:function(val){
            if(val == "high_school"){
                return "高中";
            }else if(val == "primary_school"){
                return "小学";
            }else{
                return "中学";
            }
        }
    },
    {
        title:'课程单元数',
        name:'unitCount',
        width:'',
        align: 'center',
        sortable: true
    },
    {
        title:'使用对象',
        name:'suitable_object',
        width:'',
        align: 'center'
    },
    {
        title:'学习目标',
        name:'learning_goals',
        width:'',
        align: 'center'
    },
    {
        title:'课程性质',
        name:'nature_course',
        width:'',
        align: 'center'
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
        title: '操作', name: '',
        width: 200,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val) {
            return '<button  class="btn btn-info">编辑</button> <button  class="btn btn-danger">删除</button>'
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
                url: base_url+'/parts/updateCourseSorts/',
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
    url: base_url+'/courses/getCourseList/',
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
    if($(e.target).is('.btn-info, .btnPrice')){
        e.stopPropagation();  //阻止事件冒泡
        //  alert(JSON.stringify(item));
        // window.location.href = base_url+"/parts/getEventDetail/"+item.id;
        courseItem = item;
        $("#selectItem").click();

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







