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
       
       
    }, 
    {
        title:'年级',
        name:'property',
        width:'',
        align: 'center',
    },    
    {
        title:'班级',
        name:'school_part',
        width:'',
        align: 'center',
        
    },
    {
        title:'账号',
        name:'province',
        width:'',
        align: 'left',
        renderer:function(val,item){
            return item.province.name+'.'+item.city.name+'.'+item.district.name;
        }
    },
    {
        title:'状态',
        name:'is_serviceSchool',
        width:'',
        align: 'center',
        
    },
    {
        title: '操作', name: '',
        width: 300,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val,item) {
            return item.operationButton;
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
    url: base_url+'/students/getSchoolList',//调取school
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
    if($(e.target).is('.btn-info, .btnPrice')){
        e.stopPropagation();  //阻止事件冒泡
        userItem = item;
        $("#region_settings").click();


    }else if($(e.target).is('.btn-danger') && confirm('你确定要删除该行记录吗?')){
        e.stopPropagation(); //阻止事件冒泡
        $.ajax({
                type: "POST",
                async: false,
                 url:  base_url+'/regions/DeleteRegion/',
                 data: {
                 region_id: item.id
        },
        success: function (msg) {
            retisterLimitTip("删除成功");
            mmg.load();
        }
    });
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







