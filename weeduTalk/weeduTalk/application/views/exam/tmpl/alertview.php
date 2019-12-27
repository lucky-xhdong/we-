<div class="djs-wrapper">
    <div class="djs-con pos-abs">
        <p id="remindTime" class="countdown" data-before="温馨提示：距离考试开始时间还有">
            <span><i id="alertday"></i> 天</span>
            <span><i id="alerthours"></i> 时</span>
            <span><i id="alertminutes"></i> 分</span>
            <span><i id="alertseconds"></i> 秒</span>
        </p>
        <div class="djs-btn text-center">
            <a href="javascript:;" class="btn-sure">确认</a>
            <a href="javascript:;" class="btn-cancel">取消</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        //倒计时
        function GetRTime(){
            var EndTime= new Date('2017-10-25 23:58:00'.replace(/-/g, "/")); //截止时间
            var NowTime = new Date();
            var t = EndTime.getTime() - NowTime.getTime();
            if(t <= 0){
                $("#alertday,#alerthours,#alertminutes,#alertseconds").html('00');
                clearInterval(timmer);
            }else{
                var d=Math.floor(t/1000/60/60/24);
                var h=Math.floor(t/1000/60/60%24);
                var m=Math.floor(t/1000/60%60);
                var s=Math.floor(t/1000%60);
                if(s < 10){
                    s = '0'+s;
                }
                if(m < 10){
                    m = '0'+m;
                }
                if(h < 10){
                    h = '0'+h;
                }

                if(d==0){
                    $("#alertday").parent('span').hide();
                }else if(d<10){
                    d = '0'+d;
                }
                var string = h+':'+m+':'+s;
                $("#alertday").html(d);
                $("#alerthours").html(h);
                $("#alertminutes").html(m);
                $("#alertseconds").html(s);
            }
        }
        var timmer = setInterval(GetRTime,1000);

    });
</script>  