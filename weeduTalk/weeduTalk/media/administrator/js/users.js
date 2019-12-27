
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
            return val;
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
        title:'授权课程数量',
        name:'course_count',
        width:'',
        align: 'center',
        sortable: true
    },
    {
        title:'授权时间',
        name:'beginDateString',
        width:200,
        align: 'center'
    },
    {
        title:'状态',
        name:'blockString',
        width:'',
        align: 'center'
    },
    {
        title: '操作', name: '',
        width: 400,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val) {
            return '<button  class="btn btn-primary"> 解锁课程</button> <button  class="btn btn-warning"> 停用/恢复</button>  <button  class="btn btn-success">授权时间</button> <button  class="btn btn-info">编辑</button> <button  class="btn btn-danger">删除</button>'
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
    url: base_url+'/AccountManage/getClassFollowerList',
    method: 'get',
    cache:true,
    params:{
         school_id:school_id ,
         grade_id:grade_id,
         class_id:class_id,
         type:user_type
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
                  userid: item.id,
                  school_id: school_id,
                  class_id:class_id
            },
            success: function (msg) {
                retisterLimitTip("设置成功");
                mmg.load();
            }
    });
    }else if($(e.target).is('.btn-warning') && confirm('你确定要执行此操作吗')){
        e.stopPropagation(); //阻止事件冒泡
        $.ajax({
                type: "POST",
                async:false,
                url: base_url+'/AccountManage/setUserBlock',
                data: {
                    userid:item.id,
                    block:item.block==1?0:1,
                },
            success: function (msg) {
                retisterLimitTip("设置成功");
                mmg.load();
            }
         });

    }else if($(e.target).is('.btn-success')){
        e.stopPropagation(); //阻止事件冒泡
        userItem = item;
        $("#give-time-school").click();

    }else if($(e.target).is('.btn-primary')){
        e.stopPropagation(); //阻止事件冒泡
        userItem = item;
        $("#unchian").click();
        getCourseList();

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







