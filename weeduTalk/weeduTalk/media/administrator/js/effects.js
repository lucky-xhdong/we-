(function ($, doc, win) {
    $.fn.charts = function (opts) {
        var args = {
                lineChartData: "",
                radarChartData: "",
                pieChartData: "",
                polarAreaChartData: "",
                doughnutChartData: "",
                graphInitDelay: 300,
                globalGraphSettings: { animation: Modernizr.canvas }
            }, inviewObjects = {}, viewportSize, viewportOffset,
            documentElement = doc.documentElement,
            expando = $.expando;
        if (!opts && Object.prototype.toString().call(opts) != '[object object]') {
            return;
        }
        args = $.extend({}, args, opts);

        $.event.special.inview = {
            add: function (data) {
                inviewObjects[data.guid + "-" + this[expando]] = {data: data, $element: $(this)};
            },
            remove: function (data) {
                try {
                    delete inviewObjects[data.guid + "-" + this[expando]];
                } catch (e) {
                }
            }
        };

        //var data = {
        //    labels : ["Eating","Drinking","Sleeping","Designing","Coding","Partying","Running"],
        //    datasets : [
        //        {
        //            fillColor : "rgba(220,220,220,0.5)",
        //            strokeColor : "rgba(220,220,220,1)",
        //            pointColor : "rgba(220,220,220,1)",
        //            pointStrokeColor : "#fff",
        //            data : [65,59,90,81,56,55,40]
        //        },
        //        {
        //            fillColor : "rgba(151,187,205,0.5)",
        //            strokeColor : "rgba(151,187,205,1)",
        //            pointColor : "rgba(151,187,205,1)",
        //            pointStrokeColor : "#fff",
        //            data : [28,48,40,19,96,27,100]
        //        }
        //    ]
        //}

        var method = {
            showLineChart: function () {
                var ctx = document.getElementById("lineChartCanvas").getContext("2d");
                new Chart(ctx).Line(args.lineChartData, args.globalGraphSettings);
            },
            showRadarChart: function () {
                var ctx = document.getElementById("radarChartCanvas").getContext("2d");
                new Chart(ctx).Radar(args.radarChartData, args.globalGraphSettings);
            },
            showPieChart: function () {
                var ctx = document.getElementById("pieChartCanvas").getContext("2d");
                new Chart(ctx).Pie(args.pieChartData, args.globalGraphSettings);
            },
            showPolarAreaChart: function () {
                var ctx = document.getElementById("polarAreaChartCanvas").getContext("2d");
                new Chart(ctx).PolarArea(args.polarAreaChartData, args.globalGraphSettings);
            },
            showDoughnutChart: function () {
                var ctx = document.getElementById("doughnutChartCanvas").getContext("2d");
                new Chart(ctx).Doughnut(args.doughnutChartData, {
                    percentageInnerCutout: 70
                });
            },
            getViewportSize: function () {
                var mode, domObject, size = {height: win.innerHeight, width: win.innerWidth};
                // if this is correct then return it. iPad has compat Mode, so will
                // go into check clientHeight/clientWidth (which has the wrong value).
                if (!size.height) {
                    mode = doc.compatMode;
                    if (mode || !$.support.boxModel) { // IE, Gecko
                        domObject = mode === 'CSS1Compat' ?
                            documentElement : // Standards
                            doc.body; // Quirks
                        size = {
                            height: domObject.clientHeight,
                            width: domObject.clientWidth
                        };
                    }
                }
                return size;
            },
            getViewportOffset: function () {
                return {
                    top: win.pageYOffset || documentElement.scrollTop || doc.body.scrollTop,
                    left: win.pageXOffset || documentElement.scrollLeft || doc.body.scrollLeft
                };
            },
            checkInView: function () {
                var $elements = $(), elementsLength, i = 0;

                $.each(inviewObjects, function (i, inviewObject) {
                    var selector = inviewObject.data.selector,
                        $element = inviewObject.$element;
                    $elements = $elements.add(selector ? $element.find(selector) : $element);
                });

                elementsLength = $elements.length;
                if (elementsLength) {
                    viewportSize = viewportSize || method.getViewportSize();
                    viewportOffset = viewportOffset || method.getViewportOffset();

                    for (; i < elementsLength; i++) {
                        // Ignore elements that are not in the DOM tree
                        if (!$.contains(documentElement, $elements[i])) {
                            continue;
                        }

                        var $element = $($elements[i]),
                            elementSize = {height: $element.height(), width: $element.width()},
                            elementOffset = $element.offset(),
                            inView = $element.data('inview'),
                            visiblePartX,
                            visiblePartY,
                            visiblePartsMerged;

                        // Don't ask me why because I haven't figured out yet:
                        // viewportOffset and viewportSize are sometimes suddenly null in Firefox 5.
                        // Even though it sounds weird:
                        // It seems that the execution of this function is interferred by the onresize/onscroll event
                        // where viewportOffset and viewportSize are unset
                        if (!viewportOffset || !viewportSize) {
                            return;
                        }

                        if (elementOffset.top + elementSize.height > viewportOffset.top &&
                            elementOffset.top < viewportOffset.top + viewportSize.height &&
                            elementOffset.left + elementSize.width > viewportOffset.left &&
                            elementOffset.left < viewportOffset.left + viewportSize.width) {
                            visiblePartX = (viewportOffset.left > elementOffset.left ?
                                'right' : (viewportOffset.left + viewportSize.width) < (elementOffset.left + elementSize.width) ?
                                'left' : 'both');
                            visiblePartY = (viewportOffset.top > elementOffset.top ?
                                'bottom' : (viewportOffset.top + viewportSize.height) < (elementOffset.top + elementSize.height) ?
                                'top' : 'both');
                            visiblePartsMerged = visiblePartX + "-" + visiblePartY;
                            if (!inView || inView !== visiblePartsMerged) {
                                $element.data('inview', visiblePartsMerged).trigger('inview', [true, visiblePartX, visiblePartY]);
                            }
                        } else if (inView) {
                            $element.data('inview', false).trigger('inview', [false]);
                        }
                    }
                }
            }
        }

        //Set up each of the inview events here.
        $("#lineChart").on("inview", function () {
            var $this = $(this);
            $this.removeClass("hidden").off("inview");
            setTimeout(method.showLineChart, args.graphInitDelay);
        });

        $("#radarChart").on("inview", function () {
            var $this = $(this);
            $this.removeClass("hidden").off("inview");
            setTimeout(method.showRadarChart, args.graphInitDelay);
        });

        $("#pieChart").on("inview", function () {
            var $this = $(this);
            $this.removeClass("hidden").off("inview");
            setTimeout(method.showPieChart, args.graphInitDelay);
        });

        $("#polarAreaChart").on("inview", function () {
            var $this = $(this);
            $this.removeClass("hidden").off("inview");
            setTimeout(method.showPolarAreaChart, opts.graphInitDelay);
        });

        $("#doughnutChart").on("inview", function () {
            var $this = $(this);
            $this.removeClass("hidden").off("inview");
            setTimeout(method.showDoughnutChart, args.graphInitDelay);
        });


        $(win).bind("scroll resize", function () {
            viewportSize = viewportOffset = null;
        });

        // IE < 9 scrolls to focused elements without firing the "scroll" event
        if (!documentElement.addEventListener && documentElement.attachEvent) {
            documentElement.attachEvent("onfocusin", function () {
                viewportOffset = null;
            });
        }

        // Use setInterval in order to also make sure this captures elements within
        // "overflow:scroll" elements or elements that appeared in the dom tree due to
        // dom manipulation and reflow
        // old: $(window).scroll(checkInView);
        //
        // By the way, iOS (iPad, iPhone, ...) seems to not execute, or at least delays
        // intervals while the user scrolls. Therefore the inview event might fire a bit late there
        setInterval(method.checkInView, 250);
    }

})(jQuery, document, window)


