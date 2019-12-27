//学校表单数据渲染。

var highliht = function(val) {
    if (val > 0) {
        return '<span style="color: #b00">' + fixed2(val) + '</span>';
    } else if (val < 0) {
        return '<span style="color: #0b0">' + fixed2(val) + '</span>';
    }
    return fixed2(val);
};

var highliht2 = function(val,fuhao) {
    if (val < 60) {
        return '<span style="color: #FE2400">' + val +''+fuhao +'</span>';
    } else if (val < 80) {
        return '<span style="color: #F99A05">' + val +''+fuhao +'</span>';
    }else{
        return '<span style="color: #59CA4A">' + val +''+fuhao +'</span>';
    }
    return fixed2(val);
};
var tItemSchools = [
    {
        title:'头像',
        name:'avatar_url',
        width:'',
        align: 'left',
        renderer: function (val) {
            return '<img src="'+val+'" width="50px" />';
        }
    },
    {
        title:'姓名',
        name:'name',
        width:'',
        align: 'left',
    },
    {
        title:'最后一次学习内容',
        name:'lastStudyPart',
        width:400,
        align: 'left',
        renderer: function (val) {
            return '<span style="color:blue">' + val + '</span>';
        }

    },
    //{
    //    title:'课程进度',
    //    name:'course_rate',
    //    width:'',
    //    align: 'center',
    //    renderer: function (val) {
    //        return highliht2(val,"%");
    //    }
    //},
    //{
    //    title:'单元进度',
    //    name:'unit_rate',
    //    width:'',
    //    align: 'center',
    //
    //},
    {
        title:'总天数',
        name:'day_count',
        width:'',
        align: 'left',
    },
    {
        title:'总学时',
        name:'study_count',
        width:'',
        align: 'center',
        
    },
    {
        title:'周学习天数',
        name:'weekStudy_count',
        width:'',
        align: 'left',
        
    },
    {
        title:'首次单元测试成绩',
        name:'firstMtScore',
        width:200,
        align: 'left',
        renderer: function (val) {
            return highliht2(val,"");
        }

    },
    {
        title:'末次单元测试成绩',
        name:'lastMtScore',
        width:200,
        align: 'left',
        renderer: function (val) {
            return highliht2(val,"");
        }

    },
    {
        title: '操作', name: '',
        width: 150,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val,item) {
            return '<a  class=" btn-normal btn-init" href="javascript:;">初始化密码</a>';
        }
    }

    

];

var classData = null;

function getClassDataList(class_id){
    classData = $('#region_classData_List').mmGrid({
        indexCol: true,
        indexColWidth: 30,
        checkCol: true,
        multiSelect: false,
        sortName: 'id',
        sortStatus: 'asc',
        height: 'auto',
        cols: tItemSchools,
        url: base_url+'/analysis/getClassUserLearningProgressDataList/',//调取school
        method: 'get',
        params:{
            class_id:class_id
        },
        root: 'items',
        fullWidthRows:true,
        nowrap: true,
        plugins : [
            $('#paginator_region_classData_List').mmPaginator({limitList: [10,20,30,50]})
        ]
    }).on('loadSuccess', function(e, data){

    }).on('cellSelected', function(e, item, rowIndex, colIndex,check){
        console.log($(e.target));
        if($(e.target).is('.btn-info, .btnPrice')){
            e.stopPropagation();  //阻止事件冒泡

        }else if($(e.target).is('.btn-init') && confirm('确定要重置密码吗? 重置后密码为123456')){
            e.stopPropagation(); //阻止事件冒泡
            $.ajax({
                    type: "GET",
                    url:base_url+'/analysis/initAccountPassword/'+item.user_id,
                beforeSend:function(){
                $("#region_classData_List").showLoading();
            },
            success: function (data){
                $("#region_classData_List").hideLoading();
                retisterLimitTip("初始化密码成功");
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

}






