/**
 * Created by xhdong on 16/7/1.
 */
    $(document).ready(function(){
        var firsticon = $(".aw-side ul li i.fa");
        firsticon.click(function(){
            var _this = $(this);
            ul = _this.parents('ul li').find('.secondmenu');
            if(ul.hasClass('submenu')) {
                ul.slideUp().removeClass('submenu');
                _this.attr('class', 'fa fa-2x fa-angle-right')
            }else {
                ul.slideDown().addClass('submenu');
                _this.attr('class', 'fa fa-2x fa-angle-down')
            }
        })
    })