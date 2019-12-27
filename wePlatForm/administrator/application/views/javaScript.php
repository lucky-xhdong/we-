<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2016/12/3
 * Time: 12:08
 * JS引入
 */
?>
<script type="text/javascript" src="<?=base_url()?>media/administrator/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>


<script type="text/javascript" src="<?=base_url()?>media/administrator/js/develop.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/chart.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/modernizr.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/effects.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/excanvas.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/ui-load.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/ui-jp.config.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/ui-jp.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/ui-nav.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/ui-toggle.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/ui-client.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/esl.js"></script>


<script>
    $(function(){
//      列表样式
        $(".text-info-lter").hide();
        $('table').find('tr').mouseover(function() {
            $(this).find(".text-info-lter").show();
        });
        $('table').find('tr').mouseout(function() {
            $(this).find(".text-info-lter").hide();
        });
        <!-- 浏览器判断 -->
        if(BrowserType()== "IE8"){
            placeholder();
            $(".mask").addClass("line dk").removeClass("mask");
        }else if(BrowserType()== 'IE7'||BrowserType()== 'IE6'||BrowserType()== 'IE5'){
            alert('浏览器版本过低，请升级或更换浏览器后进行访问');
            window.location.href('http://112.124.2.173/weeduTalk/administrator/index.php/login');
        }
    });
</script>
<!-- 初始化Echart -->
<script>
    require.config({
        paths:{
            echarts:'<?=base_url()?>media/administrator/js/echarts',
            'echarts/chart/bar' : '<?=base_url()?>media/administrator/js/echarts-map',
            'echarts/chart/line': '<?=base_url()?>media/administrator/js/echarts-map',
            'echarts/chart/map' : '<?=base_url()?>media/administrator/js/echarts-map'
        }
    });
</script>
<script>
    //列表样式
    require(
        [
            'echarts',
            'echarts/chart/bar',
            'echarts/chart/line',
            'echarts/chart/map'
        ],
        function(ec) {
            //--- 折柱 ---
            var myChart = ec.init(document.getElementById('radarChart'));
            myChart.setOption({
                color : (function (){
                    var zrColor = require('zrender/tool/color');
                    return zrColor.getStepColors('yellow', 'red', 28);
                })(),
                title : {
                    text: '浏览器占比变化',
                    subtext: '纯属虚构',
                    x:'right',
                    y:'bottom'
                },
                tooltip : {
                    trigger: 'item',
                    backgroundColor : 'rgba(0,0,250,0.2)'
                },
                legend: {
                    // orient : 'vertical',
                    //x : 'center',
                    data: function (){
                        var list = [];
                        for (var i = 1; i <=28; i++) {
                            list.push(i + 2000);
                        }
                        return list;
                    }()
                },
                toolbox: {
                    show : true,
                    orient : 'vertical',
                    y:'center',
                    feature : {
                        mark : {show: true},
                        dataView : {show: true, readOnly: false},
                        restore : {show: true},
                        saveAsImage : {show: true}
                    }
                },
                polar : [
                    {
                        indicator : [
                            { text: 'IE8-', max: 400},
                            { text: 'IE9+', max: 400},
                            { text: 'Safari', max: 400},
                            { text: 'Firefox', max: 400},
                            { text: 'Chrome', max: 400}
                        ],
                        center : ['50%', 240],
                        radius : 150
                    }
                ],
                calculable : false,
                series : (function (){
                    var series = [];
                    for (var i = 1; i <= 28; i++) {
                        series.push({
                            name:'浏览器（数据纯属虚构）',
                            type:'radar',
                            symbol:'none',
                            itemStyle: {
                                normal: {
                                    lineStyle: {
                                        width:1
                                    }
                                },
                                emphasis : {
                                    areaStyle: {color:'rgba(0,250,0,0.3)'}
                                }
                            },
                            data:[
                                {
                                    value:[
                                        (40 - i) * 10,
                                        (38 - i) * 4 + 60,
                                        i * 5 + 10,
                                        i * 9,
                                        i * i /2
                                    ],
                                    name:i + 2000
                                }
                            ]
                        })
                    }
                    return series;
                })()
            });
        }
    );


</script>