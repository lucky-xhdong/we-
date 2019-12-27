// oldInd =0;
function tabBox(option){
    var className = option.box || '.tab-box',
        box = $(className),
        carousel = option.carousel || false,
        child = option.children || false,
        titItem,conItem,timer,len,ind = 0;
    box.each(function(){
        var _this = $(this);
        titItem = _this.find('.tab-tit').children();
        len = titItem.length;
        titItem.click(function(){
            // var parent = $(this).parents(className);
            titItem = _this.find('.tab-tit').children();
            conItem = _this.find('.tab-con').children();
            ind = $(this).index();
            if(child){
                var elInd = conItem.eq(ind).find('.hovItem').children('li.active').index();
                fnHover(elInd)
            }
            titItem.removeClass('active').eq(ind).addClass('active');
            conItem.removeClass('active').eq(ind).addClass('active');
        });
        if(carousel && len>1){
            start();
            box.hover(function(){
                clearInterval(timer);
            },function(){
                start();
            })
        }
    });
    function start(){
        timer = setInterval(function(){
            ind++;
            if(ind == len ){
                ind = 0;
            }
            titItem.eq(ind).trigger('click');
        },3000)
    };

};

function fnHover(num){
    var hovItme = $('.hovItem').children(),
        ind = 0,oldInd = num,
        showCon,parent;
    hovItme.hover(function(){
        ind = $(this).index();
        parent = $(this).parents('.hoverBox');
        showCon = parent.find('.showCon').children();
        if(ind !== oldInd){
            $(this).addClass('active').siblings().removeClass('active');
            showCon.eq(ind).addClass('active').siblings().removeClass('active');
            oldInd = ind;
            console.log('oldInd:'+oldInd);
        }
    },function(){})
}



