
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
        name:'file_url',
        width:'',
        align: 'center',
        renderer:function(val){
            return '<img src="'+val+'" height="70px"/>'
        }
    },
    {
        title:'名称',
        name:'orig_name',
        width:'',
        align: 'center',
        renderer:function(val,item){
            return '<a href="javascript:;">'+val+'</a>'
        }
    },
    {
        title:'运用属性',
        name:'tag',
        width:'200',
        align: 'center',
        renderer:function(val,item){

            var tagsArray  = ["common","menu"];
            var string = "<select class='fileTag' name='fileTag' style='width: 100px;'>";
            for(var i = 0;i<tagsArray.length;i++){
                if(val == tagsArray[i]){
                    string += "<option value='"+tagsArray[i]+"' selected>"+tagsArray[i]+"</option>";
                }else{
                    string += "<option value='"+tagsArray[i]+"'>"+tagsArray[i]+"</option>";
                }
            }
            string += "</select>";
            return string + '   <button  class="btn btn-primary">保存</button>';
        }
    },
    {
        title:'上传时间',
        name:'created_time',
        width:'',
        align: 'center',
    },
    {
        title:'类型',
        name:'type',
        width:'',
        align: 'center',
        renderer:function(val,item){
            if(val == "image"){
                return "图片";
            }else if(val == "audio"){
                return "音频";
            }else{
                return "视频";
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
            return '<button  class="btn btn-success">修改</button> <button  class="btn btn-danger">删除</button>'
        }
    }

];
var fileList = null;
function getFileList(multiSelect){
     fileList = $('#fileList').mmGrid({
        indexCol: true,
        indexColWidth: 25,
        checkCol: true,
        multiSelect: multiSelect,
        sortName: 'id',
        sortStatus: 'asc',
        height: 'auto',
        cols: tItem,
        url: base_url+'/courses/getfilelist/'+lesson_id+'/'+media_type,
        method: 'get',
        params:{

        },
        root: 'items',
        fullWidthRows:true,
        nowrap: true,
        plugins : [
            $('#paginatorFile').mmPaginator({limitList: [5,20, 30, 40, 50]})
        ]
    }).on('loadSuccess', function(e, data){

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
             // console.log($(e.target));
             var tag = $(e.target).parents("tr").find(".fileTag").val();
             $.ajax({
                 type : "POST",  //提交方式
                 url : base_url+'/fileupload/updateFile/'+item.id,//路径
                 data:{
                     "tag":tag
                 },
                 dataType:"json",
                 beforeSend:function(){
                     $(e.target).showLoading();
                 },
                 success: function (data){
                     $(e.target).hideLoading();
                     retisterLimitTip("保存成功");
                 }
             });

             //  alert(JSON.stringify(item));
             //更新图片
             //$("#selectImage").click();
             //eventItem = item;
             //保存当前数据
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







