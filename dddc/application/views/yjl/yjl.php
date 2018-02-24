<!DOCTYPE html>
<html>
<head>
    <title>舟山民宿</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_URL."/yjl/";?>css/calendar.css" >
</head>

<body>
    <div id="checkinout">
        <div id="firstSelect" style="width:100%;">
            <div class="Date_lr" style="float:left;">
                <P>入住</p>
                <input id="startDate" type="text" value=""style="" readonly>
            </div>
            <div class="Date_lr" style="float:right;">
                <p>离店</p>
                <input id="endDate" type="text" value="" style="" readonly>
            </div>
            <span class="span21">共<span class="NumDate">1</span>晚</span>
        </div>
    </div>
    <div class="mask_calendar">
        <div class="calendar"></div>
        <!-- 提示 -->
        <div class="calendar_tishi">请选择离店日期...</div>
    </div>
    <script src="<?php echo STATIC_URL."/"?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL."/yjl/";?>js/date.js"></script>
    <script>
        $(function(){
            $('#firstSelect').on('click',function (e) {
                e.stopPropagation();
                e.preventDefault();
                $('.mask_calendar').show();
            });
            $('.mask_calendar').on('click',function (e) {
                e.stopPropagation();
                e.preventDefault();
                if(e.target.className == "mask_calendar"){
                    $('.calendar').slideUp(200);
                    $('.mask_calendar').fadeOut(200);
                }
            })
            $('#firstSelect').calendarSwitch({
                selectors : {
                    sections : ".calendar"
                },
                index : 4,      //展示的月份个数
                animateFunction : "slideToggle",        //动画效果
                controlDay:true,//知否控制在daysnumber天之内，这个数值的设置前提是总显示天数大于90天
                daysnumber : "90",     //控制天数
                comeColor : "#2EB6A8",       //入住颜色
                outColor : "#2EB6A8",      //离店颜色
                comeoutColor : "#E0F4F2",        //入住和离店之间的颜色
                callback :function(){//回调函数
                    $('.mask_calendar').fadeOut(200);
                    var startDate = $('#startDate').val();  //入住的天数
                    var endDate = $('#endDate').val();      //离店的天数
                    var NumDate = $('.NumDate').text();    //共多少晚
                    
                    console.log(startDate);
                    console.log(endDate);
                    console.log(NumDate);
                    //下面做ajax请求
                },
                comfireBtn:'.comfire'//确定按钮的class或者id
            });
            var b=new Date();
            var ye=b.getFullYear();
            var mo=b.getMonth()+1;
            mo = mo<10?"0"+mo:mo;
            var da=b.getDate();
            da = da<10?"0"+da:da;
            $('#startDate').val(ye+'-'+mo+'-'+da);
            b=new Date(b.getTime()+24*3600*1000);
            var ye=b.getFullYear();
            var mo=b.getMonth()+1;
            mo = mo<10?"0"+mo:mo;
            var da=b.getDate();
            da = da<10?"0"+da:da;
            $('#endDate').val(ye+'-'+mo+'-'+da);
        });
    </script>
</body>
</html>