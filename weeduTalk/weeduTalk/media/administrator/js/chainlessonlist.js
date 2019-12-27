
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
        width:'',
        align: 'center',
        renderer:function(val){
            return '<img src="'+val+'" height="70px"/>'
        }
    },
    {
        title:'名称',
        name:'name',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return val;
        }
    },
    {
        title:'描述',
        name:'description',
        width:'',
        align: 'center',
    }

];
var lessonList = null;
function getLessonList(unit_id,user_id){
     lessonList = $('#lessonList').mmGrid({
        indexCol: true,
        indexColWidth: 25,
        checkCol: true,
        multiSelect: true,
        sortName: 'id',
        sortStatus: 'asc',
        height: 'auto',
        cols: tItem,
        url: base_url+'/AccountManage/getLessonList/',
        method: 'get',
        params:{
            unit_id:unit_id,
            user_id:user_id
        },
        root: 'items',
        fullWidthRows:true,
        nowrap: true,
        plugins : [
            $('#paginatorlesson').mmPaginator({limitList: [100]})
        ]
    }).on('loadSuccess', function(e, data){
         console.log(data);
         $(data.items).each(function(index,lesson){
             console.log(lesson.lessonLock);
             if(lesson.lessonLock === false){
                 lessonList.select(index);
             }else{
                 lessonList.deselect(index);
             }
         });
    }).on('cellSelected', function(e, item, rowIndex, colIndex,check){
        console.log(check); console.log(rowIndex); console.log(colIndex); console.log(e);
         if($(e.target).is('.btn-info, .btnPrice')){
             e.stopPropagation();  //阻止事件冒泡
           //  alert(JSON.stringify(item));
         }else if($(e.target).is('.btn-danger') && confirm('你确定要删除该行记录吗?')){
             e.stopPropagation(); //阻止事件冒泡
             $.ajax({
                 type : "GET",  //提交方式
                 url : base_url+'/fileupload/removeFile/'+item.id,//路径
                 dataType:"json",
                 success:function(result) {//返回数据根据结果进行相应的处理
                     fileList.removeRow(rowIndex);
                 }
             });
         }else if($(e.target).is('.btn-success')){
             e.stopPropagation(); //阻止事件冒泡
             //alert(1);
             file = item;
             $("#fileeditupload").click();

         }else if($(e.target).is('.btn-primary')){
             e.stopPropagation();  //阻止事件冒泡

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
}







