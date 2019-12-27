;(function($){
    var wePlatFormSlider = function(o, options){
        this.o = o;
        this.options = $.extend({}, wePlatFormSlider.options, options);
        this.ul = this.options.ul;
        this.li = this.options.li;
        this.margin = this.options.margin;
        this.visualNum = Math.ceil(this.o.outerWidth() / (this.li.outerWidth() + this.margin));
        this.pager = this.options.pager;
        this.control = this.options.control;
        this.timer = null;
        this.index = 0;
        this.init();
    };
    wePlatFormSlider.prototype = {
        init: function() {
            this.draw();
        },
        draw: function() {
            var _this = this;

            this.ul.css({
                width: (this.li.outerWidth() + this.margin) * this.li.length
            });
            if (this.pager && this.pager == true) {
                this.createPager();
            }
            if (this.control && this.control == true) {
                this.createControl();
            }
            if (this.li.length > this.visualNum) {
                this.autoplay();
                this.o.hover(function(){
                    clearInterval(_this.timer);
                }, function() {
                    _this.autoplay();
                })
            }
        },
        createPager: function() {
            var _this = this, pager = "", pagerLength;
            pagerLength = Math.ceil(this.li.length / this.visualNum);
            pager += "<ul class='pager'>";
            for(var i = 0, len = pagerLength; i < len; i++) {
                if (i == 0) {
                    pager += '<li class="active"><a href="javascript:;">' + i + '</a></li>'
                } else {
                    pager += '<li><a href="javascript:;">' + i + '</a></li>'
                }
            }
            pager += "</ul>";
            if (!this.o.has('.pager').length && (this.li.length > this.visualNum)) {
                this.o.append(pager);
            }
            $(".pager li").hover(function() {
                var index = $(this).index();
                $(this).addClass('active').siblings().removeClass('active');
                _this.play(index);

            })
        },
        createControl: function() {
            var html = '', _this = this;
            html += "<div class='control'>";
            html += "<a href='javascript:;' class='btn-control btn-prev disabled'><</a>";
            html += "<a href='javascript:;' class='btn-control btn-next'>></a>";
            html += "</div>";
            if (!this.o.has('.control').length && (this.li.length > this.visualNum)) {
                this.o.append(html);
                $(".control .btn-prev").on('click', function(){
                    $(".control").find(".btn-next").removeClass('disabled');
                    _this.index--;
                    _this.prevPage();
                    if(_this.index == 0) {
                        $(this).addClass('disabled');
                        return false;
                    }
                });
                $(".control .btn-next").on('click', function(){
                    $(".control").find(".btn-prev").removeClass('disabled');
                    _this.index++;
                    _this.nextPage();
                    if(_this.index == Math.ceil(_this.li.length / _this.visualNum)-1) {
                        _this.index = 0;
                        $(this).addClass('disabled');
                        return false;
                    }
                });
            }
        },
        play: function(index) {
            var left = (this.li.outerWidth() + 10) * this.visualNum * index;
            this.ul.stop().animate({
                left: -left
            })
        },
        prevPage () {
            if (this.index < 0) {
                this.index = 0;
            }
            this.play(this.index);
        },
        nextPage() {
            if (this.index == Math.ceil(this.li.length / this.visualNum)) {
                this.index = 0;
            }
            this.play(this.index);
        },
        autoplay: function() {
            clearInterval(this.timer);
            var _this = this;
            this.timer = setInterval (function() {
                _this.index++;
                $(".pager li").eq(_this.index).addClass('active').siblings().removeClass('active');
                _this.nextPage();
                if (_this.index > 0 || _this.index == Math.ceil(_this.li.length / _this.visualNum) - 1) {
                    $(".control").find(".btn-prev").removeClass('disabled');
                    $(".control").find(".btn-next").addClass('disabled');
                    return false;
                } else if (_this.index <= 0) {
                    $(".control").find(".btn-prev").addClass('disabled');
                    $(".control").find(".btn-next").removeClass('disabled');
                }
            }, 4000)
        }
    };
    $.fn.wePlatFormSlider = function (option) {
        this.each(function () {
            var $this = $(this), options = typeof option == 'object' && option;
            new wePlatFormSlider($this, options)
        })
    };
})(jQuery);