//学校表单数据渲染。

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
        title:'学生姓名',
        name:'name',
        width:'',
        align: 'left',
        renderer:function(val,item){
            return val;
        }
    },
    {
        title:'年级',
        name:'gradename',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return val;
        }
    },
    {
        title:'班级',
        name:'classname',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return val;
        }
    },
    {
        title:'账号',
        name:'username',
        width:'',
        align: 'left',
        renderer:function(val,item){
            return val;
        }
    },
    {
        title:'状态',
        name:'status',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return val == "1" ? "正常" : "冻结";
        }

    },
    {
        title: '操作', name: '',
        width: 300,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val,item) {
            if (item.status == '1') {
                return '<a class=" btn-normal btn-check" href="javascript:;">查看</a> <a  class=" btn-normal btn-edit" href="javascript:;">编辑</a> <a  class=" btn-normal btn-freeze" href="javascript:;">冻结</a> <a  class=" btn-normal btn-init" href="javascript:;">初始化密码</a>';
            }
            return '<a  class=" btn-normal btn-check" href="javascript:;">查看</a> <a  class=" btn-normal btn-edit" href="javascript:;">编辑</a> <a  class=" btn-normal btn-freeze" href="javascript:;">激活</a> <a  class=" btn-normal btn-init" href="javascript:;">初始化密码</a>';
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
    url: base_url+'/schools/getSchoolStudentList/'+school_id,//调取school
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
    if($(e.target).is('.btn-check')){
        e.stopPropagation();  //阻止事件冒泡
        userItem = item;
        $("#student_check").modal('show');
    }else if($(e.target).is('.btn-freeze') && confirm('你确定要操作此账号吗?')){
        e.stopPropagation(); //阻止事件冒泡
        userItem = item;
        $("#student_freeze").click();
    }else if($(e.target).is('.btn-init') && confirm('你确定要初始化此账号密码吗?')){
        e.stopPropagation(); //阻止事件冒泡
        userItem = item;
        $("#student_initpassword").click();
    }else if($(e.target).is('.btn-warning') && confirm('你确定要执行此操作吗')){
        e.stopPropagation(); //阻止事件冒泡
        $.ajax({
            type: "POST",
            async:false,
            url: base_url+'/regions/setRegionBlock',
            data: {
                region_id:item.id,
                status:item.status==1?0:1,
            },
            success: function (msg){
                retisterLimitTip("设置成功");
                mmg.load();
            }
        });
    }else if($(e.target).is('.schooledit')){
        console.log($(e.target));
        e.stopPropagation(); //阻止事件冒泡
        userItem = item;
        $("#school_settings").click();
    }else if($(e.target).is('.schoolstudent')){
        console.log($(e.target));
        userItem = item;
        e.stopPropagation(); //阻止事件冒泡
        window.location.href = base_url+'/schools/schoolStudent/'+item.id
    }else if($(e.target).is('.schoolteacher')){
        console.log($(e.target));
        e.stopPropagation(); //阻止事件冒泡
        userItem = item;
        window.location.href = base_url+'/schools/schoolTeacher/'+item.id
    }else if($(e.target).is('.upload')){
        console.log($(e.target));
        e.stopPropagation(); //阻止事件冒泡
        userItem = item;
    }else if($(e.target).is('.btn-edit')){
        console.log($(e.target));
        e.stopPropagation(); //阻止事件冒泡
        userItem = item;
        console.log(1);
        $('#user_modal').modal('show');
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







