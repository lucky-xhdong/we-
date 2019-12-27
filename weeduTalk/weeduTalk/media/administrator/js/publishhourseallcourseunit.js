
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
        title:'单元名称',
        name:'name',
        width:80,
        align: 'center',
        renderer:function(val,item){
            return val;
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
        title: '操作', name: '',
        width: 200,
        align: 'center',
        lockWidth: true,
        lockDisplay: true,
        renderer: function (val,item) {
            return '<button  class="btn btn-success">导入</button>'
            //if(item.hasUnit == false) return '<button  class="btn btn-success">导入</button>';
            //else  return '<button  class="btn btn-default" disabled>已导入</button>';
        }
    }

];
var mmGridunit = null;
function getmmGridunit(){
    mmGridunit = $('#mmGridunit').mmGrid({
        indexCol: true,
        indexColWidth: 25,
        checkCol: true,
        multiSelect: true,
        sortName: 'id',
        sortStatus: 'asc',
        height: 'auto',
        cols: tItem,
        url: base_url+'/publishing_houses/getAllCourseUnitList/'+course_id,
        method: 'get',
        params:{

        },
        root: 'items',
        fullWidthRows:true,
        nowrap: true,
        plugins : [
            $('#paginatorunit').mmPaginator({limitList: [5,10,20,30,50,100]})
        ]
    }).on('loadSuccess', function(e, data){
        $(data.items).each(function(index,lesson){
            //if(lesson.hasUnit == false){
            //    mmGridunit.deselect(index);
            //}else{
            //    mmGridunit.select(index);
            //}
        });
    }).on('cellSelected', function(e, item, rowIndex, colIndex,check){
        if($(e.target).is('.btn-success')){
            e.stopPropagation();  //阻止事件冒泡
            UnitItem = item;
            importUnit();
        }
    }).on('cellSelectedCheck', function(e, item, rowIndex, colIndex,check){

    });
}








