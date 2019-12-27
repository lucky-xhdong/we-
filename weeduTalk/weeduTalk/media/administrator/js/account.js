
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
            return "<img src='"+val+"' height='80px'/>";
        }
    },
    {
        title:'姓名',
        name:'name',
        width:200,
        align: 'center',
        renderer:function(val,item){
            var string = "<input class='studentname' value='"+val+"' name='name' style='width: 100px;'>";
            return string + '   <button  class="btn btn-info">保存</button>';
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
        name:'user_type',
        width:'',
        align: 'center',
        type: 'number',
        sortable: true,
        renderer:function(val){
            if(val == "teacher") return "教师";
            else return "学生";
        }
    },

    {
        title:'所属区域',
        name:'RegionName',
        width:'',
        align: 'center',
        sortable: true
    },
    {
        title:'学校',
        name:'schoolName',
        width:200,
        align: 'center'
    },
    {
        title:'年级',
        name:'GradeName',
        width:'',
        align: 'center'
    },
    {
        title:'班级',
        name:'ClassName',
        width:'',
        align: 'center'
    },
    {
        title:'注册时间',
        width: 150,
        name:'registerDate',
        align: 'center'
    },
    {
        title:'最后登录日期',
        width: 150,
        name:'lastvisitDate',
        align: 'center'
    },
    {
        title:'状态',
        name:'status',
        align: 'center',
        renderer: function (val) {
            if (val ==1) {
                return '<span style="color: blue">正常</span>';
            } else if (val == 0) {
                return '<span style="color: red">已删除</span>';
            }
        }
    },
    {
        title: '操作', name: '',
        width: 150,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val) {
            return '<button  class="btn btn-danger">删除</button> <button  class="btn btn-primary"> 重置密码 </button> '
        }
    }

];

var mmg = $('#mmGrid').mmGrid({
    indexCol: true,
    indexColWidth: 25,
    checkCol: true,
    multiSelect: true,
    sortName: 'id',
    sortStatus: 'asc',
    height: 'auto',
    cols: tItem,
    url: base_url+'/account/getClassFollowerList',
    method: 'get',
    cache:true,
    params:{
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
        var name = $(e.target).parents("tr").find(".studentname").val();
        $.ajax({
            type : "POST",  //提交方式
            url : base_url+'/account/updateUserName/'+item.id,//路径
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

    }else if($(e.target).is('.btn-primary') && confirm('你确定要重置密码到123456吗?')) {
        e.stopPropagation(); //阻止事件冒泡
        $.ajax({
            type: "POST",
            async: false,
            url: base_url + '/account/resetPassword/',
            data: {
                user_ids: item.id,
            },
            success: function (msg) {
                retisterLimitTip("设置成功");
                mmg.load();
            }
        });
    }else if($(e.target).is('.btn-danger') && confirm('你确定要删除该行记录吗?')) {
        e.stopPropagation(); //阻止事件冒泡

        $.ajax({
            type: "POST",
            async: false,
            url: base_url + '/AccountManage/DeleteUserSchoolRelationShip/',
            data: {
                userid: item.id
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







